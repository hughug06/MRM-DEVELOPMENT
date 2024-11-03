<?php
require '../../Database/database.php';
session_start();
if(isset($_POST['pick']))
{
    $userid = $_POST['user_id']; 
    $workerid= $_POST['worker_id'];
    $appointmentid = $_POST['appointment_id'];
    $payment_id = $_POST['payment_id'];
    $admin_id = $_SESSION['admin_id'];  
    

    $select = "select * from accounts inner join user_info on user_info.user_id = accounts.user_id where account_id = '$workerid'";
    $select_exec = mysqli_query($conn , $select);
    $row = mysqli_fetch_assoc($select_exec);
    $name = $row['first_name'] . " " . $row['last_name'];
    $sql = "INSERT INTO service_worker(worker_name , account_id , user_id , admin_id , appointment_id , payment_id ) VALUES ('$name' , '$workerid' , '$userid' , '$admin_id' , '$appointmentid' , '$payment_id' )";

    $result = mysqli_query($conn , $sql);
    if($result){
        $sql1 = "UPDATE service_payment SET payment_status = 'approved' WHERE account_id = '$userid' AND appointment_id = '$appointmentid'";    
        $sql2 = "UPDATE appointments SET status = 'Approved' WHERE account_id = '$userid' AND  appointment_id = '$appointmentid'";  
        $sql_result = mysqli_query($conn , $sql1);
        $sql2_result = mysqli_query($conn , $sql2);
        header("Location: appointment.php");
        exit();
    }   
}






?>