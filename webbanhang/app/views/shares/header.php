<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản lý sản phẩm</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .navbar {
            display: flex;
            justify-content: center;
            align-items: center;
            width: 100%;
        }

        .navbar-brand {
            font-weight: bold;
            font-size: 24px;
            margin-right: auto;
        }

        .navbar-nav {
            display: flex;
            justify-content: center;
            flex-grow: 1;
        }

        .nav-item {
            margin: 0 15px;
        }

        .nav-link {
            padding: 10px 15px;
            white-space: nowrap;
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#">Quản lý sản phẩm</a>
        <div class="collapse navbar-collapse">
            <ul class="navbar-nav ml-auto"> <!-- Đẩy các mục về bên phải -->
                <li class="nav-item">
                    <a class="nav-link" href="/webbanhang/Product/">Danh sách sản phẩm</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/webbanhang/Product/Cart">Giỏ hàng</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/webbanhang/Product/add">Thêm sản phẩm</a>
                </li>
                <li class="nav-item d-flex align-items-center">
                <?php if (isset($_SESSION['user']['username'])): ?>
    <span class='nav-link font-weight-bold text-primary'>
        <?= htmlspecialchars($_SESSION['user']['username'], ENT_QUOTES, 'UTF-8'); ?>
    </span>
    <a href="/webbanhang/app/views/account/logout.php" class="text-danger">Logout</a>
<?php else: ?>
    <a class='nav-link' href='/webbanhang/account/login'>Login</a>
<?php endif; ?>
<?php if (isset($_SESSION['user']['role']) && $_SESSION['user']['role'] === 'admin'): ?>
    <li class="nav-item">
        <a class="nav-link" href="/webbanhang/index.php?url=account/manageUsers">Quản lý tài khoản</a>
    </li>
<?php endif; ?>
                </li>
            </ul>
        </div>
    </nav>
    <nav>
    <ul>
        
        <?php if (isset($_SESSION['role']) && $_SESSION['role'] === 'admin'): ?>
            <li class="nav-item">
                <a class="nav-link" href="/webbanhang/Product/manage">Quản lý sản phẩm</a>
            </li>
        <?php endif; ?>
       
    </ul>
</nav>
    <div class="container mt-4">
        <!-- Nội dung danh sách sản phẩm sẽ được hiển thị ở đây -->
    </div>
</body>

</html>