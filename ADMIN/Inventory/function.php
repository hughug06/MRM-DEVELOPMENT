<?php 
require '../../Database/database.php';
require_once '../authetincation.php';


if(isset($_POST['AddItem']))
{
  $item_name = $_POST['item_name'];
  $item_type = $_POST['item_type'];
  $stocks = $_POST['stocks'];
  $min_price = $_POST['min_price'];
  $max_price = $_POST['max_price'];
  $power_output = $_POST['power_output'];

  if($item_name != '' || $power_output != '' || $item_type != '' || $min_price != '' || $max_price != '' || $stocks != ''){  
    $sql_insert = "insert into inventory (item_name,item_type,power_output,stock, min_price, max_price) 
                    VALUES ('$item_name' , '$item_type' , '$power_output' , $stocks, '$min_price', '$max_price')";
    if (mysqli_query($conn, $sql_insert)) {
      echo json_encode(['success' => true]);
      header('Content-Type: application/json');
      exit();
    } 
    else {
      echo json_encode(['success' => true, 'message' => mysqli_error($conn)]);
    }
  }
  else{
    //ERROR MESSAGE
  }
}



elseif (isset($_POST['PrType'])) {
  $PrType = $_POST['PrType'];
  // Use a prepared statement to prevent SQL injection
  $sql = "SELECT power_output FROM inventory WHERE item_type = ?";
  if ($stmt = $conn->prepare($sql)) {
      // Bind parameters
      $stmt->bind_param("s", $PrType);
      // Execute the statement
      $stmt->execute();
      $result = $stmt->get_result();

      if ($result->num_rows > 0) {
          $power_output = [];
          while ($row = $result->fetch_assoc()) {
              $power_output[] = ['value' => $row['power_output'],'text' => $PrType == 'Solar Panel'? $row['power_output'].'W': $row['power_output'].'KVA'];
          }
          echo json_encode(['success' => true, 'data' => ['power_output' => $power_output]]);
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
  $stocks = $_POST['stocks'];
  $max_price=$_POST['max_price'];
  $min_price=$_POST['min_price'];
  
  $sql = "update inventory set stock= '$stocks', max_price='$max_price', min_price='$min_price' where itemID='$id'";
      $result = mysqli_query($conn , $sql);
      echo json_encode(['success' => true]);
      header('Content-Type: application/json');
  }
  else{
    echo json_encode(['success' => false, 'message' => 'SQL prepare error: ' . $conn->error]);
}



$conn->close();
?>