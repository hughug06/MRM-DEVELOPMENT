<?php 
// Replace these with your Hostinger database credentials
$db_host = 'your_hostinger_database_host'; // e.g., mysql-123.hostinger.com
$db_user = 'mrm';
$db_pass = 'ZO&aSqn^uS/b';
$db_name = 'mrm';

// Establishing a connection
$conn = new mysqli($db_host, $db_user, $db_pass, $db_name);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


    // $conn = new mysqli('localhost' , 'root' , '' , 'mrm');
    // IF($conn->connect_error){
    //     die("Something went wrong");
    //     }
?>