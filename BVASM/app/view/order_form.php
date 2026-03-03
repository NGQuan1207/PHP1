<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Thêm đơn hàng</title>
    <link rel="stylesheet" href="public/template/style.css">
</head>
<body>
    <header>
        <h1>Thêm đơn hàng</h1>
    </header>

    <main class="container">
        <h2>Thêm đơn hàng mới</h2>

        <form method="POST" action="index.php?action=add">
            <div class="form-group">
                <label>Tên khách hàng:</label>
                <input type="text" name="customer_name" required>
            </div>
            <div class="form-group">
                <label>Điện thoại:</label>
                <input type="text" name="phone" required>
            </div>
            <div class="form-group">
                <label>Tổng tiền:</label>
                <input type="number" step="0.01" name="total_amount" required>
            </div>
            <div class="form-group">
                <label>Trạng thái:</label>
                <select name="status">
                    <option value="Pending">Pending</option>
                    <option value="Completed">Completed</option>
                </select>
            </div>
            <button type="submit" class="btn-submit">Lưu đơn hàng</button>
            <a href="index.php" class="btn-cancel">Quay lại</a>
        </form>
    </main>

    <footer>
        <p>© 2026 - Bộ môn Công nghệ Thông tin - FPLHCM</p>
    </footer>
</body>
</html>
