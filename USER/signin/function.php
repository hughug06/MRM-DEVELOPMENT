
<?php

    session_start();
    if(isset($_POST['signin'])){
    $username = $_POST['username'];
    $password = $_POST['password'];
    require_once "../Database/database.php";
    $sql = "SELECT * FROM users WHERE username = '$username' AND password = '$password' LIMIT 1" ;   
    $result = mysqli_query($conn , $sql);
        if($result){
            if(mysqli_num_rows($result))
            {
        
                $row = mysqli_fetch_array($result , MYSQLI_ASSOC);
                if($row['role'] == 'admin')
                {         
                    $_SESSION['auth'] = true;
                    $_SESSION['loggedinuserrole'] = $row['role'];
                    $_SESSION['loggedinuser'] =
                     [
                        'name' => $row['name'],
                        'email' => $row['email']
                    ];
                   //PUT SUCCESS MESSAGE
                    header("location: /MRM-DEVELOPMENT/ADMIN/accountManagement/accountcontrol/user-management.php");
                    exit();
                }
                else
                {
                    if($row['is_ban'] == 1){                   
                        $_SESSION['status'] = "BAN KA DAW";
                        header("location: /MRM-DEVELOPMENT/index.php");
                        exit();                       
                    }
                   
                    $_SESSION['auth'] = true;
                    $_SESSION['loggedinuserrole'] = $row['role'];
                    $_SESSION['loggedinuser'] =
                     [
                        'name' => $row['name'],
                        'email' => $row['email']
                    ];
                    //PUT SUCCESS MESSAGE
                    header("location: /MRM-DEVELOPMENT/USER/solar/solar.php");
                    exit();
                }
                
            }
            else
            {
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