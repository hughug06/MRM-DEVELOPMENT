<?php 
require '../../Database/database.php';

if(isset($_POST['AddProduct']))
{
    $ProductName = $_POST['ProductName'];
    $Type = $_POST['Type'];
    $Watts = $_POST['Watts'];
    $Stock = $_POST['Stock'];
    $Availability = $_POST['Availability'] == true ? 1:0;
 
    //WITH IMAGE SUBMISSION
    if($ProductName != '' || $Type != '' || $Watts != '' || $Stock != ''){  
      if(isset($_FILES['Image']) && $_FILES['Image']['size'] > 0){
        $ImageName = $_FILES['Image']['Name'];
        $ImageData = addslashes(file_get_contents($_FILES['Image']['Name']));
            
            $sql_insert = "insert into products (ProductName,Type,Watts,Stock,Availability, ImageName, ImageData) 
                            VALUES ('$ProductName' , '$Type' , '$Watts', ' $Stock'  , '$Availability', '$ImageName', '$ImageData')";
            if (mysqli_query($conn, $sql_insert)) {
                echo "Product Added successfully";
                header('location: marketing-product-control.php');
                exit();
              } else {
                echo "Error: " . $sql . "<br>" . mysqli_error($conn);
              }
      }
      //WITHOUT IMAGE SUBMISSION
      else{                                                               
        $sql_insert = "insert into products (ProductName,Type,Watts,Stock,Availability, ImageName, ImageData) 
                            VALUES ('$ProductName' , '$Type' , '$Watts', ' $Stock'  , '$Availability', NULL, NULL)";
            if (mysqli_query($conn, $sql_insert)) {
                echo "Product Added successfully";
                header('location: marketing-product-control.php');
                exit();
              } else {
                echo "Error: " . $sql . "<br>" . mysqli_error($conn);
              }
      }
    }
    else{
        //ERROR MESSAGE
    }
}


?>