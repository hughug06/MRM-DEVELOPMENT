<?php
require '../../Database/database.php';
session_start();

if (isset($_POST['pick'])) {
    $userid = $_POST['account_id']; 
    $workerid = $_POST['worker_id'];
    $appointmentid = $_POST['appointment_id'];
    $payment_id = $_POST['payment_id'];
    $admin_id = $_SESSION['admin_id'];  

    // Use prepared statements to prevent SQL injection
    $select = "SELECT * FROM accounts INNER JOIN user_info ON user_info.user_id = accounts.user_id WHERE account_id = ?";
    $stmt = $conn->prepare($select);
    $stmt->bind_param("i", $workerid); // Assuming account_id is an integer
    $stmt->execute();
    $result = $stmt->get_result();

    if ($row = $result->fetch_assoc()) {
        $name = $row['first_name'] . " " . $row['last_name'];
        
        // Insert service worker
        $sql = "INSERT INTO service_worker(worker_name, account_id, user_id, admin_id, appointment_id, payment_id) VALUES (?, ?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("siissi", $name, $workerid, $userid, $admin_id, $appointmentid, $payment_id);
        
        if ($stmt->execute()) {
            // Update appointment status
            $sql = "UPDATE appointments SET status='Approved' WHERE account_id = ? AND appointment_id = ?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("ii", $userid, $appointmentid);
            $stmt->execute();

            // Update payment status
            $sql2 = "UPDATE service_payment SET payment_status='approved' WHERE account_id = ? AND appointment_id = ?";
            $stmt = $conn->prepare($sql2);
            $stmt->bind_param("ii", $userid, $appointmentid);
            $stmt->execute();

            // Redirect after successful updates
            header("Location: appointment.php");
            exit();
        } else {
            echo "Error inserting into service_worker: " . $stmt->error;
        }
    } else {
        echo "No worker found with the given account ID.";
    }

    // Close statement
    $stmt->close();
} else {
    echo "No data received.";
}

// Close connection
$conn->close();
?>
