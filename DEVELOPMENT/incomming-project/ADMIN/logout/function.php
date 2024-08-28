<?php

        session_start();
        unset($_SESSION['auth']);
        unset($_SESSION['loggedinuserrole']);
        unset($_SESSION['loggedinuser']);
        header("location: /MRM-DEVELOPMENT/DEVELOPMENT/incomming-project/index.php"); 
        exit();
?>