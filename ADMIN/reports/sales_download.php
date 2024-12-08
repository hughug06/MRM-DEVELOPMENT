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
    $query = "SELECT *
              FROM service_payment
              INNER JOIN service_booking ON service_booking.booking_id = service_payment.booking_id
              WHERE booking_status = 'completed' ";

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
    $html = '<h1>Sales Reports</h1>';
    $html .= '<table border="1" style="width:50%; border-collapse: collapse;">';
    $html .= '<thead>
                <tr>
                    <th>Booking ID</th>
                    <th>Service Type</th>
                    <th>Product Type</th>
                    <th>Location</th>
                    <th>Bank used</th>
                    <th>Payment Method</th>
                    <th>Date of Sale</th>
                    <th>Sale Amount</th>
                </tr>
              </thead>';
    $html .= '<tbody>';

    if ($results->num_rows > 0) {
        while ($row = $results->fetch_assoc()) {
            $html .= '<tr>
                        <td>' . htmlentities($row['booking_id']) . '</td>
                        <td>' . htmlentities($row['service_type']) . '</td>
                        <td>' . htmlentities($row['product_type']) . '</td>
                        <td>' . htmlentities($row['pin_location']) . '</td>
                        <td>' . htmlentities($row['bank_name']) . '</td>
                        <td>' . htmlentities($row['payment_method']) . '</td>
                        <td>' . htmlentities($row['payment_date']) . '</td>
                        <td>' . htmlentities(intval($row['total_cost'] . ".00")) . '</td>
                    </tr>';
        }
    }else {
        $html .= '<tr><td colspan="8">No data available</td></tr>';
    }


    $html .= '</tbody></table>';
    echo($html);

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
