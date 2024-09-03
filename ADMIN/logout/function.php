<?php

        session_start();
        unset($_SESSION['login']);
        unset($_SESSION['role']);
        header("location: /MRM-DEVELOPMENT/index.php"); 
        exit();
?>