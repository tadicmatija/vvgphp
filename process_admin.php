<?php
session_start();
include 'config.php';

if(!isset($_SESSION['user_id']) || $_SESSION['role'] != 'admin')
{
    header("Location: index.php");
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $action = $_POST['action'];

    switch ($action) {
        case 'add':
            try {
                $stmt = $pdo->prepare("INSERT INTO users (firstname, lastname) VALUES (?, ?)");
                $stmt->execute([
                    $_POST['firstname'],
                    $_POST['lastname']
                ]);

                header('Location: admin.php?success=added');
                exit();
            } catch (PDOException $e) {
                header('Location: admin.php?error=add_failed');
                exit();
            }
            break;

        case 'edit':
            try {
                $stmt = $pdo->prepare("UPDATE users SET firstname = ?, lastname = ? WHERE id = ?");
                $stmt->execute([
                    $_POST['firstname'],
                    $_POST['lastname'],
                    $_POST['id']
                ]);

                header('Location: admin.php?success=updated');
                exit();
            } catch (PDOException $e) {
                header('Location: admin.php?error=update_failed');
                exit();
            }
            break;

        case 'delete':
            if($_POST['id'] == $_SESSION['user_id'])
            {
                header('Location: admin.php?error=cannot_delete_self');
                exit();
            }

            try {
                $stmt = $pdo->prepare("DELETE FROM users WHERE id = ?");
                $stmt->execute([$_POST['id']]);

                header('Location: admin.php?success=deleted');
                exit();
            } catch (PDOException $e) {
                header('Location: admin.php?error=delete_failed');
                exit();
            }
            break;
    }
}
?>