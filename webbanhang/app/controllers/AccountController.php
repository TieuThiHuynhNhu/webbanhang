<?php
require_once('app/config/database.php');
require_once('app/models/AccountModel.php');
require_once('app/models/UserModel.php');
class AccountController {
    private $accountModel;
    private $db;

   
public function __construct() {
    $this->db = (new Database())->getConnection();
    $this->accountModel = new AccountModel($this->db);
   
}
    public function register() {
        include_once 'app/views/account/register.php';
    }

  
    public function login(): void {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $username = $_POST['username'] ?? '';
            $password = $_POST['password'] ?? '';
    
            // Kiểm tra nếu thông tin không rỗng
            if (empty($username) || empty($password)) {
                // Thông báo lỗi nếu tên đăng nhập hoặc mật khẩu trống
                echo "Tên đăng nhập và mật khẩu không được để trống.";
                return;
            }
    
            // Tìm kiếm người dùng trong cơ sở dữ liệu
            $user = $this->accountModel->getUserByUsername($username);
            
            // Kiểm tra nếu người dùng tồn tại và mật khẩu đúng
            if ($user && password_verify($password, $user->password)) {
                // Lưu thông tin người dùng vào session
                $_SESSION['user'] = [
                    'username' => $user->username,
                    'role' => $user->role // Nếu bạn có trường này
                ];
               
                header('Location: /webbanhang/index.php?url=product/list');
                exit; // Dừng script sau khi chuyển hướng
            } else {
                // Thông báo lỗi nếu đăng nhập không thành công
                echo "Tên đăng nhập hoặc mật khẩu không chính xác.";
            }
        }
    
        // Nếu là GET request, hiển thị form đăng nhập
        include 'app/views/account/login.php';
    }
    public function save() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $username = $_POST['username'] ?? '';
            $fullName = $_POST['fullname'] ?? '';
            $password = $_POST['password'] ?? '';
            $confirmPassword = $_POST['confirmpassword'] ?? '';
            $errors = [];
    
            // Kiểm tra lỗi
            if (empty($username)) {
                $errors['username'] = "Vui lòng nhập username!";
            }
            if (empty($fullName)) {
                $errors['fullname'] = "Vui lòng nhập fullname!";
            }
            if (empty($password)) {
                $errors['password'] = "Vui lòng nhập password!";
            }
            if ($password != $confirmPassword) {
                $errors['confirmPass'] = "Mật khẩu và xác nhận không đúng";
            }
            
            
            // Kiểm tra username đã được đăng ký chưa
            $account = $this->accountModel->getAccountByUsername($username);
            if ($account) {
                $errors['account'] = "Tài khoản này đã có người đăng ký!";
            }
    
            // Nếu có lỗi, hiển thị lại form
            if (count($errors) > 0) {
                include_once 'app/views/account/register.php';
            } else {
                // Không mã hóa mật khẩu ở đây, để AccountModel xử lý
                $result = $this->accountModel->save($username, $fullName, $password);
                if ($result) {
                    header('Location: /webbanhang/account/login');
                    exit;
                } else {
                    $errors['save'] = "Đã có lỗi xảy ra khi lưu tài khoản!";
                    include_once 'app/views/account/register.php';
                }
            }
        }
    }

    
    

   
    public function manageUsers() {
        $this->checkAdmin(); // Kiểm tra quyền admin
    
        // Lấy danh sách tất cả user từ model
        $users = $this->accountModel->getAllUsers();
        
    
        // Hiển thị trang quản lý user
        include_once 'app/views/manage/manage_users.php';
    }
   
   
public function editUser($id) {
    $this->checkAdmin(); // Kiểm tra quyền admin

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $username = $_POST['username'] ?? '';
        $fullname = $_POST['fullname'] ?? '';
        $role = $_POST['role'] ?? '';

        $result = $this->accountModel->updateUser($id, $username, $fullname, $role);

        if ($result) {
            header('Location: /webbanhang/index.php?url=account/manageUsers');
            exit;
        } else {
            echo "Đã xảy ra lỗi khi cập nhật tài khoản.";
        }
    }

    // Lấy thông tin user hiện tại
    $user = $this->accountModel->getUserById($id);
    include_once 'app/views/account/editUser.php';
}
  
public function getUserById($id) {
    $query = "SELECT * FROM account WHERE id = :id"; // Thay đổi tên bảng nếu cần
    $stmt = $this->db->prepare($query);
    $stmt->bindParam(':id', $id);
    $stmt->execute();
    return $stmt->fetch(PDO::FETCH_OBJ);
}
public function deleteUser($id) {
    $this->checkAdmin(); // Kiểm tra quyền admin

    // Xóa user bằng model
    $result = $this->accountModel->deleteUserById($id);

    if ($result) {
        header('Location: /webbanhang/index.php?url=account/manageUsers');
        exit;
    } else {
        echo "Đã xảy ra lỗi khi xóa tài khoản.";
    }
}
        public function checklogin() {
            
            // Kiểm tra nếu form được gửi bằng phương thức POST
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $username = $_POST['username'] ?? '';
                $password = $_POST['password'] ?? '';
    
                // Kiểm tra thông tin đăng nhập (giả sử bạn có model UserModel)
                $userModel = new UserModel();
                $user = $userModel->getUserByUsernameAndPassword($username, $password);
    
                if ($user) {
                    // Lưu thông tin người dùng vào session
                    $_SESSION['user'] = [
                        'id' => $user['id'],
                        'username' => $user['username'],
                        'role' => $user['role'], // admin hoặc user
                    ];
    
                    // Chuyển hướng đến trang danh sách sản phẩm
                    header('Location: /webbanhang/index.php?url=product/list');
                    exit;
                } else {
                    // Hiển thị thông báo lỗi nếu đăng nhập thất bại
                    echo "<p style='color: red;'>Tên đăng nhập hoặc mật khẩu không đúng.</p>";
                }
            }
    
            // Nếu không phải POST, hiển thị lại form đăng nhập
            include 'app/views/account/login.php';
        }
    
    private function isAdmin() {
        // Logic xác định xem người dùng có quyền admin hay không
        // Có thể kiểm tra từ một biến phiên hoặc từ một nguồn khác
        return isset($_SESSION['role']) && $_SESSION['role'] === 'admin';
    }
    
public function checkAdmin() {
    
    if (!isset($_SESSION['user']['role']) || $_SESSION['user']['role'] !== 'admin') {
        header('Location: /webbanhang/product'); // Chuyển hướng nếu không phải admin
        exit;
    }
}
    public function manageProducts() {
        $this->checkAdmin(); // Kiểm tra quyền admin
        // Mã để quản lý sản phẩm
        // Ví dụ: hiển thị danh sách sản phẩm, thêm sản phẩm mới, v.v.
        include_once 'app/views/product/manage.php';
    }
}

