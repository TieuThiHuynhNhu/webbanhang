<?php include 'app/views/shares/header.php'; ?>

<h1>Kết quả tìm kiếm</h1>

<?php if (!empty($products)): ?>
    <div class="product-list">
        <?php foreach ($products as $product): ?>
            <div class="product-item">
                <img src="/webbanhang/<?php echo htmlspecialchars($product->image, ENT_QUOTES, 'UTF-8'); ?>" alt="Product Image" style="max-width: 100px;">
                <h2>
                    <a href="/webbanhang/index.php?url=product/show/<?php echo htmlspecialchars($product->id, ENT_QUOTES, 'UTF-8'); ?>">
                        <?php echo htmlspecialchars($product->name, ENT_QUOTES, 'UTF-8'); ?>
                    </a>
                </h2>
                <p><?php echo htmlspecialchars(substr($product->description, 0, 50) . '...', ENT_QUOTES, 'UTF-8'); ?></p>
                <p>Giá: <?php echo htmlspecialchars($product->price, ENT_QUOTES, 'UTF-8'); ?> VND</p>
            </div>
        <?php endforeach; ?>
    </div>
<?php else: ?>
    <p>Không tìm thấy sản phẩm nào phù hợp với từ khóa.</p>
<?php endif; ?>

<a href="/webbanhang/index.php?url=product/list" class="btn btn-primary">Quay lại danh sách sản phẩm</a>

<?php include 'app/views/shares/footer.php'; ?>