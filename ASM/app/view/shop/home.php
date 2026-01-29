<section class="relative bg-gray-900 min-h-[500px] flex items-center justify-center overflow-hidden">
    <img src="public/layout/img/banner01.jpg" alt="Banner Car" class="absolute inset-0 w-full h-full object-cover opacity-80">
    <div class="absolute inset-0 bg-black/10"></div>
    <div class="relative z-10 max-w-4xl mx-auto text-center px-6 py-20">
        <h1 class="text-4xl md:text-6xl font-bold text-white mb-6">Chào mừng đến với <span class="text-gray-300">MQAuto</span></h1>
        <p class="text-lg md:text-xl text-gray-200 mb-8">Nơi bạn tìm thấy những mẫu xe phù hợp nhất cho mình.</p>
        <a href="index.php?page=product" class="inline-block bg-gray-800 hover:bg-black text-white font-semibold px-8 py-3 rounded-lg transition-colors duration-200">Tìm xe có sẵn</a>
    </div>
</section>

<section class="bg-gray-800 py-6">
    <div class="max-w-5xl mx-auto px-4">
        <h3 class="text-xl font-bold text-white mb-4 text-center">Loại xe</h3>
        <div class="relative">
            <button onclick="scrollCategories(-1)" class="absolute left-1 top-1/2 transform -translate-y-1/2 z-20 bg-gray-700 hover:bg-gray-600 text-white p-2 rounded-full shadow-lg transition-all duration-200">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
                </svg>
            </button>
            
            <div id="categoryContainer" class="flex gap-4 overflow-x-hidden overflow-y-visible px-12 py-1 scroll-smooth">
                <?php if (!empty($carTypes)) : ?>
                    <?php foreach ($carTypes as $type) : ?>
                        <div class="bg-gray-700 rounded-lg min-w-[180px] max-w-[180px] text-center flex-shrink-0 transform hover:scale-105 transition-all duration-300 shadow-lg overflow-hidden">
                            <div class="w-full h-24 overflow-hidden flex items-center justify-center">
                                <img src="<?php echo !empty($type['img']) ? htmlspecialchars($type['img']) : 'https://via.placeholder.com/150x100/444444/ffffff?text=' . urlencode($type['type_name']); ?>" 
                                     alt="<?php echo htmlspecialchars($type['type_name']); ?>" 
                                     class="w-full h-full object-contain transform scale-150 translate-x-16">
                            </div>
                            <div class="p-4">
                                <h4 class="font-bold text-white mb-3 text-base"><?php echo htmlspecialchars($type['type_name']); ?></h4>
                                <button class="text-gray-300 hover:text-white font-medium text-sm underline transition-colors duration-200">Mua ngay</button>
                            </div>
                        </div>
                    <?php endforeach; ?>
                <?php else : ?>
                    <div class="text-center text-gray-400 py-4">
                        Không có danh mục nào.
                    </div>
                <?php endif; ?>
            </div>
            
            <button onclick="scrollCategories(1)" class="absolute right-1 top-1/2 transform -translate-y-1/2 z-20 bg-gray-700 hover:bg-gray-600 text-white p-2 rounded-full shadow-lg transition-all duration-200">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                </svg>
            </button>
        </div>
    </div>
    
    <script>
        function scrollCategories(direction) {
            const container = document.getElementById('categoryContainer');
            const cardWidth = 180 + 16; 
            const scrollAmount = cardWidth * 3;
            
            container.scrollBy({
                left: direction * scrollAmount,
                behavior: 'smooth'
            });
        }
    </script>
</section>

<main class="bg-gray-900">
<div class="max-w-6xl mx-auto px-6 py-12">
    <h2 class="text-3xl font-bold mb-8 text-center text-white">Danh sách xe mới về</h2>
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
        <?php if (!empty($cars)) : ?>
            <?php foreach ($cars as $car) : ?>
                <div class="bg-gradient-to-br from-gray-800 to-gray-900 rounded-2xl shadow-lg p-6 text-center transform hover:scale-105 transition-transform duration-300 border border-gray-700">
                    <div class="bg-gray-700 rounded-xl p-4 mb-4">
                        <div class="text-left mb-3">
                            <h3 class="font-bold text-white text-lg"><?php echo htmlspecialchars($car['car_name']); ?></h3>
                            <p class="text-gray-400 text-sm"><?php echo $car['year']; ?> năm sản xuất</p>
                        </div>
                        <div class="h-32 mb-4">
                            <img src="<?php echo !empty($car['image_url']) ? $car['image_url'] : 'public/layout/img/hinh1.webp'; ?>" alt="<?php echo htmlspecialchars($car['car_name']); ?>" class="w-full h-full object-contain">
                        </div>
                        <div class="text-left space-y-2 mb-4">
                            <div class="flex justify-between">
                                <span class="text-gray-400 text-sm">Giá bán:</span>
                                <span class="text-white font-semibold text-sm"><?php echo number_format($car['price'], 0, ',', '.'); ?> VNĐ</span>
                            </div>
                            <div class="flex justify-between">
                                <span class="text-gray-400 text-sm">Màu sắc:</span>
                                <span class="text-gray-300 text-sm"><?php echo htmlspecialchars($car['color']); ?></span>
                            </div>
                            <div class="flex justify-between">
                                <span class="text-gray-400 text-sm">Loại xe:</span>
                                <span class="text-gray-300 text-sm"><?php echo htmlspecialchars($car['type_name']); ?></span>
                            </div>
                        </div>
                    </div>
                    <a href="index.php?page=detail&id=<?php echo $car['car_id']; ?>" class="block w-full bg-gray-600 hover:bg-gray-500 text-white font-semibold py-3 rounded-xl transition-all duration-200 text-center">
                        Xem chi tiết
                    </a>
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
