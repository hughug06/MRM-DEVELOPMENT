<?php 
session_start();

include '../../Database/database.php';


if (isset($_POST['confirm'])) {
    $admin_id = $_SESSION['admin_id']; 
    $date = $_POST['date'];
    $start_time = $_POST['start_time'];
    $end_time = $_POST['end_time'];
    // check if the choose date, start time and end time is available
    $sql_check = "select start_time , end_time , date from chaintercom_availability where (start_time <= '$start_time' AND end_time >= '$end_time' AND date = '$date') ";
    $result_check = mysqli_query($conn , $sql_check);
    if(mysqli_num_rows($result_check) > 0)
    {
        echo json_encode(['success' => false, 'message' => 'Date and time not available']);
    }
    else{
        $sql = "INSERT INTO chaintercom_availability (account_id, date, start_time, end_time) VALUES ('$admin_id', '$date', '$start_time', '$end_time')";
        $result = mysqli_query($conn , $sql);
        echo json_encode(['success' => true]);
    }


   

   
}
?>