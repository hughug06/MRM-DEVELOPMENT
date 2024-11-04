<?php
require '../../Database/database.php';
require '../../vendor/autoload.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

if (isset($_POST['signup'])) {
    $firstname = ucfirst(strtolower(trim($_POST['firstname'])));
    $lastname = ucfirst(strtolower(trim($_POST['lastname'])));
    $middlename = ucfirst(strtolower(trim($_POST['middlename'])));
    $email = trim($_POST['email']);
    $password = $_POST['password'];
    $verify_token = md5(rand());

    $name_pattern = "/^[a-zA-Z\s]+$/"; 
    $password_pattern = "/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[A-Za-z\d]{6,10}$/";

    // Validate inputs
    if (empty($firstname) || empty($lastname) || empty($middlename) || empty($email) || empty($password)) {
        echo json_encode(['success' => false, 'message' => 'Please fill up required information']);
        exit();
    }

    if (!preg_match($name_pattern, $firstname) || !preg_match($name_pattern, $lastname) || (!empty($middlename) && !preg_match($name_pattern, $middlename))) {
        echo json_encode(['success' => false, 'message' => 'Names can only contain letters and spaces']);
        exit();
    }

    if (!preg_match($password_pattern, $password)) {
        echo json_encode(['success' => false, 'message' => 'Password must be 6-10 characters long, contain at least one lowercase letter, one uppercase letter, and one number']);
        exit();
    }

    $password_hash = password_hash($password, PASSWORD_DEFAULT);

    // Check if email exists using prepared statements
    $stmt = $conn->prepare("SELECT * FROM user_info WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if ($result->num_rows > 0) {
        echo json_encode(['success' => false, 'message' => 'Email already exists']);
        exit();
    }

    // Insert user info
    $stmt = $conn->prepare("INSERT INTO user_info (email, first_name, middle_name, last_name) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $email, $firstname, $middlename, $lastname);
    $userinfo_result = $stmt->execute();

    if ($userinfo_result) {
        $user_id = $conn->insert_id;
        
        // Insert into accounts table
        $stmt = $conn->prepare("INSERT INTO accounts (user_id, email, password, verify_token) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("isss", $user_id, $email, $password_hash, $verify_token);
        $stmt->execute();
        
        echo json_encode(['success' => true, 'message' => 'SUCCESS']);
        email_verification($firstname . " " . $lastname, $email, $verify_token);
    } else {
        echo json_encode(['success' => false, 'message' => 'Failed to insert data']);
    }

    $stmt->close();
    $conn->close();
}



function email_verification($name,$email,$verify_token){
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
      <p>Click here to verify your account<a href='mrm-eg.online/verify_email.php?token=$verify_token'>Verify Email</a></p>
      
      ";
  
      $mail->Body = $email_template;
  
      // Send the email
      $mail->send();
  
  } catch (Exception $e) {
      echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
  }
}

?>