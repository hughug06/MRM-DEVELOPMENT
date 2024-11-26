<?php
header('Content-Type: application/json');

require_once '../../Database/database.php';

// Retrieve and sanitize input
$data = json_decode(file_get_contents('php://input'), true);
$reportType = isset($data['type']) ? $data['type'] : '';

$totalCost = 0;

// Determine the date range based on the report type
if ($reportType === 'weekly') {
    $startDate = date('Y-m-d', strtotime('-1 week'));
    $endDate = date('Y-m-d');
} elseif ($reportType === 'monthly') {
    $startDate = date('Y-m-d', strtotime('-1 month'));
    $endDate = date('Y-m-d');
} elseif ($reportType === 'yearly') {
    $startDate = date('Y-m-d', strtotime('-1 year'));
    $endDate = date('Y-m-d');
} else {
    echo json_encode(['error' => 'Invalid report type']);
    exit;
}

// Query to calculate total cost within the date range
$query = $conn->prepare("
    SELECT SUM(total_cost) AS total_cost 
    FROM service_payment 
    WHERE payment_date BETWEEN ? AND ?
");
$query->bind_param('ss', $startDate, $endDate);
$query->execute();
$result = $query->get_result();

if ($row = $result->fetch_assoc()) {
    $totalCost = $row['total_cost'] ?? 0;
}

// Return the total cost as a JSON response
echo json_encode(['total_cost' => $totalCost]);

$query->close();
$conn->close();
?>
