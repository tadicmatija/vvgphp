<?php
session_start();
include 'config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = trim($_POST['name']);
    $lastname = trim($_POST['lastname']);
    $email = trim($_POST['email']);
    $username = trim($_POST['username']);
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    try {
        $check = $pdo->prepare("SELECT COUNT(*) FROM users WHERE username = ? OR email = ?");
        $check->execute([$username, $email]);
        $exists = $check->fetchColumn();

        if ($exists > 0) {
            header("Location: register.php?error=exists");
            exit();
        }

        $stmt = $pdo->prepare("INSERT INTO users (firstname, lastname, email, username, password) VALUES (?, ?, ?, ?, ?)");
        $stmt->execute([$name, $lastname, $email, $username, $password]);

        header("Location: login.php?success=registered");
        exit();

    } catch (PDOException $e) {
        error_log("Registration error: " . $e->getMessage());
        header("Location: register.php?error=failed");
        exit();
    }
}
?>
