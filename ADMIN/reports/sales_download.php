<?php
// Database connection
include_once('../Database/database.php');

// Fetch sales data from the database
$query = "SELECT DATE(date_done) AS sale_date, SUM(total_cost) AS daily_sales 
          FROM service_payment 
          WHERE first_reference IS NOT NULL 
          AND second_reference IS NOT NULL 
          AND third_reference IS NOT NULL 
          GROUP BY DATE(date_done) 
          ORDER BY sale_date ASC";
$result = $conn->query($query);

// Store the sales data in an array
$salesData = [];
while ($row = $result->fetch_assoc()) {
    $salesData[] = $row;
}

// Close the database connection
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sales Report</title>
    <style>
        /* Basic styling for the report */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
            color: #333;
        }

        .report-container {
            width: 80%;
            margin: 0 auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }

        h1 {
            text-align: center;
            color: #2c3e50;
        }

        .date-range {
            text-align: center;
            margin-bottom: 20px;
            font-size: 18px;
            color: #7f8c8d;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            padding: 12px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #2980b9;
            color: white;
        }

        .total-sales {
            font-size: 20px;
            font-weight: bold;
            text-align: right;
            margin-top: 20px;
        }

        .footer {
            text-align: center;
            margin-top: 40px;
            font-size: 14px;
            color: #7f8c8d;
        }
    </style>
</head>
<body>

    <div class="report-container" id="receiptToDownload">
        <h1>Sales Report</h1>
        
        <!-- Date range or report generation date -->
        <div class="date-range">
            <p>Report Generated on: <?php echo date("F j, Y"); ?></p>
        </div>
        
        <!-- Sales data table -->
        <table>
            <thead>
                <tr>
                    <th>Date</th>
                    <th>Total Sales (₱)</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                $totalSales = 0; // Variable to accumulate the total sales
                foreach ($salesData as $data): 
                    $totalSales += $data['daily_sales'];
                ?>
                    <tr>
                        <td><?php echo $data['sale_date']; ?></td>
                        <td><?php echo number_format($data['daily_sales'], 2); ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

        <!-- Total sales summary -->
        <div class="total-sales">
            <p>Total Sales for the Period: ₱<?php echo number_format($totalSales, 2); ?></p>
        </div>
    </div>

    <!-- Footer -->
    <div class="footer">
        <p>Thank you for your business!</p>
    </div>

    <!-- JavaScript to trigger PDF download -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.9.2/html2pdf.bundle.js"></script>
    <script>
        window.onload = function () {
            const element = document.getElementById('receiptToDownload');

            // Set options for the PDF generation
            const opt = {
                margin: [0, 0, 0, 0], // Minimize margins
                filename: 'sales_report.pdf',
                image: { type: 'jpeg', quality: 0.98 },
                html2canvas: { scale: 2, useCORS: true, scrollY: 0 },
                jsPDF: { unit: 'mm', format: 'a4', orientation: 'portrait' }
            };

            // Generate and download the PDF automatically when the page loads
            html2pdf().set(opt).from(element).save();
        };
    </script>
</body>
</html>
