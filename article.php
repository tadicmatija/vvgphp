<?php
session_start();
include 'config.php';

if(!isset($_GET['id']))
{
    header("Location: news.php");
    exit();
}

$id = $_GET['id'];

$sql = "SELECT * FROM news WHERE id = :id";
$stmt = $pdo->prepare($sql);
$stmt->bindParam(':id', $id);
$stmt->execute();

$article = $stmt->fetch();

if(!$article)
{
    header("Location: news.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $article['title']; ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link href="css/style.css" rel="stylesheet">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="index.php">News portal</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav me-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="index.php">Početna</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="news.php">Vijesti</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="contact.php">Kontakt</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="about.php">O nama</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="admin.php">Administracija</a>
                    </li>
                </ul>
                <ul class="navbar-nav">
                    <?php if(!isset($_SESSION['user_id'])): ?>
                        <li class="nav-item">
                            <a class="nav-link" href="register.php">Registracija</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="login.php">Prijava</a>
                        </li>
                    <?php else: ?>
                        <li class="nav-item">
                            <a class="nav-link" href="logout.php">Odjava</a>
                        </li>
                    <?php endif; ?>
                </ul>
            </div>
        </div>
    </nav>

    <main class="container my-4">
        <article class="card shadow-sm">
            <?php if(!empty($article['image_path'])): ?>
                <img src="<?php echo $article['image_path']; ?>" 
                    alt="<?php echo $article['title']; ?>" 
                    class="card-img-top"
                    style="height: 320px; object-fit: cover;">
            <?php endif; ?>

            <div class="card-body">
                <h1 class="mb-3"><?php echo $article['title']; ?></h1>

                <p class="text-muted">
                    Objavljeno: <?php echo date('d.m.Y.', strtotime($article['created_at'])); ?>
                </p>

                <p><?php echo nl2br($article['content']); ?></p>

                <a href="news.php" class="btn btn-secondary mt-3">Povratak na vijesti</a>
            </div>
        </article>
    </main>

    <footer class="bg-dark text-white py-4 mt-5">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <p>&copy; <?php echo date('Y'); ?>  Matija Tadić - Veleučilište Velika Gorica</p>
                </div>
                <div class="col-md-6 text-end">
                    <a href="https://github.com/tadicmatija/vvgphp" target="_blank" class="text-white">
                        <i class="fab fa-github fa-2x"></i>
                    </a>
                </div>
            </div>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>