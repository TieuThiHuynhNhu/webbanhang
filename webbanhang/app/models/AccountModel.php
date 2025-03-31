<?php
class AccountModel
{
    private $conn;
    private $table_name = "account";

    public function __construct($db)
    {
        $this->conn = $db;
    }

    public function getAccountByUsername($username)
    {
        $query = "SELECT * FROM " . $this->table_name . " WHERE username = :username";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':username', $username, PDO::PARAM_STR);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_OBJ);
        return $result;
    }
   
    public function getAllUsers() {
        $query = "SELECT id, username, fullname, role FROM account"; // Thay đổi tên bảng nếu cần
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_OBJ);
        // Debug dữ liệu
    echo '<pre>';
    print_r($users);
    echo '</pre>';
    exit;

    return $users;
    }
 
public function deleteUserById($id) {
    $query = "DELETE FROM account WHERE id = :id"; // Thay đổi tên bảng nếu cần
    $stmt = $this->conn->prepare($query);
    $stmt->bindParam(':id', $id);
    return $stmt->execute();
}
public function getUserById($id) {
    $query = "SELECT * FROM account WHERE id = :id";
    $stmt = $this->conn->prepare($query);
    $stmt->bindParam(':id', $id);
    $stmt->execute();
    return $stmt->fetch(PDO::FETCH_OBJ);
}

public function editUser($id) {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $username = $_POST['username'] ?? '';
        $fullname = $_POST['fullname'] ?? '';
        $role = $_POST['role'] ?? '';

        $result = $this->updateUser($id, $username, $fullname, $role);

        if ($result) {
            header('Location: /webbanhang/index.php?url=account/manageUsers');
            exit;
        } else {
            echo "Đã xảy ra lỗi khi cập nhật tài khoản.";
        }
    }

    // Lấy thông tin user hiện tại
    $user = $this->getUserById($id);
    include_once 'app/views/account/editUser.php';
}


public function updateUser($id, $username, $fullname, $role) {
    $query = "UPDATE account SET username = :username, fullname = :fullname, role = :role WHERE id = :id";
    $stmt = $this->conn->prepare($query);
    $stmt->bindParam(':username', $username);
    $stmt->bindParam(':fullname', $fullname);
    $stmt->bindParam(':role', $role);
    $stmt->bindParam(':id', $id);
    return $stmt->execute();
}
    public function getUserByUsername($username) {
        $query = "SELECT * FROM account WHERE username = :username";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':username', $username);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_OBJ);
    }
    public function save($username, $fullname, $password, $role = "user")
    {
        if (empty($fullname)) {
            throw new Exception("Fullname cannot be empty");
        }

        $query = "INSERT INTO " . $this->table_name . " (username, fullname, password, role)
                  VALUES (:username, :fullname, :password, :role)";
        
        $stmt = $this->conn->prepare($query);
        
        // Làm sạch dữ liệu  
        $username = htmlspecialchars(strip_tags($username));
        $fullname = htmlspecialchars(strip_tags($fullname));

        // Mã hóa mật khẩu
        $hashedPassword = password_hash($password, PASSWORD_BCRYPT);
        
        // Gán dữ liệu vào câu lệnh
        $stmt->bindParam(':username', $username);
        $stmt->bindParam(':fullname', $fullname);
        $stmt->bindParam(':password', $hashedPassword);
        $stmt->bindParam(':role', $role);
        
        // Thực thi câu lệnh
        return $stmt->execute();
    }
}