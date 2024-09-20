<?php
require_once '../../Database/database.php';
session_start();
if(isset($_POST['pick']))
{
    $userid = $_POST['user_id']; 
    $workerid= $_POST['account_id'];
    $admin_id = $_SESSION['admin_id']; 
    $appointmentid = $_POST['appointment_id'];
    $sql = "insert into service_worker(account_id,admin_id,user_id,appointment_id)   
            values('$workerid' , '$admin_id' , '$userid' , '$appointmentid')";
    $result = mysqli_query($conn , $sql);
    if($result){
        $upd = "UPDATE appointments SET status='confirmed' WHERE appointment_id='$appointmentid'";
        $upd_result = mysqli_query($conn , $upd);
        header("Location: appointment.php");
        exit();
    }
    
}






?>