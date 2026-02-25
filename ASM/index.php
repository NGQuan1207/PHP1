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
        case 'edit_car':
            $adminController->edit_car();
            break;
        case 'add_car_type':
            $adminController->add_car_type();
            break;
        case 'edit_car_type':
            $adminController->edit_car_type();
            break;
        default:
            $adminController->login();
    }
} else {
    
    include 'app/controller/homecontroller.php';
    $controller = new HomeController();
    

    $page = $_GET['page'] ?? 'home';
    $isAjaxWishlistRequest = in_array($page, ['add_to_wishlist', 'remove_from_wishlist']);
    
    if (!$isAjaxWishlistRequest) {
        include 'app/view/shop/header.php';
    }
    
    if(!isset($_GET['page'])) {
        $controller->home();
    } else {
        $controller->$page();
    }
    
    if (!$isAjaxWishlistRequest) {
        include 'app/view/shop/footer.php';
    }
}
?>