<?php
include '../../ADMIN/verify.php';
//  fullName, emailAddress, passWord
if(isset($_POST['signup']))
{
  $name = $_POST['name'];
  $username = $_POST['username'];
  $email = $_POST['email'];
  $password = $_POST['password'];
  $passWord = $_POST['passWord'];
  require_once('../Database/database.php');
  
  if($name === '' || $username === '' || $email === '' || $password === '' || $passWord === '' || $password !== $passWord ){
    
      //ERROR MESSAGE
      header("location: /MRM-DEVELOPMENT/DEVELOPMENT/incomming-project/index.php");
      exit();
  } 
  else{
    $sql_insert = "insert into users (name,username,email,password,is_ban,role) 
                   VALUES ('$name' , '$username' , '$email' , '$password', '0'  , 'user')";
    $result = mysqli_query($conn , $sql_insert);
    //SUCCESS MESSAGE
    header("location: /MRM-DEVELOPMENT/DEVELOPMENT/incomming-project/index.php");
    exit();
  }
}
?>