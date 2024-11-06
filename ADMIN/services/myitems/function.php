<?php 
require '../../../Database/database.php';
session_start();


if(isset($_POST['AddItem']))
{
  $unit_name = $_POST['unit_name'];
  $quantity = $_POST['quantity'];
  $Description = $_POST['Description'];
  $amount = $_POST['amount'];

  
  if($unit_name != '' || $quantity != '' || $Description != '' || $amount != ''){                                                    
      $sql_insert = "INSERT INTO service_pricing (unit,description,quantity,amount) 
                          VALUES ('$unit_name' , '$Description' , '$quantity' , '$amount')";
          if (mysqli_query($conn, $sql_insert)) {
                echo json_encode(['success' => true]);
          } 
          else {
            echo json_encode(['message' => 'SQL error on adding item']);
          }
  }
  else{
      //ERROR MESSAGE
  }
}
else if(isset($_POST['watts_save'])){
  $watts_name = $_POST['wattsName'];
  $amount = $_POST['wattsAmount'];
  $sql_insert = "INSERT INTO watts (name,amount) 
                          VALUES ('$watts_name' , '$amount' )";
  $result = mysqli_query($conn , $sql_insert);
}
  

elseif(isset($_POST['save'])){

  $id = $_POST["id"];
  $unit = $_POST['unit'];
  $quantity = $_POST['quantity'];
  $description = $_POST['description'];
  $amount = $_POST['amount'];
  
      $sql = "update service_pricing set unit= '$unit', quantity='$quantity', description='$description', amount='$amount' where pricingid='$id'";
          if($result = mysqli_query($conn , $sql)){
              echo json_encode(['success' => true]);
          }
          else{
            echo json_encode(['success' => false, 'message' => 'SQL prepare error: ' . $conn->error]);
          }
}


else{
    echo json_encode(['success' => false, 'message' => 'SQL prepare error: ' . $conn->error]);
}

$conn->close();
?>