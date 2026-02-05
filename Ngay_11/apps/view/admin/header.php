<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Dashboard</title>
<!-- Thêm thư viện Chart.js từ CDN -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<link rel="stylesheet" href="public/LayoutAdmin/css/style.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css" integrity="sha512-2SwdPD6INVrV/lHTZbO2nodKhrnDdJK9/kg2XD1r9uGqPo1cUbujc+IYdlYdEErWNu69gVcYgdxlmVmzTWnetw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
<header>
    <h1>Trang Quản Trị</h1>
</header>

<nav>
    <ul>
        <li><a href="admin.php">Trang Chủ</a></li>
        <li><a href="admin.php?page=category">Quản lý Danh mục</a></li>
        <li><a href="admin.php?page=product">Quản lý sản phẩm</a></li>
        <li><a href="admin.php?page=user">Người dùng</a></li>
        
    </ul>
</nav>