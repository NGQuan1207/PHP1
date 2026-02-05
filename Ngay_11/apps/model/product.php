<?php
include_once 'Database.php';
class product {
    private $db;
    function __construct() {
        $this->db = new Database();
    }
    //lấy tất cả sẩn phẩm
    function getNew() {
        $sql = "SELECT * FROM `products` ORDER BY id DESC;";
        return $this->db->getAll($sql);
    }
    // phương thức lấy sản phẩm theo id:
    function getbyID($id) {
        $sql = "SELECT * FROM `products` WHERE id = {$id}";
        return $this->db->getAll($sql);
    }

    // phương thức lấy ra sản phẩm liên quan
    function get_sp_lq($id,$cat_id) {
        $sql = "SELECT * FROM `products` 
        WHERE id_cat ={$cat_id} AND id != {$id} 
        ORDER BY RAND() LIMIT 3";
        return $this->db->getAll($sql);
    }

    // phương thức lọc sp theo danh mục
    function getbyIDDM($id_cat) {
        $sql = "SELECT * FROM `products` WHERE id_cat = {$id_cat}";
        return $this->db->getAll($sql);
    }
    // phân trang
    function phantrang($lim, $offset) {
        $sql = "SELECT * FROM products LIMIT {$lim} OFFSET {$offset}";
        return $this->db->getAll($sql);
    }

}




?>