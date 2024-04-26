-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 17, 2022 at 01:01 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_project`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `admin_id` int(11) NOT NULL,
  `admin_username` varchar(100) NOT NULL,
  `admin_password` varchar(100) NOT NULL,
  `admin_name` varchar(100) NOT NULL,
  `admin_email` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`admin_id`, `admin_username`, `admin_password`, `admin_name`, `admin_email`) VALUES
(1, 'sreelekshmi', '807818', 'Sreelakshmi', 'sreelakshmiks28sept@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_agent`
--

CREATE TABLE `tbl_agent` (
  `agent_id` int(11) NOT NULL,
  `agent_name` varchar(100) NOT NULL,
  `agent_password` varchar(100) NOT NULL,
  `agent_contact` varchar(20) NOT NULL,
  `agent_email` varchar(100) NOT NULL,
  `agent_address` varchar(500) NOT NULL,
  `place_id` int(11) NOT NULL,
  `agent_vstatus` int(11) NOT NULL,
  `agent_photo` varchar(100) NOT NULL,
  `agent_proof` varchar(100) NOT NULL,
  `agent_doj` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_agent`
--

INSERT INTO `tbl_agent` (`agent_id`, `agent_name`, `agent_password`, `agent_contact`, `agent_email`, `agent_address`, `place_id`, `agent_vstatus`, `agent_photo`, `agent_proof`, `agent_doj`) VALUES
(1, 'Mithra', 'mithra@123', '9848935816', 'mithra@gmail.com', 'Near Muvattupuzha ', 11, 1, 'Picture1.png.jpg', 'Picture1.png.jpg', '2022-07-14'),
(2, 'pottas', 'asdf', '1234567890', 'pottas@gmail.com', 'tgyhujkijhgf', 11, 1, 'Picture1.png.jpg', 'Picture1.png.jpg', '2022-07-14'),
(3, 'Geo Wilson', 'geowilson', '7306090828', 'geowilson@gmail.com', 'Mandapathil (h) Kozhikkode Thiruvanambadi P.O', 18, 1, 'R.jpg', 'Aadhaar.png', '2022-07-15'),
(4, 'Adwaith P A', 'adwaithpa', '9207854053', 'adwaithpa@gmail.com', 'keripadu(h) Ernakulam Aluva P.O ', 11, 2, 'Passport-Size-Pic.jpg', 'Aadhaar.png', '2022-07-15');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_assign`
--

CREATE TABLE `tbl_assign` (
  `assign_id` int(11) NOT NULL,
  `deliveryboy_id` int(11) NOT NULL,
  `booking_id` int(11) NOT NULL,
  `assign_status` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_assign`
--

INSERT INTO `tbl_assign` (`assign_id`, `deliveryboy_id`, `booking_id`, `assign_status`) VALUES
(4, 2, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_booking`
--

CREATE TABLE `tbl_booking` (
  `booking_id` int(11) NOT NULL,
  `booking_date` varchar(100) NOT NULL,
  `user_id` int(11) NOT NULL,
  `agent_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `brand_id` int(11) NOT NULL,
  `booking_status` int(11) NOT NULL,
  `booking_amount` varchar(100) NOT NULL,
  `booking_quantity` varchar(100) NOT NULL,
  `booking_otp` varchar(50) NOT NULL,
  `payment_status` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_booking`
--

INSERT INTO `tbl_booking` (`booking_id`, `booking_date`, `user_id`, `agent_id`, `category_id`, `brand_id`, `booking_status`, `booking_amount`, `booking_quantity`, `booking_otp`, `payment_status`) VALUES
(1, '2022-07-17', 1, 3, 1, 3, 3, '20000', '20', '693329', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_brand`
--

CREATE TABLE `tbl_brand` (
  `brand_id` int(11) NOT NULL,
  `brand_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_brand`
--

INSERT INTO `tbl_brand` (`brand_id`, `brand_name`) VALUES
(3, 'Hindustan Petroleum'),
(4, 'Reliance'),
(5, 'Shell'),
(6, 'Nayara'),
(7, 'Essar Oil'),
(8, 'Total'),
(10, 'Bharat Petroleum'),
(11, 'Indian Oil'),
(12, 'Jio-bp');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_category`
--

CREATE TABLE `tbl_category` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_category`
--

INSERT INTO `tbl_category` (`category_id`, `category_name`) VALUES
(1, 'Petrol'),
(2, 'Diesel'),
(3, 'Engine Oil'),
(4, 'Speed Petrol');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_complaint`
--

CREATE TABLE `tbl_complaint` (
  `complaint_id` int(11) NOT NULL,
  `complaint_content` varchar(100) NOT NULL,
  `complaint_date` varchar(100) NOT NULL,
  `complaint_replydate` varchar(100) NOT NULL,
  `complaint_reply` varchar(100) NOT NULL,
  `user_id` int(11) NOT NULL,
  `complainttype_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_complainttype`
--

CREATE TABLE `tbl_complainttype` (
  `complainttype_id` int(11) NOT NULL,
  `complainttype_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_complainttype`
--

INSERT INTO `tbl_complainttype` (`complainttype_id`, `complainttype_name`) VALUES
(1, 'Late Delivery'),
(2, 'Misbehaviour');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_deliveryboy`
--

CREATE TABLE `tbl_deliveryboy` (
  `deliveryboy_id` int(11) NOT NULL,
  `deliveryboy_name` varchar(100) NOT NULL,
  `deliveryboy_contact` varchar(20) NOT NULL,
  `deliveryboy_email` varchar(100) NOT NULL,
  `deliveryboy_address` varchar(100) NOT NULL,
  `deliveryboy_photo` varchar(100) NOT NULL,
  `deliveryboy_proof` varchar(100) NOT NULL,
  `deliveryboy_password` varchar(100) NOT NULL,
  `agent_id` int(11) NOT NULL,
  `place_id` int(11) NOT NULL,
  `deliveryboy_dob` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_deliveryboy`
--

INSERT INTO `tbl_deliveryboy` (`deliveryboy_id`, `deliveryboy_name`, `deliveryboy_contact`, `deliveryboy_email`, `deliveryboy_address`, `deliveryboy_photo`, `deliveryboy_proof`, `deliveryboy_password`, `agent_id`, `place_id`, `deliveryboy_dob`) VALUES
(1, 'Rahuel M R', '9048546890', 'rahulemr@gmail.com', 'edrtfgyhuijko', 'Picture1.png.jpg', 'Picture1.png.jpg', 'asdf', 1, 11, '2022-07-20'),
(2, 'Ansa Fathima', '890909097', 'ansafathima@gmail.com', 'thazhathuveetil (h) Pala Kottayam', 'istockphoto-856597542-170667a.jpg', 'Aadhaar.png', 'ansafathima', 3, 31, '2001-02-05');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_district`
--

CREATE TABLE `tbl_district` (
  `district_id` int(11) NOT NULL,
  `district_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_district`
--

INSERT INTO `tbl_district` (`district_id`, `district_name`) VALUES
(1, 'Trivandrum'),
(2, 'Kollam'),
(3, 'Malappuram'),
(4, 'Ernakulam'),
(5, 'Thrissur'),
(6, 'Kozhikode'),
(7, 'Palakkad'),
(8, 'Kannur'),
(9, 'Alappuzha'),
(11, 'Kottayam'),
(12, 'Kasaragod'),
(13, 'Idukki'),
(15, 'Pathanamthitta'),
(16, 'Wayanad');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_feedback`
--

CREATE TABLE `tbl_feedback` (
  `feedback_id` int(11) NOT NULL,
  `feedback_content` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_place`
--

CREATE TABLE `tbl_place` (
  `place_id` int(11) NOT NULL,
  `place_name` varchar(100) NOT NULL,
  `place_pin` varchar(100) NOT NULL,
  `place_landmark` varchar(100) NOT NULL,
  `district_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_place`
--

INSERT INTO `tbl_place` (`place_id`, `place_name`, `place_pin`, `place_landmark`, `district_id`) VALUES
(1, 'Andoorkonam', '', '', 1),
(2, 'Iroopara', '', '', 0),
(3, 'Iroopara', '', '', 1),
(4, 'Sreekaryam', '', '', 1),
(5, 'Thrikkadavoor', '', '', 2),
(6, 'Nedumpana', '', '', 2),
(7, 'Mundakkal', '', '', 2),
(8, 'Panakkad', '', '', 3),
(9, 'Payyanad', '', '', 3),
(10, 'Alangad', '', '', 4),
(11, 'Aluva', '', '', 4),
(12, 'Paravur', '', '', 4),
(13, 'Chalakudy', '', '', 5),
(14, 'Killimangalam', '', '', 5),
(15, 'Nellayi', '', '', 5),
(16, 'Chathamangalam', '', '', 6),
(17, 'Koodathayi', '', '', 6),
(18, 'Thiruvambadi', '', '', 6),
(19, 'Nemmara', '', '', 7),
(20, 'Valiyavallampathy', '', '', 7),
(21, 'Elavancherry', '', '', 7),
(22, 'Alakode', '', '', 8),
(23, 'Kuttiattoor', '', '', 8),
(24, 'Manikkadavu', '', '', 8),
(25, 'Ambalappuzha', '', '', 9),
(26, 'Karamadi', '', '', 9),
(27, 'Punnapra', '', '', 9),
(28, 'Vaikom ', '', '', 11),
(29, 'Kanjirappaly', '', '', 0),
(30, 'Pala', '', '', 0),
(31, 'Pala', '', '', 11),
(32, 'Bekal Fort', '', '', 12),
(33, 'Ranipuram Hills', '', '', 12),
(34, 'kanhangad', '', '', 12),
(35, 'Trikaripur', '', '', 12),
(36, 'Thodupuzha', '', '', 13),
(37, 'Kattapana', '', '', 13),
(38, 'Kuttikanam', '', '', 13),
(39, 'Munnar', '', '', 13),
(40, 'Adoor', '', '', 15),
(41, 'Erathu', '', '', 15),
(42, 'Ranni', '', '', 15),
(43, 'Thiruvalla', '', '', 15);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_stock`
--

CREATE TABLE `tbl_stock` (
  `stock_id` int(11) NOT NULL,
  `stock_date` varchar(100) NOT NULL,
  `category_id` int(11) NOT NULL,
  `agent_id` int(11) NOT NULL,
  `stock_quantity` varchar(100) NOT NULL,
  `brand_id` int(11) NOT NULL,
  `stock_rate` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_stock`
--

INSERT INTO `tbl_stock` (`stock_id`, `stock_date`, `category_id`, `agent_id`, `stock_quantity`, `brand_id`, `stock_rate`) VALUES
(10, '2022-07-16', 1, 3, '1000', 3, '500');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(100) NOT NULL,
  `user_dob` varchar(100) NOT NULL,
  `user_contact` varchar(11) NOT NULL,
  `user_password` varchar(100) NOT NULL,
  `user_email` varchar(100) NOT NULL,
  `user_address` varchar(100) NOT NULL,
  `user_photo` varchar(100) NOT NULL,
  `user_proof` varchar(100) NOT NULL,
  `place_id` int(11) NOT NULL,
  `user_doj` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`user_id`, `user_name`, `user_dob`, `user_contact`, `user_password`, `user_email`, `user_address`, `user_photo`, `user_proof`, `place_id`, `user_doj`) VALUES
(1, 'Sarath K B', '1999-06-17', '7034807168', 'sarath@123', 'sreelakshmiks28sept@gmail.com', 'near Mvpa', 'Picture1.png.jpg', 'Picture1.png.jpg', 11, '2022-07-14'),
(2, 'Sivaprasad P R', '2001-01-01', '9090909012', 'sivaprasadpr', 'sivaprasadpr12@gmail.com', 'XYZ (H) PERUMBAVOR ALUVA', 'OIP (1).jpg', 'Aadhaar.png', 11, '2022-07-15'),
(3, 'Nevin Shaju', '2001-02-28', '8989892029', 'nevinshaju', 'nevinshaju@gmail.com', 'Abc (H) Kottayam Vaikom', 'Passport-Size-Pic.jpg', 'Aadhaar.png', 28, '2022-07-15');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `tbl_agent`
--
ALTER TABLE `tbl_agent`
  ADD PRIMARY KEY (`agent_id`);

--
-- Indexes for table `tbl_assign`
--
ALTER TABLE `tbl_assign`
  ADD PRIMARY KEY (`assign_id`);

--
-- Indexes for table `tbl_booking`
--
ALTER TABLE `tbl_booking`
  ADD PRIMARY KEY (`booking_id`);

--
-- Indexes for table `tbl_brand`
--
ALTER TABLE `tbl_brand`
  ADD PRIMARY KEY (`brand_id`);

--
-- Indexes for table `tbl_category`
--
ALTER TABLE `tbl_category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `tbl_complaint`
--
ALTER TABLE `tbl_complaint`
  ADD PRIMARY KEY (`complaint_id`);

--
-- Indexes for table `tbl_complainttype`
--
ALTER TABLE `tbl_complainttype`
  ADD PRIMARY KEY (`complainttype_id`);

--
-- Indexes for table `tbl_deliveryboy`
--
ALTER TABLE `tbl_deliveryboy`
  ADD PRIMARY KEY (`deliveryboy_id`);

--
-- Indexes for table `tbl_district`
--
ALTER TABLE `tbl_district`
  ADD PRIMARY KEY (`district_id`);

--
-- Indexes for table `tbl_feedback`
--
ALTER TABLE `tbl_feedback`
  ADD PRIMARY KEY (`feedback_id`);

--
-- Indexes for table `tbl_place`
--
ALTER TABLE `tbl_place`
  ADD PRIMARY KEY (`place_id`);

--
-- Indexes for table `tbl_stock`
--
ALTER TABLE `tbl_stock`
  ADD PRIMARY KEY (`stock_id`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_agent`
--
ALTER TABLE `tbl_agent`
  MODIFY `agent_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_assign`
--
ALTER TABLE `tbl_assign`
  MODIFY `assign_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_booking`
--
ALTER TABLE `tbl_booking`
  MODIFY `booking_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_brand`
--
ALTER TABLE `tbl_brand`
  MODIFY `brand_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `tbl_category`
--
ALTER TABLE `tbl_category`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_complaint`
--
ALTER TABLE `tbl_complaint`
  MODIFY `complaint_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_complainttype`
--
ALTER TABLE `tbl_complainttype`
  MODIFY `complainttype_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_deliveryboy`
--
ALTER TABLE `tbl_deliveryboy`
  MODIFY `deliveryboy_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_district`
--
ALTER TABLE `tbl_district`
  MODIFY `district_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `tbl_feedback`
--
ALTER TABLE `tbl_feedback`
  MODIFY `feedback_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_place`
--
ALTER TABLE `tbl_place`
  MODIFY `place_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `tbl_stock`
--
ALTER TABLE `tbl_stock`
  MODIFY `stock_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
