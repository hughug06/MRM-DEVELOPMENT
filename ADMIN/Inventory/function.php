<?php 
require '../../Database/database.php';
session_start();


if(isset($_POST['AddItem']))
{
  $ProductName = $_POST['ProductName'];
  $ProductType = $_POST['ProductType'];
  $stocks = $_POST['stocks'];
  $Availability = $_POST['Availability'] == true ? 1:0;
  $Description = $_POST['Description'];
  $phase = $_POST['item_phase'];
  $Specification = $_POST['Specification'];
  $temp_price = $_POST['price'];

  $sqlgetmarkup = "SELECT markup_percentage FROM service_markup WHERE markup_id = 1";
  $result = mysqli_query($conn, $sqlgetmarkup);
  if ($result && mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    $markup_value = $row['markup_percentage'] / 100;
}
  

$markup = $temp_price * $markup_value;
$price = $temp_price + $markup;

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

        $sql_insert = "insert into products (ProductName,ProductType, item_phase, Watts_KVA ,Availability, Image, Description, Specification, stock, price) 
                          VALUES ('$ProductName' , '$ProductType' , '$phase' ,  '$WattsKVA' , '$Availability', '$uploadedImage', '$Description' , '$Specification', '$stocks', '$price')";
          if (mysqli_query($conn, $sql_insert)) {
            $user_id = $_SESSION['user_id'];
            $sql_get_userinfo = "select * from user_info where user_id = $user_id";
            $result = mysqli_query($conn , $sql_get_userinfo);
            if($result->num_rows > 0){
              $row = mysqli_fetch_assoc($result);
              $first_name = $row['first_name'];
              $last_name = $row['last_name'];

              $log_action = "$first_name $last_name: Has added new item: $ProductName";
              $sql_log = "INSERT INTO inventory_logs (user_id, product_name, log_action) 
                VALUES ($user_id, '$ProductName', '$log_action')";
              mysqli_query($conn, $sql_log);
              echo json_encode(['success' => true]);
            }
            else{
              echo json_encode(['message' => 'SQL error on getting user info']);
            }
          }
          else {
              echo "Error: " . $sql . "<br>" . mysqli_error($conn);
          }
      }
          
    }
    //WITHOUT IMAGE SUBMISSION
    else{                                                               
      $sql_insert = "INSERT INTO products (ProductName,ProductType, item_phase , Watts_KVA,Availability, Image, Description, Specification, stock, price) 
                          VALUES ('$ProductName' , '$ProductType' , '$phase' ,   '$WattsKVA' , '$Availability', NULL, '$Description', '$Specification', '$stocks', '$price')";
          if (mysqli_query($conn, $sql_insert)) {
              $user_id = $_SESSION['user_id'];
              $sql_get_userinfo = "select * from user_info where user_id = $user_id";
              $result = mysqli_query($conn , $sql_get_userinfo);
              if($result->num_rows > 0){
                $row = mysqli_fetch_assoc($result);
                $first_name = $row['first_name'];
                $last_name = $row['last_name'];

                $log_action = "$first_name $last_name: Has added new item: $ProductName";
                $sql_log = "INSERT INTO inventory_logs (user_id, product_name, log_action) 
                  VALUES ($user_id, '$ProductName', '$log_action')";
                mysqli_query($conn, $sql_log);
                echo json_encode(['success' => true]);
              }
              else{
                echo json_encode(['message' => 'SQL error on getting user info']);
              }
          } 
          else {
            echo json_encode(['message' => 'SQL error on adding product']);
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
  $sql = "SELECT DISTINCT Watts_KVA FROM products WHERE ProductType = ? ORDER BY Watts_KVA ASC";
  if ($stmt = $conn->prepare($sql)) {
      // Bind parameters
      $stmt->bind_param("s", $PrType);
      // Execute the statement
      $stmt->execute();
      $result = $stmt->get_result();

      if ($result->num_rows > 0) {
          $Watts_KVA = [];
          while ($row = $result->fetch_assoc()) {
              $Watts_KVA[] = ['value' => $row['Watts_KVA'],'text' => $row['Watts_KVA']];
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
  $ProductName = $_POST["ProductName"];
  $Availability = $_POST['Availability'] == true ? 1:0;
  $Description=$_POST['Description'];
  $phase=$_POST['item_phase'];
  $Specification=$_POST['Specification'];
  $stocks = $_POST['stocks'];
  $temp_price = $_POST['price'];
  $sqlgetmarkup = "SELECT markup_percentage FROM service_markup WHERE markup_id = 1";
  $result = mysqli_query($conn, $sqlgetmarkup);
  if ($result && mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    $markup_value = $row['markup_percentage'] / 100;
}
  

  $markup = $temp_price * $markup_value;
  $price = $temp_price + $markup;

  $edit_type = $_POST['editType'];
  $WattsKVA = $_POST['WattsKVA'];
  $ProductType = $_POST['ProductType'];
  
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

          $sql = "update products set ProductName= '$ProductName', ProductType ='$ProductType', item_phase='$phase' ,  Watts_KVA='$WattsKVA', Availability= '$Availability', Image= '$uploadedImage', Description='$Description', Specification='$Specification', stock='$stocks', price='$price' where ProductID='$id'";
          $result = mysqli_query($conn , $sql);
          
            //LOG FOR EDIT PRODUCT
            $user_id = $_SESSION['user_id'];
            $sql_get_userinfo = "select * from user_info where user_id = $user_id";
            $result = mysqli_query($conn , $sql_get_userinfo);
            if($result->num_rows > 0){
              $row = mysqli_fetch_assoc($result);
              $first_name = $row['first_name'];
              $last_name = $row['last_name'];
              if($edit_type == 'product'){
                $log_action = "$first_name $last_name: Has edited the item: $ProductName";
              }
              else{
                $log_action = "$first_name $last_name: Has edited the item: $ProductName";
              }
              $sql_log = "INSERT INTO inventory_logs (user_id, product_name, log_action) 
                VALUES ($user_id, '$ProductName', '$log_action')";
              mysqli_query($conn, $sql_log);
              echo json_encode(['success' => true]);
            }
            else{
              echo json_encode(['message' => 'SQL error on getting user info']);
            }
      }
  }
  //WITHOUT IMAGE SUBMISSION
  else{
      $sql = "update products set ProductName= '$ProductName', ProductType ='$ProductType', item_phase='$phase' , Watts_KVA='$WattsKVA', Availability= '$Availability', Description='$Description', Specification='$Specification', stock='$stocks', price='$price' where ProductID='$id'";
          $result = mysqli_query($conn , $sql);
          
          //LOG FOR EDIT PRODUCT
          $user_id = $_SESSION['user_id'];
            $sql_get_userinfo = "select * from user_info where user_id = $user_id";
            $result = mysqli_query($conn , $sql_get_userinfo);
            if($result->num_rows > 0){
              $row = mysqli_fetch_assoc($result);
              $first_name = $row['first_name'];
              $last_name = $row['last_name'];
              if($edit_type == 'product'){
                $log_action = "$first_name $last_name: Has edited the item: $ProductName";
              }
              else{
                $log_action = "$first_name $last_name: Has edited the item: $ProductName";
              }
              $sql_log = "INSERT INTO inventory_logs (user_id, product_name, log_action) 
                VALUES ($user_id, '$ProductName', '$log_action')";
              mysqli_query($conn, $sql_log);
              echo json_encode(['success' => true]);
            }
            else{
              echo json_encode(['message' => 'SQL error on getting user info']);
            }
  }
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
  header('Content-Type: application/json');
  $id = $_POST["id"];
  $stocks = $_POST['input_dec_stocks'];
  $sql = "select stock from products where ProductID='$id'";
      $result = mysqli_query($conn , $sql);

      if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $current_value = $row['stock'];
    
        // Modify the value (for example, increment by 1)
        $new_value = $current_value - $stocks;
        if($new_value < 0){
          echo json_encode(['success' => false, 'message' => 'Error updating record: No more stocks' . $conn->error]);
        }
        else{
          // Update the value back in the database
          $update_sql = "UPDATE products set stock = ? WHERE ProductID = ?";
          $update_stmt = $conn->prepare($update_sql);
          $update_stmt->bind_param("ii", $new_value, $id);
      
          if ($update_stmt->execute()) {
            echo json_encode(['success' => true]);
          } else {
            echo json_encode(['success' => false, 'message' => 'Error updating record: ' . $conn->error]);
          }
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