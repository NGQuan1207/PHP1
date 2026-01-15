<?php
include 'app/controller/homecontroller.php';
$controller = new HomeController();

include 'app/view/shop/header.php';

if(!isset($_GET['page'])) {
    include 'app/view/shop/home.php';
} else {
    $page = $_GET['page'];
    $controller->$page();
}

include 'app/view/shop/footer.php';


?>