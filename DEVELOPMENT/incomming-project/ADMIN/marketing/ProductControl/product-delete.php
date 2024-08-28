<?php
    include '../../verify.php';
    include "../../Database/database.php";
    if(isset($_GET['id'])){
        $ProductID = $_GET['id'];
        $sql = "DELETE from `products` where ProductID=$ProductID";
        $result = mysqli_query($conn , $sql);
    }
    header('location: marketing-product-control.php');
    exit;
?>