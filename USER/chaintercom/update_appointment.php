<?php 
    require_once '../../Database/database.php';

    $actionType = $_POST['actionType'];
    if($actionType === 'decline')
    {
        header("Location: chaintercom_landing.php");
    }
    else if($actionType === 'confirm'){
        header("Location: meeting_room.php");
    }
    
?>