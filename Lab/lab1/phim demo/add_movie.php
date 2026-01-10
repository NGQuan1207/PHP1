<?php
require_once 'movies_data.php';

$success_message = '';
$error_message = '';


if ($_POST) {
    $tieuDe = trim($_POST['tieuDe']);
    $theLoai = $_POST['theLoai'];
    $luotXem = (int)$_POST['luotXem'];
    $ngayTao = $_POST['ngayTao'];
    
    if (empty($tieuDe) || empty($theLoai) || $luotXem < 0 || empty($ngayTao)) {
        $error_message = "Vui lòng điền đầy đủ thông tin bắt buộc!";
    } else {
        $uploadDir = 'img/';
        $fileName = '';
        
        if (isset($_FILES['hinhAnh']) && $_FILES['hinhAnh']['error'] == 0) {
            $allowedTypes = ['jpg', 'jpeg', 'png', 'webp'];
            $fileInfo = pathinfo($_FILES['hinhAnh']['name']);
            $fileExt = strtolower($fileInfo['extension']);
            
            if (in_array($fileExt, $allowedTypes)) {
                $fileName = uniqid() . '_' . time() . '.' . $fileExt;
                $uploadPath = $uploadDir . $fileName;
                
                if (move_uploaded_file($_FILES['hinhAnh']['tmp_name'], $uploadPath)) {
                    $phimMoi = [
                        'hinhAnh' => $uploadPath,
                        'tieuDe' => $tieuDe,
                        'theLoai' => $theLoai,
                        'luotXem' => $luotXem,
                        'ngayTao' => $ngayTao
                    ];
                    
                    themPhimMoi($phimMoi);
                    $success_message = "Phim '$tieuDe' đã được thêm thành công!";
                } else {
                    $error_message = "Lỗi khi upload file hình ảnh!";
                }
            } else {
                $error_message = "Chỉ cho phép upload file jpg, jpeg, png, webp!";
            }
        } else {
            $error_message = "Vui lòng chọn file hình ảnh!";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Thêm Phim Mới - BHZ Movies</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha384-EEH3nJ1R0rO8zBswN/mO7wzLdMn+28mqwo+uoOxnpv/sbiXlHdRWu6c8y7IaEoKG" crossorigin="anonymous" />
    <link rel="stylesheet" href="style.css" />
    <style>
        .form-container {
            max-width: 600px;
            margin: 2rem auto;
            padding: 2rem;
            background: #fff;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
        
        .form-group {
            margin-bottom: 1.5rem;
        }
        
        .form-group label {
            display: block;
            margin-bottom: 0.5rem;
            font-weight: bold;
            color: #333;
        }
        
        .form-group input,
        .form-group select,
        .form-group textarea {
            width: 100%;
            padding: 0.75rem;
            border: 2px solid #ddd;
            border-radius: 5px;
            font-size: 1rem;
            box-sizing: border-box;
        }
        
        .form-group input:focus,
        .form-group select:focus,
        .form-group textarea:focus {
            border-color: #007bff;
            outline: none;
        }
        
        .btn-submit {
            background: linear-gradient(45deg, #007bff, #0056b3);
            color: white;
            padding: 0.75rem 2rem;
            border: none;
            border-radius: 5px;
            font-size: 1rem;
            cursor: pointer;
            transition: all 0.3s ease;
        }
        
        .btn-submit:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 8px rgba(0, 123, 255, 0.3);
        }
        
        .btn-back {
            background: #6c757d;
            color: white;
            padding: 0.5rem 1.5rem;
            text-decoration: none;
            border-radius: 5px;
            display: inline-block;
            margin-bottom: 1rem;
            transition: all 0.3s ease;
        }
        
        .btn-back:hover {
            background: #545b62;
            text-decoration: none;
            color: white;
        }
        
        .success-message {
            background: #d4edda;
            color: #155724;
            padding: 1rem;
            border-radius: 5px;
            margin-bottom: 1rem;
            border: 1px solid #c3e6cb;
        }
        
        .error-message {
            background: #f8d7da;
            color: #721c24;
            padding: 1rem;
            border-radius: 5px;
            margin-bottom: 1rem;
            border: 1px solid #f5c6cb;
        }
    </style>
</head>

<body>
    <header>
        <h1>BHZ Movies</h1>
        <nav>
            <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="#">Movies</a></li>
                <li><a href="#">TV Shows</a></li>
                <li><a href="#">About</a></li>
            </ul>
        </nav>
    </header>

    <main>
        <div class="form-container">
            <a href="index.php" class="btn-back">
                <i class="fas fa-arrow-left"></i> Quay lại trang chính
            </a>
            
            <h2><i class="fas fa-plus-circle"></i> Thêm Phim Mới</h2>
            
            <?php if (!empty($success_message)): ?>
                <div class="success-message">
                    <i class="fas fa-check-circle"></i> <?php echo $success_message; ?>
                </div>
            <?php endif; ?>
            
            <?php if (!empty($error_message)): ?>
                <div class="error-message">
                    <i class="fas fa-exclamation-circle"></i> <?php echo $error_message; ?>
                </div>
            <?php endif; ?>
            
            <form method="POST" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="tieuDe"><i class="fas fa-film"></i> Tiêu đề phim:</label>
                    <input type="text" id="tieuDe" name="tieuDe" required placeholder="Nhập tiêu đề phim...">
                </div>
                
                <div class="form-group">
                    <label for="theLoai"><i class="fas fa-tags"></i> Thể loại:</label>
                    <select id="theLoai" name="theLoai" required>
                        <option value="">-- Chọn thể loại --</option>
                        <option value="Hành động">Hành động</option>
                        <option value="Hài hước">Hài hước</option>
                        <option value="Tình cảm">Tình cảm</option>
                        <option value="Kinh dị">Kinh dị</option>
                        <option value="Tâm lí">Tâm lí</option>
                        <option value="Gia đình">Gia đình</option>
                        <option value="Khoa học viễn tưởng">Khoa học viễn tưởng</option>
                    </select>
                </div>
                
                <div class="form-group">
                    <label for="luotXem"><i class="fas fa-eye"></i> Lượt xem:</label>
                    <input type="number" id="luotXem" name="luotXem" min="0" required placeholder="Nhập số lượt xem...">
                </div>
                
                <div class="form-group">
                    <label for="ngayTao"><i class="fas fa-calendar"></i> Ngày phát hành:</label>
                    <input type="date" id="ngayTao" name="ngayTao" required>
                </div>
                
                <div class="form-group">
                    <label for="hinhAnh"><i class="fas fa-image"></i> Hình ảnh poster:</label>
                    <input type="file" id="hinhAnh" name="hinhAnh" accept="image/*" required>
                </div>
                
                <div class="form-group">
                    <button type="submit" class="btn-submit">
                        <i class="fas fa-plus"></i> Thêm Phim
                    </button>
                </div>
            </form>
        </div>
    </main>

    <footer>
        <p>&copy; 2024 BHZCo. All rights reserved.</p>
    </footer>
</body>

</html>