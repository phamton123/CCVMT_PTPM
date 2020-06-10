-- phpMyAdmin SQL Dump
-- version 4.8.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 05, 2019 at 03:00 PM
-- Server version: 10.1.31-MariaDB
-- PHP Version: 5.6.35

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pro1013`
--

-- --------------------------------------------------------

--
-- Table structure for table `answers`
--

CREATE TABLE `answers` (
  `id` int(11) NOT NULL,
  `question_id` int(11) NOT NULL,
  `student_id` int(11) DEFAULT NULL,
  `answer` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `answers`
--

INSERT INTO `answers` (`id`, `question_id`, `student_id`, `answer`) VALUES
(59, 68, 47, 'dadsfsdfffffffffffffffffffffffffff'),
(60, 69, 47, 'eqweqweqweqwe'),
(61, 67, 47, 'adsfsdfffffffffffffffffffffffffff2'),
(62, 70, 47, 'ssd'),
(63, 71, 47, '123dasd'),
(64, 72, 47, 'ádasd'),
(65, 73, 47, 'ádasdas'),
(66, 74, 47, '..,,m,'),
(67, 67, 52, '1'),
(68, 68, 52, 'fadsfsdfffffffffffffffffffffffffff'),
(69, 69, 52, 'qưeqweqwe'),
(70, 70, 52, '12sdsd'),
(71, 71, 52, '123dasd'),
(83, 73, 52, 'ádasdas'),
(84, 74, 52, '..,,m,'),
(85, 72, 52, '12'),
(86, 67, 44, '1'),
(87, 68, 44, 'fadsfsdfffffffffffffffffffffffffff'),
(88, 69, 44, 'qưeqweqwe'),
(89, 70, 44, '12sdsd'),
(90, 71, 44, '123dasd'),
(91, 72, 44, 'ádasd'),
(92, 73, 44, 'ytu'),
(93, 74, 44, '..,,m,');

-- --------------------------------------------------------

--
-- Table structure for table `baikiemtra`
--

CREATE TABLE `baikiemtra` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `day` date NOT NULL,
  `chitiet` text NOT NULL,
  `class_id` int(11) NOT NULL,
  `course_id` int(11) DEFAULT NULL,
  `teacher_id` int(11) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `baikiemtra`
--

INSERT INTO `baikiemtra` (`id`, `name`, `day`, `chitiet`, `class_id`, `course_id`, `teacher_id`, `status`) VALUES
(2, 'Test', '2018-11-19', '<p>\r\n\r\n</p><div></div>\r\n\r\nSinh viên có thể tự chọn đề tài hoặc do GV giao hoặc do doanh nghiệp thực tập giao. Sau\r\nđây là vài đề tài gợi ý&nbsp; Bán hàng (theo nhóm mặt hàng cụ thể nào đó: thể thao, thời trang, ẩm thực, điện\r\nthoại…)&nbsp; Du lịch&nbsp; Nhà hàng&nbsp; Khách sạn&nbsp; Quản lý kho&nbsp; Quản lý nhân sự&nbsp; Quản lý dự án&nbsp; Bất động sản&nbsp; Thời trang&nbsp; Ẩm thực đường phố<div><br><div><img alt=\"\" src=\"https://cdn-images-1.medium.com/max/1600/0*etdjXi7_8W5sDkzy.png\"><br></div></div>', 30, 5, 0, 0),
(3, 'Nguyễn Trí Diện', '2018-12-04', '<p>\r\n\r\nNhững Ca Khúc Nhạc Trẻ Hay Nhất 2016 - Tuyển Chọn Liên Khúc Nhạc Trẻ Mới Nhất Hiện Nay\r\n♫ Danh Sách 40 Bài Hát Nhạc Trẻ :\r\n01. Nước Mắt Trong Mưa - Phạm Trưởng ft Trịnh Phong\r\n02. Biết Em Chưa Thể Quên - Trương Ngôn\r\n03. Hết Rồi - Hồ Quang Hiếu\r\n04. Nỗi Đau Mình Anh - Châu Khải Phong ft Trịnh Đình Quang\r\n05. Yêu Anh Yêu Đến Đau Lòng - Song Thư\r\n06. Anh Sẽ Giả Vờ - Tường Quân\r\n07. Anh Đau Đủ Rồi - Vương Bảo Nam\r\n08. Có Anh Ở Đây Rồi - Anh Quân Idol\r\n09. Nỗi Đau Em Giấu Một Mình - Thuý Khanh\r\n- Say Nhưng Không Lầm - Sky\r\n10. Bữa Tối Một Mình - Châu Khải Phong\r\n11. Không Liên Quan - Phạm Trưởng ft Cảnh Minh\r\n12. Sự Thật Anh Biết Trước - Phạm Phước Tài\r\n13. Đâu Phải Ai Cũng Như Anh - Dương Nhất Linh\r\n14. Nếu Ngày Ấy - Khởi My\r\n15. Khó Đoán - Phạm Trưởng ft Trịnh Phong\r\n16. Không Còn Bình Yên - Hà Duy\r\n17. Yêu Vội Vàng - Lê Bảo Bình\r\n18. Một Lần Mất Niềm Tin - Lâm Chấn Khang\r\n19. Em Mãi Là Người Thay Thế - Wendy Thảo\r\n20. Xin Em Đừng Yêu Anh - Lý Tuấn Kiệt Ft Cao Nam Thành\r\n21. Nơi Ta Lạc Mất Nhau - Lê Trọng Hiếu\r\n22. Yêu Em Nhưng Không Với Tới - Bùi Vĩnh Phúc\r\n23. Im Lặng Và Ra Đi - Khánh Phương ft Anh Quân Idol\r\n24. Nỗi Buồn Sau Tiếng Cười - Đinh Kiến Phong\r\n25. Giữ Trọn Lời Hứa Khi Yêu - Quỳnh Hiểu Băng\r\n26. Chưa Kịp Nói Lời Yêu Em - Liu Quốc Việt\r\n27. Sao Còn Ôm Gối Mộng - Hồ Quang Hiếu\r\n28. Hôm Nay Là Ngày Chia Tay - Dương Nhất Linh\r\n29. Không Còn Nợ Nhau - Wendy Thảo\r\n30. Rút Kinh Nghiệm - Lý Tuấn Kiệt\r\n31. Đớn Đau Anh Vẫn Yêu - Châu Khải Phong\r\n32. Người Ta Không Yêu Em Đâu - Đường Tuấn Khang ft Tống Gia Vỹ\r\n33. Hãy Quên Anh Và Xa Anh - Đinh Kiến Phong ft Tường Quân\r\n34. Yêu Thương Của Em - Ngọc Thuý\r\n35. Tại Vì Sao - Lâm Chấn Khang ft Dương Nhất Linh\r\n36. Những Đồi Hoa Sim - Ngô Quốc Linh ft Ân Thiên Vỹ\r\n37. Khi Nỗi Đau Quá Lớn - Bùi Vĩnh Phúc\r\n38. Giả Vờ Đau - Lâm Chấn Khang\r\n39. Không Dành Cho Nhau - Lương Minh Trang\r\n40. Hối Tiếc - Trịnh Nhật Thăng\r\n41. Nếu Chỉ Là Trò Chơi - Minh Vương ft Quang Mẫn\r\n42. Đoạn Đường Vắng 2 - Khánh Phong\r\n43. Phải Làm Sao - Hồ Tuấn Anh ft Hồ Quang Hiếu\r\n44. Có Một Người Yêu Không Dễ Dàng - Trương Ỹ Vân\r\n45. Nhạt Nắng - Hoàng Thế Dũng\r\n46. Vợ Tương Lai - Cao Tùng Anh\r\n47. Sao Em Nỡ Vội Lấy Chồng - Khánh Phong\r\n48. Người Dưng Khác Họ - Cao Vũ\r\n49. Giữ Trọn Lời Hứa Khi Yêu - Quỳnh Hiểu Băng\r\n50. Mong Em Quay Về - Vương Bảo Nam\r\n\r\n<br></p>', 27, 1, 0, 0),
(4, 'IELTS_1', '2018-12-04', '<p>\r\n\r\nNhững Ca Khúc Nhạc Trẻ Hay Nhất 2016 - Tuyển Chọn Liên Khúc Nhạc Trẻ Mới Nhất Hiện Nay\r\n♫ Danh Sách 40 Bài Hát Nhạc Trẻ :\r\n01. Nước Mắt Trong Mưa - Phạm Trưởng ft Trịnh Phong\r\n02. Biết Em Chưa Thể Quên - Trương Ngôn\r\n03. Hết Rồi - Hồ Quang Hiếu\r\n04. Nỗi Đau Mình Anh - Châu Khải Phong ft Trịnh Đình Quang\r\n05. Yêu Anh Yêu Đến Đau Lòng - Song Thư\r\n06. Anh Sẽ Giả Vờ - Tường Quân\r\n07. Anh Đau Đủ Rồi - Vương Bảo Nam\r\n08. Có Anh Ở Đây Rồi - Anh Quân Idol\r\n09. Nỗi Đau Em Giấu Một Mình - Thuý Khanh\r\n- Say Nhưng Không Lầm - Sky\r\n10. Bữa Tối Một Mình - Châu Khải Phong\r\n11. Không Liên Quan - Phạm Trưởng ft Cảnh Minh\r\n12. Sự Thật Anh Biết Trước - Phạm Phước Tài\r\n13. Đâu Phải Ai Cũng Như Anh - Dương Nhất Linh\r\n14. Nếu Ngày Ấy - Khởi My\r\n15. Khó Đoán - Phạm Trưởng ft Trịnh Phong\r\n16. Không Còn Bình Yên - Hà Duy\r\n17. Yêu Vội Vàng - Lê Bảo Bình\r\n18. Một Lần Mất Niềm Tin - Lâm Chấn Khang\r\n19. Em Mãi Là Người Thay Thế - Wendy Thảo\r\n20. Xin Em Đừng Yêu Anh - Lý Tuấn Kiệt Ft Cao Nam Thành\r\n21. Nơi Ta Lạc Mất Nhau - Lê Trọng Hiếu\r\n22. Yêu Em Nhưng Không Với Tới - Bùi Vĩnh Phúc\r\n23. Im Lặng Và Ra Đi - Khánh Phương ft Anh Quân Idol\r\n24. Nỗi Buồn Sau Tiếng Cười - Đinh Kiến Phong\r\n25. Giữ Trọn Lời Hứa Khi Yêu - Quỳnh Hiểu Băng\r\n26. Chưa Kịp Nói Lời Yêu Em - Liu Quốc Việt\r\n27. Sao Còn Ôm Gối Mộng - Hồ Quang Hiếu\r\n28. Hôm Nay Là Ngày Chia Tay - Dương Nhất Linh\r\n29. Không Còn Nợ Nhau - Wendy Thảo\r\n30. Rút Kinh Nghiệm - Lý Tuấn Kiệt\r\n31. Đớn Đau Anh Vẫn Yêu - Châu Khải Phong\r\n32. Người Ta Không Yêu Em Đâu - Đường Tuấn Khang ft Tống Gia Vỹ\r\n33. Hãy Quên Anh Và Xa Anh - Đinh Kiến Phong ft Tường Quân\r\n34. Yêu Thương Của Em - Ngọc Thuý\r\n35. Tại Vì Sao - Lâm Chấn Khang ft Dương Nhất Linh\r\n36. Những Đồi Hoa Sim - Ngô Quốc Linh ft Ân Thiên Vỹ\r\n37. Khi Nỗi Đau Quá Lớn - Bùi Vĩnh Phúc\r\n38. Giả Vờ Đau - Lâm Chấn Khang\r\n39. Không Dành Cho Nhau - Lương Minh Trang\r\n40. Hối Tiếc - Trịnh Nhật Thăng\r\n41. Nếu Chỉ Là Trò Chơi - Minh Vương ft Quang Mẫn\r\n42. Đoạn Đường Vắng 2 - Khánh Phong\r\n43. Phải Làm Sao - Hồ Tuấn Anh ft Hồ Quang Hiếu\r\n44. Có Một Người Yêu Không Dễ Dàng - Trương Ỹ Vân\r\n45. Nhạt Nắng - Hoàng Thế Dũng\r\n46. Vợ Tương Lai - Cao Tùng Anh\r\n47. Sao Em Nỡ Vội Lấy Chồng - Khánh Phong\r\n48. Người Dưng Khác Họ - Cao Vũ\r\n49. Giữ Trọn Lời Hứa Khi Yêu - Quỳnh Hiểu Băng\r\n50. Mong Em Quay Về - Vương Bảo Nam\r\n\r\n<br></p>', 28, 2, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `classes`
--

CREATE TABLE `classes` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `course_id` int(11) NOT NULL,
  `created_at` date NOT NULL,
  `ended_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `classes`
--

INSERT INTO `classes` (`id`, `name`, `course_id`, `created_at`, `ended_at`) VALUES
(27, 'Toiec_1ứdsd', 1, '2018-11-26', '2018-12-25'),
(28, 'IELTS_1', 2, '2018-11-26', '2018-12-25'),
(29, 'IELTS_2', 1, '2019-04-05', '2019-04-29'),
(30, 'Toiec_2', 1, '2019-04-06', '2019-04-30');

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `image` varchar(225) NOT NULL,
  `tomtat` text NOT NULL,
  `soTiet` int(11) NOT NULL,
  `hocphi` int(11) NOT NULL,
  `des` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`id`, `name`, `image`, `tomtat`, `soTiet`, `hocphi`, `des`) VALUES
(1, 'Toiec', 'img/dai-dien-khoa-hoc-phien-dich-tieng-han-ha-noi-600x312.png', '      Học tiếng Hàn đi xuất khẩu lao động Hàn Quốc theo chương trình EPS Topik tại Hà Nội, giúp bạn hoàn thành tốt kỳ thi và đạt kết quả cao.1', 10, 40000000, '<p>\r\n\r\n</p><h1></h1>\r\n\r\n<p></p>\r\n\r\n<p>Toidicode.com là một blog cá nhân chuyên viết về lập trình và những thứ linh tinh nhất trên đời. Được thành lập từ 25-12-2016 bởi thanhtaivtt, cho đến nay thì website vẫn đang trong quá trình <strong>beta</strong>&nbsp;chạy thử nghiệm.</p><h3><br></h3>'),
(2, 'IELTS', 'img/dai-dien-luyen-thi-topik-tai-ha-noi-600x312.png', 'Học tiếng Hàn đi xuất khẩu lao động Hàn Quốc theo chương trình EPS Topik tại Hà Nội, giúp bạn hoàn thành tốt kỳ thi và đạt kết quả cao.', 10, 40000000, '<p>\r\n\r\n</p><p>Toidicode.com là một blog cá nhân chuyên viết về lập trình và những thứ linh tinh nhất trên đời. Được thành lập từ 25-12-2016 bởi thanhtaivtt, cho đến nay thì website vẫn đang trong quá trình <strong>beta</strong>&nbsp;chạy thử nghiệm.</p><h3>Mục Tiêu</h3><p>Toidicode.com hoạt động với vai trò là blog chia sẻ kiến thức lập trình cũng như những kinh nghiệm làm việc của tác giả.</p><p>Trong tương lai thì blog sẽ có nhiều bài viết hơn, sẽ đa dạng hơn về các ngôn ngữ nhằm đáp ứng nhu cầu cho các bạn sinh viên có nhu cầu tự học lập trình và các bạn đang đi làm muốn nâng cao trình độ của bản thân.</p><p>Ngoài viết về chủ đề lập trình thì trong năm nay toidicode.com sẽ update thêm các bài viết liên quan đến chủ đề SEO, Digital,... mời các bạn đón đọc.</p><h3>Doanh Thu</h3><p>Ngoài chạy quảng cáo adsence để có kinh phí duy trì trang web thì tôi sẽ không chấp nhận các dạng quảng cáo như giới thiệu trung tâm học lập trình uy tín,... Nếu như quảng cáo có che mất nội dung của trang web rất mong mọi người <a target=\"_blank\" rel=\"nofollow\" href=\"http://toidicode.com/lien-he.html\">feedback</a>&nbsp;cho tôi, để tôi khắc phục sớm nhất có thể.</p>\r\n\r\n<p></p>'),
(3, 'Giao tiếp cơ bản', 'img/5bf2bc17ef42f.jpg', 'Học tiếng Hàn đi xuất khẩu lao động Hàn Quốc theo chương trình EPS Topik tại Hà Nội, giúp bạn hoàn thành tốt kỳ thi và đạt kết quả cao.', 10, 40000000, '<p>qưeqweq1</p>'),
(4, 'Tiếng anh chuyên', 'img/5bf7e62b25bf4.jpg', 'Ready to challenge yourself? Well, you’re in luck! Don’t you worry, we’ve got the best mind teasers, trivia, ', 10, 40000000, '<p>\r\n\r\n</p><p>Ready to challenge yourself? Well, you’re in luck! Don’t you worry, we’ve got the best mind teasers, trivia, and general knowledge questions to test how smart you really are when it comes to all things knowledge, education, and more! If you consider yourself a wiz when it comes to riddles, or if you just need a break from the hectic world around you - give this quiz a try!</p><p>Do you know the biggest planet in our solar system? What about the full lyrics to Michael Jackson’s “Beat It”? Can you quote every line from “Pretty Woman”, or figure out how many mittens two iguanas and three kittens would need to stay warm in the winter? If you said yes to any of these questions, then this is the place for you! From quizzes about your hometown to quizzes about your favorite songs, women.com has it all!</p><p>Looking for a math test? A grammar test? A movie test? Or maybe even a nursery rhyme test? Whatever your heart desires, we can quiz you on it! Visit women.com/quizzes to check out some of our other viral content, and as always, don’t forget to share with your friends! Our goal at women.com is to make people feel good about who they are - and take a relaxing break from the world outside to do something that they enjoy.</p><p>So take a breath, stop whatever you’re doing, and get ready to have a little fun. This three-minute escape is exactly what you need!</p>\r\n\r\n<br><p></p>'),
(5, 'Chuyên ngành', 'img/5bf819deec1bd.jpg', 'ưqeqweqweqw', 10, 40000000, '<p>123123123123</p>');

-- --------------------------------------------------------

--
-- Table structure for table `dangky`
--

CREATE TABLE `dangky` (
  `id` int(11) NOT NULL,
  `student_id` int(11) DEFAULT NULL,
  `course_id` int(11) NOT NULL,
  `class_id` int(11) NOT NULL,
  `created_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `dangky`
--

INSERT INTO `dangky` (`id`, `student_id`, `course_id`, `class_id`, `created_at`) VALUES
(32, 44, 1, 29, '2018-12-12'),
(33, 45, 1, 29, '2018-12-13'),
(35, 47, 1, 27, '2018-12-17'),
(36, 48, 2, 28, '2018-12-17'),
(37, 49, 2, 28, '2018-12-17'),
(38, 50, 1, 29, '2018-12-17'),
(39, 51, 1, 29, '2018-12-17'),
(40, 52, 1, 29, '2018-12-17'),
(41, 53, 1, 27, '2018-12-17'),
(231, 53, 1, 27, '2019-01-01'),
(232, 53, 1, 27, '2019-01-01'),
(233, 53, 1, 27, '2019-01-01'),
(234, 53, 1, 27, '2019-01-01'),
(235, 53, 1, 27, '2019-01-01'),
(236, 53, 1, 27, '2019-01-01'),
(237, 53, 1, 27, '2019-01-01'),
(238, 137, 1, 27, '2019-01-01'),
(239, 138, 1, 27, '2019-01-01'),
(240, 138, 1, 27, '2019-01-01'),
(241, 139, 1, 27, '2019-01-01'),
(242, 139, 1, 27, '2019-01-01'),
(243, 140, 1, 27, '2019-01-01'),
(244, 140, 1, 27, '2019-01-01'),
(245, 141, 1, 27, '2019-01-01'),
(246, 142, 1, 27, '2019-01-01'),
(247, 143, 1, 27, '2019-01-01'),
(248, 143, 1, 27, '2019-01-01'),
(249, 143, 1, 27, '2019-01-01'),
(250, 144, 1, 27, '2019-01-01'),
(251, 144, 1, 27, '2019-01-01');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `id` int(11) NOT NULL,
  `title` varchar(225) NOT NULL,
  `content` text NOT NULL,
  `created_at` date NOT NULL,
  `created_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`id`, `title`, `content`, `created_at`, `created_by`) VALUES
(3, 'Tin tức', '<p>sdsafds</p>', '2018-11-20', NULL),
(4, 'Nước mía', '<p>sadasda</p>', '2018-11-22', NULL),
(5, 'Sản phẩm khác', '<p>đâsdsdasdasdasdsa</p>', '2018-12-12', NULL),
(6, 'Tin tức 12', '<p>sadasdsadasdasdasdasdasd</p>', '2018-12-13', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `feedback_details`
--

CREATE TABLE `feedback_details` (
  `id` int(11) NOT NULL,
  `feedback_id` int(11) DEFAULT NULL,
  `student_id` int(11) NOT NULL,
  `created_at` date NOT NULL,
  `des` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `lesson`
--

CREATE TABLE `lesson` (
  `id` int(11) NOT NULL,
  `name` varchar(225) NOT NULL,
  `chitiet` text NOT NULL,
  `course_id` int(11) NOT NULL,
  `created_at` date NOT NULL,
  `created_by` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `lesson`
--

INSERT INTO `lesson` (`id`, `name`, `chitiet`, `course_id`, `created_at`, `created_by`) VALUES
(5, 'Nguyễn Trí Diện12', 'img/pr1-converted.pdf', 1, '2018-12-14', 1),
(6, 'Nguyễn Trí Diện', 'img/sample.pdf', 2, '2018-12-14', 1);

-- --------------------------------------------------------

--
-- Table structure for table `page`
--

CREATE TABLE `page` (
  `id` int(11) NOT NULL,
  `content` text NOT NULL,
  `video` text NOT NULL,
  `tomtat` text NOT NULL,
  `image` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `page`
--

INSERT INTO `page` (`id`, `content`, `video`, `tomtat`, `image`) VALUES
(1, '<p>\r\n\r\n</p><h1></h1>\r\n\r\n<p></p>\r\n\r\n<p>Toidicode.com là một blog cá nhân chuyên viết về lập trình và những thứ linh tinh nhất trên đời. Được thành lập từ 25-12-2016 bởi thanhtaivtt, cho đến nay thì website vẫn đang trong quá trình <strong>beta</strong>&nbsp;chạy thử nghiệm.</p><h3>Mục Tiêu</h3><p>Toidicode.com hoạt động với vai trò là blog chia sẻ kiến thức lập trình cũng như những kinh nghiệm làm việc của tác giả.</p><p>Trong tương lai thì blog sẽ có nhiều bài viết hơn, sẽ đa dạng hơn về các ngôn ngữ nhằm đáp ứng nhu cầu cho các bạn sinh viên có nhu cầu tự học lập trình và các bạn đang đi làm muốn nâng cao trình độ của bản thân.</p><p>Ngoài viết về chủ đề lập trình thì trong năm nay toidicode.com sẽ update thêm các bài viết liên quan đến chủ đề SEO, Digital,... mời các bạn đón đọc.</p><h3>Doanh Thu</h3><p>Ngoài chạy quảng cáo adsence để có kinh phí duy trì trang web thì tôi sẽ không chấp nhận các dạng quảng cáo như giới thiệu trung tâm học lập trình uy tín,... Nếu như quảng cáo có che mất nội dung của trang web rất mong mọi người <a target=\"_blank\" rel=\"nofollow\" href=\"http://toidicode.com/lien-he.html\">feedback</a>&nbsp;cho tôi, để tôi khắc phục sớm nhất có thể.</p><h3>Vấn đề riêng tư</h3><p>Vấn đề riêng tư của khách truy cập là rất quan trọng đối với tôi, nên tôi <strong>cam kết</strong>&nbsp;sẽ không lưu trữ các thông tin riêng tư, nhạy cảm của người truy cập.</p><h3>Bình Luận</h3><p>Về vấn đề bình luận thì tạm thời tôi vẫn đang cho phép người dùng bình luận trên facebook, nhưng nếu như các bạn có những bình luận thô tục, vô văn hóa,... thì tôi sẽ block bạn (trên trang của tôi) để tạo ra một cộng đồng trong sạch hơn.</p><h3>Cộng đồng</h3><p>- Hiện tại tôi đang hoạt động trên các mạng xã hội:</p><ul><li><a target=\"_blank\" rel=\"nofollow\" href=\"https://www.facebook.com/toidicode/\">Facebook Fanpage</a></li><li><a target=\"_blank\" rel=\"nofollow\" href=\"https://plus.google.com/+ThanhT%C3%A0ithanhtaivtt?hl=vi\">Google+</a></li><li><a target=\"_blank\" rel=\"nofollow\" href=\"https://www.facebook.com/groups/toidicodegroup/\">Facebooke Group</a></li></ul>\r\n\r\n<p></p>\r\n\r\n<p></p><p><br></p>', '<div class=\"embed-responsive embed-responsive-16by9\">                                         <iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/dfpAnFVKcLs\" frameborder=\"0\" allow=\"accelerometer; autoplay; en', 'Chị Nguyễn Hồng Hạnh (Hà Nội) Tôi rất tin tưởng vào chất lượng dạy và học tại AMES ENGLISH. Các thầy cô có phương pháp giảng dạy tốt, đồ dùng dạy học rất phong phú. Hai cháu nhà tôi đã học tại đây 4 năm rồi, cứ đến thứ Bảy, Chủ Nhật là các cháu lại háo hức đến trung tâm để học với các thầy cô giáo nước ngoài. chị Nguyễn Hồng Hạnh (Hà Nội)  Tôi rất tin tưởng vào chất lượng dạy và học tại AMES ENGLISH. Các thầy cô có phương pháp giảng dạy tốt, đồ dùng dạy học rất phong phú. Hai cháu nhà tôi đã học tại đây 4 năm rồi, cứ đến thứ Bảy, Chủ Nhật là các cháu lại háo hức đến trung tâm để học với các thầy cô giáo nước ngoài.', 'img/welcome-1.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `question`
--

CREATE TABLE `question` (
  `id` int(11) NOT NULL,
  `question` varchar(225) NOT NULL,
  `quiz_id` int(11) NOT NULL,
  `A` varchar(225) NOT NULL,
  `B` varchar(225) NOT NULL,
  `C` varchar(225) NOT NULL,
  `D` varchar(225) NOT NULL,
  `isCorrect` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `question`
--

INSERT INTO `question` (`id`, `question`, `quiz_id`, `A`, `B`, `C`, `D`, `isCorrect`) VALUES
(67, 'là aiadsfsdfffffffffffffffffffffffffff', 9, '1', 'adsfsdfffffffffffffffffffffffffff1', 'adsfsdfffffffffffffffffffffffffff2', 'adsfsdfffffffffffffffffffffffffff3', '1'),
(68, 'là ai12', 9, '2', 'dadsfsdfffffffffffffffffffffffffff', 'fadsfsdfffffffffffffffffffffffffff', 'iadsfsdfffffffffffffffffffffffffff', '2'),
(69, 'là ai1', 9, 'qưeqwe', 'qưeqweqwe', 'qưeqweqw', 'eqweqweqweqwe', 'qưeqwe'),
(70, 'là ai12', 10, '12', '12sdsd', 'ssd', 'sdsdsdsdsd', '12sdsd'),
(71, 'là ai ưadasdsadsad', 10, '12', 'Nguyễn Trí Diện', 'Nguyễn Trí Diện1', '123dasd', '123dasd'),
(72, 'là ai ưadasdsadsadsadasdasddddddddđ', 10, '12', 'Nguyễn Trí Diện', 'ádasd', '123dasd', '12'),
(73, 'sadasdasdas', 11, 'ádasdas', 'xc', 'ytu', 'gh', 'ytu'),
(74, '1313213', 11, '123', '34', '67', '..,,m,', '..,,m,'),
(75, 'là ai12', 9, 'sad', 'ádasd', '1', '1', '1');

-- --------------------------------------------------------

--
-- Table structure for table `quiz`
--

CREATE TABLE `quiz` (
  `id` int(11) NOT NULL,
  `name` varchar(225) NOT NULL,
  `course_id` int(11) NOT NULL,
  `created_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `quiz`
--

INSERT INTO `quiz` (`id`, `name`, `course_id`, `created_at`) VALUES
(9, 'Quiz 1', 1, '2018-12-17'),
(10, 'Quiz 2', 1, '2018-12-17'),
(11, 'Quiz 3', 1, '2018-12-17'),
(12, 'Quiz 4', 1, '2018-12-17'),
(13, 'Quiz 1', 2, '2018-12-19');

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `name` varchar(225) NOT NULL,
  `icons` varchar(225) NOT NULL,
  `link` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`id`, `user_id`, `name`, `icons`, `link`) VALUES
(1, 0, 'Điểm danh', 'fa fa-check-square-o', 'lop'),
(2, 0, 'Bảng điểm', 'fa fa-pencil-square-o', 'hocvien'),
(3, 0, 'Thời khóa biểu', 'fa fa-table', 'thoikhoabieu'),
(4, 0, 'Bài tập', 'fa fa-file-text', 'baitap'),
(5, 1, 'Lớp học', 'fa fa-university', 'lop'),
(7, 1, 'Thời khóa biểu', 'fa fa-table', 'thoikhoabieu'),
(8, 1, 'Bài tập', 'fa fa-file-text', 'baitap'),
(9, 500, 'Khóa học', 'fa fa-book', 'khoahoc'),
(10, 500, 'Lớp học', 'fa fa-university', 'lop'),
(11, 500, 'Giáo viên', 'fa fa-users', 'giaovien'),
(14, 500, 'Khách hàng', 'fa fa-user-circle-o', 'khachhang'),
(15, 500, 'Nhân viên', 'fa fa-users', 'nhanvien'),
(16, 500, 'Thời khóa biểu', 'fa fa-table', 'thoikhoabieu'),
(17, 500, 'Bài tập', 'fa fa-file-text', 'baitap'),
(18, 500, 'Học viên', 'fa fa-user-plus', 'hocvien'),
(19, 500, 'Slideshow', 'fa fa-file-image-o', 'anh'),
(20, 500, 'Feedback', 'fa fa-share', 'feedback'),
(21, 500, 'Cấu hình', 'fa fa-cog', 'cau-hinh'),
(22, 500, 'Phòng học', 'fa fa-home', 'phong'),
(23, 500, 'Quiz', 'fa fa-desktop', 'quiz'),
(24, 0, 'Quiz', 'fa fa-desktop', 'quiz');

-- --------------------------------------------------------

--
-- Table structure for table `rooms`
--

CREATE TABLE `rooms` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `des` varchar(200) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `rooms`
--

INSERT INTO `rooms` (`id`, `name`, `des`, `status`) VALUES
(1, 'P01', '', 1),
(2, 'P02', 'sadsadsadsad', 1),
(4, 'P03', '', 1),
(5, 'P04', 'sadsada', 1),
(6, 'P05', '', 1),
(7, 'P06', '', 1),
(8, 'P07', '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `scores`
--

CREATE TABLE `scores` (
  `id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `course_id` int(11) NOT NULL,
  `teacher_id` int(11) NOT NULL,
  `first_test` float DEFAULT NULL,
  `secord_test` float DEFAULT NULL,
  `final_test` float DEFAULT NULL,
  `diemTB` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `scores`
--

INSERT INTO `scores` (`id`, `student_id`, `course_id`, `teacher_id`, `first_test`, `secord_test`, `final_test`, `diemTB`) VALUES
(22, 0, 1, 0, NULL, NULL, NULL, 0),
(23, 0, 1, 0, NULL, NULL, NULL, 0),
(25, 0, 2, 0, NULL, NULL, NULL, 0),
(27, 0, 1, 0, NULL, NULL, NULL, 0),
(28, 0, 1, 0, NULL, NULL, NULL, 0),
(36, 42, 8, 0, NULL, NULL, NULL, 0),
(38, 44, 1, 0, NULL, NULL, NULL, 0),
(39, 45, 1, 0, NULL, NULL, NULL, 0),
(41, 47, 1, 0, NULL, NULL, NULL, 0),
(42, 48, 2, 0, NULL, NULL, NULL, 0),
(43, 49, 2, 0, NULL, NULL, NULL, 0),
(44, 50, 1, 0, NULL, NULL, NULL, 0),
(45, 51, 1, 0, NULL, NULL, NULL, 0),
(46, 52, 1, 0, NULL, NULL, NULL, 0),
(47, 53, 1, 0, NULL, NULL, NULL, 0),
(237, 53, 1, 0, NULL, NULL, NULL, 0),
(238, 53, 1, 0, NULL, NULL, NULL, 0),
(239, 53, 1, 0, NULL, NULL, NULL, 0),
(240, 53, 1, 0, NULL, NULL, NULL, 0),
(241, 53, 1, 0, NULL, NULL, NULL, 0),
(242, 53, 1, 0, NULL, NULL, NULL, 0),
(243, 53, 1, 0, NULL, NULL, NULL, 0),
(244, 137, 1, 0, NULL, NULL, NULL, 0),
(245, 138, 1, 0, NULL, NULL, NULL, 0),
(246, 138, 1, 0, NULL, NULL, NULL, 0),
(247, 139, 1, 0, NULL, NULL, NULL, 0),
(248, 139, 1, 0, NULL, NULL, NULL, 0),
(249, 140, 1, 0, NULL, NULL, NULL, 0),
(250, 140, 1, 0, NULL, NULL, NULL, 0),
(251, 141, 1, 0, NULL, NULL, NULL, 0),
(252, 142, 1, 0, NULL, NULL, NULL, 0),
(253, 143, 1, 0, NULL, NULL, NULL, 0),
(254, 143, 1, 0, NULL, NULL, NULL, 0),
(255, 143, 1, 0, NULL, NULL, NULL, 0),
(256, 144, 1, 0, NULL, NULL, NULL, 0),
(257, 144, 1, 0, NULL, NULL, NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `session`
--

CREATE TABLE `session` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `time` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `session`
--

INSERT INTO `session` (`id`, `name`, `time`) VALUES
(1, 'Ca 1', '7h15p-9h15p'),
(2, 'Ca 2', '9h20p-11h20p'),
(3, 'Ca 3', '12h-2h'),
(4, 'Ca 4', '2h10p-4h10p'),
(5, 'Ca 5', '4h20p-6h20p');

-- --------------------------------------------------------

--
-- Table structure for table `slideshows`
--

CREATE TABLE `slideshows` (
  `id` int(11) NOT NULL,
  `image` varchar(225) NOT NULL,
  `des` varchar(225) DEFAULT NULL,
  `url` varchar(225) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `order_number` int(11) NOT NULL,
  `created_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `slideshows`
--

INSERT INTO `slideshows` (`id`, `image`, `des`, `url`, `status`, `order_number`, `created_by`) VALUES
(1, 'img/DK-học-ielts-footer.jpg', '', 'https://www.youtube.com/watch?v=ooGDTbaFK34&t=274s', 1, 1, 0),
(2, 'img/ANDY-2.jpg', NULL, 'http://localhost/pro1013/admin/anh/edit.php?id=2', 1, 2, NULL),
(3, 'img/trungtamanhngu1.jpg', NULL, 'http://localhost/pro1013/admin/anh/edit.php?id=2', 1, 3, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `id` int(11) NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `fullname` varchar(200) NOT NULL,
  `avatar` varchar(200) DEFAULT 'img/29541772703_6ed8b50c47_b.jpg',
  `gender` int(11) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `address` varchar(200) DEFAULT NULL,
  `phone` varchar(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  `role` int(225) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`id`, `email`, `password`, `fullname`, `avatar`, `gender`, `date`, `address`, `phone`, `status`, `role`) VALUES
(44, 'diensdsd@gmail.com', '$2y$10$m8/gIAF4yiNhO4AwmrFfAOTJw8ZS62fqaXyroSa4j4mm.CRgTmVuC', 'Nguyễn Trí Diệnádasd', 'img/29541772703_6ed8b50c47_b.jpg', NULL, NULL, NULL, '1698060479', 1, 0),
(47, 'hocvien@fpt.edu.vn', '$2y$10$lrBKHQygC5S9GANesqhiQOmGAsLpMt1i70JovN.7rFBWjaKa8jCw.', 'Nguyễn Trí Diện', 'img/29541772703_6ed8b50c47_b.jpg', NULL, NULL, NULL, '1698060479', 1, 0),
(48, 'dien@gmail.com', '$2y$10$9EMYGLYP.A1dK3ShIzcaLurDCnMgzXo.iDQhJ4vaq3Bi3OdC8U0cm', 'Nguyễn Trí Diện', 'img/29541772703_6ed8b50c47_b.jpg', NULL, NULL, NULL, '1698060479', 1, 0),
(49, 'phubui2702@gmail.com123123123123', '$2y$10$6RjFFeBDmSZUp1s6nAmI.uMM3Nbuf.BKPCrHP2R25HBqZV/kg3mYi', 'Nguyễn Trí Diện', 'img/29541772703_6ed8b50c47_b.jpg', NULL, NULL, NULL, '1698060479', 1, 0),
(50, 'dienntph06483111@fpt.edu.vn', '$2y$10$kVPmn9Yzc/fArZgQ3S/ta.HAW8rerr8YH8lQ8d/GPYzVaFawDYZK6', 'Nguyễn Trí Diện', 'img/29541772703_6ed8b50c47_b.jpg', NULL, NULL, NULL, '1698060479', 1, 0),
(51, 'thentph06484@fpt.edu.vn', '$2y$10$8ydePh3XfOwGl1BXC.GVbOZYUh7eUWu.ftIRBkKbROhtt4wxDBrQy', 'Nguyễn Trí Diện', 'img/29541772703_6ed8b50c47_b.jpg', NULL, NULL, NULL, '1698060479', 1, 0),
(52, 'dienntph06483@fpt.edu.vn1', '$2y$10$MSvXM1chCGawZ8QbJbudSuDb8P7Mr7jJwBKOEuPpLbQv/mPNi76qO', 'Nguyễn Trí Diện', 'img/29541772703_6ed8b50c47_b.jpg', NULL, NULL, NULL, '1698060479', 1, 0),
(53, 'phubui2702@gmail.com12312312312311', '$2y$10$Varb7nYu1udG0IgXMyd8Xu9DlGxGdWtNnYq5UJRDTu.ZYTrbzZh7.', 'Nguyễn Trí Diện', 'img/29541772703_6ed8b50c47_b.jpg', NULL, NULL, NULL, '1698060479', 1, 0),
(137, '}?~????', '$2y$10$XBJVaaC6JcY5J6UUgUhBRe3Wsoam54Bz/1HI8g9GKeCi27atqUmbS', '?kj?tz?\Z??|/???+\0??~????=@??4??????n?ϱ\Z(????5z???????8w|?3?\n??????A^4?\n??}?O\Z??3?\n???5|???y', 'img/29541772703_6ed8b50c47_b.jpg', NULL, NULL, '', '', 1, 0),
(138, '?@%??\Z???p9?d??????A??/P?', '$2y$10$MWS2foOGE8lA1Wqp681EXuIL/EfRCbSkUtJdHufbcvKdtBdiDahWi', '', 'img/29541772703_6ed8b50c47_b.jpg', NULL, NULL, '', '', 1, 0),
(139, 'xy~????sA,#_?b???????+r,???y2???u?', '$2y$10$SiQdmhczStKLEsHNH6QlM.D5l5AvfJdx84i1wN2QlOy6l7XlL3fKu', '', 'img/29541772703_6ed8b50c47_b.jpg', NULL, NULL, '', '', 1, 0),
(140, '\0\0\0xl/styles.xml?U[o?0~?????N', '$2y$10$THzigEJCPL0po1P7XA2mteVdG76L1NO5EnmNMVkltKkoTOt/XPOoC', '', 'img/29541772703_6ed8b50c47_b.jpg', NULL, NULL, '', '', 1, 0),
(141, '\\%LM???j???F????Y?Q??)?o?ܩ????\0GͶ', '$2y$10$/WKYwrIHGc3kqC7/AOWNJun.FYGNOW00Hon.XfNPeICkb3Rw1EKn.', '?oT', 'img/29541772703_6ed8b50c47_b.jpg', NULL, NULL, '', '', 1, 0),
(142, '?e?4KJF?Jn?6x??SP??v??T/X?+O?\"??L섭?p\"????	?ON!????#u?w??P??Eqٜ???(-??|??V\nj?9?{?-?[d?u<f?q=????N??y?p?\0Ϩ	/Z?޳ӛ??0O?3?{?0@Y7-??I?h??lhg?sgk?(?????rwk?C????(iEZn?/St<?%k?', '$2y$10$kWScl5VFaqbBLoDoekkXA.0moe2vDotdQ8dxpIFcZz9tByh/FFj5e', '', 'img/29541772703_6ed8b50c47_b.jpg', NULL, NULL, '', '', 1, 0),
(143, '??={RƅH??|kg5?Z?ton?f??Z?R??z?a???#,g?????<^??xr???yW?F??	??{}ap?ɢ?????l~}ԥh$t?ݖ?1?y4', '$2y$10$j67N3.AnGmXtVSTOjtJCFeFhdt5s1BYj2uZNPLJWDO2bUAWkVO/sm', '', 'img/29541772703_6ed8b50c47_b.jpg', NULL, NULL, '', '', 1, 0),
(144, '\0\0xl/theme/theme1.xmlPK-\0\0\0\0\0\0!\0s[??\0\0 \0\0', '$2y$10$LsyGFkxtT86m8WdoCGh4kOsyq2By6JUZruFRpRFjGmmXbTbxWPhL.', '', 'img/29541772703_6ed8b50c47_b.jpg', NULL, NULL, '', '', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `student_check`
--

CREATE TABLE `student_check` (
  `id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `teacher_id` int(11) NOT NULL,
  `day` date NOT NULL,
  `status` int(11) DEFAULT NULL,
  `class_id` int(11) NOT NULL,
  `num_check` int(11) NOT NULL DEFAULT '-1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `student_check`
--

INSERT INTO `student_check` (`id`, `student_id`, `teacher_id`, `day`, `status`, `class_id`, `num_check`) VALUES
(1, 44, 0, '2019-02-18', 0, 29, -1),
(2, 50, 0, '2019-02-18', 0, 29, -1),
(3, 51, 0, '2019-02-18', 0, 29, -1),
(4, 52, 0, '2019-02-18', 0, 29, -1),
(5, 44, 0, '2019-02-19', 0, 29, -1),
(6, 50, 0, '2019-02-19', 0, 29, -1),
(7, 51, 0, '2019-02-19', 0, 29, -1),
(8, 52, 0, '2019-02-19', 0, 29, -1),
(9, 44, 0, '2019-02-20', 0, 29, -1),
(10, 50, 0, '2019-02-20', 0, 29, -1),
(11, 51, 0, '2019-02-20', 0, 29, -1),
(12, 52, 0, '2019-02-20', 0, 29, -1),
(13, 44, 0, '2019-02-25', 0, 29, -1),
(14, 50, 0, '2019-02-25', 0, 29, -1),
(15, 51, 0, '2019-02-25', 0, 29, -1),
(16, 52, 0, '2019-02-25', 0, 29, -1),
(17, 44, 0, '2019-02-26', 0, 29, -1),
(18, 50, 0, '2019-02-26', 0, 29, -1),
(19, 51, 0, '2019-02-26', 0, 29, -1),
(20, 52, 0, '2019-02-26', 0, 29, -1),
(21, 44, 0, '2019-02-27', 0, 29, -1),
(22, 50, 0, '2019-02-27', 0, 29, -1),
(23, 51, 0, '2019-02-27', 0, 29, -1),
(24, 52, 0, '2019-02-27', 0, 29, -1),
(25, 44, 0, '2019-03-04', 0, 29, -1),
(26, 50, 0, '2019-03-04', 0, 29, -1),
(27, 51, 0, '2019-03-04', 0, 29, -1),
(28, 52, 0, '2019-03-04', 0, 29, -1),
(29, 44, 0, '2019-03-05', 0, 29, -1),
(30, 50, 0, '2019-03-05', 0, 29, -1),
(31, 51, 0, '2019-03-05', 0, 29, -1),
(32, 52, 0, '2019-03-05', 0, 29, -1),
(33, 44, 0, '2019-03-06', 0, 29, -1),
(34, 50, 0, '2019-03-06', 0, 29, -1),
(35, 51, 0, '2019-03-06', 0, 29, -1),
(36, 52, 0, '2019-03-06', 0, 29, -1),
(37, 44, 0, '2019-03-11', 0, 29, -1),
(38, 50, 0, '2019-03-11', 0, 29, -1),
(39, 51, 0, '2019-03-11', 0, 29, -1),
(40, 52, 0, '2019-03-11', 0, 29, -1),
(41, 44, 0, '2019-04-08', 0, 29, -1),
(42, 50, 0, '2019-04-08', 0, 29, -1),
(43, 51, 0, '2019-04-08', 0, 29, -1),
(44, 52, 0, '2019-04-08', 0, 29, -1),
(45, 44, 0, '2019-04-10', 0, 29, -1),
(46, 50, 0, '2019-04-10', 0, 29, -1),
(47, 51, 0, '2019-04-10', 0, 29, -1),
(48, 52, 0, '2019-04-10', 0, 29, -1),
(49, 44, 0, '2019-04-12', 0, 29, -1),
(50, 50, 0, '2019-04-12', 0, 29, -1),
(51, 51, 0, '2019-04-12', 0, 29, -1),
(52, 52, 0, '2019-04-12', 0, 29, -1),
(53, 44, 0, '2019-04-15', 0, 29, -1),
(54, 50, 0, '2019-04-15', 0, 29, -1),
(55, 51, 0, '2019-04-15', 0, 29, -1),
(56, 52, 0, '2019-04-15', 0, 29, -1),
(57, 44, 0, '2019-04-17', 0, 29, -1),
(58, 50, 0, '2019-04-17', 0, 29, -1),
(59, 51, 0, '2019-04-17', 0, 29, -1),
(60, 52, 0, '2019-04-17', 0, 29, -1),
(61, 44, 0, '2019-04-19', 0, 29, -1),
(62, 50, 0, '2019-04-19', 0, 29, -1),
(63, 51, 0, '2019-04-19', 0, 29, -1),
(64, 52, 0, '2019-04-19', 0, 29, -1),
(65, 44, 0, '2019-04-22', 0, 29, -1),
(66, 50, 0, '2019-04-22', 0, 29, -1),
(67, 51, 0, '2019-04-22', 0, 29, -1),
(68, 52, 0, '2019-04-22', 0, 29, -1),
(69, 44, 0, '2019-04-24', 0, 29, -1),
(70, 50, 0, '2019-04-24', 0, 29, -1),
(71, 51, 0, '2019-04-24', 0, 29, -1),
(72, 52, 0, '2019-04-24', 0, 29, -1),
(73, 44, 0, '2019-04-26', 0, 29, -1),
(74, 50, 0, '2019-04-26', 0, 29, -1),
(75, 51, 0, '2019-04-26', 0, 29, -1),
(76, 52, 0, '2019-04-26', 0, 29, -1),
(77, 44, 0, '2019-04-29', 0, 29, -1),
(78, 50, 0, '2019-04-29', 0, 29, -1),
(79, 51, 0, '2019-04-29', 0, 29, -1),
(80, 52, 0, '2019-04-29', 0, 29, -1);

-- --------------------------------------------------------

--
-- Table structure for table `student_mark`
--

CREATE TABLE `student_mark` (
  `id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `course_id` int(11) NOT NULL,
  `quiz_id` int(11) NOT NULL,
  `point` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `student_mark`
--

INSERT INTO `student_mark` (`id`, `student_id`, `course_id`, `quiz_id`, `point`) VALUES
(66, 47, 1, 9, 3.3),
(67, 53, 1, 9, 5),
(68, 44, 1, 9, 3.3),
(69, 50, 1, 9, NULL),
(70, 51, 1, 9, NULL),
(71, 52, 1, 9, 3.3),
(72, 47, 1, 10, 3.3),
(73, 53, 1, 10, 6),
(74, 44, 1, 10, 6.7),
(75, 50, 1, 10, NULL),
(76, 51, 1, 10, NULL),
(77, 52, 1, 10, 10),
(78, 47, 1, 11, 10),
(79, 53, 1, 11, 7),
(80, 44, 1, 11, 10),
(81, 50, 1, 11, NULL),
(82, 51, 1, 11, NULL),
(83, 52, 1, 11, 5),
(84, 47, 1, 12, 4),
(85, 53, 1, 12, 8),
(86, 44, 1, 12, NULL),
(87, 50, 1, 12, NULL),
(88, 51, 1, 12, NULL),
(89, 52, 1, 12, NULL),
(90, 48, 2, 13, NULL),
(91, 49, 2, 13, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `teachers`
--

CREATE TABLE `teachers` (
  `id` int(11) NOT NULL,
  `email` varchar(200) DEFAULT NULL,
  `password` varchar(200) NOT NULL,
  `fullname` varchar(200) NOT NULL,
  `avatar` varchar(200) DEFAULT 'img/29541772703_6ed8b50c47_b.jpg',
  `phone` varchar(11) DEFAULT NULL,
  `address` varchar(200) DEFAULT NULL,
  `gender` int(11) NOT NULL,
  `status` int(11) DEFAULT '1',
  `role` int(225) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `teachers`
--

INSERT INTO `teachers` (`id`, `email`, `password`, `fullname`, `avatar`, `phone`, `address`, `gender`, `status`, `role`) VALUES
(1, 'dienntph06483@fpt.edu.vn', 'gv1', 'Nguyễn Trí Diện', 'img/team-1.jpg', '01698060479', '2225  Norma Lane', 1, 1, 1),
(2, 'thentph06483@fpt.edu.vn', '1', 'Nguyễn Trí Thể', 'img/team-2.jpg', '01698060479', 'Phụng Châu', 1, 1, 1),
(3, 'dien@fpt.edu.vn', '1', 'Nguyễn Đức Trung', 'img/team-3.jpg', '01698060479', 'ádasdasdas', 1, 1, 1),
(4, 'giaovien@gmail.com', '$2y$10$sQ5/G4AbXQ9oO6Mu0bjiw.1JQEQKFbU/40FRK4gKULWTOF8VIs4vu', 'Giáo viên', 'img/5bf8ab17ca8df.jpg', '01698060479', '2225  Norma Lane', 1, 1, 1),
(5, 'trungtrau@gmail.com', '$2y$10$0iM73UvH3bqVmx1PiiCxme4vZwmC64N1Or5bQnhTGTo5biLpAJ/gi', 'trung trau', 'img/29541772703_6ed8b50c47_b.jpg', '0398060479', '2225  Norma Lane', 1, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `timetable`
--

CREATE TABLE `timetable` (
  `id` int(11) NOT NULL,
  `day` date NOT NULL,
  `course_id` int(11) NOT NULL,
  `class_id` int(11) NOT NULL,
  `room_id` int(11) NOT NULL,
  `teacher_id` int(11) NOT NULL,
  `session_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `timetable`
--

INSERT INTO `timetable` (`id`, `day`, `course_id`, `class_id`, `room_id`, `teacher_id`, `session_id`) VALUES
(926, '2018-11-26', 1, 27, 1, 1, 1),
(927, '2018-11-27', 1, 27, 1, 1, 1),
(928, '2018-12-03', 1, 27, 1, 1, 1),
(929, '2018-12-04', 1, 27, 1, 1, 1),
(930, '2018-12-10', 1, 27, 1, 1, 1),
(931, '2018-12-11', 1, 27, 1, 1, 1),
(932, '2018-12-17', 1, 27, 1, 1, 1),
(933, '2018-12-18', 1, 27, 1, 1, 1),
(934, '2018-12-24', 1, 27, 1, 1, 1),
(935, '2018-12-25', 1, 27, 1, 1, 1),
(936, '2018-11-26', 1, 30, 2, 2, 1),
(937, '2018-11-27', 1, 30, 2, 2, 1),
(938, '2018-12-03', 1, 30, 2, 2, 1),
(939, '2018-12-04', 1, 30, 2, 2, 1),
(940, '2018-12-10', 1, 30, 2, 2, 1),
(941, '2018-12-11', 1, 30, 2, 2, 1),
(942, '2018-12-17', 1, 30, 2, 2, 1),
(943, '2018-12-18', 1, 30, 2, 2, 1),
(944, '2018-12-24', 1, 30, 2, 2, 1),
(945, '2018-12-25', 1, 30, 2, 2, 1),
(956, '2018-12-12', 1, 30, 1, 1, 1),
(957, '2018-12-13', 1, 30, 1, 1, 1),
(958, '2018-12-14', 1, 30, 1, 1, 1),
(959, '2018-12-19', 1, 30, 1, 1, 1),
(960, '2018-12-20', 1, 30, 1, 1, 1),
(961, '2018-12-21', 1, 30, 1, 1, 1),
(962, '2018-12-26', 1, 30, 1, 1, 1),
(963, '2018-12-27', 1, 30, 1, 1, 1),
(964, '2018-12-28', 1, 30, 1, 1, 1),
(965, '2019-01-02', 1, 30, 1, 1, 1),
(976, '2018-12-15', 1, 29, 1, 1, 1),
(977, '2018-12-16', 1, 29, 2, 2, 2),
(978, '2018-12-22', 1, 29, 1, 1, 1),
(979, '2018-12-23', 1, 29, 1, 1, 1),
(980, '2018-12-29', 1, 29, 1, 1, 1),
(981, '2018-12-30', 1, 29, 1, 1, 1),
(982, '2019-01-05', 1, 29, 1, 1, 1),
(986, '2018-11-26', 2, 28, 1, 1, 2),
(987, '2018-11-27', 2, 28, 1, 1, 2),
(988, '2018-12-03', 2, 28, 1, 1, 2),
(989, '2018-12-04', 2, 28, 1, 1, 2),
(990, '2018-12-10', 2, 28, 1, 1, 2),
(991, '2018-12-11', 2, 28, 1, 1, 2),
(992, '2018-12-17', 2, 28, 1, 1, 2),
(993, '2018-12-18', 2, 28, 1, 1, 2),
(994, '2018-12-24', 2, 28, 1, 1, 2),
(995, '2018-12-25', 2, 28, 1, 1, 2),
(996, '2019-02-18', 1, 29, 1, 1, 1),
(997, '2019-02-19', 1, 29, 1, 1, 1),
(998, '2019-02-20', 1, 29, 1, 1, 1),
(999, '2019-02-25', 1, 29, 1, 1, 1),
(1000, '2019-02-26', 1, 29, 1, 1, 1),
(1001, '2019-02-27', 1, 29, 1, 1, 1),
(1002, '2019-03-04', 1, 29, 1, 1, 1),
(1003, '2019-03-05', 1, 29, 1, 1, 1),
(1004, '2019-03-06', 1, 29, 1, 1, 1),
(1005, '2019-03-11', 1, 29, 1, 1, 1),
(1006, '2019-04-08', 1, 29, 1, 1, 1),
(1007, '2019-04-10', 1, 29, 1, 1, 1),
(1008, '2019-04-12', 1, 29, 1, 1, 1),
(1009, '2019-04-15', 1, 29, 1, 1, 1),
(1010, '2019-04-17', 1, 29, 1, 1, 1),
(1011, '2019-04-19', 1, 29, 1, 1, 1),
(1012, '2019-04-22', 1, 29, 1, 1, 1),
(1013, '2019-04-24', 1, 29, 1, 1, 1),
(1014, '2019-04-26', 1, 29, 1, 1, 1),
(1015, '2019-04-29', 1, 29, 1, 1, 1),
(1016, '2019-04-09', 1, 30, 1, 1, 1),
(1017, '2019-04-11', 1, 30, 1, 1, 1),
(1018, '2019-04-13', 1, 30, 1, 1, 1),
(1019, '2019-04-16', 1, 30, 1, 1, 1),
(1020, '2019-04-18', 1, 30, 1, 1, 1),
(1021, '2019-04-20', 1, 30, 1, 1, 1),
(1022, '2019-04-23', 1, 30, 1, 1, 1),
(1023, '2019-04-25', 1, 30, 1, 1, 1),
(1024, '2019-04-27', 1, 30, 1, 1, 1),
(1025, '2019-04-30', 1, 30, 1, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `email` varchar(200) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` int(11) NOT NULL,
  `address` varchar(255) NOT NULL,
  `avatar` varchar(255) NOT NULL DEFAULT 'img/29541772703_6ed8b50c47_b.jpg',
  `gender` int(11) NOT NULL,
  `phone_number` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `fullname`, `password`, `role`, `address`, `avatar`, `gender`, `phone_number`) VALUES
(1, 'dienntph06483@fpt.edu.vn', 'Nguyễn Trí Diện', '$2y$10$UFmg5sLwGnuBXJ1/ep0AhuAz2uOKxL8d8seGWDtWEP4RZsHFgxWM2', 500, '2225  Norma Lane', 'img/5bf26fa6d54fd.jpg', 1, '01698060479'),
(2, 'trungtrau@gmail.com', 'trung trau', '$2y$10$KGHO/77IhU0OUrYmRCFxv.u/oIWQlCmOgAiY/kamL6EhA87F7bJFG', 300, '', 'img/29541772703_6ed8b50c47_b.jpg', 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `web_settings`
--

CREATE TABLE `web_settings` (
  `id` int(11) NOT NULL,
  `logo` varchar(225) NOT NULL,
  `map` text NOT NULL,
  `email` varchar(225) NOT NULL,
  `fb` text NOT NULL,
  `hl` varchar(11) NOT NULL,
  `timework` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `web_settings`
--

INSERT INTO `web_settings` (`id`, `logo`, `map`, `email`, `fb`, `hl`, `timework`) VALUES
(1, 'img/nasao-logo.png', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3723.827622207749!2d105.80170731432445!3d21.03958218599249!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3135ab3e638834e5%3A0xc0757decf12a8bf4!2zMTUgxJDDtG5nIFF1YW4sIFF1YW4gSG9hLCBD4bqndSBHaeG6pXksIEjDoCBO4buZaSwgVmlldG5hbQ!5e0!3m2!1sen!2s!4v1542356725898\" width=\"100%\" height=\"250\" frameborder=\"0\" style=\"border:0\" allowfullscreen></iframe>', 'dienntph06483@fpt.edu.vn', '<iframe src=\"https://www.facebook.com/plugins/page.php?href=https%3A%2F%2Fwww.facebook.com%2Ffacebook&tabs=timeline&width=340&height=450&small_header=false&adapt_container_width=true&hide_cover=false&show_facepile=true&appId=191565505069352\" width=\"100%\" height=\"250\" style=\"border:none;overflow:hidden\" scrolling=\"no\" frameborder=\"0\" allowTransparency=\"true\" allow=\"encrypted-media\"></iframe>', '0398060479', '8h - 18h');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `answers`
--
ALTER TABLE `answers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `baikiemtra`
--
ALTER TABLE `baikiemtra`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `classes`
--
ALTER TABLE `classes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dangky`
--
ALTER TABLE `dangky`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `feedback_details`
--
ALTER TABLE `feedback_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lesson`
--
ALTER TABLE `lesson`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `page`
--
ALTER TABLE `page`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `question`
--
ALTER TABLE `question`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `quiz`
--
ALTER TABLE `quiz`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rooms`
--
ALTER TABLE `rooms`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `scores`
--
ALTER TABLE `scores`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `session`
--
ALTER TABLE `session`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `slideshows`
--
ALTER TABLE `slideshows`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student_check`
--
ALTER TABLE `student_check`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student_mark`
--
ALTER TABLE `student_mark`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `teachers`
--
ALTER TABLE `teachers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `timetable`
--
ALTER TABLE `timetable`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `web_settings`
--
ALTER TABLE `web_settings`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `answers`
--
ALTER TABLE `answers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=94;

--
-- AUTO_INCREMENT for table `baikiemtra`
--
ALTER TABLE `baikiemtra`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `classes`
--
ALTER TABLE `classes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `dangky`
--
ALTER TABLE `dangky`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=252;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `feedback_details`
--
ALTER TABLE `feedback_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `lesson`
--
ALTER TABLE `lesson`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `page`
--
ALTER TABLE `page`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `question`
--
ALTER TABLE `question`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=76;

--
-- AUTO_INCREMENT for table `quiz`
--
ALTER TABLE `quiz`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `rooms`
--
ALTER TABLE `rooms`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `scores`
--
ALTER TABLE `scores`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=258;

--
-- AUTO_INCREMENT for table `session`
--
ALTER TABLE `session`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `slideshows`
--
ALTER TABLE `slideshows`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=145;

--
-- AUTO_INCREMENT for table `student_check`
--
ALTER TABLE `student_check`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=81;

--
-- AUTO_INCREMENT for table `student_mark`
--
ALTER TABLE `student_mark`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=92;

--
-- AUTO_INCREMENT for table `teachers`
--
ALTER TABLE `teachers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `timetable`
--
ALTER TABLE `timetable`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1026;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `web_settings`
--
ALTER TABLE `web_settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
