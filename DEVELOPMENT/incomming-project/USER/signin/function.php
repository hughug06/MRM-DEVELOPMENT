
<?php
    if(isset($_POST['signin'])){
    $username = $_POST['username'];
    $password = $_POST['password'];
    require_once "../Database/database.php";
    $sql = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";
    $result = mysqli_query($conn , $sql);
    
    if(mysqli_num_rows($result)){
        header("Location: ../solar/solar.php");
        exit();
    }
    else{
        echo "testing";
    }
    echo "testing";
    }
   

?>