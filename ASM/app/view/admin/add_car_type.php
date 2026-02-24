<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm loại xe mới - MQAuto Admin</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-900 min-h-screen">
    
    <header class="bg-gray-800 shadow-lg border-b border-gray-700">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center py-4">
                <div class="flex items-center">
                    <h1 class="text-2xl font-bold text-white">MQAuto Admin - Thêm loại xe mới</h1>
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
                <h2 class="text-xl font-semibold text-white">Thêm loại xe mới vào cơ sở dữ liệu</h2>
                <p class="text-gray-400 text-sm mt-1">Điền thông tin chi tiết của loại xe muốn thêm</p>
            </div>

            <div class="p-6">
                <?php if(isset($message) && $message): ?>
                    <div class="mb-6 p-4 <?php echo strpos($message, 'thành công') !== false ? 'bg-green-900 border-green-700 text-green-200' : 'bg-red-900 border-red-700 text-red-200'; ?> border rounded">
                        <?php echo $message; ?>
                    </div>
                <?php endif; ?>

                <form method="POST" enctype="multipart/form-data" class="space-y-6">
                    <div>
                        <label for="type_name" class="block text-sm font-medium text-gray-300 mb-2">Tên loại xe *</label>
                        <input type="text" id="type_name" name="type_name" required 
                               class="w-full px-4 py-2 bg-gray-700 border border-gray-600 rounded-md text-white focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                               placeholder="VD: Sedan, SUV, Hatchback...">
                    </div>

                    <div>
                        <label for="type_image" class="block text-sm font-medium text-gray-300 mb-2">Hình ảnh loại xe</label>
                        <input type="file" id="type_image" name="type_image" accept="image/*"
                               class="w-full px-4 py-2 bg-gray-700 border border-gray-600 rounded-md text-white focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent
                                      file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0 file:text-sm file:font-semibold
                                      file:bg-blue-600 file:text-white hover:file:bg-blue-700">
                        <p class="text-gray-400 text-xs mt-1">Tùy chọn - sẽ sử dụng ảnh mặc định nếu không tải lên</p>
                    </div>

                    <div class="flex items-center justify-between pt-6 border-t border-gray-600">
                        <a href="index.php?page=admin&action=dashboard" 
                           class="px-6 py-2 bg-gray-600 text-white rounded-md hover:bg-gray-500 transition-colors">
                            Hủy bỏ
                        </a>
                        <button type="submit" 
                                class="px-6 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700 transition-colors">
                            Thêm loại xe
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </main>
</body>
</html>