<?php
    include "../../../Database/database.php";
    session_start();
    header('Content-Type: application/json');
    
    
    if (isset($_POST['id'])) {
        $id = $_POST['id'];
        $sql = "DELETE from service_pricing where pricingid=$id";
        $result = mysqli_query($conn , $sql);
        if($result)
        {
            echo json_encode(['success' => true]);
        }
    }
    
?>