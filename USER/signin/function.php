
<?php
require_once('../../Database/database.php');
session_start();

    $email = $_POST['email'];
    $password = $_POST['password']; 
    
    if(empty($email) || empty($password))
    {
        echo json_encode(['success' => false, 'message' => 'Email and password are required']);
    }
    else{
        $sql = "SELECT * FROM accounts left join user_info on user_info.email = accounts.email where accounts.email = '$email'";   
        $result = mysqli_query($conn , $sql);
        
        if ($result) {
            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                $password_hashed = $row['password'];
                $verify_status = $row['verify_status'];
                $ban = $row['is_ban'];
                $role = $row['role'];
                $id = $row['account_id'];
                $user = $row['user_id'];
                if (password_verify($password, $password_hashed)) {
                    // Successful login
                    if($verify_status == '0'){
                        echo json_encode(['success' => false, 'message' => 'Please verify your email']);
                    }
                    else if($ban == 1){
                        echo json_encode(['success' => false, 'message' => 'You are ban, please contact admin']);
                    }
                    else{
                        $_SESSION['login'] = true;
                        $_SESSION['role'] = $role;
                        
                        if($role == 'admin')
                        {
                            $_SESSION['auth'] = "admin";
                            $_SESSION['admin_id'] =  $id;
                            $_SESSION['user_id'] = $user;                     
                            echo json_encode(['success' => true, 'redirect' => 'ADMIN/dashboard/admin-dashboard.php']);
                        }
                        else if($role == 'client')
                        {
                            $_SESSION['auth'] = "user";
                            $_SESSION['user_id'] = $user;
                            $_SESSION['account_id'] = $id;
                            echo json_encode(['success' => true, 'redirect' => 'USER\dashboard\user-home.php']);

                        }
                        else if($role == 'agent'){
                            $_SESSION['auth'] = "agent";
                            $_SESSION['agent_id'] = $id;
                            $_SESSION['user_id'] = $user; 
                            $_SESSION['account_id'] = $id;
                            echo json_encode(['success' => true, 'redirect' => 'ADMIN\agent\kanban.php']);
                        }
                        else if($role == 'worker'){
                            $_SESSION['auth'] = "worker";
                            $_SESSION['worker_id'] = $id;
                            $_SESSION['user_id'] = $user; 
                            echo json_encode(['success' => true, 'redirect' => 'ADMIN\worker\dashboard.php']);
                        }
                        
                        
                    }
                    
                } else {
                    // Incorrect password
                    echo json_encode(['success' => false, 'message' => 'Incorrect password']);
                }
            } else {
                // Email not found
                echo json_encode(['success' => false, 'message' => 'Email not found']);
            }
        } else {
            // Query error
            echo json_encode(['success' => false, 'message' => 'Database query failed']);
        }
        
    }
  
   
    
   

?>