<?php
include_once 'apps/model/Database.php';
$db = new Database();
include 'apps/controller/HomeController.php';
$controller = new HomeController();
include 'apps/view/shop/header.php';
if(!isset($_GET['page'])) {
   $controller->home(); 
} else {
    $page = $_GET['page'];
    $controller->$page();
}

// include 'apps/view/shop/footer.php';




?>