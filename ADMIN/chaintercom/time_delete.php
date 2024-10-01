<?php
require_once '../../Database/database.php';
if(isset($_GET['id'])){
    $id = $_GET['id'];
    $sql = "DELETE from chaintercom_availability where chainavailability=$id";
    $result = mysqli_query($conn , $sql);
    if($result){
        echo json_encode(['success' => true]);
    }
    else{
        echo json_encode(['message' => 'Deletion Failed']);
    }
    exit;
}

?>