-- phpMyAdmin SQL Dump
-- version 5.1.1deb5ubuntu1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Apr 29, 2024 at 01:35 PM
-- Server version: 8.0.36-0ubuntu0.22.04.1
-- PHP Version: 8.1.2-1ubuntu2.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hsbac`
--

-- --------------------------------------------------------

--
-- Table structure for table `clients`
--

CREATE TABLE `clients` (
  `id` int NOT NULL,
  `email` varchar(200) COLLATE utf8mb4_general_ci NOT NULL,
  `pass` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `clients`
--

INSERT INTO `clients` (`id`, `email`, `pass`, `name`) VALUES
(1, 'cliente1@gmail.com', '84ad6f1543b39e1d7e2a79785b62b796', 'Cliente1');

-- --------------------------------------------------------

--
-- Table structure for table `files`
--

CREATE TABLE `files` (
  `id` int NOT NULL,
  `filename` varchar(250) COLLATE utf8mb4_general_ci NOT NULL DEFAULT '',
  `filesize` int NOT NULL DEFAULT '0',
  `web_path` varchar(250) COLLATE utf8mb4_general_ci NOT NULL DEFAULT '',
  `system_path` varchar(250) COLLATE utf8mb4_general_ci NOT NULL DEFAULT '',
  `test` tinyint(1) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `files`
--

INSERT INTO `files` (`id`, `filename`, `filesize`, `web_path`, `system_path`, `test`) VALUES
(6, '4090-3.jpg', 66943, '/hsbac/uploads/6.jpg', '/var/www/html/hsbac/uploads/6.jpg', 0),
(7, '4090-2.jpg', 154720, '/hsbac/uploads/7.jpg', '/var/www/html/hsbac/uploads/7.jpg', 0),
(8, '4090-1.jpg', 112759, '/hsbac/uploads/8.jpg', '/var/www/html/hsbac/uploads/8.jpg', 0),
(9, 'ASUS-ROG-Z790-E.png', 340231, '/hsbac/uploads/9.png', '/var/www/html/hsbac/uploads/9.png', 0),
(10, 'RYZEN-9-7950X3D.jpg', 40194, '/hsbac/uploads/10.jpg', '/var/www/html/hsbac/uploads/10.jpg', 0),
(11, 'CORSAIR-RM850E-1.jpg', 97888, '/hsbac/uploads/11.jpg', '/var/www/html/hsbac/uploads/11.jpg', 0),
(12, 'KINGSTON-KC3000-1.jpg', 26502, '/hsbac/uploads/12.jpg', '/var/www/html/hsbac/uploads/12.jpg', 0),
(13, 'KINGSTON-FURY-BEAST-32GB-DDR5-1.jpg', 40881, '/hsbac/uploads/13.jpg', '/var/www/html/hsbac/uploads/13.jpg', 0),
(14, 'GIGABYTE-X670E-XTREME-AM5-1.jpg', 114215, '/hsbac/uploads/14.jpg', '/var/www/html/hsbac/uploads/14.jpg', 0),
(15, 'RADEON-RX-7900-XTX-1.jpg', 59391, '/hsbac/uploads/15.jpg', '/var/www/html/hsbac/uploads/15.jpg', 0),
(16, 'I9-14900k-1.jpg', 29109, '/hsbac/uploads/16.jpg', '/var/www/html/hsbac/uploads/16.jpg', 0),
(17, 'I7-14700K-1.jpg', 65267, '/hsbac/uploads/17.jpg', '/var/www/html/hsbac/uploads/17.jpg', 0),
(18, 'I5-14600K-1.jpg', 65197, '/hsbac/uploads/18.jpg', '/var/www/html/hsbac/uploads/18.jpg', 0),
(19, 'RTX-4080-1.jpg', 208745, '/hsbac/uploads/19.jpg', '/var/www/html/hsbac/uploads/19.jpg', 0),
(20, 'RTX 4070.jpg', 11230, '/hsbac/uploads/20.jpg', '/var/www/html/hsbac/uploads/20.jpg', 0),
(21, 'TEMPEST-X-850W-80+-1.png', 403232, '/hsbac/uploads/21.png', '/var/www/html/hsbac/uploads/21.png', 0);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int NOT NULL,
  `name` varchar(200) COLLATE utf8mb4_general_ci NOT NULL,
  `price` double NOT NULL,
  `stock` int NOT NULL,
  `description` varchar(1000) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `price`, `stock`, `description`) VALUES
(6, 'Graphics Card RTX4090', 2000, 50, 'NVIDIA® GeForce RTX™ 4090 es la GPU GeForce definitiva. Supone un enorme salto en rendimiento, eficiencia y gráficos con tecnología de IA. Disfruta de juegos de alto rendimiento, mundos virtuales con un nivel de detalle increíble, productividad sin precedentes y nuevas formas de crear. Cuenta con la tecnología de la arquitectura NVIDIA Ada Lovelace y dispone de 24 GB de memoria G6X para ofrecer la experiencia definitiva para jugadores y creadores.'),
(7, 'Motherboard ASUS ROG STRIX Z790-E', 600, 50, ''),
(8, 'CPU AMD Ryzen 9 7950X3D', 600, 50, 'The best processor for gaming, with AMD 3D V-Cache™ technology for even more gaming performance. The do-it-all 16-core processor, with amazing AMD performance for the most demanding gamers and creators. Additionally, enjoy the benefits of AMD 3D V-Cache™, the cutting-edge technology that is synonymous with low latency and high gaming performance.'),
(9, 'PSU CORSAIR-RM850E-850W', 100, 200, ''),
(10, 'SSD Kingston KC3000 2TB', 150, 100, ''),
(11, 'RAM Kingston FURY Beast DDR5 5200MHz 32GB', 100, 100, ''),
(12, 'Motherboard GIGABYTE X670E XTREME AM5', 700, 20, ''),
(13, 'Graphics Card RADEON RX 7900 XTX', 1100, 20, 'Experience unprecedented performance, visuals and efficiency in 4K and beyond with AMD Radeon™ RX 7000 Series graphics cards, the world\'s first gaming GPUs powered by AMD RDNA™ 3 chiplet. Immerse yourself in stunning visuals with pinpoint color accuracy. from the AMD Radiance Display™ engine and boost frame rates with AMD FidelityFX™ Super Resolution and Radeon™ Super Resolution enhancement technologies. To unlock even more performance, combine AMD Radeon™ RX 7000 Series graphics and compatible AMD Ryzen™ processors to enable AMD intelligent technologies.'),
(14, 'CPU INTEL I9 14900K', 600, 50, 'The Intel Core i9-14900K 6.0GHz processor, designed for LGA1700 motherboards, is a powerful 14th generation chip. It offers a total of 8 P-Cores and 16 E-Cores, with a base frequency of 3.20 GHz for the P-Cores and an impressive maximum frequency of 6.00 GHz. The E-Cores reach up to 4.40 GHz. With 36 MB of cache memory and an unlocked multiplier, this processor has a TDP of 125W. It is based on the Raptor Lake Refresh microarchitecture and promises exceptional performance.'),
(15, 'CPU INTEL I7 14700k', 400, 150, 'The Intel Core i7-14700K processor is a powerful processing unit with a number of notable features. It offers a total of 8 P-Core cores and 12 E-Core cores, with a base frequency of 3.40 GHz for the P-Core and an impressive maximum frequency of 5.60 GHz. The 33 MB cache memory ensures performance fast and efficient. Compatible with LGA1700 motherboards, this processor belongs to the 14th generation series and uses the Raptor Lake Refresh microarchitecture. In addition, its unlocked multiplier allows custom settings, and its TDP is 125 W.'),
(16, 'CPU INTEL I5 14600K', 320, 200, 'The Intel Core i5-14600K processor is a solid choice for users looking for efficient and powerful performance in their systems. This chip from Intel combines cutting-edge architecture with reliable performance to meet the needs of gamers and content creators.  This CPU stands out for its ability to handle intensive tasks, offering agile behavior and multitasking without problems. With 14 cores and 20 threads, it is ideal for applications that require processing power, from gaming to video editing.  This processor also supports overclocking, allowing enthusiasts to tune its performance to reach even higher levels. The Intel Core i5-14600K is a versatile option that meets the needs of a variety of users, from gamers to creative professionals, and offers a solid balance between price and performance.'),
(17, 'Graphics Card RTX4080', 1100, 50, ''),
(18, 'Graphics Card RTX4070', 550, 100, 'Get ready for stellar gaming and creation with the NVIDIA® GeForce RTX™ 4070. It\'s built on the ultra-efficient NVIDIA Ada Lovelace architecture. Experience fast ray tracing, AI-accelerated performance with DLSS 3, new ways to create, and more.  NVIDIA® GeForce RTX® 40 Series GPUs are beyond fast for gamers and creators. They are powered by the ultra-efficient NVIDIA Ada Lovelace architecture, which offers a quantum leap in both performance and AI-powered graphics. Enjoy realistic ray-traced virtual worlds and games with ultra-high FPS and the lowest latency. Discover revolutionary new ways to create content and unprecedented workflow acceleration.'),
(19, 'PSU TEMPEST X 850W 80+', 70, 300, '');

-- --------------------------------------------------------

--
-- Table structure for table `products_files`
--

CREATE TABLE `products_files` (
  `product_id` int NOT NULL,
  `file_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products_files`
--

INSERT INTO `products_files` (`product_id`, `file_id`) VALUES
(9, 11),
(11, 13),
(10, 12),
(7, 9),
(12, 14),
(17, 19),
(19, 21),
(6, 7),
(16, 18),
(8, 10),
(15, 17),
(14, 16),
(13, 15),
(18, 20);

-- --------------------------------------------------------

--
-- Table structure for table `sales`
--

CREATE TABLE `sales` (
  `id` int NOT NULL,
  `idCli` int NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `salesDetail`
--

CREATE TABLE `salesDetail` (
  `id` int NOT NULL,
  `idProd` int NOT NULL,
  `idSale` int NOT NULL,
  `quantity` int NOT NULL,
  `price` double NOT NULL,
  `subTotal` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `email` varchar(200) COLLATE utf8mb4_general_ci NOT NULL,
  `pass` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `pass`, `name`) VALUES
(1, 'albertrodriguez@hsbac.elpuig.xeill.net', '84ad6f1543b39e1d7e2a79785b62b796', 'Albert'),
(2, 'ccano@hsbac.elpuig.xeill.net', '84ad6f1543b39e1d7e2a79785b62b796', 'Cristian Cano');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `files`
--
ALTER TABLE `files`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sales`
--
ALTER TABLE `sales`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fkidCli` (`idCli`);

--
-- Indexes for table `salesDetail`
--
ALTER TABLE `salesDetail`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fkidProd` (`idProd`),
  ADD KEY `fkidSale` (`idSale`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `clients`
--
ALTER TABLE `clients`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `files`
--
ALTER TABLE `files`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `sales`
--
ALTER TABLE `sales`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `salesDetail`
--
ALTER TABLE `salesDetail`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `sales`
--
ALTER TABLE `sales`
  ADD CONSTRAINT `idCli` FOREIGN KEY (`idCli`) REFERENCES `clients` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `salesDetail`
--
ALTER TABLE `salesDetail`
  ADD CONSTRAINT `idProd` FOREIGN KEY (`idProd`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `idSale` FOREIGN KEY (`idSale`) REFERENCES `sales` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
