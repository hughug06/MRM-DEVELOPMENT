<?php 
require_once '../../Database/database.php';

$appointment_id = $_POST['appointment_id'];
$payment_id = $_POST['payment_id'];
$account_id = $_POST['account_id'];


if(isset($_POST['approve']))    
{
    $sql = "UPDATE chaintercom_appointment SET status = 'delivery' WHERE chaintercomappointid=$appointment_id and account_id=$account_id";
    $sql2 = "UPDATE chaintercom_payment SET payment_status = 'approved' WHERE $payment_id=$payment_id and appointment_id = $appointment_id";
    if(mysqli_query($conn , $sql) && mysqli_query($conn , $sql2))
    {
        echo "Success";
    }
    else
    {
        echo "Failed to connect database";
    }
}
else if(isset($_POST['decline']))
{
    $sql = "UPDATE chaintercom_appointment SET status = 'rejected' WHERE chaintercomappointid=$appointment_id and account_id=$account_id";
    $sql2 = "UPDATE chaintercom_payment SET payment_status = 'declined' WHERE $payment_id=$payment_id and appointment_id = $appointment_id";
    if(mysqli_query($conn , $sql) && mysqli_query($conn , $sql2))
    {
        echo "Success";
    }
    else
    {
        echo "Failed to connect database";
    }
}
?>