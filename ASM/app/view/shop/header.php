<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MQAuto - Car Sales Website</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-900 text-white min-h-screen">

<header class="bg-black text-white">
    <div class="max-w-7xl mx-auto flex items-center justify-between py-4 px-4">
        <div class="flex items-center gap-3">
            <img src="public/layout/img/mqautoremovebackground.png" alt="MQAuto Logo" class="h-24 w-auto object-contain drop-shadow-lg">
        </div>
        <nav class="flex gap-8 text-lg">
            <a href="index.php" class="hover:text-blue-400 transition">Tổng quan</a>
            <a href="index.php?page=product" class="hover:text-blue-400 transition">Tìm &amp; mua</a>
            <a href="index.php?page=about" class="hover:text-blue-400 transition">Giới thiệu</a>
            <a href="index.php?page=contact" class="hover:text-blue-400 transition">Liên hệ</a>
        </nav>
        
        <!-- User Icon/Button -->
        <div class="flex items-center gap-4">
            <button class="flex items-center gap-2 bg-gray-800 hover:bg-gray-700 px-4 py-2 rounded-lg transition-colors duration-200">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                </svg>
                <span>Tài khoản</span>
            </button>
            
            <!-- Admin Login Link -->
            <a href="index.php?page=admin&action=login" class="flex items-center gap-2 bg-blue-600 hover:bg-blue-700 px-4 py-2 rounded-lg transition-colors duration-200">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/>
                </svg>
                <span>Admin</span>
            </a>
        </div>
    </div>
</header>