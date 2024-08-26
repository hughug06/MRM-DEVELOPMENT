<?php 

require '../../Database/database.php';

<<<<<<< HEAD
=======

>>>>>>> jolo
//ADD USER
if(isset($_POST['saveuser']))
{
    $fullname = $_POST['fullname'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $email = $_POST['email'];
    $role = $_POST['role'];
    $ban = $_POST['is_ban'] == true ? 1:0;
 
    if($fullname != '' || $username != '' || $password != '' || $email != ''){
            $sql_insert = "insert into users (name,username,email,password,is_ban,role) 
                            VALUES ('$fullname' , '$username' , '$email' , '$password', ' $ban'  , '$role')";
            if (mysqli_query($conn, $sql_insert)) {
                echo "New record created successfully";
                header('location: user-management.php');
                exit();
              } else {
                echo "Error: " . $sql . "<br>" . mysqli_error($conn);
              }
    }
    else{
        //ERROR MESSAGE
    }
}



?>