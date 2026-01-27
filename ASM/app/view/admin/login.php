<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng nhập Admin - MQAuto</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 min-h-screen flex items-center justify-center">
    <div class="bg-white p-8 rounded-lg shadow-md w-full max-w-md">
        <div class="text-center mb-6">
            <h1 class="text-2xl font-bold text-gray-800">MQAuto Admin</h1>
            <p class="text-gray-600">Đăng nhập để quản lý hệ thống</p>
        </div>
        
        <?php if(isset($error) && $error): ?>
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
                <?php echo $error; ?>
            </div>
        <?php endif; ?>
        
        <form method="POST">
            <div class="mb-4">
                <label for="username" class="block text-sm font-medium text-gray-700 mb-2">Tên đăng nhập</label>
                <input type="text" id="username" name="username" required 
                       class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                       value="<?php echo htmlspecialchars($_POST['username'] ?? ''); ?>">
            </div>
            
            <div class="mb-6">
                <label for="password" class="block text-sm font-medium text-gray-700 mb-2">Mật khẩu</label>
                <input type="password" id="password" name="password" required 
                       class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>
            
            <button type="submit" 
                    class="w-full bg-blue-600 text-white py-2 px-4 rounded-md hover:bg-blue-700 transition duration-200">
                Đăng nhập
            </button>
        </form>
        
        <div class="mt-4 text-center">
            <a href="index.php" class="text-sm text-blue-600 hover:underline">← Về trang chủ</a>
        </div>
        
        <div class="mt-6 p-4 bg-gray-50 rounded-md">
            <p class="text-sm text-gray-600 text-center">Thông tin đăng nhập:</p>
            <p class="text-sm text-gray-800 text-center"><strong>Username:</strong> admin</p>
            <p class="text-sm text-gray-800 text-center"><strong>Password:</strong> 123456</p>
        </div>
    </div>
</body>
</html>