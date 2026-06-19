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
        <h1 class="mb-3">O News portalu</h1>

    
    <div class="row mb-4 align-items-center">
        <div class="col-md-6 mb-3">
            <h2 class="h4">Portal posvećen tehnologiji i digitalnom društvu</h2>
            <p>
                News portal je studentski web projekt izrađen u PHP-u. Portal omogućuje pregled vijesti,
                registraciju i prijavu korisnika, administraciju sadržaja te prikaz podataka dohvaćenih
                putem vanjskog API-ja.
            </p>

            <p>
                Cilj projekta je prikazati osnovne funkcionalnosti moderne web aplikacije kroz jednostavno
                i pregledno korisničko sučelje.
            </p>
        </div>

        <div class="col-md-6 mb-3">
            <div class="card shadow-sm mx-auto" style="max-width: 500px;">
                <div class="card-body">
                    <div class="ratio ratio-16x9">
                        <iframe
                            src="https://www.youtube.com/embed/JhHMJCUmq28?si=2USEwXVXeCjdIspR"
                            title="Technology News"
                            allowfullscreen>
                        </iframe>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-4 mb-3">
            <div class="card h-100 shadow-sm">
                <div class="card-body">
                    <h3 class="h5">Svrha portala</h3>
                    <p>
                        Portal donosi vijesti iz područja tehnologije, znanosti, umjetne inteligencije
                        i digitalne transformacije.
                    </p>
                </div>
            </div>
        </div>

        <div class="col-md-4 mb-3">
            <div class="card h-100 shadow-sm">
                <div class="card-body">
                    <h3 class="h5">Korištene tehnologije</h3>
                    <p>
                        Projekt je razvijen korištenjem PHP-a, MySQL baze podataka, Bootstrapa 5,
                        HTML-a, CSS-a i JavaScripta.
                    </p>
                </div>
            </div>
        </div>

        <div class="col-md-4 mb-3">
            <div class="card h-100 shadow-sm">
                <div class="card-body">
                    <h3 class="h5">Funkcionalnosti</h3>
                    <p>
                        Portal uključuje pregled vijesti, korisničku autentifikaciju, administraciju
                        korisnika, kontakt formu i integraciju Weather API-ja.
                    </p>
                </div>
            </div>
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