<?php
$conn = new mysqli('', '', '', '');

// Check the connection
if ($conn->connect_error) {
    echo "Connection failed: " . $conn->connect_error;
    die();
} else {
    echo "Connection successful!";
}
?>
