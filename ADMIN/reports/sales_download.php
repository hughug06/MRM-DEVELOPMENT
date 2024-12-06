<?php
// Include the database connection
include_once('../../Database/database.php');

// Get the report type (weekly, monthly, or yearly)
$reportType = isset($_POST['report_type']) ? $_POST['report_type'] : 'daily';

// Set date condition based on report type
if ($reportType == 'weekly') {
    $dateCondition = "AND YEARWEEK(date_done, 1) = YEARWEEK(CURDATE(), 1)"; // For current week
} elseif ($reportType == 'monthly') {
    $dateCondition = "AND MONTH(date_done) = MONTH(CURDATE())"; // For current month
} elseif ($reportType == 'yearly') {
    $dateCondition = "AND YEAR(date_done) = YEAR(CURDATE())"; // For current year
} else {
    $dateCondition = ""; // Default to daily report
}

// Fetch sales data
$query = "SELECT DATE(date_done) AS sale_date, SUM(total_cost) AS daily_sales
          FROM service_payment
          WHERE first_reference IS NOT NULL 
          AND second_reference IS NOT NULL 
          AND third_reference IS NOT NULL
          $dateCondition
          GROUP BY DATE(date_done) 
          ORDER BY sale_date ASC";

$result = $conn->query($query);
$salesData = [];
while ($row = $result->fetch_assoc()) {
    $salesData[] = $row;
}

// Prepare HTML content for the PDF
$html = "
<html>
<head>
    <style>
        body { font-family: Arial, sans-serif; }
        table { width: 100%; border-collapse: collapse; }
        table, th, td { border: 1px solid black; }
        th, td { padding: 10px; text-align: left; }
        th { background-color: #f2f2f2; }
    </style>
</head>
<body>
    <h1 style='text-align: center;'>Sales Report - " . ucfirst($reportType) . " Report</h1>
    <table>
        <thead>
            <tr>
                <th>Date</th>
                <th>Total Sales (₱)</th>
            </tr>
        </thead>
        <tbody>";

// Add sales data rows
foreach ($salesData as $data) {
    $html .= "
            <tr>
                <td>" . $data['sale_date'] . "</td>
                <td>" . number_format($data['daily_sales'], 2) . "</td>
            </tr>";
}

$html .= "
        </tbody>
    </table>
</body>
</html>";

// Include the HTML2PDF library (if not using external libraries, use PHP's in-built features)
echo $html;

// The following steps would normally save to a PDF file (without external libraries, you would generate the HTML yourself).

// Output the HTML as a file for download
header("Content-type: application/pdf");
header("Content-Disposition: attachment; filename=sales_report_" . $reportType . ".pdf");
echo $html;

?>
