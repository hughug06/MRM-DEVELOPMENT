<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once '../../Database/database.php';
require_once '../../vendor/autoload.php';

use Dompdf\Dompdf;

// Sample HTML for testing
$html = '
<!DOCTYPE html>
<html>
<head>
    <style>
        body { font-family: Arial, sans-serif; }
        h1 { text-align: center; }
    </style>
</head>
<body>
    <h1>Test PDF Report</h1>
    <p>This is a test PDF content.</p>
</body>
</html>
';

// Initialize DOMPDF
$dompdf = new Dompdf();

try {
    // Load HTML into DOMPDF
    $dompdf->loadHtml($html);
    $dompdf->setPaper('A4', 'portrait');
    $dompdf->render();

    // Output the generated PDF
    $dompdf->stream("test_report.pdf", ["Attachment" => true]);
} catch (Exception $e) {
    echo "Error: " . $e->getMessage();
}
