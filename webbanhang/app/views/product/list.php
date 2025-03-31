<?php include 'app/views/shares/header.php'; ?>

<style>
    body {
        background-color: #f8d3e0 !important; /* Màu hồng nhẹ cho toàn bộ trang */
        margin: 0; /* Đảm bảo không có khoảng trống xung quanh */
        padding: 20px; /* Padding cho khoảng cách bên trong */
    }
    .banner {
        position: relative; /* Để thêm hình ảnh nền */
        color: white; /* Màu chữ mặc định */
        text-align: center; /* Căn giữa chữ */
        padding: 100px 100px 400px 100px; /* Tăng padding cho banner */
        font-size: 36px; /* Kích thước chữ lớn hơn */
        font-weight: bold; /* Làm nổi bật chữ */
        margin-bottom: 20px; /* Khoảng cách dưới banner */
        border-radius: 8px; /* Bo góc cho banner */
        overflow: hidden; /* Để ẩn phần thừa */
    }
    .banner img {
        width: 100%; /* Chiều rộng 100% cho hình ảnh */
        height: 100%; /* Đảm bảo hình ảnh không bị biến dạng */
        position: absolute; /* Đặt hình ảnh ở vị trí tuyệt đối */
        top: 0;
        left: 0;
        z-index: 0; /* Đặt hình nền phía dưới chữ */
        object-fit: cover;
        opacity: 0.7; /* Độ mờ để chữ nổi bật hơn */
    }
    .product-list {
        display: flex; /* Sử dụng Flexbox */
        flex-wrap: wrap; /* Cho phép các sản phẩm xuống hàng khi không đủ chỗ */
        gap: 16px; /* Khoảng cách giữa các sản phẩm */
    }
    .product-item {
        background-color: #fff; /* Nền trắng cho từng sản phẩm */
        border: 1px solid #e1e1e1;
        border-radius: 8px;
        padding: 10px; /* Padding cho sản phẩm */
        flex: 1 1 calc(20% - 16px); /* Giảm kích thước cho mỗi sản phẩm (5 sản phẩm trên 1 hàng) */
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        text-align: center; /* Căn giữa nội dung */
        height: auto; /* Để chiều cao tự động điều chỉnh */
        cursor: pointer; /* Thay đổi con trỏ khi hover */
    }
    .short-description {
        color: #666; /* Màu chữ cho mô tả ngắn */
        font-size: 15px; /* Kích thước chữ cho mô tả ngắn */
        margin: 8px 0; /* Khoảng cách giữa mô tả ngắn và các phần khác */
    }
    .search-bar {
        display: flex;
        align-items: center; /* Căn giữa các phần tử */
        margin-bottom: 20px; /* Khoảng cách giữa thanh tìm kiếm và danh sách sản phẩm */
    }
    .search-bar input {
        flex: 0 0 80%; /* Chiều rộng của thanh tìm kiếm */
        padding: 5px; /* Padding cho input */
    }
    .search-button {
        background-color: #007BFF; /* Màu xanh nước biển */
        color: white; /* Màu chữ trắng */
        border: none; /* Không có đường viền */
        padding: 5px 15px; /* Khoảng cách bên trong */
        border-radius: 5px; /* Bo góc */
        cursor: pointer; /* Hiển thị con trỏ chuột khi di chuyển qua */
    }
    .search-button:hover {
        background-color: #0056b3; /* Màu khi hover */
    }
</style>

<!-- Phần banner -->
<div class="banner">
    <img src="/webbanhang/images/Anh1.png" alt="Banner"> <!-- Chèn đường dẫn đến ảnh banner -->
</div>

<!-- Giỏ hàng -->
<h1>Giỏ hàng</h1>

<?php if (!empty($_SESSION['cart'])): ?>
    <?php foreach ($_SESSION['cart'] as $id => $item): ?>
        <div class="cart-item">
            <h2><?= htmlspecialchars($item['name'], ENT_QUOTES, 'UTF-8'); ?></h2>
            <img src="/webbanhang/<?= htmlspecialchars($item['image'], ENT_QUOTES, 'UTF-8'); ?>" alt="Product Image" style="max-width: 100px;">
            <p><strong>Giá:</strong> <?= htmlspecialchars($item['price'], ENT_QUOTES, 'UTF-8'); ?> VND</p>
            <p><strong>Số lượng:</strong> <?= htmlspecialchars($item['quantity'], ENT_QUOTES, 'UTF-8'); ?></p>
        </div>
    <?php endforeach; ?>
<?php else: ?>
    <p>Giỏ hàng trống.</p>
<?php endif; ?>

<h1>Danh sách sản phẩm</h1>

<!-- Hiển thị nút "Thêm sản phẩm" nếu người dùng là admin -->
<?php

if (isset($_SESSION['user']) && $_SESSION['user']['role'] === 'admin'): ?>
    <a href="/webbanhang/index.php?controller=product&action=add" class="btn btn-success" style="margin-bottom: 20px;">Thêm sản phẩm</a>
<?php endif; ?>

<!-- Thanh tìm kiếm -->
<form class="search-bar" action="/webbanhang/Product/search" method="get">
    <input type="text" placeholder="Tìm kiếm sản phẩm" name="query" required>
    <button class="search-button" type="submit">Tìm Kiếm</button>
</form>

<div class="product-list">
    <?php if (!empty($products)): ?>
        <?php foreach ($products as $product): ?>
            <div class="product-item">
                <img src="/webbanhang/<?php echo htmlspecialchars($product->image, ENT_QUOTES, 'UTF-8'); ?>" alt="Product Image" style="max-width: 100px;">
                <h2 class="short-description">
                    <a href="/webbanhang/Product/show/<?php echo htmlspecialchars($product->id, ENT_QUOTES, 'UTF-8'); ?>">
                        <?php echo htmlspecialchars($product->name, ENT_QUOTES, 'UTF-8'); ?>
                    </a>
                </h2>
                <p class="short-description">
                    <?php echo htmlspecialchars(substr($product->description, 0, 30) . '...', ENT_QUOTES, 'UTF-8'); ?>
                </p>
                <a href="/webbanhang/Product/edit/<?php echo htmlspecialchars($product->id, ENT_QUOTES, 'UTF-8'); ?>" class="btn btn-warning">Sửa</a>
                <a href="/webbanhang/Product/delete/<?php echo htmlspecialchars($product->id, ENT_QUOTES, 'UTF-8'); ?>" class="btn btn-danger" onclick="return confirm('Bạn có chắc chắn muốn xóa sản phẩm này?');">Xóa</a>
                <a href="/webbanhang/Product/addToCart/<?php echo htmlspecialchars($product->id, ENT_QUOTES, 'UTF-8'); ?>" class="btn btn-primary">Thêm vào giỏ hàng</a>
            </div>
        <?php endforeach; ?>
    <?php else: ?>
        <p>Không tìm thấy sản phẩm nào.</p>
    <?php endif; ?>
</div>

<?php include 'app/views/shares/footer.php'; ?>