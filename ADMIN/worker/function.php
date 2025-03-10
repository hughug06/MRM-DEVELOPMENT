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
    
    $sql_transfer = $sql_command;
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
                // echo "Record transferred successfully<br>";
            } else {
                // echo "Error: " . $stmt->error . "<br>";
            }
            
            $stmt->close();
        }
    } else {
        // echo "No data found in package_maintenance_generator";
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
    $service_from = $row['service_from'];
    $user_id = $row['client_id'];
    switch ($status) {
        case 'pick_up':
            
            $book_id = isset($_POST['book_id']) ? $_POST['book_id'] : '';   
            $book_id = isset($_POST['book_id']) ? $_POST['book_id'] : '';
            $working_id = isset($_POST['working_id']) ? $_POST['working_id'] : '';
            
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                // Process the static "brand" row
                if (!empty($_POST['brand']) && isset($_POST['damage_brand']) && isset($_POST['number_brand'])) {
                    $brand = $_POST['brand'];
                    $damage_brand = trim($_POST['damage_brand']);
                    $number_brand = intval($_POST['number_brand']);
            
                    // Insert only if there is damage reported
                    if (!empty($damage_brand) && $number_brand > 0) {
                        $sql = "INSERT INTO damage_report (booking_id, working_id, description, damage, quantity, when_happen, created_at)
                                VALUES ('$book_id', '$working_id', '$brand', '$damage_brand', '$number_brand', 'pick_up', CURRENT_TIMESTAMP)";
                        mysqli_query($conn, $sql);
                    }
                }
            
                // Process dynamic rows
                if (isset($_POST['description']) && isset($_POST['damage']) && isset($_POST['number'])) {
                    $descriptions = $_POST['description'];
                    $damages = $_POST['damage'];
                    $quantities = $_POST['number'];
            
                    foreach ($descriptions as $key => $description) {
                        $damage = isset($damages[$key]) ? trim($damages[$key]) : '';
                        $quantity = isset($quantities[$key]) ? intval($quantities[$key]) : 0;
            
                        // Insert only if there is damage reported and quantity > 0
                        if (!empty($damage) && $quantity > 0) {
                            $sql = "INSERT INTO damage_report (booking_id, working_id, description, damage, quantity, when_happen, created_at)
                                    VALUES ('$book_id', '$working_id', '$description', '$damage', '$quantity', 'pick_up', CURRENT_TIMESTAMP)";
                            mysqli_query($conn, $sql);
                        }
                    }
                }
            }
            $notification = "INSERT INTO notification (message, `from`, user_id)
             VALUES ('Worker is on the way', 'from on going booking', '$user_id')";
            $notification_result = mysqli_query($conn , $notification);
            
            $final_status = 'delivery';
            $kanban_status = 'delivery';
            $status_name = 'pick_up';
          break;
            case 'delivery':
                $notification = "INSERT INTO notification (message, `from`, user_id)
                VALUES ('Worker just arrive at your pin location, please pay for second payment', 'from on going booking', '$user_id')";
               $notification_result = mysqli_query($conn , $notification);

                $final_status = 'arrive';
                $kanban_status = 'arrive';
                $status_name = 'delivery';
            break;
                case 'arrive':
                    //CREATE FUNCTION THAT WILL INSERT ALL THE CHECKLIST TO DATABASE
                   
                    $book_id = isset($_POST['book_id']) ? $_POST['book_id'] : '';
             
                        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                            // Handle the first item (brand, damage, and quantity)
                            if (isset($_POST['brand']) && isset($_POST['damage_brand']) && isset($_POST['number_brand'])) {
                                $brand = $_POST['brand'];
                                $damage_brand = $_POST['damage_brand'];
                                $number_brand = $_POST['number_brand'];
                        
                                // Check if damage and quantity are provided
                                if (!empty($damage_brand) && !empty($number_brand)) {
                                    $sql2 = "INSERT INTO damage_report (booking_id, working_id, description, damage, quantity, when_happen, created_at)
                                            VALUES ('$book_id', '$working_id', '$brand', '$damage_brand', '$number_brand', 'pick_up', CURRENT_TIMESTAMP)";
                                    $exec2 = mysqli_query($conn, $sql2);
                                }
                            }
                        
                            // Handle dynamic list rows for description, damage, and quantity
                            if (isset($_POST['description']) && isset($_POST['damage']) && isset($_POST['number'])) {
                                // Retrieve the arrays from the POST data
                                $descriptions = $_POST['description'];
                                $damages = $_POST['damage'];
                                $numbers = $_POST['number'];
                        
                                // Ensure arrays are iterated individually
                                for ($i = 0; $i < count($descriptions); $i++) {
                                    $description = $descriptions[$i];
                                    $damage = isset($damages[$i]) ? $damages[$i] : '';
                                    $number = isset($numbers[$i]) ? $numbers[$i] : '';
                        
                                    // Check if damage and quantity are provided
                                    if (!empty($damage) && !empty($number)) {
                                        $sql = "INSERT INTO damage_report (booking_id, working_id, description, damage, quantity, when_happen, created_at)
                                                VALUES ('$book_id', '$working_id', '$description', '$damage', '$number', 'arrive', CURRENT_TIMESTAMP)";
                                        $exec = mysqli_query($conn, $sql);
                                    }
                                }
                            }
                        }
            
                        $notification = "INSERT INTO notification (message, `from`, user_id)
                        VALUES ('Worker done checking materials needed', 'from ongoing booking', '$user_id')";
                        $notification_result = mysqli_query($conn , $notification);

                    $final_status = 'ongoing_construction';
                    $kanban_status = 'ongoing_construction';
                    $status_name = 'arrive';
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
                                        // echo "Task updated successfully.";
                                    } else {
                                        // echo "Error: " . $stmt->error;
                                    }
                                    
                                    // Close the statement
                                    $stmt->close();
                                } else {
                                    // echo "Error preparing statement: " . $conn->error;
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

                            $notification = "INSERT INTO notification (message, `from`, user_id)
                            VALUES ('worker is done, check the status', 'from ongoing booking', '$user_id')";
                            $notification_result = mysqli_query($conn , $notification);
                            $final_status = 'checking';
                            $kanban_status = 'final_checking';
                            $status_name = 'ongoing_construction';
                           
                        } else {
                            $notification = "INSERT INTO notification (message, `from`, user_id)
                            VALUES ('work is ongoing, $pending_count left before done', 'from ongoing booking', '$user_id')";
                            $notification_result = mysqli_query($conn , $notification);
                            
                        }
                    } else {
                        // echo "Error preparing statement: " . $conn->error;
                    }

                    
                    break;
                    case 'checking':
                        if (isset($_POST['tasks'])) {
                            foreach ($_POST['tasks'] as $description => $task) {
                                $is_done = isset($task['checked']) ? 1 : 0; // If checked, set is_done to 1, otherwise 0
                                
                                // Prepare the SQL query to update the `is_done` column
                                $sql_update = "UPDATE ongoing_checklist SET is_good = ? WHERE description = ?";
                                
                                // Prepare and execute the statement
                                if ($stmt = $conn->prepare($sql_update)) {
                                    // Bind parameters (i = integer, s = string)
                                    $stmt->bind_param('is', $is_done, $description);
                                    
                                    if ($stmt->execute()) {
                                        // echo "Task updated successfully.";
                                    } else {
                                        // echo "Error: " . $stmt->error;
                                    }
                                    
                                    // Close the statement
                                    $stmt->close();
                                } else {
                                    // echo "Error preparing statement: " . $conn->error;
                                }
                            }
                        }
                        $sql_check_done = "SELECT COUNT(*) AS pending_count FROM ongoing_checklist WHERE is_good = 0 AND booking_id = ?";
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
                                if (isset($_POST['booking_id']) && isset($_POST['client_id']) && isset($_POST['working_id'])) {

                                    $start_timestamp = date('Y-m-d H:i:s');
                                    $end_timestamp = date('Y-m-d H:i:s', strtotime('+10 years')); // Add 10 years to the current timestamp
                                    $booking_id_maintenance = $_POST['booking_id'];
                                    $client_id_maintenance = $_POST['client_id'];
                                    $working_id_maintenance = $_POST['working_id'];
                                    $worker_id = $_POST['worker_id'];
                                    $maintenance = "insert into maintenance_complete( client_id , booking_id , working_id , start_time , end_time) 
                                              VALUES('$client_id_maintenance','$booking_id_maintenance','$working_id_maintenance','$start_timestamp','$end_timestamp')";
                                    $maintenance_result = mysqli_query($conn , $maintenance);
                                    $final_status = 'completed';
                                    $kanban_status = 'completed';
                                    $status_name = 'checking';

                                    //UPDATE WORKER_AVAILABILITY , AND CLIENT AVAILABILITY
                                    $worker_availability = "update worker_availability set is_available = '1' where user_id = '$worker_id'";
                                    $client_availability = "update service_count set service_count = 0 where user_id = '$client_id_maintenance'";
                                    $update_booking = "update service_booking set booking_status = 'completed' where booking_id = '$booking_id_maintenance'";
                                    $notification = "INSERT INTO notification (message, `from`, user_id)
                                    VALUES ('Worker done checking the project, please proceed for final payment', 'from ongoing booking', '$user_id')";
                                    $notification_result = mysqli_query($conn , $notification);
                                    $result_worker = mysqli_query($conn , $worker_availability);
                                    $result_client = mysqli_query($conn , $client_availability);
                                    $result_booking = mysqli_query($conn , $update_booking);
                                }   
                               
                               
                   
                                
                            } else {
                                
                            }
                        } else {
                            // echo "Error preparing statement: " . $conn->error;
                        }
                        
                        break;
                        case 'completed':
                            $notification = "INSERT INTO notification (message, `from`, user_id)
                            VALUES ('Project is completed, check for warranty and maintenance. Contact us through chaintercom for more details', 'from ongoing booking', '$user_id')";
                            $notification_result = mysqli_query($conn , $notification);
                            // CREATE DATABASE THAT WILL STORE ALL FINISH WORKS WITH MAINTENANCE TIME
                            break;
    default:
          //code block
    }
    if(!$final_status == null){
        $upd = "UPDATE worker_ongoing SET status='$final_status' WHERE working_id = '$working_id' AND worker_id = '$worker_id'";
        $upd2 = "UPDATE service_history SET `$status_name` = NOW() WHERE working_id = '$working_id'";
        $result_upd = mysqli_query($conn ,$upd);
        $result_upd2 = mysqli_query($conn ,$upd2);

        if($service_from = "agent"){
            // Assuming $conn is your database connection
            $getbookid = "SELECT booking_id FROM worker_ongoing WHERE working_id = '$working_id'";
            $result = $conn->query($getbookid);

            if ($result && $result->num_rows > 0) {
                // Fetch the row as an associative array
                $row = $result->fetch_assoc();
                $booking_ids = $row['booking_id']; // Store the booking_id into $booking_id
            } else {
                // Handle the case where no booking_id was found
                $booking_id = null;
                // echo "No booking ID found for the given working ID.";
            }


            $kanbanupd="UPDATE kanban SET kanban_status='$kanban_status' WHERE booking_id='$booking_ids'";
            $result_updkanban = mysqli_query($conn ,$kanbanupd);
            // echo($kanban_status);
            // echo($booking_id);
        }
    }
    
}

header("location: dashboard.php");
exit();
?>




