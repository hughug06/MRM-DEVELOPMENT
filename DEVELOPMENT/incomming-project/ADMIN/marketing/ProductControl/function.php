<?php

require '../../Database/database.php';

if(isset($_POST['????']))
{
    $ProductID = $_POST['ProductID'];
    $ProductName = $_POST['ProductName'];
    $Type = $_POST['Type'];
    $Watts = $_POST['Watts'];
    $Stock = $_POST['Stock'];
    $Availability = $_POST['Availability'] == true ? 1:0;
 
    if($fullname != '' || $username != '' || $password != '' || $email != ''){
            $sql_insert = "insert into users (ProductID,ProductName,Type,Watts,Stock,Availability) 
                            VALUES ('$ProductID' , '$ProductName' , '$Type' , '$Watts', ' $Stock'  , '$Availability')";
            if (mysqli_query($conn, $sql_insert)) {
                echo "New record created successfully";
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