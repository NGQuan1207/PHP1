<?php
require_once 'app/model/car.php';

class HomeController {
    private $car;
    
    function __construct() {
        $this->car = new Car();
    }

    function home() {
        $cars = $this->car->getAllCars();
        $carTypes = $this->car->getAllCarTypes();
        
        
        if(!isset($_GET['trang'])) {
            $page_number = 1;
        } else {
            $page_number = $_GET['trang'];
        }
        $lim = 6;
        $tong_sp = count($cars);
        $sotrang = ceil($tong_sp/$lim);
        $offset = ($page_number-1)*$lim;
        $sp_phantrang = $this->car->phantrang($lim, $offset);
        
        include 'app/view/shop/home.php';
    }

    function product() {
        $carTypes = $this->car->getAllCarTypes();
        
        $selected_type = isset($_GET['type_id']) ? $_GET['type_id'] : null;
        
        if($selected_type) {
            $car_all = $this->car->getCarsByType($selected_type);
        } else {
            $car_all = $this->car->getAllCars();
        }
        
        if(!isset($_GET['trang'])) {
            $trang_hien_tai = 1;
        } else {
            $trang_hien_tai = $_GET['trang'];
        }
        $sp_1_trang = 6;
        $tongsp = count($car_all);
        $sotrang = ceil($tongsp / $sp_1_trang);
        $offset = ($trang_hien_tai - 1) * $sp_1_trang;
        
       
        if($selected_type) {
            
            $cars = array_slice($car_all, $offset, $sp_1_trang);
        } else {
            $cars = $this->car->phantrang($sp_1_trang, $offset);
        }
        
        include 'app/view/shop/product.php';
    }

    function about() {
        include 'app/view/shop/about.php';
    }

    function contact() {
        include 'app/view/shop/contact.php';
    }
    
    function detail() {
        if(isset($_GET['id'])) {
            $id = $_GET['id'];
            $car_dt = $this->car->getCarbyid($id);
            if(!empty($car_dt)) {
                $car = $car_dt[0]; 
                $recommendedCars = $this->car->getRecomendedcar($car['type_id'], $car['brand_id']);
            }
        }
        
        include 'app/view/shop/detail.php';
    }
}
?>

