<?php
    include "../../Database/database.php";
    include '../../verify.php';
    
    if(isset($_GET['id'])){
        $id = $_GET['id'];
        $sql = "DELETE from `users` where Id=$id";
        $result = mysqli_query($conn , $sql);
    }
    header('location: user-management.php');
    exit;
?>