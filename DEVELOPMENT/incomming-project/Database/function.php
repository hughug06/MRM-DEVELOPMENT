<?php
session_start();
require 'database.php';

function validate($inputdata){
    global $conn;
    return mysqli_real_escape_string($conn , $inputdata);

}

function redirect($url , $status){
    $_SESSION['status'] = $status;
    header('Location: '.$url);
    exit(0);
}


function alertMessage(){
    if(isset($_SESSION['status'])){
        echo '<div class="alert alert-success">
        <h4>' .$_SESSION['status']. '</h4> 
        </div>';
        unset($_SESSION['status']);    
    }
}

function testing(){
    echo '<div class="alert alert-danger"> hello </div>';
}
?>