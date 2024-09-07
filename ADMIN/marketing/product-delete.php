<?php
    require_once '../authetincation.php'; 
    header('Content-Type: application/json');
    include "../../Database/database.php";
    if(isset($_GET['id'])){
        $ProductID = $_GET['id'];
        $sql = "DELETE from `products` where ProductID=$ProductID";
        $result = mysqli_query($conn , $sql);
        echo json_encode(['status' => true, 'message' => 'Item deleted successfully']);
    }
    exit;
?>