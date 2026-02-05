<main class="bg-gray-900 min-h-screen py-12">
<div class="max-w-6xl mx-auto px-6">
    <div class="text-center mb-10">
        <h2 class="text-4xl font-bold mb-4 text-white">Danh sách xe đang bán</h2>
        <p class="text-gray-400">Khám phá bộ sưu tập xe của chúng tôi</p>
    </div>
    
    <!-- Category Filter Section -->
    <div class="mb-8">
        <h3 class="text-xl font-semibold text-white mb-4">Lọc theo loại xe:</h3>
        <div class="flex flex-wrap gap-3">
            <a href="index.php?page=product" 
               class="px-4 py-2 rounded-lg transition-colors <?php echo !isset($_GET['type_id']) ? 'bg-blue-600 text-white' : 'bg-gray-700 text-gray-300 hover:bg-gray-600'; ?>">
                Tất cả
            </a>
            <?php if (!empty($carTypes)) : ?>
                <?php foreach ($carTypes as $type) : ?>
                    <a href="index.php?page=product&type_id=<?php echo $type['type_id']; ?>" 
                       class="px-4 py-2 rounded-lg transition-colors <?php echo (isset($_GET['type_id']) && $_GET['type_id'] == $type['type_id']) ? 'bg-blue-600 text-white' : 'bg-gray-700 text-gray-300 hover:bg-gray-600'; ?>">
                        <?php echo htmlspecialchars($type['type_name']); ?>
                    </a>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>
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
                    <a href="index.php?page=detail&id=<?php echo $car['car_id']; ?>" class="block w-full bg-gray-700 hover:bg-black text-white font-semibold py-2 rounded-lg transition-colors duration-200 text-center">Xem chi tiết</a>
                </div>
            <?php endforeach; ?>
        <?php else : ?>
            <div class="col-span-3 text-center text-gray-400 py-8 bg-gray-800 rounded-lg">
                Không có xe nào trong cơ sở dữ liệu.
            </div>
        <?php endif; ?>
    </div>
    <?php if (isset($sotrang) && $sotrang > 1) : ?>
    <div class="flex justify-center mt-8">
        <div class="flex space-x-2">
            <?php 
            $type_param = isset($_GET['type_id']) ? '&type_id=' . $_GET['type_id'] : '';
            ?>
            <?php if ($trang_hien_tai > 1) : ?>
                <a href="index.php?page=product&trang=<?php echo $trang_hien_tai - 1; ?><?php echo $type_param; ?>" 
                   class="px-4 py-2 bg-gray-700 text-white rounded hover:bg-gray-600 transition-colors">
                   « Trước
                </a>
            <?php endif; ?>
            
            <?php for ($i = 1; $i <= $sotrang; $i++) : ?>
                <?php if ($i == $trang_hien_tai) : ?>
                    <span class="px-4 py-2 bg-blue-600 text-white rounded font-bold"><?php echo $i; ?></span>
                <?php else : ?>
                    <a href="index.php?page=product&trang=<?php echo $i; ?><?php echo $type_param; ?>" 
                       class="px-4 py-2 bg-gray-700 text-white rounded hover:bg-gray-600 transition-colors">
                       <?php echo $i; ?>
                    </a>
                <?php endif; ?>
            <?php endfor; ?>
            
            <?php if ($trang_hien_tai < $sotrang) : ?>
                <a href="index.php?page=product&trang=<?php echo $trang_hien_tai + 1; ?><?php echo $type_param; ?>" 
                   class="px-4 py-2 bg-gray-700 text-white rounded hover:bg-gray-600 transition-colors">
                   Sau »
                </a>
            <?php endif; ?>
        </div>
    </div>
    <?php endif; ?>
</div>
</main>