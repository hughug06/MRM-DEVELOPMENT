<?php 
session_start();
require_once '../../Database/database.php';
$worker_id = $_SESSION['user_id'];
$working_id = $_POST['working_id'];
$sql_command = isset($_POST['sql']) ? $_POST['sql'] : null;
$brand = isset($_POST['brand']) ? $_POST['brand'] : null;
$status = isset($_POST['status']) ? $_POST['status'] : null;
$quantity_item = isset($_POST['quantity']) ? $_POST['quantity'] : null;
$booking_id = isset($_POST['booking_id']) ? $_POST['booking_id'] : null;
if(isset($_POST['sql']) && $status == 'arrive'){
    $sql_transfer = "SELECT unit, description, quantity FROM package_maintenance_generator";
    $exec = mysqli_query($conn , $sql_transfer);
    if ($exec->num_rows > 0) {
        $is_done = 0; // Default value (0 for not done)
            $updated_at = date('Y-m-d H:i:s'); // Current timestamp
        $sql_insert2 = "INSERT INTO ongoing_checklist (booking_id, description, is_done, quantity, unit, updated_at)
        VALUES ('$booking_id', '$brand', 0, '$quantity_item', 'items', '$updated_at')";
               
        $brand_result = mysqli_query($conn , $sql_insert2);     
        while ($row = $exec->fetch_assoc()) {
            // Insert data into ongoing_checklist
            $unit = $row['unit'];
            $description = $row['description'];
            $quantity = $row['quantity'];
            
            // You need to provide `booking_id` and set default values for other fields if necessary
            
            
            $sql_insert = "INSERT INTO ongoing_checklist (booking_id, description, is_done, quantity, unit, updated_at)
                           VALUES (?, ?, ?, ?, ?, ?)";
                     
            $stmt = $conn->prepare($sql_insert);
            $stmt->bind_param("isisss", $booking_id, $description, $is_done, $quantity, $unit, $updated_at);
            
            if ($stmt->execute()) {
                echo "Record transferred successfully<br>";
            } else {
                echo "Error: " . $stmt->error . "<br>";
            }
            
            $stmt->close();
        }
    } else {
        echo "No data found in package_maintenance_generator";
    }
}

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
                    //CREATE FUNCTION THAT WILL INSERT ALL THE CHECKLIST TO DATABASE
                    $final_status = 'ongoing_construction';
                break;
                case 'ongoing_construction':
                        // Loop through the submitted tasks (checkboxes)
                        if (isset($_POST['tasks'])) {
                            foreach ($_POST['tasks'] as $description => $task) {
                                $is_done = isset($task['checked']) ? 1 : 0; // If checked, set is_done to 1, otherwise 0
                                
                                // Prepare the SQL query to update the `is_done` column
                                $sql_update = "UPDATE ongoing_checklist SET is_done = ? WHERE description = ?";
                                
                                // Prepare and execute the statement
                                if ($stmt = $conn->prepare($sql_update)) {
                                    // Bind parameters (i = integer, s = string)
                                    $stmt->bind_param('is', $is_done, $description);
                                    
                                    if ($stmt->execute()) {
                                        echo "Task updated successfully.";
                                    } else {
                                        echo "Error: " . $stmt->error;
                                    }
                                    
                                    // Close the statement
                                    $stmt->close();
                                } else {
                                    echo "Error preparing statement: " . $conn->error;
                                }
                            }
                        }

                        $sql_check_done = "SELECT COUNT(*) AS pending_count FROM ongoing_checklist WHERE is_done = 0 AND booking_id = ?";
                    if ($stmt_check = $conn->prepare($sql_check_done)) {
                        // Bind the booking_id parameter
                        $stmt_check->bind_param('i', $booking_id);
                        $stmt_check->execute();
                        $result_check = $stmt_check->get_result();
                        $row_check = $result_check->fetch_assoc();
                        
                        $pending_count = $row_check['pending_count'];
                        $stmt_check->close();
                        
                        // Display message based on pending tasks
                        if ($pending_count == 0) {
                            $final_status = 'checking';
                            echo '<div class="alert alert-success" role="alert">
                                    <strong>Congratulations!</strong> All tasks are complete. You are done.
                                </div>';
                        } else {
                            echo '<div class="alert alert-warning" role="alert">
                                    <strong>Pending Tasks:</strong> You still have ' . $pending_count . ' task(s) left to complete.
                                </div>';
                        }
                    } else {
                        echo "Error preparing statement: " . $conn->error;
                    }

                    
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
    if(!$final_status == null){
        $upd = "UPDATE worker_ongoing SET status='$final_status' WHERE working_id = '$working_id' AND worker_id = '$worker_id'";
        $result_upd = mysqli_query($conn ,$upd);
    }
    
}



?>




