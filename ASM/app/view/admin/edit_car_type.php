<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chỉnh sửa loại xe - MQAuto Admin</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-900 min-h-screen">
    
    <header class="bg-gray-800 shadow-lg border-b border-gray-700">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center py-4">
                <div class="flex items-center">
                    <h1 class="text-2xl font-bold text-white">MQAuto Admin - Chỉnh sửa loại xe</h1>
                </div>
                <div class="flex items-center space-x-4">
                    <a href="index.php?page=admin&action=dashboard" class="text-blue-400 hover:text-blue-300 transition-colors">← Về Dashboard</a>
                    <span class="text-gray-300">Xin chào, <strong class="text-white"><?php echo $_SESSION['admin']; ?></strong></span>
                    <a href="index.php?page=admin&action=logout" class="bg-red-600 text-white px-4 py-2 rounded hover:bg-red-700 transition-colors">
                        Đăng xuất
                    </a>
                </div>
            </div>
        </div>
    </header>

    <main class="max-w-4xl mx-auto py-8 px-4">
        <div class="bg-gray-800 border border-gray-700 shadow-lg rounded-lg">
            <div class="px-6 py-4 border-b border-gray-600">
                <h2 class="text-xl font-semibold text-white">Chỉnh sửa thông tin loại xe: <?php echo isset($carType) ? htmlspecialchars($carType['type_name']) : ''; ?></h2>
                <p class="text-gray-400 text-sm mt-1">Cập nhật thông tin chi tiết của loại xe</p>
            </div>

            <div class="p-6">
                <?php if(isset($message) && $message): ?>
                    <div class="mb-6 p-4 <?php echo strpos($message, 'thành công') !== false ? 'bg-green-900 border-green-700 text-green-200' : 'bg-red-900 border-red-700 text-red-200'; ?> border rounded">
                        <?php echo $message; ?>
                    </div>
                <?php endif; ?>

                <?php if(isset($carType) && $carType): ?>
                    <!-- Hiển thị ảnh hiện tại -->
                    <div class="mb-6">
                        <label class="block text-sm font-medium text-gray-300 mb-2">Ảnh hiện tại</label>
                        <div class="w-40 h-24 bg-gray-700 rounded-md overflow-hidden">
                            <?php if (!empty($carType['img'])): ?>
                                <img src="<?php echo htmlspecialchars($carType['img']); ?>" 
                                     alt="<?php echo htmlspecialchars($carType['type_name']); ?>"
                                     class="w-full h-full object-cover">
                            <?php else: ?>
                                <div class="w-full h-full flex items-center justify-center">
                                    <svg class="w-8 h-8 text-gray-400" fill="currentColor" viewBox="0 0 20 20">
                                        <path d="M7 3a1 1 0 000 2h6a1 1 0 100-2H7zM4 7a1 1 0 011-1h10a1 1 0 110 2H5a1 1 0 01-1-1zM2 11a2 2 0 012-2h12a2 2 0 012 2v4a2 2 0 01-2 2H4a2 2 0 01-2-2v-4z"></path>
                                    </svg>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>

                    <form method="POST" enctype="multipart/form-data" class="space-y-6">
                        <div>
                            <label for="type_name" class="block text-sm font-medium text-gray-300 mb-2">Tên loại xe *</label>
                            <input type="text" id="type_name" name="type_name" required 
                                   value="<?php echo htmlspecialchars($carType['type_name']); ?>"
                                   class="w-full px-4 py-2 bg-gray-700 border border-gray-600 rounded-md text-white focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                                   placeholder="VD: Sedan, SUV, Hatchback...">
                        </div>

                        <div>
                            <label for="type_image" class="block text-sm font-medium text-gray-300 mb-2">Cập nhật hình ảnh loại xe (tùy chọn)</label>
                            <input type="file" id="type_image" name="type_image" accept="image/*"
                                   class="w-full px-4 py-2 bg-gray-700 border border-gray-600 rounded-md text-white focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent
                                          file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0 file:text-sm file:font-semibold
                                          file:bg-blue-600 file:text-white hover:file:bg-blue-700">
                            <p class="text-gray-400 text-xs mt-1">Để trống nếu không muốn thay đổi ảnh</p>
                        </div>

                        <div class="flex items-center justify-between pt-6 border-t border-gray-600">
                            <a href="index.php?page=admin&action=dashboard" 
                               class="px-6 py-2 bg-gray-600 text-white rounded-md hover:bg-gray-500 transition-colors">
                                Hủy bỏ
                            </a>
                            <button type="submit" 
                                    class="px-6 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700 transition-colors">
                                Cập nhật loại xe
                            </button>
                        </div>
                    </form>
                <?php else: ?>
                    <div class="text-center py-12">
                        <p class="text-gray-400 text-lg">Không tìm thấy loại xe để chỉnh sửa.</p>
                        <a href="index.php?page=admin&action=dashboard" 
                           class="mt-4 inline-block px-6 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700 transition-colors">
                            Về Dashboard
                        </a>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </main>
</body>
</html>