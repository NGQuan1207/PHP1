<?php
require_once "database.php";

class User {
    private $db;
    
    public function __construct() {
        $this->db = new Database();
    }
    
    // Đăng ký người dùng mới
    public function register($full_name, $email, $password, $phone = null, $address = null) {
        // Kiểm tra email đã tồn tại chưa
        if($this->emailExists($email)) {
            return false;
        }
        
        // Mã hóa mật khẩu
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);
        
        // Thêm người dùng vào database
        $sql = "INSERT INTO users (full_name, email, password, phone, address) 
                VALUES ('$full_name', '$email', '$hashed_password', '$phone', '$address')";
        return $this->db->action($sql);
    }
    
    // Đăng nhập người dùng
    public function login($email, $password) {
        $sql = "SELECT * FROM users WHERE email = '$email'";
        $result = $this->db->getAll($sql);
        
        if(!empty($result)) {
            $user = $result[0];
            // Xác minh mật khẩu
            if(password_verify($password, $user['password'])) {
                return $user;
            }
        }
        return false;
    }
    
    // Kiểm tra email có tồn tại không
    public function emailExists($email) {
        $sql = "SELECT user_id FROM users WHERE email = '$email'";
        $result = $this->db->getAll($sql);
        return !empty($result);
    }
    
    // Lấy thông tin người dùng theo ID
    public function getUserById($user_id) {
        $sql = "SELECT * FROM users WHERE user_id = $user_id";
        $result = $this->db->getAll($sql);
        return !empty($result) ? $result[0] : null;
    }
    
    // Cập nhật thông tin người dùng
    public function updateUser($user_id, $full_name, $phone = null, $address = null) {
        $sql = "UPDATE users SET full_name = '$full_name', phone = '$phone', address = '$address' 
                WHERE user_id = $user_id";
        return $this->db->action($sql);
    }
    
    // Đổi mật khẩu
    public function changePassword($user_id, $new_password) {
        $hashed_password = password_hash($new_password, PASSWORD_DEFAULT);
        $sql = "UPDATE users SET password = '$hashed_password' WHERE user_id = $user_id";
        return $this->db->action($sql);
    }
}
?>