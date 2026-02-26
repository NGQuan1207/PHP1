<?php
require_once "database.php";

class User {
    private $db;
    
    public function __construct() {
        $this->db = new Database();
    }
    
    // Đăng ký người dùng mới
    public function register($full_name, $email, $password, $phone = null, $address = null) {
        if($this->emailExists($email)) {
            return false;
        }
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);
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
            if(password_verify($password, $user['password'])) {
                return $user;
            }
        }
        return false;
    }
    
    public function emailExists($email) {
        $sql = "SELECT user_id FROM users WHERE email = '$email'";
        $result = $this->db->getAll($sql);
        return !empty($result);
    }
    
    public function getUserById($user_id) {
        $sql = "SELECT * FROM users WHERE user_id = $user_id";
        $result = $this->db->getAll($sql);
        return !empty($result) ? $result[0] : null;
    }
    
    public function updateUser($user_id, $full_name, $phone = null, $address = null) {
        $sql = "UPDATE users SET full_name = '$full_name', phone = '$phone', address = '$address' 
                WHERE user_id = $user_id";
        return $this->db->action($sql);
    }
}
?>