<?php 
 require_once '../../Database/database.php';
 session_start();

 if (isset($_POST['submit'])) {
        
   $account_id = $_SESSION['account_id'];
   $reference_number = $_POST['reference_number'];
   $bank_name = $_POST['bank_name'];
   $payment_method = $_POST['payment_method'];
   $date = $_POST['date'];
   $quotation_id = $_POST['quotation_id'];
   $appointment_id = $_POST['chaintercomappointid'];

   $sql = "INSERT INTO chaintercom_payment (quotation_id , appointment_id, reference_number , bank_name , payment_method , date , payment_status)
    VALUES ('$quotation_id', '$appointment_id', '$reference_number' , '$bank_name' , '$payment_method' , '$date' , 'confirmed')";
    $result = mysqli_query($conn , $sql);
    if($result)
    {
        $upd = "UPDATE chaintercom_appointment SET status='approval' WHERE chaintercomappointid='$appointment_id' AND account_id = '$account_id'"; 
        $upd_result = mysqli_query($conn , $upd);
        header("location: chaintercom_appointments.php");
    }
    else
    {
        echo "Error accessing database";
    }
}
?>