<?php
class OrderController {
    private $order;
    public function __construct() {
        $this->order = new Order();
    }
    public function list() {
        $orders = $this->order->getAllOrders();
        include 'app/view/header.php';
        include 'app/view/home.php';
        include 'app/view/footer.php';
    }
    
    public function addform() {
        include 'app/view/header.php';
        include 'app/view/addcart.php';
        include 'app/view/footer.php';
    }
    
    public function add() {
        if($_SERVER['REQUEST_METHOD'] == 'POST') {
            $customer_name = $_POST['customer_name'] ?? '';
            $phone = $_POST['phone'] ?? '';
            $total_amount = $_POST['total_amount'] ?? '';
            $status = $_POST['status'] ?? 'Pending';
            
            if($customer_name && $phone && $total_amount) {
                $this->order->addOrder($customer_name, $phone, $total_amount, $status);
                header('Location: index.php');
                exit();
            }
        }
        include 'app/view/header.php';
        include 'app/view/addcart.php';
        include 'app/view/footer.php';
    }
    
    public function delete() {
        if(isset($_GET['id'])) {
            $this->order->deleteOrder($_GET['id']);
        }
        header('Location: index.php');
        exit();
    }
}
?>
