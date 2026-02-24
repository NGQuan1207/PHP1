<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng ký - MQAuto</title>
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
            max-width: 450px;
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
        .message.success {
            background: #d4edda;
            color: #155724;
            border: 1px solid #c3e6cb;
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
        .form-row {
            display: flex;
            gap: 15px;
        }
        .form-row .form-group {
            flex: 1;
        }
    </style>
</head>
<body>
    <div class="auth-container">
        <div class="auth-box">
            <h2 class="auth-title">Đăng ký tài khoản</h2>
            
            <?php if(isset($message) && $message): ?>
                <div class="message <?php echo isset($success) && $success ? 'success' : 'error'; ?>">
                    <?php echo $message; ?>
                </div>
            <?php endif; ?>
            
            <?php if(!isset($success) || !$success): ?>
            <form method="POST">
                <div class="form-group">
                    <label for="full_name" class="form-label">Họ và tên *</label>
                    <input type="text" id="full_name" name="full_name" class="form-input" required
                           placeholder="Nhập họ và tên của bạn" 
                           value="<?php echo isset($_POST['full_name']) ? htmlspecialchars($_POST['full_name']) : ''; ?>">
                </div>
                
                <div class="form-group">
                    <label for="email" class="form-label">Email *</label>
                    <input type="email" id="email" name="email" class="form-input" required
                           placeholder="Nhập email của bạn"
                           value="<?php echo isset($_POST['email']) ? htmlspecialchars($_POST['email']) : ''; ?>">
                </div>
                
                <div class="form-row">
                    <div class="form-group">
                        <label for="password" class="form-label">Mật khẩu *</label>
                        <input type="password" id="password" name="password" class="form-input" required
                               placeholder="Ít nhất 6 ký tự">
                    </div>
                    
                    <div class="form-group">
                        <label for="confirm_password" class="form-label">Xác nhận mật khẩu *</label>
                        <input type="password" id="confirm_password" name="confirm_password" class="form-input" required
                               placeholder="Nhập lại mật khẩu">
                    </div>
                </div>
                
                <div class="form-group">
                    <label for="phone" class="form-label">Số điện thoại</label>
                    <input type="text" id="phone" name="phone" class="form-input"
                           placeholder="Nhập số điện thoại (tùy chọn)"
                           value="<?php echo isset($_POST['phone']) ? htmlspecialchars($_POST['phone']) : ''; ?>">
                </div>
                
                <div class="form-group">
                    <label for="address" class="form-label">Địa chỉ</label>
                    <textarea id="address" name="address" class="form-input" rows="3"
                              placeholder="Nhập địa chỉ (tùy chọn)"><?php echo isset($_POST['address']) ? htmlspecialchars($_POST['address']) : ''; ?></textarea>
                </div>
                
                <button type="submit" class="btn-primary">Đăng ký</button>
            </form>
            <?php endif; ?>
            
            <div class="auth-links">
                <p>Đã có tài khoản? <a href="index.php?page=login">Đăng nhập ngay</a></p>
                <p><a href="index.php">← Về trang chủ</a></p>
            </div>
        </div>
    </div>
</body>
</html>