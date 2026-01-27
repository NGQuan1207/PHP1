<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng xuất - MQAuto</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <meta http-equiv="refresh" content="3;url=index.php?page=admin&action=login">
</head>
<body class="bg-gray-100 min-h-screen flex items-center justify-center">
    <div class="bg-white p-8 rounded-lg shadow-md w-full max-w-md text-center">
        <div class="mb-6">
            <div class="mx-auto w-16 h-16 bg-green-100 rounded-full flex items-center justify-center mb-4">
                <svg class="w-8 h-8 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                </svg>
            </div>
            <h1 class="text-2xl font-bold text-gray-800 mb-2">Đăng xuất thành công!</h1>
            <p class="text-gray-600">Cảm ơn bạn đã sử dụng hệ thống MQAuto</p>
        </div>
        
        <div class="space-y-4">
            <p class="text-sm text-gray-500">Bạn sẽ được chuyển hướng trong 3 giây...</p>
            
            <div class="space-x-4">
                <a href="index.php?page=admin&action=login" class="inline-block bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 transition">
                    Đăng nhập lại
                </a>
                <a href="index.php" class="inline-block bg-gray-600 text-white px-4 py-2 rounded hover:bg-gray-700 transition">
                    Về trang chủ
                </a>
            </div>
        </div>
    </div>
</body>
</html>