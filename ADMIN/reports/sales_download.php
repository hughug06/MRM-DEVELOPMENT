<?php
require_once '../../Database/database.php';
use Dompdf\Dompdf;

// Get report type
$reportType = $_POST['report_type'] ?? '';

if ($reportType) {
    $query = "";
    $fileName = "";

    // Determine query and file name based on report type
    if ($reportType === 'weekly') {
        $query = "SELECT DATE(date_done) AS sale_date, 
                         GROUP_CONCAT(booking_id) AS booking_ids, 
                         SUM(total_cost) AS total_sales,
                         service_type, product_type, pin_location, bank_name, payment_method
                  FROM service_payment 
                  INNER JOIN service_booking ON service_booking.booking_id = service_payment.booking_id
                  WHERE first_reference IS NOT NULL 
                  AND second_reference IS NOT NULL 
                  AND third_reference IS NOT NULL 
                  AND WEEK(date_done) = WEEK(CURDATE()) 
                  GROUP BY DATE(date_done)";
        $fileName = "weekly_sales_report.csv";
    } elseif ($reportType === 'monthly') {
        $query = "SELECT DATE(date_done) AS sale_date, 
                         GROUP_CONCAT(booking_id) AS booking_ids, 
                         SUM(total_cost) AS total_sales ,
                         service_type, product_type, pin_location, bank_name, payment_method
                  FROM service_payment 
                  INNER JOIN service_booking ON service_booking.booking_id = service_payment.booking_id
                  WHERE first_reference IS NOT NULL 
                  AND second_reference IS NOT NULL 
                  AND third_reference IS NOT NULL 
                  AND MONTH(date_done) = MONTH(CURDATE()) 
                  GROUP BY DATE(date_done)";
        $fileName = "monthly_sales_report.csv";
    } elseif ($reportType === 'yearly') {
        $query = "SELECT DATE(date_done) AS sale_date, 
                         GROUP_CONCAT(booking_id) AS booking_ids, 
                         SUM(total_cost) AS total_sales ,
                         service_type, product_type, pin_location, bank_name, payment_method
                  FROM service_payment 
                  INNER JOIN service_booking ON service_booking.booking_id = service_payment.booking_id
                  WHERE first_reference IS NOT NULL 
                  AND second_reference IS NOT NULL 
                  AND third_reference IS NOT NULL 
                  AND YEAR(date_done) = YEAR(CURDATE()) 
                  GROUP BY DATE(date_done)";
        $fileName = "yearly_sales_report.csv";
    }

    // Execute query
    $results = $conn->query($query);

    // Prepare CSV content
    header('Content-Type: text/csv');
    header('Content-Disposition: attachment; filename="' . $fileName . '"');

    if ($results->num_rows > 0) {
        while ($row = $results->fetch_assoc()) {
            
        }
    }

    // Generate HTML content for PDF
    $html = '<h1>Reservation Reports</h1>';
    $html .= '<table border="1" style="width:100%; border-collapse: collapse;">';
    $html .= '<thead>
                <tr>
                    <th>Booking ID</th>
                    <th>Service Type</th>
                    <th>Product Type</th>
                    <th>Location</th>
                    <th>Bank used</th>
                    <th>Payment Method</th>
                    <th>Date of Sale</th>
                    <th>Total Sales</th>
                </tr>
              </thead>';
    $html .= '<tbody>';

    if (!empty($results)) {
        $cnt = 1;
        foreach ($results as $row) {
            $html .= '<tr>
                        <td>' . htmlentities($row['booking_id']) . '</td>
                        <td>' . htmlentities($row['service_type']) . '</td>
                        <td>' . htmlentities($row['product_type']) . '</td>
                        <td>' . htmlentities($row['pin_location']) . '</td>
                        <td>' . htmlentities($row['bank_name']) . '</td>
                        <td>' . htmlentities($row['payment_method']) . '</td>
                        <td>' . htmlentities($row['sale_date']) . '</td>
                        <td>' . htmlentities($row['total_sales']) . '</td>
                      </tr>';
        }
    } else {
        $html .= '<tr><td colspan="11">No data available</td></tr>';
    }

    $html .= '</tbody></table>';

    // Create PDF
    $dompdf = new Dompdf();
    $dompdf->loadHtml($html);
    $dompdf->setPaper('A4', 'landscape');
    $dompdf->render();

    // Output the PDF for download
    $dompdf->stream($fileName, ["Attachment" => true]);
    exit;
}
?>
