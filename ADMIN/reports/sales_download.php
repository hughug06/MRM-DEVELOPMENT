<?php
require_once '../../Database/database.php';

// Get report type
$reportType = $_POST['report_type'] ?? '';

if ($reportType) {
    $query = "";
    $fileName = "";

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
        $fileName = "weekly_sales_report.csv";
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
        $fileName = "monthly_sales_report.csv";
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
        $fileName = "yearly_sales_report.csv";
    }

    // Execute query
    $result = $conn->query($query);

    // Prepare CSV content
    header('Content-Type: text/csv');
    header('Content-Disposition: attachment; filename="' . $fileName . '"');

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
