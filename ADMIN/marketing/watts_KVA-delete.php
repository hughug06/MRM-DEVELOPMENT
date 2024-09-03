<?php
    
    include "../../Database/database.php";
    if(isset($_GET['id'])){
        $ID = $_GET['id'];
        $sql = "DELETE from `watts_kva_category` where ID=$ID";
        $result = mysqli_query($conn , $sql);
    }
    header('location: marketing-product-control.php');
    exit;
?>