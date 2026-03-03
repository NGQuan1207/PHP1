<?php
require_once 'app/model/database.php';
require_once 'app/model/order.php';
require_once 'app/controller/ordercontroller.php';

$controller = new OrderController();
$action = $_GET['action'] ?? 'list';

switch($action) {
    case 'list':
        $controller->list();
        break;
    case 'addform':
        $controller->addform();
        break;
    case 'add':
        $controller->add();
        break;
    case 'delete':
        $controller->delete();
        break;
    default:
        $controller->list();
}
?>
