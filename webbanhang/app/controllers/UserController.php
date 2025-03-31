<?php
require_once('app/config/database.php');
require_once('app/models/UserModel.php');

class UserController {
    private $userModel;
    private $db;

    public function __construct() {
        $this->db = (new Database())->getConnection();
        $this->userModel = new UserModel($this->db); // Khởi tạo userModel
    }

    public function manage() {
        $this->checkAdmin(); // Kiểm tra quyền admin
        // Lấy danh sách người dùng từ model
        $users = $this->userModel->getAllUsers();
        include_once 'app/views/user/manage_users.php';
    }

    public function edit($id) {
        $this->checkAdmin(); // Kiểm tra quyền admin
        $user = $this->userModel->getUserById($id);
        if ($user) {
            include 'app/views/user/edit.php'; // Hiển thị form chỉnh sửa người dùng
        } else {
            echo "Không tìm thấy người dùng.";
        }
    }

    public function update() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $id = $_POST['id'];
            $username = $_POST['username'];
            $role = $_POST['role'];

            $result = $this->userModel->updateUser($id, $username, $role);
            if ($result) {
                header('Location: /webbanhang/User/manage');
            } else {
                echo "Đã xảy ra lỗi khi cập nhật thông tin người dùng.";
            }
        }
    }

    public function delete($id) {
        $this->checkAdmin(); // Kiểm tra quyền admin
        if ($this->userModel->deleteUser($id)) {
            header('Location: /webbanhang/User/manage');
        } else {
            echo "Đã xảy ra lỗi khi xóa người dùng.";
        }
    }

    private function checkAdmin() {
        if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'admin') {
            header('Location: /webbanhang/product'); // Chuyển hướng nếu không phải admin
            exit;
        }
    }
}

// Tạo kết nối cơ sở dữ liệu và khởi tạo UserModel
$database = new Database();
$db = $database->getConnection(); // Lấy kết nối
$userModel = new UserModel($db); // Khởi tạo UserModel với kết nối

// Bạn có thể gọi các phương thức của UserController tại đây nếu cần
?>