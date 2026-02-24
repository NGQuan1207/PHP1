<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thông tin cá nhân - MQAuto</title>
    <style>
        .profile-container {
            max-width: 800px;
            margin: 40px auto;
            padding: 20px;
        }
        .profile-header {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 30px;
            border-radius: 10px;
            margin-bottom: 30px;
            text-align: center;
        }
        .profile-title {
            font-size: 28px;
            font-weight: bold;
            margin-bottom: 10px;
        }
        .profile-subtitle {
            font-size: 16px;
            opacity: 0.9;
        }
        .profile-content {
            background: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 5px 20px rgba(0,0,0,0.1);
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
        .form-input:disabled {
            background-color: #f8f9fa;
            color: #6c757d;
        }
        .btn {
            padding: 12px 25px;
            border: none;
            border-radius: 8px;
            font-size: 16px;
            font-weight: 500;
            cursor: pointer;
            transition: all 0.3s;
            text-decoration: none;
            display: inline-block;
            margin-right: 10px;
        }
        .btn-primary {
            background: #007bff;
            color: white;
        }
        .btn-primary:hover {
            background: #0056b3;
        }
        .btn-secondary {
            background: #6c757d;
            color: white;
        }
        .btn-secondary:hover {
            background: #545b62;
        }
        .btn-danger {
            background: #dc3545;
            color: white;
        }
        .btn-danger:hover {
            background: #c82333;
        }
        .message {
            padding: 12px;
            border-radius: 6px;
            margin-bottom: 20px;
            text-align: center;
        }
        .message.success {
            background: #d4edda;
            color: #155724;
            border: 1px solid #c3e6cb;
        }
        .message.error {
            background: #f8d7da;
            color: #721c24;
            border: 1px solid #f5c6cb;
        }
        .user-info {
            background: #f8f9fa;
            padding: 20px;
            border-radius: 8px;
            margin-bottom: 30px;
        }
        .info-item {
            display: flex;
            justify-content: space-between;
            padding: 8px 0;
            border-bottom: 1px solid #e9ecef;
        }
        .info-item:last-child {
            border-bottom: none;
        }
        .info-label {
            font-weight: 500;
            color: #495057;
        }
        .info-value {
            color: #212529;
        }
    </style>
</head>
<body>
    <div class="profile-container">
        <div class="profile-header">
            <h1 class="profile-title">Thông tin cá nhân</h1>
            <p class="profile-subtitle">Xin chào, <?php echo htmlspecialchars($user['full_name']); ?>!</p>
        </div>

        <div class="profile-content">
            <?php if(isset($message) && $message): ?>
                <div class="message <?php echo strpos($message, 'thành công') !== false ? 'success' : 'error'; ?>">
                    <?php echo $message; ?>
                </div>
            <?php endif; ?>

            <div class="user-info">
                <h3 style="margin-top: 0; margin-bottom: 20px; color: #495057;">Thông tin tài khoản</h3>
                <div class="info-item">
                    <span class="info-label">ID:</span>
                    <span class="info-value">#<?php echo $user['user_id']; ?></span>
                </div>
                <div class="info-item">
                    <span class="info-label">Email:</span>
                    <span class="info-value"><?php echo htmlspecialchars($user['email']); ?></span>
                </div>
                <div class="info-item">
                    <span class="info-label">Ngày tạo:</span>
                    <span class="info-value"><?php echo date('d/m/Y H:i', strtotime($user['created_at'])); ?></span>
                </div>
            </div>

            <h3 style="color: #495057; margin-bottom: 20px;">Cập nhật thông tin</h3>
            
            <form method="POST">
                <div class="form-group">
                    <label for="full_name" class="form-label">Họ và tên *</label>
                    <input type="text" id="full_name" name="full_name" class="form-input" required
                           value="<?php echo htmlspecialchars($user['full_name']); ?>">
                </div>
                
                <div class="form-group">
                    <label for="phone" class="form-label">Số điện thoại</label>
                    <input type="text" id="phone" name="phone" class="form-input"
                           value="<?php echo htmlspecialchars($user['phone'] ?? ''); ?>"
                           placeholder="Nhập số điện thoại">
                </div>
                
                <div class="form-group">
                    <label for="address" class="form-label">Địa chỉ</label>
                    <textarea id="address" name="address" class="form-input" rows="3"
                              placeholder="Nhập địa chỉ"><?php echo htmlspecialchars($user['address'] ?? ''); ?></textarea>
                </div>
                
                <div style="margin-top: 30px;">
                    <button type="submit" class="btn btn-primary">Cập nhật thông tin</button>
                    <a href="index.php" class="btn btn-secondary">Về trang chủ</a>
                    <a href="index.php?page=logout" class="btn btn-danger" 
                       onclick="return confirm('Bạn có chắc chắn muốn đăng xuất?')">Đăng xuất</a>
                </div>
            </form>
        </div>
    </div>
</body>
</html>