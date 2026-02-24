<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng nhập - MQAuto</title>
    <style>
        .auth-container {
            min-height: 80vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
        }
        .auth-box {
            background: white;
            padding: 40px;
            border-radius: 10px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.1);
            width: 100%;
            max-width: 400px;
        }
        .auth-title {
            text-align: center;
            color: #333;
            margin-bottom: 30px;
            font-size: 28px;
            font-weight: bold;
        }
        .form-group {
            margin-bottom: 20px;
        }
        .form-label {
            display: block;
            margin-bottom: 8px;
            color: #555;
            font-weight: 500;
        }
        .form-input {
            width: 100%;
            padding: 12px 15px;
            border: 2px solid #e1e5e9;
            border-radius: 8px;
            font-size: 16px;
            color: #333;
            background-color: #fff;
            transition: border-color 0.3s;
            box-sizing: border-box;
        }
        .form-input:focus {
            outline: none;
            border-color: #007bff;
            box-shadow: 0 0 0 3px rgba(0,123,255,0.1);
        }
        .btn-primary {
            width: 100%;
            background: #007bff;
            color: white;
            padding: 12px;
            border: none;
            border-radius: 8px;
            font-size: 16px;
            font-weight: 500;
            cursor: pointer;
            transition: background-color 0.3s;
        }
        .btn-primary:hover {
            background: #0056b3;
        }
        .message {
            padding: 12px;
            border-radius: 6px;
            margin-bottom: 20px;
            text-align: center;
        }
        .message.error {
            background: #f8d7da;
            color: #721c24;
            border: 1px solid #f5c6cb;
        }
        .auth-links {
            text-align: center;
            margin-top: 20px;
        }
        .auth-links a {
            color: #007bff;
            text-decoration: none;
        }
        .auth-links a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="auth-container">
        <div class="auth-box">
            <h2 class="auth-title">Đăng nhập</h2>
            
            <?php if(isset($message) && $message): ?>
                <div class="message error"><?php echo $message; ?></div>
            <?php endif; ?>
            
            <form method="POST">
                <div class="form-group">
                    <label for="email" class="form-label">Email *</label>
                    <input type="email" id="email" name="email" class="form-input" required
                           placeholder="Nhập email của bạn" value="<?php echo isset($_POST['email']) ? htmlspecialchars($_POST['email']) : ''; ?>">
                </div>
                
                <div class="form-group">
                    <label for="password" class="form-label">Mật khẩu *</label>
                    <input type="password" id="password" name="password" class="form-input" required
                           placeholder="Nhập mật khẩu">
                </div>
                
                <button type="submit" class="btn-primary">Đăng nhập</button>
            </form>
            
            <div class="auth-links">
                <p>Chưa có tài khoản? <a href="index.php?page=register">Đăng ký ngay</a></p>
                <p><a href="index.php">← Về trang chủ</a></p>
            </div>
        </div>
    </div>
</body>
</html>