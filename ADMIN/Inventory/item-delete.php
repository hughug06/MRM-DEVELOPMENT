<?php
    include "../../Database/database.php";
    session_start();
    
    if(isset($_POST['id'])){
        $item_id = $_POST['id'];

        $sqlget = "select ProductName from `products` where ProductID=$item_id";
        $resultget = mysqli_query($conn , $sqlget);
        if($resultget->num_rows > 0){
            $row = mysqli_fetch_assoc($resultget);
            $ProductName = $row['ProductName'];

            $sql = "DELETE from products where ProductID=$item_id";
            $result = mysqli_query($conn, $sql);
            if($result){
                
                 //LOG FOR ADD  
                $user_id = $_SESSION['user_id'];
                $sql_get_userinfo = "select * from user_info where user_id = $user_id";
                $result = mysqli_query($conn , $sql_get_userinfo);
                if($result->num_rows > 0){
                    $row = mysqli_fetch_assoc($result);
                    $first_name = $row['first_name'];
                    $last_name = $row['last_name'];

                    $log_action = "$first_name $last_name: Has deleted item: $ProductName";
                    $sql_log = "INSERT INTO inventory_logs (user_id, product_name, log_action) 
                        VALUES ($user_id, '$ProductName', '$log_action')";
                    mysqli_query($conn, $sql_log);
                    echo json_encode(['success' => true]);
                }
                 else{
                     echo json_encode(['message' => 'Log failed']);
                 }
            }
            else{
                echo json_encode(['message' => 'Delete Failed']);
            }
            
        }
        else{
            echo json_encode(['message' => 'Product Not Found']);
        }

    }
    exit;
?>