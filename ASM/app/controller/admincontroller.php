<?php
class AdminController {
    public function login() {
        session_start();

        if(isset($_SESSION['admin'])) {
            header('Location: index.php?page=admin&action=dashboard');
            exit();
        }
        
        $error = '';
        
        if($_SERVER['REQUEST_METHOD'] == 'POST') {
            $username = $_POST['username'] ?? '';
            $password = $_POST['password'] ?? '';
            
            if($username == 'admin' && $password == '123456') {
                $_SESSION['admin'] = $username;
                header('Location: index.php?page=admin&action=dashboard');
                exit();
            } else {
                $error = 'Tên đăng nhập hoặc mật khẩu không đúng!';
            }
        }
        include 'app/view/admin/login.php';
    }
    
    public function logout() {
        session_destroy();
        include 'app/view/admin/logout.php';
    }
    public function dashboard() {
        session_start();
        if(!isset($_SESSION['admin'])) {
            header('Location: index.php?page=admin&action=login');
            exit();
        }
        
        require_once 'app/model/car.php';
        $carModel = new Car();
        $cars = $carModel->getAllCars();
        $carTypes = $carModel->getAllCarTypes();
        $carCount = $carModel->getCarCount();
        $carTypeCount = $carModel->getCarTypeCount();
        
        include 'app/view/admin/dashboard.php';
    }

    public function add_car() {
        session_start();
        if(!isset($_SESSION['admin'])) {
            header('Location: index.php?page=admin&action=login');
            exit();
        }
        
        require_once 'app/model/car.php';
        $carModel = new Car();
        $message = '';
        
        // Xử lý thêm xe
        if($_SERVER['REQUEST_METHOD'] == 'POST') {
            $car_name = $_POST['car_name'] ?? '';
            $brand_id = $_POST['brand_id'] ?? '';
            $type_id = $_POST['type_id'] ?? '';
            $price = $_POST['price'] ?? '';
            $description = $_POST['description'] ?? '';
            
            // Xử lý upload ảnh
            $image_url = 'public/layout/img/hinh1.webp'; // default image
            $upload_error = '';
            
            if(isset($_FILES['car_image']) && $_FILES['car_image']['error'] == 0) {
                $upload_dir = 'public/layout/img/';
                $file_extension = strtolower(pathinfo($_FILES['car_image']['name'], PATHINFO_EXTENSION));
                $allowed_extensions = ['jpg', 'jpeg', 'png', 'gif', 'webp'];
                
                if(in_array($file_extension, $allowed_extensions)) {
                    $new_filename = time() . '_' . uniqid() . '.' . $file_extension;
                    $upload_path = $upload_dir . $new_filename;
                    
                    if(move_uploaded_file($_FILES['car_image']['tmp_name'], $upload_path)) {
                        $image_url = $upload_path;
                    } else {
                        $upload_error = 'Lỗi khi upload ảnh!';
                    }
                } else {
                    $upload_error = 'Chỉ cho phép file ảnh (jpg, jpeg, png, gif, webp)!';
                }
            }
            
            if($car_name && $brand_id && $type_id && $price && !$upload_error) {
                $carModel->addCar($car_name, $brand_id, $type_id, $price, $description, $image_url);
                header('Location: index.php?page=admin&action=add_car&success=1');
                exit();
            } else {
                $message = $upload_error ? $upload_error : 'Vui lòng điền đầy đủ thông tin!';
            }
        }
        
        if(isset($_GET['success']) && $_GET['success'] == '1') {
            $message = 'Thêm xe thành công!';
        }
        
        // Lấy dữ liệu cho form
        $brands = $carModel->getAllBrands();
        $carTypes = $carModel->getAllCarTypes();
        
        include 'app/view/admin/add_car.php';
    }

    public function delete_car() {
        session_start();
        if(!isset($_SESSION['admin'])) {
            header('Location: index.php?page=admin&action=login');
            exit();
        }
        
        if(isset($_GET['id'])) {
            require_once 'app/model/car.php';
            $carModel = new Car();
            $car_id = $_GET['id'];
            $carModel->deleteCar($car_id);
        }
        
        header('Location: index.php?page=admin&action=dashboard');
        exit();
    }
    
    public function edit_car() {
        session_start();
        if(!isset($_SESSION['admin'])) {
            header('Location: index.php?page=admin&action=login');
            exit();
        }
        
        require_once 'app/model/car.php';
        $carModel = new Car();
        $message = '';
        $car = null;
        
        // Lấy thông tin xe
        if(isset($_GET['id'])) {
            $car_id = $_GET['id'];
            $carData = $carModel->getCarbyid($car_id);
            if(!empty($carData)) {
                $car = $carData[0];
            } else {
                header('Location: index.php?page=admin&action=dashboard');
                exit();
            }
        }
        
        // Xử lý cập nhật xe
        if($_SERVER['REQUEST_METHOD'] == 'POST' && $car) {
            $car_name = $_POST['car_name'] ?? '';
            $brand_id = $_POST['brand_id'] ?? '';
            $type_id = $_POST['type_id'] ?? '';
            $price = $_POST['price'] ?? '';
            $description = $_POST['description'] ?? '';
            $car_id = $car['car_id'];
            
           
            $image_url = null;
            $upload_error = '';
            
            if(isset($_FILES['car_image']) && $_FILES['car_image']['error'] == 0) {
                $upload_dir = 'public/layout/img/';
                $file_extension = strtolower(pathinfo($_FILES['car_image']['name'], PATHINFO_EXTENSION));
                $allowed_extensions = ['jpg', 'jpeg', 'png', 'gif', 'webp'];
                
                if(in_array($file_extension, $allowed_extensions)) {
                    $new_filename = time() . '_' . uniqid() . '.' . $file_extension;
                    $upload_path = $upload_dir . $new_filename;
                    
                    if(move_uploaded_file($_FILES['car_image']['tmp_name'], $upload_path)) {
                        $image_url = $upload_path;
                    } else {
                        $upload_error = 'Lỗi khi upload ảnh!';
                    }
                } else {
                    $upload_error = 'Chỉ cho phép file ảnh (jpg, jpeg, png, gif, webp)!';
                }
            }
            
            if($car_name && $brand_id && $type_id && $price && !$upload_error) {
                $carModel->updateCar($car_id, $car_name, $brand_id, $type_id, $price, $description, $image_url);
                header('Location: index.php?page=admin&action=edit_car&id=' . $car_id . '&success=1');
                exit();
            } else {
                $message = $upload_error ? $upload_error : 'Vui lòng điền đầy đủ thông tin!';
            }
        }
        
        if(isset($_GET['success']) && $_GET['success'] == '1') {
            $message = 'Cập nhật xe thành công!';
        }
        
        
        $brands = $carModel->getAllBrands();
        $carTypes = $carModel->getAllCarTypes();
        
        include 'app/view/admin/edit_car.php';
    }
    
    public function add_car_type() {
        session_start();
        if(!isset($_SESSION['admin'])) {
            header('Location: index.php?page=admin&action=login');
            exit();
        }
        
        require_once 'app/model/car.php';
        $carModel = new Car();
        $message = '';
        
        // Xử lý thêm loại xe
        if($_SERVER['REQUEST_METHOD'] == 'POST') {
            $type_name = $_POST['type_name'] ?? '';
            
            // Xử lý upload ảnh
            $image_url = 'public/layout/img/default_car_type.webp'; 
            $upload_error = '';
            
            if(isset($_FILES['type_image']) && $_FILES['type_image']['error'] == 0) {
                $upload_dir = 'public/layout/img/';
                $file_extension = strtolower(pathinfo($_FILES['type_image']['name'], PATHINFO_EXTENSION));
                $allowed_extensions = ['jpg', 'jpeg', 'png', 'gif', 'webp'];
                
                if(in_array($file_extension, $allowed_extensions)) {
                    $new_filename = 'type_' . time() . '_' . uniqid() . '.' . $file_extension;
                    $upload_path = $upload_dir . $new_filename;
                    
                    if(move_uploaded_file($_FILES['type_image']['tmp_name'], $upload_path)) {
                        $image_url = $upload_path;
                    } else {
                        $upload_error = 'Lỗi khi upload ảnh!';
                    }
                } else {
                    $upload_error = 'Chỉ cho phép file ảnh (jpg, jpeg, png, gif, webp)!';
                }
            }
            
            if($type_name && !$upload_error) {
                $carModel->addCarType($type_name, $image_url);
                header('Location: index.php?page=admin&action=add_car_type&success=1');
                exit();
            } else {
                $message = $upload_error ? $upload_error : 'Vui lòng điền tên loại xe!';
            }
        }
        
        if(isset($_GET['success']) && $_GET['success'] == '1') {
            $message = 'Thêm loại xe thành công!';
        }
        
        include 'app/view/admin/add_car_type.php';
    }

    public function edit_car_type() {
        session_start();
        if(!isset($_SESSION['admin'])) {
            header('Location: index.php?page=admin&action=login');
            exit();
        }
        
        require_once 'app/model/car.php';
        $carModel = new Car();
        $message = '';
        $carType = null;
        
        // Lấy thông tin loại xe cần chỉnh sửa
        if(isset($_GET['id'])) {
            $type_id = $_GET['id'];
            $carTypeData = $carModel->getCarTypeById($type_id);
            if(!empty($carTypeData)) {
                $carType = $carTypeData[0]; // Lấy loại xe đầu tiên từ kết quả
            } else {
                header('Location: index.php?page=admin&action=dashboard');
                exit();
            }
        }
        
        // Xử lý cập nhật
        if($_SERVER['REQUEST_METHOD'] == 'POST' && $carType) {
            $type_name = $_POST['type_name'] ?? '';
            $type_id = $carType['type_id'];
            
            // Xử lý upload
            $image_url = null;
            $upload_error = '';
            
            if(isset($_FILES['type_image']) && $_FILES['type_image']['error'] == 0) {
                $upload_dir = 'public/layout/img/';
                $file_extension = strtolower(pathinfo($_FILES['type_image']['name'], PATHINFO_EXTENSION));
                $allowed_extensions = ['jpg', 'jpeg', 'png', 'gif', 'webp'];
                
                if(in_array($file_extension, $allowed_extensions)) {
                    $new_filename = 'type_' . time() . '_' . uniqid() . '.' . $file_extension;
                    $upload_path = $upload_dir . $new_filename;
                    
                    if(move_uploaded_file($_FILES['type_image']['tmp_name'], $upload_path)) {
                        $image_url = $upload_path;
                    } else {
                        $upload_error = 'Lỗi khi upload ảnh!';
                    }
                } else {
                    $upload_error = 'Chỉ cho phép file ảnh (jpg, jpeg, png, gif, webp)!';
                }
            }
            
            if($type_name && !$upload_error) {
                $carModel->updateCarType($type_id, $type_name, $image_url);
                header('Location: index.php?page=admin&action=edit_car_type&id=' . $type_id . '&success=1');
                exit();
            } else {
                $message = $upload_error ? $upload_error : 'Vui lòng điền tên loại xe!';
            }
        }
        
        if(isset($_GET['success']) && $_GET['success'] == '1') {
            $message = 'Cập nhật loại xe thành công!';
        }
        
        include 'app/view/admin/edit_car_type.php';
    }
}
?>