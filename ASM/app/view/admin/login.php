<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng nhập Admin - MQAuto</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-900 min-h-screen flex items-center justify-center">
    <div class="bg-gray-800 border border-gray-700 p-8 rounded-lg shadow-xl w-full max-w-md">
        <div class="text-center mb-6">
            <h1 class="text-2xl font-bold text-white">MQAuto Admin</h1>
            <p class="text-gray-400">Đăng nhập để quản lý hệ thống</p>
        </div>
        
        <?php if(isset($error) && $error): ?>
            <div class="bg-red-900 border border-red-700 text-red-200 px-4 py-3 rounded mb-4">
                <?php echo $error; ?>
            </div>
        <?php endif; ?>
        
        <form method="POST">
            <div class="mb-4">
                <label for="username" class="block text-sm font-medium text-gray-300 mb-2">Tên đăng nhập</label>
                <input type="text" id="username" name="username" required 
                       class="w-full px-3 py-2 bg-gray-700 border border-gray-600 rounded-md text-white focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                       value="<?php echo htmlspecialchars($_POST['username'] ?? ''); ?>">
            </div>
            
            <div class="mb-6">
                <label for="password" class="block text-sm font-medium text-gray-300 mb-2">Mật khẩu</label>
                <input type="password" id="password" name="password" required 
                       class="w-full px-3 py-2 bg-gray-700 border border-gray-600 rounded-md text-white focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">
            </div>
            
            <button type="submit" 
                    class="w-full bg-blue-600 text-white py-2 px-4 rounded-md hover:bg-blue-700 transition-colors duration-200">
                Đăng nhập
            </button>
        </form>
        
        <div class="mt-4 text-center">
            <a href="index.php" class="text-sm text-blue-400 hover:text-blue-300 transition-colors">← Về trang chủ</a>
        </div>
        
        <div class="mt-6 p-4 bg-gray-700 border border-gray-600 rounded-md">
            <p class="text-sm text-gray-300 text-center">Thông tin đăng nhập:</p>
            <p class="text-sm text-gray-200 text-center"><strong>Username:</strong> admin</p>
            <p class="text-sm text-gray-200 text-center"><strong>Password:</strong> 123456</p>
        </div>
    </div>
</body>
</html>