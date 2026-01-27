<main class="bg-gray-900 min-h-screen py-12">
<div class="max-w-6xl mx-auto px-6">
    <div class="text-center mb-10">
        <h2 class="text-4xl font-bold mb-4 text-white">Danh sách xe đang bán</h2>
        <p class="text-gray-400">Khám phá bộ sưu tập xe của chúng tôi</p>
    </div>
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
        <?php if (!empty($cars)) : ?>
            <?php foreach ($cars as $car) : ?>
                <div class="bg-gray-800 rounded-lg shadow-lg p-6 border border-gray-700 hover:border-gray-500 transition-all duration-200">
                    <div class="w-full h-40 bg-gray-700 rounded-lg overflow-hidden mb-4">
                        <img src="<?php echo !empty($car['image_url']) ? $car['image_url'] : 'public/layout/img/hinh1.webp'; ?>" alt="<?php echo htmlspecialchars($car['car_name']); ?>" class="w-full h-full object-cover">
                    </div>
                    <h3 class="font-semibold text-lg text-white mb-2"><?php echo htmlspecialchars($car['car_name']); ?></h3>
                    <p class="text-gray-300 font-bold mb-2">Giá: <?php echo number_format($car['price'], 0, ',', '.'); ?> VNĐ</p>
                    <p class="text-gray-300 text-sm mb-4"><?php echo htmlspecialchars($car['description']); ?></p>
                    <button class="w-full bg-gray-700 hover:bg-black text-white font-semibold py-2 rounded-lg transition-colors duration-200">Xem chi tiết</button>
                </div>
            <?php endforeach; ?>
        <?php else : ?>
            <div class="col-span-3 text-center text-gray-400 py-8 bg-gray-800 rounded-lg">
                Không có xe nào trong cơ sở dữ liệu.
            </div>
        <?php endif; ?>
    </div>
</div>
</main>
            <a href="#">1</a>
            <a href="#">2</a>
            <a href="#">3</a>
        </div>
    </div>
</div>
</main>