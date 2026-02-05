<?php
    include 'apps/model/product.php';
    include 'apps/model/Category.php';
    class AdminController {
        private $product;
        private $category;
        function __construct() {
            $this->product = new product();
            $this->category = new Category();
        }

        function home () {
        
            
            include 'apps/view/admin/home.php';
        }

        function product() {
            
            
            include 'apps/view/admin/product.php';

        }
        function category() {
            
            
            include 'apps/view/admin/category.php';

        }
        function user() {
            
            
            include 'apps/view/admin/user.php';

        }
        
    }
?>