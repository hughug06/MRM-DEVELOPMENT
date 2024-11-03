<?php 
require '../../Database/database.php';
session_start();

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require '../../vendor/autoload.php';

if(isset($_POST['save'])){

  $Availability = $_POST['Availability'] == true ? 1:0;
  $Description=$_POST['Description'];
  $Specification=$_POST['Specification'];
  //WITHOUT IMAGE SUBMISSION
      $sql = "update products set Availability= '$Availability', Description='$Description', Specification='$Specification' where ProductID='$id'";
          $result = mysqli_query($conn , $sql);
          echo json_encode(['success' => true]);
  
}

elseif (isset($_GET['PrType'])) {
    // Use a prepared statement to prevent SQL injection
    $sql = "SELECT ProductID, ProductName FROM products Where Availability = 1";
    if ($stmt = $conn->prepare($sql)) {
        // Execute the statement
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $products = [];
            while ($row = $result->fetch_assoc()) {
                $products[] = ['value' => $row['ProductID'], 'text' => $row['ProductName']];
            }
            echo json_encode(['success' => true, 'data' => ['products' => $products]]);
        } else {
            echo json_encode(['success' => false, 'message' => 'No products exist']);
        }

        // Close the statement
        $stmt->close();
    }
}


elseif(isset($_POST['addtask'])){
    $email = $_POST['email'];
    $name = $_POST['name'];
    $age = $_POST['age'];
    $location = $_POST['location'];
    $products = $_POST['products'];
    $date = $_POST['date'];
    $start_time = $_POST['start_time'];
    $end_time = $_POST['end_time'];
    $user_id = $_SESSION['user_id'];

    //for php mailer
    $verify_token = md5(rand());

    $sql_insert = "insert into kanban (email, name, age, location, products, date, start_time, end_time, status, user_id, verify_token)
                VALUES ('$email' , '$name' , '$age' , '$location', '$products', '$date' , '$start_time', '$end_time', 'verification', '$user_id', '$verify_token')";
    if (mysqli_query($conn, $sql_insert)) {
        echo json_encode(['success' => true]);
        email_veritication($name ,$email,$verify_token);   
    }

}


//for getting tasks
elseif (isset($_GET['gettasks'])) {
    $user_id = $_SESSION['user_id'];
    $sql = "SELECT * FROM kanban WHERE user_id = ?";
    if ($stmt = $conn->prepare($sql)) {
        // Bind parameters
        $stmt->bind_param("i", $user_id); // Assuming user_id is an integer

        // Execute the statement
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $info = [];
            while ($row = $result->fetch_assoc()) {
                $productsid = json_decode($row['products'], true);
                $productnamearray = [];
                foreach ($productsid as $product) {
                    $sqlget = "SELECT ProductName FROM products WHERE ProductID = ?";
                    if ($stmt2 = $conn->prepare($sqlget)) { // Use a different variable for the inner statement
                        $stmt2->bind_param("i", $product);

                        // Execute the statement
                        $stmt2->execute();
                        $result2 = $stmt2->get_result(); // Use a different variable for the inner result
                        if ($result2->num_rows > 0) {
                            while ($row2 = $result2->fetch_assoc()) { // Use a different variable for the inner row
                                $productnamearray[] = $row2['ProductName'];
                            }
                        }
                        $stmt2->close(); // Close the inner statement here
                    }
                }

                $info[] = [
                    'kanban_id' => $row['kanban_id'],
                    'status' => $row['status'],
                    'email' => $row['email'],
                    'name' => $row['name'],
                    'location' => $row['location'],
                    'products' => $productnamearray
                ];
            }
            echo json_encode(['success' => true, 'data' => ['info' => $info]]);
        } else {
            echo json_encode(['success' => true, 'message' => 'No tasks']);
        }

        $stmt->close(); // Close the main statement
    }
}

//for deleting tasks
elseif (isset($_POST['delete'])) {
    $deleteid = $_POST['delete'];
    $sql = "DELETE from kanban where kanban_id=$deleteid";
    $result = mysqli_query($conn , $sql);
    if($result)
    {
        echo json_encode(['success' => true]);
    }
    
}


else{
  echo json_encode(['success' => false, 'message' => 'SQL prepare error: ' . $conn->error]);
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
        <p>Click here to verify your account<a href='http://localhost/MRM-DEVELOPMENT/ADMIN/agent/verify_email.php?token=$verify_token'>Verify Email</a></p>
        
        ";
    
        $mail->Body = $email_template;
    
        // Send the email
        $mail->send();
    
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
  }

$conn->close();
?>