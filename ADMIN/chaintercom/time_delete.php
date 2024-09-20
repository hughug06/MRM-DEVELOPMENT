<?php
require_once '../../Database/database.php';
if(isset($_GET['id'])){
    $id = $_GET['id'];
    $sql = "DELETE from chaintercom_availability where chaintercomavailid=$id";
    $result = mysqli_query($conn , $sql);
    header('location: project-appointment.php');
    exit;
}

?>