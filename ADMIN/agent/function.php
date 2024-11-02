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


elseif(isset($_POST['addtask'])){
    $email = $_POST['email'];
    $name = $_POST['name'];
    $age = $_POST['age'];
    $location = $_POST['location'];
    $products = $_POST['products'];
    $date = $_POST['date'];
    $start_time = $_POST['start_time'];
    $end_time = $_POST['end_time'];
    $user_id = $_SESSION['user_id'];

    $sql_insert = "insert into kanban (email, name, age, location, products, date, start_time, end_time, status, user_id)
                VALUES ('$email' , '$name' , '$age' , '$location', '$products', '$date' , '$start_time', '$end_time', 'verification', '$user_id')";
    if (mysqli_query($conn, $sql_insert)) {
        echo json_encode(['success' => true]);
    }
}

//for getting tasks
elseif (isset($_GET['gettasks'])) {
    // Use a prepared statement to prevent SQL injection
    $user_id = $_SESSION['user_id'];
    $sql = "SELECT * FROM kanban WHERE user_id = ?";
    if ($stmt = $conn->prepare($sql)) {
    // Bind parameters
    $stmt->bind_param("i", $user_id); // Assuming user_id is an integer

        // Execute the statement
        $stmt->execute();
        $result = $stmt->get_result();
  
        if ($result->num_rows > 0) {
            $info = [];
            while ($row = $result->fetch_assoc()) {
                $info[] = ['kanban_id' => $row['kanban_id'] ,'status' => $row['status'],'email' => $row['email'],'name' => $row['name'], 'location'=> $row['location'], 'products' => $row['products']];
            }
            echo json_encode(['success' => true, 'data' => ['info' => $info]]);
        } else {
            echo json_encode(['success' => true, 'message' => 'No tasks']);
        }
  
        $stmt->close();
    } else {
        echo json_encode(['success' => false, 'message' => 'SQL prepare error: ' . $conn->error]);
    }
  
  }
else{
  echo json_encode(['success' => false, 'message' => 'SQL prepare error: ' . $conn->error]);
}

$conn->close();
?>