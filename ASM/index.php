<?php
include_once 'app/model/Database.php';
$db = new Database();
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
?>