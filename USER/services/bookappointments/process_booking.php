<?php
    require_once '../../../ADMIN/authetincation.php';
    require_once '../../../Database/database.php';
   
    if (isset($_POST['save_payment'])) {
    
            $availability_id = $_POST['availability_id'];
            $user_id = $_SESSION['user_id'];
            $pin_location = $_POST['location'];
            $quantity = $_POST['quantity'];
            $kva = $_POST['kva'];
            $running_hours = $_POST['running_hours'];
            $brand = $_POST['brand'];
            $total_cost = $_POST['total_cost'];

            $date = $_POST['date'];
            $payment_method = $_POST['payment_method'];
            $bank_name = $_POST['bank_name'];
            $reference_number = $_POST['reference_number'];
            // Retrieve POST data
            $service_type = $_POST['serviceType'];
            $product_type = $_POST['productType'];
            $first_payment = $_POST['first_payment'];
      

// Create the SQL statement
$sql = "INSERT INTO service_booking (
            user_id, 
            availability_id, 
            service_type, 
            product_type, 
            pin_location, 
            quantity, 
            KVA, 
            running_hours, 
            brand, 
            payment_method, 
            bank_name, 
            payment_date, 
            payment_status, 
            booking_status
        ) VALUES (
            '$user_id',
            '$availability_id',
            '$service_type',
            '$product_type',
            '$pin_location',
            '$quantity',
            '$kva',
            '$running_hours',
            '$brand',
            '$payment_method',
            '$bank_name',
            '$date',
            'advance_payment',  -- Example default value for payment_status
            'pending'         -- Example default value for booking_status       
        )";

$result = mysqli_query($conn , $sql);

 $booking_id = $conn->insert_id;
 $sql2 = "INSERT INTO service_payment(booking_id, first_payment, first_reference, total_cost)
 VALUES ('$booking_id', '$first_payment', '$reference_number', '$total_cost')";

$result2 = mysqli_query($conn , $sql2);
    }
   
   header("Location: service.php");
   exit();
?>