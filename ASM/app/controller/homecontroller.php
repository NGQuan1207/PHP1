<?php
require_once 'app/model/car.php';
require_once 'app/model/user.php';
require_once 'app/model/wishlist.php';

class HomeController {
    private $car;
    private $user;
    private $wishlist;
    
    function __construct() {
        $this->car = new Car();
        $this->user = new User();
        $this->wishlist = new Wishlist();
    }
    
    private function getUserWishlistArray() {
        $userWishlist = [];
        if(isset($_SESSION['user'])) {
            $user_id = $_SESSION['user']['user_id'];
            $wishlistItems = $this->wishlist->getUserWishlist($user_id);
            foreach($wishlistItems as $item) {
                $userWishlist[] = $item['car_id'];
            }
        }
        return $userWishlist;
    }

    function home() {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
        
        $cars = $this->car->getAllCars();
        $carTypes = $this->car->getAllCarTypes();

        // Lấy danh sách xe yêu thích của user
        $userWishlist = $this->getUserWishlistArray();
        
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
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
        
        $carTypes = $this->car->getAllCarTypes();
        
        $selected_type = isset($_GET['type_id']) ? $_GET['type_id'] : null;
        
        if($selected_type) {
            $car_all = $this->car->getCarsByType($selected_type);
        } else {
            $car_all = $this->car->getAllCars();
        }
        
        $userWishlist = $this->getUserWishlistArray();
        
        if(!isset($_GET['trang'])) {
            $trang_hien_tai = 1;
        } else {
            $trang_hien_tai = $_GET['trang'];
        }
        $sp_1_trang = 6;
        $tongsp = count($car_all);
        $sotrang = ceil($tongsp / $sp_1_trang);
        $offset = ($trang_hien_tai - 1) * $sp_1_trang;
        
        $cars = array_slice($car_all, $offset, $sp_1_trang);
        
        include 'app/view/shop/product.php';
    }

    function about() {
        include 'app/view/shop/about.php';
    }

    function contact() {
        include 'app/view/shop/contact.php';
    }
    
    function detail() {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
        
        if(isset($_GET['id'])) {
            $id = $_GET['id'];
            $car_dt = $this->car->getCarbyid($id);
            if(!empty($car_dt)) {
                $car = $car_dt[0]; 
                $recommendedCars = $this->car->getRecomendedcar($car['type_id'], $car['brand_id']);
                
                $isInWishlist = false;
                if(isset($_SESSION['user'])) {
                    $user_id = $_SESSION['user']['user_id'];
                    $isInWishlist = $this->wishlist->isInWishlist($user_id, $car['car_id']);
                }
            }
        }
        
        include 'app/view/shop/detail.php';
    }
    
    // Đăng ký người dùng
    function register() {
        $message = '';
        $success = false;
        
        if($_SERVER['REQUEST_METHOD'] == 'POST') {
            $full_name = $_POST['full_name'] ?? '';
            $email = $_POST['email'] ?? '';
            $password = $_POST['password'] ?? '';
            $confirm_password = $_POST['confirm_password'] ?? '';
            $phone = $_POST['phone'] ?? null;
            $address = $_POST['address'] ?? null;
            
            // Validation
            if(!$full_name || !$email || !$password) {
                $message = 'Vui lòng điền đầy đủ thông tin bắt buộc!';
            } elseif($password !== $confirm_password) {
                $message = 'Xác nhận mật khẩu không khớp!';
            } elseif(strlen($password) < 6) {
                $message = 'Mật khẩu phải có ít nhất 6 ký tự!';
            } elseif(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $message = 'Email không hợp lệ!';
            } elseif($this->user->emailExists($email)) {
                $message = 'Email đã được sử dụng!';
            } else {
                // Đăng ký thành công
                $result = $this->user->register($full_name, $email, $password, $phone, $address);
                if($result) {
                    $message = 'Đăng ký thành công! Bạn có thể đăng nhập ngay.';
                    $success = true;
                } else {
                    $message = 'Có lỗi xảy ra trong quá trình đăng ký! Vui lòng thử lại.';
                }
            }
        }
        
        include 'app/view/shop/register.php';
    }
    
    // Đăng nhập người dùng
    function login() {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
        
        // Nếu đã đăng nhập, chuyển về trang chủ
        if(isset($_SESSION['user'])) {
            header('Location: index.php');
            exit();
        }
        
        $message = '';
        
        if($_SERVER['REQUEST_METHOD'] == 'POST') {
            $email = $_POST['email'] ?? '';
            $password = $_POST['password'] ?? '';
            
            if(!$email || !$password) {
                $message = 'Vui lòng nhập email và mật khẩu!';
            } else {
                $user = $this->user->login($email, $password);
                if($user) {
                    $_SESSION['user'] = $user;
                    header('Location: index.php');
                    exit();
                } else {
                    $message = 'Email hoặc mật khẩu không đúng!';
                }
            }
        }
        
        include 'app/view/shop/login.php';
    }
    
    // Đăng xuất
    function logout() {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
        session_unset();
        session_destroy();
        header('Location: index.php');
        exit();
    }
    
    // Trang thông tin cá nhân
    function profile() {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
        if(!isset($_SESSION['user'])) {
            header('Location: index.php?page=login');
            exit();
        }
        
        $message = '';
        $user = $_SESSION['user'];
        
        if($_SERVER['REQUEST_METHOD'] == 'POST') {
            $full_name = $_POST['full_name'] ?? '';
            $phone = $_POST['phone'] ?? null;
            $address = $_POST['address'] ?? null;
            
            if(!$full_name) {
                $message = 'Tên không được để trống!';
            } else {
                if($this->user->updateUser($user['user_id'], $full_name, $phone, $address)) {
                    // Cập nhật session
                    $_SESSION['user']['full_name'] = $full_name;
                    $_SESSION['user']['phone'] = $phone;
                    $_SESSION['user']['address'] = $address;
                    $user = $_SESSION['user'];
                    $message = 'Cập nhật thông tin thành công!';
                } else {
                    $message = 'Có lỗi xảy ra khi cập nhật!';
                }
            }
        }
        
        include 'app/view/shop/profile.php';
    }
    
    // Thêm xe vào danh sách yêu thích
    function add_to_wishlist() {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
        
        if (!headers_sent()) {
            header('Content-Type: application/json');
        }
        
        if(!isset($_SESSION['user'])) {
            echo json_encode(['success' => false, 'message' => 'Vui lòng đăng nhập để thêm vào yêu thích']);
            exit();
        }
        
        $car_id = $_POST['car_id'] ?? null;
        $user_id = $_SESSION['user']['user_id'];
        
        if($car_id) {
            if($this->wishlist->addToWishlist($user_id, $car_id)) {
                echo json_encode(['success' => true, 'message' => 'Đã thêm vào danh sách yêu thích']);
            } else {
                echo json_encode(['success' => false, 'message' => 'Xe này đã có trong danh sách yêu thích']);
            }
        } else {
            echo json_encode(['success' => false, 'message' => 'Có lỗi xảy ra']);
        }
        exit();
    }
    

    function remove_from_wishlist() {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        
        if (!headers_sent()) {
            header('Content-Type: application/json');
        }
        
        if(!isset($_SESSION['user'])) {
            echo json_encode(['success' => false, 'message' => 'Vui lòng đăng nhập']);
            exit();
        }
        
        $car_id = $_POST['car_id'] ?? null;
        $user_id = $_SESSION['user']['user_id'];
        
        if($car_id) {
            if($this->wishlist->removeFromWishlist($user_id, $car_id)) {
                echo json_encode(['success' => true, 'message' => 'Đã xóa khỏi danh sách yêu thích']);
            } else {
                echo json_encode(['success' => false, 'message' => 'Có lỗi xảy ra']);
            }
        } else {
            echo json_encode(['success' => false, 'message' => 'Có lỗi xảy ra']);
        }
        exit();
    }
    
    // Hiển thị trang danh sách yêu thích
    function wishlist() {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
        
        if(!isset($_SESSION['user'])) {
            header('Location: index.php?page=login');
            exit();
        }
        
        $user_id = $_SESSION['user']['user_id'];
        $wishlistItems = $this->wishlist->getUserWishlist($user_id);
        
        include 'app/view/shop/wishlist.php';
    }
    
    // Trang liên hệ tư vấn
    function consultation() {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
        
        $car_id = $_GET['car_id'] ?? null;
        $car = null;
        
        if($car_id) {
            $car_dt = $this->car->getCarbyid($car_id);
            if(!empty($car_dt)) {
                $car = $car_dt[0];
            }
        }
        
        include 'app/view/shop/consultation.php';
    }
    
    // Trang đặt lịch lái thử
    function test_drive() {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
        
        $car_id = $_GET['car_id'] ?? null;
        $car = null;
        
        if($car_id) {
            $car_dt = $this->car->getCarbyid($car_id);
            if(!empty($car_dt)) {
                $car = $car_dt[0];
            }
        }
        
        include 'app/view/shop/test_drive.php';
    }
}
?>

