<?php 
   
    $fullName = $_POST['fullName'];
    $emailAddress = $_POST['emailAddress'];
    $passWord = $_POST['passWord'];

    //sql connection
    $connection = new mysqli('localhost', 'root', '' , '' , 'test');
    if($connection->connect_error){
        die('connection failed' .$connection->connect_error);
    }
    else{
        $ins = $connection->prepare("inswert into testdb(firstName,emailAddress,passWord)
        values(? , ? , ?)");
        $ins->bind_param("sss",$fullName , $emailAddress , $passWord);
        echo '<script>alert("Insert Successfully")</script>'; 
        $ins->close();
        $connection->close();
    }
    
?>