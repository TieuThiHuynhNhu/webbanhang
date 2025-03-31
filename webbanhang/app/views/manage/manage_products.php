<!-- app/views/product/manage_products.php -->
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Quản Lý Sản Phẩm</title>
</head>
<body>
    <h1>Quản Lý Sản Phẩm</h1>
    <a href="/webbanhang/Product/add">Thêm Sản Phẩm</a>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Tên Sản Phẩm</th>
                <th>Giá</th>
                <th>Hành Động</th>
            </tr>
        </thead>
        <tbody>
            <!-- Lặp qua danh sách sản phẩm và hiển thị -->
            <?php foreach ($products as $product): ?>
                <tr>
                    <td><?= $product->id ?></td>
                    <td><?= $product->name ?></td>
                    <td><?= $product->price ?></td>
                    <td>
                        <a href="/webbanhang/Product/edit/<?= $product->id ?>">Sửa</a>
                        <a href="/webbanhang/Product/delete/<?= $product->id ?>">Xóa</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>