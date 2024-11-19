<?php 
session_start();
require_once '../../Database/database.php';
$worker_id = $_SESSION['user_id'];
$working_id = $_POST['working_id'];

$sql = "select * from worker_ongoing
inner join service_booking on service_booking.booking_id = worker_ongoing.booking_id
where  worker_id = '$worker_id' and working_id = '$working_id'
";
$result = mysqli_query($conn , $sql);
if(mysqli_num_rows($result) > 0){
    $row = mysqli_fetch_assoc($result);
    $status = $row['status'];
    $final_status = '';
    
    switch ($status) {
        case 'pick_up':
            $final_status = 'delivery';
          break;
            case 'delivery':
                $final_status = 'arrive';
            break;
                case 'arrive':
                    $final_status = 'ongoing_construction';
                break;
                case 'ongoing_construction':
                    $final_status = 'checking';
                    break;
                    case 'checking':
                        $final_status = 'completed';
                        break;
                        case 'completed':
                            // CREATE DATABASE THAT WILL STORE ALL FINISH WORKS WITH MAINTENANCE TIME
                            break;
    default:
          //code block
    }
  
    $upd = "UPDATE worker_ongoing SET status='$final_status' WHERE working_id = '$working_id' AND worker_id = '$worker_id'";
    $result_upd = mysqli_query($conn ,$upd);
}



?>