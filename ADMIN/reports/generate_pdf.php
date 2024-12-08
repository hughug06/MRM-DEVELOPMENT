<?php
require_once '../../Database/database.php';
require_once '../../vendor/autoload.php'; // For DOMPDF

use Dompdf\Dompdf;

// Get report type
$reportType = $_POST['report_type'] ?? '';

if ($reportType) {
    $query = "";
    $fileName = "";
    $isPdf = ($_POST['file_format'] ?? '') === 'pdf'; // Check if PDF is requested

    // Determine query and file name based on report type
    if ($reportType === 'weekly') {
        $query = "SELECT DATE(date_done) AS sale_date, 
                         GROUP_CONCAT(booking_id) AS booking_ids, 
                         SUM(total_cost) AS total_sales 
                  FROM service_payment 
                  WHERE first_reference IS NOT NULL 
                  AND second_reference IS NOT NULL 
                  AND third_reference IS NOT NULL 
                  AND WEEK(date_done) = WEEK(CURDATE()) 
                  GROUP BY DATE(date_done)";
        $fileName = "weekly_sales_report";
    } elseif ($reportType === 'monthly') {
        $query = "SELECT DATE(date_done) AS sale_date, 
                         GROUP_CONCAT(booking_id) AS booking_ids, 
                         SUM(total_cost) AS total_sales 
                  FROM service_payment 
                  WHERE first_reference IS NOT NULL 
                  AND second_reference IS NOT NULL 
                  AND third_reference IS NOT NULL 
                  AND MONTH(date_done) = MONTH(CURDATE()) 
                  GROUP BY DATE(date_done)";
        $fileName = "monthly_sales_report";
    } elseif ($reportType === 'yearly') {
        $query = "SELECT DATE(date_done) AS sale_date, 
                         GROUP_CONCAT(booking_id) AS booking_ids, 
                         SUM(total_cost) AS total_sales 
                  FROM service_payment 
                  WHERE first_reference IS NOT NULL 
                  AND second_reference IS NOT NULL 
                  AND third_reference IS NOT NULL 
                  AND YEAR(date_done) = YEAR(CURDATE()) 
                  GROUP BY DATE(date_done)";
        $fileName = "yearly_sales_report";
    }

    // Execute query
    $result = $conn->query($query);

    // Prepare output for PDF
    if ($isPdf) {
        $html = '<!DOCTYPE html>
        <html>
        <head>
            <style>
                body { font-family: Arial, sans-serif; margin: 20px; }
                h1 { text-align: center; }
                table { width: 100%; border-collapse: collapse; margin-top: 20px; }
                th, td { border: 1px solid #ddd; padding: 8px; text-align: left; }
                th { background-color: #f2f2f2; }
            </style>
        </head>
        <body>
            <h1>' . ucfirst($reportType) . ' Sales Report</h1>
            <table>
                <thead>
                    <tr>
                        <th>Date</th>
                        <th>Booking IDs</th>
                        <th>Total Sales</th>
                    </tr>
                </thead>
                <tbody>';

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $html .= '<tr>
                            <td>' . $row['sale_date'] . '</td>
                            <td>' . $row['booking_ids'] . '</td>
                            <td>' . number_format($row['total_sales'], 2) . '</td>
                          </tr>';
            }
        }

        $html .= '</tbody>
            </table>
        </body>
        </html>';

        // Generate PDF
        $dompdf = new Dompdf();
        $dompdf->loadHtml($html);
        $dompdf->setPaper('A4', 'portrait');
        $dompdf->render();

        // Output the PDF
        $dompdf->stream($fileName . ".pdf", ["Attachment" => true]);
        exit;
    }

    // Prepare CSV content
    header('Content-Type: text/csv');
    header('Content-Disposition: attachment; filename="' . $fileName . '.csv"');

    $output = fopen('php://output', 'w');
    fputcsv($output, ['Date', 'Booking IDs', 'Total Sales']); // CSV Header

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            fputcsv($output, [$row['sale_date'], $row['booking_ids'], $row['total_sales']]);
        }
    }

    fclose($output);
    exit;
}
?>
