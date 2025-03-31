<?php
session_start();
require_once 'app/config/database.php';
require_once 'app/helpers/SessionHelper.php';

// Lấy URL
$url = $_GET['url'] ?? '';
$url = rtrim($url, '/');
$url = filter_var($url, FILTER_SANITIZE_URL);
$url = explode('/', $url);

// Xác định controller
$controllerName = isset($url[0]) && $url[0] != '' ? ucfirst(strtolower($url[0])) . 'Controller' : 'ProductController';

// Xác định action
$action = isset($url[1]) && $url[1] != '' ? $url[1] : 'index';

// Kiểm tra file controller
$controllerFile = 'app/controllers/' . $controllerName . '.php';
if (!file_exists($controllerFile)) {
    die("Controller not found: $controllerName");
}

require_once $controllerFile;

// Kiểm tra class controller
if (!class_exists($controllerName)) {
    die("Controller class not found: $controllerName");
}

$controller = new $controllerName();

// Kiểm tra action
if (!method_exists($controller, $action)) {
    die("Action not found: $action");
}

// Gọi action với các tham số còn lại
$params = array_slice($url, 2);
call_user_func_array([$controller, $action], $params);
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tìm kiếm sản phẩm</title>
    <style>
        .search-bar {
            display: flex;
            align-items: center;
            margin: 20px 0;
        }

        .search-bar input {
            margin-right: 10px;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        .search-button {
            background-color: #007BFF;
            color: white;
            border: none;
            padding: 10px 15px;
            border-radius: 5px;
            cursor: pointer;
        }

        .search-button:hover {
            background-color: #0056b3;
        }
    </style>
</head>

</html>