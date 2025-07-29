-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 24, 2025 at 09:03 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `conget_industry`
--

-- --------------------------------------------------------

--
-- Table structure for table `about_us`
--

CREATE TABLE `about_us` (
  `id` int(200) NOT NULL,
  `company_profile` varchar(40) NOT NULL,
  `our_vision` text DEFAULT NULL,
  `our_mission` text DEFAULT NULL,
  `quality_policy` text DEFAULT NULL,
  `company_history` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `about_us`
--

INSERT INTO `about_us` (`id`, `company_profile`, `our_vision`, `our_mission`, `quality_policy`, `company_history`) VALUES
(1, 'Company2.jpg', 'To achieve global leadership in the hardware manufacturing industry by offering top-quality tools and solutions. Our vision drives us to continually innovate in design and precision, ensuring every product we deliver brings lasting satisfaction and excellence to our customers worldwide. this is our main vision</span></p>', 'To deliver reliable, innovative, and precision-engineered hardware solutions that exceed customer expectations. We are committed to maintaining the highest standards of quality, sustainability, and service, while continuously improving our products to meet the evolving needs of industries worldwide. this is our best mission</span></p><p class=\"MsoNormal\"><span style=\"font-size:12.0pt;mso-bidi-font-size:11.0pt;\nline-height:115%\">\n\n</span></p>', 'Cogent Industry is committed to delivering premium-quality hardware tools that meet international standards. We ensure precision, durability, and consistency in every product through rigorous quality control processes. Our team focuses on continuous improvement and innovation to exceed customer expectations. By using high-grade materials and advanced manufacturing techniques.\n', 'Cogent Hardware Industry, based in Rajkot, Gujarat, is a trusted name in the manufacturing and supply of a wide range of high-quality hardware products. We specialize in all types of hardware screws, catering to diverse industrial and domestic requirements. With a strong focus on precision engineering and robust quality control, our products are known for their durability, performance, and reliability. Our state-of-the-art manufacturing facility is equipped with advanced machinery and operated by a skilled workforce committed to excellence. Over the years, we have built long-standing relationships with clients across India and abroad, by consistently delivering products that meet international standards. At Cogent, we believe in continuous innovation, sustainable practices, and customer satisfaction as the pillars of our growth.');

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(200) NOT NULL,
  `admin_username` varchar(400) DEFAULT NULL,
  `admin_password` varchar(400) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `admin_username`, `admin_password`) VALUES
(1, 'admin', '1234');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(200) NOT NULL,
  `category_name` varchar(400) DEFAULT NULL,
  `category_image` text DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `category_name`, `category_image`, `created_at`, `updated_at`) VALUES
(6, 'Modular Furniture fitting', 'Modular_furniture_fitting.jpeg', '2022-09-23 04:39:18', '2022-09-23 04:39:18'),
(7, 'Kitchen Hardware', 'Kitchen_Hardware.jpg', '2022-09-28 00:05:50', '2022-09-28 00:05:50'),
(8, 'Cabinet & Shelf Accessories', 'Cabinet _shelf_Accessories.jpg', '2022-10-13 07:24:55', '2022-10-13 07:24:55'),
(9, 'Fasteners & Screws', 'Fasteners_screws.jpg', '2022-10-13 07:51:53', '2022-10-13 07:51:53');

-- --------------------------------------------------------

--
-- Table structure for table `choose_us`
--

CREATE TABLE `choose_us` (
  `id` int(200) NOT NULL,
  `title` varchar(400) DEFAULT NULL,
  `description` varchar(400) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `choose_us`
--

INSERT INTO `choose_us` (`id`, `title`, `description`) VALUES
(1, 'Superior Product Quality\n', 'Our hardware products are manufactured using high-grade materials and undergo strict quality checks to ensure maximum durability, strength, and performance.\n\n'),
(2, 'Wide Range of Products\n', 'We are group of manufacturer who product different product and sizes so we work with massive collection of Designs and Product Range. You can choose whatever you need !From screws and nails to advanced kitchenware and industrial tools, we offer a complete range of hardware solutions to meet every customer’s needs under one roof.\n\n'),
(3, 'Trusted Expertise & Support', 'With years of experience in the industry, we provide expert guidance, timely delivery, and dedicated customer support to ensure a smooth and satisfying buying experience.\n\n');

-- --------------------------------------------------------

--
-- Table structure for table `inquiry`
--

CREATE TABLE `inquiry` (
  `id` int(200) NOT NULL,
  `name` varchar(200) NOT NULL,
  `mail` varchar(250) NOT NULL,
  `subject` varchar(200) NOT NULL,
  `mobile` varchar(100) NOT NULL,
  `message` text NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `inquiry`
--

INSERT INTO `inquiry` (`id`, `name`, `mail`, `subject`, `mobile`, `message`, `created_at`) VALUES
(2, 'Charmi', 'charmi@gmail.com', 'Extra-Demo', '9909576653', 'dxfgv', '2022-08-15 16:32:27'),
(3, 'Charmi Hirapara ', 'admin@gmaik.com', '23 August ', '1234468907', 'Thank you 23 August ', '2022-08-22 23:47:23'),
(6, 'Support Enigma', 'test@gmail.co', 'ertrt', '07327995561', 'fgdfvxg', '2022-09-09 00:16:56'),
(7, 'Tom DomainBroker', 'tom@syndicus.net', 'Levanta.Net', '6619277335', 'Hi,\r\n\r\nThe domain name Levanta.net is now available at a discount rate through the Sedo marketplace:\r\nhttps://sedo.com/search/details/?domain=Levanta.net\r\n\r\nThis domain should be important for you for many reasons, mainly:\r\na) Use it as your main/secondary web/email address.\r\nb) Protect & dominate your brand name online.\r\nc) Keep others from utilizing it.\r\nd) As a valuable asset (domain names are the real estate of the internet).\r\n\r\nEnjoy!\r\nTom - Domain Broker', '2022-12-02 12:02:21');

-- --------------------------------------------------------

--
-- Table structure for table `logo`
--

CREATE TABLE `logo` (
  `id` int(10) NOT NULL,
  `logo_name` varchar(20) NOT NULL,
  `logo_image` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `logo`
--

INSERT INTO `logo` (`id`, `logo_name`, `logo_image`) VALUES
(2, 'bansi', '812portfolio-details-2.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `product_name` varchar(255) DEFAULT NULL,
  `cat_name` varchar(400) DEFAULT NULL,
  `sub_cat` varchar(400) DEFAULT NULL,
  `product_image` text DEFAULT NULL,
  `description` longtext DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `product_name`, `cat_name`, `sub_cat`, `product_image`, `description`, `created_at`) VALUES
(12, 'Hydraulic Bed Fitting', '6', '14', 'Hydraulic_bed_fitting.jpg', 'Hydraulic bed fittings are innovative lifting mechanisms that allow the bed frame to be lifted effortlessly to reveal under-bed storage. These fittings are engineered with precision gas-lift pistons and durable hinges, ensuring smooth, silent, and safe operation. They are perfect for modern homes, where space efficiency and convenience are essential.', '2022-10-12 23:35:30'),
(13, 'Hydraulic Bed Fitting', '6', '14', 'Hydraulic_bed_fitting1.jpg', 'Hydraulic bed fittings are innovative lifting mechanisms that allow the bed frame to be lifted effortlessly to reveal under-bed storage. These fittings are engineered with precision gas-lift pistons and durable hinges, ensuring smooth, silent, and safe operation. They are perfect for modern homes, where space efficiency and convenience are essential.', '2022-10-12 23:42:59'),
(14, 'Hydraulic Bed FItting ', '6', '14', 'Hydraulic_bed_fitting2.jpg', 'Hydraulic bed fittings are innovative lifting mech...', '2022-10-12 23:52:47'),
(15, 'Hydraulic Bed Fitting', '6', '14', 'Hydraulic_bed_fitting3.jpg', 'Hydraulic bed fittings are innovative lifting mech...', '2022-10-12 23:58:07'),
(19, 'Door Catcher Magnet', '6', '15', 'Door_Catcher-Magnet.jpg', 'A Door Catcher Magnet is a compact yet powerful magnetic device designed to hold doors securely in place when opened. Commonly used in residential, commercial, and industrial settings, it prevents doors from swinging shut due to wind, air pressure, or accidental movement.', '2022-10-13 00:13:57'),
(20, 'Door Catcher Magnet', '6', '15', 'Door_Catcher-Magnet1.jpg', 'A Door Catcher Magnet is a compact yet powerful magnetic device designed to hold doors securely in place when opened. Commonly used in residential, commercial, and industrial settings, it prevents doors from swinging shut due to wind, air pressure, or accidental movement.', '2022-10-13 00:22:42'),
(23, 'Door Catcher Magnet', '6', '15', 'Door_Catcher-Magnet3.jpg', 'A Door Catcher Magnet is a compact yet powerful magnetic device designed to hold doors securely in place when opened. Commonly used in residential, commercial, and industrial settings, it prevents doors from swinging shut due to wind, air pressure, or accidental movement.', '2022-10-13 00:30:33'),
(24, 'Door Closer', '6', '15', 'Door_Closer.jpg', 'A Door Closer is a mechanical device designed to automatically close a door after it has been opened, ensuring controlled and secure door movement. It helps maintain privacy, security, and energy efficiency by preventing doors from slamming or remaining open unintentionally.\n\n', '2022-10-13 00:47:30'),
(25, 'Door Closer', '6', '15', 'Door_Closer1.jpg', 'A Door Closer is a mechanical device designed to automatically close a door after it has been opened, ensuring controlled and secure door movement. It helps maintain privacy, security, and energy efficiency by preventing doors from slamming or remaining open unintentionally.\n\n', '2022-10-13 00:49:30'),
(26, 'Door Closer', '6', '15', 'Door_Closer2.jpg', 'A Door Closer is a mechanical device designed to automatically close a door after it has been opened, ensuring controlled and secure door movement. It helps maintain privacy, security, and energy efficiency by preventing doors from slamming or remaining open unintentionally.\n\n', '2022-10-13 00:57:44'),
(27, 'Door Closer', '6', '15', 'Door_Closer3.jpg', 'A Door Closer is a mechanical device designed to automatically close a door after it has been opened, ensuring controlled and secure door movement. It helps maintain privacy, security, and energy efficiency by preventing doors from slamming or remaining open unintentionally.\n\n', '2022-10-13 01:02:37'),
(28, 'Tower Bolt', '6', '15', 'Tower_Bolt.jpg', 'A Tower Bolt is a simple and effective mechanical locking device used to secure doors, windows, cabinets, and gates. It consists of a sliding metal rod that fits into a catch or socket, providing a manual locking mechanism.\n\n', '2022-10-13 05:16:18'),
(29, 'Tower Bolt', '6', '15', 'Tower_Bolt1.jpg', 'A Tower Bolt is a simple and effective mechanical locking device used to secure doors, windows, cabinets, and gates. It consists of a sliding metal rod that fits into a catch or socket, providing a manual locking mechanism.\n\n', '2022-10-13 06:59:00'),
(30, 'Tower Bolt', '6', '15', 'Tower_Bolt2.jpg', 'A Tower Bolt is a simple and effective mechanical locking device used to secure doors, windows, cabinets, and gates. It consists of a sliding metal rod that fits into a catch or socket, providing a manual locking mechanism.\n\n', '2022-10-13 07:00:39'),
(31, 'Tower Bolt', '6', '15', 'Tower_Bolt3.jpg\r\n', 'A Tower Bolt is a simple and effective mechanical locking device used to secure doors, windows, cabinets, and gates. It consists of a sliding metal rod that fits into a catch or socket, providing a manual locking mechanism.\n\n', '2025-07-21 12:07:54'),
(32, 'Premium Auto Hings', '6', '16', 'Premium_Auto_Hings.jpg', 'Durable stainless steel hinge for doors.', '2025-07-21 20:56:32'),
(33, 'Premium Auto Hings', '6', '16', 'Premium_Auto_Hings1.jpg', 'Aluminium bolt with smooth finish.', '2025-07-21 20:56:32'),
(34, 'Premium Auto Hings', '6', '16', 'Premium_Auto_Hings2.jpg', 'Strong magnetic door catcher.', '2025-07-21 20:56:32'),
(36, 'Kitchen Profile', '7', '17', 'Kitchen_profile.jpg', 'A Kitchen Profile refers to sleek, modern aluminum or stainless-steel profile handles that are integrated into kitchen cabinet shutters or drawers. These are handle-less designs popular in modular kitchens, providing both functionality and a clean aesthetic.\n\n', '2025-07-21 20:56:32'),
(37, 'Kitchen Profile', '7', '17', 'Kitchen_profile 1.jpg', 'Multi-level corner kitchen storage.', '2025-07-21 20:56:32'),
(38, 'Kitchen Profile', '7\n', '17', 'Kitchen_profile 2.jpg', 'Smooth soft-close mechanism.', '2025-07-21 20:56:32'),
(39, 'Kitchen Basket', '7', '18', 'Kitchen_Baskets.jpg', 'Kitchen Baskets are modular wire or sheet-metal storage units designed to organize kitchen essentials like utensils, plates, cutlery, bottles, grains, and vegetables. These baskets are commonly installed inside kitchen cabinets or drawers and are available in various styles and sizes to suit specific storage needs.\n\n', '2025-07-21 20:56:32'),
(40, 'Kitchen Basket', '7', '18', 'Kitchen_Baskets2.jpg', 'Kitchen Baskets are modular wire or sheet-metal storage units designed to organize kitchen essentials like utensils, plates, cutlery, bottles, grains, and vegetables. These baskets are commonly installed inside kitchen cabinets or drawers and are available in various styles and sizes to suit specific storage needs.\n\n', '2025-07-21 20:56:32'),
(41, 'Kitchen  Basket', '7', '18', 'Kitchen_Baskets1.jpg', 'Kitchen Baskets are modular wire or sheet-metal storage units designed to organize kitchen essentials like utensils, plates, cutlery, bottles, grains, and vegetables. These baskets are commonly installed inside kitchen cabinets or drawers and are available in various styles and sizes to suit specific storage needs.\n\n', '2025-07-21 20:56:32'),
(42, 'Gas Pump', '7', '19', 'Gas_pump.jpg', 'A Gas Pump in kitchen or furniture hardware refers to a gas spring mechanism (also called a gas lift or hydraulic lift) used to smoothly open and hold up cabinet shutters or lids, especially in overhead kitchen cabinets, bed boxes, and storage compartments.\n\n', '2025-07-21 20:56:32'),
(46, 'Table Brackets', '8', '20', 'Table_Brackets.jpg', 'Table Brackets are sturdy metal supports used to fix, fold, or reinforce tabletops, shelves, or countertops. They are commonly used in homes, offices, and commercial furniture for supporting foldable or fixed surfaces, such as wall-mounted tables, breakfast counters, study desks, or shop counters.\r\n\r\n', '2025-07-21 21:25:33'),
(47, 'Table Brackets', '8', '20', 'Table_Brackets1.jpg', 'Table Brackets are sturdy metal supports used to fix, fold, or reinforce tabletops, shelves, or countertops. They are commonly used in homes, offices, and commercial furniture for supporting foldable or fixed surfaces, such as wall-mounted tables, breakfast counters, study desks, or shop counters.\r\n\r\n', '2025-07-21 21:25:33'),
(48, 'Furniture Nails', '8', '21', 'Furniture_nails.jpg', 'Furniture Nails—also known as decorative nails, tack nails, or upholstery nails—are small metal fasteners used in furniture assembly, decoration, and reinforcement. These nails not only hold components together but also enhance the aesthetic appeal of wooden or upholstered furniture.\r\n\r\n', '2025-07-21 21:29:30'),
(49, 'Furniture Nails', '8', '21', 'Furniture_nails1.jpg', 'Furniture Nails—also known as decorative nails, tack nails, or upholstery nails—are small metal fasteners used in furniture assembly, decoration, and reinforcement. These nails not only hold components together but also enhance the aesthetic appeal of wooden or upholstered furniture.\r\n\r\n', '2025-07-21 21:29:30'),
(50, 'Drywall Screw', '9', '22', 'Drywall_Screws.jpg', NULL, '2025-07-21 21:34:59'),
(51, 'Drywall Screws', '9', '22', 'Drywall_Screws1.jpg', 'Drywall Screws are specialized fasteners used primarily for fixing gypsum board (drywall) to wooden or metal frames. Known for their sharp tips, bugle heads, and phosphate coatings, they offer strong grip, easy penetration, and corrosion resistance—making them essential in modern wall and ceiling construction.\r\n\r\n', '2025-07-21 21:34:59'),
(53, 'Drywall Screws', '9', '22', 'Drywall_Screws2.jpg', 'Drywall Screws are specialized fasteners used primarily for fixing gypsum board (drywall) to wooden or metal frames. Known for their sharp tips, bugle heads, and phosphate coatings, they offer strong grip, easy penetration, and corrosion resistance—making them essential in modern wall and ceiling construction.\r\n\r\n', '2025-07-21 21:38:18'),
(54, 'Concrete Nails', '9', '23', 'COncrete_nails.jpg', 'Concrete Nails are hardened steel nails specifically designed to penetrate hard materials like brick, stone, or concrete. They are stronger and more durable than regular nails, ideal for construction work that involves masonry or concrete walls, flooring, or structural anchoring.\r\n\r\n', '2025-07-21 21:40:11'),
(55, 'Concrete Nails', '9', '23', 'Concrete_Nails.jpg', 'Concrete Nails are hardened steel nails specifically designed to penetrate hard materials like brick, stone, or concrete. They are stronger and more durable than regular nails, ideal for construction work that involves masonry or concrete walls, flooring, or structural anchoring.\r\n\r\n', '2025-07-21 21:40:11');

-- --------------------------------------------------------

--
-- Table structure for table `product_images`
--

CREATE TABLE `product_images` (
  `id` int(200) NOT NULL,
  `product_id` int(255) DEFAULT NULL,
  `image` varchar(400) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `product_images`
--

INSERT INTO `product_images` (`id`, `product_id`, `image`) VALUES
(1, 1, 'andrea-davis-k8TlRnE61dw-unsplash.jpg'),
(2, 1, 'christian-mackie-6BJu73-UJpg-unsplash.jpg'),
(3, 1, 'angele-kamp--OQbUQce54k-unsplash.jpg'),
(4, 1, 'davidcohen-wD5LMt3ElT4-unsplash.jpg'),
(5, 2, 'glen-ardi-yg-nrRoZcw0-unsplash.jpg'),
(6, 2, 'asiia-zaitseva-myRIo8-xYPQ-unsplash.jpg'),
(7, 2, 'erin-hervey-3UQtX0k6Wac-unsplash.jpg'),
(8, 2, 'note-thanun-fMsG3KPwuX0-unsplash.jpg'),
(9, 3, 'annie-spratt-osuiatBDTww-unsplash.jpg'),
(10, 3, 'glen-ardi-yg-nrRoZcw0-unsplash (1).jpg'),
(11, 3, 'madison-bracaglia-fcWAwPKpkTU-unsplash.jpg'),
(12, 3, 'glen-ardi-yg-nrRoZcw0-unsplash.jpg'),
(13, 4, 'edouard-dognin-H6PaJwYMfUU-unsplash.jpg'),
(14, 4, 'possessed-photography-fwsGrPwTQFc-unsplash.jpg'),
(15, 4, 'max-williams-_OoK2W7OPRM-unsplash.jpg'),
(16, 4, 'peyman-farmani-fECrNXmnZxw-unsplash.jpg'),
(17, 5, 'Spera Cataloge STATUARIO_page-0008 - Copy (2).jpg'),
(18, 5, 'Spera Cataloge STATUARIO_page-0008 - Copy (3).jpg'),
(19, 5, 'Spera Cataloge STATUARIO_page-0008 - Copy.jpg'),
(20, 5, 'Spera Cataloge STATUARIO_page-0008.jpg'),
(21, 6, 'Spera Cataloge STATUARIO_page-0008 - Copy (2).jpg'),
(22, 6, 'Spera Cataloge STATUARIO_page-0008 - Copy (3).jpg'),
(23, 6, 'Spera Cataloge STATUARIO_page-0008 - Copy.jpg'),
(24, 6, 'Spera Cataloge STATUARIO_page-0008.jpg'),
(25, 6, 'Statuario Preview.png'),
(26, 7, 'Spera Cataloge STATUARIO_page-0008 - Copy (2).jpg'),
(27, 7, 'Spera Cataloge STATUARIO_page-0008 - Copy (3).jpg'),
(28, 7, 'Spera Cataloge STATUARIO_page-0008 - Copy.jpg'),
(29, 7, 'Spera Cataloge STATUARIO_page-0008.jpg'),
(30, 7, 'Statuario Preview.png'),
(31, 8, '1.Statuario Preview.png'),
(32, 8, 'Spera Cataloge STATUARIO_page-0008 - Copy (2).jpg'),
(33, 8, 'Spera Cataloge STATUARIO_page-0008 - Copy (3).jpg'),
(34, 8, 'Spera Cataloge STATUARIO_page-0008 - Copy.jpg'),
(35, 8, 'Spera Cataloge STATUARIO_page-0008.jpg'),
(36, 9, 'bernard-hermant-S_Ei2XW3VxM-unsplash.jpg'),
(37, 9, 'curology-ycEKahEaO5U-unsplash.jpg'),
(38, 9, 'edouard-dognin-H6PaJwYMfUU-unsplash.jpg'),
(39, 9, 'possessed-photography-fwsGrPwTQFc-unsplash.jpg'),
(40, 10, 'edouard-dognin-H6PaJwYMfUU-unsplash.jpg'),
(41, 10, 'possessed-photography-fwsGrPwTQFc-unsplash.jpg'),
(42, 10, 'max-williams-_OoK2W7OPRM-unsplash.jpg'),
(43, 11, 'edouard-dognin-H6PaJwYMfUU-unsplash.jpg'),
(44, 11, 'possessed-photography-fwsGrPwTQFc-unsplash.jpg'),
(45, 11, 'max-williams-_OoK2W7OPRM-unsplash.jpg'),
(46, 11, 'peyman-farmani-fECrNXmnZxw-unsplash.jpg'),
(47, 12, '0012 Bookmatch.png'),
(48, 12, 'BOOK MATCH_0012 A.jpg'),
(49, 12, 'BOOK MATCH_0012 -B .jpg'),
(50, 13, 'Artistic White.jpg'),
(51, 13, 'ARTISTIC WHITE_P1.jpg'),
(52, 14, 'Bossy.jpg'),
(53, 14, 'BOSSY_P1.jpg'),
(54, 15, 'Bruno Nerro.jpg'),
(55, 15, 'BRUNO_NERRO NEW_P1.jpg'),
(56, 16, 'MARCELLO IVORY _P1.jpg'),
(57, 16, 'Marcello Ivory.jpg'),
(58, 17, 'MARCELLO IVORY _P1.jpg'),
(59, 17, 'Marcello Ivory.jpg'),
(60, 18, 'MARCELLO IVORY _P1.jpg'),
(61, 18, 'Marcello Ivory.jpg'),
(62, 19, 'Dallas Green.jpg'),
(63, 19, 'DALLAS GREEN_P1.jpg'),
(64, 20, 'CLAIRE FENTA _P1.jpg'),
(65, 20, 'Clarie Fenta.jpg'),
(66, 21, 'Amazonite Green.jpg'),
(67, 21, 'AMAZONITE GREEN_P1.jpg'),
(68, 22, 'Amazonite Green.jpg'),
(69, 22, 'AMAZONITE GREEN_P1.jpg'),
(70, 23, 'Gleshire Yellow.jpg'),
(71, 23, 'GLESHIRE YELLOW_P1.jpg'),
(72, 24, 'Niccolo Green.jpg'),
(73, 24, 'NICCOLO GREEN_P1.jpg'),
(74, 25, 'ROSALIA MIST _P1.jpg'),
(75, 25, 'Rosalia Mist.jpg'),
(76, 26, 'Canaria Aqua.jpg'),
(77, 26, 'CANARIA AQUA_P1.jpg'),
(78, 27, 'Crystal Mint.jpg'),
(79, 27, 'CRYSTAL MINT_P1.jpg'),
(80, 28, '800x3000 & 800x3200mm.Classtone series-8-compressed.jpg'),
(81, 29, '800x3000 & 800x3200mm.Classtone series-9-compressed.jpg'),
(82, 30, '800x3000 & 800x3200mm.Classtone series-21-compressed.jpg'),
(83, 31, '800x3000 & 800x3200mm.Classtone series-18-compressed.jpg'),
(84, 32, 'DC Classico Collection Without Logo_page-0002 - Copy.jpg'),
(85, 32, 'DC Classico Collection Without Logo_page-0002.jpg'),
(86, 33, 'DC Classico Collection Without Logo_page-0003 - Copy.jpg'),
(87, 33, 'DC Classico Collection Without Logo_page-0003.jpg'),
(88, 34, 'DC Classico Collection Without Logo_page-0004 - Copy.jpg'),
(89, 34, 'DC Classico Collection Without Logo_page-0004.jpg'),
(90, 35, 'Our Italian Mosaic E-Catalogue May 22_page-0007 - Copy.jpg'),
(91, 35, 'Our Italian Mosaic E-Catalogue May 22_page-0007.jpg'),
(92, 36, 'Our Italian Mosaic E-Catalogue May 22_page-0008 - Copy.jpg'),
(93, 36, 'Our Italian Mosaic E-Catalogue May 22_page-0008.jpg'),
(94, 37, 'Our Italian Mosaic E-Catalogue May 22_page-0009 - Copy.jpg'),
(95, 37, 'Our Italian Mosaic E-Catalogue May 22_page-0009.jpg'),
(96, 38, 'Our Italian Mosaic E-Catalogue May 22_page-0010 - Copy.jpg'),
(97, 38, 'Our Italian Mosaic E-Catalogue May 22_page-0010.jpg'),
(98, 39, 'Our Italian Mosaic E-Catalogue May 22_page-0011 - Copy.jpg'),
(99, 39, 'Our Italian Mosaic E-Catalogue May 22_page-0011.jpg'),
(100, 40, 'Our Italian Mosaic E-Catalogue May 22_page-0012 - Copy.jpg'),
(101, 40, 'Our Italian Mosaic E-Catalogue May 22_page-0012.jpg'),
(102, 41, 'Our Italian Mosaic E-Catalogue May 22_page-0016 - Copy.jpg'),
(103, 41, 'Our Italian Mosaic E-Catalogue May 22_page-0016.jpg'),
(104, 42, 'Our Italian Mosaic E-Catalogue May 22_page-0015 - Copy.jpg'),
(105, 42, 'Our Italian Mosaic E-Catalogue May 22_page-0015.jpg'),
(106, 43, 'Our Italian Mosaic E-Catalogue May 22_page-0017 - Copy.jpg'),
(107, 43, 'Our Italian Mosaic E-Catalogue May 22_page-0017.jpg'),
(108, 44, 'Our Italian Mosaic E-Catalogue May 22_page-0018 - Copy.jpg'),
(109, 44, 'Our Italian Mosaic E-Catalogue May 22_page-0018.jpg'),
(110, 45, '800x3000 & 800x3200mm.Classtone series-10-compressed.jpg'),
(111, 46, '800x3000 & 800x3200mm.Classtone series-20-compressed.jpg'),
(112, 47, '800x3000 & 800x3200mm.Classtone series-22-compressed.jpg'),
(113, 48, '800x3000 & 800x3200mm.Classtone series-23-compressed.jpg'),
(114, 49, '800x3000 & 800x3200mm.Classtone series-24-compressed.jpg'),
(115, 50, '800x3000 & 800x3200mm.Classtone series-25-compressed.jpg'),
(116, 51, 'DC Classico Collection Without Logo_page-0005 - Copy.jpg'),
(117, 51, 'DC Classico Collection Without Logo_page-0005.jpg'),
(118, 52, 'DC Classico Collection Without Logo_page-0006 - Copy.jpg'),
(119, 52, 'DC Classico Collection Without Logo_page-0006.jpg'),
(120, 53, 'DC Classico Collection Without Logo_page-0007 - Copy.jpg'),
(121, 53, 'DC Classico Collection Without Logo_page-0007.jpg'),
(122, 54, 'DC Classico Collection Without Logo_page-0008 - Copy.jpg'),
(123, 54, 'DC Classico Collection Without Logo_page-0008.jpg'),
(124, 55, 'Jazz 5006 Preview.jpg'),
(125, 55, 'JAZZ 5006.jpg'),
(126, 56, 'Butter Preview 2.jpg'),
(127, 56, 'Butter Preview.jpg'),
(128, 56, 'Butter.jpg'),
(129, 57, 'Charcoal Black Preview 2.jpg'),
(130, 57, 'Charcoal Black Preview.jpg'),
(131, 57, 'Charcoal Black.jpg'),
(132, 58, 'Dolomine Preview 2.jpg'),
(133, 58, 'Dolomine Preview.jpg'),
(134, 58, 'Dolomine.jpg'),
(135, 59, 'Dolphine Preview 2.jpg'),
(136, 59, 'Dolphine Preview.jpg'),
(137, 59, 'Dolphine.jpg'),
(138, 60, 'Forest Preview 2.jpg'),
(139, 60, 'Forest Preview.jpg'),
(140, 60, 'Forest.jpg'),
(141, 61, 'Mushroom Preview 2.jpg'),
(142, 61, 'Mushroom Preview.jpg'),
(143, 61, 'Mushroom.jpg'),
(144, 62, 'Slate Grey Preview 2.jpg'),
(145, 62, 'Slate Grey Preview.jpg'),
(146, 62, 'Slate Grey.jpg'),
(147, 63, 'Galaxy Preview 2.jpg'),
(148, 63, 'Galaxy Preview.jpg'),
(149, 63, 'Galaxy.jpg'),
(150, 64, 'Steel Grey Preview 2.jpg'),
(151, 64, 'Steel Grey Preview.jpg'),
(152, 64, 'Steel Grey.jpg'),
(153, 65, 'Blue Pearl Preview.png'),
(154, 66, 'Blue Pearl 1.jpg'),
(155, 66, 'Blue Pearl Preview.png'),
(156, 67, 'Arabescato Gold Preview.jpg'),
(157, 67, 'Arabescato Gold.jpg'),
(158, 68, 'Armani Beige Preview.png'),
(159, 68, 'Armani Beige.png'),
(160, 69, 'Breccia Silver Preview.png'),
(161, 69, 'Breccia Silver.png'),
(162, 70, 'Breccia Aurora Preview.png'),
(163, 70, 'Breccia Aurora.png'),
(164, 71, 'Acron Grey Preview.jpg'),
(165, 71, 'Acron Grey.jpg'),
(166, 72, 'Seamless Statuario Preview.png'),
(167, 72, 'Seamless Statuario.png'),
(168, 73, 'William Grey Preview.jpg'),
(169, 73, 'William Grey.jpg'),
(170, 74, '600x1200 mm MULTICHARGED VITRIFIED TILES_organized_page-0001.jpg'),
(171, 74, '600x1200 mm MULTICHARGED VITRIFIED TILES_organized_page-0002.jpg'),
(172, 75, '600x1200 mm MULTICHARGED VITRIFIED TILES_organized_page-0003.jpg'),
(173, 75, '600x1200 mm MULTICHARGED VITRIFIED TILES_organized_page-0004.jpg'),
(174, 76, 'MULTICHARGED VITRIFIED 60x120 1.jpg'),
(175, 76, 'MULTICHARGED VITRIFIED 60x120 2.jpg'),
(176, 77, '600x1200 mm MULTICHARGED VITRIFIED TILES_organized_page-0007.jpg'),
(177, 77, '600x1200 mm MULTICHARGED VITRIFIED TILES_organized_page-0008.jpg'),
(178, 78, 'Our Indian Mosaic E-Catalogue May 22 (1)_organized_page-0001 - Copy.jpg'),
(179, 78, 'Our Indian Mosaic E-Catalogue May 22 (1)_organized_page-0001.jpg'),
(180, 79, 'Our Indian Mosaic E-Catalogue May 22 (1)_organized_page-0002 - Copy.jpg'),
(181, 79, 'Our Indian Mosaic E-Catalogue May 22 (1)_organized_page-0002.jpg'),
(182, 80, 'Our Indian Mosaic E-Catalogue May 22 (1)_organized_page-0003 - Copy.jpg'),
(183, 80, 'Our Indian Mosaic E-Catalogue May 22 (1)_organized_page-0003.jpg'),
(184, 81, 'Our Indian Mosaic E-Catalogue May 22 (1)_organized_page-0004 - Copy.jpg'),
(185, 81, 'Our Indian Mosaic E-Catalogue May 22 (1)_organized_page-0004.jpg'),
(186, 82, 'Our Indian Mosaic E-Catalogue May 22 (1)_organized_page-0005 - Copy.jpg'),
(187, 82, 'Our Indian Mosaic E-Catalogue May 22 (1)_organized_page-0005.jpg'),
(188, 83, 'Our Indian Mosaic E-Catalogue May 22 (1)_organized_page-0006 - Copy.jpg'),
(189, 83, 'Our Indian Mosaic E-Catalogue May 22 (1)_organized_page-0006.jpg'),
(190, 84, 'Our Indian Mosaic E-Catalogue May 22 (1)_organized_page-0007 - Copy.jpg'),
(191, 84, 'Our Indian Mosaic E-Catalogue May 22 (1)_organized_page-0007.jpg'),
(192, 85, 'Our Indian Mosaic E-Catalogue May 22 (1)_organized_page-0008 - Copy.jpg'),
(193, 85, 'Our Indian Mosaic E-Catalogue May 22 (1)_organized_page-0008.jpg'),
(194, 86, 'Our Indian Mosaic E-Catalogue May 22 (1)_organized_page-0009 - Copy.jpg'),
(195, 86, 'Our Indian Mosaic E-Catalogue May 22 (1)_organized_page-0009.jpg'),
(196, 87, 'Our Indian Mosaic E-Catalogue May 22 (1)_organized_page-0010 - Copy.jpg'),
(197, 87, 'Our Indian Mosaic E-Catalogue May 22 (1)_organized_page-0010.jpg'),
(198, 88, 'Our Indian Mosaic E-Catalogue May 22 (1)_organized_page-0013 - Copy.jpg'),
(199, 88, 'Our Indian Mosaic E-Catalogue May 22 (1)_organized_page-0013.jpg'),
(200, 89, 'Our Indian Mosaic E-Catalogue May 22 (1)_organized_page-0014 - Copy.jpg'),
(201, 89, 'Our Indian Mosaic E-Catalogue May 22 (1)_organized_page-0014.jpg'),
(202, 90, 'Our Indian Mosaic E-Catalogue May 22 (1)_organized_page-0016 - Copy.jpg'),
(203, 90, 'Our Indian Mosaic E-Catalogue May 22 (1)_organized_page-0016.jpg'),
(204, 91, 'Our Indian Mosaic E-Catalogue May 22 (1)_organized_page-0019 - Copy.jpg'),
(205, 91, 'Our Indian Mosaic E-Catalogue May 22 (1)_organized_page-0019.jpg'),
(206, 92, 'Our Indian Mosaic E-Catalogue May 22 (1)_organized_page-0023 - Copy.jpg'),
(207, 92, 'Our Indian Mosaic E-Catalogue May 22 (1)_organized_page-0023.jpg'),
(208, 93, 'Our Indian Mosaic E-Catalogue May 22 (1)_organized_page-0024 - Copy.jpg'),
(209, 93, 'Our Indian Mosaic E-Catalogue May 22 (1)_organized_page-0024.jpg'),
(210, 94, 'Our Indian Mosaic E-Catalogue May 22 (1)_organized_page-0027 - Copy.jpg'),
(211, 94, 'Our Indian Mosaic E-Catalogue May 22 (1)_organized_page-0027.jpg'),
(212, 95, 'Our Indian Mosaic E-Catalogue May 22 (1)_organized_page-0027 - Copy.jpg'),
(213, 95, 'Our Indian Mosaic E-Catalogue May 22 (1)_organized_page-0027.jpg'),
(214, 96, 'Our Indian Mosaic E-Catalogue May 22 (1)_organized_page-0029 - Copy.jpg'),
(215, 96, 'Our Indian Mosaic E-Catalogue May 22 (1)_organized_page-0029.jpg'),
(216, 97, 'Jazz 5003 F1.jpg'),
(217, 97, 'Jazz 5003.jpg'),
(218, 98, 'Jazz 5042.jpg'),
(219, 98, 'JAZZ_5042_P1.jpg'),
(220, 99, 'ANTILA SKY _P1.jpg'),
(221, 99, 'Antila Sky.jpg'),
(222, 100, 'Breccia Fog.jpg'),
(223, 100, 'BRECCIA FOG_P1.jpg'),
(224, 101, 'Fino Natural.jpg'),
(225, 101, 'FINO NATURAL_P1.jpg'),
(226, 102, 'Miami Raffia.jpg'),
(227, 102, 'MIAMI RAFFIA_P1.jpg'),
(228, 103, 'Onyx Exposed.jpg'),
(229, 103, 'ONYX EXPOSED_P1.jpg'),
(230, 104, 'Onyx Seam Blanca.jpg'),
(231, 104, 'ONYX SEAM BLANCA_P1.jpg'),
(232, 105, 'Alaska 702 Natural.jpg'),
(233, 105, 'ALASKA 702_NATURAL _P1.jpg'),
(234, 106, 'Alaska 703 Blue.jpg'),
(235, 106, 'ALASKA 703_BLUE_p1.jpg'),
(236, 107, '1008 Aqua.jpg'),
(237, 107, 'IRIS_1008  AQUA_P1.jpg'),
(238, 108, '1001 Aqua.jpg'),
(239, 108, 'IRIS_1001 AQUA_P1.jpg'),
(240, 109, '1012.jpg'),
(241, 109, 'IRIS_1012 _p1.jpg'),
(242, 110, '1033.jpg'),
(243, 110, 'IRIS_1033_P1.jpg'),
(244, 111, 'Brillo Satvario.jpg'),
(245, 111, 'BRILLO_SATVARIO_P1.jpg'),
(246, 112, 'ITALIANO BLACK_P1.jpg'),
(247, 112, 'Itallino Black.jpg'),
(248, 113, 'Particio Moon.jpg'),
(249, 113, 'PARTICIO MOON_P1.jpg'),
(250, 114, 'Elite Grey.jpg'),
(251, 114, 'ELITE GREY_P1.jpg'),
(252, 115, 'Galaxy Bianco.jpg'),
(253, 115, 'GALAXY BIANCO_P1.jpg'),
(254, 116, 'ZETA GREY _p1.jpg'),
(255, 116, 'Zeta Grey.jpg'),
(256, 117, 'Tz 2007.jpg'),
(257, 117, 'tz 2007.png'),
(258, 118, 'Jazz 5028.jpg'),
(259, 118, 'JAZZ_5028_P1.jpg'),
(260, 119, 'ANTIQUE BLACK _P1.jpg'),
(261, 119, 'Antique Black.jpg'),
(262, 120, 'BLACK MARQUINA _P1.jpg'),
(263, 120, 'Black Marquina.jpg'),
(264, 121, 'Dolomite.jpg'),
(265, 121, 'DOLOMITE_P1.jpg'),
(266, 122, 'DAZZEL _P1.jpg'),
(267, 122, 'Dazzel.jpg'),
(268, 123, 'AKASA BEIGE _P1.jpg'),
(269, 123, 'Akasa Beige.jpg'),
(270, 124, 'Almond Wood Brown.jpg'),
(271, 124, 'ALMONDWOOD BROWN.jpg'),
(272, 125, 'Ash Wood Grey.jpg'),
(273, 125, 'ASH WOOD GREY_P1.jpg'),
(274, 126, 'ANTUNE NATURAL _P1.jpg'),
(275, 126, 'Antune Natural.jpg'),
(276, 127, 'Our  800x2400mm Brillo Collection E-Catalogue Design July 2022_page-0017.jpg'),
(277, 127, 'Our  800x2400mm Brillo Collection E-Catalogue Design July 2022_page-0026 - Copy.jpg'),
(278, 128, 'Our  800x2400mm Brillo Collection E-Catalogue Design July 2022_page-0013 - Copy (2).jpg'),
(279, 128, 'Our  800x2400mm Brillo Collection E-Catalogue Design July 2022_page-0013 - Copy.jpg'),
(280, 128, 'Our  800x2400mm Brillo Collection E-Catalogue Design July 2022_page-0013.jpg'),
(281, 129, 'Our  800x2400mm Brillo Collection E-Catalogue Design July 2022_page-0014.jpg'),
(282, 129, 'Our  800x2400mm Brillo Collection E-Catalogue Design July 2022_page-0015.jpg'),
(283, 130, 'Our  800x2400mm Brillo Collection E-Catalogue Design July 2022_page-0018 - Copy.jpg'),
(284, 130, 'Our  800x2400mm Brillo Collection E-Catalogue Design July 2022_page-0018.jpg'),
(285, 131, 'Our  800x2400mm Brillo Collection E-Catalogue Design July 2022_page-0020 - Copy (2).jpg'),
(286, 131, 'Our  800x2400mm Brillo Collection E-Catalogue Design July 2022_page-0020 - Copy.jpg'),
(287, 131, 'Our  800x2400mm Brillo Collection E-Catalogue Design July 2022_page-0020.jpg'),
(288, 132, 'Our  800x2400mm Brillo Collection E-Catalogue Design July 2022_page-0023.jpg'),
(289, 132, 'Our  800x2400mm Brillo Collection E-Catalogue Design July 2022_page-0024.jpg'),
(290, 133, 'Our  800x2400mm Brillo Collection E-Catalogue Design July 2022_page-0026.jpg'),
(291, 133, 'Our  800x2400mm Brillo Collection E-Catalogue Design July 2022_page-0027.jpg'),
(292, 134, 'Our Linkable PDF Elezzo Collection 800x2400mm for website_page-0009 - Copy (2).jpg'),
(293, 134, 'Our Linkable PDF Elezzo Collection 800x2400mm for website_page-0010.jpg'),
(294, 134, 'Our Linkable PDF Elezzo Collection 800x2400mm for website_page-0011 - Copy.jpg'),
(295, 134, 'Our Linkable PDF Elezzo Collection 800x2400mm for website_page-0011.jpg'),
(296, 135, 'Our Linkable PDF Elezzo Collection 800x2400mm for website_page-0010.jpg'),
(297, 135, 'Our Linkable PDF Elezzo Collection 800x2400mm for website_page-0011 - Copy.jpg'),
(298, 135, 'Our Linkable PDF Elezzo Collection 800x2400mm for website_page-0011.jpg'),
(299, 136, 'Our Linkable PDF Elezzo Collection 800x2400mm for website_page-0012.jpg'),
(300, 136, 'Our Linkable PDF Elezzo Collection 800x2400mm for website_page-0013 - Copy.jpg'),
(301, 136, 'Our Linkable PDF Elezzo Collection 800x2400mm for website_page-0013.jpg'),
(302, 137, 'Our Linkable PDF Elezzo Collection 800x2400mm for website_page-0014.jpg'),
(303, 137, 'Our Linkable PDF Elezzo Collection 800x2400mm for website_page-0015 - Copy.jpg'),
(304, 137, 'Our Linkable PDF Elezzo Collection 800x2400mm for website_page-0015.jpg'),
(305, 138, 'Our Linkable PDF Elezzo Collection 800x2400mm for website_page-0016.jpg'),
(306, 138, 'Our Linkable PDF Elezzo Collection 800x2400mm for website_page-0017 - Copy.jpg'),
(307, 138, 'Our Linkable PDF Elezzo Collection 800x2400mm for website_page-0017.jpg'),
(308, 139, 'Our Linkable PDF Elezzo Collection 800x2400mm for website_page-0018.jpg'),
(309, 139, 'Our Linkable PDF Elezzo Collection 800x2400mm for website_page-0019 - Copy.jpg'),
(310, 139, 'Our Linkable PDF Elezzo Collection 800x2400mm for website_page-0019.jpg'),
(311, 140, 'Our Linkable PDF Elezzo Collection 800x2400mm for website_page-0020.jpg'),
(312, 140, 'Our Linkable PDF Elezzo Collection 800x2400mm for website_page-0021 - Copy.jpg'),
(313, 140, 'Our Linkable PDF Elezzo Collection 800x2400mm for website_page-0021.jpg'),
(314, 141, 'Our Linkable PDF Elezzo Collection 800x2400mm for website_page-0022.jpg'),
(315, 141, 'Our Linkable PDF Elezzo Collection 800x2400mm for website_page-0023 - Copy.jpg'),
(316, 141, 'Our Linkable PDF Elezzo Collection 800x2400mm for website_page-0023.jpg'),
(317, 142, 'Our Linkable PDF Elezzo Collection 800x2400mm for website_page-0024.jpg'),
(318, 142, 'Our Linkable PDF Elezzo Collection 800x2400mm for website_page-0025 - Copy.jpg'),
(319, 142, 'Our Linkable PDF Elezzo Collection 800x2400mm for website_page-0025.jpg'),
(320, 143, 'Our Linkable PDF Elezzo Collection 800x2400mm for website_page-0026.jpg'),
(321, 143, 'Our Linkable PDF Elezzo Collection 800x2400mm for website_page-0027 - Copy.jpg'),
(322, 143, 'Our Linkable PDF Elezzo Collection 800x2400mm for website_page-0027.jpg'),
(323, 144, 'Our Linkable PDF Elezzo Collection 800x2400mm for website_page-0029.jpg'),
(324, 144, 'Our Linkable PDF Elezzo Collection 800x2400mm for website_page-0030 - Copy.jpg'),
(325, 144, 'Our Linkable PDF Elezzo Collection 800x2400mm for website_page-0030.jpg'),
(326, 145, 'Our Linkable PDF Elezzo Collection 800x2400mm for website_page-0031.jpg'),
(327, 145, 'Our Linkable PDF Elezzo Collection 800x2400mm for website_page-0032 - Copy.jpg'),
(328, 145, 'Our Linkable PDF Elezzo Collection 800x2400mm for website_page-0032.jpg'),
(329, 146, 'Our Linkable PDF Elezzo Collection 800x2400mm for website_page-0033.jpg'),
(330, 146, 'Our Linkable PDF Elezzo Collection 800x2400mm for website_page-0034 - Copy.jpg'),
(331, 146, 'Our Linkable PDF Elezzo Collection 800x2400mm for website_page-0034.jpg'),
(332, 147, 'Our Linkable PDF Elezzo Collection 800x2400mm for website_page-0035.jpg'),
(333, 147, 'Our Linkable PDF Elezzo Collection 800x2400mm for website_page-0036 - Copy.jpg'),
(334, 147, 'Our Linkable PDF Elezzo Collection 800x2400mm for website_page-0036.jpg'),
(335, 148, 'Our Linkable PDF Elezzo Collection 800x2400mm for website_page-0037.jpg'),
(336, 148, 'Our Linkable PDF Elezzo Collection 800x2400mm for website_page-0038 - Copy.jpg'),
(337, 148, 'Our Linkable PDF Elezzo Collection 800x2400mm for website_page-0038.jpg'),
(338, 149, 'Our Linkable PDF Elezzo Collection 800x2400mm for website_page-0039.jpg'),
(339, 149, 'Our Linkable PDF Elezzo Collection 800x2400mm for website_page-0040 - Copy.jpg'),
(340, 149, 'Our Linkable PDF Elezzo Collection 800x2400mm for website_page-0040.jpg'),
(341, 0, 'SEPTEMBER22 SPC_page-0004 - Copy.jpg'),
(342, 0, 'SEPTEMBER22 SPC_page-0004.jpg'),
(343, 0, 'SEPTEMBER22 SPC_page-0004 - Copy.jpg'),
(344, 0, 'SEPTEMBER22 SPC_page-0004.jpg'),
(345, 150, 'SEPTEMBER22 SPC_page-0004 - Copy.jpg'),
(346, 150, 'SEPTEMBER22 SPC_page-0004.jpg'),
(347, 151, 'SEPTEMBER22 SPC_page-0005 - Copy.jpg'),
(348, 151, 'SEPTEMBER22 SPC_page-0005.jpg'),
(349, 152, 'SEPTEMBER22 SPC_page-0006 - Copy.jpg'),
(350, 152, 'SEPTEMBER22 SPC_page-0006.jpg'),
(351, 153, 'SEPTEMBER22 SPC_page-0007 - Copy.jpg'),
(352, 153, 'SEPTEMBER22 SPC_page-0007.jpg'),
(353, 154, 'SEPTEMBER22 SPC_page-0008 - Copy.jpg'),
(354, 154, 'SEPTEMBER22 SPC_page-0008.jpg'),
(355, 155, 'SEPTEMBER22 SPC_page-0009 - Copy.jpg'),
(356, 155, 'SEPTEMBER22 SPC_page-0009.jpg'),
(357, 156, 'SEPTEMBER22 SPC_page-0010 - Copy.jpg'),
(358, 156, 'SEPTEMBER22 SPC_page-0010.jpg'),
(359, 157, 'SEPTEMBER22 SPC_page-0011 - Copy.jpg'),
(360, 157, 'SEPTEMBER22 SPC_page-0011.jpg'),
(361, 158, 'SEPTEMBER22 SPC_page-0012 - Copy.jpg'),
(362, 158, 'SEPTEMBER22 SPC_page-0012.jpg'),
(363, 159, 'SEPTEMBER22 SPC_page-0013 - Copy.jpg'),
(364, 159, 'SEPTEMBER22 SPC_page-0013.jpg'),
(365, 160, 'SEPTEMBER22 SPC_page-0014 - Copy.jpg'),
(366, 160, 'SEPTEMBER22 SPC_page-0014.jpg'),
(367, 161, 'SEPTEMBER22 SPC_page-0015 - Copy.jpg'),
(368, 161, 'SEPTEMBER22 SPC_page-0015.jpg'),
(369, 162, 'SEPTEMBER22 SPC_page-0016 - Copy.jpg'),
(370, 162, 'SEPTEMBER22 SPC_page-0016.jpg'),
(371, 163, 'SEPTEMBER22 SPC_page-0017 - Copy.jpg'),
(372, 163, 'SEPTEMBER22 SPC_page-0017.jpg'),
(373, 164, 'SEPTEMBER22 SPC_page-0018 - Copy.jpg'),
(374, 164, 'SEPTEMBER22 SPC_page-0018.jpg'),
(375, 165, 'SEPTEMBER22 SPC_page-0019 - Copy.jpg'),
(376, 165, 'SEPTEMBER22 SPC_page-0019.jpg'),
(377, 166, 'SEPTEMBER22 SPC_page-0020 - Copy.jpg'),
(378, 166, 'SEPTEMBER22 SPC_page-0020.jpg'),
(379, 167, 'SEPTEMBER22 SPC_page-0021 - Copy.jpg'),
(380, 167, 'SEPTEMBER22 SPC_page-0021.jpg'),
(381, 168, 'SEPTEMBER22 SPC_page-0022 - Copy.jpg'),
(382, 168, 'SEPTEMBER22 SPC_page-0022.jpg'),
(383, 169, 'SEPTEMBER22 SPC_page-0023 - Copy.jpg'),
(384, 169, 'SEPTEMBER22 SPC_page-0023.jpg'),
(385, 170, '0006 - Copy (2).jpg'),
(386, 170, '0006 - Copy.jpg'),
(387, 170, '0006.jpg'),
(388, 170, '0007.jpg'),
(389, 171, '0010 - Copy (2).jpg'),
(390, 171, '0010 - Copy.jpg'),
(391, 171, '0010.jpg'),
(392, 171, '0011.jpg'),
(393, 172, '0014 - Copy (2).jpg'),
(394, 172, '0014 - Copy.jpg'),
(395, 172, '0014.jpg'),
(396, 172, '0015.jpg'),
(397, 173, '0018 - Copy (2).jpg'),
(398, 173, '0018 - Copy.jpg'),
(399, 173, '0018.jpg'),
(400, 173, '0019.jpg'),
(401, 174, '0022 - Copy (2).jpg'),
(402, 174, '0022 - Copy.jpg'),
(403, 174, '0022.jpg'),
(404, 174, '0023.jpg'),
(405, 175, '0026 - Copy (2).jpg'),
(406, 175, '0026 - Copy.jpg'),
(407, 175, '0026.jpg'),
(408, 175, '0027.jpg'),
(409, 176, '0030 - Copy (2).jpg'),
(410, 176, '0030 - Copy.jpg'),
(411, 176, '0030.jpg'),
(412, 176, '0031.jpg'),
(413, 177, '0034 - Copy (2).jpg'),
(414, 177, '0034 - Copy.jpg'),
(415, 177, '0034.jpg'),
(416, 177, '0035.jpg'),
(417, 178, '0038 - Copy (2).jpg'),
(418, 178, '0038 - Copy.jpg'),
(419, 178, '0038.jpg'),
(420, 178, '0039.jpg'),
(421, 179, '0042 - Copy (2).jpg'),
(422, 179, '0042 - Copy.jpg'),
(423, 179, '0042.jpg'),
(424, 179, '0043.jpg'),
(425, 180, '0046 - Copy (2).jpg'),
(426, 180, '0046 - Copy.jpg'),
(427, 180, '0046.jpg'),
(428, 180, '0047.jpg'),
(429, 181, '0008 - Copy (2).jpg'),
(430, 181, '0008 - Copy.jpg'),
(431, 181, '0008.jpg'),
(432, 181, '0009.jpg'),
(433, 182, '0012 - Copy (2).jpg'),
(434, 182, '0012 - Copy.jpg'),
(435, 182, '0012.jpg'),
(436, 182, '0013.jpg'),
(437, 183, '0016 - Copy (2).jpg'),
(438, 183, '0016 - Copy.jpg'),
(439, 183, '0016.jpg'),
(440, 183, '0017.jpg'),
(441, 184, '0020 - Copy (2).jpg'),
(442, 184, '0020 - Copy.jpg'),
(443, 184, '0020.jpg'),
(444, 184, '0021.jpg'),
(445, 185, '0024 - Copy (2).jpg'),
(446, 185, '0024 - Copy.jpg'),
(447, 185, '0024.jpg'),
(448, 185, '0025.jpg'),
(449, 186, '0028 - Copy (2).jpg'),
(450, 186, '0028 - Copy.jpg'),
(451, 186, '0028.jpg'),
(452, 186, '0029.jpg'),
(453, 187, '0032 - Copy (2).jpg'),
(454, 187, '0032 - Copy.jpg'),
(455, 187, '0032.jpg'),
(456, 187, '0033.jpg'),
(457, 188, '0036 - Copy (2).jpg'),
(458, 188, '0036 - Copy.jpg'),
(459, 188, '0036.jpg'),
(460, 188, '0037.jpg'),
(461, 189, '0040 - Copy (2).jpg'),
(462, 189, '0040 - Copy.jpg'),
(463, 189, '0040.jpg'),
(464, 189, '0041.jpg'),
(465, 190, '0044 - Copy (2).jpg'),
(466, 190, '0044 - Copy.jpg'),
(467, 190, '0044.jpg'),
(468, 190, '0045.jpg'),
(469, 191, '0048 - Copy (2).jpg'),
(470, 191, '0048 - Copy.jpg'),
(471, 191, '0048.jpg'),
(472, 191, '0049.jpg'),
(473, 192, 'Absolute Beige 60x90 Preview.jpg'),
(474, 192, 'Absolute Beige 60x90.jpg'),
(475, 193, 'Belgiumstone Black 60x90 Preview.jpg'),
(476, 193, 'Belgiumstone Black 60x90.jpg'),
(477, 194, 'Belgiumstone Grey 60x90 Preview.jpg'),
(478, 194, 'Belgiumstone Grey 60x90.jpg'),
(479, 195, 'Breccia Crema 60x90 Preview.jpg'),
(480, 195, 'Breccia Crema 60x90.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `site_setting`
--

CREATE TABLE `site_setting` (
  `id` int(200) NOT NULL,
  `call_us` varchar(255) DEFAULT NULL,
  `reach_us` varchar(400) DEFAULT NULL,
  `mail_us` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `site_setting`
--

INSERT INTO `site_setting` (`id`, `call_us`, `reach_us`, `mail_us`) VALUES
(1, '99554 10008 , 82106 22197 ', '<div style=\"color:white;\">Plot-3 Shed-4 and Galaxy Firing Village, Rajkot, India, 360030</div>\n', 'congethardware@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `slider`
--

CREATE TABLE `slider` (
  `id` int(10) NOT NULL,
  `slider_image` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `slider`
--

INSERT INTO `slider` (`id`, `slider_image`) VALUES
(7, 'Banner 1.png'),
(8, 'Banner 2.png'),
(9, 'Banner 4.png'),
(10, 'Banner 3.png');

-- --------------------------------------------------------

--
-- Table structure for table `subcategory`
--

CREATE TABLE `subcategory` (
  `id` int(200) NOT NULL,
  `cat_id` int(200) DEFAULT NULL,
  `sub_name` varchar(400) DEFAULT NULL,
  `image` varchar(400) DEFAULT NULL,
  `description` varchar(400) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `subcategory`
--

INSERT INTO `subcategory` (`id`, `cat_id`, `sub_name`, `image`, `description`) VALUES
(14, 6, 'Hydrulic Fittings', 'Hydraulic_fittings.jpg', 'The most Popular Size now a days in Porcelain Tile, We are here with the Large collection of 60x120 cm and in Various Surface Finish.'),
(15, 6, 'Door Hardware', 'Door_Hardware.jpg', ''),
(16, 6, 'Hings', 'Hings.jpg', ''),
(17, 7, 'Kitchen Profiles', 'Kitchen_profile 1.jpg', ''),
(18, 7, 'Kitchen Storage', 'Kitchen_Baskets2.jpg', ''),
(19, 7, 'Gas Pump', 'Gas_pump.jpg', ''),
(20, 8, 'Brackets', 'Brackets.jpg', ''),
(21, 8, 'Nails & Pins', 'Nails & Pins.jpg', ''),
(22, 9, 'Drywall Screws', 'Drywall_Screws1.jpg', ''),
(23, 9, 'Concreate Nails', 'COncrete_nails.jpg', '');

-- --------------------------------------------------------

--
-- Table structure for table `what_say`
--

CREATE TABLE `what_say` (
  `id` int(200) NOT NULL,
  `name` varchar(400) DEFAULT NULL,
  `bussiness` varchar(400) DEFAULT NULL,
  `description` varchar(400) DEFAULT NULL,
  `image` varchar(400) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `what_say`
--

INSERT INTO `what_say` (`id`, `name`, `bussiness`, `description`, `image`) VALUES
(1, 'Ailan  Wilsson', 'Designer', 'Export tempor illum tamen malis malis eram quae irure esse labore quem cillum quid cillum eram malis quorum velit fore eram velit sunt aliqua noster fugiat irure amet legam anim culpa.', '436Client2.jpg'),
(2, 'Matt Brandon', 'Freelancer', 'Fugiat enim eram quae cillum dolore dolor amet nulla culpa multos export minim fugiat minim velit minim dolor enim duis veniam ipsum anim magna sunt elit fore quem dolore labore illum veniam.', '173Client3.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `about_us`
--
ALTER TABLE `about_us`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `choose_us`
--
ALTER TABLE `choose_us`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `inquiry`
--
ALTER TABLE `inquiry`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `logo`
--
ALTER TABLE `logo`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_images`
--
ALTER TABLE `product_images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `site_setting`
--
ALTER TABLE `site_setting`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `slider`
--
ALTER TABLE `slider`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subcategory`
--
ALTER TABLE `subcategory`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `what_say`
--
ALTER TABLE `what_say`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `about_us`
--
ALTER TABLE `about_us`
  MODIFY `id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `choose_us`
--
ALTER TABLE `choose_us`
  MODIFY `id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `inquiry`
--
ALTER TABLE `inquiry`
  MODIFY `id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `logo`
--
ALTER TABLE `logo`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=224;

--
-- AUTO_INCREMENT for table `product_images`
--
ALTER TABLE `product_images`
  MODIFY `id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=481;

--
-- AUTO_INCREMENT for table `site_setting`
--
ALTER TABLE `site_setting`
  MODIFY `id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `slider`
--
ALTER TABLE `slider`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `subcategory`
--
ALTER TABLE `subcategory`
  MODIFY `id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `what_say`
--
ALTER TABLE `what_say`
  MODIFY `id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
