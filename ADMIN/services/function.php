<?php 
session_start();

include '../../Database/database.php';


if (isset($_POST['confirm'])) {
    $admin_id = $_SESSION['admin_id']; 
    $date = $_POST['date'];
    $start_time = $_POST['start_time'];
    $end_time = $_POST['end_time'];

    // Get the current date and add 1 month
    $current_date = new DateTime();
    $one_month_advance = $current_date->add(new DateInterval('P1M'))->format('Y-m-d');

   
    // check if the choose date, start time and end time is available
    $sql_check = "select start_time , end_time , date from service_availability where (start_time <= '$start_time' AND end_time >= '$end_time' AND date = '$date') ";
    $result_check = mysqli_query($conn , $sql_check);
    if(mysqli_num_rows($result_check) > 0)
    {
        echo json_encode(['success' => false, 'message' => 'Date and time not available']);  
    }
    else  if ($date < $one_month_advance) {
        echo json_encode(['success' => false, 'message' => 'Date must be 1 month in advance']);     
    }
    else{
        $sql = "INSERT INTO service_availability (admin_id, date, start_time, end_time, is_available) VALUES ('$admin_id', '$date', '$start_time', '$end_time' , 1)";
        $result = mysqli_query($conn , $sql);
        echo json_encode(['success' => true]);
    }


   

   
}
?>