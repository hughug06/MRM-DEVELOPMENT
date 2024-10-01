<?php
require_once '../../Database/database.php';
session_start();
if(isset($_POST['pick']))
{
    $userid = $_POST['user_id']; 
    $workerid= $_POST['worker_id'];
    echo $workerid;
    $appointmentid = $_POST['appointment_id'];
    $admin_id = $_SESSION['admin_id'];  
    $select = "select * from accounts inner join user_info on user_info.user_id = accounts.user_id where account_id = '$workerid'";
    $select_exec = mysqli_query($conn , $select);
    $row = mysqli_fetch_assoc($select_exec);
    $name = $row['first_name'] . " " . $row['last_name'];
    $sql = "insert into service_worker(worker_name,account_id,admin_id,user_id,appointment_id)   
            values('$name','$workerid' , '$admin_id' , '$userid' , '$appointmentid')";
    

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