<?php
include "../../Database/database.php";
session_start();
if(isset($_GET['id'])){
  $id = $_GET['id'];
  $sql = "select * from products where ProductID=$id";
  $result = $conn->query($sql);
  $row = $result->fetch_assoc();
  while(!$row){
  }

  $Availability = $row['Availability'];
  $NewAvailability = $Availability == 1 ? 0 : 1;
  $sql = "update products set Availability= '$NewAvailability' where ProductID='$id'";
  $result = mysqli_query($conn , $sql);
    
    echo json_encode(['success' => true]);
    exit;
}
?>