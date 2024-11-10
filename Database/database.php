<?php

// // FOR UP WEBSITE
// $conn = new mysqli('localhost', 'u103590962_mrm', 'Mrmeg123', 'u103590962_mrmeg');

// // Check the connection
// if ($conn->connect_error) {
//     echo "Connection failed: " . $conn->connect_error;
//     die();
// } 


// FOR LOCAL HOST

$conn = new mysqli('localhost' , 'root' , '' , 'mrm');
    IF($conn->connect_error){
        die("Something went wrong");
        }
        
?>
