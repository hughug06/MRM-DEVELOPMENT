<?php 
require '../../Database/database.php';
require_once '../authetincation.php';
if(isset($_POST['AddProduct']))
{
    $ProductName = $_POST['ProductName'];
    $ProductTypeID = $_POST['ProductTypeID'];
    $Stock = $_POST['Stock'];
    $Availability = $_POST['Availability'] == true ? 1:0;
    $Description = $_POST['Description'];
    $Specification = $_POST['Specification'];
 
    //WITH IMAGE SUBMISSION
    if($ProductName != '' || $ProductTypeID != '' || $Stock != ''){  
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

          $sql_insert = "insert into products (ProductName,ProductTypeID,Stock,Availability, Image, Description, Specification) 
                            VALUES ('$ProductName' , '$ProductTypeID' , ' $Stock'  , '$Availability', '$uploadedImage', '$Description' , '$Specification')";
            if (mysqli_query($conn, $sql_insert)) {
                echo "Product Added successfully";
                header('location: marketing-product-control.php');
                exit();
            }
            else {
                echo "Error: " . $sql . "<br>" . mysqli_error($conn);
            }
        }
            
      }
      //WITHOUT IMAGE SUBMISSION
      else{                                                               
        $sql_insert = "insert into products (ProductName,ProductTypeID,Stock,Availability, Image, Description, Specification) 
                            VALUES ('$ProductName' , '$ProductTypeID' , ' $Stock'  , '$Availability', NULL, '$Description', '$Specification')";
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
elseif(isset($_POST['AddNewWattsKVA'])){
  $newWattsKVA = $_POST['newWattsKVA'];
  $newProductType = $_POST['newProductType'];
  $sql_insert = "insert into product_type (Watts_KVA, ProductType) 
                            VALUES ('$newWattsKVA', '$newProductType')";
            if (mysqli_query($conn, $sql_insert)) {
                echo "Category Added successfully";
                header('location: marketing-product-control.php');
                exit();
            }
            else {
                echo "Error: " . $sql . "<br>" . mysqli_error($conn);
            }
}elseif (isset($_POST['PrType'])) {
  $PrType = $_POST['PrType'];
  // Use a prepared statement to prevent SQL injection
  $sql = "SELECT Watts_KVA, ProductTypeID FROM product_type WHERE ProductType = ?";
  if ($stmt = $conn->prepare($sql)) {
      // Bind parameters
      $stmt->bind_param("s", $PrType);
      // Execute the statement
      $stmt->execute();
      $result = $stmt->get_result();

      if ($result->num_rows > 0) {
          $WattsKVA = [];
          $ProductTypeID = [];
          while ($row = $result->fetch_assoc()) {
              $WattsKVA[] = ['value' => $row['ProductTypeID'],'text' => $PrType == 'Solar Panel'? $row['Watts_KVA'].'W': $row['Watts_KVA'].'KVA'];
          }
          echo json_encode(['success' => true, 'data' => ['WattsKVA' => $WattsKVA]]);
      } else {
          echo json_encode(['success' => false, 'message' => 'No Watts/KVA Exists']);
      }

      $stmt->close();
  } else {
      echo json_encode(['success' => false, 'message' => 'SQL prepare error: ' . $conn->error]);
  }

  $conn->close();
}


?>