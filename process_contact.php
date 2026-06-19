<?php
session_start();
include 'config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = trim($_POST['name']);
    $lastname = trim($_POST['lastname']);
    $email = trim($_POST['email']);
    $country = trim($_POST['country']);
    $message = trim($_POST['message']);

    try {
        $stmt = $pdo->prepare("INSERT INTO contact_messages (name, lastname, email, country, message) 
                               VALUES (?, ?, ?, ?, ?)");

        $stmt->execute([
            $name,
            $lastname,
            $email,
            $country,
            $message
        ]);

        header('Location: contact.php?status=success');
        exit();

    } catch (PDOException $e) {
        header('Location: contact.php?status=error');
        exit();
    }
} else {
    header('Location: contact.php');
    exit();
}
?>