<?php 

include 'app/views/shares/header.php'; 

$totalPrice = 0; // Khởi tạo tổng tiền

if (!empty($_SESSION['cart'])) {
    foreach ($_SESSION['cart'] as $id => $item) {
        $itemTotal = $item['price'] * $item['quantity']; // Tính tổng tiền của từng sản phẩm
        $totalPrice += $itemTotal; // Cộng vào tổng tiền giỏ hàng
    }
}
?>

<style>
    body {
        background-color: #f8d3e0 !important; /* Màu hồng nhạt cho toàn bộ trang */
    }
    .button-group {
        display: flex; /* Sử dụng flexbox để tạo hàng ngang */
        gap: 10px; /* Khoảng cách giữa các nút */
    }
</style>

<h1>Giỏ hàng</h1>

<?php if (!empty($_SESSION['cart'])): ?>
    <form action="/webbanhang/Product/updateCart" method="POST">
        <ul class="list-group">
            <?php foreach ($_SESSION['cart'] as $id => $item): 
                $itemTotal = $item['price'] * $item['quantity']; // Tính tổng cho từng sản phẩm
            ?>
                <li class="list-group-item">
                    <h2><?= htmlspecialchars($item['name'], ENT_QUOTES, 'UTF-8'); ?></h2>
                    
                    <?php if ($item['image']): ?>
                        <img src="/webbanhang/<?= htmlspecialchars($item['image'], ENT_QUOTES, 'UTF-8'); ?>" alt="Product Image" style="max-width: 100px;">
                    <?php endif; ?>

                    <p><strong>Giá:</strong> <?= number_format($item['price'], 0, ',', '.'); ?> VND</p>

                    <p>
                        <strong>Số lượng:</strong>
                        <input type="number" name="quantity[<?= $id; ?>]" value="<?= htmlspecialchars($item['quantity'], ENT_QUOTES, 'UTF-8'); ?>" min="1">
                    </p>
                    <p><strong>Tổng:</strong> <?= number_format($itemTotal, 0, ',', '.'); ?> VND</p>
                    <!-- Nút xóa sản phẩm -->
                    <a href="/webbanhang/Product/removeFromCart/<?= $id; ?>" class="btn btn-danger">Xóa</a>
                </li>
            <?php endforeach; ?>
        </ul>
        
        <!-- Hiển thị tổng tiền của giỏ hàng -->
        <h3 class="mt-3">🛒 Tổng tiền: <strong><?= number_format($totalPrice, 0, ',', '.'); ?> VND</strong></h3>

        <!-- Nhóm các nút thành hàng ngang -->
        <div class="button-group mt-3">
            <button type="submit" class="btn btn-primary">Cập nhật giỏ hàng</button>
            <a href="/webbanhang/Product" class="btn btn-primary">Tiếp tục mua sắm</a>
            <a href="/webbanhang/Product/checkout" class="btn btn-primary">Thanh Toán</a>
        </div>
    </form>
<?php else: ?>
    <p>Giỏ hàng của bạn đang trống.</p>
    <a href="/webbanhang/Product" class="btn btn-primary mt-2">Tiếp tục mua sắm</a>
<?php endif; ?>

<?php include 'app/views/shares/footer.php'; ?>