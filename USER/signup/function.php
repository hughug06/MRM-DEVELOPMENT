<?php

//  fullName, emailAddress, passWord
if(isset($_POST['signup']))
{
  $first_name = $_POST['first_name'];
  $last_name = $_POST['last_name'];
  $username = $_POST['username'];
  $email = $_POST['email'];
  $password = $_POST['password'];
  $passWord = $_POST['passWord'];
  require_once('../Database/database.php');

    $sql_insert = "insert into users (firstname,lastname,username,email,password,is_ban,role) 
                   VALUES ('$first_name' , '$last_name' , '$username' , '$email' , '$password', '0'  , 'client')";
    $result = mysqli_query($conn , $sql_insert); 
}
?>