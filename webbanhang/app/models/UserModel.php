<?php
class UserModel {
    private $db;

    public function __construct() {
        $this->db = (new Database())->getConnection();
    }

    public function getAllUsers() {
        $query = "SELECT * FROM account"; // Thay đổi tên bảng thành 'account'
        $stmt = $this->db->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }

    public function getUserById($id) {
        $query = "SELECT * FROM account WHERE id = :id"; // Thay đổi tên bảng thành 'account'
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_OBJ);
    }

    public function updateUser($id, $username, $role) {
        $query = "UPDATE account SET username = :username, role = :role WHERE id = :id"; // Thay đổi tên bảng thành 'account'
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':username', $username);
        $stmt->bindParam(':role', $role);
        $stmt->bindParam(':id', $id);
        return $stmt->execute();
    }

    public function deleteUser($id) {
        $query = "DELETE FROM account WHERE id = :id"; // Thay đổi tên bảng thành 'account'
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':id', $id);
        return $stmt->execute();
    }

    
public function getUserByUsernameAndPassword($username, $password) {
    $query = "SELECT * FROM account WHERE username = :username";
    $stmt = $this->db->prepare($query);
    $stmt->bindParam(':username', $username);
    $stmt->execute();

    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    // Kiểm tra mật khẩu
    if ($user && password_verify($password, $user['password'])) {
        return $user;
    }

    return false;
}

    
  
    public function getUserByUsername($username) {
        $query = "SELECT * FROM account WHERE username = :username"; // Thay đổi tên bảng thành 'account'
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':username', $username);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_OBJ);
    }
}
?>