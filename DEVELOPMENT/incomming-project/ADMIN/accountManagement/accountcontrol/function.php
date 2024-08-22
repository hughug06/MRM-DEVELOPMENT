<?php 

require '../../Database/database.php';


if(isset($_POST['saveuser']))
{
    $fullname = $_POST['fullname'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $email = $_POST['email'];
    $role = $_POST['role'];
 
    if($fullname != '' || $username != '' || $password != '' || $email != ''){
            $sql_insert = "insert into users (name,username,email,password,role) 
                            VALUES ('$fullname' , '$username' , '$email' , '$password'  , '$role')";
            if (mysqli_query($conn, $sql_insert)) {
                echo "New record created successfully";
                header('location: user-management.php');
              } else {
                echo "Error: " . $sql . "<br>" . mysqli_error($conn);
              }
    }
    else{
        //ERROR MESSAGE
    }
}

mysqli_close($conn);

?>