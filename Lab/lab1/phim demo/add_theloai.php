<?php
require_once 'movies_data.php';

if (!isset($_SESSION['is_logged_in'])) {
    header('Location: login.php');
}

$message = '';

if ($_POST) {
    $ten = $_POST['ten'];
    $bieuTuong = $_POST['bieuTuong'];
    
    if (!empty($ten) && !empty($bieuTuong)) {
        $theLoaiMoi = [
            'bieuTuong' => $bieuTuong,
            'ten' => $ten
        ];
        
        themTheLoaiMoi($theLoaiMoi);
        $message = "Thêm thể loại thành công!";
    } else {
        $message = "Vui lòng điền đầy đủ thông tin!";
    }
}
?>
<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Thêm Thể Loại - BHZ Movies</title>

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
        .form-group select {
            width: 100%;
            padding: 0.75rem;
            border: 2px solid #ddd;
            border-radius: 5px;
            font-size: 1rem;
            box-sizing: border-box;
        }
        
        .form-group input:focus,
        .form-group select:focus {
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
        
        .icon-preview {
            font-size: 2rem;
            margin-left: 1rem;
            color: #007bff;
        }
        
        .icon-input-group {
            display: flex;
            align-items: center;
        }
        
        .icon-input-group input {
            flex: 1;
        }
        
        .existing-genres {
            background: #f8f9fa;
            padding: 1rem;
            border-radius: 5px;
            margin-bottom: 1.5rem;
        }
        
        .existing-genres h4 {
            margin-top: 0;
            color: #495057;
        }
        
        .genre-item {
            display: inline-block;
            background: white;
            padding: 0.5rem 1rem;
            margin: 0.25rem;
            border-radius: 15px;
            border: 1px solid #dee2e6;
        }
    </style>
</head>

<body>
    <header>
        <h1>BHZ Movies</h1>
        <div class="header-right">
            <nav>
                <ul>
                    <li><a href="index.php">Home</a></li>
                    <li><a href="#">Movies</a></li>
                    <li><a href="#">TV Shows</a></li>
                    <li><a href="#">About</a></li>
                </ul>
            </nav>
            <span style="color: white; margin-right: 20px;">
                <?php echo $_SESSION['username']; ?>
            </span>
            <a href="add_movie.php" class="btn-add-movie">
                Thêm Phim
            </a>
            <a href="logout.php" class="btn-add-movie">
                Đăng xuất
            </a>
        </div>
    </header>

    <main>
        <div class="form-container">
            <a href="index.php" class="btn-back">
                <i class="fas fa-arrow-left"></i> Quay lại trang chính
            </a>
            
            <h2><i class="fas fa-tags"></i> Thêm Thể Loại Mới</h2>
            
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
            
            <div class="existing-genres">
                <h4><i class="fas fa-list"></i> Thể loại hiện tại:</h4>
                <?php foreach($theLoai as $item): ?>
                    <div class="genre-item">
                        <i class="<?php echo $item['bieuTuong']; ?>"></i>
                        <?php echo $item['ten']; ?>
                    </div>
                <?php endforeach; ?>
            </div>
            
            <form method="POST">
                <div class="form-group">
                    <label for="ten"><i class="fas fa-tag"></i> Tên thể loại:</label>
                    <input type="text" id="ten" name="ten" required placeholder="Nhập tên thể loại..." value="<?php echo isset($_POST['ten']) ? htmlspecialchars($_POST['ten']) : ''; ?>">
                </div>
                
                <div class="form-group">
                    <label for="bieuTuong"><i class="fas fa-icons"></i> Biểu tượng Font Awesome:</label>
                    <div class="icon-input-group">
                        <input type="text" id="bieuTuong" name="bieuTuong" required placeholder="Ví dụ: fas fa-star" value="<?php echo isset($_POST['bieuTuong']) ? htmlspecialchars($_POST['bieuTuong']) : ''; ?>" oninput="updateIconPreview()">
                        <i id="iconPreview" class="icon-preview"></i>
                    </div>
                    <small style="color: #666; font-size: 0.9rem;">
                        Tham khảo biểu tượng tại: <a href="https://fontawesome.com/icons" target="_blank">FontAwesome Icons</a>
                    </small>
                </div>
                
                <div class="form-group">
                    <button type="submit" class="btn-submit">
                        <i class="fas fa-plus"></i> Thêm Thể Loại
                    </button>
                </div>
            </form>
        </div>
    </main>

    <footer>
        <p>&copy; 2024 BHZCo. All rights reserved.</p>
    </footer>
    
    <script>
        function updateIconPreview() {
            const input = document.getElementById('bieuTuong');
            const preview = document.getElementById('iconPreview');
            preview.className = 'icon-preview ' + input.value;
        }
        
        // Cập nhật icon preview khi load trang
        document.addEventListener('DOMContentLoaded', function() {
            updateIconPreview();
        });
    </script>
</body>

</html>
