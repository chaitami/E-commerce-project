-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jun 20, 2021 at 03:06 PM
-- Server version: 5.7.31
-- PHP Version: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `shopping`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `creationDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updationDate` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`, `creationDate`, `updationDate`) VALUES
(6, 'younesch', 'younes.123', '2021-06-20 15:04:47', '');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

DROP TABLE IF EXISTS `category`;
CREATE TABLE IF NOT EXISTS `category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `categoryName` varchar(255) DEFAULT NULL,
  `categoryDescription` longtext,
  `creationDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updationDate` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `categoryName`, `categoryDescription`, `creationDate`, `updationDate`) VALUES
(3, 'Laptops', 'Laptops', '2017-01-24 19:17:37', '16-05-2021 09:26:45 PM'),
(4, 'Desktops', 'Desktops', '2017-01-24 19:19:32', '16-05-2021 10:09:44 PM'),
(5, 'Televisions', 'Televisions', '2017-01-24 19:19:54', '16-05-2021 10:12:23 PM'),
(6, 'Smartphones', 'Smartphones', '2017-02-20 19:18:52', '16-05-2021 10:13:54 PM'),
(7, 'Accessories', 'Accessories', '2021-05-16 16:49:20', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

DROP TABLE IF EXISTS `orders`;
CREATE TABLE IF NOT EXISTS `orders` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `userId` int(11) DEFAULT NULL,
  `productId` varchar(255) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `orderDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `paymentMethod` varchar(50) DEFAULT NULL,
  `orderStatus` varchar(55) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `ordertrackhistory`
--

DROP TABLE IF EXISTS `ordertrackhistory`;
CREATE TABLE IF NOT EXISTS `ordertrackhistory` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `orderId` int(11) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `remark` mediumtext,
  `postingDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `productreviews`
--

DROP TABLE IF EXISTS `productreviews`;
CREATE TABLE IF NOT EXISTS `productreviews` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `productId` int(11) DEFAULT NULL,
  `quality` int(11) DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  `value` int(11) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `summary` varchar(255) DEFAULT NULL,
  `review` longtext,
  `reviewDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `productreviews`
--

INSERT INTO `productreviews` (`id`, `productId`, `quality`, `price`, `value`, `name`, `summary`, `review`, `reviewDate`) VALUES
(2, 3, 4, 5, 5, 'Anuj Kumar', 'BEST PRODUCT FOR ME :)', 'BEST PRODUCT FOR ME :)', '2017-02-26 20:43:57'),
(3, 3, 3, 4, 3, 'Sarita pandey', 'Nice Product', 'Value for money', '2017-02-26 20:52:46'),
(4, 3, 3, 4, 3, 'Sarita pandey', 'Nice Product', 'Value for money', '2017-02-26 20:59:19');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
CREATE TABLE IF NOT EXISTS `products` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `category` int(11) NOT NULL,
  `subCategory` int(11) DEFAULT NULL,
  `productName` varchar(255) DEFAULT NULL,
  `productCompany` varchar(255) DEFAULT NULL,
  `productPrice` int(11) DEFAULT NULL,
  `productPriceBeforeDiscount` int(11) DEFAULT NULL,
  `productDescription` longtext,
  `productImage1` varchar(255) DEFAULT NULL,
  `productImage2` varchar(255) DEFAULT NULL,
  `productImage3` varchar(255) DEFAULT NULL,
  `shippingCharge` int(11) DEFAULT NULL,
  `productAvailability` varchar(255) DEFAULT NULL,
  `postingDate` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updationDate` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `category`, `subCategory`, `productName`, `productCompany`, `productPrice`, `productPriceBeforeDiscount`, `productDescription`, `productImage1`, `productImage2`, `productImage3`, `shippingCharge`, `productAvailability`, `postingDate`, `updationDate`) VALUES
(21, 3, 14, 'MSI GF65 Thin â€“ i7-10750H RTX3060', 'MSI', 3157, 5487, '<ul style=\"box-sizing: border-box; padding-left: 20px; margin-bottom: 1rem; list-style-type: square; color: rgb(17, 17, 17); font-family: Inter, &quot;Open Sans&quot;, HelveticaNeue-Light, &quot;Helvetica Neue Light&quot;, &quot;Helvetica Neue&quot;, Helvetica, Arial, &quot;Lucida Grande&quot;, sans-serif; font-size: 14px; letter-spacing: -0.14px; background-color: rgb(248, 248, 248);\"><li style=\"box-sizing: border-box;\">Ecran: 17.3â€ LED â€“ IPS FULL HD 144 Hz</li><li style=\"box-sizing: border-box;\">Processeur: i7-10750H+HM470</li><li style=\"box-sizing: border-box;\">MÃ©moire: SO-DIM 2X8Go 3200Mhz</li><li style=\"box-sizing: border-box;\">Carte Graphique: Nvidia GeForce RTX3060, GDDR6 6GB</li><li style=\"box-sizing: border-box;\">SSD: 256GB NVMe PCIe Gen3x4 SSD</li><li style=\"box-sizing: border-box;\">OS: Windows10 Home Africa</li></ul>', 'Atlas-Gaming-MSI-GF65-A.jpg', 'Atlas-Gaming-MSI-GF65-C-600x600.jpg', 'Atlas-Gaming-MSI-GF65-D.jpg', 30, 'In Stock', '2021-05-16 17:25:38', NULL),
(22, 3, 15, 'HP EliteBook 840 G3 Core i5-6300U I 8Go I 256 Go SSD I Win 10Pro I 14 â€³ Full HD Touch', 'HP', 425, 628, '<ul style=\"box-sizing: border-box; margin-bottom: 1em; margin-left: 0px; padding-left: 1.1em; list-style-position: initial; list-style-image: initial; max-height: 205px; overflow: hidden; color: rgb(98, 96, 96); font-family: Rubik, &quot;Source Sans Pro&quot;, HelveticaNeue-Light, &quot;Helvetica Neue Light&quot;, &quot;Helvetica Neue&quot;, Helvetica, Arial, &quot;Lucida Grande&quot;, sans-serif; font-size: 14.72px; letter-spacing: -0.1472px;\"><li style=\"box-sizing: border-box;\">CPU :&nbsp;<span style=\"box-sizing: border-box; color: rgb(0, 0, 255);\">IntelÂ® Coreâ„¢ i5-6300U @ 2.40GHz</span></li><li style=\"box-sizing: border-box;\">RAM :<span style=\"box-sizing: border-box; color: rgb(0, 0, 255);\">&nbsp;8Go DDR4</span></li><li style=\"box-sizing: border-box;\">Disque Dur :<span style=\"box-sizing: border-box; color: rgb(0, 0, 255);\">&nbsp;256Go SSD</span></li><li style=\"box-sizing: border-box;\">Ecran :&nbsp;<span style=\"box-sizing: border-box; color: rgb(0, 0, 255);\"><span style=\"box-sizing: border-box;\">14â€³ Full HD&nbsp;<span style=\"box-sizing: border-box; color: rgb(255, 0, 0);\">Tactile&nbsp;</span></span></span></li><li style=\"box-sizing: border-box;\">OS :<span style=\"box-sizing: border-box; color: rgb(0, 0, 255);\">&nbsp;Windows 10 Pro</span>&nbsp;64Bits</li></ul>', 'HP-840-G3_-1.jpg', 'HP-840-G3-01-f.jpg', 'HP-840-G3-01-o-scaled.jpg', 30, 'In Stock', '2021-05-16 17:42:24', NULL),
(23, 4, 17, 'HP ProDesk 600 G2 Corei5-6500 I 8GB DDR4 I 500GB I Win 10 + HP LED 20 â€³', 'HP', 305, 487, '<ul style=\"box-sizing: border-box; margin-bottom: 1em; margin-left: 0px; padding-left: 1.1em; list-style-position: initial; list-style-image: initial; max-height: 205px; overflow: hidden; color: rgb(98, 96, 96); font-family: Rubik, &quot;Source Sans Pro&quot;, HelveticaNeue-Light, &quot;Helvetica Neue Light&quot;, &quot;Helvetica Neue&quot;, Helvetica, Arial, &quot;Lucida Grande&quot;, sans-serif; font-size: 14.72px; letter-spacing: -0.1472px;\"><li style=\"box-sizing: border-box;\">CPU :&nbsp;<span style=\"box-sizing: border-box; color: rgb(0, 0, 255);\">IntelÂ® Coreâ„¢ i5-6500 ( 6<span style=\"box-sizing: border-box; font-size: 11.04px; line-height: 0; position: relative; vertical-align: baseline; top: -0.5em; height: 0px; bottom: 1ex;\">eme</span>&nbsp;gÃ©nÃ©ration ) @ 3.20 GHz</span></li><li style=\"box-sizing: border-box;\">RAM :<span style=\"box-sizing: border-box;\"><span style=\"box-sizing: border-box; color: rgb(0, 0, 255);\">&nbsp;8<span style=\"box-sizing: border-box;\">Go</span>&nbsp;DDR4</span></span></li><li style=\"box-sizing: border-box;\">Disque Dure :<span style=\"box-sizing: border-box;\">&nbsp;<span style=\"box-sizing: border-box; color: rgb(0, 0, 255);\">500Go</span></span></li><li style=\"box-sizing: border-box;\">Ecran&nbsp;<span style=\"box-sizing: border-box; color: rgb(0, 0, 255);\">HP Led 20 pouces</span></li><li style=\"box-sizing: border-box;\">OS&nbsp;<span style=\"box-sizing: border-box;\"><span style=\"box-sizing: border-box; color: rgb(0, 0, 255);\">: Windows 10</span></span>&nbsp;pro 64 bits avec licence</li></ul>', 'Brand-New-HP-EliteDesk-800-G1-SFF.jpg', 'HP-600-G2-Core-i5-6500.jpg', 'HP-ProDesk-600-G2-SFF-02-1.jpg', 20, 'In Stock', '2021-05-16 17:52:39', NULL),
(24, 4, 16, 'iBUYPOWER - Gaming Desktop - Intel i7-10700F - 16GB Memory - NVIDIA GeForce RTX 2060 6GB - 1TB HDD + 480GB SSD', 'iBUYPOWER', 3187, 4551, '<div class=\"list-row\" style=\"box-sizing: border-box; color: rgb(4, 12, 19); font-family: &quot;Human BBY Digital&quot;, Arial, Helvetica, sans-serif;\"><h4 class=\"feature-title body-copy v-fw-medium\" style=\"box-sizing: border-box; font-weight: 500; line-height: normal; color: inherit; font-size: 13px; margin-bottom: 0px; padding: 0px 0px 6px;\">Windows 10 operating system</h4><p class=\"body-copy\" style=\"box-sizing: border-box; margin-bottom: 9px; line-height: normal;\">Windows 10 brings back the Start Menu from Windows 7 and introduces new features, like the Edge Web browser that lets you markup Web pages on your screen.&nbsp;Learn more â€º</p></div><div class=\"list-row\" style=\"box-sizing: border-box; color: rgb(4, 12, 19); font-family: &quot;Human BBY Digital&quot;, Arial, Helvetica, sans-serif;\"><h4 class=\"feature-title body-copy v-fw-medium\" style=\"box-sizing: border-box; font-weight: 500; line-height: normal; color: inherit; font-size: 13px; margin-bottom: 0px; padding: 11px 0px 6px;\">Intel i7-10700F processor</h4><p class=\"body-copy\" style=\"box-sizing: border-box; margin-bottom: 9px; line-height: normal;\">Native eight-core processing delivers aggressive yet power-smart performance for advanced gaming, complex modeling and HD video editing.</p></div><div class=\"list-row\" style=\"box-sizing: border-box; color: rgb(4, 12, 19); font-family: &quot;Human BBY Digital&quot;, Arial, Helvetica, sans-serif;\"><h4 class=\"feature-title body-copy v-fw-medium\" style=\"box-sizing: border-box; font-weight: 500; line-height: normal; color: inherit; font-size: 13px; margin-bottom: 0px; padding: 11px 0px 6px;\">16GB system memory for advanced multitasking</h4><p class=\"body-copy\" style=\"box-sizing: border-box; margin-bottom: 9px; line-height: normal;\">Ream of high-bandwidth DDR4 RAM to smoothly run your graphics-heavy PC games and video-editing applications, as well as numerous programs and browser tabs all at once.</p></div><div class=\"list-row\" style=\"box-sizing: border-box; color: rgb(4, 12, 19); font-family: &quot;Human BBY Digital&quot;, Arial, Helvetica, sans-serif;\"><h4 class=\"feature-title body-copy v-fw-medium\" style=\"box-sizing: border-box; font-weight: 500; line-height: normal; color: inherit; font-size: 13px; margin-bottom: 0px; padding: 11px 0px 6px;\">1TB hard drive and 480GB solid state drive (SSD) for a blend of storage space and speed</h4><p class=\"body-copy\" style=\"box-sizing: border-box; margin-bottom: 9px; line-height: normal;\">The hard drive provides ample storage, while the SSD delivers faster start-up times and data access.</p></div><div class=\"list-row\" style=\"box-sizing: border-box; color: rgb(4, 12, 19); font-family: &quot;Human BBY Digital&quot;, Arial, Helvetica, sans-serif;\"><h4 class=\"feature-title body-copy v-fw-medium\" style=\"box-sizing: border-box; font-weight: 500; line-height: normal; color: inherit; font-size: 13px; margin-bottom: 0px; padding: 11px 0px 6px;\">NVIDIA GeForce RTX 2060 graphics</h4><p class=\"body-copy\" style=\"box-sizing: border-box; margin-bottom: 9px; line-height: normal;\">Driven by 6GB dedicated video memory to quickly render high-quality images for videos and games.</p></div><div class=\"list-row\" style=\"box-sizing: border-box; color: rgb(4, 12, 19); font-family: &quot;Human BBY Digital&quot;, Arial, Helvetica, sans-serif;\"><h4 class=\"feature-title body-copy v-fw-medium\" style=\"box-sizing: border-box; font-weight: 500; line-height: normal; color: inherit; font-size: 13px; margin-bottom: 0px; padding: 11px 0px 6px;\">Wired network connectivity</h4><p class=\"body-copy\" style=\"box-sizing: border-box; margin-bottom: 9px; line-height: normal;\">Built-in Gigabit Ethernet LAN port plugs into your wired network.</p></div><div class=\"list-row\" style=\"box-sizing: border-box; color: rgb(4, 12, 19); font-family: &quot;Human BBY Digital&quot;, Arial, Helvetica, sans-serif;\"><h4 class=\"feature-title body-copy v-fw-medium\" style=\"box-sizing: border-box; font-weight: 500; line-height: normal; color: inherit; font-size: 13px; margin-bottom: 0px; padding: 11px 0px 6px;\">Multidisplay capability</h4><p class=\"body-copy\" style=\"box-sizing: border-box; margin-bottom: 9px; line-height: normal;\">Connect the usual single monitor, or add a second monitor to double your viewing space for work and games. (Monitors sold separately.)</p></div><div class=\"list-row\" style=\"box-sizing: border-box; color: rgb(4, 12, 19); font-family: &quot;Human BBY Digital&quot;, Arial, Helvetica, sans-serif;\"><h4 class=\"feature-title body-copy v-fw-medium\" style=\"box-sizing: border-box; font-weight: 500; line-height: normal; color: inherit; font-size: 13px; margin-bottom: 0px; padding: 11px 0px 6px;\">Note: This computer does not include a built-in DVD/CD drive.</h4></div><div class=\"list-row\" style=\"box-sizing: border-box; color: rgb(4, 12, 19); font-family: &quot;Human BBY Digital&quot;, Arial, Helvetica, sans-serif;\"><h4 class=\"feature-title body-copy v-fw-medium\" style=\"box-sizing: border-box; font-weight: 500; line-height: normal; color: inherit; font-size: 13px; margin-bottom: 0px; padding: 11px 0px 6px;\">IEM certified system</h4><p class=\"body-copy\" style=\"box-sizing: border-box; margin-bottom: 9px; line-height: normal;\">Configured in collaboration with Intel and ESL, the new&nbsp;iBUYPOWER&nbsp;Element MR desktop gaming systems have been designed to meet&nbsp;or exceed the hardware requirements set by the Intel Extreme Master Certified Gaming System Program.</p></div>', '6418152_sd.jpg', '6418152cv2d.jpg', '', 40, 'In Stock', '2021-05-16 18:24:16', NULL),
(25, 5, 18, 'VIZIO 85\" Class 4K UHD Quantum Smartcast Smart TV HDR P-Series P85QX-H1', 'VIZIO ', 4251, 5254, '<ul style=\"box-sizing: border-box; margin-top: 16px; margin-bottom: 0px; margin-left: 0px; color: rgb(0, 0, 0); font-family: BogleWeb, &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; font-size: 14px;\"><li style=\"box-sizing: border-box;\"><span style=\"box-sizing: border-box; font-weight: bolder;\">Dolby Vision HDR</span>&nbsp;&nbsp;A superior HDR standard for 4K video, capable of displaying a wider spectrum of colors, brightness and detail. This TV includes HDR10 and HLG content support as well.&nbsp;</li><li style=\"box-sizing: border-box;\"><span style=\"box-sizing: border-box; font-weight: bolder;\">4K Ultra HD</span>&nbsp;&nbsp;With over 8 million pixels â€” 4 times the resolution of 1080p â€” enjoy every scene in breathtaking detail.</li><li style=\"box-sizing: border-box;\"><span style=\"box-sizing: border-box; font-weight: bolder;\">VIZIO IQ Ultra(TM) Processor</span>&nbsp;Inside, VIZIOâ€™s fastest, smartest chip â€“ the revolutionary IQ Ultra processor offers best-in-class picture processing, more powerful 4K upscaling engine and HDMI 2.1 connectivity.</li><li style=\"box-sizing: border-box;\"><span style=\"box-sizing: border-box; font-weight: bolder;\">ProGaming Engine(TM)</span>&nbsp;&nbsp;With 4K 120Hz gaming support, ProGaming Engine automatically optimizes Xbox and Playstation gameplay with a unique suite of gaming features that provide smoother graphics, more responsive gaming, and better 4K HDR picture quality â€“ Variable Refresh Rate matches the refresh rate between your console and TV for tear and stutter free gaming at the lowest input lag.</li><li style=\"box-sizing: border-box;\"><span style=\"box-sizing: border-box; font-weight: bolder;\">AMD FreeSync Premiumâ„¢&nbsp;</span>&nbsp;Equips serious gamers with a. fluid, tear-free gameplay experience at peak performance. There are no compromises, game confidently with a high refresh rate, low framerate compensation and low latency. The P-Series Quantum X also supports HDMI Variable Refresh Rate.</li><li style=\"box-sizing: border-box;\"><span style=\"box-sizing: border-box; font-weight: bolder;\">Anti-reflective screen</span>&nbsp;New anti-reflection screen minimizes glare in bright rooms where unwelcome sunlight can creep in.&nbsp;</li><li style=\"box-sizing: border-box;\"><span style=\"box-sizing: border-box; font-weight: bolder;\">SmartCast</span>&nbsp;&nbsp;With lightning fast navigation, enjoy instant access to the best selection of apps from top-tier streaming services like Netflix, Disney+, YouTube, and many more right on the TV using the all-new smart remote or SmartCast Mobile app.</li></ul>', '097ad243-de83-4636-add0-9d566275b266.c8f75bef5edb27a8f3b7d0e1b3a79864.jpeg', 'ef8b4108-efe5-4bab-a3ea-ed303edad5d6.3452b3a4a0ac25eec6980626eef24486.jpeg', 'a5859134-f834-4aa6-9993-953161c64959.37e34dbbd0dd0cc1bd1b8e3bc909317a.jpeg', 60, 'In Stock', '2021-05-16 18:38:30', NULL),
(26, 6, 19, 'Refurbished Samsung Galaxy S9 G960U 64GB Verizon GSM Unlocked AT&T T-Mobile Smartphone - Midnight Black', 'Samsung ', 257, 324, '<p style=\"box-sizing: border-box; margin-top: 16px; margin-bottom: 0px; color: rgb(0, 0, 0); font-family: BogleWeb, &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; font-size: 14px;\"><span style=\"box-sizing: border-box; font-weight: bolder;\">Samsung Galaxy S9 SM-G960U 64GB Factory Unlocked Android Smartphone - Used (Refurbished - Good)</span><br style=\"box-sizing: border-box;\"></p><ul style=\"box-sizing: border-box; margin-top: 16px; margin-bottom: 0px; margin-left: 0px; color: rgb(0, 0, 0); font-family: BogleWeb, &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; font-size: 14px;\"><li style=\"box-sizing: border-box;\">5.8-inch Super AMOLED Capacitive Touchscreen</li><li style=\"box-sizing: border-box;\">Display resolution 1440 x 2960 pixels with Corning Gorilla Glass 5</li><li style=\"box-sizing: border-box;\">Android OS, Qualcomm Snapdragon 845</li><li style=\"box-sizing: border-box;\">Octa-Core (4x2.7 GHz &amp; 4x1.7 GHz), Adreno 630</li><li style=\"box-sizing: border-box;\">Internal Memory: 64GB</li><li style=\"box-sizing: border-box;\">4GB RAM - microSD Up to 400GB</li><li style=\"box-sizing: border-box;\">12MP Camera with f/1.5-2.4, 26mm lens, Dual Pixel PDAF</li><li style=\"box-sizing: border-box;\">8MP Front Camera with f/1.7, 25mm lens, Auto HDR</li><li style=\"box-sizing: border-box;\">Non-Removable 3,000mAh Lithium Ion Capacity</li><li style=\"box-sizing: border-box;\">Dimensions: 5.81 x 2.70 x 0.33 inches</li><li style=\"box-sizing: border-box;\">Weight: 5.75 oz</li></ul>', '8498e8a6-0a5d-4f1e-bb35-175c4745abf5_1.abfa90b48304b82faecd3112d24eb90a.jpeg', '5c02883d-8eb6-4b47-9f63-b3497ac1d42e_1.4b034dba646ce13a3dc6f3aac8a1e10d.jpeg', '8fe85b3a-fb4d-4fd5-968d-56845b894900_1.dfd1821c88f3c9158942840904e1304c.jpeg', 20, 'In Stock', '2021-05-16 19:17:04', NULL),
(27, 7, 22, 'Refurbished Beats Solo3 Wireless On-Ear Headphones with Apple W1 Headphone Chip - Black', 'Beats ', 124, 215, 'fhchg gfgj hgfgh fhgj uyfgj yfuyg jyfgug yfjggjh hgfgj egttdg dthgdthg dghrdtg&nbsp; drgsrdg srgrsg rghrdsg', 'f76ac660-9f5a-495c-9af3-4bec619de77a_1.cf2fbfe5d7071433a3c80a2360a3d7f4.png', '59856df5-8b86-48b9-9a88-d6f4268736f9_1.1b4088331f5a79093f0867a9ff5f2b3e.jpeg', '8d7d22dc-50b2-4629-b838-50a910972188.deafda49c1896512099a143bd0eee28c.jpeg', 10, 'In Stock', '2021-05-16 19:35:57', NULL),
(28, 7, 22, 'Lenovo HX106 Earphone Wireless Bluetooth Headphones - Black', 'Lenovo', 52, 69, '<br><div><div style=\"text-align: left; font-size: 14px; color: rgb(102, 102, 102); font-family: simplified_arabicregular;\"><br></div><div style=\"text-align: left; font-size: 14px; color: rgb(102, 102, 102); font-family: simplified_arabicregular;\"><font style=\"vertical-align: inherit;\">Model Number: Original Lenovo HX06 Bluetooth 5.0 Earphone</font></div><div style=\"text-align: left; font-size: 14px; color: rgb(102, 102, 102); font-family: simplified_arabicregular;\"><font style=\"vertical-align: inherit;\">Black color</font></div><div style=\"text-align: left; font-size: 14px; color: rgb(102, 102, 102); font-family: simplified_arabicregular;\"><font style=\"vertical-align: inherit;\">Style: Ear Hook</font></div><div style=\"text-align: left; font-size: 14px; color: rgb(102, 102, 102); font-family: simplified_arabicregular;\"><font style=\"vertical-align: inherit;\">Plug Type: Wireless with</font></div><div style=\"text-align: left; font-size: 14px; color: rgb(102, 102, 102); font-family: simplified_arabicregular;\"><font style=\"vertical-align: inherit;\">Microphone: Yes</font></div><div style=\"text-align: left; font-size: 14px; color: rgb(102, 102, 102); font-family: simplified_arabicregular;\"><font style=\"vertical-align: inherit;\">Wireless type: bluetooth</font></div><div style=\"text-align: left; font-size: 14px; color: rgb(102, 102, 102); font-family: simplified_arabicregular;\"><font style=\"vertical-align: inherit;\">Bluetooth: 5.0 version</font></div><div style=\"text-align: left; font-size: 14px; color: rgb(102, 102, 102); font-family: simplified_arabicregular;\"><font style=\"vertical-align: inherit;\">Wireless range: 10 m</font></div><div style=\"text-align: left; font-size: 14px; color: rgb(102, 102, 102); font-family: simplified_arabicregular;\"><font style=\"vertical-align: inherit;\">Headphone battery: 160 mAh</font></div><div style=\"text-align: left; font-size: 14px; color: rgb(102, 102, 102); font-family: simplified_arabicregular;\"><font style=\"vertical-align: inherit;\">Net weight: 12g</font></div><div style=\"text-align: left; font-size: 14px; color: rgb(102, 102, 102); font-family: simplified_arabicregular;\"><font style=\"vertical-align: inherit;\">The earbuds are fully charged and they can stand for 120 hours and play music for about 20 hours</font></div><div style=\"text-align: left; font-size: 14px; color: rgb(102, 102, 102); font-family: simplified_arabicregular;\"><b><br></b></div><div style=\"text-align: left; font-size: 14px; color: rgb(102, 102, 102); font-family: simplified_arabicregular;\"><b>Package Included:</b></div><div style=\"text-align: left; font-size: 14px; color: rgb(102, 102, 102); font-family: simplified_arabicregular;\"><br></div><div style=\"text-align: left; font-size: 14px; color: rgb(102, 102, 102); font-family: simplified_arabicregular;\"><font style=\"vertical-align: inherit;\">1 * Lenovo HX106 Bluetooth 5.0 Headphone</font></div><div style=\"text-align: left; font-size: 14px; color: rgb(102, 102, 102); font-family: simplified_arabicregular;\"><font style=\"vertical-align: inherit;\">1 * USB charging cable</font></div></div>', 'Screenshot 2021-05-17 153337.png', 'Screenshot 2021-05-17 153304.png', 'Screenshot 2021-05-17 153506.png', 0, 'In Stock', '2021-05-17 14:35:37', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `subcategory`
--

DROP TABLE IF EXISTS `subcategory`;
CREATE TABLE IF NOT EXISTS `subcategory` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `categoryid` int(11) DEFAULT NULL,
  `subcategory` varchar(255) DEFAULT NULL,
  `creationDate` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updationDate` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subcategory`
--

INSERT INTO `subcategory` (`id`, `categoryid`, `subcategory`, `creationDate`, `updationDate`) VALUES
(14, 3, 'Gamer', '2021-05-16 17:23:57', NULL),
(15, 3, 'Workstation', '2021-05-16 17:24:19', NULL),
(16, 4, 'Gamer', '2021-05-16 17:30:47', NULL),
(17, 4, 'Workstation', '2021-05-16 17:31:03', NULL),
(18, 5, 'TV', '2021-05-16 17:32:18', NULL),
(19, 6, 'High Range', '2021-05-16 17:34:46', NULL),
(20, 6, 'Medium Range', '2021-05-16 17:34:57', NULL),
(21, 6, 'Low Range', '2021-05-16 17:35:12', NULL),
(22, 7, 'Accessorie', '2021-05-16 17:36:28', '17-05-2021 12:59:20 AM');

-- --------------------------------------------------------

--
-- Table structure for table `userlog`
--

DROP TABLE IF EXISTS `userlog`;
CREATE TABLE IF NOT EXISTS `userlog` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `userEmail` varchar(255) DEFAULT NULL,
  `userip` binary(16) DEFAULT NULL,
  `loginTime` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `logout` varchar(255) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `contactno` bigint(11) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `shippingAddress` longtext,
  `MethodShipping` varchar(255) DEFAULT NULL,
  `shippingCity` varchar(255) DEFAULT NULL,
  `shippingPincode` int(11) DEFAULT NULL,
  `Country` longtext,
  `regDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `contactno`, `password`, `shippingAddress`, `MethodShipping`, `shippingCity`, `shippingPincode`, `Country`, `regDate`) VALUES
(6, 'hjkhj / kjhjkhjkh', 'younes@gmail.com', 745785, 'f2fe8b719bdbe4b1362dc94610ab1890', 'hjhjh', 'Standard shipping', 'jbkjb', 4575, 'Europe', '2021-05-07 15:23:59'),
(7, 'younes', 'younes1@gmail.com', 123, '202cb962ac59075b964b07152d234b70', NULL, NULL, NULL, NULL, NULL, '2021-05-08 14:01:45'),
(8, 'othman / ch', 'othman@gmail.com', 245484, 'younes.123', 'jdyufv', 'Standard shipping', 'hvjh', 7458, 'Asia', '2021-05-12 15:12:53');

-- --------------------------------------------------------

--
-- Table structure for table `wishlist`
--

DROP TABLE IF EXISTS `wishlist`;
CREATE TABLE IF NOT EXISTS `wishlist` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `userId` int(11) DEFAULT NULL,
  `productId` int(11) DEFAULT NULL,
  `postingDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
