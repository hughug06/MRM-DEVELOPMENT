<?php
        session_start();
        unset($_SESSION['login']);
        unset($_SESSION['role']);
        header('Content-Type: application/json');
        echo json_encode(['success' => true]);
        exit();
?>