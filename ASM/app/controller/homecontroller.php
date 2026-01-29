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
        $cars = $carModel->getAllCars();
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
        $recommendedCars = $carModel->getRecomendedcar();
        include 'app/view/shop/detail.php';
    }
};
//test
?>

