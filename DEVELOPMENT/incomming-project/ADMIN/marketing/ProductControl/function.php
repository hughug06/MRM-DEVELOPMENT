<?php 
require '../../Database/database.php';
include '../../verify.php';
if(isset($_POST['AddProduct']))
{
    $ProductName = $_POST['ProductName'];
    $Type = $_POST['Type'];
    $Watts = $_POST['Watts'];
    $Stock = $_POST['Stock'];
    $Availability = $_POST['Availability'] == true ? 1:0;
 
    if($ProductName != '' || $Type != '' || $Watts != '' || $Stock != ''){
            $sql_insert = "insert into products (ProductName,Type,Watts,Stock,Availability) 
                            VALUES ('$ProductName' , '$Type' , '$Watts', ' $Stock'  , '$Availability')";
            if (mysqli_query($conn, $sql_insert)) {
                echo "Product Added successfully";
                header('location: marketing-product-control.php');
                exit();
              } else {
                echo "Error: " . $sql . "<br>" . mysqli_error($conn);
              }
    }
    else{
        //ERROR MESSAGE
    }
}


?>