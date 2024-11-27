<?php
// Include database connection file
include('../../Database/database.php');

// Check if form is submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Get the data from the form
    $bookingId = isset($_POST['booking_id']) ? $_POST['booking_id'] : null;
    $firstReference = isset($_POST['first_reference']) ? $_POST['first_reference'] : null;
    $secondReference = isset($_POST['second_reference']) ? $_POST['second_reference'] : null;
    $thirdReference = isset($_POST['third_reference']) ? $_POST['third_reference'] : null;

        // Validate if the reference number already exists
        $select = "SELECT * FROM service_payment WHERE first_reference = ? OR second_reference = ? OR third_reference = ?";
        $stmt = mysqli_prepare($conn, $select);
        mysqli_stmt_bind_param($stmt, 'sss', $firstReference, $secondReference, $thirdReference);
        mysqli_stmt_execute($stmt);
        $select_result = mysqli_stmt_get_result($stmt);

        if (mysqli_num_rows($select_result) > 0) {
            echo "TEST";
            echo "
                <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
                <script>
                    Swal.fire({
                        icon: 'warning',
                        title: 'Notice',
                        text: 'Duplicate reference number, please re-input',
                        timer: 2000,
                        showConfirmButton: false
                    }).then(() => {
                        window.location.href = 'appointment.php';
                    });
                </script>
            ";
         exit();
        }
    // Create SQL update query for each reference
    // First, check if the first reference is not empty and update accordingly
    if (!empty($firstReference)) {
        $query = "UPDATE service_payment SET first_reference = ? WHERE booking_id = ?";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("si", $firstReference, $bookingId); // "si" means string, integer
        $stmt->execute();
    }

    // Second reference update
    if (!empty($secondReference)) {
        $query = "UPDATE service_payment SET second_reference = ? WHERE booking_id = ?";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("si", $secondReference, $bookingId);
        $stmt->execute();
    }

    // Third reference update
    if (!empty($thirdReference)) {
        $query = "UPDATE service_payment SET third_reference = ? WHERE booking_id = ?";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("si", $thirdReference, $bookingId);
        $stmt->execute();
    }

    // Redirect or return a response after the update
    // For example, you can redirect the user to a page showing the updated information
    header('Location: appointment.php'); // Or any other page to show the result
    exit;
} else {
    // If form was not submitted, redirect back or show an error
    header('Location: error_page.php');
    exit;
}
?>
