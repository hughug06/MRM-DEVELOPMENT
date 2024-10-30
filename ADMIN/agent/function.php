<?php 
require '../../Database/database.php';
session_start();

if(isset($_POST['save'])){

  $Availability = $_POST['Availability'] == true ? 1:0;
  $Description=$_POST['Description'];
  $Specification=$_POST['Specification'];
  //WITHOUT IMAGE SUBMISSION
      $sql = "update products set Availability= '$Availability', Description='$Description', Specification='$Specification' where ProductID='$id'";
          $result = mysqli_query($conn , $sql);
          echo json_encode(['success' => true]);
  
}
elseif (isset($_GET['PrType'])) {
    // Use a prepared statement to prevent SQL injection
    $sql = "SELECT ProductID, ProductName FROM products Where Availability = 1";
    if ($stmt = $conn->prepare($sql)) {
        // Execute the statement
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $products = [];
            while ($row = $result->fetch_assoc()) {
                $products[] = ['value' => $row['ProductID'], 'text' => $row['ProductName']];
            }
            echo json_encode(['success' => true, 'data' => ['products' => $products]]);
        } else {
            echo json_encode(['success' => false, 'message' => 'No products exist']);
        }

        // Close the statement
        $stmt->close();
    }
}
else{
  echo json_encode(['success' => false, 'message' => 'SQL prepare error: ' . $conn->error]);
}

$conn->close();
?>