<?php
        session_start();
        unset($_SESSION['login']);
        unset($_SESSION['role']);
        unset($_SESSION['user_id']);
        header('Content-Type: application/json');
        echo json_encode(['success' => true]);
        exit();
?>