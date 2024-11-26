<?php 
require_once '../../Database/database.php';
$filter = $_GET['filter'] ?? '';
$query = "";

if ($filter === 'weekly') {
    $query = "SELECT DATE(date_done) AS sale_date, 
                     GROUP_CONCAT(booking_id) AS booking_ids, 
                     SUM(total_cost) AS daily_sales 
              FROM service_payment 
              WHERE first_reference IS NOT NULL 
              AND second_reference IS NOT NULL 
              AND third_reference IS NOT NULL 
              AND WEEK(date_done) = WEEK(CURDATE()) 
              GROUP BY DATE(date_done)";
} elseif ($filter === 'monthly') {
    $query = "SELECT DATE(date_done) AS sale_date, 
                     GROUP_CONCAT(booking_id) AS booking_ids, 
                     SUM(total_cost) AS daily_sales 
              FROM service_payment 
              WHERE first_reference IS NOT NULL 
              AND second_reference IS NOT NULL 
              AND third_reference IS NOT NULL 
              AND MONTH(date_done) = MONTH(CURDATE()) 
              GROUP BY DATE(date_done)";
} elseif ($filter === 'yearly') {
    $query = "SELECT DATE(date_done) AS sale_date, 
                     GROUP_CONCAT(booking_id) AS booking_ids, 
                     SUM(total_cost) AS daily_sales 
              FROM service_payment 
              WHERE first_reference IS NOT NULL 
              AND second_reference IS NOT NULL 
              AND third_reference IS NOT NULL 
              AND YEAR(date_done) = YEAR(CURDATE()) 
              GROUP BY DATE(date_done)";
}

$result = $conn->query($query);
$salesData = [];
while ($row = $result->fetch_assoc()) {
    $salesData[] = $row;
}

echo json_encode([
    'labels' => array_column($salesData, 'sale_date'),
    'sales' => array_column($salesData, 'daily_sales'),
    'table' => $salesData
]);
?>