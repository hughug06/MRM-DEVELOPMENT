<?php
        session_start();
        unset($_SESSION['login']);
        unset($_SESSION['role']);
        unset($_SESSION['user_id']);
        unset($_SESSION['auth']);
        header('Content-Type: application/json');
        echo json_encode(['success' => true]);
        exit();
?>