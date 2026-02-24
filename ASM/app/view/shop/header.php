<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MQAuto - Car Sales Website</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        /* Click-based dropdown */
        .dropdown-menu {
            display: none;
        }
        
        .dropdown-menu.show {
            display: block;
        }
        
        .dropdown-group {
            position: relative;
        }
    </style>
    <script>
        // Dropdown toggle functionality
        function toggleDropdown() {
            const dropdown = document.getElementById('userDropdown');
            dropdown.classList.toggle('show');
        }
        
        // Close dropdown when clicking outside
        document.addEventListener('click', function(event) {
            const dropdown = document.getElementById('userDropdown');
            const button = document.getElementById('userDropdownButton');
            
            if (dropdown && !button.contains(event.target) && !dropdown.contains(event.target)) {
                dropdown.classList.remove('show');
            }
        });
    </script>
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
        
        
        <div class="flex items-center gap-4">
            <?php 
            if (session_status() === PHP_SESSION_NONE) {
                session_start();
            }
            if(isset($_SESSION['user'])): 
                $user = $_SESSION['user'];
            ?>
                
                <div class="dropdown-group">
                    <button id="userDropdownButton" onclick="toggleDropdown()" class="flex items-center gap-2 bg-green-600 hover:bg-green-700 px-4 py-2 rounded-lg transition-colors duration-200">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                        </svg>
                        <span><?php echo htmlspecialchars($user['full_name']); ?></span>
                        <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                        </svg>
                    </button>
                    
                    
                    <div id="userDropdown" class="dropdown-menu absolute right-0 mt-2 w-48 bg-white rounded-md shadow-lg py-1 z-50">
                        <a href="index.php?page=profile" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                            <svg class="w-4 h-4 inline mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                            </svg>
                            Thông tin cá nhân
                        </a>
                        <a href="index.php?page=logout" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100"
                           onclick="return confirm('Bạn có chắc chắn muốn đăng xuất?')">
                            <svg class="w-4 h-4 inline mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path>
                            </svg>
                            Đăng xuất
                        </a>
                    </div>
                </div>
            <?php else: ?>
                
                <div class="flex items-center gap-2">
                    <a href="index.php?page=login" class="flex items-center gap-2 bg-gray-800 hover:bg-gray-700 px-4 py-2 rounded-lg transition-colors duration-200">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1"></path>
                        </svg>
                        <span>Đăng nhập</span>
                    </a>
                    <a href="index.php?page=register" class="flex items-center gap-2 bg-blue-600 hover:bg-blue-700 px-3 py-2 rounded-lg transition-colors duration-200">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z"></path>
                        </svg>
                        <span>Đăng ký</span>
                    </a>
                </div>
            <?php endif; ?>
            
           
            <a href="index.php?page=admin&action=login" class="flex items-center gap-2 bg-blue-600 hover:bg-blue-700 px-4 py-2 rounded-lg transition-colors duration-200">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/>
                </svg>
                <span>Admin</span>
            </a>
        </div>
    </div>
</header>