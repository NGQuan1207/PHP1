<?php
include_once 'app/model/Database.php';
$db = new Database();

// Check if this is an admin request
if(isset($_GET['page']) && $_GET['page'] == 'admin') {
    // Handle admin routes
    include 'app/controller/admincontroller.php';
    $adminController = new AdminController();
    
    $action = $_GET['action'] ?? 'login';
    
    switch($action) {
        case 'login':
            $adminController->login();
            break;
        case 'logout':
            $adminController->logout();
            break;
        case 'dashboard':
            $adminController->dashboard();
            break;
        case 'add_car':
            $adminController->add_car();
            break;
        case 'delete_car':
            $adminController->delete_car();
            break;
        default:
            $adminController->login();
    }
} else {
    
    include 'app/controller/homecontroller.php';
    $controller = new HomeController();
    
    include 'app/view/shop/header.php';
    
    if(!isset($_GET['page'])) {
        $controller->home();
    } else {
        $page = $_GET['page'];
        $controller->$page();
    }
    
    include 'app/view/shop/footer.php';
}
?>