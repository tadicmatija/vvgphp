<?php
session_start();
include 'config.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Homepage</title>
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
        <h1 class="mb-4">Welcome to Our Website</h1>
        <?php
        $weather_url = "https://api.open-meteo.com/v1/forecast?latitude=45.7126&longitude=16.0756&current=temperature_2m,wind_speed_10m&timezone=Europe%2FZagreb";

        $weather_json = file_get_contents($weather_url);
        $weather = json_decode($weather_json, true);
        ?>

        <div class="row mb-4">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        Vrijeme - Velika Gorica
                    </div>
                    <div class="card-body">
                        <?php if($weather): ?>
                            <p>Temperatura: <?php echo $weather['current']['temperature_2m']; ?> °C</p>
                            <p>Brzina vjetra: <?php echo $weather['current']['wind_speed_10m']; ?> km/h</p>
                        <?php else: ?>
                            <p>Weather data is currently unavailable.</p>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>

        <div class="row mb-4">
            <div class="col-md-6">
                <img src="images/featured-article.jpg" alt="Featured Article" class="img-fluid mb-3" style="width: 400px; height: 250px !important; object-fit: cover;">
                <article>
                    <h2>Featured Article</h2>
                    <p>This is our featured article about the latest developments in technology. We explore the newest trends and innovations that are shaping our future.</p>
                    <a href="article.php?id=1" class="btn btn-primary">Read More</a>
                </article>
            </div>
        </div>

        <div class="row">
            <div class="col-md-4 mb-4">
                <article>
                    <h2>Innovation Hub</h2>
                    <p>Discover how innovation is driving change in various industries. From artificial intelligence to sustainable technologies, we cover it all.</p>
                </article>
            </div>
            <div class="col-md-4 mb-4">
                <article>
                    <h2>Industry Updates</h2>
                    <p>Stay informed about the latest industry developments, market trends, and business strategies that are shaping the global economy.</p>
                </article>
            </div>
            <div class="col-md-4 mb-4">
                <article>
                    <h2>Future Insights</h2>
                    <p>Get ahead of the curve with our analysis of future trends and predictions for various sectors and technologies.</p>
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