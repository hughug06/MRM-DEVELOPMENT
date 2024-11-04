<?php 






// Check the connection$mysqli = new mysqli("localhost","my_user","my_password","my_db");

    $conn = new mysqli('localhost', 'u103590962_mrm', 'Mrmeg123', 'u103590962_mrmeg');

    IF($conn->connect_error){
        ECHO "error";
        die("Something went wrong");
        }

?>