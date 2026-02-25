<main class="bg-gray-900 min-h-screen py-12">
<div class="max-w-4xl mx-auto px-6">
    <div class="text-center mb-8">
        <h1 class="text-4xl font-bold text-white mb-4">Liên hệ tư vấn</h1>
        <p class="text-gray-400">Đăng ký nhận tư vấn từ chuyên viên của chúng tôi</p>
    </div>
    
    <?php if($car): ?>
    <div class="bg-gray-800 rounded-lg p-6 mb-8 border border-gray-700">
        <h2 class="text-xl font-semibold text-white mb-4">Xe quan tâm:</h2>
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
        <h2 class="text-2xl font-semibold text-white mb-6">Thông tin liên hệ</h2>
        
        <form class="space-y-6" onsubmit="event.preventDefault(); alert('Cảm ơn bạn đã đăng ký! Chúng tôi sẽ liên hệ lại trong thời gian sớm nhất.');">
            <div class="grid md:grid-cols-2 gap-6">
                <div class="space-y-2">
                    <label for="full_name" class="block text-sm font-medium text-gray-300">Họ và tên *</label>
                    <input type="text" id="full_name" name="full_name" required 
                           class="w-full px-4 py-3 bg-gray-700 border border-gray-600 rounded-lg text-white placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-500" 
                           placeholder="Nhập họ tên của bạn">
                </div>
                
                <div class="space-y-2">
                    <label for="phone" class="block text-sm font-medium text-gray-300">Số điện thoại *</label>
                    <input type="tel" id="phone" name="phone" required 
                           class="w-full px-4 py-3 bg-gray-700 border border-gray-600 rounded-lg text-white placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-500" 
                           placeholder="Nhập số điện thoại">
                </div>
            </div>
            
            <div class="space-y-2">
                <label for="email" class="block text-sm font-medium text-gray-300">Email</label>
                <input type="email" id="email" name="email" 
                       class="w-full px-4 py-3 bg-gray-700 border border-gray-600 rounded-lg text-white placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-500" 
                       placeholder="Nhập địa chỉ email">
            </div>
            
            <div class="space-y-2">
                <label for="address" class="block text-sm font-medium text-gray-300">Địa chỉ</label>
                <input type="text" id="address" name="address" 
                       class="w-full px-4 py-3 bg-gray-700 border border-gray-600 rounded-lg text-white placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-500" 
                       placeholder="Nhập địa chỉ của bạn">
            </div>
            
            <div class="space-y-2">
                <label for="consultation_type" class="block text-sm font-medium text-gray-300">Nhu cầu tư vấn</label>
                <select id="consultation_type" name="consultation_type" 
                        class="w-full px-4 py-3 bg-gray-700 border border-gray-600 rounded-lg text-white focus:outline-none focus:ring-2 focus:ring-blue-500">
                    <option value="">Chọn nhu cầu tư vấn</option>
                    <option value="pricing">Tư vấn giá và khuyến mãi</option>
                    <option value="features">Tư vấn tính năng xe</option>
                    <option value="financing">Tư vấn hình thức thanh toán</option>
                    <option value="trade_in">Tư vấn đổi xe cũ lấy xe mới</option>
                    <option value="maintenance">Tư vấn bảo hành và bảo dưỡng</option>
                </select>
            </div>
            
            <div class="space-y-2">
                <label for="preferred_time" class="block text-sm font-medium text-gray-300">Thời gian liên hệ</label>
                <select id="preferred_time" name="preferred_time" 
                        class="w-full px-4 py-3 bg-gray-700 border border-gray-600 rounded-lg text-white focus:outline-none focus:ring-2 focus:ring-blue-500">
                    <option value="">Chọn thời gian phù hợp</option>
                    <option value="morning">Buổi sáng (8:00 - 12:00)</option>
                    <option value="afternoon">Buổi chiều (13:00 - 17:00)</option>
                    <option value="evening">Buổi tối (18:00 - 21:00)</option>
                    <option value="anytime">Bất kỳ lúc nào</option>
                </select>
            </div>
            
            <div class="space-y-2">
                <label for="notes" class="block text-sm font-medium text-gray-300">Ghi chú thêm</label>
                <textarea id="notes" name="notes" rows="4" 
                          class="w-full px-4 py-3 bg-gray-700 border border-gray-600 rounded-lg text-white placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-500" 
                          placeholder="Nhập các thông tin, câu hỏi khác mà bạn muốn được tư vấn..."></textarea>
            </div>
            
            <div class="flex flex-wrap gap-4 pt-6">
                <button type="submit" 
                        class="bg-blue-600 hover:bg-blue-700 text-white px-8 py-3 rounded-lg font-semibold transition-all duration-200">
                    Gửi yêu cầu tư vấn
                </button>
                <a href="index.php?page=detail&id=<?php echo $car['car_id'] ?? ''; ?>" 
                   class="bg-gray-600 hover:bg-gray-700 text-white px-8 py-3 rounded-lg font-semibold transition-all duration-200 inline-block">
                    ← Quay lại
                </a>
            </div>
        </form>
    </div>
    
    <!-- Contact Info -->
    <div class="mt-8 grid md:grid-cols-3 gap-6">
        <div class="text-center p-6 bg-gray-800 rounded-lg border border-gray-700">
            <svg class="w-8 h-8 text-blue-400 mx-auto mb-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/>
            </svg>
            <h3 class="text-white font-semibold mb-2">Hotline</h3>
            <p class="text-gray-400">1900 - 6699</p>
        </div>
        
        <div class="text-center p-6 bg-gray-800 rounded-lg border border-gray-700">
            <svg class="w-8 h-8 text-blue-400 mx-auto mb-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 4.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
            </svg>
            <h3 class="text-white font-semibold mb-2">Email</h3>
            <p class="text-gray-400">tuvan@mqauto.com</p>
        </div>
        
        <div class="text-center p-6 bg-gray-800 rounded-lg border border-gray-700">
            <svg class="w-8 h-8 text-blue-400 mx-auto mb-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
            </svg>
            <h3 class="text-white font-semibold mb-2">Giờ làm việc</h3>
            <p class="text-gray-400">8:00 - 18:00 (T2-T7)</p>
        </div>
    </div>
</div>
</main>