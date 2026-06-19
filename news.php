<?php
session_start();
include 'config.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>News portal</title>
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
                        <a class="nav-link <?php echo basename($_SERVER['PHP_SELF']) == 'index.php' ? 'active' : ''; ?>" href="index.php">Početna</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php echo basename($_SERVER['PHP_SELF']) == 'news.php' ? 'active' : ''; ?>" href="news.php">Vijesti</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php echo basename($_SERVER['PHP_SELF']) == 'contact.php' ? 'active' : ''; ?>" href="contact.php">Kontakt</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php echo basename($_SERVER['PHP_SELF']) == 'about.php' ? 'active' : ''; ?>" href="about.php">O nama</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php echo basename($_SERVER['PHP_SELF']) == 'admin.php' ? 'active' : ''; ?>" href="admin.php">Administracija</a>
                    </li>
                </ul>
                <ul class="navbar-nav">
                    <?php if(!isset($_SESSION['user_id'])): ?>
                        <li class="nav-item">
                            <a class="nav-link <?php echo basename($_SERVER['PHP_SELF']) == 'register.php' ? 'active' : ''; ?>" href="register.php">Registracija</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link <?php echo basename($_SERVER['PHP_SELF']) == 'login.php' ? 'active' : ''; ?>" href="login.php">Prijava</a>
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
        <h1 class="mb-3">Najnovije vijesti</h1>
        <p class="lead mb-4">
            Pregled najnovijih vijesti iz područja tehnologije, znanosti i digitalnog društva.
        </p>

        <div class="row">
            <div class="col-md-4 mb-4">
                <article class="card h-100 shadow-sm">
                    <img src="images/tech-innovation.jpg" class="card-img-top" alt="Umjetna inteligencija" style="height: 180px; object-fit: cover;">
                    <div class="card-body">
                        <h2 class="card-title h5">Umjetna inteligencija mijenja način poslovanja</h2>
                        <p class="text-muted">Objavljeno: 12.06.2026.</p>
                        <p class="card-text">Razvoj umjetne inteligencije sve više utječe na rad tvrtki, obrazovanje i svakodnevne digitalne usluge.</p>
                        <a href="article.php?id=2" class="btn btn-primary">Pročitaj više</a>
                    </div>
                </article>
            </div>

            <div class="col-md-4 mb-4">
                <article class="card h-100 shadow-sm">
                    <img src="images/sustainable-energy.jpg" class="card-img-top" alt="Održiva energija" style="height: 180px; object-fit: cover;">
                    <div class="card-body">
                        <h2 class="card-title h5">Održiva energija sve važnija u modernom društvu</h2>
                        <p class="text-muted">Objavljeno: 12.06.2026.</p>
                        <p class="card-text">Nova rješenja u području obnovljivih izvora energije sve su važnija za gospodarstvo i zaštitu okoliša.</p>
                        <a href="article.php?id=3" class="btn btn-primary">Pročitaj više</a>
                    </div>
                </article>
            </div>

            <div class="col-md-4 mb-4">
                <article class="card h-100 shadow-sm">
                    <img src="images/digital-transformation.jpg" class="card-img-top" alt="Digitalna transformacija" style="height: 180px; object-fit: cover;">
                    <div class="card-body">
                        <h2 class="card-title h5">Digitalna transformacija oblikuje budućnost rada</h2>
                        <p class="text-muted">Objavljeno: 12.06.2026.</p>
                        <p class="card-text">Tvrtke sve više ulažu u digitalne alate, automatizaciju i nove načine rada kako bi ostale konkurentne.</p>
                        <a href="article.php?id=4" class="btn btn-primary">Pročitaj više</a>
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