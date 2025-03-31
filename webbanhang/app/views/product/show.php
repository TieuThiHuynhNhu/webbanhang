<?php include 'app/views/shares/header.php'; ?>
<style>
    body {
        background-color: #f8d3e0 !important; /* Màu hồng nhẹ cho toàn bộ trang */
        margin: 0; /* Đảm bảo không có khoảng trống xung quanh */
        padding: 20px; /* Padding cho khoảng cách bên trong */
    }
    .product-detail {
        background-color: #fff; /* Nền trắng cho chi tiết sản phẩm */
        border: 1px solid #e1e1e1;
        border-radius: 8px;
        padding: 20px; /* Padding cho chi tiết sản phẩm */
        max-width: 600px; /* Chiều rộng tối đa cho chi tiết sản phẩm */
        margin: 0 auto; /* Căn giữa chi tiết sản phẩm */
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        display: flex; /* Sử dụng Flexbox để sắp xếp */
        flex-direction: row; /* Sắp xếp theo chiều ngang */
        align-items: center; /* Căn giữa theo chiều dọc */
    }
    .product-image {
        max-width: 150px; /* Kích thước tối đa cho hình ảnh */
        margin-right: 20px; /* Khoảng cách giữa hình ảnh và nội dung */
    }
    .product-info {
        flex: 1; /* Chiếm toàn bộ chiều rộng còn lại */
    }
</style>

<h1>Chi tiết sản phẩm</h1>

<?php
session_start(); // Bắt đầu session nếu chưa có
$userRole = $_SESSION['user']['role'] ?? 'guest'; // Lấy quyền từ session, mặc định là 'guest'
?>

<?php if ($product): ?>
    <div class="product-detail">
        <?php if ($product->image): ?>
            <img src="/webbanhang/<?= htmlspecialchars($product->image ?? '', ENT_QUOTES, 'UTF-8'); ?>" 
                 alt="<?= htmlspecialchars($product->name ?? 'Hình ảnh sản phẩm', ENT_QUOTES, 'UTF-8'); ?> Image" 
                 class="product-image">
        <?php endif; ?>
        
        <div class="product-info">
            <h2><?= htmlspecialchars($product->name ?? 'Chưa có tên sản phẩm', ENT_QUOTES, 'UTF-8'); ?></h2>
            <p><strong>Mô tả:</strong> <?= htmlspecialchars($product->description ?? 'Chưa có mô tả', ENT_QUOTES, 'UTF-8'); ?></p>
            <p><strong>Giá:</strong> <?= htmlspecialchars($product->price ?? 'Chưa có giá', ENT_QUOTES, 'UTF-8'); ?> VND</p>
            <p><strong>Danh mục:</strong> Mỹ phẩm</p> <!-- Hiển thị luôn là "Mỹ phẩm" -->

            <form action="/webbanhang/Product/addToCart/<?= htmlspecialchars($product->id ?? '', ENT_QUOTES, 'UTF-8'); ?>" method="POST">
                <label for="quantity">Số lượng:</label>
                <input type="number" id="quantity" name="quantity" min="1" value="1" style="width: 60px;">
                <button type="submit" class="btn btn-primary">Thêm vào giỏ hàng</button>
            </form>

            <div>
                <a href="/webbanhang/Product/edit/<?= htmlspecialchars($product->id ?? '', ENT_QUOTES, 'UTF-8'); ?>" class="btn btn-warning">Sửa</a>
                <a href="/webbanhang/Product/delete/<?= htmlspecialchars($product->id ?? '', ENT_QUOTES, 'UTF-8'); ?>" 
                   class="btn btn-danger" 
                   onclick="return confirm('Bạn có chắc chắn muốn xóa sản phẩm này?');">Xóa</a>
            </div>
        </div>
    </div>
<?php else: ?>
    <p>Không tìm thấy sản phẩm.</p>
<?php endif; ?>

<!-- Chỉ hiển thị nút "Thêm sản phẩm" nếu người dùng là admin -->
<?php if ($userRole === 'admin'): ?>
    <a href="/webbanhang/Product/add" class="btn btn-success">Thêm sản phẩm</a>
<?php endif; ?>

<?php include 'app/views/shares/footer.php'; ?>