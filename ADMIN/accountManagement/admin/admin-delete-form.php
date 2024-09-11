<?php
require_once '../../authetincation.php';
    include "../../../Database/database.php";
    
    
    if (isset($_POST['id'])) {
        $id = $_POST['id'];
        $sql = "DELETE from user_info where user_id=$id";
        $result = mysqli_query($conn , $sql);
        if($result)
        {
            echo json_encode(['success' => true]);
        }
    }
    
?>