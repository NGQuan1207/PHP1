<main class="bg-gray-900 min-h-screen py-12">
<div class="max-w-6xl mx-auto px-6">
    <div class="text-center mb-10">
        <h2 class="text-4xl font-bold mb-4 text-white">Danh sách xe đang bán</h2>
        <p class="text-gray-400">Khám phá bộ sưu tập xe của chúng tôi</p>
    </div>
    
    <div class="mb-8">
        <form action="index.php" method="GET" class="max-w-md mx-auto">
            <input type="hidden" name="page" value="product">
            <?php if (isset($_GET['type_id'])) : ?>
                <input type="hidden" name="type_id" value="<?php echo $_GET['type_id']; ?>">
            <?php endif; ?>
            <div class="relative">
                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                    <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                    </svg>
                </div>
                <input type="text" name="search" 
                       value="<?php echo isset($_GET['search']) ? htmlspecialchars($_GET['search']) : ''; ?>"
                       placeholder="Tìm kiếm xe theo tên hoặc hãng..."
                       class="block w-full pl-10 pr-12 py-3 border border-gray-600 rounded-lg bg-gray-700 text-white placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                <button type="submit" class="absolute inset-y-0 right-0 pr-3 flex items-center">
                    <span class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-r-lg transition-colors">
                        Tìm
                    </span>
                </button>
            </div>
        </form>
        <?php if (isset($_GET['search']) && !empty($_GET['search'])) : ?>
            <div class="text-center mt-4">
                <p class="text-gray-300">
                    Tìm thấy <?php echo count($cars) > 0 ? $tongsp : 0; ?> kết quả cho: 
                    <span class="font-semibold text-white">"<?php echo htmlspecialchars($_GET['search']); ?>"</span>
                    <a href="index.php?page=product<?php echo isset($_GET['type_id']) ? '&type_id=' . $_GET['type_id'] : ''; ?>" 
                       class="ml-2 text-blue-400 hover:text-blue-300">
                        ✕ Xóa tìm kiếm
                    </a>
                </p>
            </div>
        <?php endif; ?>
    </div>
    
    <div class="mb-8">
        <h3 class="text-xl font-semibold text-white mb-4">Lọc theo loại xe:</h3>
        <div class="flex flex-wrap gap-3">
            <?php $search_param = isset($_GET['search']) && !empty($_GET['search']) ? '&search=' . urlencode($_GET['search']) : ''; ?>
            <a href="index.php?page=product<?php echo $search_param; ?>" 
               class="px-4 py-2 rounded-lg transition-colors <?php echo !isset($_GET['type_id']) ? 'bg-blue-600 text-white' : 'bg-gray-700 text-gray-300 hover:bg-gray-600'; ?>">
                Tất cả
            </a>
            <?php if (!empty($carTypes)) : ?>
                <?php foreach ($carTypes as $type) : ?>
                    <a href="index.php?page=product&type_id=<?php echo $type['type_id']; ?><?php echo $search_param; ?>" 
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
                    <div class="relative w-full h-40 bg-gray-700 rounded-lg overflow-hidden mb-4">
                        <img src="<?php echo !empty($car['image_url']) ? $car['image_url'] : 'public/layout/img/hinh1.webp'; ?>" alt="<?php echo htmlspecialchars($car['car_name']); ?>" class="w-full h-full object-cover">
                
                        <?php if(isset($_SESSION['user'])): ?>
                        <?php $inWishlist = in_array($car['car_id'], $userWishlist); ?>
                        <button onclick="toggleWishlist(<?php echo $car['car_id']; ?>, this)" 
                                class="absolute top-2 right-2 <?php echo $inWishlist ? 'bg-red-600 hover:bg-red-700' : 'bg-gray-600 hover:bg-red-600'; ?> text-white p-2 rounded-full shadow-lg transition-colors duration-200 heart-btn">
                            <svg class="w-4 h-4" <?php echo $inWishlist ? 'fill="currentColor" stroke="none"' : 'fill="none" stroke="currentColor"'; ?> viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"/>
                            </svg>
                        </button>
                        <?php endif; ?>
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
            $params = [];
            if (isset($_GET['type_id'])) $params[] = 'type_id=' . $_GET['type_id'];
            if (isset($_GET['search']) && !empty($_GET['search'])) $params[] = 'search=' . urlencode($_GET['search']);
            $param_string = !empty($params) ? '&' . implode('&', $params) : '';
            ?>
            <?php if ($trang_hien_tai > 1) : ?>
                <a href="index.php?page=product&trang=<?php echo $trang_hien_tai - 1; ?><?php echo $param_string; ?>" 
                   class="px-4 py-2 bg-gray-700 text-white rounded hover:bg-gray-600 transition-colors">
                   « Trước
                </a>
            <?php endif; ?>
            
            <?php for ($i = 1; $i <= $sotrang; $i++) : ?>
                <?php if ($i == $trang_hien_tai) : ?>
                    <span class="px-4 py-2 bg-blue-600 text-white rounded font-bold"><?php echo $i; ?></span>
                <?php else : ?>
                    <a href="index.php?page=product&trang=<?php echo $i; ?><?php echo $param_string; ?>" 
                       class="px-4 py-2 bg-gray-700 text-white rounded hover:bg-gray-600 transition-colors">
                       <?php echo $i; ?>
                    </a>
                <?php endif; ?>
            <?php endfor; ?>
            
            <?php if ($trang_hien_tai < $sotrang) : ?>
                <a href="index.php?page=product&trang=<?php echo $trang_hien_tai + 1; ?><?php echo $param_string; ?>" 
                   class="px-4 py-2 bg-gray-700 text-white rounded hover:bg-gray-600 transition-colors">
                   Sau »
                </a>
            <?php endif; ?>
        </div>
    </div>
    <?php endif; ?>
</div>
</main>


<script>
function toggleWishlist(carId, button) {
   
    const svg = button.querySelector('svg');
    const isInWishlist = svg.getAttribute('fill') === 'currentColor';
    
    const action = isInWishlist ? 'remove_from_wishlist' : 'add_to_wishlist';
    
    fetch('index.php?page=' + action, {
        method: 'POST',
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded',
        },
        body: 'car_id=' + carId
    })
    .then(response => {
      
        if (!response.ok) {
            throw new Error('Network response was not ok');
        }
        return response.text(); 
    })
    .then(text => {
     
        let data;
        try {
            data = JSON.parse(text);
        } catch (e) {
            console.error('Response is not valid JSON:', text);
            throw new Error('Response is not valid JSON');
        }
        
        if(data.success) {
          
            if(isInWishlist) {
                
                svg.setAttribute('fill', 'none');
                svg.setAttribute('stroke', 'currentColor');
                button.classList.remove('bg-red-600');
                button.classList.add('bg-gray-600');
            } else {
              
                svg.setAttribute('fill', 'currentColor');
                svg.setAttribute('stroke', 'none');
                button.classList.remove('bg-gray-600');
                button.classList.add('bg-red-600');
            }
            
          
            const originalText = button.title;
            button.title = data.message;
            setTimeout(() => {
                button.title = originalText;
            }, 2000);
        } else {
            alert(data.message);
        }
    })
    .catch(error => {
        console.error('Lỗi:', error);
        alert('Có lỗi xảy ra, vui lòng thử lại');
    });
}
</script>