<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trang quản trị - MQAuto</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-900 min-h-screen">
    
    <header class="bg-gray-800 shadow-lg border-b border-gray-700">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center py-4">
                <div class="flex items-center">
                    <h1 class="text-2xl font-bold text-white">MQAuto Admin</h1>
                </div>
                <div class="flex items-center space-x-4">
                    <span class="text-gray-300">Xin chào, <strong class="text-white"><?php echo $_SESSION['admin']; ?></strong></span>
                    <a href="index.php" target="_blank" class="text-blue-400 hover:text-blue-300 transition-colors">Xem trang shop</a>
                    <a href="index.php?page=admin&action=logout" class="bg-red-600 text-white px-4 py-2 rounded hover:bg-red-700 transition-colors">
                        Đăng xuất
                    </a>
                </div>
            </div>
        </div>
    </header>

    
    <main class="max-w-7xl mx-auto py-6 sm:px-6 lg:px-8">
        <div class="px-4 py-6 sm:px-0">
            
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
                <div class="bg-gray-800 border border-gray-700 overflow-hidden shadow-lg rounded-lg">
                    <div class="p-5">
                        <div class="flex items-center">
                            <div class="flex-shrink-0">
                                <div class="w-8 h-8 bg-blue-600 rounded-full flex items-center justify-center">
                                    <svg class="w-4 h-4 text-white" fill="currentColor" viewBox="0 0 20 20">
                                        <path d="M3 4a1 1 0 011-1h12a1 1 0 011 1v2a1 1 0 01-1 1H4a1 1 0 01-1-1V4zM3 10a1 1 0 011-1h6a1 1 0 011 1v6a1 1 0 01-1 1H4a1 1 0 01-1-1v-6zM14 9a1 1 0 00-1 1v6a1 1 0 001 1h2a1 1 0 001-1v-6a1 1 0 00-1-1h-2z"></path>
                                    </svg>
                                </div>
                            </div>
                            <div class="ml-5 w-0 flex-1">
                                <dl>
                                    <dt class="text-sm font-medium text-gray-400 truncate">Tổng sản phẩm</dt>
                                    <dd class="text-lg font-medium text-white">15</dd>
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

           
            <div class="mt-8">
                <div class="bg-gray-800 border border-gray-700 shadow-lg rounded-lg">
                    <div class="px-4 py-5 sm:p-6">
                        <div class="flex justify-between items-center mb-4">
                            <h3 class="text-lg leading-6 font-medium text-white">Danh sách xe hiện có</h3>
                            <span class="text-sm text-gray-400"><?php echo count($cars); ?> xe</span>
                        </div>
                        
                        <div class="space-y-4 max-h-[32rem] overflow-y-auto">
                            <?php if (!empty($cars)) : ?>
                                <?php foreach ($cars as $car) : ?>
                                    <div class="flex items-center p-4 bg-gray-700 rounded-lg hover:bg-gray-600 transition-colors border border-gray-600">
                                        <div class="w-16 h-12 bg-gray-600 rounded overflow-hidden flex-shrink-0">
                                            <img src="<?php echo !empty($car['image_url']) ? htmlspecialchars($car['image_url']) : 'public/layout/img/hinh1.webp'; ?>" 
                                                 alt="<?php echo htmlspecialchars($car['car_name']); ?>" 
                                                 class="w-full h-full object-cover">
                                        </div>
                                        <div class="ml-4 flex-1">
                                            <h4 class="text-white font-semibold text-sm"><?php echo htmlspecialchars($car['car_name']); ?></h4>
                                            <div class="flex items-center justify-between mt-1">
                                                <p class="text-gray-300 text-xs"><?php echo htmlspecialchars($car['brand_name'] . ' - ' . $car['type_name']); ?></p>
                                                <p class="text-blue-400 font-bold text-sm"><?php echo number_format($car['price'], 0, ',', '.'); ?> VNĐ</p>
                                            </div>
                                        </div>
                                        <div class="ml-4 flex space-x-2">
                                            <button class="p-2 bg-blue-600 text-white rounded hover:bg-blue-700 transition-colors" title="Chỉnh sửa">
                                                <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                                    <path d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z"></path>
                                                </svg>
                                            </button>
                                            <a href="index.php?page=admin&action=delete_car&id=<?php echo $car['car_id']; ?>" 
                                               class="p-2 bg-red-600 text-white rounded hover:bg-red-700 transition-colors" 
                                               title="Xoá"
                                               onclick="return confirm('Bạn có chắc chắn muốn xoá xe <?php echo htmlspecialchars($car['car_name']); ?>?')">
                                                <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                                    <path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd"></path>
                                                </svg>
                                            </a>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            <?php else : ?>
                                <div class="text-center text-gray-400 py-8">
                                    <svg class="w-12 h-12 mx-auto mb-4 opacity-50" fill="currentColor" viewBox="0 0 20 20">
                                        <path d="M4 3a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V5a2 2 0 00-2-2H4zm12 12H4l4-8 3 6 2-4 3 6z"></path>
                                    </svg>
                                    <p>Không có xe nào trong cơ sở dữ liệu.</p>
                                </div>
                            <?php endif; ?>
                        </div>
                        
                        <div class="mt-4 pt-4 border-t border-gray-600">
                            <a href="index.php?page=admin&action=add_car" class="inline-flex items-center text-blue-400 hover:text-blue-300 text-sm font-medium">
                                <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z"></path>
                                </svg>
                                Thêm xe mới
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
</body>
</html>