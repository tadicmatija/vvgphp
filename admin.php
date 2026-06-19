<?php
session_start();
include 'config.php';
if(!isset($_SESSION['user_id']) || $_SESSION['role'] != 'admin')
{
    header("Location: index.php");
    exit();
}


try {
    $stmt = $pdo->query("SELECT * FROM users ORDER BY created_at DESC");
    $users = $stmt->fetchAll();
} catch (PDOException $e) {
    $users = [];
}
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
            <a class="navbar-brand" href="index.php">PHP projekt</a>
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
        <h1 class="mb-4">Administracija</h1>
        
        <div class="row mb-5">
            <div class="col-md-6">
                <img src="images/admin-image.jpg" alt="Administration" class="img-fluid rounded shadow" style="width: 300px; height: 200px !important; object-fit: cover;">
                <p class="text-muted mt-2">Upravljaj korisnicima</p>
            </div>
            <div class="col-md-6">
                <!-- Add User Form -->
                <div class="card">
                    <div class="card-header">
                        <h2 class="h5 mb-0">Dodaj novog korisnika</h2>
                    </div>
                    <div class="card-body">
                        <form action="process_admin.php" method="POST">
                            <input type="hidden" name="action" value="add">
                            <div class="mb-3">
                                <label for="firstname" class="form-label">Ime</label>
                                <input type="text" class="form-control" id="firstname" name="firstname" required>
                            </div>
                            <div class="mb-3">
                                <label for="lastname" class="form-label">Prezime</label>
                                <input type="text" class="form-control" id="lastname" name="lastname" required>
                            </div>
                            <button type="submit" class="btn btn-primary">Dodaj korisnika</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="card shadow-sm mb-4">
            <div class="card-header">
                <h2 class="h5 mb-0">Korisnici</h2>
            </div>

            <div class="card-body">
                <?php if (!empty($users)): ?>
                    <div class="table-responsive">
                        <table class="table table-striped table-hover align-middle">
                            <thead class="table-dark">
                                <tr>
                                    <th>ID</th>
                                    <th>Korisničko ime</th>
                                    <th>Ime</th>
                                    <th>Prezime</th>
                                    <th>Email</th>
                                    <th>Uloga</th>
                                    <th>Datum kreiranja</th>
                                    <th>Akcije</th>
                                </tr>
                            </thead>

                            <tbody>
                                <?php foreach ($users as $user): ?>
                                    <tr>
                                        <td><?php echo $user['id']; ?></td>
                                        <td><?php echo htmlspecialchars($user['username']); ?></td>
                                        <td><?php echo htmlspecialchars($user['firstname']); ?></td>
                                        <td><?php echo htmlspecialchars($user['lastname']); ?></td>
                                        <td><?php echo htmlspecialchars($user['email']); ?></td>
                                        <td>
                                            <span class="badge bg-secondary">
                                                <?php echo htmlspecialchars($user['role']); ?>
                                            </span>
                                        </td>
                                        <td><?php echo $user['created_at']; ?></td>
                                        <td>
                                            <button class="btn btn-sm btn-warning me-2" onclick='editUser(<?php echo json_encode($user); ?>)'>
                                                Edit
                                            </button>

                                            <form action="process_admin.php" method="POST" class="d-inline">
                                                <input type="hidden" name="action" value="delete">
                                                <input type="hidden" name="id" value="<?php echo $user['id']; ?>">
                                                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">
                                                    Delete
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                <?php else: ?>
                    <p class="text-muted mb-0">Nema pronađenih korisnika.</p>
                <?php endif; ?>
            </div>
        </div>

        <div class="modal fade" id="editModal" tabindex="-1">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Uredi korsinika</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>
                    <div class="modal-body">
                        <form action="process_admin.php" method="POST">
                            <input type="hidden" name="action" value="edit">
                            <input type="hidden" name="id" id="edit_id">
                            <div class="mb-3">
                                <label for="edit_name" class="form-label">Ime</label>
                                <input type="text" class="form-control" id="edit_name" name="firstname" required>
                            </div>
                            <div class="mb-3">
                                <label for="edit_lastname" class="form-label">Prezime</label>
                                <input type="text" class="form-control" id="edit_lastname" name="lastname" required>
                            </div>
                            <button type="submit" class="btn btn-primary">Spremi promjene</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <footer class="bg-dark text-white py-4 mt-5">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <p>&copy; <?php echo date('Y'); ?> Matija Tadić - Veleučilište Velika Gorica</p>
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
    <script>
    function editUser(user) {
        document.getElementById('edit_id').value = user.id;
        document.getElementById('edit_name').value = user.firstname;
        document.getElementById('edit_lastname').value = user.lastname;
        
        new bootstrap.Modal(document.getElementById('editModal')).show();
    }
    </script>
</body>
</html>
