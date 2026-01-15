<?php
session_start();

if ($_POST) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    
    if ($username === 'admin' && $password === '123456') {
        $_SESSION['is_logged_in'] = true;
        $_SESSION['username'] = $username;
        header('Location: index.php');
    } else {
        $error = 'Đăng nhập thất bại!';
    }
}

if (isset($_SESSION['is_logged_in'])) {
    header('Location: index.php');
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Đăng nhập</title>
    <link rel="stylesheet" href="style.css">
    <style>
        .login-form {
            width: 300px;
            margin: 50px auto;
            padding: 20px;
            border: 1px solid #ccc;
        }
        .login-form input {
            width: 100%;
            padding: 8px;
            margin: 5px 0;
        }
        .login-form button {
            width: 100%;
            padding: 10px;
            background: #007bff;
            color: white;
            border: none;
        }
        .error {
            color: red;
            text-align: center;
        }
        .info {
            background: #e7f3ff;
            padding: 10px;
            margin: 10px 0;
        }
    </style>
</head>
<body>
    <header>
        <h1>BHZ Movies</h1>
    </header>

    <div class="login-form">
        <h2>Đăng nhập</h2>
        
        <div class="info">
            Username: admin<br>
            Password: 123456
        </div>
        
        <?php if (isset($error)): ?>
            <div class="error"><?php echo $error; ?></div>
        <?php endif; ?>
        
        <form method="POST">
            <label>Tên đăng nhập:</label>
            <input type="text" name="username" required>
            
            <label>Mật khẩu:</label>
            <input type="password" name="password" required>
            
            <button type="submit">Đăng nhập</button>
        </form>
    </div>

    <footer>
        <p>&copy; 2024 BHZCo. All rights reserved.</p>
    </footer>
</body>
</html>