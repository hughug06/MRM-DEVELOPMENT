<?php
    require_once '../authetincation.php'; 
    include "../../Database/database.php";
    if(isset($_GET['id'])){
        $ProductID = $_GET['id'];
        $sql = "DELETE from `products` where ProductID=$ProductID";
        $result = mysqli_query($conn , $sql);
        echo json_encode(['success' => true]);
    }
    header('Content-Type: application/json');
    exit;
?>