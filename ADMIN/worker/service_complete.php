<?php 
require_once '../../ADMIN/authetincation.php';
require_once '../../Database/database.php';
$worker_id = $_SESSION['worker_id'];
$account_id = $_GET['account_id'];
$appointment_id = $_GET['appointment_id'];
$payment_id = $_GET['payment_id'];
$pricing_id = $_GET['pricing_id'];

$sql = "insert into service_or(client_id , appointment_id , payment_id , worker_id , pricing_id)
        VALUES($account_id , $appointment_id , $payment_id , $worker_id , '$pricing_id')";
$result = mysqli_query($conn , $sql);
if($result){
    $sql1 = "UPDATE appointments SET status = 'Completed' WHERE account_id = '$account_id' AND  appointment_id = '$appointment_id'";
    $sql2 = "UPDATE accounts SET service_count = service_count - 1 WHERE account_id = '$account_id'";
    if(mysqli_query($conn,$sql1) && mysqli_query($conn , $sql2)){
            header("Location: dashboard.php");
    }
}
?>