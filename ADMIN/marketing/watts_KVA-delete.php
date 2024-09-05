<?php
    require_once '../authetincation.php';
    include "../../Database/database.php";
    if(isset($_GET['id'])){
        $id = $_GET['id'];
        $sql = "DELETE from product_type where ProductTypeID=$id";
        $result = mysqli_query($conn , $sql);
    }
    header('location: marketing-product-control.php');
    exit;
?>