<?php 

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';
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
      $mail->setFrom('janariesimpuerto13@gmail.com', "ARIES"); // Use a valid name
      $mail->addAddress("jonathancarlo.villapando@gmail.com");                                  // Add recipient
  
      // Content
      $mail->isHTML(true);                                        // Set email format to HTML
      $mail->Subject = 'Email Verification from ARIES TESTING';
      
      // Email template
      $email_template = "
      <h1>Welcome to ARIES TESTING!</h1>
      <p>Please click the link below to verify your email:</p>
      <a href='http://localhost/MRM-DEVELOPMENT/verify_email.php?token'>Verify Email</a>
      ";
  
      $mail->Body = $email_template;
  
      // Send the email
      $mail->send();
      echo 'Verification email has been sent successfully';
  } catch (Exception $e) {
      echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
  }

?>