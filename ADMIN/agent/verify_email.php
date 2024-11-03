<?php
require_once '../../Database/database.php';

if(isset($_GET['token']))
{
    $token = $_GET['token'];
    $sql_select = "select verify_token,verify_status from kanban where verify_token='$token' LIMIT 1"; //CHECK IF TOKEN EXIST
    $select_result = mysqli_query($conn , $sql_select); // QUERY EXEC

    if(mysqli_num_rows($select_result) > 0)   //CHECK IF THEIR IS TOKEN EXIST
    {
        $row = mysqli_fetch_array($select_result);   
        if($row['verify_status'] == "0")   //CHECK THE ROW IF VERIFY_STATUS is EQUAL to 0
        {
            $user_token = $row['verify_token'];          //GET THE VERIFY_TOKEN AND STORE TO $USER_TOKEN
            $sql_update = "update kanban set verify_status='1', status='waiting' where verify_token='$user_token' limit 1";  //UPDATE VERIFY_STATUS INTO 1 
            $update_result = mysqli_query($conn , $sql_update);
            if($update_result)  //IF TRUE
            {
                
                header("Location: kanban.php");            //RETURN SUCCESS MESSAGE 
                exit();
            }
            else
            {
                header("Location: kanban.php");
                exit();
                //VERIFICATION FAILED
            }
        }
    }
    else
    {
        header("Location: kanban.php");
        exit();     //SHOW TOKEN DOES NOT EXIST
    }
}
else
{
    header("Location: kanban.php");
    exit(); //SHOW ERROR MESSAGE
}

?>