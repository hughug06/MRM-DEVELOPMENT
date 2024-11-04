<?php
$conn = new mysqli('localhost', 'u103590962_mrm', 'Mrmeg123', 'u103590962_mrmeg');

// Check the connection
if ($conn->connect_error) {
    echo "Connection failed: " . $conn->connect_error;
    die();
} else {
    echo "Connection successful!";
    
}
?>
