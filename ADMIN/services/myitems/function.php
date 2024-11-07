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
$watts_name = $_POST['watts_name'];
$type = $_POST['type'];
$amount = $_POST['watts_amount'];

$sql_insert = "INSERT INTO watts (name, type, amount) 
               VALUES ('$watts_name', '$type', $amount)";
$result = mysqli_query($conn, $sql_insert);


header("Location: manageitems.php");
exit; 

}
else if(isset($_POST['watts_edit'])){
  $watts_id = $_POST['watts_id'];
  $watts_name = $_POST['name'];
  $type = $_POST['type'];
  $amount = $_POST['amount'];

  $sql = "UPDATE watts SET name='$watts_name' , type = '$type' , amount = '$amount' WHERE watts_id=$watts_id";
  $result = mysqli_query($conn , $sql);
  
  header("Location: manageitems.php");
  exit; 
}
else if(isset($_POST['running_save'])){
  $name = $_POST['name'];
  $amount = $_POST['amount'];
  $sql_insert = "INSERT INTO running_hours (name, amount) 
               VALUES ('$name hrs', '$amount')";
  $result = mysqli_query($conn, $sql_insert);

  header("Location: manageitems.php");
  exit; 
}
else if(isset($_POST['running_edit'])){
  $id = $_POST['id']; 
  $name = $_POST['name'];
  $amount = $_POST['amount'];
  $sql = "UPDATE running_hours SET name='$name hrs' ,  amount = '$amount' WHERE running_id=$id";
  $result = mysqli_query($conn , $sql);
  header("Location: manageitems.php");
  exit();
}
else if(isset($_POST['brand_save'])){
  $name = $_POST['name'];
  $amount = $_POST['amount'];
  $sql_insert = "INSERT INTO brand (name, amount) 
               VALUES ('$name', '$amount')";
  $result = mysqli_query($conn, $sql_insert);
  header("Location: manageitems.php");
  exit; 
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