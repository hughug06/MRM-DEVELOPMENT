

<?php
require_once '../../Database/database.php';
session_start();
if(isset($_POST['add']))
{
   
    $account_id= $_POST['user_id'];
    $appointmentid = $_POST['appointment_id'];    
    echo $account_id;
    echo $appointmentid;
    exit();

    $insert_pricing = "insert into service_pricing(appointment_id , account_id , amount) 
    VALUES('$appointmentid','$account_id','$amount')";
    $result = mysqli_query($conn , $insert_pricing);
    if($result){
        $upd = "UPDATE appointments SET status='Waiting' WHERE appointment_id='$appointmentid'";
        $upd_result = mysqli_query($conn , $upd);
        header("Location: appointment.php");
        exit();
    }   
}

// Include the database connection file

// Retrieve the data from the form using $_POST

$user_id = $_POST['user_id'];
$appointment_id = $_POST['appointment_id'];
$item_descriptions = $_POST['item_description'];
$units = $_POST['unit'];
$quantities = $_POST['quantity'];
$amounts = $_POST['amount'];
$total_costs = $_POST['total_cost'];

echo $user_id;
echo $appointment_id;
exit();
// Check if all data is received
if (!empty($item_descriptions) && !empty($quantities) && !empty($amounts)) {
    // Prepare the insert query
    $sql = "INSERT INTO orders (user_id, appointment_id, item_description, unit, quantity, amount, total_cost) VALUES ";

    // Loop through all the items and build the query for multiple rows
    $valuesArr = [];
    for ($i = 0; $i < count($item_descriptions); $i++) {
        $item_description = mysqli_real_escape_string($conn, $item_descriptions[$i]);
        $unit = mysqli_real_escape_string($conn, $units[$i]);
        $quantity = mysqli_real_escape_string($conn, $quantities[$i]);
        $amount = mysqli_real_escape_string($conn, $amounts[$i]);
        $total_cost = mysqli_real_escape_string($conn, $total_costs[$i]);

        $valuesArr[] = "('$user_id', '$appointment_id', '$item_description', '$unit', '$quantity', '$amount', '$total_cost')";
    }

    // Convert the array into a single string for SQL
    $sql .= implode(',', $valuesArr);

    // Execute the query
    if (mysqli_query($conn, $sql)) {
        echo "Records added successfully!";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
} else {
    echo "Please fill all the fields.";
}

// Close the database connection
mysqli_close($conn);
?>
