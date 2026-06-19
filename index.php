<?php
session_start();
include 'config.php';

$weather_url = "https://api.open-meteo.com/v1/forecast?latitude=45.7126&longitude=16.0756&current=temperature_2m,wind_speed_10m&timezone=Europe%2FZagreb";

$weather_json = file_get_contents($weather_url);
$weather = json_decode($weather_json, true);
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
        <h1 class="mb-3">Dobrodošli na portal s vijestima</h1>
        <p class="lead mb-4">
            Pratite najnovije vijesti iz područja tehnologije, znanosti, digitalne transformacije i održivog razvoja.
        </p>

        <div class="row mb-4">
            <div class="col-md-5 mb-4">
                <div class="card h-100 shadow-sm">
                    <div class="card-header">
                        Vrijeme - Velika Gorica
                    </div>
                    <div class="card-body">
                        <?php if($weather): ?>
                            <p>Temperatura: <?php echo $weather['current']['temperature_2m']; ?> °C</p>
                            <p>Brzina vjetra: <?php echo $weather['current']['wind_speed_10m']; ?> km/h</p>
                            <p class="text-muted mb-0">Podaci su dohvaćeni putem Open-Meteo API-ja.</p>
                        <?php else: ?>
                            <p>Podaci o vremenu trenutno nisu dostupni.</p>
                        <?php endif; ?>
                    </div>
                </div>
            </div>

            <div class="col-md-7 mb-4">
                <div class="card h-100 shadow-sm">
                    <div class="row g-0">
                        <div class="col-md-5">
                            <img src="images/featured-article.jpg" class="img-fluid rounded-start h-100" alt="Glavni članak" style="object-fit: cover;">
                        </div>
                        <div class="col-md-7">
                            <div class="card-body">
                                <h2 class="card-title h4">Umjetna inteligencija mijenja način poslovanja</h2>
                                <p class="card-text">
                                    Razvoj umjetne inteligencije sve više utječe na poslovanje, obrazovanje i svakodnevni život.
                                </p>
                                <a href="article.php?id=1" class="btn btn-primary">Pročitaj više</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-4 mb-3">
                <div class="card h-100 shadow-sm">
                    <div class="card-body">
                        <h2 class="h5">Tehnologija</h2>
                        <p>
                            Donosimo vijesti o novim tehnologijama, umjetnoj inteligenciji, softveru i digitalnim alatima.
                        </p>
                    </div>
                </div>
            </div>

            <div class="col-md-4 mb-3">
                <div class="card h-100 shadow-sm">
                    <div class="card-body">
                        <h2 class="h5">Znanost</h2>
                        <p>
                            Pratimo važne znanstvene teme, istraživanja i inovacije koje utječu na društvo.
                        </p>
                    </div>
                </div>
            </div>

            <div class="col-md-4 mb-3">
                <div class="card h-100 shadow-sm">
                    <div class="card-body">
                        <h2 class="h5">Digitalno društvo</h2>
                        <p>
                            Analiziramo kako digitalizacija mijenja posao, komunikaciju, obrazovanje i svakodnevne navike.
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