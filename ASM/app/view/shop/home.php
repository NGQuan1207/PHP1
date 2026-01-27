<section class="relative bg-gray-900 min-h-[500px] flex items-center justify-center overflow-hidden">
    <img src="public/layout/img/banner01.jpg" alt="Banner Car" class="absolute inset-0 w-full h-full object-cover opacity-50">
    <div class="absolute inset-0 bg-black/60"></div>
    <div class="relative z-10 max-w-4xl mx-auto text-center px-6 py-20">
        <h1 class="text-4xl md:text-6xl font-bold text-white mb-6">Chào mừng đến với <span class="text-gray-300">MQAuto</span></h1>
        <p class="text-lg md:text-xl text-gray-200 mb-8">Nơi bạn tìm thấy những mẫu xe phù hợp nhất cho mình.</p>
        <a href="index.php?page=product" class="inline-block bg-gray-800 hover:bg-black text-white font-semibold px-8 py-3 rounded-lg transition-colors duration-200">Tìm xe có sẵn</a>
    </div>
</section>
<main class="bg-gray-900">
<div class="max-w-6xl mx-auto px-6 py-12">
    <h2 class="text-3xl font-bold mb-8 text-center text-white">Danh sách xe mới về</h2>
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
        <?php if (!empty($cars)) : ?>
            <?php foreach ($cars as $car) : ?>
                <div class="bg-gray-800 rounded-lg shadow-lg p-6 border border-gray-700 hover:border-gray-500 transition-all duration-200">
                    <div class="w-full h-40 bg-gray-700 rounded-lg overflow-hidden mb-4">
                        <img src="<?php echo !empty($car['image_url']) ? $car['image_url'] : 'public/layout/img/hinh1.webp'; ?>" alt="<?php echo htmlspecialchars($car['model']); ?>" class="w-full h-full object-cover">
                    </div>
                    <h3 class="font-semibold text-lg text-white mb-2"><?php echo htmlspecialchars($car['model']); ?></h3>
                    <p class="text-gray-300 font-bold mb-2">Giá: <?php echo number_format($car['price'], 0, ',', '.'); ?> VNĐ</p>
                    <p class="text-gray-300 text-sm"><?php echo htmlspecialchars($car['description']); ?></p>
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