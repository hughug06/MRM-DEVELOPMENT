
<?php
    session_start();
    if(isset($_POST['signin'])){
    $username = $_POST['username'];
    $password = $_POST['password'];
    require_once "../Database/database.php";
    $sql = "SELECT * FROM users WHERE username = '$username' AND password = '$password' LIMIT 1" ;
    
    
    if($username == '' || $password == '')
    {
        //PUT ERROR MESSAGE
        header("location: /MRM-DEVELOPMENT/DEVELOPMENT/incomming-project/index.php"); 
        exit();
    }
    else
    { 
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
                    header("location: /MRM-DEVELOPMENT/DEVELOPMENT/incomming-project/ADMIN/accountManagement/accountcontrol/user-management.php");
                    exit();
                }
                else{
                    if($row['is_ban'] == 1){
                        header("location: /MRM-DEVELOPMENT/DEVELOPMENT/incomming-project/index.php");
                        //SHOW BAN ERROR
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
                    header("location: /MRM-DEVELOPMENT/DEVELOPMENT/incomming-project/USER/solar/solar.php");
                    exit();
                }
                
            }
            else
            {
                header("location: /MRM-DEVELOPMENT/DEVELOPMENT/incomming-project/index.php");
                        //SHOW ERROR MESSAGE
                        exit();
            }
        }
        else
        {
            header("location: /MRM-DEVELOPMENT/DEVELOPMENT/incomming-project/index.php");         //ERROR MESSAGE WHEN $result false
             exit();
        }


        
       
    }
    }
   

?>