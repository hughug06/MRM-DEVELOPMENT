<?php
    
    include "../../Database/database.php";
    if(isset($_GET['id'])){
        $id = $_GET['id'];
        $sql = "DELETE from product_type where ProductTypeID=$id";
        try{
        $result = mysqli_query($conn , $sql);
        }
        catch(Exception){
            echo "Cannot Delete Because the Selected Type is in use in Products Specification Table";
            exit();
        }
    }
    header('location: marketing-product-control.php');
    exit;
?>