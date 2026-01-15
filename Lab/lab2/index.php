<?php
require_once 'classes.php';

session_start();
if (!isset($_SESSION['mangSinhVien'])) {
    $_SESSION['mangSinhVien'] = array();
}

if ($_POST && isset($_POST['them_sinh_vien'])) {
    $sv = new SinhVien();
    $sv->setMssv($_POST['mssv']);
    $sv->setHoten($_POST['hoten']);
    $sv->setGioitinh($_POST['gioitinh']);
    $sv->setNgaysinh($_POST['ngaysinh']);
    $sv->setDiemtb($_POST['diemtb']);
    
    $_SESSION['mangSinhVien'][] = $sv;
    $message = "Thêm sinh viên thành công!";
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Lab 2 - OOP PHP</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }
        .container {
            max-width: 800px;
            margin: 0 auto;
        }
        .bai-tap {
            border: 1px solid #ccc;
            margin: 20px 0;
            padding: 15px;
        }
        .demo {
            background: #f0f0f0;
            padding: 10px;
            margin: 10px 0;
        }
        input, select {
            width: 200px;
            padding: 5px;
            margin: 5px;
        }
        button {
            background: #007bff;
            color: white;
            padding: 8px 15px;
            border: none;
            margin: 10px 0;
        }
        .success {
            background: #d4edda;
            padding: 10px;
            margin: 10px 0;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Lab 2 - Lập trình hướng đối tượng PHP</h1>
        
        <div class="bai-tap">
            <h3>Bài 1: Demo lớp Person</h3>
            <div class="demo">
                <?php
                // Tạo đối tượng Person và demo
                $nguoi = new Person();
                $nguoi->setName("Nguyễn Văn Thịnh");
                $nguoi->setAge(25);
                $nguoi->setAddress("123 Đường Láng, Hà Nội");

                echo "<h4>Thông tin người:</h4>";
                echo $nguoi->getInfo() . "<br><br>";
                
                if ($nguoi->canVote()) {
                    echo "<span style='color: green;'>✅ Người này có thể bỏ phiếu.</span>";
                } else {
                    echo "<span style='color: red;'>❌ Người này không thể bỏ phiếu.</span>";
                }
                ?>
            </div>
        </div>

        <div class="bai-tap">
            <h3>Bài 2: Demo lớp Product</h3>
            <div class="demo">
                <?php
                // Tạo đối tượng Product và demo
                $sanPham = new Product();
                $sanPham->setName("iPhone 15");
                $sanPham->setPrice(25000000);
                $sanPham->setQuantity(10);

                echo "<h4>Thông tin sản phẩm:</h4>";
                echo $sanPham->getInfo() . "<br><br>";
                echo "<strong>Tổng giá trị: " . number_format($sanPham->calculateTotal()) . " VNĐ</strong>";
                ?>
            </div>
        </div>

        <div class="bai-tap">
            <h3>Bài 3: Quản lý sinh viên</h3>
            
            <?php if (isset($message)): ?>
                <div class="success"><?php echo $message; ?></div>
            <?php endif; ?>
            
            <form method="POST">
                <h4>Thêm sinh viên mới:</h4>
                Mã sinh viên: <input type="text" name="mssv" required><br>
                Họ và tên: <input type="text" name="hoten" required><br>
                Giới tính: 
                <select name="gioitinh" required>
                    <option value="">-- Chọn --</option>
                    <option value="Nam">Nam</option>
                    <option value="Nữ">Nữ</option>
                </select><br>
                Ngày sinh: <input type="date" name="ngaysinh" required><br>
                Điểm TB: <input type="number" name="diemtb" step="0.1" min="0" max="10" required><br>
                <button type="submit" name="them_sinh_vien">Thêm sinh viên</button>
            </form>

            <div class="demo">
                <h4>Danh sách sinh viên:</h4>
                <?php
                if (count($_SESSION['mangSinhVien']) > 0) {
                    foreach ($_SESSION['mangSinhVien'] as $sv) {
                        echo "MSSV: " . $sv->getMssv() . "<br>";
                        echo "Họ tên: " . $sv->getHoten() . "<br>";
                        echo "Giới tính: " . $sv->getGioitinh() . "<br>";
                        echo "Ngày sinh: " . $sv->getNgaysinh() . "<br>";
                        echo "Điểm TB: " . $sv->getDiemtb() . "<br><hr>";
                    }
                } else {
                    echo "Chưa có sinh viên nào!";
                }
                ?>
            </div>
        </div>
    </div>
</body>
</html>