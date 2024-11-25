<?php
require '../../Database/database.php';
require '../../vendor/autoload.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
//first name , lastname, middle name , email address , password , address , city, province , zip code, user typea
if (isset($_POST['signup'])) {
    // Retrieve and sanitize all input values from the form
    $firstname = ucfirst(strtolower(trim($_POST['firstname'])));
    $lastname = ucfirst(strtolower(trim($_POST['lastname'])));
    $middlename = ucfirst(strtolower(trim($_POST['middlename'])));
    $email = filter_var(trim($_POST['email']), FILTER_SANITIZE_EMAIL);
    $password = $_POST['password'];  // Consider hashing the password for security
    $address = ucfirst(trim($_POST['address']));
    $city = ucfirst(strtolower(trim($_POST['city'])));
    $province = ucfirst(strtolower(trim($_POST['province'])));
    $zip_code = trim($_POST['zip_code']);
    $user_type = ucfirst(strtolower(trim($_POST['user_type'])));
    $verify_token = md5(rand());
    $password_pattern = "/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[A-Za-z\d]{6,10}$/";

    // Validate inputs
    if (empty($firstname) || empty($lastname) || empty($middlename) || empty($email) || empty($password)) {
        echo json_encode(['success' => false, 'message' => 'Please fill up required information']);
        exit();
    }

    // Validate password format
    if (!preg_match($password_pattern, $password)) {
        echo json_encode([
            'success' => false, 
            'message' => 'Password must be 6-10 characters long, contain at least one lowercase letter, one uppercase letter, and one number'
        ]);
        exit();
    }

    // Hash the password
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
    $stmt_insert = $conn->prepare("
        INSERT INTO user_info (email, first_name, middle_name, last_name, address, city, province, zip_code, user_type)
        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)
    ");
    $stmt_insert->bind_param(
        "sssssssss",
        $email, 
        $firstname, 
        $middlename, 
        $lastname, 
        $address, 
        $city, 
        $province, 
        $zip_code, 
        $user_type
    );


    if ($stmt_insert->execute()) {
            $user_id = $conn->insert_id;
        
            // Insert into accounts table
        // Insert into accounts table
        $stmt_ins = $conn->prepare("INSERT INTO accounts (user_id, email, password, verify_token) VALUES (?, ?, ?, ?)");
        $stmt_ins->bind_param("isss", $user_id, $email, $password_hash, $verify_token);

        if ($stmt_ins->execute()) {
            // Retrieve the last inserted account_id
            $account_id = $conn->insert_id;

            // Check if the role of the account is 'client'
            $check_role = $conn->prepare("SELECT role FROM accounts WHERE account_id = ?");
            $check_role->bind_param("i", $account_id);
            $check_role->execute();
            $check_role_result = $check_role->get_result();

            if ($check_role_result->num_rows > 0) {
                $row = $check_role_result->fetch_assoc();
                if ($row['role'] === 'client') {
                    // Insert into service_count table
                    $stmt_service = $conn->prepare("INSERT INTO service_count (user_id) VALUES (?)");
                    $stmt_service->bind_param("i", $user_id);

                    if ($stmt_service->execute()) {
                        echo json_encode(['success' => true, 'message' => 'SUCCESS']);
                        email_verification($firstname . " " . $lastname, $email, $verify_token);
                    } else {
                        echo json_encode(['success' => false, 'message' => 'Failed to insert into service_count.']);
                    }
                } 
            } 
        } else {
            echo json_encode(['success' => false, 'message' => 'Failed to insert into accounts.']);
        }
    } else {
        echo json_encode(['success' => false, 'message' => 'Failed to insert data']);
    }

    $stmt_insert->close();
    $stmt->close();
    $stmt_ins->close();
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