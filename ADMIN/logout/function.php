<?php
        session_start();
        unset($_SESSION['login']);
        unset($_SESSION['role']);
        unset($_SESSION['user_id']);
        unset($_SESSION['auth']);
        unset($_SESSION['admin_id']);
        unset($_SESSION['account_id']);
        unset($_SESSION['agent_id']);
        unset($_SESSION['worker_id']);
        header('Content-Type: application/json');
        echo json_encode(['success' => true]);
        exit();
?>