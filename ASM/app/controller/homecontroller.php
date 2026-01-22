<?php

class HomeController {
    function __construct() {
        
    }

    function home() {
        include 'app/view/shop/home.php';
    }

    function product() {
        include 'app/view/shop/product.php';
    }

    function about() {
        include 'app/view/shop/about.php';
    }

    function contact() {
        include 'app/view/shop/contact.php';
    }
};

?>