<?php 
require '../../Database/database.php';
require_once '../authetincation.php';


if(isset($_POST['AddProduct']))
{
    $ProductName = $_POST['ProductName'];
    $Availability = $_POST['Availability'] == true ? 1:0;
    $Description = $_POST['Description'];
    $Specification = $_POST['Specification'];
    $ProductType = $_POST['ProductType'];

    if (isset($_POST['Custom_WK_Check']) && $_POST['Custom_WK_Check'] === '1') {
      $WattsKVA = $_POST['CustomWattsKVA'];
    } else {
      $WattsKVA = $_POST['WattsKVA'];
    }

    //WITH IMAGE SUBMISSION
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

          $sql_insert = "insert into products (ProductName,ProductType, Watts_KVA ,Availability, Image, Description, Specification) 
                            VALUES ('$ProductName' , '$ProductType' , '$WattsKVA' , '$Availability', '$uploadedImage', '$Description' , '$Specification')";
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
        $sql_insert = "insert into products (ProductName,ProductType,Watts_KVA,Availability, Image, Description, Specification) 
                            VALUES ('$ProductName' , '$ProductType' , '$WattsKVA' , '$Availability', NULL, '$Description', '$Specification')";
            if (mysqli_query($conn, $sql_insert)) {
              echo json_encode(['success' => true]);
                header('Content-Type: application/json');
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
          $WattsKVA = [];
          while ($row = $result->fetch_assoc()) {
              $WattsKVA[] = ['value' => $row['Watts_KVA'],'text' => $PrType == 'Solar Panel'? $row['Watts_KVA'].'W': $row['Watts_KVA'].'KVA'];
          }
          echo json_encode(['success' => true, 'data' => ['WattsKVA' => $WattsKVA]]);
      } else {
          echo json_encode(['success' => false, 'message' => 'No Watts/KVA Exists']);
      }

      $stmt->close();
  } else {
      echo json_encode(['success' => false, 'message' => 'SQL prepare error: ' . $conn->error]);
  }

}



if(isset($_POST['save'])){

  $id = $_POST["id"];
  $Availability = $_POST['Availability'] == true ? 1:0;
  $Description=$_POST['Description'];
  $Specification=$_POST['Specification'];
  
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

          $sql = "update products set Availability= '$Availability', Image= '$uploadedImage', Description='$Description', Specification='$Specification' where ProductID='$id'";
          $result = mysqli_query($conn , $sql);
          echo json_encode(['success' => true]);
          header('Content-Type: application/json');
      }
  }
  //WITHOUT IMAGE SUBMISSION
  else{
      $sql = "update products set Availability= '$Availability', Description='$Description', Specification='$Specification' where ProductID='$id'";
          $result = mysqli_query($conn , $sql);
          echo json_encode(['success' => true]);
          header('Content-Type: application/json');
  }
}
else{
  echo json_encode(['success' => false, 'message' => 'SQL prepare error: ' . $conn->error]);
}
$conn->close();
?>