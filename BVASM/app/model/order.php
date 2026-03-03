<?php
require_once "database.php";
class Order {
    private $db;
    public function __construct() {
        $this->db = new Database();
    }
    

    public function getAllOrders(): array {
        $sql = "SELECT * FROM order_management ORDER BY id DESC";
        return $this->db->getAll($sql);
    }


    public function getOrderById($id): array {
        $sql = "SELECT * FROM order_management WHERE id = {$id}";
        return $this->db->getAll($sql);
    }


    public function addOrder($customer_name, $phone, $total_amount, $status) {
        $sql = "INSERT INTO order_management (customer_name, phone, total_amount, status) 
                VALUES ('$customer_name', '$phone', '$total_amount', '$status')";
        return $this->db->action($sql);
    }


    public function deleteOrder($id) {
        $sql = "DELETE FROM order_management WHERE id = $id";
        return $this->db->action($sql);
    }
    
}
?>
