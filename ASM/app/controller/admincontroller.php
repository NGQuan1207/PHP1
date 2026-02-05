<?php
class AdminController {
    public function login() {
        session_start();

        if(isset($_SESSION['admin'])) {
            header('Location: index.php?page=admin&action=dashboard');
            exit();
        }
        
        $error = '';
        
        if($_SERVER['REQUEST_METHOD'] == 'POST') {
            $username = $_POST['username'] ?? '';
            $password = $_POST['password'] ?? '';
            
            if($username == 'admin' && $password == '123456') {
                $_SESSION['admin'] = $username;
                header('Location: index.php?page=admin&action=dashboard');
                exit();
            } else {
                $error = 'Tên đăng nhập hoặc mật khẩu không đúng!';
            }
        }
        include 'app/view/admin/login.php';
    }
    
    public function logout() {
        // session_start();
        session_destroy();
        include 'app/view/admin/logout.php';
    }
    public function dashboard() {
        session_start();
        if(!isset($_SESSION['admin'])) {
            header('Location: index.php?page=admin&action=login');
            exit();
        }
        
        // Load car data using same method as home/product pages
        require_once 'app/model/car.php';
        $carModel = new Car();
        $cars = $carModel->getAllCars();
        $carTypes = $carModel->getAllCarTypes();
        
        include 'app/view/admin/dashboard.php';
    }
}
?>