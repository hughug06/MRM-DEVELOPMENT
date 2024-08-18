
<?php
    if(isset($_POST[''])){
    $Emailaddress = $_POST['Emailaddress'];
    $Password = $_POST['Password'];
    require_once "database/database.php";
    $sql = "SELECT * FROM REGISTRATION WHERE email = '$Emailaddress' AND password = '$Password'";
    $result = mysqli_query($conn , $sql);
    
    if(mysqli_num_rows($result)){
        header("Location: user-solar-panel.php");
    }
    else{
        echo "testing";
    }

    }
   

?>