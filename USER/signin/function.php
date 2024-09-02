
<?php

    session_start();
    
    if(isset($_POST['signin'])){
    require_once "../Database/database.php";
    $email = $_POST['email'];
    $password = $_POST['password']; 
    $sql = "SELECT * FROM accounts left join user_info on user_info.email = accounts.email where accounts.email = '$email'";   
    $result = mysqli_query($conn , $sql);
        if($result){


            if(mysqli_num_rows($result))
            {        
                
                $row = mysqli_fetch_array($result);
                $password_hashed = $row['password'];
                if(password_verify($password , $password_hashed))
                {
                   echo "RIGHT PASSWORD";
                    exit();
                    // if($row['role'] == 'admin')
                    // {         
                    //     $_SESSION['auth'] = true;
                    //     $_SESSION['loggedinuserrole'] = $row['role'];
                    //     $_SESSION['loggedinuser'] =
                    //      [
                    //         'name' => $row['name'],
                    //         'email' => $row['email']
                    //     ];
                    //    //PUT SUCCESS MESSAGE
                    //     header("location: /MRM-DEVELOPMENT/ADMIN/accountManagement/accountcontrol/user-management.php");
                    //     exit();
                    // }
                    // else
                    // {
                    //     if($row['is_ban'] == 1){                   
                    //         $_SESSION['status'] = "BAN KA DAW";
                    //         header("location: /MRM-DEVELOPMENT/index.php");
                    //         exit();                       
                    //     }
                       
                    //     $_SESSION['auth'] = true;
                    //     $_SESSION['loggedinuserrole'] = $row['role'];
                    //     $_SESSION['loggedinuser'] =
                    //      [
                    //         'name' => $row['name'],
                    //         'email' => $row['email']
                    //     ];
                    //     //PUT SUCCESS MESSAGE
                    //     header("location: /MRM-DEVELOPMENT/USER/solar/solar.php");
                    //     exit();
                    // }
                }
                else
                {
                    echo "WRONG PASSWORD";
                    exit();
                }
                
                
            }
            else
            {
                //ERROR EMAIL NOT FOUND
                header("location: /MRM-DEVELOPMENT/index.php");
                        //SHOW ERROR MESSAGE
                        exit();
            }
        }
        else
        {
            header("location: /MRM-DEVELOPMENT/index.php");         //ERROR MESSAGE WHEN $result false
             exit();
        }  
    }
    
   

?>