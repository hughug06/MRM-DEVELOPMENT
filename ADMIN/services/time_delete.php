<?php
require_once '../../Database/database.php';

if(isset($_GET['id'])){
    $id = $_GET['id'];
    $sql = "DELETE FROM service_availability WHERE availability_id='$id'";

    $result = mysqli_query($conn, $sql);

    if($result){
        echo json_encode(['success' => true]);
    } else {
        echo json_encode(['message' => 'Error: ' . $conn->error, 'success' => false]);
    }
    exit;
}
?>
