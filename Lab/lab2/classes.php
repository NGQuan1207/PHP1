<?php
// Bài 1: Lớp Person
class Person {
    public $name;
    public $age;
    public $address;

    public function setName($name) {
        $this->name = $name;
    }

    public function setAge($age) {
        $this->age = $age;
    }

    public function setAddress($address) {
        $this->address = $address;
    }

    public function getInfo() {
        return "Tên: " . $this->name . "<br>" .
               "Tuổi: " . $this->age . "<br>" .
               "Địa chỉ: " . $this->address;
    }

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

    public function setName($name) {
        $this->name = $name;
    }

    public function setPrice($price) {
        $this->price = $price;
    }

    public function setQuantity($quantity) {
        $this->quantity = $quantity;
    }

    public function getInfo() {
        return "Tên sản phẩm: " . $this->name . "<br>" .
               "Giá: " . number_format($this->price) . " VNĐ<br>" .
               "Số lượng: " . $this->quantity;
    }

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

    public function __construct($mssv = "", $hoten = "", $gioitinh = "", $ngaysinh = "", $diemtb = 0) {
        $this->mssv = $mssv;
        $this->hoten = $hoten;
        $this->gioitinh = $gioitinh;
        $this->ngaysinh = $ngaysinh;
        $this->diemtb = $diemtb;
    }

    public function getMssv() {
        return $this->mssv;
    }

    public function setMssv($mssv) {
        $this->mssv = $mssv;
    }

    public function getHoten() {
        return $this->hoten;
    }

    public function setHoten($hoten) {
        $this->hoten = $hoten;
    }

    public function getGioitinh() {
        return $this->gioitinh;
    }

    public function setGioitinh($gioitinh) {
        $this->gioitinh = $gioitinh;
    }

    public function getNgaysinh() {
        return $this->ngaysinh;
    }

    public function setNgaysinh($ngaysinh) {
        $this->ngaysinh = $ngaysinh;
    }

    public function getDiemtb() {
        return $this->diemtb;
    }

    public function setDiemtb($diemtb) {
        $this->diemtb = $diemtb;
    }

    public function hienThiThongTin() {
        echo "MSSV: " . $this->mssv . "<br>";
        echo "Họ tên: " . $this->hoten . "<br>";
        echo "Giới tính: " . $this->gioitinh . "<br>";
        echo "Ngày sinh: " . $this->ngaysinh . "<br>";
        echo "Điểm TB: " . $this->diemtb . "<br><hr>";
    }
}
?>