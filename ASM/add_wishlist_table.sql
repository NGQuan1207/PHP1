-- SQL script to add wishlist table to php1_db database
-- This creates a wishlist (yêu thích) functionality for the car dealership website

USE php1_db;

-- Create wishlist table
CREATE TABLE `wishlist` (
  `wishlist_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `car_id` int(11) NOT NULL,
  `date_added` datetime DEFAULT current_timestamp(),
  PRIMARY KEY (`wishlist_id`),
  UNIQUE KEY `unique_user_car` (`user_id`, `car_id`) COMMENT 'Prevent duplicate entries',
  KEY `user_id` (`user_id`),
  KEY `car_id` (`car_id`),
  CONSTRAINT `wishlist_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE,
  CONSTRAINT `wishlist_ibfk_2` FOREIGN KEY (`car_id`) REFERENCES `cars` (`car_id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci COMMENT='Wishlist table for users favorite cars';

-- Insert some sample wishlist data for testing
INSERT INTO `wishlist` (`user_id`, `car_id`) VALUES
(1, 1),
(1, 8),
(2, 3),
(2, 12),
(3, 5),
(3, 9),
(4, 14),
(5, 10);

-- Check the created table structure
DESCRIBE wishlist;

-- Sample query to get wishlist with car details
-- SELECT w.*, c.car_name, c.price, c.image_url, b.brand_name, t.type_name, u.full_name
-- FROM wishlist w
-- JOIN cars c ON w.car_id = c.car_id
-- JOIN brands b ON c.brand_id = b.brand_id
-- JOIN car_types t ON c.type_id = t.type_id
-- JOIN users u ON w.user_id = u.user_id
-- ORDER BY w.date_added DESC;