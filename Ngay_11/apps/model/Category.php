<?php
include_once 'Database.php';
class Category {
    private $db;
    function __construct() {
        $this->db = new Database();
    }
    //lấy tất cả danh mục
    function getAllDM() {
        $sql = "SELECT * FROM `categories`";
        return $this->db->getAll($sql);
    }
   
    
}




?>