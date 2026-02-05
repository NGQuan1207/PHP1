<?php
    include 'apps/model/product.php';
    include 'apps/model/Category.php';
    class HomeController {
        private $product;
        private $category;
        function __construct() {
            $this->product = new product();
            $this->category = new Category();
        }

        function home () {
            // echo "test";
            $product_list = $this->product->getNew();
            if(!isset($_GET['trang'])) {
                $page_number = 1;
            } else {
                $page_number = $_GET['trang'];
            }
            $lim = 3;
            $tong_sp = count($product_list);
            $sotrang = ceil($tong_sp/$lim);
            $offset = ($page_number-1)*$lim;
            // trang 1: -->offet: 1-1 = 0 *3 = 0
            // trang 2: --> offset = 2-1 =1 *3 = 3
            // trang 3: --> offset = 3-1 = 2*3 = 6
            $sp_phantrang = $this->product->phantrang($lim,$offset);
            // print_r($sp_phantrang);

            //echo "test";
            // print_r($product_list);
            
            include 'apps/view/shop/home.php';
        }

        function product() {
            $cat_list = $this->category->getAllDM();
            $sp_all = $this->product->getNew();
            // print_r($cat_list);
            if(isset($_GET['id'])) {
                $id_cat = $_GET['id'];
                $product_by_dm = $this->product->getbyIDDM($id_cat);
            }
            print_r($product_by_dm);    
            
            include 'apps/view/shop/product.php';

        }
        function about() {
            include 'apps/view/shop/about.php';

        }
        function contact() {
            include 'apps/view/shop/contact.php';

        }
        function productdetail() {
            if(isset($_GET['id'])) {
                $id = $_GET['id'];
                $product_dt = $this->product->getbyID($id);
                $product_rela = $this->product->get_sp_lq($id,$product_dt[0]['id_cat']);
            }
            // print_r($product_dt);
            print_r($product_rela);

            include 'apps/view/shop/productdetail.php';

        }
    }
?>