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


//FOR AGENT TASK ACCEPTANCE
elseif (isset($_POST['confirmtask'])) {
    $kanban_id = $_POST['confirmtask']; 
    // check if the choose date, start time and end time is available
    $sql_check = "update status='ongoing' from kanban where kanban_id = $kanban_id ";
    $result_check = mysqli_query($conn , $sql_check);
    if($result_check)
    {
        echo json_encode(['success' => true]);
    }
    else{
        echo json_encode(['success' => false, 'message' => 'Date and time not available']);
    }


   

   
}

//for deleting tasks
elseif (isset($_POST['delete'])) {
    $deleteid = $_POST['delete'];
    $sql = "DELETE from kanban where kanban_id=$deleteid";
    $result = mysqli_query($conn , $sql);
    if($result)
    {
        echo json_encode(['success' => true]);
    }
    
}
?>