<?php
// Bài 1: Lớp Person
class Person {
    public $name;
    public $age;
    public $address;

    // Phương thức thiết lập tên
    public function setName($name) {
        $this->name = $name;
    }

    // Phương thức thiết lập tuổi
    public function setAge($age) {
        $this->age = $age;
    }

    // Phương thức thiết lập địa chỉ
    public function setAddress($address) {
        $this->address = $address;
    }

    // Phương thức lấy thông tin đầy đủ
    public function getInfo() {
        return "Tên: " . $this->name . "<br>" .
               "Tuổi: " . $this->age . "<br>" .
               "Địa chỉ: " . $this->address;
    }

    // Phương thức kiểm tra có thể bỏ phiếu không
    public function canVote() {
        if ($this->age >= 18) {
            return true;
        } else {
            return false;
        }
    }
}

// Bài 2: Lớp Product
class Product {
    public $name;
    public $price;
    public $quantity;

    // Phương thức thiết lập tên sản phẩm
    public function setName($name) {
        $this->name = $name;
    }

    // Phương thức thiết lập giá
    public function setPrice($price) {
        $this->price = $price;
    }

    // Phương thức thiết lập số lượng
    public function setQuantity($quantity) {
        $this->quantity = $quantity;
    }

    // Phương thức lấy thông tin sản phẩm
    public function getInfo() {
        return "Tên sản phẩm: " . $this->name . "<br>" .
               "Giá: " . number_format($this->price) . " VNĐ<br>" .
               "Số lượng: " . $this->quantity;
    }

    // Phương thức tính tổng giá trị
    public function calculateTotal() {
        return $this->price * $this->quantity;
    }
}

// Bài 3: Lớp SinhVien
class SinhVien {
    private $mssv;
    private $hoten;
    private $gioitinh;
    private $ngaysinh;
    private $diemtb;

    // Constructor mặc định
    public function __construct() {
        $this->mssv = "";
        $this->hoten = "";
        $this->gioitinh = "";
        $this->ngaysinh = "";
        $this->diemtb = 0;
    }

    // Constructor có tham số
    public function __construct_full($mssv, $hoten, $gioitinh, $ngaysinh, $diemtb) {
        $this->mssv = $mssv;
        $this->hoten = $hoten;
        $this->gioitinh = $gioitinh;
        $this->ngaysinh = $ngaysinh;
        $this->diemtb = $diemtb;
    }

    // Getter và Setter cho MSSV
    public function getMssv() {
        return $this->mssv;
    }

    public function setMssv($mssv) {
        $this->mssv = $mssv;
    }

    // Getter và Setter cho Họ tên
    public function getHoten() {
        return $this->hoten;
    }

    public function setHoten($hoten) {
        $this->hoten = $hoten;
    }

    // Getter và Setter cho Giới tính
    public function getGioitinh() {
        return $this->gioitinh;
    }

    public function setGioitinh($gioitinh) {
        $this->gioitinh = $gioitinh;
    }

    // Getter và Setter cho Ngày sinh
    public function getNgaysinh() {
        return $this->ngaysinh;
    }

    public function setNgaysinh($ngaysinh) {
        $this->ngaysinh = $ngaysinh;
    }

    // Getter và Setter cho Điểm TB
    public function getDiemtb() {
        return $this->diemtb;
    }

    public function setDiemtb($diemtb) {
        $this->diemtb = $diemtb;
    }

    // Phương thức hiển thị thông tin sinh viên
    public function hienThiThongTin() {
        echo "MSSV: " . $this->mssv . "<br>";
        echo "Họ tên: " . $this->hoten . "<br>";
        echo "Giới tính: " . $this->gioitinh . "<br>";
        echo "Ngày sinh: " . $this->ngaysinh . "<br>";
        echo "Điểm TB: " . $this->diemtb . "<br>";
        echo "<hr>";
    }
}

// Khởi tạo mảng sinh viên
$mangSinhVien = array();

// Hàm thêm sinh viên vào mảng
function themSinhVien($sv) {
    global $mangSinhVien;
    $mangSinhVien[] = $sv;
}

// Hàm hiển thị tất cả sinh viên
function hienThiTatCaSinhVien() {
    global $mangSinhVien;
    if (count($mangSinhVien) > 0) {
        echo "<h3>Danh sách sinh viên:</h3>";
        foreach ($mangSinhVien as $sv) {
            $sv->hienThiThongTin();
        }
    } else {
        echo "<p>Chưa có sinh viên nào!</p>";
    }
}
?>