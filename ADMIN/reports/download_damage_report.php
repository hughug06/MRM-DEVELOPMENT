<?php
require_once '../../Database/database.php';

// Get the selected period (weekly, monthly, or yearly)
$period = $_GET['period'] ?? 'weekly';

// Calculate the date range based on the period
switch ($period) {
    case 'weekly':
        $dateRange = "WHERE created_at >= CURDATE() - INTERVAL 7 DAY";
        $filename = 'damage_report_weekly.csv';
        break;
    case 'monthly':
        $dateRange = "WHERE created_at >= CURDATE() - INTERVAL 1 MONTH";
        $filename = 'damage_report_monthly.csv';
        break;
    case 'yearly':
        $dateRange = "WHERE created_at >= CURDATE() - INTERVAL 1 YEAR";
        $filename = 'damage_report_yearly.csv';
        break;
    default:
        $dateRange = "";
        $filename = 'damage_report.csv';
        break;
}

// Fetch the data for the selected period
$query = "SELECT * FROM damage_report $dateRange ORDER BY created_at DESC";
$result = $conn->query($query);

// Set the headers for the CSV download
header('Content-Type: text/csv');
header('Content-Disposition: attachment; filename="' . $filename . '"');
$output = fopen('php://output', 'w');

// Write the column headers
fputcsv($output, ['report ID', 'booking ID', 'working ID', 'Description', 'Damage', 'Quantity' , 'When' , 'date']);

// Write the rows
while ($row = $result->fetch_assoc()) {
    fputcsv($output, $row);
}

fclose($output);
exit();
?>
