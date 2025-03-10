<?php 
require '../../Database/database.php';
session_start();

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require '../../vendor/autoload.php';

if (isset($_GET['PrType'])) {
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
    $product_id = $_POST['product_id'];
    $quantity = $_POST['quantity'];
    $date = $_POST['date'];
    $start_time = $_POST['start_time'];
    $end_time = $_POST['end_time'];
    $user_id = $_SESSION['user_id'];
    $location = $_POST['location'];
    $contact = $_POST['contact'];
    $availability_id = $_POST['availability_id'];


    $sql_insert = "insert into kanban (client_email, name, contact , product_id, location, product_quantity, date, start_time, end_time, kanban_status, user_id)
                VALUES ('$email' , '$name' , '$contact' , '$product_id', '$location' , '$quantity' , '$date' , '$start_time', '$end_time', 'checking', '$user_id')";
    if (mysqli_query($conn, $sql_insert)) {
        $update_availability = "UPDATE service_availability SET is_available='0' WHERE availability_id = '$availability_id'";
        if(mysqli_query($conn , $update_availability)){
            echo json_encode(['success' => true]); 
        } 
    }

}


//for getting tasks
elseif (isset($_GET['gettasks']) && isset($_SESSION['user_id'])) {
    $user_id = $_SESSION['user_id'];
    $sql = "
SELECT *
FROM kanban k
LEFT JOIN service_booking sb ON sb.booking_id = k.booking_id
LEFT JOIN service_payment sp ON sp.booking_id = sb.booking_id
WHERE k.user_id = ?";


    if ($stmt = $conn->prepare($sql)) {
        // Bind parameters
        $stmt->bind_param("i", $user_id); // Assuming user_id is an integer

        // Execute the statement
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $info = [];
            while ($row = $result->fetch_assoc()) {
                $productsid = $row['product_id'];
                $productname = ''; // Initialize the productname variable
                $sqlget = "SELECT ProductName FROM products WHERE ProductID = ?";
                if ($stmt2 = $conn->prepare($sqlget)) { // Use a different variable for the inner statement
                    $stmt2->bind_param("i", $productsid);

                    // Execute the statement
                    $stmt2->execute();
                    $result2 = $stmt2->get_result(); // Use a different variable for the inner result
                    if ($result2->num_rows > 0) {
                        while ($row2 = $result2->fetch_assoc()) { // Use a different variable for the inner row
                            $productname = $row2['ProductName'];
                        }
                    }
                    $stmt2->close(); // Close the inner statement here
                }

                $reason = "";
                if($row['kanban_status'] == "cancelled"){
                    $cancelid=$row['booking_id'];
                    $sql2 = "SELECT * FROM cancel_reason WHERE booking_id =?";
                    if($stmt3 = $conn->prepare($sql2)){
                        $stmt3->bind_param("i", $cancelid);
                        $stmt3->execute();
                        $result3 = $stmt3->get_result();
                        if($result3->num_rows > 0){
                            while ($row3 = $result3->fetch_assoc()) { // Use a different variable for the inner row
                                $reason = $row3['reason'];
                            }
                        }
                    }
                }

                $info[] = [
                    'kanban_id' => $row['kanban_id'],
                    'status' => $row['kanban_status'],
                    'email' => $row['client_email'],
                    'name' => $row['name'],
                    'product' => $productname,
                    'product_type' => $row['product_type'],
                    'pin_location' => $row['pin_location'],
                    'quantity' => $row['quantity'],
                    'total_cost' => $row['total_cost'],
                    'booking_id' => $row['booking_id'],
                    'cancel_reason' => $reason,
                    'availability_id' => $row['availability_id'],
                    'user_id' => $_SESSION['user_id'],
                ];
            }
            echo json_encode(['success' => true, 'data' => ['info' => $info]]);
        } else {
            echo json_encode(['success' => true, 'data' => ['info' => []]]);
        }

        $stmt->close(); // Close the main statement
    }
}


//for deleting tasks
elseif (isset($_POST['delete'])) {
    $deleteid = $_POST['delete'];
    $sql = "UPDATE kanban SET kanban_status = 'cancelled' WHERE kanban_id=$deleteid";
    $result = mysqli_query($conn , $sql);
    if($result)
    {
        echo json_encode(['success' => true, 'message' => 'Successfully cancelled']);
    }
    else{
        echo json_encode(['success' => false, 'message' => 'Unsuccessful cancel']);
    }
    
}

elseif (isset($_POST['PrType'])) {
    $PrType = $_POST['PrType'];
    $typeuse;
    if($PrType == 'generator'){
        $typeuse = 'Generator';
    }
    elseif($PrType == 'solar'){
        $typeuse = 'Solar Panel';
    }
    // Use a prepared statement to prevent SQL injection
    $sql = "SELECT ProductName, ProductID FROM products WHERE ProductType = ?";
    if ($stmt = $conn->prepare($sql)) {
        // Bind parameters
        $stmt->bind_param("s", $typeuse);
        // Execute the statement
        $stmt->execute();
        $result = $stmt->get_result();
  
        if ($result->num_rows > 0) {
            $products = [];
            while ($row = $result->fetch_assoc()) {
                $products[] = ['value' => $row['ProductID'],'text' => $row['ProductName']];
            }
            echo json_encode(['success' => true, 'data' => ['products' => $products]]);
        } else {
            echo json_encode(['success' => false, 'message' => 'No Products Exists']);
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