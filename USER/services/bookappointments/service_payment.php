<?php 
require_once '../../../ADMIN/authetincation.php';
require_once '../../../Database/database.php';


$account_id = $_POST['account_id'];
$appointment_id = $_POST['appointment_id'];
$total_cost = $_POST['total_cost'];
$reference_number = $_POST['reference_number'];
$bank_name = $_POST['bank_name'];
$payment_method = $_POST['payment_method'];
$date = $_POST['date'];
if(isset($_POST['submit'])){
    $sql = "insert into service_payment(account_id , appointment_id , payment_status , reference_number , bank_name , payment_method , total_cost, bank_date )
            Values('$account_id' , '$appointment_id' , 'checking' , '$reference_number' , '$bank_name' , '$payment_method' , '$total_cost' , '$date')";
    $result = mysqli_query($conn , $sql);
    if($result)
    {
        $upd = "UPDATE appointments SET status='Checking' WHERE appointment_id='$appointment_id' AND account_id = '$account_id'"; 
        $exec_upd = mysqli_query($conn , $upd);
        header("Location: ../myappointments/myappointments.php");
        exit;
       
    }
    else
    {
        "error accessing database";
    }
}

?>