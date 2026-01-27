-- ===================================================================
-- CAR SALES DATABASE - SIMPLIFIED STUDENT VERSION
-- Cơ sở dữ liệu bán xe đơn giản cho sinh viên
-- ===================================================================

-- Tạo database
CREATE DATABASE IF NOT EXISTS php1_db;
USE php1_db;

-- ===================================================================
-- 1. BẢNG BRANDS (HÃNG XE)
-- ===================================================================
CREATE TABLE brands (
    brand_id INT AUTO_INCREMENT PRIMARY KEY,
    brand_name VARCHAR(50) NOT NULL,
    country VARCHAR(30)
);

-- ===================================================================
-- 2. BẢNG CAR_TYPES (LOẠI XE)
-- ===================================================================
CREATE TABLE car_types (
    type_id INT AUTO_INCREMENT PRIMARY KEY,
    type_name VARCHAR(30) NOT NULL
);

-- ===================================================================
-- 3. BẢNG CARS (XE Ô TÔ)
-- ===================================================================
CREATE TABLE cars (
    car_id INT AUTO_INCREMENT PRIMARY KEY,
    car_name VARCHAR(100) NOT NULL,
    brand_id INT NOT NULL,
    type_id INT NOT NULL,
    price DECIMAL(15,2) NOT NULL,
    year INT NOT NULL,
    color VARCHAR(30),
    description TEXT,
    image_url VARCHAR(255),
    
    -- Foreign Key constraints
    FOREIGN KEY (brand_id) REFERENCES brands(brand_id),
    FOREIGN KEY (type_id) REFERENCES car_types(type_id)
);

-- ===================================================================
-- 4. BẢNG USERS (NGƯỜI DÙNG/KHÁCH HÀNG)
-- ===================================================================
CREATE TABLE users (
    user_id INT AUTO_INCREMENT PRIMARY KEY,
    full_name VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    phone VARCHAR(15),
    address TEXT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- ===================================================================
-- 5. BẢNG ORDERS (ĐƠN HÀNG)
-- ===================================================================
CREATE TABLE orders (
    order_id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT NOT NULL,
    car_id INT NOT NULL,
    order_date DATETIME DEFAULT CURRENT_TIMESTAMP,
    total_price DECIMAL(15,2) NOT NULL,
    payment_method ENUM('Tiền mặt', 'Vay ngân hàng', 'Trả góp') DEFAULT 'Tiền mặt',
    down_payment DECIMAL(15,2) DEFAULT 0,
    loan_months INT DEFAULT 0,
    status ENUM('Đang xử lý', 'Hoàn thành', 'Đã hủy') DEFAULT 'Đang xử lý',
    
    -- Foreign Key constraints
    FOREIGN KEY (user_id) REFERENCES users(user_id),
    FOREIGN KEY (car_id) REFERENCES cars(car_id)
);

-- ===================================================================
-- DỮ LIỆU MẪU (SAMPLE DATA)
-- ===================================================================

-- Thêm hãng xe
INSERT INTO brands (brand_name, country) VALUES 
('Toyota', 'Japan'),
('Honda', 'Japan'),
('BMW', 'Germany'),
('Mercedes-Benz', 'Germany'),
('Hyundai', 'South Korea'),
('Kia', 'South Korea'),
('Ford', 'USA'),
('VinFast', 'Vietnam');

-- Thêm loại xe
INSERT INTO car_types (type_name) VALUES 
('Sedan'),
('SUV'),
('Hatchback'),
('MPV'),
('Pickup'),
('Crossover');

-- Thêm xe ô tô mẫu
INSERT INTO cars (car_name, brand_id, type_id, price, year, color, description, image_url) VALUES 
-- Toyota
('Toyota Vios', 1, 1, 570000000, 2023, 'Trắng', 'Xe sedan tiết kiệm nhiên liệu, phù hợp gia đình', 'public/layout/img/hinh1.webp'),
('Toyota Camry', 1, 1, 1295000000, 2023, 'Đen', 'Sedan cao cấp với động cơ mạnh mẽ', 'public/layout/img/hinh2.webp'),
('Toyota Fortuner', 1, 2, 1350000000, 2023, 'Bạc', 'SUV 7 chỗ mạnh mẽ, phù hợp đi xa', 'public/layout/img/hinh3.webp'),
('Toyota Innova', 1, 4, 780000000, 2022, 'Xám', 'MPV gia đình rộng rãi và tiện nghi', 'public/layout/img/hinh4.webp'),

-- Honda
('Honda Civic', 2, 1, 950000000, 2023, 'Đỏ', 'Sedan thể thao với thiết kế hiện đại', 'public/layout/img/hinh5.webp'),
('Honda City', 2, 1, 609000000, 2023, 'Trắng', 'Sedan hạng B tiết kiệm và thông minh', 'public/layout/img/hinh6.webp'),
('Honda CR-V', 2, 2, 1200000000, 2022, 'Đen', 'SUV 5 chỗ với công nghệ hiện đại', 'public/layout/img/hinh1.webp'),

-- BMW
('BMW 320i', 3, 1, 1899000000, 2023, 'Trắng', 'Sedan hạng sang với hiệu suất cao', 'public/layout/img/hinh2.webp'),
('BMW X3', 3, 2, 2100000000, 2022, 'Xanh', 'SUV hạng sang với nội thất cao cấp', 'public/layout/img/hinh3.webp'),

-- Hyundai
('Hyundai Tucson', 6, 2, 820000000, 2023, 'Trắng', 'SUV gia đình với thiết kế hiện đại', 'public/layout/img/hinh4.webp'),
('Hyundai Accent', 6, 1, 499000000, 2022, 'Bạc', 'Sedan hạng B giá hợp lý', 'public/layout/img/hinh5.webp'),

-- Kia
('Kia Seltos', 7, 6, 799000000, 2023, 'Cam', 'Crossover compact năng động', 'public/layout/img/hinh6.webp'),
('Kia Morning', 7, 3, 369000000, 2022, 'Vàng', 'Hatchback nhỏ gọn cho đô thị', 'public/layout/img/hinh1.webp'),

-- Ford
('Ford Ranger', 8, 5, 1359000000, 2023, 'Cam', 'Pickup mạnh mẽ và đa dụng', 'public/layout/img/hinh2.webp'),
('Ford Territory', 8, 2, 899000000, 2023, 'Xám', 'SUV 7 chỗ với công nghệ thông minh', 'public/layout/img/hinh3.webp'),

-- VinFast
('VinFast Fadil', 8, 3, 400000000, 2022, 'Trắng', 'Hatchback Việt Nam chất lượng cao', 'public/layout/img/hinh4.webp');

-- Thêm người dùng (với mật khẩu mã hóa MD5 đơn giản cho demo)
INSERT INTO users (full_name, email, password, phone, address) VALUES 
('Nguyễn Văn An', 'nguyenvanan@gmail.com', MD5('123456'), '0901234567', '123 Đường Lê Lợi, Quận 1, TP.HCM'),
('Trần Thị Bình', 'tranthibinh@gmail.com', MD5('123456'), '0907654321', '456 Đường Nguyễn Huệ, Quận 1, TP.HCM'),
('Lê Văn Cường', 'levancuong@gmail.com', MD5('123456'), '0912345678', '789 Đường Hàn Thuyên, Hai Châu, Đà Nẵng'),
('Phạm Thị Dung', 'phamthidung@gmail.com', MD5('123456'), '0913456789', '321 Đường Trần Hưng Đạo, Ba Đình, Hà Nội'),
('Hoàng Văn Em', 'hoangvanem@gmail.com', MD5('123456'), '0914567890', '654 Đường Võ Văn Tần, Quận 3, TP.HCM'),
('Admin User', 'admin@mqauto.com', MD5('admin123'), '0999999999', 'MQAuto Headquarters');

-- Thêm đơn hàng mẫu
INSERT INTO orders (user_id, car_id, total_price, payment_method, down_payment, loan_months, status) VALUES 
(1, 1, 570000000, 'Tiền mặt', 570000000, 0, 'Hoàn thành'),
(2, 3, 1350000000, 'Vay ngân hàng', 300000000, 60, 'Đang xử lý'),
(3, 5, 950000000, 'Trả góp', 200000000, 36, 'Hoàn thành'),
(4, 8, 1899000000, 'Vay ngân hàng', 500000000, 72, 'Đang xử lý'),
(5, 12, 799000000, 'Tiền mặt', 799000000, 0, 'Hoàn thành');