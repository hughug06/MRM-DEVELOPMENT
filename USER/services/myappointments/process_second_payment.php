<?php 
require '../../../Database/database.php';

if (!isset($_POST['booking_id'], $_POST['reference_number'], $_POST['due_payment'])) {
    echo json_encode([
        'success' => false,
        'message' => 'Required data is missing.'
    ]);
    exit;
}
// Extract data from POST
$booking_id = $_POST['booking_id'];
$reference_number = $_POST['reference_number'];
$payment = $_POST['due_payment'];



// Validate if the reference number already exists
$select = "SELECT * FROM service_payment WHERE first_reference = ? OR second_reference = ? OR third_reference = ?";
$stmt = mysqli_prepare($conn, $select);
mysqli_stmt_bind_param($stmt, 'sss', $reference_number, $reference_number, $reference_number);
mysqli_stmt_execute($stmt);
$select_result = mysqli_stmt_get_result($stmt);

if (mysqli_num_rows($select_result) > 0) {
    echo json_encode([
        'success' => false,
        'message' => 'Reference number duplicate, please re-input'
    ]);
    exit;
}

// Proceed with inserting or processing the data...



// Prepare the SQL query
$upd = "UPDATE service_payment 
        SET second_reference = '$reference_number', 
            second_payment = '$payment' 
        WHERE booking_id = '$booking_id'";

// Execute the query and handle success or error
if (mysqli_query($conn, $upd)) {
    echo json_encode([
        'success' => true,
        'message' => 'Payment updated successfully.'
    ]);
} else {
    echo json_encode([
        'success' => false,
        'message' => 'Error updating payment: ' . mysqli_error($conn)
    ]);
}
?>