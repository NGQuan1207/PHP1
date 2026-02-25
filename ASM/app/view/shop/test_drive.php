<main class="bg-gray-900 min-h-screen py-12">
<div class="max-w-4xl mx-auto px-6">
    <div class="text-center mb-8">
        <h1 class="text-4xl font-bold text-white mb-4">Đặt lịch lái thử</h1>
        <p class="text-gray-400">Trải nghiệm xe thật trước khi quyết định mua</p>
    </div>
    
    <?php if($car): ?>
    <div class="bg-gray-800 rounded-lg p-6 mb-8 border border-gray-700">
        <h2 class="text-xl font-semibold text-white mb-4">Xe muốn lái thử:</h2>
        <div class="flex items-center gap-6">
            <div class="w-32 h-24 bg-gray-700 rounded-lg overflow-hidden">
                <img src="<?php echo !empty($car['image_url']) ? $car['image_url'] : 'public/layout/img/hinh1.webp'; ?>" 
                     alt="<?php echo htmlspecialchars($car['car_name']); ?>" 
                     class="w-full h-full object-cover">
            </div>
            <div>
                <h3 class="text-lg font-semibold text-white"><?php echo htmlspecialchars($car['car_name']); ?></h3>
                <p class="text-gray-400"><?php echo htmlspecialchars($car['brand_name']); ?> - <?php echo htmlspecialchars($car['type_name']); ?></p>
                <p class="text-green-400 font-bold"><?php echo number_format($car['price'], 0, ',', '.'); ?> VNĐ</p>
            </div>
        </div>
    </div>
    <?php endif; ?>
    
    <div class="bg-gray-800 rounded-lg shadow-lg p-8 border border-gray-700">
        <h2 class="text-2xl font-semibold text-white mb-6">Thông tin đặt lịch</h2>
        
        <form class="space-y-6" onsubmit="event.preventDefault(); alert('Đặt lịch thành công! Chúng tôi sẽ liên hệ xác nhận trong vòng 24h.');">
            <div class="grid md:grid-cols-2 gap-6">
                <div class="space-y-2">
                    <label for="full_name" class="block text-sm font-medium text-gray-300">Họ và tên *</label>
                    <input type="text" id="full_name" name="full_name" required 
                           class="w-full px-4 py-3 bg-gray-700 border border-gray-600 rounded-lg text-white placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-green-500" 
                           placeholder="Nhập họ tên của bạn">
                </div>
                
                <div class="space-y-2">
                    <label for="phone" class="block text-sm font-medium text-gray-300">Số điện thoại *</label>
                    <input type="tel" id="phone" name="phone" required 
                           class="w-full px-4 py-3 bg-gray-700 border border-gray-600 rounded-lg text-white placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-green-500" 
                           placeholder="Nhập số điện thoại">
                </div>
            </div>
            
            <div class="space-y-2">
                <label for="email" class="block text-sm font-medium text-gray-300">Email</label>
                <input type="email" id="email" name="email" 
                       class="w-full px-4 py-3 bg-gray-700 border border-gray-600 rounded-lg text-white placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-green-500" 
                       placeholder="Nhập địa chỉ email">
            </div>
            
            <div class="space-y-2">
                <label for="id_number" class="block text-sm font-medium text-gray-300">Số CMND/CCCD *</label>
                <input type="text" id="id_number" name="id_number" required 
                       class="w-full px-4 py-3 bg-gray-700 border border-gray-600 rounded-lg text-white placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-green-500" 
                       placeholder="Nhập số CMND/CCCD (bắt buộc để lái thử)">
            </div>
            
            <div class="space-y-2">
                <label for="license_number" class="block text-sm font-medium text-gray-300">Số bằng lái xe *</label>
                <input type="text" id="license_number" name="license_number" required 
                       class="w-full px-4 py-3 bg-gray-700 border border-gray-600 rounded-lg text-white placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-green-500" 
                       placeholder="Nhập số bằng lái xe">
            </div>
            
            <div class="grid md:grid-cols-2 gap-6">
                <div class="space-y-2">
                    <label for="test_date" class="block text-sm font-medium text-gray-300">Ngày muốn lái thử *</label>
                    <input type="date" id="test_date" name="test_date" required 
                           min="<?php echo date('Y-m-d', strtotime('+1 day')); ?>"
                           class="w-full px-4 py-3 bg-gray-700 border border-gray-600 rounded-lg text-white focus:outline-none focus:ring-2 focus:ring-green-500">
                </div>
                
                <div class="space-y-2">
                    <label for="test_time" class="block text-sm font-medium text-gray-300">Khung giờ *</label>
                    <select id="test_time" name="test_time" required 
                            class="w-full px-4 py-3 bg-gray-700 border border-gray-600 rounded-lg text-white focus:outline-none focus:ring-2 focus:ring-green-500">
                        <option value="">Chọn khung giờ</option>
                        <option value="08:00-10:00">08:00 - 10:00</option>
                        <option value="10:00-12:00">10:00 - 12:00</option>
                        <option value="13:00-15:00">13:00 - 15:00</option>
                        <option value="15:00-17:00">15:00 - 17:00</option>
                        <option value="17:00-19:00">17:00 - 19:00</option>
                    </select>
                </div>
            </div>
            
            <div class="space-y-2">
                <label for="pickup_location" class="block text-sm font-medium text-gray-300">Địa điểm lái thử</label>
                <select id="pickup_location" name="pickup_location" 
                        class="w-full px-4 py-3 bg-gray-700 border border-gray-600 rounded-lg text-white focus:outline-none focus:ring-2 focus:ring-green-500">
                    <option value="">Chọn địa điểm</option>
                    <option value="showroom_hcm">Showroom MQAuto Quận 1, TP.HCM</option>
                    <option value="showroom_hn">Showroom MQAuto Ba Đình, Hà Nội</option>
                    <option value="showroom_dn">Showroom MQAuto Hai Châu, Đà Nẵng</option>
                    <option value="home">Tại nhà (phí dịch vụ 500,000 VNĐ)</option>
                </select>
            </div>
            
            <div class="space-y-2">
                <label for="experience_level" class="block text-sm font-medium text-gray-300">Kinh nghiệm lái xe</label>
                <select id="experience_level" name="experience_level" 
                        class="w-full px-4 py-3 bg-gray-700 border border-gray-600 rounded-lg text-white focus:outline-none focus:ring-2 focus:ring-green-500">
                    <option value="">Chọn mức độ kinh nghiệm</option>
                    <option value="beginner">Mới học lái (dưới 1 năm)</option>
                    <option value="intermediate">Trung bình (1-5 năm)</option>
                    <option value="experienced">Có kinh nghiệm (trên 5 năm)</option>
                </select>
            </div>
            
            <div class="space-y-2">
                <label for="notes" class="block text-sm font-medium text-gray-300">Ghi chú thêm</label>
                <textarea id="notes" name="notes" rows="3" 
                          class="w-full px-4 py-3 bg-gray-700 border border-gray-600 rounded-lg text-white placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-green-500" 
                          placeholder="Có yêu cầu đặc biệt nào không? (Ví dụ: cần hướng dẫn sử dụng các tính năng...)"></textarea>
            </div>
            
            <div class="bg-yellow-900 border border-yellow-600 rounded-lg p-4">
                <h3 class="text-yellow-300 font-semibold mb-2">Lưu ý quan trọng:</h3>
                <ul class="text-yellow-200 text-sm space-y-1">
                    <li>• Phải mang theo CMND/CCCD và bằng lái xe gốc</li>
                    <li>• Thời gian lái thử: 30-60 phút tùy theo xe</li>
                    <li>• Có nhân viên hỗ trợ đi cùng</li>
                    <li>• Phí lái thử: MIỄN PHÍ tại showroom</li>
                    <li>• Có thể hủy/đổi lịch trước 24h</li>
                </ul>
            </div>
            
            <div class="flex flex-wrap gap-4 pt-6">
                <button type="submit" 
                        class="bg-green-600 hover:bg-green-700 text-white px-8 py-3 rounded-lg font-semibold transition-all duration-200">
                    Đặt lịch lái thử
                </button>
                <a href="index.php?page=detail&id=<?php echo $car['car_id'] ?? ''; ?>" 
                   class="bg-gray-600 hover:bg-gray-700 text-white px-8 py-3 rounded-lg font-semibold transition-all duration-200 inline-block">
                    ← Quay lại
                </a>
            </div>
        </form>
    </div>
    
    <div class="mt-8 grid md:grid-cols-3 gap-6">
        <div class="text-center p-6 bg-gray-800 rounded-lg border border-gray-700">
            <svg class="w-8 h-8 text-green-400 mx-auto mb-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
            </svg>
            <h3 class="text-white font-semibold mb-2">TP.HCM</h3>
            <p class="text-gray-400 text-sm">123 Đường Lê Lợi<br>Quận 1, TP.HCM</p>
        </div>
        
        <div class="text-center p-6 bg-gray-800 rounded-lg border border-gray-700">
            <svg class="w-8 h-8 text-green-400 mx-auto mb-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
            </svg>
            <h3 class="text-white font-semibold mb-2">Hà Nội</h3>
            <p class="text-gray-400 text-sm">456 Đường Trần Hưng Đạo<br>Ba Đình, Hà Nội</p>
        </div>
        
        <div class="text-center p-6 bg-gray-800 rounded-lg border border-gray-700">
            <svg class="w-8 h-8 text-green-400 mx-auto mb-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
            </svg>
            <h3 class="text-white font-semibold mb-2">Đà Nẵng</h3>
            <p class="text-gray-400 text-sm">789 Đường Hàn Thuyên<br>Hai Châu, Đà Nẵng</p>
        </div>
    </div>
</div>
</main>