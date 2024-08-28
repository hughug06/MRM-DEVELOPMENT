<?php 
include '../../verify.php';
    $conn = new mysqli('localhost' , 'root' , '' , 'mrm');
    IF($conn->connect_error){
        die("Something went wrong");
        }
?>