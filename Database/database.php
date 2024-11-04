<?php
$conn = new mysqli('localhost', '', 'Mrmeg123', '');

// Check the connection
if ($conn->connect_error) {
    echo "Connection failed: " . $conn->connect_error;
    die();
} else {
    echo "Connection successful!";
}
?>
