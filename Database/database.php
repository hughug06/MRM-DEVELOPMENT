<?php
$conn = new mysqli('localhost', 'asdasd', 'Mrmeg123', 'u103590962_mrmeg');

// Check the connection
if ($conn->connect_error) {
    echo "Connection failed: " . $conn->connect_error;
    die();
} else {
    echo "Connection successful!";
}
?>
