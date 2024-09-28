<?php
    session_start();
    require_once '../../Database/database.php';
    $account_id = $_SESSION['account_id'];
    
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $sql = "UPDATE appointments SET status = 'canceled' WHERE appointment_id = '$id'";
        $result = mysqli_query($conn , $sql);
        if($result)
        {
            $acc_upd = "UPDATE accounts SET service_count = service_count - 1 WHERE account_id = '$account_id'";
            $update_result = mysqli_query($conn , $acc_upd);
        }
        echo "SUCCESS";
        exit();
    }
   
?>