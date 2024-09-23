<?php 
require '../../Database/database.php';
require_once '../authetincation.php';


if(isset($_POST['AddItem']))
{
  $ProductName = $_POST['ProductName'];
  $ProductType = $_POST['ProductType'];
  $stocks = $_POST['stocks'];
  $Availability = $_POST['Availability'] == true ? 1:0;
  $Description = $_POST['Description'];
  $Specification = $_POST['Specification'];
  $min_price = $_POST['min_price'];
  $max_price = $_POST['max_price'];
  $WattsKVA = $_POST['WattsKVA'];

  if($ProductName != '' || $WattsKVA != '' || $ProductType != ''){  
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

        $sql_insert = "insert into products (ProductName,ProductType, Watts_KVA ,Availability, Image, Description, Specification, stock, min_price, max_price) 
                          VALUES ('$ProductName' , '$ProductType' , '$WattsKVA' , '$Availability', '$uploadedImage', '$Description' , '$Specification', '$stocks', '$min_price', '$max_price')";
          if (mysqli_query($conn, $sql_insert)) {
              echo json_encode(['success' => true]);
              header('Content-Type: application/json');
              exit();
          }
          else {
              echo "Error: " . $sql . "<br>" . mysqli_error($conn);
          }
      }
          
    }
    //WITHOUT IMAGE SUBMISSION
    else{                                                               
      $sql_insert = "insert into products (ProductName,ProductType,Watts_KVA,Availability, Image, Description, Specification, stock, min_price, max_price) 
                          VALUES ('$ProductName' , '$ProductType' , '$WattsKVA' , '$Availability', NULL, '$Description', '$Specification', '$stocks', '$min_price', '$max_price')";
          if (mysqli_query($conn, $sql_insert)) {
            echo json_encode(['success' => true]);
              header('Content-Type: application/json');
              exit();
            } else {
              echo json_encode(['message' => 'SQL error']);
            }
    }
  }
  else{
      //ERROR MESSAGE
  }
}



elseif (isset($_POST['PrType'])) {
  $PrType = $_POST['PrType'];
  // Use a prepared statement to prevent SQL injection
  $sql = "SELECT Watts_KVA FROM products WHERE ProductType = ?";
  if ($stmt = $conn->prepare($sql)) {
      // Bind parameters
      $stmt->bind_param("s", $PrType);
      // Execute the statement
      $stmt->execute();
      $result = $stmt->get_result();

      if ($result->num_rows > 0) {
          $Watts_KVA = [];
          while ($row = $result->fetch_assoc()) {
              $Watts_KVA[] = ['value' => $row['Watts_KVA'],'text' => $PrType == 'Solar Panel'? $row['Watts_KVA'].'W': $row['Watts_KVA'].'KVA'];
          }
          echo json_encode(['success' => true, 'data' => ['Watts_KVA' => $Watts_KVA]]);
      } else {
          echo json_encode(['success' => false, 'message' => 'No Watts/KVA Exists']);
      }

      $stmt->close();
  } else {
      echo json_encode(['success' => false, 'message' => 'SQL prepare error: ' . $conn->error]);
  }

}


elseif(isset($_POST['save'])){

  $id = $_POST["id"];
  $Availability = $_POST['Availability'] == true ? 1:0;
  $Description=$_POST['Description'];
  $Specification=$_POST['Specification'];
  $stocks = $_POST['stocks'];
  $max_price=$_POST['max_price'];
  $min_price=$_POST['min_price'];
  
  //WITH IMAGE SUBMISSION
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

          $sql = "update products set Availability= '$Availability', Image= '$uploadedImage', Description='$Description', Specification='$Specification', stock='$stocks', min_price='$min_price', max_price='$max_price' where ProductID='$id'";
          $result = mysqli_query($conn , $sql);
          echo json_encode(['success' => true]);
          header('Content-Type: application/json');
      }
  }
  //WITHOUT IMAGE SUBMISSION
  else{
      $sql = "update products set Availability= '$Availability', Description='$Description', Specification='$Specification', stock='$stocks', min_price='$min_price', max_price='$max_price' where ProductID='$id'";
          $result = mysqli_query($conn , $sql);
          echo json_encode(['success' => true]);
          header('Content-Type: application/json');
  }
}

elseif(isset($_POST['save'])){

  $id = $_POST["id"];
  $stocks = $_POST['stocks'];
  $max_price=$_POST['max_price'];
  $min_price=$_POST['min_price'];
  
  $sql = "update inventory set stock= '$stocks', max_price='$max_price', min_price='$min_price' where itemID='$id'";
      $result = mysqli_query($conn , $sql);
      echo json_encode(['success' => true]);
      header('Content-Type: application/json');
}

//ADD STOCKS FUNCTION
elseif(isset($_POST['submit_add'])){

  $id = $_POST["id"];
  $stocks = $_POST['input_add_stocks'];
  $sql = "select stock from products where ProductID='$id'";
      $result = mysqli_query($conn , $sql);

      if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $current_value = $row['stock'];
    
        // Modify the value (for example, increment by 1)
        $new_value = $current_value + $stocks;
    
        // Update the value back in the database
        $update_sql = "UPDATE products set stock = ? WHERE ProductID = ?";
        $update_stmt = $conn->prepare($update_sql);
        $update_stmt->bind_param("ii", $new_value, $id);
    
        if ($update_stmt->execute()) {
          echo json_encode(['success' => true]);
        } else {
          echo json_encode(['success' => false, 'message' => 'Error updating record: ' . $conn->error]);
        }
    } else {
      echo json_encode(['success' => false, 'message' => 'No record found']);
    }
}

//DECREASE STOCKS FUNCTION
elseif(isset($_POST['submit_dec'])){

  $id = $_POST["id"];
  $stocks = $_POST['input_dec_stocks'];
  $sql = "select stock from products where ProductID='$id'";
      $result = mysqli_query($conn , $sql);

      if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $current_value = $row['stock'];
    
        // Modify the value (for example, increment by 1)
        $new_value = $current_value - $stocks;
    
        // Update the value back in the database
        $update_sql = "UPDATE products set stock = ? WHERE ProductID = ?";
        $update_stmt = $conn->prepare($update_sql);
        $update_stmt->bind_param("ii", $new_value, $id);
    
        if ($update_stmt->execute()) {
          echo json_encode(['success' => true]);
        } else {
          echo json_encode(['success' => false, 'message' => 'Error updating record: ' . $conn->error]);
        }
    } else {
      echo json_encode(['success' => false, 'message' => 'No record found']);
    }
}

else{
    echo json_encode(['success' => false, 'message' => 'SQL prepare error: ' . $conn->error]);
}





$conn->close();
?>