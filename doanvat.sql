-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th8 23, 2020 lúc 05:20 PM
-- Phiên bản máy phục vụ: 10.4.10-MariaDB
-- Phiên bản PHP: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `doanvat`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `about`
--

CREATE TABLE `about` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `slug` text COLLATE utf8_unicode_ci NOT NULL,
  `content` text COLLATE utf8_unicode_ci NOT NULL,
  `created` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `about`
--

INSERT INTO `about` (`id`, `name`, `slug`, `content`, `created`) VALUES
(1, 'Giới thiệu chung', 'gioi-thieu-chung', '<p>Website đc thiết kế bởi Lạc V&otilde;</p>\r\n', '2020-08-23 13:06:00');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `group_id` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`, `group_id`) VALUES
(1, 'admin', 'e10adc3949ba59abbe56e057f20f883e', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `admin_group`
--

CREATE TABLE `admin_group` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `permission` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `admin_group`
--

INSERT INTO `admin_group` (`id`, `name`, `permission`) VALUES
(1, 'Admin', ''),
(2, 'Mod', '');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `catalog`
--

CREATE TABLE `catalog` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `meta_desc` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `meta_key` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `parent_id` int(11) NOT NULL DEFAULT 0,
  `sort_order` tinyint(4) NOT NULL DEFAULT 0,
  `slug` text COLLATE utf8_unicode_ci NOT NULL,
  `image_link` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `catalog`
--

INSERT INTO `catalog` (`id`, `name`, `meta_desc`, `meta_key`, `parent_id`, `sort_order`, `slug`, `image_link`) VALUES
(5, 'Bánh Tráng', '', '', 0, 0, 'banh-trang', ''),
(6, 'Đồ Chiên', '', '', 0, 0, 'do-chien', ''),
(7, 'Đồ Sấy', '', '', 0, 0, 'do-say', ''),
(8, 'Nước', '', '', 0, 0, 'nuoc', ''),
(9, 'Đồ ăn vặt lắc', '', '', 0, 0, 'do-an-vat-lac', '');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `user` int(255) NOT NULL,
  `content` text COLLATE utf8_unicode_ci NOT NULL,
  `product` int(11) NOT NULL DEFAULT 0,
  `created` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `comments`
--

INSERT INTO `comments` (`id`, `user`, `content`, `product`, `created`) VALUES
(3, 1, 'dsadsadsadsadsa', 1, '2020-08-12 16:41:27'),
(4, 1, 'dsadsadsadasdsa', 1, '2020-08-12 16:45:22'),
(5, 1, 'asad asadaun ped hnadsadsa dsada', 1, '2020-08-12 16:45:42');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `comments_cat`
--

CREATE TABLE `comments_cat` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `slug` text COLLATE utf8_unicode_ci NOT NULL,
  `parent_id` int(11) NOT NULL DEFAULT 0,
  `sort_order` tinyint(4) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `comments_cat`
--

INSERT INTO `comments_cat` (`id`, `name`, `slug`, `parent_id`, `sort_order`) VALUES
(1, 'Cảm nhận của chúng tôi', 'cam-nhan-cua-chung-toi', 0, 0),
(2, 'Cảm nhận của khách hàng', 'cam-nhan-cua-khach-hang', 0, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `contact`
--

CREATE TABLE `contact` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `content` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `contact`
--

INSERT INTO `contact` (`id`, `name`, `content`) VALUES
(1, 'Tên shop', 'Đồ Ăn Vặt Lạc Võ'),
(2, 'Địa chỉ', '472f Lê Văn Việt Quận 9'),
(3, 'Hotline', '070883229'),
(4, 'Địa chỉ website', 'http://localhost/doanvat/'),
(5, 'Email', 'lacvo14@gmail.com');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `news`
--

CREATE TABLE `news` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `content` text COLLATE utf8_unicode_ci NOT NULL,
  `meta_desc` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `meta_key` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `image_link` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created` timestamp NOT NULL DEFAULT current_timestamp(),
  `feature` int(11) NOT NULL DEFAULT 1,
  `count_view` int(11) NOT NULL DEFAULT 0,
  `slug` text COLLATE utf8_unicode_ci NOT NULL,
  `cat_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `news`
--

INSERT INTO `news` (`id`, `name`, `content`, `meta_desc`, `meta_key`, `image_link`, `created`, `feature`, `count_view`, `slug`, `cat_id`) VALUES
(3, 'Đồ ăn vặt Lạc Võ tung seri ăn vặt cực sốc', '<p>Khi bạn đặt mua online tr&ecirc;n&nbsp;cửa h&agrave;ng lạc v&otilde; sẽ đc giảm giả : 5% tr&ecirc;n tổng h&oacute;a đơn</p>\r\n\r\n<p>???? Điều kiện &aacute;p dụng:<br />\r\n&ndash; &Aacute;p dụng khi thanh to&aacute;n online.<br />\r\n&ndash; Kh&ocirc;ng giới hạn số lượng mua h&agrave;ng<br />\r\n- Thời gian kết th&uacute;c chương tr&igrave;nh sẽ được th&ocirc;ng b&aacute;o sau tr&ecirc;n Web của cửa h&agrave;ng&nbsp;❤️</p>\r\n', '', '', 'ComChayChienNuocMam.jpg', '2020-08-23 13:05:00', 1, 2, 'do-an-vat-lac-vo-tung-seri-an-vat-cuc-soc', 3);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `news_cat`
--

CREATE TABLE `news_cat` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `slug` text COLLATE utf8_unicode_ci NOT NULL,
  `parent_id` int(11) NOT NULL,
  `sort_order` tinyint(4) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `news_cat`
--

INSERT INTO `news_cat` (`id`, `name`, `slug`, `parent_id`, `sort_order`) VALUES
(3, 'Khuyến mãi', 'khuyen-mai', 0, 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `order`
--

CREATE TABLE `order` (
  `id` int(11) NOT NULL,
  `transaction_id` int(255) NOT NULL,
  `product_id` int(255) NOT NULL,
  `qty` int(11) NOT NULL DEFAULT 0,
  `amount` decimal(15,4) NOT NULL DEFAULT 0.0000,
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `data` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `catalog_id` int(11) NOT NULL,
  `price` text COLLATE utf8_unicode_ci NOT NULL,
  `content` text COLLATE utf8_unicode_ci NOT NULL,
  `image_link` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `meta_key` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `meta_desc` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `total` int(255) NOT NULL,
  `buyed` int(255) NOT NULL,
  `feature` tinyint(2) NOT NULL DEFAULT 0,
  `order_bestsale` int(11) NOT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `count_view` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `product`
--

INSERT INTO `product` (`id`, `name`, `catalog_id`, `price`, `content`, `image_link`, `created`, `meta_key`, `meta_desc`, `total`, `buyed`, `feature`, `order_bestsale`, `slug`, `count_view`) VALUES
(4, 'Xoài Lắc', 9, '[\"h\\u1ed9p 250gr : 20.000\",\"h\\u1ed9p 500gr : 35.000\"]', '', 'XoaiLac1.jpg', '2020-08-23 11:50:00', '', '', 0, 0, 1, 0, 'xoai-lac', 115),
(6, 'Cơm cháy chà bông', 6, '[\"h\\u1ed9p 250g: 10.000\",\"h\\u1ed9p 500g: 20.000\",\"\"]', '', 'ComChayChaBong.jpg', '2020-08-23 14:49:00', '', '', 0, 0, 1, 0, 'com-chay-cha-bong', 1),
(7, 'Cơm cháy chiên nước mắm', 6, '[\"G\\u00f3i 250g: 10.000\",\"G\\u00f3i 500g: 20.000 \"]', '', 'ComChayChienNuocMam1.jpg', '2020-08-23 11:50:00', '', '', 0, 0, 0, 0, 'com-chay-chien-nuoc-mam', 0),
(8, 'Chân Gà Xã Tắc', 9, '[\"H\\u1ed9p 250g: 40.000\",\"H\\u1ed9p 500g: 79.000\"]', '', 'ChanGaSaTac.jpg', '2020-08-23 12:34:00', '', '', 0, 0, 0, 0, 'chan-ga-xa-tac', 0),
(9, ' Bảy úp', 8, '[\"Lon: 12.000\",\"Chai Nh\\u1ef1a: 10.000\"]', '', '7up.jpg', '2020-08-23 12:35:00', '', '', 0, 0, 0, 0, 'bay-up', 0),
(10, 'Cafe đen', 8, '[\"1 Ly: 10.000\"]', '', 'CafeDen.jpg', '2020-08-23 12:36:00', '', '', 0, 0, 0, 0, 'cafe-den', 0),
(11, 'cafe sữa', 8, '[\"1 ly: 12.000\"]', '', 'CafeSua.jpg', '2020-08-23 12:36:00', '', '', 0, 0, 0, 0, 'cafe-sua', 0),
(12, 'Cocacola', 8, '[\"lon: 12.000\",\"chai nh\\u1ef1a: 10.000\"]', '', 'CocaCola.jpg', '2020-08-23 12:37:00', '', '', 0, 0, 0, 0, 'cocacola', 0),
(13, 'Trà đào', 8, '[\"Ly: 15.000\"]', '', 'TraDao.jpg', '2020-08-23 12:39:00', '', '', 0, 0, 0, 0, 'tra-dao', 0),
(14, 'Trà lipton', 8, '[\"1ly: 15.000\"]', '', 'TraLipton.jpg', '2020-08-23 12:39:00', '', '', 0, 0, 0, 0, 'tra-lipton', 0),
(15, 'Trà sữa chân châu đen', 8, '[\"ly: 15.000\"]', '', 'TraSuaChanChau.jpg', '2020-08-23 12:39:00', '', '', 0, 0, 0, 0, 'tra-sua-chan-chau-den', 0),
(16, 'Trà sữa matcha', 8, '[\"ly: 15.000\"]', '', 'TraSuaMatcha.jpg', '2020-08-23 12:40:00', '', '', 0, 0, 0, 0, 'tra-sua-matcha', 0),
(17, 'Trà vãi', 8, '[\"ly: 15.000\"]', '', 'TraVai.jpg', '2020-08-23 12:40:00', '', '', 0, 0, 0, 0, 'tra-vai', 0),
(18, 'Khoai lang sấy', 7, '[\"g\\u00f3i 250g: 50.000\",\"g\\u00f3i 500g: 80.000\"]', '', 'KhoaiLangSay.jpg', '2020-08-23 12:44:00', '', '', 0, 0, 0, 0, 'khoai-lang-say', 0),
(19, 'Khô Gà', 7, '[\"H\\u1ed9p 500g: 100.000\",\"H\\u1ed9p 1Kg: 199.000\"]', '', 'KhoGa.jpg', '2020-08-23 12:51:02', '', '', 0, 0, 1, 0, 'kho-ga', 2),
(20, 'Rong biển cháy tỏi', 7, '[\"H\\u1ed9p 250g: 50.000\",\"H\\u1ed9p 500g: 99.000\"]', '', 'RongBienChayToi.jpg', '2020-08-23 12:48:00', '', '', 0, 0, 0, 0, 'rong-bien-chay-toi', 0),
(21, 'Khoai tây chiên', 6, '[\"H\\u1ed9p 250g: 15.000\",\"H\\u1ed9p 500g: 29.000\"]', '', 'KhoaiTayChien.jpg', '2020-08-23 12:50:00', '', '', 0, 0, 0, 0, 'khoai-tay-chien', 0),
(22, 'Phô mai que', 6, '[\"H\\u1ed9p (6 c\\u00e1i): 22.000\",\"H\\u1ed9p (12 c\\u00e1i): 40.000\"]', '', 'PhoMaiQue.jpg', '2020-08-23 12:51:15', '', '', 0, 0, 0, 0, 'pho-mai-que', 3),
(23, 'Bánh tráng cuốn', 5, '[\"H\\u1ed9p(3 cu\\u1ed1n): 10.000\",\"H\\u1ed9p (6 cu\\u1ed1n): 20.000\"]', '', 'BanhTrangCuon.jpg', '2020-08-23 12:52:00', '', '', 0, 0, 0, 0, 'banh-trang-cuon', 0),
(24, 'Bánh tráng long an', 5, '[\"B\\u1ecbch: 10.000\"]', '', 'BanhTrangLongAn.jpg', '2020-08-23 12:57:00', '', '', 0, 0, 0, 0, 'banh-trang-long-an', 0),
(25, 'Bánh tráng satế', 5, '[\"B\\u1ecbch: 12.000 \"]', '', 'BanhTrangSaTe.jpg', '2020-08-23 12:54:00', '', '', 0, 0, 0, 0, 'banh-trang-sate', 0),
(26, 'Bánh tráng tây ninh', 9, '[\"B\\u1ecbch : 12.000\"]', '', 'BanhTrangTayNinh.jpg', '2020-08-23 14:45:00', '', '', 0, 0, 1, 0, 'banh-trang-tay-ninh', 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `rating`
--

CREATE TABLE `rating` (
  `id` int(10) UNSIGNED NOT NULL,
  `star` int(11) NOT NULL,
  `user` varchar(255) NOT NULL,
  `product` int(11) NOT NULL,
  `created` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `rating`
--

INSERT INTO `rating` (`id`, `star`, `user`, `product`, `created`) VALUES
(1, 5, '1', 1, '2020-08-12 17:01:29'),
(2, 1, '2', 1, '2020-08-12 17:01:29'),
(3, 3, '5', 1, '2020-08-12 17:01:29');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `slider`
--

CREATE TABLE `slider` (
  `id` int(11) NOT NULL,
  `image_slide` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `intro` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `sort_order` int(11) NOT NULL DEFAULT 0,
  `public` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `slider`
--

INSERT INTO `slider` (`id`, `image_slide`, `intro`, `sort_order`, `public`) VALUES
(1, 'XoaiLac.jpg', 'aaaaaab', 1, 1),
(3, 'BanhTrangSaTe.jpg', 'slide2', 2, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `transaction`
--

CREATE TABLE `transaction` (
  `id` int(11) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `user_id` int(11) NOT NULL,
  `user_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `user_email` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `user_phone` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `amount` decimal(15,4) NOT NULL DEFAULT 0.0000,
  `payment` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `payment_info` text COLLATE utf8_unicode_ci NOT NULL,
  `message` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `security` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `created` int(11) NOT NULL DEFAULT 0,
  `user_address` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `user`
--

CREATE TABLE `user` (
  `id` int(255) NOT NULL,
  `name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `created` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `phone`, `address`, `password`, `created`) VALUES
(0, 'Đồ Ăn Vặt Lạc Võ', 'lacvo14@gmail.com', '7070883229', '472f Lê Văn Việt Quận 9', 'e10adc3949ba59abbe56e057f20f883e', 1598192040),
(22, 'Tran Duc Anh', 'anhtdgame@gmail.com', '986583722', '28A đường số 3, Trường Thọ, Thủ Đức', '4297f44b13955235245b2497399d7a93', 1475587566),
(24, 'Vu Thi Diem Chau', 'diemchau0705@gmail.com', '974741010', '107/77/4 Ni Su Huynh Lien', 'e10adc3949ba59abbe56e057f20f883e', 1475647121),
(25, 'Diễm Châu', 'diemchau2622@yahoo.com', '0974741010', '107/77/4 Ni Su Huynh Lien', 'e10adc3949ba59abbe56e057f20f883e', 1475647429),
(26, 'Thanh Thúy', 'haua237@gmail.com', '0339999788', 'Phuowcs long B', 'c2f5740938ca639fcf4e604b74b7c289', 1558610013);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `video`
--

CREATE TABLE `video` (
  `id` int(11) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `link` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `public` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `video`
--

INSERT INTO `video` (`id`, `title`, `link`, `public`) VALUES
(2, 'aaa', 'https://www.youtube.com/watch?v=eqxLGgAoyfU', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `wholesale`
--

CREATE TABLE `wholesale` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `slug` text COLLATE utf8_unicode_ci NOT NULL,
  `content` text COLLATE utf8_unicode_ci NOT NULL,
  `created` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `wholesale`
--

INSERT INTO `wholesale` (`id`, `name`, `slug`, `content`, `created`) VALUES
(1, 'Hợp Tác Kinh Doanh', 'hop-tac-kinh-doanh', '<h2 style=\"text-align: center;\"><span style=\"color:#daa520\"><strong>KQHP hợp t&aacute;c kinh doanh với c&aacute;&nbsp;nh&acirc;n, tổ chức hay đơn vị n&agrave;o mong muốn&nbsp;</strong></span></h2>\r\n\r\n<p style=\"text-align: center;\">&nbsp;</p>\r\n\r\n<p style=\"text-align: center;\"><span style=\"color:#daa520\"><strong>CH&Iacute;NH S&Aacute;CH D&Agrave;NH CHO ĐẠI L&Yacute;</strong></span></p>\r\n\r\n<p><strong>I. CH&Iacute;NH S&Aacute;CH CHUNG VỀ PH&Aacute;T TRIỂN ĐẠI L&Yacute;:</strong></p>\r\n\r\n<p><strong>- Tạo dựng mối quan hệ đối t&aacute;c d&agrave;i hạn tr&ecirc;n cơ sở những cam kết hợp t&aacute;c v&agrave; chia sẻ mục ti&ecirc;u.</strong></p>\r\n\r\n<p><strong>- Lu&ocirc;n t&igrave;m kiếm cơ hội ph&aacute;t triển cũng như sẵn s&agrave;ng chia sẻ cơ hội, lợi &iacute;ch kinh doanh với qu&yacute; đại l&yacute;.</strong></p>\r\n\r\n<p><strong>- Lu&ocirc;n quan t&acirc;m đến Qu&yacute; đai l&yacute; cũng như lu&ocirc;n c&oacute; những điều chỉnh hợp l&yacute; n&acirc;ng cao hiệu quả hợp t&aacute;c quan hệ kinh doanh của 2 b&ecirc;n.</strong></p>\r\n\r\n<p><strong>- Hợp t&aacute;c tr&ecirc;n cở sở WIN - WIN, v&igrave; lợi &iacute;ch của cả 2 b&ecirc;n</strong></p>\r\n\r\n<p><strong>- Thường xuy&ecirc;n chia sẻ th&ocirc;ng tin về sản phẩm v&agrave; hỗ trợ kịp thời</strong></p>\r\n\r\n<p><strong>- Ch&iacute;nh s&aacute;ch hỗ trợ c&ocirc;ng bằng v&agrave; hợp l&yacute; tr&ecirc;n to&agrave;n bộ k&ecirc;nh ph&acirc;n phối.</strong></p>\r\n\r\n<p><strong>II. CH&Iacute;NH S&Aacute;CH VỀ T&Agrave;I CH&Iacute;NH:</strong></p>\r\n\r\n<p><strong>1. Ch&iacute;nh s&aacute;ch chiết khấu:</strong></p>\r\n\r\n<p><strong>Dựa tr&ecirc;n thực tế số lượng sản phẩm b&aacute;n ra, căn cứ v&agrave;o bảng gi&aacute; sản phẩm, c&aacute;c đại l&yacute; sẽ được hưởng chiết khấu ưu đ&atilde;i.</strong></p>\r\n\r\n<p><strong>● Ch&iacute;nh s&aacute;ch chiết khấu n&agrave;y được thực hiện độc l&acirc;p v&agrave; tiến h&agrave;nh song song với c&aacute;c chương tr&igrave;nh hỗ trợ hoặc th&uacute;c đẩy kinh doanh từ KẸO QUE HẠNH PH&Uacute;C THIỆN LƯƠNG cho c&aacute;c đại l&yacute;.</strong></p>\r\n\r\n<p><strong>● Tỷ lệ chiết khấu sẽ được thay đổi theo từng thời kỳ v&agrave; t&ugrave;y thuộc t&igrave;nh h&igrave;nh kinh doanh của c&aacute;c đại l&yacute;.</strong></p>\r\n\r\n<p><strong>2. Ch&iacute;nh s&aacute;ch gi&aacute;, bảo vệ gi&aacute;:</strong></p>\r\n\r\n<p><strong>- Căn cứ v&agrave;o kết quả mua h&agrave;ng v&agrave; c&aacute;c cam kết hợp t&aacute;c kh&aacute;c, Qu&yacute; đại l&yacute; sẽ được hưởng ch&iacute;nh s&aacute;ch gi&aacute; d&agrave;nh cho cấp đại l&yacute; tương ứng.</strong></p>\r\n\r\n<p><strong>- Ch&iacute;nh s&aacute;ch gi&aacute; được x&acirc;y dựng để đảm bảo t&iacute;nh cạnh tranh v&agrave; lợi nhuận tối đa cho Qu&yacute; đại l&yacute; tr&ecirc;n thị trường.</strong></p>\r\n\r\n<p><strong>III. CH&Iacute;NH S&Aacute;CH HỖ TRỢ:</strong></p>\r\n\r\n<p><strong>1. Hỗ trợ về PR &ndash; Marketing:</strong></p>\r\n\r\n<p><strong>- Qu&yacute; đại l&yacute; được hỗ trợ catalogue, tờ rơi, banner, &hellip; theo c&aacute;c chương tr&igrave;nh của c&ocirc;ng ty. Th&ocirc;ng tin về Qu&yacute; đại l&yacute; sẽ được quảng c&aacute;o c&ugrave;ng c&ocirc;ng ty tr&ecirc;n c&aacute;c phương tiện th&ocirc;ng tin đại ch&uacute;ng.</strong></p>\r\n\r\n<p><strong>- Qu&yacute; đại l&yacute; được tham gia tất cả c&aacute;c chương tr&igrave;nh khuyến m&atilde;i v&agrave; th&uacute;c đẩy b&aacute;n h&agrave;ng của c&ocirc;ng ty.</strong></p>\r\n\r\n<p><strong>- Qu&yacute; đại l&yacute; được cấp giấy chứng nhận l&agrave; đại l&yacute; ch&iacute;nh thức của c&ocirc;ng ty.</strong></p>\r\n\r\n<p><strong>- Qu&yacute; đại l&yacute; được update th&ocirc;ng tin về gi&aacute; cả, th&ocirc;ng tin h&agrave;ng ho&aacute;, sản phẩm, ch&iacute;nh s&aacute;ch của C&ocirc;ng ty, c&aacute;c chương tr&igrave;nh marketing, c&aacute;c t&agrave;i liệu th&uacute;c đẩy b&aacute;n h&agrave;ng.</strong></p>\r\n\r\n<p><strong>- Hai b&ecirc;n c&ugrave;ng nhau phối hợp để x&uacute;c tiến, quảng b&aacute; v&agrave; b&aacute;n c&aacute;c sản phẩm th&ocirc;ng qua c&aacute;c h&igrave;nh thức như đăng th&ocirc;ng tin sản phẩm mới, sản phẩm c&oacute; khuyến m&atilde;i, sản phẩm nổi bật, đăng logo thương hiệu sản phẩm, nh&agrave; sản xuất v&agrave; nh&agrave; cung cấp.</strong></p>\r\n\r\n<p><strong>- Đại l&yacute; sẽ trở th&agrave;nh k&ecirc;nh ph&acirc;n phối, v&agrave; được c&ocirc;ng ty giới thiệu kh&aacute;ch h&agrave;ng tr&ecirc;n địa b&agrave;n.</strong></p>\r\n\r\n<p><strong>2. Hỗ trợ về Th&ocirc;ng tin sản phẩm, giải ph&aacute;p:</strong></p>\r\n\r\n<p><strong>- Qu&yacute; đại l&yacute; được hỗ trợ giải đ&aacute;p những phản hồi của kh&aacute;ch h&agrave;ng về sản phẩm qua điện thoại hoặc email.</strong></p>\r\n\r\n<p><strong>3. Hỗ trợ về h&agrave;ng h&oacute;a:</strong></p>\r\n\r\n<p><strong>- Đổi h&agrave;ng: Trong v&ograve;ng 7 ng&agrave;y kể từ ng&agrave;y xuất h&oacute;a đơn, Qu&yacute; đại l&yacute; sẽ được đổi h&agrave;ng mới nếu sản phẩm được x&aacute;c định thuộc lỗi của nh&agrave; sản xuất</strong></p>\r\n', '2016-10-27 09:40:00'),
(2, 'Phương Thức Đặt Hàng', 'phuong-thuc-dat-hang', '<p style=\"text-align: center;\"><img alt=\"\" src=\"/upload/user/admin/images/Mi.PNG\" style=\"height:1246px; width:900px\" /></p>\r\n', '2016-10-27 09:41:00');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `about`
--
ALTER TABLE `about`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `admin_group`
--
ALTER TABLE `admin_group`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `catalog`
--
ALTER TABLE `catalog`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `comments_cat`
--
ALTER TABLE `comments_cat`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `news_cat`
--
ALTER TABLE `news_cat`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`id`),
  ADD KEY `transaction_id` (`transaction_id`,`product_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Chỉ mục cho bảng `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`),
  ADD KEY `catalog_id` (`catalog_id`);

--
-- Chỉ mục cho bảng `rating`
--
ALTER TABLE `rating`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `slider`
--
ALTER TABLE `slider`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `transaction`
--
ALTER TABLE `transaction`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`,`created`);

--
-- Chỉ mục cho bảng `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `video`
--
ALTER TABLE `video`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `wholesale`
--
ALTER TABLE `wholesale`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `about`
--
ALTER TABLE `about`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `admin_group`
--
ALTER TABLE `admin_group`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `catalog`
--
ALTER TABLE `catalog`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT cho bảng `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `comments_cat`
--
ALTER TABLE `comments_cat`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `news`
--
ALTER TABLE `news`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `news_cat`
--
ALTER TABLE `news_cat`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `order`
--
ALTER TABLE `order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT cho bảng `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT cho bảng `rating`
--
ALTER TABLE `rating`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `slider`
--
ALTER TABLE `slider`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `transaction`
--
ALTER TABLE `transaction`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT cho bảng `video`
--
ALTER TABLE `video`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `wholesale`
--
ALTER TABLE `wholesale`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `order`
--
ALTER TABLE `order`
  ADD CONSTRAINT `order_ibfk_1` FOREIGN KEY (`transaction_id`) REFERENCES `transaction` (`id`),
  ADD CONSTRAINT `order_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`);

--
-- Các ràng buộc cho bảng `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_ibfk_1` FOREIGN KEY (`catalog_id`) REFERENCES `catalog` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
