<?php 
    $fullName = $_POST['fullName'];
    $emailAddress = $_POST['emailAddress'];
    $passWord = $_POST['passWord'];

    //sql connection
    $connection = new mysqli('localhost', 'root', '' , 'testdb');
    if($connection->connect_error){
        die('connection failed' .$connection->connect_error);
    }
    else{
        $ins = $connection->prepare("insert into sign_up(firstName, emailAddress, passWord) values(? , ? , ?)");
        $ins->bind_param("sss", $fullName , $emailAddress , $passWord);
        $exec = $ins->execute();
        echo '<script>alert("Insert Successfully")</script>'; 
        $ins->close();
        $connection->close();
    }
    
?>