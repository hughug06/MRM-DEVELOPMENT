<?php
require '../../Database/database.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require '../../vendor/autoload.php';

if(isset($_POST['signup']))
{
  
  $firstname = $_POST['firstname'];
  $lastname = $_POST['lastname'];
  $middlename= $_POST['middlename'];
  $email = $_POST['email'];
  $password = $_POST['password'];
  $verify_token = md5(rand());
  $name_pattern = "/^[a-zA-Z\s]+$/"; // For names
  $password_pattern = "/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[A-Za-z\d]{6,10}$/"; 

  //update details ( start with upper case and the rest is lower case)
  $firstname = ucfirst(strtolower($firstname));
  $lastname = ucfirst(strtolower($lastname));
  $middlename = ucfirst(strtolower($middlename));
//VALIDATE FIRSTNAME
    if(empty($firstname) || empty($lastname) || empty($middlename) || empty($email) || empty($password)){
      echo json_encode(['success' => false, 'message' => 'Please fill up required information']);
      exit();
    }

    if (!preg_match($name_pattern, $firstname)) {
      echo json_encode(['success' => false, 'message' => 'First name can only contain letters and spaces']);
      exit();
    }
//VALIDATE LASTNAME
  if (!preg_match($name_pattern, $lastname)) {
      echo json_encode(['success' => false, 'message' => 'Last name can only contain letters and spaces']);
      exit();
  }
//VALIDATE MIDDLENAME
  if (!empty($middlename) && !preg_match($name_pattern, $middlename)) {
      echo json_encode(['success' => false, 'message' => 'Middle name can only contain letters and spaces']);
      exit();
  }

  // Validate password
  if (!preg_match($password_pattern, $password)) {
    echo json_encode(['success' => false, 'message' => 'Password must be 6-10 characters long, contain at least one lowercase letter, one uppercase letter, and one number']);
    exit();
  }
//HASH PASSWORD, REGEX PURPOSES THATS WHY ITS POSITION HERE
$password_hash = password_hash($password, PASSWORD_DEFAULT);


    $sql_select = "select * from user_info where email = '$email'";
    $select_result = mysqli_query($conn , $sql_select);
    if(mysqli_num_rows($select_result) > 0)  //check if email is already existed
    {
      echo json_encode(['success' => false, 'message' => 'Email already exists']);     
    }
    else
    {
      
      $insert_userinfo = "insert into user_info(email,first_name,middle_name,last_name) values('$email','$firstname','$middlename','$lastname')";
      $userinfo_result = mysqli_query($conn , $insert_userinfo);
      if($userinfo_result)
      {
          $user_id = $conn->insert_id;
          $insert_accounts = "insert into accounts(user_id,email,password,verify_token) values('$user_id' , '$email' , '$password_hash' , '$verify_token')";
          $accounts_result = mysqli_query($conn , $insert_accounts);

      }
      echo json_encode(['success' => true, 'message' => 'SUCCESS']);
      email_veritication($firstname . " " . $lastname ,$email,$verify_token);   
      
    }   
}



function email_veritication($name,$email,$verify_token){
  $mail = new PHPMailer(true);

  try {
      // Server settings
      $mail->isSMTP();                                            // Send using SMTP
      $mail->Host       = 'smtp.gmail.com';                       // Set the SMTP server to send through
      $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
      $mail->Username   = 'janariesimpuerto13@gmail.com';          // SMTP username
      $mail->Password   = 'vmmthgbqsaobqlsk';                    // Use your app-specific password
      $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption
      $mail->Port       = 587;                                    // TCP port to connect to
  
      // Recipients
      $mail->setFrom('janariesimpuerto13@gmail.com', $name); // Use a valid name
      $mail->addAddress($email);                                  // Add recipient
  
      // Content
      $mail->isHTML(true);                                        // Set email format to HTML
      $mail->Subject = 'Email Verification from ARIES TESTING';
      
      // Email template
      $email_template = "
      <h1>MRM E-G  ELECTRIC POWER GENERATION </h1>
      <p>Click here to verify your account<a href='http://localhost/MRM-DEVELOPMENT/verify_email.php?token=$verify_token'>Verify Email</a></p>
      
      ";
  
      $mail->Body = $email_template;
  
      // Send the email
      $mail->send();
  
  } catch (Exception $e) {
      echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
  }
}

?>