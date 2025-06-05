<?php
$koneksi = new mysqli("localhost", "root", "", "db_sanggar"); // ganti sesuai database kamu
session_start();

if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $query = $koneksi->query("SELECT * FROM petugas WHERE username = '$username' AND password = '$password'");
    if ($query->num_rows > 0) {
        $user = $query->fetch_assoc();
        $_SESSION['login'] = true;
        $_SESSION['id_petugas'] = $user['id_petugas'];
        $_SESSION['nama_petugas'] = $user['nama_petugas'];
        $_SESSION['id_level'] = $user['id_level'];
        header("Location: index.php");
    } else {
        $error = "Username atau Password salah!";
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Login - Inventaris Barang</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
      background: linear-gradient(135deg, #ffffff, #224abe);
      min-height: 100vh;
      display: flex;
      align-items: center;
      justify-content: center;
      font-family: 'Segoe UI', sans-serif;
    }

    .login-card {
      background-color: #fff;
      border-radius: 16px;
      padding: 30px;
      width: 100%;
      max-width: 400px;
      box-shadow: 0 10px 25px rgba(0, 0, 0, 0.15);
      animation: fadeIn 0.5s ease-in-out;
    }

    .login-card h3 {
      font-weight: bold;
      color: #333;
    }

    .btn-primary {
      background-color: #365fcf;
      border: none;
    }

    .btn-primary:hover {
      background-color: #224abe;
    }

    @keyframes fadeIn {
      from { opacity: 0; transform: translateY(-10px); }
      to { opacity: 1; transform: translateY(0); }
    }
  </style>
</head>
<body>
  <div class="login-card">
        <h3 class="text-center mb-4">Login</h3>
        <?php if (isset($error)): ?>
            <div class="alert alert-danger"> <?= $error ?> </div>
        <?php endif; ?>
        <form method="POST">
            <div class="mb-3">
                <label for="username" class="form-label">Username</label>
                <input type="text" class="form-control" name="username" required>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" name="password" required>
            </div>
            <button type="submit" name="login" class="btn btn-primary w-100">Login</button>
        </form>
    </div>
</body>
</html>
