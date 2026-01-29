<main class="bg-gray-900 min-h-screen py-12">
<div class="max-w-4xl mx-auto px-4">
    <?php if (empty($car)): ?>
        <div class="bg-red-800 border border-red-600 text-red-200 px-4 py-3 rounded mb-4">
            <h3 class="font-bold">Debug Info:</h3>
            <p>Car ID from URL: <?php echo htmlspecialchars($_GET['id'] ?? 'not set'); ?></p>
            <p>Car data is empty or not found</p>
        </div>
    <?php endif; ?>
    
    <?php if (!empty($car)): ?>
        <div class="bg-gray-800 rounded-lg shadow-lg overflow-hidden border border-gray-700">

            <div class="h-96 bg-gray-700 flex items-center justify-center">
                <?php if (!empty($car['image_url'])): ?>
                    <img src="<?php echo htmlspecialchars($car['image_url']); ?>" 
                         alt="<?php echo htmlspecialchars($car['car_name']); ?>"
                         class="w-full h-full object-cover">
                <?php elseif (!empty($car['img'])): ?>
                    <img src="public/layoutAdmin/img/<?php echo htmlspecialchars($car['img']); ?>" 
                         alt="<?php echo htmlspecialchars($car['car_name']); ?>"
                         class="w-full h-full object-cover">
                <?php else: ?>
                    <div class="text-gray-400 text-center">
                        <svg class="w-24 h-24 mx-auto mb-4" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M4 3a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V5a2 2 0 00-2-2H4zm12 12H4l4-8 3 6 2-4 3 6z"/>
                        </svg>
                        <p>Không có hình ảnh</p>
                    </div>
                <?php endif; ?>
            </div>
            
            <div class="p-6">
                <div class="flex justify-between items-start mb-4">
                    <div>
                        <h1 class="text-3xl font-bold text-white mb-2"><?php echo htmlspecialchars($car['car_name']); ?></h1>
                        <p class="text-blue-400 text-lg"><?php echo htmlspecialchars($car['brand_name']); ?> - <?php echo htmlspecialchars($car['type_name']); ?></p>
                    </div>
                    <div class="text-right">
                        <p class="text-3xl font-bold text-green-400"><?php echo number_format($car['price']); ?> VNĐ</p>
                        <p class="text-gray-400">Giá bán</p>
                    </div>
                </div>
                

                <div class="grid md:grid-cols-2 gap-6 mb-6">
                    <div class="space-y-3">
                        <h3 class="text-xl font-semibold text-white mb-3">Thông số kỹ thuật</h3>
                        <div class="flex justify-between py-2 border-b border-gray-700">
                            <span class="text-gray-400">Năm sản xuất:</span>
                            <span class="text-white"><?php echo htmlspecialchars($car['year']); ?></span>
                        </div>
                        <div class="flex justify-between py-2 border-b border-gray-700">
                            <span class="text-gray-400">Màu sắc:</span>
                            <span class="text-white"><?php echo htmlspecialchars($car['color']); ?></span>
                        </div>
                        <div class="flex justify-between py-2 border-b border-gray-700">
                            <span class="text-gray-400">Hãng xe:</span>
                            <span class="text-white"><?php echo htmlspecialchars($car['brand_name']); ?></span>
                        </div>
                    </div>
                    
                    <div class="space-y-3">
                        <h3 class="text-xl font-semibold text-white mb-3">Mô tả</h3>
                        <div class="text-gray-300 bg-gray-800 p-4 rounded-lg">
                            <?php if (!empty($car['description'])): ?>
                                <?php echo nl2br(htmlspecialchars($car['description'])); ?>
                            <?php else: ?>
                                <p class="text-gray-500">Không có mô tả chi tiết.</p>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
                

                <div class="flex space-x-4">
                    <button class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-3 rounded-lg font-semibold transition">
                        Liên hệ mua xe
                    </button>
                    <button class="bg-green-600 hover:bg-green-700 text-white px-6 py-3 rounded-lg font-semibold transition">
                        Đặt lịch xem xe
                    </button>
                    <a href="index.php?page=product" class="bg-gray-600 hover:bg-gray-700 text-white px-6 py-3 rounded-lg font-semibold transition inline-block">
                        ← Quay lại danh sách
                    </a>
                </div>
            </div>
        </div>
        
        <!-- Similar Cars Section -->
        <?php if (!empty($recommendedCars)): ?>
        <div class="mt-12">
            <h2 class="text-2xl font-bold text-white mb-6 text-center">Xe tương tự</h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
                <?php foreach ($recommendedCars as $recCar): ?>
                    <?php if ($recCar['car_id'] != $car['car_id']): // Don't show the current car ?>
                    <div class="bg-gray-800 rounded-lg shadow-lg p-4 border border-gray-700 hover:border-gray-500 transition-all duration-200">
                        <div class="w-full h-32 bg-gray-700 rounded-lg overflow-hidden mb-3">
                            <img src="<?php echo !empty($recCar['image_url']) ? $recCar['image_url'] : 'public/layout/img/hinh1.webp'; ?>" 
                                 alt="<?php echo htmlspecialchars($recCar['car_name']); ?>" 
                                 class="w-full h-full object-cover">
                        </div>
                        <h3 class="font-semibold text-lg text-white mb-2 truncate"><?php echo htmlspecialchars($recCar['car_name']); ?></h3>
                        <p class="text-gray-300 font-bold mb-2"><?php echo number_format($recCar['price']); ?> VNĐ</p>
                        <p class="text-gray-400 text-sm mb-3"><?php echo htmlspecialchars($recCar['brand_name']); ?> - <?php echo htmlspecialchars($recCar['type_name']); ?></p>
                        <a href="index.php?page=detail&id=<?php echo $recCar['car_id']; ?>" 
                           class="block w-full bg-gray-700 hover:bg-gray-600 text-white font-semibold py-2 rounded-lg transition-colors duration-200 text-center text-sm">
                            Xem chi tiết
                        </a>
                    </div>
                    <?php endif; ?>
                <?php endforeach; ?>
            </div>
        </div>
        <?php endif; ?>
    <?php else: ?>
        <div class="bg-red-800 border border-red-600 text-red-200 px-4 py-3 rounded text-center">
            <h2 class="text-xl font-bold mb-2">Không tìm thấy xe</h2>
            <p>Xe bạn đang tìm không tồn tại hoặc đã bị xóa.</p>
            <p class="mt-2 text-sm">ID tìm kiếm: <?php echo htmlspecialchars($_GET['id'] ?? 'không có'); ?></p>
            <a href="index.php?page=product" class="text-blue-400 hover:underline mt-2 inline-block">← Quay lại danh sách xe</a>
        </div>
    <?php endif; ?>
</div>
</main>