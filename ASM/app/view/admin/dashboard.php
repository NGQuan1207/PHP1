<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trang quản trị - MQAuto</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">
    
    <header class="bg-white shadow-sm border-b">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center py-4">
                <div class="flex items-center">
                    <h1 class="text-2xl font-bold text-gray-900">MQAuto Admin</h1>
                </div>
                <div class="flex items-center space-x-4">
                    <span class="text-gray-600">Xin chào, <strong><?php echo $_SESSION['admin']; ?></strong></span>
                    <a href="index.php" target="_blank" class="text-blue-600 hover:text-blue-800">Xem trang shop</a>
                    <a href="index.php?page=admin&action=logout" class="bg-red-600 text-white px-4 py-2 rounded hover:bg-red-700 transition">
                        Đăng xuất
                    </a>
                </div>
            </div>
        </div>
    </header>

    
    <main class="max-w-7xl mx-auto py-6 sm:px-6 lg:px-8">
        <div class="px-4 py-6 sm:px-0">
            
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
                <div class="bg-white overflow-hidden shadow rounded-lg">
                    <div class="p-5">
                        <div class="flex items-center">
                            <div class="flex-shrink-0">
                                <div class="w-8 h-8 bg-blue-500 rounded-full flex items-center justify-center">
                                    <svg class="w-4 h-4 text-white" fill="currentColor" viewBox="0 0 20 20">
                                        <path d="M3 4a1 1 0 011-1h12a1 1 0 011 1v2a1 1 0 01-1 1H4a1 1 0 01-1-1V4zM3 10a1 1 0 011-1h6a1 1 0 011 1v6a1 1 0 01-1 1H4a1 1 0 01-1-1v-6zM14 9a1 1 0 00-1 1v6a1 1 0 001 1h2a1 1 0 001-1v-6a1 1 0 00-1-1h-2z"></path>
                                    </svg>
                                </div>
                            </div>
                            <div class="ml-5 w-0 flex-1">
                                <dl>
                                    <dt class="text-sm font-medium text-gray-500 truncate">Tổng sản phẩm</dt>
                                    <dd class="text-lg font-medium text-gray-900">15</dd>
                                </dl>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="bg-white overflow-hidden shadow rounded-lg">
                    <div class="p-5">
                        <div class="flex items-center">
                            <div class="flex-shrink-0">
                                <div class="w-8 h-8 bg-green-500 rounded-full flex items-center justify-center">
                                    <svg class="w-4 h-4 text-white" fill="currentColor" viewBox="0 0 20 20">
                                        <path d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                    </svg>
                                </div>
                            </div>
                            <div class="ml-5 w-0 flex-1">
                                <dl>
                                    <dt class="text-sm font-medium text-gray-500 truncate">Đơn hàng</dt>
                                    <dd class="text-lg font-medium text-gray-900">8</dd>
                                </dl>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="bg-white overflow-hidden shadow rounded-lg">
                    <div class="p-5">
                        <div class="flex items-center">
                            <div class="flex-shrink-0">
                                <div class="w-8 h-8 bg-yellow-500 rounded-full flex items-center justify-center">
                                    <svg class="w-4 h-4 text-white" fill="currentColor" viewBox="0 0 20 20">
                                        <path d="M13 6a3 3 0 11-6 0 3 3 0 016 0zM18 8a2 2 0 11-4 0 2 2 0 014 0zM14 15a4 4 0 00-8 0v3h8v-3z"></path>
                                    </svg>
                                </div>
                            </div>
                            <div class="ml-5 w-0 flex-1">
                                <dl>
                                    <dt class="text-sm font-medium text-gray-500 truncate">Khách hàng</dt>
                                    <dd class="text-lg font-medium text-gray-900">24</dd>
                                </dl>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="bg-white overflow-hidden shadow rounded-lg">
                    <div class="p-5">
                        <div class="flex items-center">
                            <div class="flex-shrink-0">
                                <div class="w-8 h-8 bg-red-500 rounded-full flex items-center justify-center">
                                    <svg class="w-4 h-4 text-white" fill="currentColor" viewBox="0 0 20 20">
                                        <path d="M12 2C13.1 2 14 2.9 14 4C14 5.1 13.1 6 12 6C10.9 6 10 5.1 10 4C10 2.9 10.9 2 12 2ZM21 9V7L15 1H5C3.9 1 3 1.9 3 3V7H1V9H3V19C3 20.1 3.9 21 5 21H19C20.1 21 21 20.1 21 19V9H21ZM5 3H14.17L19 7.83V19H5V3Z"></path>
                                    </svg>
                                </div>
                            </div>
                            <div class="ml-5 w-0 flex-1">
                                <dl>
                                    <dt class="text-sm font-medium text-gray-500 truncate">Doanh thu</dt>
                                    <dd class="text-lg font-medium text-gray-900">2.5M VNĐ</dd>
                                </dl>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

           
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
              
                <div class="bg-white shadow rounded-lg">
                    <div class="px-4 py-5 sm:p-6">
                        <h3 class="text-lg leading-6 font-medium text-gray-900 mb-4">Quản lý sản phẩm</h3>
                        <div class="space-y-3">
                            <a href="#" class="flex items-center p-3 bg-gray-50 rounded hover:bg-gray-100 transition">
                                <svg class="w-5 h-5 text-gray-600 mr-3" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M10 2L3 7v11a1 1 0 001 1h3a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1h3a1 1 0 001-1V7l-7-5z"></path>
                                </svg>
                                <span>Danh sách sản phẩm</span>
                            </a>
                            <a href="#" class="flex items-center p-3 bg-gray-50 rounded hover:bg-gray-100 transition">
                                <svg class="w-5 h-5 text-gray-600 mr-3" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z"></path>
                                </svg>
                                <span>Thêm sản phẩm mới</span>
                            </a>
                            <a href="#" class="flex items-center p-3 bg-gray-50 rounded hover:bg-gray-100 transition">
                                <svg class="w-5 h-5 text-gray-600 mr-3" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M4 3a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V5a2 2 0 00-2-2H4zm12 12H4l4-8 3 6 2-4 3 6z"></path>
                                </svg>
                                <span>Quản lý danh mục</span>
                            </a>
                        </div>
                    </div>
                </div>

                
                <div class="bg-white shadow rounded-lg">
                    <div class="px-4 py-5 sm:p-6">
                        <h3 class="text-lg leading-6 font-medium text-gray-900 mb-4">Quản lý đơn hàng</h3>
                        <div class="space-y-3">
                            <a href="#" class="flex items-center p-3 bg-gray-50 rounded hover:bg-gray-100 transition">
                                <svg class="w-5 h-5 text-gray-600 mr-3" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M3 4a1 1 0 011-1h12a1 1 0 011 1v2a1 1 0 01-1 1H4a1 1 0 01-1-1V4zM3 10a1 1 0 011-1h6a1 1 0 011 1v6a1 1 0 01-1 1H4a1 1 0 01-1-1v-6zM14 9a1 1 0 00-1 1v6a1 1 0 001 1h2a1 1 0 001-1v-6a1 1 0 00-1-1h-2z"></path>
                                </svg>
                                <span>Danh sách đơn hàng</span>
                            </a>
                            <a href="#" class="flex items-center p-3 bg-gray-50 rounded hover:bg-gray-100 transition">
                                <svg class="w-5 h-5 text-gray-600 mr-3" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                                <span>Đơn hàng chờ xử lý</span>
                            </a>
                            <a href="#" class="flex items-center p-3 bg-gray-50 rounded hover:bg-gray-100 transition">
                                <svg class="w-5 h-5 text-gray-600 mr-3" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M3 4a1 1 0 011-1h12a1 1 0 011 1v2a1 1 0 01-1 1H4a1 1 0 01-1-1V4zM3 10a1 1 0 011-1h6a1 1 0 011 1v6a1 1 0 01-1 1H4a1 1 0 01-1-1v-6zM14 9a1 1 0 00-1 1v6a1 1 0 001 1h2a1 1 0 001-1v-6a1 1 0 00-1-1h-2z"></path>
                                </svg>
                                <span>Báo cáo doanh thu</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
</body>
</html>