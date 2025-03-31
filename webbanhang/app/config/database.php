<?php
class Database {
    private $host = "localhost";
    private $db_name = "my_store";
    private $username = "root";
    private $password = ""; // Nên chuyển sang sử dụng biến môi trường
    public $conn;

    public function getConnection() {
        $this->conn = null;
        try {
            $this->conn = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->db_name, $this->username, $this->password);
            $this->conn->exec("set names utf8");
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // Thiết lập chế độ lỗi
        } catch (PDOException $exception) {
            // Ghi log lỗi vào file thay vì in ra
            error_log("Connection error: " . $exception->getMessage());
            echo "Có lỗi xảy ra khi kết nối đến cơ sở dữ liệu.";
        }
        return $this->conn;
    }

    public function closeConnection() {
        $this->conn = null; // Đóng kết nối
    }
}
?>