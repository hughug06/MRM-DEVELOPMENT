<?php
require_once '../../Database/database.php';
session_start();
if(isset($_POST['pick']))
{
   
    $account_id= $_POST['user_id'];
    $appointmentid = $_POST['appointment_id'];    
    $amount = $_POST['amount'];   

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






?>