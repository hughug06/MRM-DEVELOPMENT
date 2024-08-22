<?php
//  fullName, emailAddress, passWord
if(isset($_POST['signup'])){
  $fullName = $_POST['fullName'];
  $emailAddress = $_POST['emailAddress'];
  $passWord = $_POST['passWord']; 
  $passWords = $_POST['passWords']; 
  $username = $_POST['username'];

  $errors = array();

  if(empty( $fullName ) or empty( $emailAddress ) or  empty( $passWord ) or empty( $passWords )or empty( $username )){
      array_push($errors , 'all fields are required');
  }
  if(!filter_var($emailAddress, FILTER_VALIDATE_EMAIL)){
    array_push($errors , "Email is invalid");
  }
  if(strlen($passWord) < 8){
    array_push($errors , "Password must be at least 8 characters long");
  }
  if($passWord !== $passWords){
    array_push($errors , "password do not match");
  }

  require_once('../Database/database.php');
  $sql = "SELECT * FROM users WHERE email = '$emailAddress'";
  $result = mysqli_query($conn, $sql);
  $row_count = mysqli_num_rows($result);

  if($row_count > 0){
    array_push($errors , "Email already exist");
  }
  if(count($errors)>0){
    foreach($errors as $error){
      echo "<div class='alert alert-danger'> $error </div>" ;
       } 
  }
  else{
    require_once('../Database/database.php');
    $sql_insert = "INSERT INTO users (name	 , username	 ,email	, password , is_ban, user)
                  VALUES (?,?,?,?,?,?)";
   $stmt = mysqli_stmt_init($conn);
   $preparestmt = mysqli_stmt_prepare($stmt , $sql_insert);
  if($preparestmt){
     $bindparam = mysqli_stmt_bind_param($stmt , "ssssss" ,$fullName,$username ,$emailAddress , $passWord , 0 , "user");
     mysqli_stmt_execute($stmt);
     header("Location: index.php");
  }else{
    die("Failed");
  }
  }
}
  
?>