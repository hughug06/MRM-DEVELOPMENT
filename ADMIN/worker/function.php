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
                    
                                // Output data for the first item
                                echo "Brand: $brand <br>";
                                echo "Damage Report: $damage_brand <br>";
                                echo "Number of Damages: $number_brand <br>";
                            } else {
                                echo "No damage or quantity provided for the brand. Skipping insertion.<br>";
                            }
                        }
                    
                        // Handle dynamic list rows for description, damage, and quantity
                        if (isset($_POST['description']) && isset($_POST['damage']) && isset($_POST['number'])) {
                            // Retrieve the arrays from the POST data
                            $descriptions = $_POST['description'];  // Array of descriptions
                            $damages = $_POST['damage'];  // Array of damages
                            $numbers = $_POST['number'];  // Array of quantities
                    
                            // Debugging: Check the lengths of the arrays
                            echo "Description Array Length: " . count($descriptions) . "<br>";
                            echo "Damage Array Length: " . count($damages) . "<br>";
                            echo "Quantity Array Length: " . count($numbers) . "<br>";
                    
                            // Check if arrays have the same length before looping
                            if (count($descriptions) == count($damages) && count($descriptions) == count($numbers)) {
                                // Loop through each item in the arrays and output the data
                                for ($i = 0; $i < count($descriptions); $i++) {
                                    $description = $descriptions[$i];
                                    $damage = $damages[$i];
                                    $number = $numbers[$i];
                    
                                    // Check if damage and quantity are provided
                                    if (!empty($damage) && !empty($number)) {
                                        // Insert data into the database
                                        $sql = "INSERT INTO damage_report (booking_id, working_id, description, damage, quantity, when_happen, created_at)
                                                VALUES ('$book_id', '$working_id', '$description', '$damage', '$number', 'pick_up', CURRENT_TIMESTAMP)";
                                        $exec = mysqli_query($conn, $sql);
                    
                                        // Output data for each dynamic row
                                        echo "Description: $description <br>";
                                        echo "Damage Report: $damage <br>";
                                        echo "Number of Damages: $number <br>";
                                    } else {
                                        echo "Skipping description '$description' due to missing damage or quantity.<br>";
                                    }
                                }
                            } else {
                                echo "Error: Arrays have mismatched lengths.<br>";
                            }
                        }
                    }
                      

            $final_status = 'delivery';
          break;
            case 'delivery':
                $final_status = 'arrive';
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
                    
                                // Output data for the first item
                                echo "Brand: $brand <br>";
                                echo "Damage Report: $damage_brand <br>";
                                echo "Number of Damages: $number_brand <br>";
                            } else {
                                echo "No damage or quantity provided for the brand. Skipping insertion.<br>";
                            }
                        }
                    
                        // Handle dynamic list rows for description, damage, and quantity
                        if (isset($_POST['description']) && isset($_POST['damage']) && isset($_POST['number'])) {
                            // Retrieve the arrays from the POST data
                            $descriptions = $_POST['description'];  // Array of descriptions
                            $damages = $_POST['damage'];  // Array of damages
                            $numbers = $_POST['number'];  // Array of quantities
                    
                            // Debugging: Check the lengths of the arrays
                            echo "Description Array Length: " . count($descriptions) . "<br>";
                            echo "Damage Array Length: " . count($damages) . "<br>";
                            echo "Quantity Array Length: " . count($numbers) . "<br>";
                    
                            // Check if arrays have the same length before looping
                            if (count($descriptions) == count($damages) && count($descriptions) == count($numbers)) {
                                // Loop through each item in the arrays and output the data
                                for ($i = 0; $i < count($descriptions); $i++) {
                                    $description = $descriptions[$i];
                                    $damage = $damages[$i];
                                    $number = $numbers[$i];
                    
                                    // Check if damage and quantity are provided
                                    if (!empty($damage) && !empty($number)) {
                                        // Insert data into the database
                                        $sql = "INSERT INTO damage_report (booking_id, working_id, description, damage, quantity, when_happen, created_at)
                                                VALUES ('$book_id', '$working_id', '$description', '$damage', '$number', 'arrive', CURRENT_TIMESTAMP)";
                                        $exec = mysqli_query($conn, $sql);
                    
                                        // Output data for each dynamic row
                                        echo "Description: $description <br>";
                                        echo "Damage Report: $damage <br>";
                                        echo "Number of Damages: $number <br>";
                                    } else {
                                        echo "Skipping description '$description' due to missing damage or quantity.<br>";
                                    }
                                }
                            } else {
                                echo "Error: Arrays have mismatched lengths.<br>";
                            }
                        }
                    }

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

                                    //UPDATE WORKER_AVAILABILITY , AND CLIENT AVAILABILITY
                                    $worker_availability = "update worker_availability set is_available = '1' where user_id = '$worker_id'";
                                    $client_availability = "update service_count set service_count = 0 where user_id = '$client_id_maintenance'";
                                    $update_booking = "update service_booking set booking_status = 'completed' where booking_id = '$booking_id_maintenance'";
                                    $result_worker = mysqli_query($conn , $worker_availability);
                                    $result_client = mysqli_query($conn , $client_availability);
                                    $result_booking = mysqli_query($conn , $update_booking);
                                }   
                               
                               
                   
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

header("location: dashboard.php");

?>




