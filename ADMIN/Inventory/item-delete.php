<?php
    require_once '../authetincation.php'; 
    include "../../Database/database.php";
    if(isset($_GET['id'])){
        $item_id = $_GET['id'];
        $sql = "DELETE from `inventory` where itemID=$item_id";
        $result = mysqli_query($conn , $sql);
        echo json_encode(['success' => true]);
    }
    header('Content-Type: application/json');
    exit;
?>