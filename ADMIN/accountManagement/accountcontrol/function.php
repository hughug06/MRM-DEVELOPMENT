<?php 

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
    
    $password_hash = password_hash($password , PASSWORD_DEFAULT);
    if($firstname != '' || $lastname != '' || $middlename != '' || $password != '' || $email != '' || $role != '' || $ban != ''){
      $insert_userinfo = "insert into user_info(email,first_name,middle_name,last_name) values('$email','$firstname','$middlename','$lastname')";
      $userinfo_result = mysqli_query($conn , $insert_userinfo);
      if($userinfo_result)
      {
        
          $user_id = $conn->insert_id;
          $insert_accounts = "insert into accounts(user_id,email,password,verify_status,role) values('$user_id' , '$email' , '$password', '1' , '$role')";
          $accounts_result = mysqli_query($conn , $insert_accounts);
          header("location: user-management.php");
          exit();
      }
    }
    else{
        //ERROR MESSAGE
    }
}



?>