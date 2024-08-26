<?php
session_start();
include_once 'database/database.php';
if(isset($_SESSION['auth']))
{
    if(isset($_SESSION['loggedinuserrole']))
    {
        $role = $_SESSION['loggedinuserrole'];
        $email = $_SESSION['loggedinuser']['email'];

        $select_query = "select * from users where email='$email' AND role='$role' LIMIT 1";
        $result = mysqli_query($conn , $select_query);
        if($result)
        {
            if(mysqli_num_rows($result) == 0){
                unset($_SESSION['auth']);
                unset($_SESSION['loggedinuserrole']);
                unset($_SESSION['loggedinuser']);
                header("location: /MRM-DEVELOPMENT/DEVELOPMENT/incomming-project/index.php");
                exit();
            }
            else{
                $row = mysqli_fetch_array($result , MYSQLI_ASSOC);
                if($row['role'] != 'admin'){
                    unset($_SESSION['auth']);
                    unset($_SESSION['loggedinuserrole']);
                    unset($_SESSION['loggedinuser']);
                header("location: /MRM-DEVELOPMENT/DEVELOPMENT/incomming-project/index.php");
                exit();
                }
            }
        }
        else
        {
            unset($_SESSION['auth']);
            unset($_SESSION['loggedinuserrole']);
            unset($_SESSION['loggedinuser']);
            header("location: /MRM-DEVELOPMENT/DEVELOPMENT/incomming-project/index.php");
            exit();
        }
    }   
}



?>
