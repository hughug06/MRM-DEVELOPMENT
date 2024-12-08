<?php
require_once '../../Database/database.php';
use Dompdf\Dompdf;

// Get report type
$reportType = $_POST['report_type'] ?? '';

if ($reportType) {
    $query = "";
    $fileName = "";

    // Determine query and file name based on report type
    // Base query
    $query = "SELECT DATE(date_done) AS sale_date, 
                     GROUP_CONCAT(booking_id) AS booking_ids, 
                     SUM(total_cost) AS total_sales,
                     GROUP_CONCAT(service_type) AS service_types,
                     GROUP_CONCAT(product_type) AS product_types,
                     GROUP_CONCAT(pin_location) AS pin_locations,
                     GROUP_CONCAT(bank_name) AS bank_names,
                     GROUP_CONCAT(payment_method) AS payment_methods
              FROM service_payment 
              INNER JOIN service_booking ON service_booking.booking_id = service_payment.booking_id
              WHERE first_reference IS NOT NULL 
              AND second_reference IS NOT NULL 
              AND third_reference IS NOT NULL ";

    // Append condition based on report type
    if ($reportType === 'weekly') {
        $query .= "AND WEEK(date_done) = WEEK(CURDATE()) ";
        $fileName = "weekly_sales_report.pdf";
    } elseif ($reportType === 'monthly') {
        $query .= "AND MONTH(date_done) = MONTH(CURDATE()) ";
        $fileName = "monthly_sales_report.pdf";
    } elseif ($reportType === 'yearly') {
        $query .= "AND YEAR(date_done) = YEAR(CURDATE()) ";
        $fileName = "yearly_sales_report.pdf";
    } else {
        echo("Invalid report type provided.");
        exit;
    }

    // Add grouping
    $query .= "GROUP BY DATE(date_done)";

    // Execute query
    $results = $conn->query($query);

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

    if ($results->num_rows > 0) {
        while ($row = $results->fetch_assoc()) {
            $html .= '<tr>
                        <td>' . htmlentities($row['booking_ids']) . '</td>
                        <td>' . htmlentities($row['service_types']) . '</td>
                        <td>' . htmlentities($row['product_types']) . '</td>
                        <td>' . htmlentities($row['pin_locations']) . '</td>
                        <td>' . htmlentities($row['bank_names']) . '</td>
                        <td>' . htmlentities($row['payment_methods']) . '</td>
                        <td>' . htmlentities($row['sale_date']) . '</td>
                        <td>' . htmlentities($row['total_sales']) . '</td>
                    </tr>';
        }
    }else {
        $html .= '<tr><td colspan="8">No data available</td></tr>';
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
