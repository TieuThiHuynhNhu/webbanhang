<?php include 'app/views/shares/header.php'; ?>

<h1>Chỉnh sửa tài khoản</h1>

<form method="POST">
    <label for="username">Tên đăng nhập:</label>
    <input type="text" id="username" name="username" value="<?= htmlspecialchars($user->username, ENT_QUOTES, 'UTF-8'); ?>" required>
    <br>
    <label for="fullname">Họ và tên:</label>
    <input type="text" id="fullname" name="fullname" value="<?= htmlspecialchars($user->fullname, ENT_QUOTES, 'UTF-8'); ?>" required>
    <br>
    <label for="role">Vai trò:</label>
    <select id="role" name="role">
        <option value="user" <?= $user->role === 'user' ? 'selected' : ''; ?>>User</option>
        <option value="admin" <?= $user->role === 'admin' ? 'selected' : ''; ?>>Admin</option>
    </select>
    <br>
    <button type="submit">Cập nhật</button>
</form>

<?php include 'app/views/shares/footer.php'; ?>