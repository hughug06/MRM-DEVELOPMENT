<?php 
// Replace these with your Hostinger database credentials

// Establishing a connection $mysqli = new mysqli("localhost","my_user","my_password","my_db");


// Check the connection$mysqli = new mysqli("localhost","my_user","my_password","my_db");



    $conn = new mysqli('mrm-eg.online' , 'mrm' , 'ZO&aSqn^uS/b' , 'u103590962_mrm');
    IF($conn->connect_error){
        die("Something went wrong");
        }
?>