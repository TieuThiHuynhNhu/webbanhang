<?php
require_once('app/config/database.php');
require_once('app/models/ProductModel.php');
require_once('app/models/CategoryModel.php');

class ProductController
{
    private $productModel;
    private $db;

    public function __construct()
    {
        $this->db = (new Database())->getConnection();
        $this->productModel = new ProductModel($this->db);
    }

    public function index()
    {
        $products = $this->productModel->getProducts();
        include 'app/views/product/list.php';
    }

    public function show($id)
    {
        $product = $this->productModel->getProductById($id);
        if ($product) {
            include 'app/views/product/show.php';
        } else {
            echo "Không thấy sản phẩm.";
        }
    }

    public function add() {
        $this->checkAdmin(); // Kiểm tra quyền admin
        include 'app/views/product/add.php'; // Hiển thị form thêm sản phẩm
    }

    public function save() {
        $this->checkAdmin(); // Kiểm tra quyền admin

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $name = $_POST['name'] ?? '';
            $description = $_POST['description'] ?? '';
            $price = $_POST['price'] ?? 0;
            $category_id = $_POST['category_id'] ?? 0;

            // Xử lý upload hình ảnh
            $targetFile = $this->uploadImage($_FILES['image']);

            // Lưu sản phẩm vào cơ sở dữ liệu
            $this->productModel->addProduct($name, $description, $price, $category_id, $targetFile);

            // Chuyển hướng về danh sách sản phẩm
            header('Location: /webbanhang/index.php?url=product/list');
            exit;
        }

        // Nếu không phải POST, chuyển hướng về form thêm sản phẩm
        header('Location: /webbanhang/index.php?url=product/add');
    }

    public function edit($id)
    {
        $this->checkAdmin(); // Kiểm tra quyền admin
        $product = $this->productModel->getProductById($id);
        $categories = (new CategoryModel($this->db))->getCategories();
        if ($product) {
            include 'app/views/product/edit.php';
        } else {
            echo "Không thấy sản phẩm.";
        }
    }

    public function update()
    {
        $this->checkAdmin(); // Kiểm tra quyền admin

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $id = $_POST['id'];
            $name = $_POST['name'];
            $description = $_POST['description'];
            $price = $_POST['price'];
            $category_id = $_POST['category_id'];

            if (isset($_FILES['image']) && $_FILES['image']['error'] == 0) {
                $image = $this->uploadImage($_FILES['image']);
            } else {
                $image = $_POST['existing_image'];
            }

            $edit = $this->productModel->updateProduct($id, $name, $description, $price, $category_id, $image);
            if ($edit) {
                header('Location: /webbanhang/index.php?url=product/list');
            } else {
                echo "Đã xảy ra lỗi khi lưu sản phẩm.";
            }
        }
    }

    public function delete($id)
    {
        $this->checkAdmin(); // Kiểm tra quyền admin

        if ($this->productModel->deleteProduct($id)) {
            header('Location: /webbanhang/index.php?url=product/list');
        } else {
            echo "Đã xảy ra lỗi khi xóa sản phẩm.";
        }
    }

    private function checkAdmin() {
       
        if (!isset($_SESSION['user']) || $_SESSION['user']['role'] !== 'admin') {
            header('Location: /webbanhang/index.php?url=login'); // Chuyển hướng nếu không phải admin
            exit;
        }
    }

    private function uploadImage($file)
    {
        // Logic upload hình ảnh
        $target_dir = "uploads/";
        if (!is_dir($target_dir)) {
            mkdir($target_dir, 0777, true);
        }
        $target_file = $target_dir . basename($file["name"]);
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
        
        // Kiểm tra xem file có phải là hình ảnh không
        $check = getimagesize($file["tmp_name"]);
        if ($check === false) {
            throw new Exception("File không phải là hình ảnh.");
        }
        
        // Kiểm tra kích thước file (10 MB = 10 * 1024 * 1024 bytes)
        if ($file["size"] > 10 * 1024 * 1024) {
            throw new Exception("Hình ảnh có kích thước quá lớn.");
        }
        
        // Chỉ cho phép một số định dạng hình ảnh nhất định
        if (!in_array($imageFileType, ['jpg', 'jpeg', 'png', 'gif'])) {
            throw new Exception("Chỉ cho phép các định dạng JPG, JPEG, PNG và GIF.");
        }
        
        // Lưu file
        if (!move_uploaded_file($file["tmp_name"], $target_file)) {
            throw new Exception("Có lỗi xảy ra khi tải lên hình ảnh.");
        }
        
        return $target_file;
    }
    public function list() {
        // Lấy danh sách sản phẩm từ model
        $products = $this->productModel->getProducts();

        // Hiển thị view danh sách sản phẩm
        include 'app/views/product/list.php';
    }
    
public function addToCart($id) {
   

    // Lấy thông tin sản phẩm từ model
    $product = $this->productModel->getProductById($id);

    if (!$product) {
        echo "Sản phẩm không tồn tại.";
        return;
    }

    // Kiểm tra xem giỏ hàng đã tồn tại trong session chưa
    if (!isset($_SESSION['cart'])) {
        $_SESSION['cart'] = [];
    }

    // Kiểm tra xem sản phẩm đã có trong giỏ hàng chưa
    if (isset($_SESSION['cart'][$id])) {
        // Nếu đã có, tăng số lượng
        $_SESSION['cart'][$id]['quantity']++;
    } else {
        // Nếu chưa có, thêm sản phẩm vào giỏ hàng
        $_SESSION['cart'][$id] = [
            'id' => $product->id,
            'name' => $product->name,
            'price' => $product->price,
            'image' => $product->image,
            'quantity' => 1
        ];
    }

    // Chuyển hướng về trang giỏ hàng
    header('Location: /webbanhang/index.php?url=product/cart');
    exit;
}


public function cart() {
   

    // Đảm bảo giỏ hàng luôn là một mảng
    if (!isset($_SESSION['cart'])) {
        $_SESSION['cart'] = [];
    }

    // Lấy giỏ hàng từ session
    $cart = $_SESSION['cart'];

    // Debug giỏ hàng (nếu cần)
    foreach ($cart as $item) {
        echo "Tên sản phẩm: " . htmlspecialchars($item['name'], ENT_QUOTES, 'UTF-8') . "\n";
        echo "Giá: " . htmlspecialchars($item['price'], ENT_QUOTES, 'UTF-8') . " VND\n";
        echo "Hình ảnh: " . htmlspecialchars($item['image'], ENT_QUOTES, 'UTF-8') . "\n";
        echo "Số lượng: " . htmlspecialchars($item['quantity'], ENT_QUOTES, 'UTF-8') . "\n\n";
    }

    // Hiển thị view giỏ hàng
    include 'app/views/product/cart.php';
}


public function checkout() {


    // Lấy giỏ hàng từ session
    $cart = $_SESSION['cart'] ?? [];

    if (empty($cart)) {
        echo "Giỏ hàng trống. Không thể thanh toán.";
        return;
    }

    // Nếu form được gửi bằng phương thức POST
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $name = $_POST['name'] ?? '';
        $phone = $_POST['phone'] ?? '';
        $address = $_POST['address'] ?? '';

        // Kiểm tra dữ liệu đầu vào
        if (empty($name) || empty($phone) || empty($address)) {
            echo "Vui lòng điền đầy đủ thông tin.";
            return;
        }

        // Tính tổng giá trị đơn hàng
        $totalPrice = 0;
        foreach ($cart as $item) {
            $totalPrice += $item['price'] * $item['quantity'];
        }

        // Lưu thông tin đơn hàng vào bảng `orders`
        $query = "INSERT INTO orders (name, phone, address, total_price) VALUES (:name, :phone, :address, :total_price)";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':phone', $phone);
        $stmt->bindParam(':address', $address);
        $stmt->bindParam(':total_price', $totalPrice);
        $stmt->execute();
        $orderId = $this->db->lastInsertId();

        // Lưu thông tin sản phẩm trong đơn hàng vào bảng `order_items`
        foreach ($cart as $item) {
            $query = "INSERT INTO order_items (order_id, product_id, quantity, price) VALUES (:order_id, :product_id, :quantity, :price)";
            $stmt = $this->db->prepare($query);
            $stmt->bindParam(':order_id', $orderId);
            $stmt->bindParam(':product_id', $item['id']);
            $stmt->bindParam(':quantity', $item['quantity']);
            $stmt->bindParam(':price', $item['price']);
            $stmt->execute();
        }

        // Xóa giỏ hàng sau khi thanh toán thành công
        unset($_SESSION['cart']);

        // Hiển thị thông báo thanh toán thành công
        echo "Thanh toán thành công! Cảm ơn bạn đã mua hàng.";
        return;
    }

    // Hiển thị form thanh toán
    include 'app/views/product/Checkout.php';
}


public function updateCart() {
    

    // Kiểm tra nếu form được gửi bằng phương thức POST
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $quantities = $_POST['quantity'] ?? [];

        // Lặp qua từng sản phẩm trong giỏ hàng
        foreach ($quantities as $id => $quantity) {
            // Kiểm tra xem sản phẩm có trong giỏ hàng không
            if (isset($_SESSION['cart'][$id])) {
                if ((int)$quantity > 0) {
                    // Cập nhật số lượng sản phẩm
                    $_SESSION['cart'][$id]['quantity'] = (int)$quantity;
                } else {
                    // Xóa sản phẩm khỏi giỏ hàng nếu số lượng <= 0
                    unset($_SESSION['cart'][$id]);
                }
            }
        }
    }

    // Chuyển hướng về trang giỏ hàng
    header('Location: /webbanhang/index.php?url=product/cart');
    exit;
}


public function search() {
   

    // Kiểm tra nếu form được gửi bằng phương thức GET
    if ($_SERVER['REQUEST_METHOD'] === 'GET') {
        $query = $_GET['query'] ?? '';

        // Kiểm tra nếu từ khóa tìm kiếm không rỗng
        if (!empty($query)) {
            // Gọi phương thức tìm kiếm từ model
            $products = $this->productModel->searchByName($query);

            // Hiển thị view danh sách sản phẩm tìm kiếm
            include 'app/views/product/search.php';
        } else {
            echo "Vui lòng nhập từ khóa tìm kiếm.";
        }
    }
}


public function processCheckout() {
   

    // Lấy giỏ hàng từ session
    $cart = $_SESSION['cart'] ?? [];

    if (empty($cart)) {
        echo "Giỏ hàng trống. Không thể thanh toán.";
        return;
    }

    // Kiểm tra nếu form được gửi bằng phương thức POST
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $name = $_POST['name'] ?? '';
        $phone = $_POST['phone'] ?? '';
        $address = $_POST['address'] ?? '';

        // Kiểm tra dữ liệu đầu vào
        if (empty($name) || empty($phone) || empty($address)) {
            echo "Vui lòng điền đầy đủ thông tin.";
            return;
        }

        // Tính tổng giá trị đơn hàng
        $totalPrice = 0;
        foreach ($cart as $item) {
            $totalPrice += $item['price'] * $item['quantity'];
        }

        // Lưu thông tin đơn hàng vào bảng `orders`
        $query = "INSERT INTO orders (name, phone, address) VALUES (:name, :phone, :address)";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':phone', $phone);
        $stmt->bindParam(':address', $address);
       
        $stmt->execute();
        $orderId = $this->db->lastInsertId();

        // Lưu thông tin sản phẩm trong đơn hàng vào bảng `order_items`
        foreach ($cart as $item) {
            $query = "INSERT INTO order_details (order_id, product_id, quantity, price) VALUES (:order_id, :product_id, :quantity, :price)";
            $stmt = $this->db->prepare($query);
            $stmt->bindParam(':order_id', $orderId);
            $stmt->bindParam(':product_id', $item['id']);
            $stmt->bindParam(':quantity', $item['quantity']);
            $stmt->bindParam(':price', $item['price']);
            $stmt->execute();
        }

        // Xóa giỏ hàng sau khi thanh toán thành công
        unset($_SESSION['cart']);

        // Chuyển hướng đến trang xác nhận đơn hàng
        include 'app/views/product/orderConfirmation.php';
        return;
    }

    // Nếu không phải phương thức POST, chuyển hướng về trang giỏ hàng
    header('Location: /webbanhang/index.php?url=product/cart');
    exit;
}
    // Các phương thức khác như addToCart, cart, checkout, v.v. không thay đổi
}

// Tạo kết nối cơ sở dữ liệu và gọi phương thức getProducts
$database = new Database();
$db = $database->getConnection(); 
$productModel = new ProductModel($db);
$products = $productModel->getProducts();
?>