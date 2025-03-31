-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               8.4.3 - MySQL Community Server - GPL
-- Server OS:                    Win64
-- HeidiSQL Version:             12.8.0.6908
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Dumping database structure for my_store
CREATE DATABASE IF NOT EXISTS `my_store` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `my_store`;

-- Dumping structure for table my_store.account
CREATE TABLE IF NOT EXISTS `account` (
  `id` int NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('admin','user') DEFAULT 'user',
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table my_store.account: ~4 rows (approximately)
INSERT INTO `account` (`id`, `username`, `fullname`, `password`, `role`) VALUES
	(8, 'user11', 'user11', '$2y$10$PDtswfdpETp/Nn/6cWXJF.R.oc72hwiz8q9mMacX2G3Gu0q4hDVY2', 'user'),
	(9, 'HuynhNhu', 'HuynhNhu', '$2y$10$HSNtxjDfK94rKoyL36fPueg0xUMFov9AO5Ah4AoPkgH0nWt79CnAy', 'admin'),
	(11, 'Nhu', 'Nhu', '$2y$10$jSNvOgOSri9jccKLrxQEHuE1o3nn0vj8sShcDDuicJXeS.pe1U/wi', 'user'),
	(12, 'TieuThiHuynhNhu', 'TieuThiHuynhNhu', '$2y$10$tmRRpsALehlLVaU7YaUyXurdNvs81WpnhxwS8m8sKLOGGvRhH/9.W', 'admin');

-- Dumping structure for table my_store.category
CREATE TABLE IF NOT EXISTS `category` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `description` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=91 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table my_store.category: ~90 rows (approximately)
INSERT INTO `category` (`id`, `name`, `description`) VALUES
	(1, 'Điện thoại', 'Danh mục các loại điện thoại'),
	(2, 'Laptop', 'Danh mục các loại laptop'),
	(3, 'Máy tính bảng', 'Danh mục các loại máy tính bảng'),
	(4, 'Phụ kiện', 'Danh mục phụ kiện điện tử'),
	(5, 'Mỹ Phẩm', 'Danh mục các loại mỹ phẩm '),
	(6, 'Thiết bị âm thanh', 'Danh mục loa, tai nghe, micro'),
	(7, 'Điện thoại', 'Danh mục các loại điện thoại'),
	(8, 'Laptop', 'Danh mục các loại laptop'),
	(9, 'Máy tính bảng', 'Danh mục các loại máy tính bảng'),
	(10, 'Phụ kiện', 'Danh mục phụ kiện điện tử'),
	(11, 'Mỹ Phẩm', 'Danh mục các loại mỹ phẩm '),
	(12, 'Thiết bị âm thanh', 'Danh mục loa, tai nghe, micro'),
	(13, 'Điện thoại', 'Danh mục các loại điện thoại'),
	(14, 'Laptop', 'Danh mục các loại laptop'),
	(15, 'Máy tính bảng', 'Danh mục các loại máy tính bảng'),
	(16, 'Phụ kiện', 'Danh mục phụ kiện điện tử'),
	(17, 'Mỹ Phẩm', 'Danh mục các loại mỹ phẩm '),
	(18, 'Thiết bị âm thanh', 'Danh mục loa, tai nghe, micro'),
	(19, 'Điện thoại', 'Danh mục các loại điện thoại'),
	(20, 'Laptop', 'Danh mục các loại laptop'),
	(21, 'Máy tính bảng', 'Danh mục các loại máy tính bảng'),
	(22, 'Phụ kiện', 'Danh mục phụ kiện điện tử'),
	(23, 'Mỹ Phẩm', 'Danh mục các loại mỹ phẩm '),
	(24, 'Thiết bị âm thanh', 'Danh mục loa, tai nghe, micro'),
	(25, 'Điện thoại', 'Danh mục các loại điện thoại'),
	(26, 'Laptop', 'Danh mục các loại laptop'),
	(27, 'Máy tính bảng', 'Danh mục các loại máy tính bảng'),
	(28, 'Phụ kiện', 'Danh mục phụ kiện điện tử'),
	(29, 'Mỹ Phẩm', 'Danh mục các loại mỹ phẩm '),
	(30, 'Thiết bị âm thanh', 'Danh mục loa, tai nghe, micro'),
	(31, 'Điện thoại', 'Danh mục các loại điện thoại'),
	(32, 'Laptop', 'Danh mục các loại laptop'),
	(33, 'Máy tính bảng', 'Danh mục các loại máy tính bảng'),
	(34, 'Phụ kiện', 'Danh mục phụ kiện điện tử'),
	(35, 'Mỹ Phẩm', 'Danh mục các loại mỹ phẩm '),
	(36, 'Thiết bị âm thanh', 'Danh mục loa, tai nghe, micro'),
	(37, 'Điện thoại', 'Danh mục các loại điện thoại'),
	(38, 'Laptop', 'Danh mục các loại laptop'),
	(39, 'Máy tính bảng', 'Danh mục các loại máy tính bảng'),
	(40, 'Phụ kiện', 'Danh mục phụ kiện điện tử'),
	(41, 'Mỹ Phẩm', 'Danh mục các loại mỹ phẩm '),
	(42, 'Thiết bị âm thanh', 'Danh mục loa, tai nghe, micro'),
	(43, 'Điện thoại', 'Danh mục các loại điện thoại'),
	(44, 'Laptop', 'Danh mục các loại laptop'),
	(45, 'Máy tính bảng', 'Danh mục các loại máy tính bảng'),
	(46, 'Phụ kiện', 'Danh mục phụ kiện điện tử'),
	(47, 'Mỹ Phẩm', 'Danh mục các loại mỹ phẩm '),
	(48, 'Thiết bị âm thanh', 'Danh mục loa, tai nghe, micro'),
	(49, 'Điện thoại', 'Danh mục các loại điện thoại'),
	(50, 'Laptop', 'Danh mục các loại laptop'),
	(51, 'Máy tính bảng', 'Danh mục các loại máy tính bảng'),
	(52, 'Phụ kiện', 'Danh mục phụ kiện điện tử'),
	(53, 'Mỹ Phẩm', 'Danh mục các loại mỹ phẩm '),
	(54, 'Thiết bị âm thanh', 'Danh mục loa, tai nghe, micro'),
	(55, 'Điện thoại', 'Danh mục các loại điện thoại'),
	(56, 'Laptop', 'Danh mục các loại laptop'),
	(57, 'Máy tính bảng', 'Danh mục các loại máy tính bảng'),
	(58, 'Phụ kiện', 'Danh mục phụ kiện điện tử'),
	(59, 'Mỹ Phẩm', 'Danh mục các loại mỹ phẩm '),
	(60, 'Thiết bị âm thanh', 'Danh mục loa, tai nghe, micro'),
	(61, 'Điện thoại', 'Danh mục các loại điện thoại'),
	(62, 'Laptop', 'Danh mục các loại laptop'),
	(63, 'Máy tính bảng', 'Danh mục các loại máy tính bảng'),
	(64, 'Phụ kiện', 'Danh mục phụ kiện điện tử'),
	(65, 'Mỹ Phẩm', 'Danh mục các loại mỹ phẩm '),
	(66, 'Thiết bị âm thanh', 'Danh mục loa, tai nghe, micro'),
	(67, 'Điện thoại', 'Danh mục các loại điện thoại'),
	(68, 'Laptop', 'Danh mục các loại laptop'),
	(69, 'Máy tính bảng', 'Danh mục các loại máy tính bảng'),
	(70, 'Phụ kiện', 'Danh mục phụ kiện điện tử'),
	(71, 'Mỹ Phẩm', 'Danh mục các loại mỹ phẩm '),
	(72, 'Thiết bị âm thanh', 'Danh mục loa, tai nghe, micro'),
	(73, 'Điện thoại', 'Danh mục các loại điện thoại'),
	(74, 'Laptop', 'Danh mục các loại laptop'),
	(75, 'Máy tính bảng', 'Danh mục các loại máy tính bảng'),
	(76, 'Phụ kiện', 'Danh mục phụ kiện điện tử'),
	(77, 'Mỹ Phẩm', 'Danh mục các loại mỹ phẩm '),
	(78, 'Thiết bị âm thanh', 'Danh mục loa, tai nghe, micro'),
	(79, 'Điện thoại', 'Danh mục các loại điện thoại'),
	(80, 'Laptop', 'Danh mục các loại laptop'),
	(81, 'Máy tính bảng', 'Danh mục các loại máy tính bảng'),
	(82, 'Phụ kiện', 'Danh mục phụ kiện điện tử'),
	(83, 'Mỹ Phẩm', 'Danh mục các loại mỹ phẩm '),
	(84, 'Thiết bị âm thanh', 'Danh mục loa, tai nghe, micro'),
	(85, 'Điện thoại', 'Danh mục các loại điện thoại'),
	(86, 'Laptop', 'Danh mục các loại laptop'),
	(87, 'Máy tính bảng', 'Danh mục các loại máy tính bảng'),
	(88, 'Phụ kiện', 'Danh mục phụ kiện điện tử'),
	(89, 'Mỹ Phẩm', 'Danh mục các loại mỹ phẩm '),
	(90, 'Thiết bị âm thanh', 'Danh mục loa, tai nghe, micro');

-- Dumping structure for table my_store.orders
CREATE TABLE IF NOT EXISTS `orders` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `address` text NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table my_store.orders: ~12 rows (approximately)
INSERT INTO `orders` (`id`, `name`, `phone`, `address`, `created_at`) VALUES
	(1, 'Nguyen Văn A', '098728354', 'Thủ Đức', '2025-03-09 09:58:38'),
	(2, 'Nguyen Văn A', '096581342', 'Thủ Đức', '2025-03-09 13:42:11'),
	(3, 'Nguyen Van c', '098531467', 'Quận 3', '2025-03-10 01:16:51'),
	(4, 'Nguyen Thi A', '097841325', 'Quận 3', '2025-03-10 03:52:56'),
	(5, 'Nguyen Thi A', '97841325', 'Quận 3', '2025-03-10 04:03:18'),
	(6, 'Nguyen Thi A', '97841325', 'Thủ Đức', '2025-03-10 04:30:34'),
	(7, 'nhu', '0964325441', 'Thủ Đức', '2025-03-22 14:40:04'),
	(8, 'nhu', '0964325441', 'Thủ Đức', '2025-03-22 14:41:31'),
	(9, 'nhu', '0964325441', 'Thủ Đức', '2025-03-22 14:41:34'),
	(10, 'nhu', '0964325441', 'Thủ Đức', '2025-03-22 14:41:54'),
	(11, 'nhu', '0964325441', 'Quận 3', '2025-03-24 03:24:17'),
	(12, 'nhu', '0964325441', 'Thủ Đức', '2025-03-24 03:25:58');

-- Dumping structure for table my_store.order_details
CREATE TABLE IF NOT EXISTS `order_details` (
  `id` int NOT NULL AUTO_INCREMENT,
  `order_id` int NOT NULL,
  `product_id` int NOT NULL,
  `quantity` int NOT NULL,
  `price` decimal(10,2) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `order_id` (`order_id`),
  CONSTRAINT `order_details_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table my_store.order_details: ~15 rows (approximately)
INSERT INTO `order_details` (`id`, `order_id`, `product_id`, `quantity`, `price`) VALUES
	(1, 1, 1, 1, 95000.00),
	(2, 1, 4, 1, 12500.00),
	(3, 1, 3, 2, 10500.00),
	(4, 2, 1, 1, 950000.00),
	(5, 2, 2, 1, 890000.00),
	(6, 2, 17, 1, 660000.00),
	(7, 3, 1, 1, 950000.00),
	(8, 4, 1, 1, 950000.00),
	(9, 4, 2, 1, 8900000.00),
	(10, 5, 1, 1, 950000.00),
	(11, 5, 2, 1, 8900000.00),
	(12, 6, 2, 1, 8900000.00),
	(13, 10, 1, 2, 950000.00),
	(14, 11, 1, 2, 950000.00),
	(15, 12, 1, 10, 950000.00);

-- Dumping structure for table my_store.product
CREATE TABLE IF NOT EXISTS `product` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `description` text,
  `price` decimal(10,2) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `category_id` int DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `category_id` (`category_id`),
  CONSTRAINT `product_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=52 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table my_store.product: ~46 rows (approximately)
INSERT INTO `product` (`id`, `name`, `description`, `price`, `image`, `category_id`) VALUES
	(1, 'Son Dưỡng Dior Addict Lip Maximizer 009 Intense Rosewood – Màu Hồng Đất', 'Son Dưỡng Dior Addict Lip Maximizer 009 Intense Rosewood – Màu Hồng Đất là thỏi son dưỡng cao cấp của thương hiệu Dior, sở hữu chức năng kép vừa làm đẹp cho đôi môi với màu hồng đất quyến rũ, vừa có khả năng chăm sóc đôi môi từ sâu bên trong khiến các tín đồ mê làm đẹp săn đón ngay từ khi mới ra mắt.', 950000.00, 'uploads/Screenshot 2025-03-09 121539.png', 5),
	(2, 'Son YSL Rouge Pur Couture 57 Luminous Pink – Màu Đỏ Hồng', 'Son YSL Rouge Pur Couture 57 Luminous Pink – Màu Đỏ Hồng với tông đỏ hồng ngọt ngào lung linh giúp nàng thăng hạng nhan sắc. Nếu bạn cảm thấy nhàm chán với những màu son đơn sắc thì hãy diện thử sắc đỏ hồng, đây thật sự là màu son ấn tượng, một trải nghiệm đầy thú vị và mới mẻ cho làn môi của chính bạn.', 8900000.00, 'uploads/Screenshot 2025-03-09 122228.png', 5),
	(3, 'Son Gucci Rouge À Lèvres Mat Lipstick Limited 505 Janet Rust Xmas – Màu Đỏ Gạch', 'Son Gucci Rouge À Lèvres Mat Lipstick Limited 505 Janet Rust Xmas – Màu Đỏ Gạch là phiên bản giới hạn được thương hiệu Gucci cho ra mắt nhân dịp giáng sinh và mùa lễ hội cuối năm. Thỏi son này chiếm trọn trái tim chị em ngay ở phiên bản thường, nay có thêm phiên bản giới hạn với màu son đỏ gạch thời thượng cùng thiết kế đẹp chưa từng có của thương hiệu khiến phái đẹp mê ngay từ lần đầu tiên nhìn thấy. Không chỉ vậy, các chàng trai cũng đã nhanh chóng đặt hàng để kịp làm quà tặng cuối năm cho người thương của mình.', 10500000.00, 'uploads/Screenshot 2025-03-09 122324.png', 5),
	(4, 'Son Dưỡng Yves Saint Laurent YSL Loveshine Lip Oil Stick 122 Caramel Swirl – Màu Đỏ Cam Đất', 'Son Dưỡng Yves Saint Laurent YSL Loveshine Lip Oil Stick 122 Caramel Swirl – Màu Đỏ Cam Đất được đánh giá là thỏi son dưỡng bán chạy nhất thị trường dạo gần đây. Màu son đỏ cam đất vô cùng tôn da, dù cho nàng có làn da trắng hay da ngăm cũng đều tỏa sáng nổi bật với YSL 122.', 12500000.00, 'uploads/Screenshot 2025-03-09 122434.png', 5),
	(5, 'Nước Hoa Nữ Salvatore Ferragamo Signorina Ribelle EDP', 'Nước Hoa Nữ Salvatore Ferragamo Signorina Ribelle EDP là chai nước hoa dành cho các cô nàng đang tìm kiếm một mùi hương nữ tính, nhẹ nhàng, thanh lịch theo trường phái tiểu thư, trẻ trung đậm chất phương Đông.', 18500000.00, 'uploads/Screenshot 2025-03-09 122531.png', 5),
	(6, 'YSL Rouge volupte Shine Collector I LOVE YOU Dial Red 114 (Bản giới hạn) – Đỏ thuần', 'YSL Rouge volupte Shine Collector I LOVE YOU Dial Red 114 (Bản giới hạn) sở hữu tone đỏ thuần cực mê, chất son điểm mười cùng thiết kế bắt mắt sẽ là những gì mà bạn cảm nhận được khi cầm em nó trên tay.', 950000.00, 'uploads/Screenshot 2025-03-09 122621.png', 5),
	(7, 'Son 3CE Soft Lip Lacquer Ordinary Red  – Đỏ ớt ', 'Son 3CE Soft Lip Lacquer Ordinary Red đi kèm với sắc son đỏ pha một chút cam tươi tắn và nâu đúng chuẩn màu đỏ ớt, các nàng có thể diện em son này vào bất cứ mùa nào trong năm. Chất son cực mịn, không chỉ lên màu cực chuẩn mà còn làm mờ rãnh môi, giúp các cô gái có làn môi lì như nhung.\r\n\r\n', 3400000.00, 'uploads/Screenshot 2025-03-09 122706.png', 5),
	(8, 'Son Chanel Rouge Coco Bloom Lip Colour 130 Bloomsom – Màu Cam Hồng', 'Son Chanel Rouge Coco Bloom Lip Colour 130 Bloomsom – Màu Cam Hồng mang đến cho phái đẹp sắc cam hồng tươi sáng và tự nhiên, vừa thanh lịch vừa nổi bật. Cùng với đó là chất son nhẹ nhàng, mềm mượt như lụa, giúp môi nàng luôn ẩm mịn và căng mọng suốt cả ngày dài.', 1150000.00, 'uploads/Screenshot 2025-03-09 122809.png', 5),
	(9, 'Nước Hoa Nữ Miss Dior Absolutely Blooming EDP', 'Với những nốt hương tươi mới của các loại hoa quả, Nước Hoa Nữ Miss Dior Absolutely Blooming EDP như là một món quà dành riêng để cổ vũ tinh thần lạc quan, tươi vui cho những cô gái đang đắm chìm trong tình yêu cuộc sống.', 4100000.00, 'uploads/Screenshot 2025-03-09 122922.png', 5),
	(10, 'Son Kem YSL Vinyl Cream Lip Stain 610 Nude Champion – Màu Cam Nude', 'Son Kem YSL Vinyl Cream Lip Stain 610 Nude Champion – Màu Cam Nude gây ấn tượng với phái đẹp bởi màu son nhẹ nhàng, tự nhiên nhưng vẫn vô cùng cuốn hút và quyến rũ. Đặc biệt chất son kem mềm mịn, giữ màu lên tới 10 giờ đã làm chị em phải nhanh tay đặt hàng ngay từ khi mới ra mắt.', 1250000.00, 'uploads/Screenshot 2025-03-09 123022.png', 5),
	(12, 'Nước Hoa Nữ Giorgio Armani Sì EDP', 'Dưới sự giao thoa giữa hương hoa mỹ miều, hòa quyện say đắm vào trong từng thớ gỗ đĩnh đạc, nước hoa nữ Giorgio Armani Sì EDP không khó khăn mấy để chiếm được cảm tình của người dùng bởi nốt hương nịnh mũi đặc trưng của hoa hồng trong những ánh nhìn đầu tiên.', 260000.00, 'uploads/Screenshot 2025-03-09 142721.png', 5),
	(13, 'Son Kem Dior Rouge Forever Liquid 959 Forever Bold – Màu Đỏ Mận', 'Son Kem Dior Rouge Forever Liquid 959 Forever Bold – Màu Đỏ Mận sở hữu màu son sang trọng, cá tính và cực kì nổi bật. Màu son gắn liền những sàn diễn thời trang cao cấp bậc nhất trên thế giới.', 890000.00, 'uploads/Screenshot 2025-03-09 142818.png', 5),
	(14, 'Son Dưỡng Dior Addict Lip Glow 1947 Miss Dior – Màu Hồng Phấn', 'Bộ sưu tập của dòng Addict Lip Glow của Dior nay đã đón thêm nàng thơ mới xinh đẹp với cái tên Son Dưỡng Dior Addict Lip Glow 1947 Miss Dior – Màu Hồng Phấn. Son mang một màu hồng phấn với dáng vẻ trong trẻo dịu dàng, hệt như một nàng công chúa kiêu sa được cưng chiều.', 850000.00, 'uploads/Screenshot 2025-03-09 142915.png', 5),
	(15, 'Son YSL The Bold 02 Wilful Red – Màu Đỏ Cam (New)', 'Son YSL The Bold 02 Wilful Red – Màu Đỏ Cam (New) là một trong những thỏi son được ưa chuộng của nhà YSL. Với sắc đỏ cam sống động và cực kì trẻ trung chắc chắn sẽ là thứ vũ khí đỉnh cao giúp nàng ăn gian tuổi thật.', 950000.00, 'uploads/Screenshot 2025-03-09 143013.png', 5),
	(16, 'Nước Hoa Nữ Jean Paul Gaultier So Scandal EDP', 'Nước Hoa Nữ Jean Paul Gaultier So Scandal EDP gây nghiện với sự kết hợp nữ tính của ba loài hoa trắng : Hoa Cam, Hoa Nhài, Hoa Huệ hoà quyện ngọt ngào và nồng ấm. Mùi hương đem lại dư vị sâu lắng và đam mê khó cưỡng lại. Bộ ba loài hoa này kết hợp với nhau tạo nên một mùi hương ngọt ngào mê đắm.', 325000.00, 'uploads/Screenshot 2025-03-09 143105.png', 5),
	(17, 'Nước Hoa Nam Creed Green Irish Tweed EDP', 'Nước Hoa Nam Creed Green Irish Tweed EDP được ví von rằng đẹp như một câu ngạn ngữ. Cái phong vị cổ điển được chứa đựng bên trong chai nước hoa nam này chỉ có thể thêm sâu sắc và ý nghĩa, chứ chẳng bao giờ bị mai một hay băng hoại bởi thời gian.', 660000.00, 'uploads/Screenshot 2025-03-09 143227.png', 5),
	(18, 'Son Bbia last velvet lip tint Version 4 More Pleasant 17 – Cam san hô', 'Nếu như màu son 16 đã thiên vị sắc hồng rồi thì More Pleasant lại nghiêng về cam nhiều hơn. Màu son rất trẻ trung, năng động và tiện để nàng sử dụng hằng ngày, dù đi học, đi làm hay đi dạo thì vẫn toát lên vẻ nữ tính, dịu dàng của nàng.', 2150000.00, 'uploads/Screenshot 2025-03-09 143316.png', 5),
	(19, 'Nước Hoa Unisex Roja Parfums Diaghilev Parfum', 'Nước Hoa Unisex Roja Parfums Diaghilev Parfum mở ra một hành trình đặc sắc đưa ta quay trở về thời kỳ của những vũ công và những đêm diễn múa huyền bí. Tác phẩm này của Roja Dove không chỉ là một biểu tượng của sự tinh tế và sang trọng, mà còn là một cảm xúc đầy những nốt hương sôi động và lãng mạn. Hãy cùng bước chân vào thế giới của Diaghilev, nơi mà hương thơm lôi cuốn và gợi nhắc về những câu chuyện đẹp nhất của nghệ thuật ba lê.', 810000.00, 'uploads/Screenshot 2025-03-09 143418.png', 5),
	(20, 'Son Kem Dior Rouge Forever Liquid 300 Nude Style – Màu Nâu Nude', 'Son Kem Dior Rouge Forever Liquid 300 Nude Style – Màu Nâu Nude là lựa chọn lý tưởng cho những ai yêu thích sự thanh lịch và hiện đại. Sắc Nâu Nude của sản phẩm mang đến vẻ đẹp nhẹ nhàng nhưng đầy cuốn hút, là sự hòa quyện tinh tế giữa gam nâu trầm ấm và sắc nude tự nhiên. Không chỉ tạo điểm nhấn cho đôi môi, màu son này còn tôn lên nét sang trọng, phù hợp cho cả những buổi tiệc tối hay phong cách hàng ngày.', 890000.00, 'uploads/Screenshot 2025-03-09 143510.png', 5),
	(21, 'Bảng Phấn Mắt 9 Màu 3CE Multi Eye Color Palette – Overtake', 'Bảng Phấn Mắt 9 Màu 3CE Multi Eye Color Palette – Overtake nằm trong bộ phấn mắt đến từ thương hiệu mỹ phẩm Hàn Quốc, Style Nanda – 3CE. Với những tone màu vintage, quyết rũ và cực hot chắc chắn sẽ không làm bạn thất vọng.', 710000.00, 'uploads/Screenshot 2025-03-09 143550.png', 5),
	(22, 'Son 3CE 115 Mood Recipe – Muss', 'Son 3CE 115 – Muss hồng đất chính là tone son dành cho các bé học sinh với gam màu cực nhẹ để diện khi đi học nha. Một màu hồng đất nhẹ nhưng không hề bị bợt mà còn làm sáng những gương mặt không make up lên hơn một chút đó nha.', 460000.00, 'uploads/Screenshot 2025-03-09 143645.png', 5),
	(23, 'Son Pat McGrath Muse – Đỏ Cam', 'Nàng đang tìm kiếm một tone son đỏ cam nóng bỏng, rực rỡ, son lì nhưng phải siêu dưỡng cho đôi môi căng mịn? Vậy thì Son Pat McGrath Muse chính là thỏi son thần thánh mà nàng đang cần rồi.', 980000.00, 'uploads/Screenshot 2025-03-09 143737.png', 5),
	(24, 'Nước Hoa Nữ Dior Miss Dior Eau De Parfum', 'Song hành cùng những khẩu hiệu mà Dior tâm đắc nhất như “Miss Dior For Love”, “Dior For Love”, “And what about you?” và “What would you do for love?”, Nước Hoa Nữ Dior Miss Dior Eau De Parfum giống một lời tuyên bố của tình yêu dành tặng riêng cho những người phụ nữ trẻ trung và tràn đầy sự nhiệt huyết.', 385000.00, 'uploads/Screenshot 2025-03-09 143830.png', 5),
	(26, 'Son Kem Lì 3CE Hazy Lip Clay Whip Red – Màu Đỏ Gạch', 'Son Kem Lì 3CE Hazy Lip Clay Whip Red – Màu Đỏ Gạch, vừa tinh tế vừa quyến rũ. Màu sắc phản ánh sự mạnh mẽ, cá tính và hiện đại. Dù nổi bật nhưng vẫn giữ được sự ấm áp, phù hợp với mọi tông da và mọi phong cách trang điểm. Whip Red không chỉ là sự lựa chọn màu sắc, mà còn là biểu tượng cho sự tự tin và cuốn hút.', 390000.00, 'uploads/Screenshot 2025-03-09 172152.png', 11),
	(27, 'Nước Hoa Nữ Lancôme Idôle Aura Eau De Parfum Lumineuse', 'Nước Hoa Nữ Lancôme Idôle Aura Eau De Parfum Lumineuse với hương thơm như tiếp thêm sức mạnh cho nàng, làm nổi bật nét hiện đại và trẻ trung mỗi lần sử dụng.', 2850000.00, 'uploads/Screenshot 2025-03-09 172254.png', 11),
	(28, 'Nước Hoa Nữ Burberry Her EDP', 'Nước Hoa Nữ Burberry Her EDP đánh dấu sự trở lại đầy bất ngờ đến từ thương hiệu làm đẹp hàng đầu Anh Quốc với một hương thơm trẻ trung và nữ tính.', 280000.00, 'uploads/Screenshot 2025-03-09 172507.png', 11),
	(29, 'Set Son Gucci Matte Trio Lipstick Gift Set (3 x 3.5g)', 'Set son Gucci Matte Trio sở hữu 3 tông màu thời thượng, nổi bật và dễ ứng dụng cho mùa lễ hội. Chất son lì mịn nhẹ, bền màu nhưng vẫn đảm bảo đôi môi luôn mềm mại, căng tràn sức sống. Thiết kế sang trọng, tinh tế biến bộ quà tặng này thành lựa chọn hoàn hảo để nàng tỏa sáng hoặc dành tặng cho người phụ nữ mình yêu thương.', 225000.00, 'uploads/Screenshot 2025-03-09 172746.png', 11),
	(30, 'Son Kem Lì 3CE Hazy Lip Clay Butter Beige – Màu Cam Đào Đất', 'Son Kem Lì 3CE Hazy Lip Clay Butter Beige – Màu Cam Đào Đất như một bức tranh tĩnh lặng, hòa quyện giữa sắc cam ấm áp và sắc nâu đất trầm. Màu sắc này là sự kết hợp tinh tế, tạo nên vẻ đẹp tự nhiên và ấm áp đồng thời cũng khiến nàng trở nên thanh lịch và đáng yêu.', 390000.00, 'uploads/Screenshot 2025-03-09 172859.png', 11),
	(31, 'Son Kem Nars Power Matte Lip Pigment Slow Ride – Màu Cam Đất', 'Son Kem Nars Powermatte Lip Pigment Show Ride mang gam màu cam đất, một thỏi son lý tưởng cho những cô nàng có cá tính với kiểu trang điểm phá cách và lạ lẫm.', 810000.00, 'uploads/Screenshot 2025-03-09 173037.png', 11),
	(32, 'Nước Hoa Nữ Yves Saint Laurent Libre Le Parfum', 'Nước Hoa Nữ Yves Saint Laurent Libre Le Parfum là một chai nước hoa hoàn hảo để làm quà tặng dành cho người phụ nữ thương yêu của bạn. Với mùi hương hoa cỏ phương Đông ngọt ngào, ấm áp và vô cùng sang trọng sẽ khiến nàng thích thú và hạnh phúc nếu như được ai đó tặng chai nước hoa này.', 8100000.00, 'uploads/Screenshot 2025-03-09 173221.png', 11),
	(33, 'Son YSL Rouge Pur Couture The Slim 38 Flaming Rouge – Màu Cam Sữa', 'Son YSL Rouge Pur Couture The Slim 38 Flaming Rouge – Màu Cam Sữa làm rung động trái tim của các tín đồ mê son môi. Với màu son cam cháy độc đáo, YSL 38 mang đến cho nàng một gương mặt vừa trẻ trung, tươi tắn vừa quý phái, thanh lịch. Đây là gam màu đang là xu hướng trên thị trường hiện nay.', 1050000.00, 'uploads/Screenshot 2025-03-09 173325.png', 11),
	(34, 'Son Chanel Rouge Allure Luminous Intense 206 Illusion – Màu Cam Đất', 'Màu cam đất là màu son được nhiều cô gái ưu chuộng bởi màu son tươi sáng vừa đủ, thêm chút nâu trầm của nâu đất tạo nên một màu son vừa rực rỡ, nhưng cũng đầy quyến rũ. Chanel cũng không hề bỏ sót màu son siêu hot này trong BST mới với màu son mang tên Son Chanel Rouge Allure Luminous Intense 206 Illusion – Màu Cam Đất.', 1150000.00, 'uploads/Screenshot 2025-03-09 173644.png', 11),
	(35, 'Nước Hoa Unisex Gucci Mémoire D’une Odeur Eau De Parfum', 'Nước Hoa Unisex Gucci Mémoire d’une Odeur Eau De Parfum đưa ta đến với trải nghiệm hương thơm vô cùng thú vị. Không giống như những mùi hương thông thường. Bạn sẽ có cảm giác như mình đang nằm trên khu vườn đầy cỏ rất hoang dại. Đâu đó thoang thoảng mùi cỏ xanh và nắng hanh rất dễ chịu.', 38500000.00, 'uploads/Screenshot 2025-03-09 173904.png', 11),
	(36, 'Nước Hoa Nữ Gucci Bloom For Women EDP', 'Nếu mỗi chai nước hoa thường được ví von như một “bản giao hưởng” hương vị thì Nước Hoa Nữ Gucci Bloom For Women EDP chắc hẳn sẽ là tác phẩm thanh âm đậm hương, ngọt vị nhất.', 3200000.00, 'uploads/Screenshot 2025-03-09 174021.png', 11),
	(37, 'Nước Hoa Nữ Gucci Flora Gorgeous Gardenia EDP', 'Nước Hoa Nữ Gucci Flora Gorgeous Gardenia EDP sở hữu mùi hương độc nhất, quyến rũ, đam mê đầy nữ tính. Từ đó mang lại cho phái nữ một nét đẹp đầy gợi cảm, hấp dẫn, khiến các chàng trai không thể nào cưỡng lại được.', 405000.00, 'uploads/Screenshot 2025-03-09 174155.png', 11),
	(38, 'Nước Hoa Nữ Christian Louboutin Loubimar Légère EDP', 'Nước Hoa Nữ Christian Louboutin Loubimar Légère EDP khiến người ta phải thán phục, trầm trồ với hương thơm bí ẩn và độc đáo. Để rồi khi tự cảm nhận, dư vị của mùi hương sẽ làm họ si mê một cách ngây ngất và khó quên.', 865000.00, 'uploads/Screenshot 2025-03-09 174323.png', 11),
	(39, 'Nước Hoa Nữ Dior Joy EDP', 'Nước Hoa Nữ Dior Joy EDP mang đến sự tinh tế và quyến rũ, khiến bao người liên tưởng về nét đẹp thơ ngây, lãng mạn của một quý cô kiêu sa.', 379000.00, 'uploads/Screenshot 2025-03-09 174426.png', 11),
	(40, 'Nước Hoa Unisex Louis Vuitton Coeur Battant Eau De Parfum', 'Nước Hoa Unisex Louis Vuitton Coeur Battant Eau De Parfum– mùi hương mới của Louis Vuitton – tôn vinh nguồn sinh khí ngập tràn hứng khởi, niềm khát khao sống mãnh liệt luôn thôi thúc trong mỗi con tim, mở ra những chân trời bất tận cho mọi khoảnh khắc trong đời trở nên đáng quý.', 105000.00, 'uploads/Screenshot 2025-03-09 174551.png', 11),
	(42, 'Nước Hoa Unisex Roja Parfums Diaghilev Parfum', 'Nước Hoa Unisex Roja Parfums Diaghilev Parfum mở ra một hành trình đặc sắc đưa ta quay trở về thời kỳ của những vũ công và những đêm diễn múa huyền bí. Tác phẩm này của Roja Dove không chỉ là một biểu tượng của sự tinh tế và sang trọng, mà còn là một cảm xúc đầy những nốt hương sôi động và lãng mạn. Hãy cùng bước chân vào thế giới của Diaghilev, nơi mà hương thơm lôi cuốn và gợi nhắc về những câu chuyện đẹp nhất của nghệ thuật ba lê.', 22500000.00, 'uploads/Screenshot 2025-03-09 185409.png', 11),
	(43, 'Nước Hoa Unisex Creed Silver Mountain Water Eau De Parfum', 'Vẽ ra cho ta cánh đồng trà bạt ngàn đến vô tận, Nước Hoa Unisex Creed Silver Mountain Water Eau De Parfum từ nhà Creed không chỉ đem đến cho ta mùi hương đặc trưng độc đáo, mà còn trao cho ta định nghĩa về nghệ thuật đúng điệu.', 6650000.00, 'uploads/Screenshot 2025-03-09 185649.png', 11),
	(44, 'Nước Hoa Unisex Louis Vuitton California Dream EDP', 'Nước Hoa Unisex Louis Vuitton California Dream EDP mang đến một mùi hương phương Đông nồng nàn và ấm áp, khắc họa lại cảnh hoàng hôn lung linh đầy sức hút trên bầu trời ngày hè California tràn ngập hạnh phúc và tự do.', 16980000.00, 'uploads/Screenshot 2025-03-09 185834.png', 11),
	(45, 'Nước Hoa Nữ Louis Vuitton Rose Des Vents Eau De Parfum ', 'Nước Hoa Nữ Louis Vuitton Rose Des Vents Eau De Parfum mang hương thơm nhẹ nhàng, bay bổng của nhóm hương hoa cỏ tạo nên nét tinh tế,  mong manh đến gợi cảm dành cho các nàng.', 10600000.00, 'uploads/Screenshot 2025-03-09 185945.png', 11),
	(47, 'Nước Hoa Nữ Christian Louboutin Loubiraj EDP', 'Nước Hoa Nữ Christian Louboutin Loubiraj EDP sở hữu mùi hương ma thuật, dường như biết hát, dường như biết nhảy múa và để lại một dấu vết mạnh mẽ kéo dài vô tận cho người dùng.', 8650000.00, 'uploads/Screenshot 2025-03-09 190416.png', 11),
	(48, 'Nước Hoa Nữ Dolce &amp; Gabbana Q EDP', 'Nước Hoa Nữ Dolce &amp; Gabbana Q EDP là chai nước hoa có khả năng biến cô nàng thành người phụ nữ quyền lực, quý phái như một vị nữ hoàng trong truyện cổ tích. Với mùi hương hoa cỏ trái cây vừa tươi mát vừa ngọt ngào, mang đến cảm giác như đang ở giữa rừng hoa khiến bất cứ cô nàng nào cũng phải mê mẩn.', 3850000.00, 'uploads/Screenshot 2025-03-09 190650.png', 11),
	(49, 'Nước Hoa Nữ Moschino Toy 2 Eau De Parfum (30ml,50ml,100ml)', 'Nước Hoa Nữ Moschino Toy 2 Eau De Parfum sở hữu mùi hương tươi mát và dễ chịu, mùi hương dịu nhẹ, ngọt thanh mang đến cho nàng sự tự tin, cuốn hút và nổi bật trước mọi không gian và thời gian.', 1700000.00, 'uploads/Screenshot 2025-03-09 190851.png', 11),
	(50, 'Túi xách hình chữ nhật Enola Bowling', 'Kem', 1890000.00, 'uploads/Screenshot 2025-03-10 102226.png', 10);

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
