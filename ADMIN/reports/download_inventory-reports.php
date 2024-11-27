<?php
require_once '../../Database/database.php';

// Get the selected period (weekly, monthly, or yearly)
$period = $_GET['period'] ?? 'weekly';

// Initialize the date range condition
$dateRange = "";

switch ($period) {
    case 'weekly':
        $dateRange = "created_at >= CURDATE() - INTERVAL 7 DAY";
        $filename = 'inventory_report_weekly.csv';
        break;
    case 'monthly':
        $dateRange = "created_at >= CURDATE() - INTERVAL 1 MONTH";
        $filename = 'inventory_report_monthly.csv';
        break;
    case 'yearly':
        $dateRange = "created_at >= CURDATE() - INTERVAL 1 YEAR";
        $filename = 'inventory_report_yearly.csv';
        break;
    default:
        $filename = 'inventory_report.csv';
        break;
}

// Base query
$query = "SELECT ProductID, ProductName, Watts_KVA, stock, price, created_at, updated_at FROM products";
$query2 = "SELECT ProductID, ProductName, Watts_KVA, stock, price, created_at, updated_at FROM products";
$queryZeroStock = "SELECT ProductName, ProductID, Watts_KVA, stock, price, created_at, updated_at FROM products WHERE stock = 0 AND ProductType = 'Solar Panel'";
$queryZeroStock2 = "SELECT ProductName, ProductID, Watts_KVA, stock, price, created_at, updated_at FROM products WHERE stock = 0 AND ProductType = 'Generator'";
$querysolarval = "SELECT SUM(stock * price) AS total_value FROM products WHERE ProductType = 'Solar Panel'";
$querygenval = "SELECT SUM(stock * price) AS total_value FROM products WHERE ProductType = 'Generator'";

// Add the date range condition if applicable
if (!empty($dateRange)) {
    $query .= " WHERE $dateRange AND ProductType = 'Solar Panel' ORDER BY created_at DESC";
    $query2 .= " WHERE $dateRange AND ProductType = 'Generator' ORDER BY created_at DESC";
    $queryZeroStock .= " AND $dateRange ORDER BY created_at DESC";
    $queryZeroStock2 .= " AND $dateRange ORDER BY created_at DESC";
    $querysolarval .= " AND $dateRange ORDER BY created_at DESC";
    $querygenval .= " AND $dateRange ORDER BY created_at DESC";
} else {
    $query .= "WHERE ProductType = 'Solar Panel' ORDER BY created_at DESC";
    $query2 .= " WHERE $dateRange AND ProductType = 'Generator' ORDER BY created_at DESC";
    $queryZeroStock .= " ORDER BY created_at DESC";
    $queryZeroStock2 .= " ORDER BY created_at DESC";
    $querysolarval .= " ORDER BY created_at DESC";
    $querygenval .= " ORDER BY created_at DESC";
}

// Execute the queries
$result = $conn->query($query);
$result2 = $conn->query($query2);
$resultZeroStock = $conn->query($queryZeroStock);
$resultZeroStock2 = $conn->query($queryZeroStock2);
$resultsolarval = $conn->query($querysolarval);
$resultgenval = $conn->query($querygenval);



//DISPLAY PRODUCT STOCKS
// Set the headers for the CSV download
header('Content-Type: text/csv');
header('Content-Disposition: attachment; filename="' . $filename . '"');
$output = fopen('php://output', 'w');

// Write a title row for the second table
fputcsv($output, ['Solar Panels']);
// Write the column headers for the first table
fputcsv($output, ['ProductID', 'ProductName', 'Watts_KVA', 'stock', 'price', 'created_at', 'updated_at']);

// Write the rows for the first table
while ($row = $result->fetch_assoc()) {
    fputcsv($output, $row);
}

// Add a blank row to separate the tables
fputcsv($output, []);

// Write a title row for the second table
fputcsv($output, ['Generators']);

// Write the column headers for the second table
fputcsv($output, ['ProductID', 'ProductName', 'Watts_KVA', 'stock', 'price', 'created_at', 'updated_at']);

// Write the rows for the first table
while ($row = $result2->fetch_assoc()) {
    fputcsv($output, $row);
}




//DISPLAY 0 STOCKS
// Add a blank row to separate the tables
fputcsv($output, []);

// Write a title row for the second table
fputcsv($output, ['Solar Panels with Zero Stock']);

// Write the column headers for the second table
fputcsv($output, ['ProductID', 'ProductName', 'Watts_KVA', 'stock', 'price', 'created_at', 'updated_at']);
// Write the rows for the second table
while ($row = $resultZeroStock->fetch_assoc()) {
    fputcsv($output, $row);
}

// Add a blank row to separate the tables
fputcsv($output, []);

// Write a title row for the second table
fputcsv($output, ['Generators with Zero Stock']);

// Write the column headers for the second table
fputcsv($output, ['ProductID', 'ProductName', 'Watts_KVA', 'stock', 'price', 'created_at', 'updated_at']);
// Write the rows for the second table
while ($row = $resultZeroStock2->fetch_assoc()) {
    fputcsv($output, $row);
}





//DISPLAYS
// Add a blank row to separate the tables
fputcsv($output, []);

// Write a title row for the second table
fputcsv($output, ['Total Stock Value of Solar Panels']);

// Write the rows for the second table
while ($row = $resultsolarval->fetch_assoc()) {
    fputcsv($output, $row);
}


// Add a blank row to separate the tables
fputcsv($output, []);

// Write a title row for the second table
fputcsv($output, ['Total Stock Value of Generators']);

// Write the rows for the second table
while ($row = $resultgenval->fetch_assoc()) {
    fputcsv($output, $row);
}

fclose($output);
exit();
?>
