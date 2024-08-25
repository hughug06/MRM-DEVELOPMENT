<?php
    include "../../Database/database.php";
    if(isset($_GET['ProductID'])){
        $ProductID = $_GET['ProductID'];
        $sql = "DELETE from `products` where ProductID=$ProductID";
        $result = mysqli_query($conn , $sql);
    }
    header('location: marketing-product-control.php');
    exit;
?>