<?php include 'app/views/shares/header.php'; ?>
<style>
    body {
        background-color: #f8d3e0 !important; /* Màu hồng nhạt cho toàn bộ trang */
        margin: 0; /* Đảm bảo không có khoảng trống xung quanh */
        padding: 20px; /* Padding cho khoảng cách bên trong */
    }
    
</style>

<h1>Quản lý tài khoản người dùng</h1>

<table border="1" cellpadding="10" cellspacing="0">
    <thead>
        <tr>
            <th>ID</th>
            <th>Tên đăng nhập</th>
            <th>Họ và tên</th>
            <th>Vai trò</th>
            <th>Hành động</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($users as $user): ?>
            <tr>
                <td><?= htmlspecialchars($user->id, ENT_QUOTES, 'UTF-8'); ?></td>
                <td><?= htmlspecialchars($user->username, ENT_QUOTES, 'UTF-8'); ?></td>
                <td><?= htmlspecialchars($user->fullname, ENT_QUOTES, 'UTF-8'); ?></td>
                <td><?= htmlspecialchars($user->role, ENT_QUOTES, 'UTF-8'); ?></td>
                <td>
                    <a href="/webbanhang/index.php?url=account/editUser/<?= $user->id; ?>">Sửa</a> |
                    <a href="/webbanhang/index.php?url=account/deleteUser/<?= $user->id; ?>" onclick="return confirm('Bạn có chắc chắn muốn xóa tài khoản này?');">Xóa</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<a href="/webbanhang/index.php?url=account/register" class="btn btn-primary">Thêm tài khoản mới</a>

<?php include 'app/views/shares/footer.php'; ?>