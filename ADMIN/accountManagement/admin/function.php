<?php 
require_once '../../authetincation.php';
require '../../../Database/database.php';

//ADD USER
if(isset($_POST['saveuser']))
{
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $middlename = $_POST['middlename'];
    $password = $_POST['password'];
    $email = $_POST['email'];
    $role = $_POST['role'];
    $password_pattern = "/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[A-Za-z\d]{6,10}$/"; 

    
    if(preg_match($password_pattern, $password)){ 

        $password_hash = password_hash($password , PASSWORD_DEFAULT);
        if($firstname != '' || $lastname != '' || $middlename != '' || $password != '' || $email != '' || $role != '' || $ban != ''){
        $insert_userinfo = "insert into user_info(email,first_name,middle_name,last_name) values('$email','$firstname','$middlename','$lastname')";
        $userinfo_result = mysqli_query($conn , $insert_userinfo);
        if($userinfo_result)
        {
            
            $user_id = $conn->insert_id;
            $insert_accounts = "insert into accounts(user_id,email,password,verify_status,role) values('$user_id' , '$email' , '$password_hash', '1' , '$role')";
            $accounts_result = mysqli_query($conn , $insert_accounts);
            

            if($role == 'worker'){

                $insert_worker = "insert into worker_availability(user_id,is_available) values('$user_id' , '1' )";
                $worker_result = mysqli_query($conn , $insert_worker);
                echo json_encode(['success' => true]);
            }
        }
        }
        else{
            echo json_encode(['success' => false, 'message' => 'sql error']);  
        }
    }else{
        echo json_encode(['success' => false, 'message' => 'Password must be 6-10 characters long, contain at least one lowercase letter, one uppercase letter, and one number']);  
    }
}
elseif(isset($_POST['save']))
{
    $id = $_POST["id"];
    $firstname= $_POST['firstname'];
    $lastname=$_POST['lastname'];
    $email = $_POST['email'];
    $role = $_POST['role'];
    $is_ban = $_POST['is_ban'] == true ? 1:0;
    $sql = "update user_info INNER JOIN accounts on user_info.user_id = accounts.user_id set user_info.first_name='$firstname' , user_info.last_name= '$lastname' ,
     user_info.email= '$email' , accounts.is_ban= '$is_ban', role='$role' where accounts.user_id='$id'";
    $result = mysqli_query($conn , $sql);
    echo json_encode(['success' => true]);

}



?>