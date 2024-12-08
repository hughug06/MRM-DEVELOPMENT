<?php
require_once '../../Database/database.php';
require 'vendor/autoload.php';

use Dompdf\Dompdf;

// Fetch data
$totalSalesQuery = "SELECT SUM(total_cost) AS total_sales 
                    FROM service_payment 
                    WHERE first_reference IS NOT NULL 
                    AND second_reference IS NOT NULL 
                    AND third_reference IS NOT NULL";
$totalSalesResult = $conn->query($totalSalesQuery);
$totalSales = $totalSalesResult->fetch_assoc()['total_sales'] ?? 0;

$totalTransactionsQuery = "SELECT COUNT(*) AS total_transactions 
                           FROM service_payment 
                           WHERE first_reference IS NOT NULL 
                           AND second_reference IS NOT NULL 
                           AND third_reference IS NOT NULL";
$totalTransactionsResult = $conn->query($totalTransactionsQuery);
$totalTransactions = $totalTransactionsResult->fetch_assoc()['total_transactions'] ?? 0;

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
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f4f4f4;
        }
    </style>
</head>
<body>
    <h2>Sales Report</h2>
    <p><strong>Total Sales:</strong> ₱' . number_format($totalSales, 2) . '</p>
    <p><strong>Total Transactions:</strong> ' . $totalTransactions . '</p>

    <h3>Sales by Date</h3>
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
                <td>' . htmlspecialchars($data['sale_date']) . '</td>
                <td>' . htmlspecialchars($data['booking_ids']) . '</td>
                <td>₱' . number_format($data['daily_sales'], 2) . '</td>
            </tr>';
}
$html .= '
        </tbody>
    </table>
</body>
</html>';

// Create a PDF
$dompdf = new Dompdf();
$dompdf->loadHtml($html);
$dompdf->setPaper('A4', 'portrait');
$dompdf->render();

// Output the PDF for download
$dompdf->stream("sales_report.pdf", ["Attachment" => 1]);
?>
