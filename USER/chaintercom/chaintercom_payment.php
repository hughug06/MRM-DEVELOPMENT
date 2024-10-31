<?php 
 require_once '../../Database/database.php';
 session_start();

 if (isset($_FILES['image']) && $_FILES['image']['error'] == 0) {
        
    // Handle the image upload
    $account_id = $_SESSION['account_id'];
    $image = $_FILES['image'];
    $quotation_id = $_POST['quotation_id'];
    $chaintercomappointid = $_POST['chaintercomappointid'];
 
    // Define the directory where the image will be uploaded
    $targetDir = "../../../assets/images/chaintercom-payment/";
    $targetFile = $targetDir . basename($image['name']);
    $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

    // Check if image file is a valid image type
    $validExtensions = ['jpg', 'jpeg', 'png', 'gif'];
    if (in_array($imageFileType, $validExtensions)) {
        // Ensure the directory exists
        if (!is_dir($targetDir)) {
            mkdir($targetDir, 0755, true);
        }

        // Move the uploaded file to the target directory
        if (move_uploaded_file($image['tmp_name'], $targetFile)) {
            // Insert the image path into the database
            $sql = "INSERT INTO chaintercom_payment (quotation_id,payment_status, payment , appointment_id  ) VALUES ('$quotation_id','confirmed' ,'$targetFile' , '$chaintercomappointid' )";
            $upd = "UPDATE chaintercom_appointment SET status='waiting' WHERE chaintercomappointid='$chaintercomappointid' AND account_id = '$account_id'"; 
            $upd_result = mysqli_query($conn , $upd);
            if ($conn->query($sql) === TRUE) {
              // SUCCESS    
              
                header("Location: /MRM-DEVELOPMENT/USER/dashboard/user-dashboard.php");
            } else {
                echo "Error inserting record: " . $conn->error;
                
            }
        } else {
            echo "Error uploading the file.";
            
        }
    } else {
        echo "Invalid file type. Only JPG, JPEG, PNG, and GIF files are allowed.";
      
    }
}
?>