<?php
require_once('../Database/database.php');

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require '../../vendor/autoload.php';

if(isset($_POST['signup']))
{
  
  $first_name = $_POST['first_name'];
  $last_name = $_POST['last_name'];
  $username = $_POST['username'];
  $email = $_POST['email'];
  $password = $_POST['password'];
  $verify_token = md5(rand());

    $sql_select = "select email from users where email='$email' LIMIT 1";
    $select_result = mysqli_query($conn , $sql_select);
    if(mysqli_num_rows($select_result) > 0)
    {
      echo "email_exists"; //return to ajax
    }
    else
    {
      email_veritication($first_name,$email,$verify_token);
      $sql_insert = "insert into users (firstname,lastname,username,email,password,is_ban,role,verify_token) 
      VALUES ('$first_name' , '$last_name' , '$username' , '$email' , '$password', '0'  , 'client' , '$verify_token')";
      $insert_result = mysqli_query($conn , $sql_insert); 
      
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