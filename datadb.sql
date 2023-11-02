-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Nov 02, 2023 at 02:40 PM
-- Server version: 8.0.17
-- PHP Version: 7.3.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `datadb`
--

-- --------------------------------------------------------

--
-- Table structure for table `order_detail`
--

CREATE TABLE `order_detail` (
  `id` int(11) NOT NULL COMMENT 'ลำดับที่',
  `orderID` int(10) UNSIGNED ZEROFILL NOT NULL COMMENT 'เลขที่ใบสั่งซื้อ',
  `pro_id` int(6) UNSIGNED ZEROFILL NOT NULL COMMENT 'รหัสสินค้า',
  `orderPrice` float NOT NULL COMMENT 'ราคาสินค้า',
  `orderQty` int(11) NOT NULL COMMENT 'จำนวนที่สั่งซื้อ',
  `Total` float NOT NULL COMMENT 'ราคารวม'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `order_detail`
--

INSERT INTO `order_detail` (`id`, `orderID`, `pro_id`, `orderPrice`, `orderQty`, `Total`) VALUES
(1, 0000000001, 000003, 3290, 1, 3290),
(2, 0000000001, 000001, 4190, 2, 8380),
(10, 0000000007, 000002, 2190, 1, 2190),
(11, 0000000008, 000002, 2190, 1, 2190),
(12, 0000000009, 000002, 2190, 3, 6570),
(13, 0000000009, 000001, 4190, 2, 8380),
(14, 0000000010, 000007, 32990, 1, 32990),
(15, 0000000011, 000002, 2190, 1, 2190),
(16, 0000000012, 000001, 4190, 2, 8380);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `pro_id` int(6) UNSIGNED ZEROFILL NOT NULL COMMENT 'รหัสสินค้า',
  `pro_name` varchar(255) NOT NULL COMMENT 'ชื่อสินค้า',
  `detail` text NOT NULL COMMENT 'รายละเอียด',
  `type_id` int(3) UNSIGNED ZEROFILL NOT NULL COMMENT 'รหัสประเภทสินค้า',
  `price` float(8,2) DEFAULT NULL COMMENT 'ราคาขาย',
  `amount` int(11) DEFAULT NULL COMMENT 'จำนวน',
  `image` varchar(50) DEFAULT NULL COMMENT 'รูปภาพ'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`pro_id`, `pro_name`, `detail`, `type_id`, `price`, `amount`, `image`) VALUES
(000001, 'LOGITECH G PRO-X SUPERLIGHT WIRELESS - (BLACK)', 'ขจัดทุกอุปสรรคที่ขวางทางสู่ชัยชนะด้วยเมาส์ PRO ที่เร็วที่สุดและเบาที่สุดของเรา อาวุธใหม่ที่ยอดเยี่ยมสำหรับนักกีฬาอีสปอร์ตระดับมืออาชีพชั้นนำของโลก ด้วยน้ำหนักไม่ถึง 63 กรัม และมอบการเลื่อนที่เกือบไร้แรงเสียดทาน PRO X SUPERLIGHT สานต่อปรัชญาการออกแบบของเราที่ว่า ZERØ OPPOSITION หรือไร้คู่แข่ง ความมุ่งมั่นของเราคือการขจัดทุกอุปสรรค เพื่อสร้างสรรค์การเชื่อมต่อที่บริสุทธิ์ที่สุดระหว่างผู้เล่นและเกม', 001, 4190.00, 14, 'product1.jpg'),
(000002, 'HyperX PULSEFIRE HASTE 2 WIRELESS - BLACK (6N0B0AA)', 'HyperX Pulsefire Haste 2 Wireless ได้รับการออกแบบมาเพื่อเกมเมอร์ที่ไม่ยอมเสียเวลาแม้แต่เสี้ยววินาทีและต้องการอิสระในการเชื่อมต่อไร้สาย ภาคต่อนี้มีเปลือกด้านบนที่แข็งแกร่งและยังคงน้ำหนัก 61 กรัม [3] และอายุการใช้งานแบตเตอรี่ 100 ชั่วโมง', 001, 2190.00, 12, 'product2.jpg'),
(000003, 'RAZER BLACKWIDOW V3 TENKEYLESS (RAZER GREEN SWITCH) (RGB) (EN/TH)', 'คีย์บอร์ดเกมมิ่ง Razer Blackwidow V3 TKL Keyboards มีดีไซน์การออกแบบที่สวยงามใช้สีดำสุดเคร่งขรึมซึ่งเป็นเอกลักษณ์ของแบรนด์ Razer เมื่อตัดกับแสงไฟ Chroma RGB สีสันสดใส จึงทำให้มีความสวยงามเป็นอย่างมาก นอกจากนี้เมื่อเล่นเกมที่รองรับอย่างเช่น Fortnite, APEX Legends, Warframe และอื่น ๆ อีกมากมาย จะทำให้มีเอฟเฟคแสงไฟแบบพิเศษที่สวยงามขณะเล่นเป็นอย่างมาก ด้วยวัสดุของคีย์บอร์ดที่มีความแข็งแรงทนทาน ขนาดเล็ก พกพาไปไหนมาไหนได้สะดวก ใช้สวิตซ์ที่มีอายุการใช้งานยาวนานกว่า 80 ล้านครั้ง นอกจากนี้การตั้งค่ามาโครรวมไปถึงแสงไฟก็สามารถทำได้เพิ่มเติมผ่านทางซอฟต์แวร์ เรียกได้ว่าครบเครื่อง จึงเป็นหนึ่งในเกมมิ่งเกียร์ที่มีความคุ้มค่าในเรื่องของคุณภาพ และราคาเป็นอย่างมาก', 002, 3290.00, 20, 'product3.jpg'),
(000004, 'HyperX ALLOY ORIGINS CORE PBT TENKEYLESS RED SW (TH) (639N7AA#AKL)', 'HyperX  Alloy Origins Core PBT แป้นพิมพ์แบบ  TKL มีขนาดกะทัดรัดเป็นพิเศษ มาพร้อม Mechanical HyperX Red Switch และฝาครอบปุ่ม PBT [ภาษาไทย]  เอฟเฟคไฟ RGB  วัสดุอะลูมิเนียมทั้งชิ้นของ Alloy Origins Core รักษาเสถียรภาพ ด้วยฐานแป้นพิมพ์สำหรับปรับระดับความเอียงที่แตกต่างกันสามระดับ การออกแบบที่กะทัดรัดสร้างพื้นที่ว่างในการใช้งานที่เหลือเฟือยิ่งกว่า รองรับการตกแต่งผ่านซอฟแวร์ HyperX NGENUITY และโหมดเกม  ฟังก์ชันป้องกันภาพซ้อน 100% และปุ่ม N-key rollover', 002, 2390.00, 20, 'product4.jpg'),
(000005, 'ACER NITRO QG241YS3BMIIPX - 23.8 VA FHD 180Hz', 'Acer QG241YS3bmiipx 23.8\" VA FHD Gaming Monitor 180Hz รองรับการเล่นเกมทุกแนวได้สบายๆ ด้วยหน้าจอพาเนล VA ขนาด 23.8 นิ้ว จะเล่นเกมสาย FPS ก็ลงตัวด้วยขนาดหน้าจอที่พอดีต่อการกวาดสายตาทั่วจอโดยไม่ต้องหันมอง ความละเอียดหน้าจอระดับ Full HD พร้อมอัตรารีเฟรชหน้าจอสูงถึง 180Hz อัตราความหน่วงภาพ 1ms เล่นเกมได้ลื่นๆ ลากหัวคมๆ ได้อย่างไม่มีสะดุด', 003, 4690.00, 20, 'product5.jpg'),
(000006, 'SAMSUNG ODYSSEY G3 LS24AG320NEXXT 24 VA FHD 165Hz', 'จอมอนิเตอร์สำหรับเกมเมอร์  LS24AG320NEXXT  จอคอม Gaming Monitor ขนาด 24 นิ้วมาพร้อมค่ารีเฟรชเรต 165 Hz กับตอบสนอง 1ms Response Time ช่วยให้แอ็กชันที่รวดเร็วนั้นดูไหลลื่นได้ด้วยความแม่นยำแบบในโลกจริง ให้การเล่นเกมนั้นไหลลื่นได้อย่างง่ายดาย AMD FreeSync Premium มาพร้อมกับเทคโนโลยี Adaptive Sync ที่ช่วยลดรอยขาด, อาการกระตุก และความหน่วงของภาพในหน้าจอลงได้ นอกจากนี้ยังมีระบบการชดเชยเฟรมเรตที่ต่ำเพื่อให้ทุก ๆ ฉากนั้นดูราบรื่นได้', 003, 4890.00, 20, 'product6.jpg'),
(000007, 'ACER NITRO V 15 ANV15-51-574G (OBSIDIAN BLACK)', 'CPU: i5-13420H                    \r\n\r\nVGA: Nvidia GeForce RTX 4050 6GB\r\n\r\nRAM: 16GB (16GB x 1) DDR5 4800MHz\r\n\r\nSTORAGE: 512 GB\r\n\r\nSCREEN: 15.6 inch Full HD (1920 x 1080) IPS 144Hz\r\n\r\nOS: WINDOWS 11 HOME', 004, 32990.00, 19, 'product7.jpg'),
(000008, 'ASUS ROG STRIX G15 G513RC-LP179W (ECLIPSE GRAY)', 'CPU: R7 6800H                         \r\n\r\nVGA: RTX 3050 4GB GDDR6\r\n\r\nRAM: 8GB DDR5 4800MHz SO-DIMM\r\n\r\nSTORAGE: 512GB\r\n\r\nSCREEN: 15.6\" (1920x1080) FHD 144Hz\r\n\r\nOS: WINDOWS 11 HOME', 004, 29990.00, 20, 'product8.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tb_order`
--

CREATE TABLE `tb_order` (
  `orderID` int(10) UNSIGNED ZEROFILL NOT NULL COMMENT 'เลขที่ใบสั่งซื้อ',
  `cus_name` varchar(60) NOT NULL COMMENT 'ชื่อ-นามสกุล',
  `address` text NOT NULL COMMENT 'ที่อยู่การจัดส่งสินค้า',
  `telephone` varchar(10) NOT NULL COMMENT 'เบอร์โทรศัพท์',
  `total_price` float NOT NULL COMMENT 'ราคารวมสุทธิ',
  `order_status` varchar(1) NOT NULL COMMENT 'ยกเลิก=0,ยังไม่ชำระ=1,ชำระเงิน=2',
  `reg_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'วันที่สั่งซื้อ'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tb_order`
--

INSERT INTO `tb_order` (`orderID`, `cus_name`, `address`, `telephone`, `total_price`, `order_status`, `reg_date`) VALUES
(0000000001, 'พงศ์พล พงศ์ศรี', ' 39/2 หมู่ 8 ต.คชสิทธิ์ อ.หนองแค จ.สระบุรี 18250', '0955740336', 4380, '1', '2023-11-01 18:59:08'),
(0000000007, 'พงศ์พล พงศ์ศรี', ' dasdasdasd', '1231231231', 0, '1', '2023-11-01 19:24:14'),
(0000000008, 'สมชาย หิวขนม', ' dasdasd', '123124324', 0, '1', '2023-11-01 19:25:12'),
(0000000009, 'พงศ์พล พงศ์ศรี', ' rwerwqrwr', '234234', 14950, '1', '2023-11-01 19:28:49'),
(0000000010, 'พงศ์พล พงศ์ศรี', ' 4234234234', '2342134231', 32990, '1', '2023-11-01 19:33:00'),
(0000000011, 'พงศ์พล พงศ์ศรี', ' eqweqwe', '12321312', 2190, '1', '2023-11-01 19:49:40'),
(0000000012, 'พงศ์พล พงศ์ศรี', ' 39/2 หมู่ 8 ต.คชสิทธิ์ อ.หนองแค จ.สระบุรี 18250\r\n', '0955740336', 8380, '1', '2023-11-01 21:00:08');

-- --------------------------------------------------------

--
-- Table structure for table `type`
--

CREATE TABLE `type` (
  `type_id` int(3) UNSIGNED ZEROFILL NOT NULL COMMENT 'รหัสประเภทสินค้า',
  `type_name` varchar(60) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT 'ชื่อประเภทสินค้า'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `type`
--

INSERT INTO `type` (`type_id`, `type_name`) VALUES
(001, 'เมาส์'),
(002, 'คีย์บอร์ด'),
(003, 'จอมอนิเตอร์'),
(004, 'โน้ตบุ๊ก');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `order_detail`
--
ALTER TABLE `order_detail`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`pro_id`);

--
-- Indexes for table `tb_order`
--
ALTER TABLE `tb_order`
  ADD PRIMARY KEY (`orderID`);

--
-- Indexes for table `type`
--
ALTER TABLE `type`
  ADD PRIMARY KEY (`type_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `order_detail`
--
ALTER TABLE `order_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'ลำดับที่', AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `pro_id` int(6) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT COMMENT 'รหัสสินค้า', AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tb_order`
--
ALTER TABLE `tb_order`
  MODIFY `orderID` int(10) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT COMMENT 'เลขที่ใบสั่งซื้อ', AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `type`
--
ALTER TABLE `type`
  MODIFY `type_id` int(3) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT COMMENT 'รหัสประเภทสินค้า', AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
