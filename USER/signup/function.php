<?php
require_once('../Database/database.php');

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
  $password = password_hash($_POST['password'] , PASSWORD_DEFAULT);
  $verify_token = md5(rand());

    $sql_select = "select * from user_info where email = '$email'";
    $select_result = mysqli_query($conn , $sql_select);
    if(mysqli_num_rows($select_result) > 0)
    {
      echo "EMAIL ALREADY EXISTED";  //AJAX ERROR
      exit();
    }
    else
    {
      
      $insert_userinfo = "insert into user_info(email,first_name,middle_name,last_name) values('$email','$firstname','$middlename','$lastname')";
      $userinfo_result = mysqli_query($conn , $insert_userinfo);
      if($userinfo_result)
      {
          $user_id = $conn->insert_id;
          $insert_accounts = "insert into accounts(user_id,email,password,verify_token) values('$user_id' , '$email' , '$password' , '$verify_token')";
          $accounts_result = mysqli_query($conn , $insert_accounts);

      }

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