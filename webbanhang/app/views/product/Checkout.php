<?php include 'app/views/shares/header.php'; ?>

<style>
    body {
        background-color: #f8d3e0 !important; /* Màu hồng nhạt cho toàn bộ trang */
        margin: 0; /* Đảm bảo không có khoảng trống xung quanh */
        padding: 20px; /* Padding cho khoảng cách bên trong */
    }
    .button-group {
        display: flex; /* Sử dụng flexbox để tạo hàng ngang */
        gap: 10px; /* Khoảng cách giữa các nút */
        margin-top: 20px; /* Khoảng cách trên cho nhóm nút */
    }
</style>

<h1>Thanh toán</h1>

<form method="POST" action="/webbanhang/Product/processCheckout">
    <div class="form-group">
        <label for="name">Họ tên:</label>
        <input type="text" id="name" name="name" class="form-control" required>
    </div>
    <div class="form-group">
        <label for="phone">Số điện thoại:</label>
        <input type="text" id="phone" name="phone" class="form-control" required>
    </div>
    <div class="form-group">
        <label for="address">Địa chỉ:</label>
        <textarea id="address" name="address" class="form-control" required></textarea>
    </div>
    <button type="submit" class="btn btn-primary">Thanh toán</button>
</form>

<!-- Nhóm các nút thành hàng ngang -->
<div class="button-group">
    <a href="/webbanhang/Product/cart" class="btn btn-primary">Quay lại giỏ hàng</a>
</div>

<?php include 'app/views/shares/footer.php'; ?>