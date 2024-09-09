<?php
session_start();
include '../../Database/database.php';
if(isset($_POST['book']))
    {
        //RETRIEVE FULL NAME
        $user = $_SESSION['user_id'];
        $retrieve = "select * from user_info where user_id = '$user'";
        $retrieve_name = mysqli_query($conn , $retrieve);
        if(mysqli_num_rows($retrieve_name) > 0)
        {
            $row = mysqli_fetch_assoc($retrieve_name);
            $first_name = $row['first_name'];
            $last_name = $row['last_name'];
            $fullname = $first_name . " " .$last_name;   
            $brand = $_POST['brand'];
            $product = $_POST['product'];
            $power = $_POST['power'];
            $running = $_POST['running_hours'];
            $service_type = $_POST['service_type'];
            $account_id = $_SESSION['account_id'];
            $availability_id = $_SESSION['availability_id'];
            $date = $_SESSION['date'];
            $start_time = $_SESSION['start_time'];
            $end_time = $_SESSION['end_time'];
            $sql = "insert into appointments(account_id , availability_id , name , brand , product , power , running_hours , service_type, date , start_time, end_time)
                                VALUES('$account_id','$availability_id', '$fullname' , '$brand','$power','$power','$running','$service_type','$date','$start_time','$end_time')";
            $result = mysqli_query($conn , $sql);
        }       
    }
?>

