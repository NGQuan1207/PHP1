-- ===================================================================
-- ALTER CAR_TYPES TABLE - ADD IMAGE COLUMN
-- Script để thêm cột hình ảnh vào bảng car_types
-- ===================================================================

USE php1_db;

-- Thêm cột img vào bảng car_types
ALTER TABLE car_types ADD COLUMN img VARCHAR(255) DEFAULT NULL;

-- Cập nhật hình ảnh cho các loại xe hiện có
UPDATE car_types SET img = 'https://via.placeholder.com/180x120/444444/ffffff?text=Sedan' WHERE type_name = 'Sedan';
UPDATE car_types SET img = 'https://via.placeholder.com/180x120/444444/ffffff?text=SUV' WHERE type_name = 'SUV';
UPDATE car_types SET img = 'https://via.placeholder.com/180x120/444444/ffffff?text=Hatchback' WHERE type_name = 'Hatchback';
UPDATE car_types SET img = 'https://via.placeholder.com/180x120/444444/ffffff?text=MPV' WHERE type_name = 'MPV';
UPDATE car_types SET img = 'https://via.placeholder.com/180x120/444444/ffffff?text=Pickup' WHERE type_name = 'Pickup';
UPDATE car_types SET img = 'https://via.placeholder.com/180x120/444444/ffffff?text=Crossover' WHERE type_name = 'Crossover';

-- Kiểm tra kết quả
SELECT * FROM car_types;

-- Hiển thị cấu trúc bảng đã cập nhật
DESCRIBE car_types;