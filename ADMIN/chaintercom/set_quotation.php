<?php 
require_once '../../Database/database.php';

$appointment_id = $_POST['appointment_id'];
$account_id = $_POST['account_id'];
$name = $_POST['name'];
$products = $_POST['product'];
$amount = $_POST['amount'];
$status = $_POST['status'];



if(isset($_POST['confirm'])){
    $insert = "INSERT INTO chaintercom_quotation(chaintercomappointid  , account_id  , 	product , amount) 
                VALUES('$appointment_id','$account_id','$products','$amount')";
    $result = mysqli_query($conn , $insert);
    if($result){
        $upd = "UPDATE chaintercom_appointment SET status='waiting' WHERE chaintercomappointid=$appointment_id AND account_id= $account_id";
        $exec = mysqli_query($conn , $upd);
    }

}
else if(isset($_POST['decline'])){
    
}


?>