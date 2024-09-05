<?php
require_once '../../authetincation.php';
    include "../../../Database/database.php";
    
    
    if(isset($_GET['id'])){
        $id = $_GET['id'];
        $sql = "DELETE from user_info where user_id=$id";
        $result = mysqli_query($conn , $sql);
    }
    header('location: user-management.php');
    exit;
?>