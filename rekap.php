<?php
$conn = mysqli_connect("localhost", "root", "", "parkir");

if (isset($_POST['login'])) {

    $username = $_POST['username'];
    $password = $_POST['password'];

    // ✅ GANTI DI SINI
    $query = mysqli_query($conn, "SELECT * FROM tb_user WHERE username='$username'");
    $data = mysqli_fetch_assoc($query);

    if (!$data) {
        $error = "Username Tidak Terdaftar!";
    } else {

        if ($password == $data['password']) {
            $_SESSION['user'] = $data;
            $success = "Selamat Datang, Login Berhasil!";
        } else {
            $error = "Password Salah!";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Parkir</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" rel="stylesheet">

    <style>
        html, body {
            height: 100%;
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(-20px);}
            to { opacity: 1; transform: translateY(0);}
        }

        .card:hover {
            transform: translateY(-5px);
            transition: 0.3s;
        }

        .btn:hover {
            transform: scale(1.05);
        }

        .form-control:focus {
            box-shadow: 0 0 0 0.2rem rgba(102,126,234,0.25);
        }
    </style>
</head>

<body>

<div class="container-fluid d-flex justify-content-center align-items-center min-vh-100"
    style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); animation: fadeIn 1s;">

    <div class="card p-5 shadow-lg" style="width: 450px; border-radius: 20px; background: rgba(255,255,255,0.95);">

        <!-- Header -->
        <div class="text-center mb-4">
            <i class="bi bi-car-front-fill text-primary" style="font-size: 3rem;"></i>
            <h3 class="fw-bold text-primary mt-3">LOGIN PARKIR</h3>
            <p class="text-muted">Login untuk mengakses sistem parkir</p>
        </div>

        <!-- FORM -->
        <form method="POST">
            <div class="mb-4">
                <label class="small fw-bold text-muted">Username</label>
                <div class="input-group">
                    <span class="input-group-text bg-light border-0">
                        <i class="bi bi-person-fill text-primary"></i>
                    </span>
                    <input type="text" name="username" class="form-control border-0 shadow-sm"
                        placeholder="Masukkan username" required>
                </div>
            </div>

            <div class="mb-4">
                <label class="small fw-bold text-muted">Password</label>
                <div class="input-group">
                    <span class="input-group-text bg-light border-0">
                        <i class="bi bi-lock-fill text-primary"></i>
                    </span>
                    <input type="password" name="password" class="form-control border-0 shadow-sm"
                        placeholder="Masukkan password" required>
                </div>
            </div>

            <button type="submit" name="login"
                class="btn btn-primary w-100 py-3 fw-bold"
                style="border-radius: 10px; background: linear-gradient(45deg, #0d6efd, #6610f2); border: none;">
                LOGIN
            </button>
        </form>

        <!-- ✅ ALERT SUCCESS -->
        <?php if (isset($success)): ?>
            <div class="alert alert-success mt-3 text-center" style="border-radius: 10px;">
                <i class="bi bi-check-circle-fill"></i> <?php echo $success; ?>
            </div>
        <?php endif; ?>

        <!-- ❌ ALERT ERROR -->
        <?php if (isset($error)): ?>
            <div class="alert alert-danger mt-3 text-center" style="border-radius: 10px;">
                <i class="bi bi-exclamation-triangle-fill"></i> <?php echo $error; ?>
            </div>
        <?php endif; ?>

    </div>
</div>

<!-- Auto hide alert -->
<script>
setTimeout(() => {
    let alert = document.querySelector('.alert');
    if (alert) {
        alert.style.transition = "opacity 0.5s";
        alert.style.opacity = "0";
        setTimeout(() => alert.remove(), 500);
    }
}, 3000);
</script>

</body>
</html>