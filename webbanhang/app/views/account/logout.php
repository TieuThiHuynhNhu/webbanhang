<?php
session_start(); // Bắt đầu session nếu chưa có

// Xóa thông tin đăng nhập trong session
unset($_SESSION['username']);
unset($_SESSION['role']);
unset($_SESSION['user']); // Nếu bạn lưu thông tin user trong session

// Chuyển hướng về trang chính hoặc trang login
header('Location: /webbanhang/product');
exit;