<?php
session_start();
include 'config.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>News</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link href="css/style.css" rel="stylesheet">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="index.php">PHP projekt</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav me-auto">
                    <li class="nav-item">
                        <a class="nav-link <?php echo basename($_SERVER['PHP_SELF']) == 'index.php' ? 'active' : ''; ?>" href="index.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php echo basename($_SERVER['PHP_SELF']) == 'news.php' ? 'active' : ''; ?>" href="news.php">News</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php echo basename($_SERVER['PHP_SELF']) == 'contact.php' ? 'active' : ''; ?>" href="contact.php">Contact</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php echo basename($_SERVER['PHP_SELF']) == 'about.php' ? 'active' : ''; ?>" href="about.php">About Us</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php echo basename($_SERVER['PHP_SELF']) == 'admin.php' ? 'active' : ''; ?>" href="admin.php">Administration</a>
                    </li>
                </ul>
                <ul class="navbar-nav">
                    <?php if(!isset($_SESSION['user_id'])): ?>
                        <li class="nav-item">
                            <a class="nav-link <?php echo basename($_SERVER['PHP_SELF']) == 'register.php' ? 'active' : ''; ?>" href="register.php">Register</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link <?php echo basename($_SERVER['PHP_SELF']) == 'login.php' ? 'active' : ''; ?>" href="login.php">Login</a>
                        </li>
                    <?php else: ?>
                        <li class="nav-item">
                            <a class="nav-link" href="logout.php">Logout</a>
                        </li>
                    <?php endif; ?>
                </ul>
            </div>
        </div>
    </nav>

    <main class="container my-4">
        <h1 class="mb-4">Latest News</h1>

        <div class="row">
            <div class="col-md-4 mb-4">
                <article class="card h-100">
                    <img src="images/tech-innovation.jpg" class="card-img-top" alt="Technology Innovation" style="height: 180px; object-fit: cover;">
                    <div class="card-body">
                        <h2 class="card-title h5">Breakthrough in Technology Innovation</h2>
                        <p class="text-muted">Published: January 15, 2024</p>
                        <p class="card-text">A groundbreaking development in artificial intelligence has revolutionized how we approach machine learning.</p>
                        <a href="article.php?id=2" class="btn btn-primary">Read More</a>
                    </div>
                </article>
            </div>

            <div class="col-md-4 mb-4">
                <article class="card h-100">
                    <img src="images/sustainable-energy.jpg" class="card-img-top" alt="Sustainable Energy" style="height: 180px; object-fit: cover;">
                    <div class="card-body">
                        <h2 class="card-title h5">Advances in Sustainable Energy</h2>
                        <p class="text-muted">Published: January 14, 2024</p>
                        <p class="card-text">New developments in solar technology have increased energy efficiency by 40%.</p>
                        <a href="article.php?id=3" class="btn btn-primary">Read More</a>
                    </div>
                </article>
            </div>

            <div class="col-md-4 mb-4">
                <article class="card h-100">
                    <img src="images/digital-transformation.jpg" class="card-img-top" alt="Digital Transformation" style="height: 180px; object-fit: cover;">
                    <div class="card-body">
                        <h2 class="card-title h5">Digital Transformation Trends</h2>
                        <p class="text-muted">Published: January 13, 2024</p>
                        <p class="card-text">Companies worldwide are embracing digital transformation at an unprecedented rate.</p>
                        <a href="article.php?id=4" class="btn btn-primary">Read More</a>
                    </div>
                </article>
            </div>
        </div>
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