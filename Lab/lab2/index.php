<?php
// Include file chứa các lớp
require_once 'classes.php';

// Khởi tạo session để lưu dữ liệu sinh viên
session_start();
if (!isset($_SESSION['mangSinhVien'])) {
    $_SESSION['mangSinhVien'] = array();
}

// Xử lý form thêm sinh viên
if ($_POST && isset($_POST['them_sinh_vien'])) {
    $sv = new SinhVien();
    $sv->setMssv($_POST['mssv']);
    $sv->setHoten($_POST['hoten']);
    $sv->setGioitinh($_POST['gioitinh']);
    $sv->setNgaysinh($_POST['ngaysinh']);
    $sv->setDiemtb($_POST['diemtb']);
    
    $_SESSION['mangSinhVien'][] = $sv;
    $thongBao = "Thêm sinh viên thành công!";
}
?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lab 1 - OOP PHP</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
            background-color: #f5f5f5;
        }
        .container {
            max-width: 1000px;
            margin: 0 auto;
            background: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }
        h1 {
            color: #333;
            text-align: center;
        }
        .bai-tap {
            margin: 30px 0;
            padding: 20px;
            border: 2px solid #ddd;
            border-radius: 8px;
            background-color: #f9f9f9;
        }
        .bai-tap h3 {
            color: #007bff;
            margin-top: 0;
        }
        .demo {
            background: #e9ecef;
            padding: 15px;
            border-radius: 5px;
            margin: 10px 0;
        }
        .form-group {
            margin: 10px 0;
        }
        .form-group label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }
        .form-group input, .form-group select {
            width: 100%;
            padding: 8px;
            border: 1px solid #ddd;
            border-radius: 4px;
            box-sizing: border-box;
        }
        .btn {
            background-color: #007bff;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            margin: 10px 0;
        }
        .btn:hover {
            background-color: #0056b3;
        }
        .thong-bao {
            background-color: #d4edda;
            color: #155724;
            padding: 10px;
            border-radius: 4px;
            margin: 10px 0;
        }
        .sinh-vien-item {
            background: white;
            padding: 15px;
            margin: 10px 0;
            border-radius: 5px;
            border-left: 4px solid #007bff;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Lab 1 - Lập trình hướng đối tượng PHP</h1>
        
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
            
            <?php if (isset($thongBao)): ?>
                <div class="thong-bao"><?php echo $thongBao; ?></div>
            <?php endif; ?>
            
            <form method="POST">
                <h4>Thêm sinh viên mới:</h4>
                <div class="form-group">
                    <label>Mã sinh viên:</label>
                    <input type="text" name="mssv" required>
                </div>
                <div class="form-group">
                    <label>Họ và tên:</label>
                    <input type="text" name="hoten" required>
                </div>
                <div class="form-group">
                    <label>Giới tính:</label>
                    <select name="gioitinh" required>
                        <option value="">-- Chọn giới tính --</option>
                        <option value="Nam">Nam</option>
                        <option value="Nữ">Nữ</option>
                    </select>
                </div>
                <div class="form-group">
                    <label>Ngày sinh:</label>
                    <input type="date" name="ngaysinh" required>
                </div>
                <div class="form-group">
                    <label>Điểm trung bình:</label>
                    <input type="number" name="diemtb" step="0.1" min="0" max="10" required>
                </div>
                <button type="submit" name="them_sinh_vien" class="btn">Thêm sinh viên</button>
            </form>

            <div class="demo">
                <h4>Danh sách sinh viên:</h4>
                <?php
                if (count($_SESSION['mangSinhVien']) > 0) {
                    foreach ($_SESSION['mangSinhVien'] as $index => $sv) {
                        echo "<div class='sinh-vien-item'>";
                        echo "<h5>Sinh viên #" . ($index + 1) . "</h5>";
                        echo "MSSV: " . $sv->getMssv() . "<br>";
                        echo "Họ tên: " . $sv->getHoten() . "<br>";
                        echo "Giới tính: " . $sv->getGioitinh() . "<br>";
                        echo "Ngày sinh: " . $sv->getNgaysinh() . "<br>";
                        echo "Điểm TB: " . $sv->getDiemtb() . "<br>";
                        echo "</div>";
                    }
                } else {
                    echo "<p>Chưa có sinh viên nào được thêm!</p>";
                }
                ?>
            </div>
        </div>
    </div>
</body>
</html>