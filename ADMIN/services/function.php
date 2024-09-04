<?php 
session_start();
include '../../Database/database.php';


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $admin_id = $_SESSION['admin_id']; 
    $date = $_POST['date'];
    $start_time = $_POST['start_time'];
    $end_time = $_POST['end_time'];

    $sql = "INSERT INTO admin_availability (account_id, date, start_time, end_time) VALUES ('$admin_id', '$date', '$start_time', '$end_time')";
    if (mysqli_query($conn, $sql)) {
        echo "Availability set successfully!";
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}
?>