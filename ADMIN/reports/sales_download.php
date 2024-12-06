<?php
include_once '../../Database/database.php';

// Check if a POST request is made
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['report_type'])) {
    $reportType = $_POST['report_type'];

    // Determine date range based on the report type
    switch ($reportType) {
        case 'weekly':
            $startDate = date('Y-m-d', strtotime('-1 week'));
            break;
        case 'monthly':
            $startDate = date('Y-m-d', strtotime('-1 month'));
            break;
        case 'yearly':
            $startDate = date('Y-m-d', strtotime('-1 year'));
            break;
        default:
            die("Invalid report type");
    }
    $endDate = date('Y-m-d'); // Current date

    // Fetch sales data within the date range
    $query = "
        SELECT DATE(date_done) AS sale_date, 
               GROUP_CONCAT(booking_id) AS booking_ids, 
               SUM(total_cost) AS daily_sales 
        FROM service_payment 
        WHERE date_done BETWEEN ? AND ?
          AND first_reference IS NOT NULL 
          AND second_reference IS NOT NULL 
          AND third_reference IS NOT NULL 
        GROUP BY DATE(date_done) 
        ORDER BY sale_date ASC
    ";

    $stmt = $conn->prepare($query);
    $stmt->bind_param('ss', $startDate, $endDate);
    $stmt->execute();
    $result = $stmt->get_result();

    // Prepare data for the report
    $salesData = [];
    while ($row = $result->fetch_assoc()) {
        $salesData[] = $row;
    }

    // Generate CSV content
    $filename = "sales_report_{$reportType}.csv";
    header('Content-Type: text/csv');
    header("Content-Disposition: attachment; filename={$filename}");

    $output = fopen('php://output', 'w');

    // Add CSV headers
    fputcsv($output, ['Date', 'Booking IDs', 'Total Sales (₱)']);

    // Add sales data rows
    foreach ($salesData as $data) {
        fputcsv($output, [$data['sale_date'], $data['booking_ids'], number_format($data['daily_sales'], 2)]);
    }

    fclose($output);
    exit;
} else {
    echo "Invalid request.";
}
?>
