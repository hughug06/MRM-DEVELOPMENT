<?php


session_start();
if($_SESSION['auth'] == true)
{
    
}
else{
    header("location: /MRM-DEVELOPMENT/USER/solar/solar.php");
    exit();
}





?>
