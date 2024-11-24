<?php
require 'Database/database.php';

if (isset($_POST['change'])) {
    // Retrieve and sanitize all input values from the form
    $password = $_POST['password'];
    $id = $_POST['id'];
    $password_pattern = "/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[A-Za-z\d]{6,10}$/";

    // Validate password format
    if (!preg_match($password_pattern, $password)) {
        echo json_encode([
            'success' => false, 
            'message' => 'Password must be 6-10 characters long, contain at least one lowercase letter, one uppercase letter, and one number'
        ]);
        exit();
    }

    // Hash the password
    $password_hash = password_hash($password, PASSWORD_DEFAULT);

    // Prepare SQL query
    $stmt = $conn->prepare("UPDATE accounts SET password=?, re_password_request='0' WHERE account_id=?");

    if ($stmt === false) {
        echo json_encode(['success' => false, 'message' => 'Failed to prepare statement']);
        exit();
    }

    // Bind parameters and execute the query
    $stmt->bind_param("si", $password_hash, $id);

    if ($stmt->execute()) {
        // Check if the row was affected (i.e., query was successful)
        if ($stmt->affected_rows > 0) {
            echo json_encode(['success' => true, 'message' => 'SUCCESS']);
        } else {
            echo json_encode(['success' => false, 'message' => 'No rows were updated']);
        }
    } else {
        echo json_encode(['success' => false, 'message' => 'Error executing query']);
    }

    $stmt->close();
    }


?>