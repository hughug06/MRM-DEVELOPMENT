<?php
require_once '../../Database/database.php';

// Ensure this is a GET request to generate the report based on the type (weekly, monthly, yearly)
if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['reportType'])) {
    $reportType = $_GET['reportType'];

    // Fetch the sales data based on report type
    $salesData = [];
    $dateCondition = '';

    // Adjust the query based on the report type
    if ($reportType == 'weekly') {
        $dateCondition = "AND DATE(date_done) >= CURDATE() - INTERVAL 1 WEEK";
    } elseif ($reportType == 'monthly') {
        $dateCondition = "AND MONTH(date_done) = MONTH(CURDATE()) AND YEAR(date_done) = YEAR(CURDATE())";
    } elseif ($reportType == 'yearly') {
        $dateCondition = "AND YEAR(date_done) = YEAR(CURDATE())";
    }

    // Example query to fetch sales data within the condition set for the report
    $query = "SELECT DATE(date_done) AS sale_date, GROUP_CONCAT(booking_id) AS booking_ids, SUM(total_cost) AS daily_sales
              FROM service_payment
              WHERE first_reference IS NOT NULL AND second_reference IS NOT NULL AND third_reference IS NOT NULL
              $dateCondition
              GROUP BY DATE(date_done)
              ORDER BY sale_date ASC";

    $result = $conn->query($query);
    while ($row = $result->fetch_assoc()) {
        $salesData[] = $row;
    }

    // Set the content type to PDF
    header('Content-Type: application/pdf');
    header('Content-Disposition: attachment; filename="sales_report_' . $reportType . '.pdf"');

    // Start building the PDF content using HTML structure
    $htmlContent = '<html><body>';
    $htmlContent .= '<h1>Sales Report (' . ucfirst($reportType) . ')</h1>';
    $htmlContent .= '<table border="1" cellpadding="5">
                        <tr>
                            <th>Date</th>
                            <th>Booking IDs</th>
                            <th>Total Sales (₱)</th>
                        </tr>';
    
    // Populate table with sales data
    foreach ($salesData as $data) {
        $htmlContent .= '<tr>';
        $htmlContent .= '<td>' . htmlspecialchars($data['sale_date']) . '</td>';
        $htmlContent .= '<td>' . htmlspecialchars($data['booking_ids']) . '</td>';
        $htmlContent .= '<td>' . number_format($data['daily_sales'], 2) . '</td>';
        $htmlContent .= '</tr>';
    }

    $htmlContent .= '</table>';
    $htmlContent .= '</body></html>';

    // Use the browser to print this HTML as a PDF
    echo $htmlContent;
    exit;
}
?>
