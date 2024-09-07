<?php
    header('Content-Type: application/json');
    include "../../Database/database.php";
    if(isset($_GET['id'])){
        $id = $_GET['id'];
        $sql = "DELETE from product_type where ProductTypeID=$id";
        try{
            if($result = mysqli_query($conn , $sql)){
                echo json_encode(['status' => true, 'message' => 'Item deleted successfully']);
            }else{
                throw new Exception("Deletion failed");
            }
        }
        catch(Exception){
            $error = "Deletion failed!: The Watts/KVA is currently in use on Products";
            echo json_encode(['status' => false, 'message' => $error]);
        }
    }
    exit;
?>