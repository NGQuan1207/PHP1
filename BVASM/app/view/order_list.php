<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Quản lý đơn hàng</title>
    <link rel="stylesheet" href="public/template/style.css">
</head>
<body>
    <header>
        <h1>Quản lý đơn hàng</h1>
    </header>

    <main class="container">
        <h2>Danh sách đơn hàng</h2>

        <a href="index.php?action=addform" class="btn">+ Thêm đơn hàng</a>

        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Tên Khách hàng</th>
                    <th>Điện thoại</th>
                    <th>Tổng tiền</th>
                    <th>Trạng thái</th>
                    <th>Ngày tạo</th>
                    <th>Hành động</th>
                </tr>
            </thead>
            <tbody>
                <?php if(!empty($orders)): ?>
                    <?php foreach($orders as $row): ?>
                        <tr>
                            <td><?php echo $row['id']; ?></td>
                            <td><?php echo $row['customer_name']; ?></td>
                            <td><?php echo $row['phone']; ?></td>
                            <td><?php echo number_format($row['total_amount'], 0, '.', ','); ?></td>
                            <td><span class="status <?php echo strtolower($row['status']); ?>"><?php echo $row['status']; ?></span></td>
                            <td><?php echo date('d-m-Y', strtotime($row['created_at'])); ?></td>
                            <td>
                                <a href="index.php?action=delete&id=<?php echo $row['id']; ?>" class="btn-delete" onclick="return confirm('Bạn chắc chắn muốn xoá?')">Xoá</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr><td colspan="7" style="text-align: center;">Không có đơn hàng nào</td></tr>
                <?php endif; ?>
            </tbody>
        </table>
    </main>

    <footer>
        <p>© 2026 - Bộ môn Công nghệ Thông tin - FPLHCM</p>
    </footer>
</body>
</html>
