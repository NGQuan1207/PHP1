-- ===================================================================
-- DATABASE UPDATE SCRIPT
-- Script để cập nhật database hiện tại thay vì tạo mới
-- ===================================================================

USE php1_db;

-- ===================================================================
-- BƯỚC 1: XÓA FOREIGN KEY CONSTRAINTS CŨ
-- ===================================================================

-- Xóa foreign key constraint cũ trong bảng orders
ALTER TABLE orders DROP FOREIGN KEY orders_ibfk_1;

-- ===================================================================
-- BƯỚC 2: CẬP NHẬT BẢNG CUSTOMERS THÀNH USERS
-- ===================================================================

-- Đổi tên cột customer_id thành user_id
ALTER TABLE customers CHANGE customer_id user_id INT AUTO_INCREMENT;

-- Thêm cột password
ALTER TABLE customers ADD COLUMN password VARCHAR(255) NOT NULL DEFAULT 'temp_password';

-- Thêm cột created_at
ALTER TABLE customers ADD COLUMN created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP;

-- Thêm UNIQUE constraint cho email
ALTER TABLE customers ADD CONSTRAINT unique_email UNIQUE (email);

-- Đổi tên bảng customers thành users
RENAME TABLE customers TO users;

-- ===================================================================
-- BƯỚC 3: CẬP NHẬT BẢNG ORDERS
-- ===================================================================

-- Đổi tên cột customer_id thành user_id trong bảng orders
ALTER TABLE orders CHANGE customer_id user_id INT NOT NULL;

-- Thêm lại foreign key constraint với tên mới
ALTER TABLE orders ADD CONSTRAINT fk_orders_user FOREIGN KEY (user_id) REFERENCES users(user_id);

-- ===================================================================
-- BƯỚC 4: CẬP NHẬT DỮ LIỆU PASSWORDS CHO USER CÓ SẴN
-- ===================================================================

-- Cập nhật password cho các user hiện tại (sử dụng MD5 đơn giản cho demo)
UPDATE users SET password = MD5('123456') WHERE email = 'nguyenvanan@gmail.com';
UPDATE users SET password = MD5('123456') WHERE email = 'tranthibinh@gmail.com';
UPDATE users SET password = MD5('123456') WHERE email = 'levancuong@gmail.com';
UPDATE users SET password = MD5('123456') WHERE email = 'phamthidung@gmail.com';
UPDATE users SET password = MD5('123456') WHERE email = 'hoangvanem@gmail.com';

-- ===================================================================
-- BƯỚC 5: THÊM USER ADMIN MỚI
-- ===================================================================

-- Thêm admin user mới
INSERT INTO users (full_name, email, password, phone, address) VALUES 
('Admin User', 'admin@mqauto.com', MD5('admin123'), '0999999999', 'MQAuto Headquarters');

-- ===================================================================
-- BƯỚC 6: KIỂM TRA KẾT QUỢ
-- ===================================================================

-- Kiểm tra cấu trúc bảng users
DESCRIBE users;

-- Kiểm tra cấu trúc bảng orders  
DESCRIBE orders;

-- Kiểm tra dữ liệu users
SELECT user_id, full_name, email, phone FROM users;

-- Kiểm tra foreign key constraints
SELECT 
    CONSTRAINT_NAME,
    TABLE_NAME,
    COLUMN_NAME,
    REFERENCED_TABLE_NAME,
    REFERENCED_COLUMN_NAME
FROM information_schema.KEY_COLUMN_USAGE 
WHERE TABLE_SCHEMA = 'php1_db' 
AND REFERENCED_TABLE_NAME IS NOT NULL;