<main class="bg-gray-900 min-h-screen py-12">
<div class="max-w-6xl mx-auto px-6">
    <div class="text-center mb-10">
        <h2 class="text-4xl font-bold mb-4 text-white">Danh sách xe yêu thích</h2>
        <p class="text-gray-400">Những chiếc xe bạn đã lưu để xem sau</p>
    </div>
    
    <?php if (!empty($wishlistItems)) : ?>
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
            <?php foreach ($wishlistItems as $item) : ?>
                <div class="bg-gray-800 rounded-lg shadow-lg p-6 border border-gray-700 hover:border-gray-500 transition-all duration-200">
                    <div class="relative">
                        <div class="w-full h-40 bg-gray-700 rounded-lg overflow-hidden mb-4">
                            <img src="<?php echo !empty($item['image_url']) ? $item['image_url'] : 'public/layout/img/hinh1.webp'; ?>" 
                                 alt="<?php echo htmlspecialchars($item['car_name']); ?>" 
                                 class="w-full h-full object-cover">
                        </div>
                        <button onclick="removeFromWishlist(<?php echo $item['car_id']; ?>)" 
                                class="absolute top-2 right-2 bg-red-600 hover:bg-red-700 text-white p-2 rounded-full shadow-lg transition-colors duration-200">
                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M12 21.35l-1.45-1.32C5.4 15.36 2 12.28 2 8.5 2 5.42 4.42 3 7.5 3c1.74 0 3.41.81 4.5 2.09C13.09 3.81 14.76 3 16.5 3 19.58 3 22 5.42 22 8.5c0 3.78-3.4 6.86-8.55 11.54L12 21.35z"/>
                            </svg>
                        </button>
                    </div>
                    
                    <h3 class="font-semibold text-lg text-white mb-2"><?php echo htmlspecialchars($item['car_name']); ?></h3>
                    <div class="text-gray-300 text-sm mb-3">
                        <p class="mb-1"><span class="text-gray-400">Thương hiệu:</span> <?php echo htmlspecialchars($item['brand_name']); ?></p>
                        <p class="mb-1"><span class="text-gray-400">Loại xe:</span> <?php echo htmlspecialchars($item['type_name']); ?></p>
                        <p class="mb-1"><span class="text-gray-400">Năm:</span> <?php echo htmlspecialchars($item['year']); ?></p>
                        <p class="mb-1"><span class="text-gray-400">Màu sắc:</span> <?php echo htmlspecialchars($item['color']); ?></p>
                    </div>
                    <p class="text-green-400 font-bold text-lg mb-4">Giá: <?php echo number_format($item['price'], 0, ',', '.'); ?> VNĐ</p>
                    
                    <div class="space-y-2">
                        <a href="index.php?page=detail&id=<?php echo $item['car_id']; ?>" 
                           class="block w-full bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 rounded-lg transition-colors duration-200 text-center">
                            Xem chi tiết
                        </a>
                        <button onclick="removeFromWishlist(<?php echo $item['car_id']; ?>)" 
                                class="w-full bg-red-600 hover:bg-red-700 text-white font-semibold py-2 rounded-lg transition-colors duration-200">
                            Xóa khỏi yêu thích
                        </button>
                    </div>
                    
                    <div class="text-xs text-gray-500 mt-3">
                        Đã thêm: <?php echo date('d/m/Y H:i', strtotime($item['date_added'])); ?>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
        
        <div class="text-center mt-8">
            <p class="text-gray-400">
                Bạn có <?php echo count($wishlistItems); ?> xe trong danh sách yêu thích
            </p>
        </div>
    <?php else : ?>
        <div class="text-center py-12">
            <div class="bg-gray-800 rounded-lg p-8 max-w-md mx-auto">
                <svg class="w-16 h-16 text-gray-600 mx-auto mb-4" fill="currentColor" viewBox="0 0 24 24">
                    <path d="M12 21.35l-1.45-1.32C5.4 15.36 2 12.28 2 8.5 2 5.42 4.42 3 7.5 3c1.74 0 3.41.81 4.5 2.09C13.09 3.81 14.76 3 16.5 3 19.58 3 22 5.42 22 8.5c0 3.78-3.4 6.86-8.55 11.54L12 21.35z"/>
                </svg>
                <h3 class="text-xl font-semibold text-white mb-2">Chưa có xe yêu thích</h3>
                <p class="text-gray-400 mb-4">Hãy thêm những chiếc xe bạn quan tâm vào danh sách yêu thích</p>
                <a href="index.php?page=product" 
                   class="inline-block bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 px-6 rounded-lg transition-colors duration-200">
                    Khám phá xe ngay
                </a>
            </div>
        </div>
    <?php endif; ?>
</div>
</main>

<script>
function removeFromWishlist(carId) {
    if(confirm('Bạn có chắc muốn xóa xe này khỏi danh sách yêu thích?')) {
        fetch('index.php?page=remove_from_wishlist', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded',
            },
            body: 'car_id=' + carId
        })
        .then(response => response.json())
        .then(data => {
            if(data.success) {
                alert(data.message);
                location.reload();
            } else {
                alert(data.message);
            }
        })
        .catch(error => {
            console.error('Lỗi:', error);
            alert('Có lỗi xảy ra, vui lòng thử lại');
        });
    }
}
</script>