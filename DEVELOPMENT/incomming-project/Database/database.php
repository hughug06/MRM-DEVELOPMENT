<?php 
    $conn = new mysqli('localhost' , 'root' , '' , 'mrmdb');
    IF($conn->connect_error){
        die("Something went wrong");
        }
?>