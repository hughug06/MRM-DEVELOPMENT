<?php

if (!isset($_SESSION['auth'])) {
    // If not, redirect to login page
    header("location: /MRM-DEVELOPMENT/DEVELOPMENT/incomming-project/index.php");
    exit();
}

?>