<?php 
require '../../Database/database.php';

if(isset($_POST['AddProduct']))
{
    $ProductName = $_POST['ProductName'];
    $Type = $_POST['Type'];
    $Watts = $_POST['Watts'];
    $Stock = $_POST['Stock'];
    $Availability = $_POST['Availability'] == true ? 1:0;
    $Description = $_POST['Description'];
    $Specification = $_POST['Specification'];
 
    //WITH IMAGE SUBMISSION
    if($ProductName != '' || $Type != '' || $Watts != '' || $Stock != ''){  
      if(isset($_FILES['image']) && $_FILES['image']['size'] > 0){
        $Image = $_FILES['image'];
        $ImageFileName = $Image['name'];
        $ImageTempName = $Image['tmp_name'];
        $FilenameSeperate = explode('.',$ImageFileName);
        $FileExtension = strtolower(end($FilenameSeperate));

        $extension = array('jpeg','jpg','png');
        if(in_array($FileExtension,$extension)){
          $uploadedImage = 'Product-Images/'.$ImageFileName;
          $upload = '../../assets/images/Product-Images/'.$ImageFileName;
          move_uploaded_file($ImageTempName,$upload);

          $sql_insert = "insert into products (ProductName,Type,Watts,Stock,Availability, Image, Description, Specification) 
                            VALUES ('$ProductName' , '$Type' , '$Watts', ' $Stock'  , '$Availability', '$uploadedImage', '$Description' , '$Specification')";
            if (mysqli_query($conn, $sql_insert)) {
                echo "Product Added successfully";
                header('location: marketing-product-control.php');
                exit();
              } else {
                echo "Error: " . $sql . "<br>" . mysqli_error($conn);
              }
        }
            
      }
      //WITHOUT IMAGE SUBMISSION
      else{                                                               
        $sql_insert = "insert into products (ProductName,Type,Watts,Stock,Availability, Image, Description, Specification) 
                            VALUES ('$ProductName' , '$Type' , '$Watts', ' $Stock'  , '$Availability', NULL, '$Description', '$Specification')";
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