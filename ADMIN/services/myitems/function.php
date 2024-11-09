<?php 
require '../../../Database/database.php';
session_start();


if(isset($_POST['serviceItem_save']))
{
  $unit_name = $_POST['service_unit'];
  $quantity = $_POST['service_quantity'];
  $Description = $_POST['service_description'];
  $amount = $_POST['service_amount'];
                    
      $sql_insert = "INSERT INTO service_pricing (unit,description,quantity,amount) 
                          VALUES ('$unit_name' , '$Description' , '$quantity' , '$amount')";
      $result = mysqli_query($conn , $sql_insert);    
          
      header("Location: manageitems.php");
      exit; 
      
}
else if(isset($_POST['serviceItem_edit']))
{

  $id = $_POST['item_id'];
  $unit = $_POST['item_unit'];
  $description = $_POST['item_description'];
  $quantity = $_POST['item_quantity'];
  $amount = $_POST['item_amount'];

  $sql = "UPDATE service_pricing SET unit='$unit' , description = '$description' , amount = '$amount' , quantity = '$quantity' WHERE pricingid=$id";
  $result = mysqli_query($conn , $sql);
  
  header("Location: manageitems.php");
  exit; 

}
else if(isset($_POST['installation_save'])){
  $delete = "DELETE FROM package_installation_solar;";
  $result_del = mysqli_query($conn , $delete);
  $item_descriptions = $_POST['item_description'];
  $units = $_POST['unit'];
  $quantities = $_POST['quantity'];
  $amounts = $_POST['amount'];
  $total_costs = $_POST['total_cost'];

  $sql = "INSERT INTO package_installation_solar (description, unit, quantity, amount, total_cost) VALUES ";
 // Loop through all the items and build the query for multiple rows
 $valuesArr = [];
 for ($i = 0; $i < count($item_descriptions); $i++) {
     $item_description = mysqli_real_escape_string($conn, $item_descriptions[$i]);
     $unit = mysqli_real_escape_string($conn, $units[$i]);
     $quantity = mysqli_real_escape_string($conn, $quantities[$i]);
     $amount = mysqli_real_escape_string($conn, $amounts[$i]);
     $total_cost = mysqli_real_escape_string($conn, $total_costs[$i]);

     $valuesArr[] = "('$item_description', '$unit', '$quantity', '$amount', '$total_cost')";
 }
 $sql .= implode(',', $valuesArr);
 $result = mysqli_query($conn , $sql);
header("Location: manageitems.php");
exit; 

}
else if(isset($_POST['generator_save'])){
    $delete = "DELETE FROM package_installation_generator;";
    $result_del = mysqli_query($conn , $delete);
    $item_descriptions = $_POST['item_description'];
    $units = $_POST['unit'];
    $quantities = $_POST['quantity'];
    $amounts = $_POST['amount'];
    $total_costs = $_POST['total_cost'];

    $sql = "INSERT INTO package_installation_generator (description, unit, quantity, amount, total_cost) VALUES ";
  // Loop through all the items and build the query for multiple rows
  $valuesArr = [];
  for ($i = 0; $i < count($item_descriptions); $i++) {
      $item_description = mysqli_real_escape_string($conn, $item_descriptions[$i]);
      $unit = mysqli_real_escape_string($conn, $units[$i]);
      $quantity = mysqli_real_escape_string($conn, $quantities[$i]);
      $amount = mysqli_real_escape_string($conn, $amounts[$i]);
      $total_cost = mysqli_real_escape_string($conn, $total_costs[$i]);

      $valuesArr[] = "('$item_description', '$unit', '$quantity', '$amount', '$total_cost')";
  }
  $sql .= implode(',', $valuesArr);
  $result = mysqli_query($conn , $sql);
  header("Location: manageitems.php");
  exit; 
}
else if(isset($_POST['tuneup_save'])){
    $delete = "DELETE FROM package_tuneup_generator;";
    $result_del = mysqli_query($conn , $delete);
    $item_descriptions = $_POST['item_description'];
    $units = $_POST['unit'];
    $quantities = $_POST['quantity'];
    $amounts = $_POST['amount'];
    $total_costs = $_POST['total_cost'];

    $sql = "INSERT INTO package_tuneup_generator (description, unit, quantity, amount, total_cost) VALUES ";
  // Loop through all the items and build the query for multiple rows
  $valuesArr = [];
  for ($i = 0; $i < count($item_descriptions); $i++) {
      $item_description = mysqli_real_escape_string($conn, $item_descriptions[$i]);
      $unit = mysqli_real_escape_string($conn, $units[$i]);
      $quantity = mysqli_real_escape_string($conn, $quantities[$i]);
      $amount = mysqli_real_escape_string($conn, $amounts[$i]);
      $total_cost = mysqli_real_escape_string($conn, $total_costs[$i]);

      $valuesArr[] = "('$item_description', '$unit', '$quantity', '$amount', '$total_cost')";
  }
  $sql .= implode(',', $valuesArr);
  $result = mysqli_query($conn , $sql);
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
  $type = $_POST['type'];
  $sql_insert = "INSERT INTO brand (name, type , amount) 
               VALUES ('$name', '$type' , $amount)";
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