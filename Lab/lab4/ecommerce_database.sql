-- ===================================================================
-- E-COMMERCE DATABASE SCHEMA
-- Tạo cơ sở dữ liệu cho hệ thống bán hàng trực tuyến
-- ===================================================================

-- Tạo database (tuỳ chọn)
CREATE DATABASE IF NOT EXISTS ecommerce_db CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE ecommerce_db;

-- ===================================================================
-- 1. BẢNG CATEGORIES (DANH MỤC)
-- ===================================================================
CREATE TABLE categories (
    category_id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL UNIQUE,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

-- ===================================================================
-- 2. BẢNG PRODUCTS (SẢN PHẨM)
-- ===================================================================
CREATE TABLE products (
    product_id INT AUTO_INCREMENT PRIMARY KEY,
    category_id INT NOT NULL,
    name VARCHAR(255) NOT NULL,
    price DECIMAL(15,2) NOT NULL CHECK (price >= 0),
    stock_quantity INT NOT NULL DEFAULT 0 CHECK (stock_quantity >= 0),
    image_url VARCHAR(255),
    description TEXT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    
    -- Foreign Key constraint
    FOREIGN KEY (category_id) REFERENCES categories(category_id) 
        ON DELETE CASCADE ON UPDATE CASCADE,
    
    -- Index cho tìm kiếm nhanh
    INDEX idx_category (category_id),
    INDEX idx_price (price),
    INDEX idx_name (name)
);

-- ===================================================================
-- 3. BẢNG USERS (NGƯỜI DÙNG)
-- ===================================================================
CREATE TABLE users (
    user_id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    email VARCHAR(100) NOT NULL UNIQUE,
    full_name VARCHAR(100) NOT NULL,
    address TEXT,
    phone VARCHAR(15),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    
    -- Index cho tìm kiếm nhanh
    INDEX idx_username (username),
    INDEX idx_email (email)
);

-- ===================================================================
-- 4. BẢNG ORDERS (ĐỢN HÀNG)
-- ===================================================================
CREATE TABLE orders (
    order_id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT NOT NULL,
    order_date DATETIME DEFAULT CURRENT_TIMESTAMP,
    total_amount DECIMAL(15,2) NOT NULL DEFAULT 0 CHECK (total_amount >= 0),
    status ENUM('pending', 'shipped', 'delivered', 'cancelled') DEFAULT 'pending',
    phone VARCHAR(15),
    address TEXT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    
    -- Foreign Key constraint
    FOREIGN KEY (user_id) REFERENCES users(user_id) 
        ON DELETE CASCADE ON UPDATE CASCADE,
    
    -- Index cho tìm kiếm nhanh
    INDEX idx_user (user_id),
    INDEX idx_status (status),
    INDEX idx_order_date (order_date)
);

-- ===================================================================
-- 5. BẢNG ORDER_DETAILS (CHI TIẾT ĐỢN HÀNG)
-- ===================================================================
CREATE TABLE order_details (
    order_detail_id INT AUTO_INCREMENT PRIMARY KEY,
    order_id INT NOT NULL,
    product_id INT NOT NULL,
    quantity INT NOT NULL CHECK (quantity > 0),
    price_at_purchase DECIMAL(15,2) NOT NULL CHECK (price_at_purchase >= 0),
    
    -- Foreign Key constraints
    FOREIGN KEY (order_id) REFERENCES orders(order_id) 
        ON DELETE CASCADE ON UPDATE CASCADE,
    FOREIGN KEY (product_id) REFERENCES products(product_id) 
        ON DELETE CASCADE ON UPDATE CASCADE,
    
    -- Unique constraint để tránh trùng lặp sản phẩm trong cùng 1 đơn hàng
    UNIQUE KEY unique_order_product (order_id, product_id),
    
    -- Index cho tìm kiếm nhanh
    INDEX idx_order (order_id),
    INDEX idx_product (product_id)
);

-- ===================================================================
-- DỮ LIỆU MẪU (SAMPLE DATA)
-- ===================================================================

-- Thêm danh mục sản phẩm
INSERT INTO categories (name) VALUES 
('Điện thoại'),
('Laptop'),
('Quần áo'),
('Giày dép'),
('Đồng hồ'),
('Phụ kiện');

-- Thêm sản phẩm mẫu
INSERT INTO products (category_id, name, price, stock_quantity, image_url, description) VALUES 
(1, 'iPhone 15 Pro Max', 29990000, 50, '/images/iphone15.jpg', 'Điện thoại iPhone 15 Pro Max mới nhất'),
(1, 'Samsung Galaxy S24', 22990000, 30, '/images/s24.jpg', 'Samsung Galaxy S24 cao cấp'),
(2, 'MacBook Air M3', 28990000, 20, '/images/macbook.jpg', 'MacBook Air chip M3 mới nhất'),
(2, 'Dell XPS 13', 25990000, 15, '/images/dell.jpg', 'Laptop Dell XPS 13 mỏng nhẹ'),
(3, 'Áo sơ mi nam', 299000, 100, '/images/shirt.jpg', 'Áo sơ mi nam công sở'),
(4, 'Giày thể thao Nike', 2590000, 80, '/images/nike.jpg', 'Giày thể thao Nike Air Max');

-- Thêm người dùng mẫu
INSERT INTO users (username, password, email, full_name, address, phone) VALUES 
('nguyenvana', '$2y$10$example_hash_password1', 'nguyenvana@gmail.com', 'Nguyễn Văn A', '123 Đường ABC, Hà Nội', '0901234567'),
('tranthib', '$2y$10$example_hash_password2', 'tranthib@gmail.com', 'Trần Thị B', '456 Đường XYZ, TP.HCM', '0907654321'),
('levanc', '$2y$10$example_hash_password3', 'levanc@gmail.com', 'Lê Văn C', '789 Đường DEF, Đà Nẵng', '0912345678');

-- Thêm đơn hàng mẫu
INSERT INTO orders (user_id, total_amount, status, phone, address) VALUES 
(1, 29990000, 'pending', '0901234567', '123 Đường ABC, Hà Nội'),
(2, 25889000, 'shipped', '0907654321', '456 Đường XYZ, TP.HCM'),
(3, 2889000, 'delivered', '0912345678', '789 Đường DEF, Đà Nẵng');

-- Thêm chi tiết đơn hàng mẫu
INSERT INTO order_details (order_id, product_id, quantity, price_at_purchase) VALUES 
(1, 1, 1, 29990000),  -- Đơn hàng 1: iPhone 15 Pro Max
(2, 3, 1, 28990000),  -- Đơn hàng 2: MacBook Air M3
(2, 5, 3, 299000),    -- Đơn hàng 2: 3 áo sơ mi
(3, 6, 1, 2590000),   -- Đơn hàng 3: Giày Nike
(3, 5, 1, 299000);    -- Đơn hàng 3: 1 áo sơ mi

-- ===================================================================
-- CÁC TRUY VẤN HỮU ÍCH (USEFUL QUERIES)
-- ===================================================================

-- 1. Xem tất cả sản phẩm với tên danh mục
/*
SELECT 
    p.product_id,
    p.name AS product_name,
    c.name AS category_name,
    p.price,
    p.stock_quantity
FROM products p
JOIN categories c ON p.category_id = c.category_id
ORDER BY c.name, p.name;
*/

-- 2. Xem chi tiết đơn hàng với thông tin sản phẩm
/*
SELECT 
    o.order_id,
    u.full_name,
    p.name AS product_name,
    od.quantity,
    od.price_at_purchase,
    (od.quantity * od.price_at_purchase) AS subtotal
FROM orders o
JOIN users u ON o.user_id = u.user_id
JOIN order_details od ON o.order_id = od.order_id
JOIN products p ON od.product_id = p.product_id
ORDER BY o.order_id, p.name;
*/

-- 3. Thống kê doanh thu theo danh mục
/*
SELECT 
    c.name AS category_name,
    SUM(od.quantity * od.price_at_purchase) AS total_revenue,
    COUNT(od.order_detail_id) AS total_items_sold
FROM categories c
JOIN products p ON c.category_id = p.category_id
JOIN order_details od ON p.product_id = od.product_id
GROUP BY c.category_id, c.name
ORDER BY total_revenue DESC;
*/

-- ===================================================================
-- KẾT THÚC
-- ===================================================================