<?php
// include_once 'apps/model/database.php';
// $db = new database();
include 'apps/controller/AdminController.php';
$controller = new AdminController();
include 'apps/view/admin/header.php';
if(!isset($_GET['page'])) {
   $controller->home();
} else {
    $page = $_GET['page'];
    $controller->$page();
}

include 'apps/view/admin/footer.php';




?>