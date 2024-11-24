<?php
require 'Database/database.php';
require 'vendor/autoload.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
//first name , lastname, middle name , email address , password , address , city, province , zip code, user typea

if (isset($_POST['forgotsent'])) {
    // Retrieve and sanitize all input values from the form
    $email = $_POST['email'];

    // Validate inputs
    if (empty($email)) {
        echo json_encode(['success' => false, 'message' => 'Please enter an email']);
        exit();
    }

    // Check if email exists using prepared statements
    $stmt = $conn->prepare("SELECT * FROM accounts left join user_info on user_info.email = accounts.email where accounts.email =?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) { 
            $name=$row['first_name']." ".$row['middle_name']." ".$row['last_name'];
            $id = $row['account_id'];
        }

        $stmt2 = $conn->prepare("UPDATE accounts set re_password_request='1' WHERE account_id=?");
        $stmt2->bind_param("i", $id);
        $stmt2->execute();


        send_mail($email,$id,$name);
        echo json_encode(['success' => true, 'message' => 'SUCCESS']);

    }
}


function send_mail($email,$id,$name){
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
      $mail->Subject = 'Forgot Password request from ARIES TESTING';
      
      // Email template
      $key = "ansdlakjsdfuasduid";  // This should be a long, secure key
    $iv = openssl_random_pseudo_bytes(openssl_cipher_iv_length('aes-256-cbc'));  // IV for CBC mode


    $encrypted_id = openssl_encrypt($id, 'aes-256-cbc', $key, 0, $iv);

    $encoded_id = base64_encode($encrypted_id);
    $encoded_iv = base64_encode($iv);

    $email_template = "
    <h1>MRM E-G  ELECTRIC POWER GENERATION </h1>
    <p>Click <a href='http://localhost/MRM-DEVELOPMENT/new_password.php?id=$encoded_id&iv=$encoded_iv'>here</a> to reset your account password</p>
    <p>Note: </p>
    ";
  
      $mail->Body = $email_template;
  
      // Send the email
      $mail->send();
  
  } catch (Exception $e) {
      echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
  }
}


?>