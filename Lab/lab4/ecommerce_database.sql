-- ===================================================================
-- CAR SALES DATABASE - SIMPLE VERSION
-- Cơ sở dữ liệu bán xe đơn giản
-- ===================================================================

-- Tạo database
CREATE DATABASE IF NOT EXISTS car_sales_db;
USE car_sales_db;

-- ===================================================================
-- 1. BẢNG CAR_BRANDS (HÃNG XE)
-- ===================================================================
CREATE TABLE car_brands (
    brand_id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    country VARCHAR(50)
);

-- ===================================================================
-- 2. BẢNG CARS (XE Ô TÔ)
-- ===================================================================
CREATE TABLE cars (
    car_id INT AUTO_INCREMENT PRIMARY KEY,
    brand_id INT NOT NULL,
    model VARCHAR(255) NOT NULL,
    year INT NOT NULL,
    price DECIMAL(15,2) NOT NULL,
    mileage INT DEFAULT 0,
    fuel_type VARCHAR(20) DEFAULT 'petrol',
    transmission VARCHAR(20) DEFAULT 'manual',
    engine_capacity DECIMAL(3,1),
    color VARCHAR(50),
    image_url VARCHAR(255),
    description TEXT,
    status VARCHAR(20) DEFAULT 'available',
    
    -- Foreign Key constraint
    FOREIGN KEY (brand_id) REFERENCES car_brands(brand_id)
);

-- ===================================================================
-- 3. BẢNG CUSTOMERS (KHÁCH HÀNG)
-- ===================================================================
CREATE TABLE customers (
    customer_id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL,
    password VARCHAR(255) NOT NULL,
    email VARCHAR(100) NOT NULL,
    full_name VARCHAR(100) NOT NULL,
    address TEXT,
    phone VARCHAR(15),
    license_number VARCHAR(20)
);

-- ===================================================================
-- 4. BẢNG SALES (BÁN HÀNG)
-- ===================================================================
CREATE TABLE sales (
    sale_id INT AUTO_INCREMENT PRIMARY KEY,
    customer_id INT NOT NULL,
    car_id INT NOT NULL,
    sale_date DATETIME DEFAULT CURRENT_TIMESTAMP,
    sale_price DECIMAL(15,2) NOT NULL,
    payment_method VARCHAR(20) DEFAULT 'cash',
    down_payment DECIMAL(15,2) DEFAULT 0,
    loan_months INT DEFAULT 0,
    status VARCHAR(20) DEFAULT 'pending',
    salesperson VARCHAR(100),
    notes TEXT,
    
    -- Foreign Key constraints
    FOREIGN KEY (customer_id) REFERENCES customers(customer_id),
    FOREIGN KEY (car_id) REFERENCES cars(car_id)
);

-- ===================================================================
-- 5. BẢNG SERVICE_RECORDS (HỒ SƠ BẢO DƯỠNG)
-- ===================================================================
CREATE TABLE service_records (
    service_id INT AUTO_INCREMENT PRIMARY KEY,
    car_id INT NOT NULL,
    service_date DATE NOT NULL,
    service_type VARCHAR(100) NOT NULL,
    mileage_at_service INT,
    cost DECIMAL(10,2),
    description TEXT,
    mechanic_name VARCHAR(100),
    
    -- Foreign Key constraint
    FOREIGN KEY (car_id) REFERENCES cars(car_id)
);

-- ===================================================================
-- DỮ LIỆU MẪU (SAMPLE DATA)
-- ===================================================================

-- Thêm hãng xe
INSERT INTO car_brands (name, country) VALUES 
('Toyota', 'Japan'),
('Honda', 'Japan'),
('BMW', 'Germany'),
('Mercedes-Benz', 'Germany'),
('Audi', 'Germany'),
('Hyundai', 'South Korea'),
('Kia', 'South Korea'),
('Ford', 'USA');

-- Thêm xe ô tô mẫu (nhiều xe)
INSERT INTO cars (brand_id, model, year, price, mileage, fuel_type, transmission, engine_capacity, color, image_url, description) VALUES 
-- Toyota Models
(1, 'Camry 2.5Q', 2023, 1295000000, 15000, 'petrol', 'automatic', 2.5, 'Trắng', '/images/camry.jpg', 'Toyota Camry 2023 màu trắng, bảo hành chính hãng'),
(1, 'Vios G', 2022, 570000000, 32000, 'petrol', 'manual', 1.5, 'Bạc', '/images/vios.jpg', 'Toyota Vios 2022, xe tiết kiệm nhiên liệu'),
(1, 'Corolla Cross V', 2023, 820000000, 18000, 'petrol', 'automatic', 1.8, 'Đen', '/images/corolla-cross.jpg', 'Toyota Corolla Cross 2023, SUV đô thị'),
(1, 'Fortuner 2.4G', 2022, 1350000000, 45000, 'diesel', 'automatic', 2.4, 'Nâu', '/images/fortuner.jpg', 'Toyota Fortuner 2022, SUV 7 chỗ mạnh mẽ'),
(1, 'Innova E', 2021, 780000000, 52000, 'petrol', 'manual', 2.0, 'Xám', '/images/innova.jpg', 'Toyota Innova 2021, MPV gia đình'),
-- Honda Models
(2, 'Civic RS', 2022, 950000000, 25000, 'petrol', 'manual', 1.5, 'Đen', '/images/civic.jpg', 'Honda Civic RS 2022, xe ít sử dụng'),
(2, 'City L', 2023, 609000000, 12000, 'petrol', 'automatic', 1.5, 'Trắng', '/images/city.jpg', 'Honda City 2023, sedan hạng B cao cấp'),
(2, 'CR-V L', 2022, 1200000000, 28000, 'petrol', 'automatic', 1.5, 'Đỏ', '/images/crv.jpg', 'Honda CR-V 2022, SUV 5 chỗ thông minh'),
(2, 'Accord 1.5 Turbo', 2021, 1400000000, 38000, 'petrol', 'automatic', 1.5, 'Xanh', '/images/accord.jpg', 'Honda Accord 2021, sedan hạng D sang trọng'),
(2, 'HR-V L', 2023, 871000000, 15000, 'petrol', 'automatic', 1.8, 'Cam', '/images/hrv.jpg', 'Honda HR-V 2023, crossover năng động'),
-- BMW Models
(3, 'X3 xDrive20i', 2021, 2100000000, 35000, 'petrol', 'automatic', 2.0, 'Xanh', '/images/bmw-x3.jpg', 'BMW X3 2021, xe sang trọng'),
(3, '320i Sport Line', 2022, 1899000000, 22000, 'petrol', 'automatic', 2.0, 'Trắng', '/images/bmw-320i.jpg', 'BMW 320i 2022, sedan thể thao'),
(3, 'X5 xDrive40i', 2023, 4200000000, 8000, 'petrol', 'automatic', 3.0, 'Đen', '/images/bmw-x5.jpg', 'BMW X5 2023, SUV hạng sang'),
(3, 'X1 sDrive18i', 2022, 1699000000, 28000, 'petrol', 'automatic', 1.5, 'Xám', '/images/bmw-x1.jpg', 'BMW X1 2022, SUV compact premium'),
-- Mercedes-Benz Models
(4, 'C-Class C200', 2023, 1699000000, 8000, 'petrol', 'automatic', 1.5, 'Bạc', '/images/c-class.jpg', 'Mercedes C200 2023, như mới'),
(4, 'E-Class E200', 2022, 2399000000, 18000, 'petrol', 'automatic', 2.0, 'Đen', '/images/e-class.jpg', 'Mercedes E200 2022, sedan hạng sang'),
(4, 'GLC 200', 2023, 2199000000, 12000, 'petrol', 'automatic', 2.0, 'Trắng', '/images/glc.jpg', 'Mercedes GLC 200 2023, SUV sang trọng'),
(4, 'A-Class A200', 2021, 1499000000, 32000, 'petrol', 'automatic', 1.3, 'Xanh', '/images/a-class.jpg', 'Mercedes A200 2021, hatchback cao cấp'),
-- Audi Models
(5, 'A4 Sedan', 2022, 1789000000, 22000, 'petrol', 'automatic', 2.0, 'Đỏ', '/images/a4.jpg', 'Audi A4 2022, xe đẹp'),
(5, 'Q5 40 TFSI', 2023, 2400000000, 15000, 'petrol', 'automatic', 2.0, 'Xám', '/images/q5.jpg', 'Audi Q5 2023, SUV premium'),
(5, 'A6 45 TFSI', 2022, 2899000000, 20000, 'petrol', 'automatic', 2.0, 'Đen', '/images/a6.jpg', 'Audi A6 2022, sedan executive'),
(5, 'Q7 45 TFSI', 2021, 3899000000, 35000, 'petrol', 'automatic', 3.0, 'Nâu', '/images/q7.jpg', 'Audi Q7 2021, SUV 7 chỗ hạng sang'),
-- Hyundai Models
(6, 'Tucson', 2023, 820000000, 12000, 'petrol', 'automatic', 2.0, 'Trắng', '/images/tucson.jpg', 'Hyundai Tucson 2023, SUV gia đình'),
(6, 'Elantra 1.6 Turbo', 2022, 729000000, 25000, 'petrol', 'automatic', 1.6, 'Xanh', '/images/elantra.jpg', 'Hyundai Elantra 2022, sedan thể thao'),
(6, 'Santa Fe 2.2D', 2023, 1340000000, 18000, 'diesel', 'automatic', 2.2, 'Đỏ', '/images/santafe.jpg', 'Hyundai Santa Fe 2023, SUV 7 chỗ'),
(6, 'Accent 1.4 AT', 2021, 499000000, 42000, 'petrol', 'automatic', 1.4, 'Bạc', '/images/accent.jpg', 'Hyundai Accent 2021, sedan hạng B'),
-- Kia Models
(7, 'Seltos 1.4 Turbo', 2023, 799000000, 15000, 'petrol', 'automatic', 1.4, 'Cam', '/images/seltos.jpg', 'Kia Seltos 2023, SUV compact'),
(7, 'Cerato 2.0 Premium', 2022, 669000000, 28000, 'petrol', 'automatic', 2.0, 'Trắng', '/images/cerato.jpg', 'Kia Cerato 2022, sedan hạng C'),
(7, 'Sorento 2.2D', 2023, 1339000000, 22000, 'diesel', 'automatic', 2.2, 'Đen', '/images/sorento.jpg', 'Kia Sorento 2023, SUV 7 chỗ premium'),
(7, 'Morning S', 2021, 369000000, 38000, 'petrol', 'manual', 1.2, 'Vàng', '/images/morning.jpg', 'Kia Morning 2021, xe đô thị nhỏ gọn'),
-- Ford Models
(8, 'Everest Titanium', 2022, 1399000000, 32000, 'diesel', 'automatic', 2.0, 'Nâu', '/images/everest.jpg', 'Ford Everest 2022, SUV off-road'),
(8, 'Explorer Limited', 2023, 2199000000, 8000, 'petrol', 'automatic', 2.3, 'Đen', '/images/explorer.jpg', 'Ford Explorer 2023, SUV hạng sang'),
(8, 'Ranger Raptor', 2022, 1359000000, 25000, 'diesel', 'automatic', 2.0, 'Cam', '/images/ranger.jpg', 'Ford Ranger Raptor 2022, pickup thể thao'),
(8, 'Territory Titanium', 2023, 899000000, 18000, 'petrol', 'automatic', 1.5, 'Xám', '/images/territory.jpg', 'Ford Territory 2023, SUV 7 chỗ');

-- Thêm 10 khách hàng
INSERT INTO customers (username, password, email, full_name, address, phone, license_number) VALUES 
('nguyenvana', '$2y$10$example_hash_password1', 'nguyenvana@gmail.com', 'Nguyễn Văn A', '123 Đường Lê Lợi, Quận 1, TP.HCM', '0901234567', 'B1-123456'),
('tranthib', '$2y$10$example_hash_password2', 'tranthib@gmail.com', 'Trần Thị B', '456 Đường Nguyễn Huệ, Quận 1, TP.HCM', '0907654321', 'B2-789012'),
('levanc', '$2y$10$example_hash_password3', 'levanc@gmail.com', 'Lê Văn C', '789 Đường Hàn Thuyên, Hai Châu, Đà Nẵng', '0912345678', 'C-345678'),
('phamthid', '$2y$10$example_hash_password4', 'phamthid@gmail.com', 'Phạm Thị D', '321 Đường Trần Hưng Đạo, Ba Đình, Hà Nội', '0913456789', 'B1-987654'),
('hoangvane', '$2y$10$example_hash_password5', 'hoangvane@gmail.com', 'Hoàng Văn E', '654 Đường Võ Văn Tần, Quận 3, TP.HCM', '0914567890', 'B2-456789'),
('vuthif', '$2y$10$example_hash_password6', 'vuthif@gmail.com', 'Vũ Thị F', '987 Đường Lý Thường Kiệt, Hoàn Kiếm, Hà Nội', '0915678901', 'C-123789'),
('doanvang', '$2y$10$example_hash_password7', 'doanvang@gmail.com', 'Đoàn Văn G', '147 Đường Nguyễn Văn Cừ, Ninh Kiều, Cần Thơ', '0916789012', 'B1-654321'),
('buithinh', '$2y$10$example_hash_password8', 'buithinh@gmail.com', 'Bùi Thị H', '258 Đường Hùng Vương, Thành phố Huế', '0917890123', 'C-789456'),
('ngovanhi', '$2y$10$example_hash_password9', 'ngovanhi@gmail.com', 'Ngô Văn I', '369 Đường Lạc Long Quân, Tây Hồ, Hà Nội', '0918901234', 'B2-321654'),
('tranvank', '$2y$10$example_hash_password10', 'tranvank@gmail.com', 'Trần Văn K', '741 Đường Điện Biên Phủ, Bình Thạnh, TP.HCM', '0919012345', 'C-987123');

-- Thêm giao dịch bán hàng mẫu
INSERT INTO sales (customer_id, car_id, sale_price, payment_method, down_payment, loan_months, status, salesperson) VALUES 
(1, 1, 1295000000, 'loan', 300000000, 60, 'completed', 'Phạm Văn D'),
(2, 3, 2100000000, 'cash', 2100000000, 0, 'completed', 'Hoàng Thị E'),
(3, 6, 820000000, 'installment', 200000000, 36, 'pending', 'Đỗ Văn F');

-- Thêm dữ liệu bảo dưỡng mẫu
INSERT INTO service_records (car_id, service_date, service_type, mileage_at_service, cost, description, mechanic_name) VALUES 
(1, '2023-03-15', 'Bảo dưỡng định kỳ', 10000, 1500000, 'Thay dầu máy, lọc gió', 'Nguyễn Văn X'),
(1, '2023-09-20', 'Bảo dưỡng định kỳ', 15000, 2000000, 'Thay dầu, kiểm tra phanh', 'Nguyễn Văn X'),
(3, '2021-06-10', 'Sửa chữa', 30000, 5000000, 'Thay lốp, sửa hệ thống điều hòa', 'Trần Văn Y'),
(6, '2023-05-12', 'Bảo dưỡng định kỳ', 8000, 1200000, 'Thay dầu máy, kiểm tra tổng quát', 'Lê Văn Z');

