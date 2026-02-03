<?php

class HomeController {
    function __construct() {
        
    }

    function home() {
        require_once 'app/model/car.php';
        $carModel = new Car();
        $cars = $carModel->getAllCars();
        $carTypes = $carModel->getAllCarTypes();
        include 'app/view/shop/home.php';
    }

    function product() {
        require_once 'app/model/car.php';
        $carModel = new Car();
        $sp_1_trang = 6;
        $trang_hien_tai = isset($_GET['trang']) ? (int)$_GET['trang'] : 1;
        $tongsp = $carModel->getTotalCars();
        $sotrang = ceil($tongsp / $sp_1_trang);
        $offset = ($trang_hien_tai - 1) * $sp_1_trang;
        
        $cars = $carModel->phantrang($sp_1_trang, $offset);
        
        include 'app/view/shop/product.php';
    }

    function about() {
        include 'app/view/shop/about.php';
    }

    function contact() {
        include 'app/view/shop/contact.php';
    }
    
    function detail() {
        $carId = $_GET['id'] ?? 1;
        require_once 'app/model/car.php';
        $carModel = new Car();
        $car = $carModel->getCarbyid($carId);
        
        // Get similar cars based on current car's type and brand
        $typeId = !empty($car['type_id']) ? $car['type_id'] : null;
        $brandId = !empty($car['brand_id']) ? $car['brand_id'] : null;
        $recommendedCars = $carModel->getRecomendedcar($typeId, $brandId);
        
        include 'app/view/shop/detail.php';
    }
};
//test
?>

