<?php
include 'sales-reports.php'; // Include sales data

// Validate the report type (daily, weekly, yearly)
$report_type = isset($_POST['report_type']) ? $_POST['report_type'] : 'daily';
$report_title = "Sales Report - " . ucfirst($report_type);

// Group sales data dynamically based on the report type
$groupedData = [];
if ($report_type === 'daily') {
    $groupedData = $salesData; // Assume sales-reports.php provides daily data
} elseif ($report_type === 'weekly' || $report_type === 'yearly') {
    foreach ($salesData as $data) {
        $key = ($report_type === 'weekly') ? date('o-W', strtotime($data['sale_date'])) : date('Y', strtotime($data['sale_date']));
        if (!isset($groupedData[$key])) {
            $groupedData[$key] = ['sale_period' => $key, 'total_sales' => 0, 'booking_ids' => []];
        }
        $groupedData[$key]['total_sales'] += $data['daily_sales'];
        $groupedData[$key]['booking_ids'] = array_merge($groupedData[$key]['booking_ids'], explode(',', $data['booking_ids']));
    }
}

// Set headers for PDF output
header("Content-type: application/pdf");
header("Content-Disposition: attachment; filename=sales_report.pdf");

// Start creating the raw PDF content
$pdf_content = "%PDF-1.4\n";
$pdf_content .= "1 0 obj << /Type /Catalog /Pages 2 0 R >> endobj\n";
$pdf_content .= "2 0 obj << /Type /Pages /Kids [3 0 R] /Count 1 >> endobj\n";
$pdf_content .= "3 0 obj << /Type /Page /Parent 2 0 R /MediaBox [0 0 612 792] /Contents 4 0 R >> endobj\n";

// Add the content stream
$content = "BT /F1 24 Tf 100 700 Td (" . $report_title . ") Tj ET\n";
$y_position = 650;

// Add table headers
$content .= "BT /F1 12 Tf 50 $y_position Td (Date/Period) Tj ET\n";
$content .= "BT /F1 12 Tf 200 $y_position Td (Booking IDs) Tj ET\n";
$content .= "BT /F1 12 Tf 400 $y_position Td (Total Sales (₱)) Tj ET\n";
$y_position -= 30;

// Add table rows
foreach ($groupedData as $data) {
    $content .= "BT /F1 12 Tf 50 $y_position Td (" . ($data['sale_date'] ?? $data['sale_period']) . ") Tj ET\n";
    $content .= "BT /F1 12 Tf 200 $y_position Td (" . implode(', ', $data['booking_ids']) . ") Tj ET\n";
    $content .= "BT /F1 12 Tf 400 $y_position Td (" . number_format($data['total_sales'], 2) . ") Tj ET\n";
    $y_position -= 20;
}

// Complete PDF structure
$pdf_content .= "4 0 obj << /Length " . strlen($content) . " >> stream\n$content\nendstream endobj\n";
$pdf_content .= "xref\n0 5\n0000000000 65535 f\n0000000010 00000 n\n0000000061 00000 n\n0000000112 00000 n\n";
$pdf_content .= "0000000220 00000 n\ntrailer << /Root 1 0 R /Size 5 >> startxref\n300\n%%EOF";

// Output the PDF content
echo $pdf_content;
?>