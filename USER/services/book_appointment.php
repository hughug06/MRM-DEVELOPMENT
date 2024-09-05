<?php
session_start();
include '../../Database/database.php';
if(isset($_POST['book']))
    {
        $brand = $_POST['brand'];
        $product = $_POST['product'];
        $power = $_POST['power'];
        $running = $_POST['running_hours'];
        $service_type = $_POST['service_type'];
        $account_id = $_SESSION['account_id'];
        $availability_id = $_SESSION['availability_id'];
        $start_time = $_SESSION['start_time'];
        $end_time = $_SESSION['end_time'];
        $sql = "insert into appointments(account_id , availability_id , brand , product , power , running_hours , service_type  , start_time, end_time)
                            VALUES('$account_id','$availability_id','$brand','$product','$power','$running','$service_type','$start_time','$end_time')";
        $result = mysqli_query($conn , $sql);
        
    }
?>
