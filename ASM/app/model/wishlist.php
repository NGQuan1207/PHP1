<?php
require_once "database.php";

class Wishlist {
    private $db;
    
    public function __construct() {
        $this->db = new Database();
    }
    
    // Thêm xe vào danh sách yêu thích
    public function addToWishlist($user_id, $car_id) {
        if($this->isInWishlist($user_id, $car_id)) {
            return false; 
        }
        
        $sql = "INSERT INTO wishlist (user_id, car_id) VALUES ('$user_id', '$car_id')";
        return $this->db->action($sql);
    }
    
    // Xóa xe khỏi danh sách yêu thích
    public function removeFromWishlist($user_id, $car_id) {
        $sql = "DELETE FROM wishlist WHERE user_id = '$user_id' AND car_id = '$car_id'";
        return $this->db->action($sql);
    }
    
    public function isInWishlist($user_id, $car_id) {
        $sql = "SELECT wishlist_id FROM wishlist WHERE user_id = '$user_id' AND car_id = '$car_id'";
        $result = $this->db->getAll($sql);
        return !empty($result);
    }
    
    public function getUserWishlist($user_id) {
        $sql = "SELECT w.*, c.car_name, c.price, c.image_url, c.year, c.color, 
                       b.brand_name, t.type_name, c.description
                FROM wishlist w
                JOIN cars c ON w.car_id = c.car_id
                JOIN brands b ON c.brand_id = b.brand_id
                JOIN car_types t ON c.type_id = t.type_id
                WHERE w.user_id = '$user_id'
                ORDER BY w.date_added DESC";
        return $this->db->getAll($sql);
    }
    
    public function countUserWishlist($user_id) {
        $sql = "SELECT COUNT(*) as count FROM wishlist WHERE user_id = '$user_id'";
        $result = $this->db->getAll($sql);
        return $result[0]['count'] ?? 0;
    }
    
}
?>