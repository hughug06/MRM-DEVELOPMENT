<?php
require_once 'vendor/autoload.php'; // Include the DOMPDF library
use Dompdf\Dompdf;

// Database connection (reuse your existing connection)
require_once 'db_connection.php';

// Fetch total sales
$totalSalesQuery = "SELECT SUM(total_cost) AS total_sales 
                    FROM service_payment 
                    WHERE first_reference IS NOT NULL 
                    AND second_reference IS NOT NULL 
                    AND third_reference IS NOT NULL";
$totalSalesResult = $conn->query($totalSalesQuery);
$totalSales = $totalSalesResult->fetch_assoc()['total_sales'] ?? 0;

// Fetch total transactions
$totalTransactionsQuery = "SELECT COUNT(*) AS total_transactions 
                           FROM service_payment 
                           WHERE first_reference IS NOT NULL 
                           AND second_reference IS NOT NULL 
                           AND third_reference IS NOT NULL";
$totalTransactionsResult = $conn->query($totalTransactionsQuery);
$totalTransactions = $totalTransactionsResult->fetch_assoc()['total_transactions'] ?? 0;

// Fetch sales by date
$salesByDateQuery = "SELECT DATE(date_done) AS sale_date, 
                            GROUP_CONCAT(booking_id) AS booking_ids, 
                            SUM(total_cost) AS daily_sales 
                     FROM service_payment 
                     WHERE first_reference IS NOT NULL 
                     AND second_reference IS NOT NULL 
                     AND third_reference IS NOT NULL 
                     GROUP BY DATE(date_done) 
                     ORDER BY sale_date ASC";
$salesByDateResult = $conn->query($salesByDateQuery);
$salesData = [];
while ($row = $salesByDateResult->fetch_assoc()) {
    $salesData[] = $row;
}

// Generate HTML content
$html = '
<!DOCTYPE html>
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
    <h1>Sales Report</h1>
    <p><strong>Total Sales:</strong> ₱' . number_format($totalSales, 2) . '</p>
    <p><strong>Total Transactions:</strong> ' . $totalTransactions . '</p>
    <table>
        <thead>
            <tr>
                <th>Date</th>
                <th>Booking IDs</th>
                <th>Total Sales (₱)</th>
            </tr>
        </thead>
        <tbody>';
foreach ($salesData as $data) {
    $html .= '
            <tr>
                <td>' . $data['sale_date'] . '</td>
                <td>' . $data['booking_ids'] . '</td>
                <td>' . number_format($data['daily_sales'], 2) . '</td>
            </tr>';
}
$html .= '
        </tbody>
    </table>
</body>
</html>';

// Initialize DOMPDF
$dompdf = new Dompdf();
$dompdf->loadHtml($html);
$dompdf->setPaper('A4', 'portrait'); // Set paper size and orientation
$dompdf->render();

// Output the PDF
$dompdf->stream("sales_report.pdf", ["Attachment" => true]); // Change "Attachment" to false for preview
?>
