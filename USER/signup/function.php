<?php
require_once('../Database/database.php');
if(isset($_POST['signup']))
{
  $first_name = $_POST['first_name'];
  $last_name = $_POST['last_name'];
  $username = $_POST['username'];
  $email = $_POST['email'];
  $password = $_POST['password'];
  $verify_token = md5(rand());
  
    $sql_select = "select * from users where email='$email' LIMIT 1";
    $select_result = mysqli_query($conn , $sql_select);
    if(mysqli_num_rows($select_result) > 0)
    {
      echo "email_exists"; //return to ajaxx
    }
    else
    {
      $sql_insert = "insert into users (firstname,lastname,username,email,password,is_ban,role,verify_token) 
      VALUES ('$first_name' , '$last_name' , '$username' , '$email' , '$password', '0'  , 'client' , '$verify_token')";
      $insert_result = mysqli_query($conn , $sql_insert); 
      if($insert_result){
          sendemail_verify($name , $email , $verifiy_token);
      }
    }
    
}

function sendemail_verify($name , $email , $verifiy_token){

}
?>