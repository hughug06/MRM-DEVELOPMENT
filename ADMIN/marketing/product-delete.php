<?php
    
    include "../../Database/database.php";
    if(isset($_GET['id'])){
        $ProductID = $_GET['id'];
        $getImage = "Select Image from `products` where ProductID=$ProductID";
        $sql = "DELETE from `products` where ProductID=$ProductID";
        $result = mysqli_query($conn , $sql);
    }
    header('location: marketing-product-control.php');
    exit;
?>