<?php
$conn = new mysqli('localhost', 'u103590962_mrm', 'Mrmeg123', 'u103590962_mrmeg');

// Check the connection
if ($conn->connect_error) {
    echo "Connection failed: " . $conn->connect_error;
    die();
} else {
    echo "Connection successful!";
    $sql = "select * from accounts";
    $result = mysqli_query($conn , $sql);
    $row = mysqli_fetch_assoc($result);
    echo $row['email'];
}
?>
