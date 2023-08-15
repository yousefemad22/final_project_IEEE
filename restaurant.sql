-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 15, 2023 at 10:57 PM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 7.4.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `restaurant`
--

-- --------------------------------------------------------

--
-- Table structure for table `bill`
--

CREATE TABLE `bill` (
  `inovice_id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL,
  `quantatiy` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `cancelation`
--

CREATE TABLE `cancelation` (
  `cancel_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `reservation_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `clients`
--

CREATE TABLE `clients` (
  `client_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `phone` varchar(50) NOT NULL,
  `email` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE `images` (
  `imge_id` int(11) NOT NULL,
  `imge_name` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `images`
--

INSERT INTO `images` (`imge_id`, `imge_name`, `image`) VALUES
(10, 'restaurant1', 'img/img_gallery/restaurant1_757.jpg'),
(11, 'restaurant6', 'img/img_gallery/restaurant6_318.jpg'),
(13, 'restaurant5', 'img/img_gallery/restaurant5_815.jpg'),
(15, 'restaurant8', 'img/img_gallery/restaurant8_753.jpg'),
(16, 'restaurant4', 'img/img_gallery/restaurant4_128.jpg'),
(19, 'restaurant3', 'img/img_gallery/restaurant3_475.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `invoice`
--

CREATE TABLE `invoice` (
  `id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `client_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `menus`
--

CREATE TABLE `menus` (
  `menu_id` int(11) NOT NULL,
  `menu_name` varchar(255) NOT NULL,
  `menu_description` text NOT NULL,
  `price` float NOT NULL,
  `menu_image` varchar(255) NOT NULL,
  `category_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `menus`
--

INSERT INTO `menus` (`menu_id`, `menu_name`, `menu_description`, `price`, `menu_image`, `category_id`) VALUES
(27, 'Classic Beef Burger', 'Made with ground beef, this is the quintessential burger. It can be customized with various toppings and condiments.\r\n\r\n', 50, 'img/img/Classic Beef Burger_109.jpg', 1),
(28, 'Cheeseburger', ' A classic beef burger with the addition of melted cheese, typically cheddar, American, or Swiss.\r\n', 60, 'img/img/Cheeseburger_292.jpg', 1),
(29, 'Bacon Burger', 'A beef burger topped with crispy bacon strips, often accompanied by cheese and traditional toppings.\r\n', 65, 'img/img/Bacon Burger_60.jpg', 1),
(30, 'Mushroom Swiss Burger', 'A beef patty topped with sautéed mushrooms and Swiss cheese.\r\n', 63, 'img/img/Mushroom Swiss Burger_613.jpg', 1),
(31, '  Veggie Burger', ' A patty made from vegetables, grains, legumes, and sometimes tofu, suitable for vegetarians and vegans.\r\n', 50, 'img/img/  Veggie Burger_723.jpg', 1),
(32, 'Turkey Burger', 'A burger made from ground turkey meat, a leaner alternative to beef.\r\n', 54, 'img/img/Turkey Burger_39.jpg', 1),
(33, 'Chicken Burger', ' A burger patty made from ground chicken, usually seasoned and cooked similarly to beef burgers.\r\n', 62, 'img/img/Chicken Burger_649.jpg', 1),
(34, 'Cake', 'A baked sweet treat made from a mixture of flour, sugar, eggs, and butter. There are countless cake variations, including chocolate cake, vanilla cake, red velvet cake, carrot cake, and more.\r\n', 35, 'img/img/Cake_540.jpg', 2),
(35, 'Cookies', ' Small, baked sweet treats made from a dough often containing ingredients like flour, sugar, eggs, and butter. Varieties include chocolate chip cookies, oatmeal cookies, sugar cookies, and more.\r\n', 23, 'img/img/Cookies_232.jpg', 2),
(36, 'Pies', 'Baked desserts with a crust, often filled with sweet fillings like fruit (e.g., apple pie, cherry pie) or custard (e.g., pumpkin pie, pecan pie).\r\n', 20, 'img/img/Pies_666.jpg', 2),
(37, 'Ice Cream', 'A frozen dessert made from dairy or non-dairy bases, churned to create a creamy texture. It comes in various flavors and can be enjoyed in cones, cups, or as part of sundaes.\r\n', 18, 'img/img/Ice Cream_404.jpg', 2),
(38, 'Brownies', 'Dense, fudgy squares of chocolatey goodness, often with variations like walnut brownies or caramel swirl brownies.\r\n', 40, 'img/img/Brownies_126.jpg', 2),
(39, 'Puddings', 'Creamy, often chilled desserts made from a milk or cream base, like chocolate pudding or vanilla pudding.\r\n', 35, 'img/img/Puddings_227.jpg', 2),
(40, 'Coffee', 'A brewed beverage made from roasted coffee beans, available in various styles such as espresso, cappuccino, latte, and more.\r\n', 30, 'img/img/Coffee_447.jpg', 3),
(41, 'Tea', 'A popular hot or cold beverage made by steeping tea leaves or herbal blends in hot water. Varieties include black tea, green tea, herbal tea, and chai.\r\n', 15, 'img/img/Tea_72.jpg', 3),
(42, 'Juice', 'Freshly squeezed or processed fruit juices, such as orange juice, apple juice, and grapefruit juice.\r\n', 25, 'img/img/Juice_361.jpg', 3),
(43, 'Smoothies', 'Blended beverages made from a combination of fruits, vegetables, yogurt, and other ingredients, often with added ice.\r\n', 55, 'img/img/Smoothies_345.jpg', 3),
(44, 'Spaghetti', 'Long, thin strands of pasta, often served with tomato-based sauces, meatballs, or seafood.\r\n', 60, 'img/img/Spaghetti_330.jpg', 8),
(45, 'Fettuccine', 'Wide, flat ribbons of pasta, commonly served with creamy sauces or Alfredo sauce.\r\n', 30, 'img/img/Fettuccine_67.jpg', 8),
(46, 'Penne', 'Short, cylindrical pasta with angled ends, ideal for holding chunky sauces, vegetables, or meats.\r\n', 69, 'img/img/Penne_782.jpg', 8),
(47, 'Rigatoni', 'Large, ridged tubes of pasta, great for capturing rich sauces and fillings.\r\n', 54, 'img/img/Rigatoni_466.jpg', 8),
(48, 'Rotini', 'Spiral-shaped pasta that holds sauces well, popular in salads and casseroles.\r\n', 100, 'img/img/Rotini_473.jpg', 8),
(49, 'Lasagna', 'Large, flat sheets of pasta, layered with sauces, cheese, and often meat or vegetables.\r\n', 99, 'img/img/Lasagna_228.jpg', 8),
(51, 'Pepperoni', 'Topped with tomato sauce, mozzarella cheese, and slices of pepperoni sausage.\r\n', 110, 'img/img/Pepperoni_915.jpg', 9),
(52, ' Meat Lovers', 'Piled with multiple meat toppings such as pepperoni, sausage, bacon, and ham.\r\n', 105, 'img/img/ Meat Lovers_346.jpg', 9),
(53, ' White Pizza', 'Made without tomato sauce, often featuring ricotta or Alfredo sauce, mozzarella cheese, and garlic.\r\n', 130, 'img/img/ White Pizza_909.jpg', 9),
(54, 'Supreme', 'Loaded with various toppings like pepperoni, sausage, bell peppers, onions, mushrooms, and olives.\r\n ', 116, 'img/img/Supreme_278.jpg', 9),
(55, 'Caesar Salad', 'Romaine lettuce, croutons, Parmesan cheese, and Caesar dressing.\r\n', 66, 'img/img/Caesar Salad_475.jpg', 11),
(56, 'Greek Salad', 'Tomatoes, cucumbers, red onions, Kalamata olives, feta cheese, and Greek dressing.\r\n', 44, 'img/img/Greek Salad_997.jpg', 11),
(57, ' Cobb Salad', 'Mixed greens topped with chicken, bacon, hard-boiled eggs, avocado, tomatoes, and blue cheese.\r\n', 60, 'img/img/ Cobb Salad_364.jpg', 11),
(58, 'Waldorf Salad', 'Apples, grapes, celery, walnuts, and mayonnaise or yogurt dressing.\r\n', 35, 'img/img/Waldorf Salad_403.jpg', 11),
(59, 'Nicoise Salad', ' Tuna, boiled eggs, green beans, olives, potatoes, and vinaigrette.\r\n', 32, 'img/img/Nicoise Salad_990.jpg', 11);

-- --------------------------------------------------------

--
-- Table structure for table `menu_categories`
--

CREATE TABLE `menu_categories` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `menu_categories`
--

INSERT INTO `menu_categories` (`category_id`, `category_name`) VALUES
(1, 'Burgers'),
(2, 'Desserts'),
(3, 'Drinks'),
(8, 'Pasta'),
(9, 'Pizzas'),
(11, 'salads');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `order_time` datetime NOT NULL,
  `delivery_address` varchar(255) NOT NULL,
  `client_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `reservations`
--

CREATE TABLE `reservations` (
  `reservation_id` int(11) NOT NULL,
  `date_cereated` date NOT NULL,
  `time_selected` time NOT NULL,
  `num_person` int(11) NOT NULL,
  `client_id` int(11) NOT NULL,
  `table_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tables`
--

CREATE TABLE `tables` (
  `table_id` int(11) NOT NULL,
  `capacity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tables`
--

INSERT INTO `tables` (`table_id`, `capacity`) VALUES
(1, 1),
(2, 2),
(3, 3),
(4, 4),
(5, 1),
(6, 2),
(7, 3),
(8, 4),
(9, 1),
(10, 2),
(11, 3),
(12, 4);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_name`, `email`, `password`) VALUES
(1, 'admin', 'yousef@gmail.com', '$2y$10$vNjC8pq7fpEWPMZzBKU0FeP04NADZHl1wEMmRIelDnVnDDZ6CW0/.'),
(2, 'yousef', 'yousef@gmail.com', '$2y$10$ti7omFq0/7IBe1fhS6VBPOFgtlo.EnxBNub5ey6okA7fBuAZ2UU82'),
(3, 'admin', 'yousef@gmail.com', '$2y$10$VFQYRg6APACBWlOR1k9ulOSQ/srlA.nmcI2fmlGZwAI853eipwNmG');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bill`
--
ALTER TABLE `bill`
  ADD KEY `invoice_id` (`inovice_id`),
  ADD KEY `menu_id` (`menu_id`);

--
-- Indexes for table `cancelation`
--
ALTER TABLE `cancelation`
  ADD PRIMARY KEY (`cancel_id`),
  ADD KEY `order_id` (`order_id`),
  ADD KEY `reservation_id` (`reservation_id`);

--
-- Indexes for table `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`client_id`);

--
-- Indexes for table `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`imge_id`);

--
-- Indexes for table `invoice`
--
ALTER TABLE `invoice`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_id` (`order_id`),
  ADD KEY `client_id` (`client_id`);

--
-- Indexes for table `menus`
--
ALTER TABLE `menus`
  ADD PRIMARY KEY (`menu_id`),
  ADD KEY `category_id` (`category_id`);

--
-- Indexes for table `menu_categories`
--
ALTER TABLE `menu_categories`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `client_id` (`client_id`);

--
-- Indexes for table `reservations`
--
ALTER TABLE `reservations`
  ADD PRIMARY KEY (`reservation_id`),
  ADD KEY `client_id` (`client_id`),
  ADD KEY `table_id` (`table_id`);

--
-- Indexes for table `tables`
--
ALTER TABLE `tables`
  ADD PRIMARY KEY (`table_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cancelation`
--
ALTER TABLE `cancelation`
  MODIFY `cancel_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `clients`
--
ALTER TABLE `clients`
  MODIFY `client_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=111;

--
-- AUTO_INCREMENT for table `images`
--
ALTER TABLE `images`
  MODIFY `imge_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `invoice`
--
ALTER TABLE `invoice`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `menus`
--
ALTER TABLE `menus`
  MODIFY `menu_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT for table `menu_categories`
--
ALTER TABLE `menu_categories`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=110;

--
-- AUTO_INCREMENT for table `reservations`
--
ALTER TABLE `reservations`
  MODIFY `reservation_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tables`
--
ALTER TABLE `tables`
  MODIFY `table_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bill`
--
ALTER TABLE `bill`
  ADD CONSTRAINT `bill_with_invoice` FOREIGN KEY (`inovice_id`) REFERENCES `invoice` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `menu_with_bill` FOREIGN KEY (`menu_id`) REFERENCES `menus` (`menu_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `cancelation`
--
ALTER TABLE `cancelation`
  ADD CONSTRAINT `cancelation_with_order` FOREIGN KEY (`order_id`) REFERENCES `orders` (`order_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `cancelation_with_reservation` FOREIGN KEY (`reservation_id`) REFERENCES `reservations` (`reservation_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `invoice`
--
ALTER TABLE `invoice`
  ADD CONSTRAINT `invoice_with_clients` FOREIGN KEY (`client_id`) REFERENCES `clients` (`client_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `invoice_with_orders` FOREIGN KEY (`order_id`) REFERENCES `orders` (`order_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `menus`
--
ALTER TABLE `menus`
  ADD CONSTRAINT `menus_with_categories` FOREIGN KEY (`category_id`) REFERENCES `menu_categories` (`category_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `order_with_clients` FOREIGN KEY (`client_id`) REFERENCES `clients` (`client_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `reservations`
--
ALTER TABLE `reservations`
  ADD CONSTRAINT `reservation_with_clients` FOREIGN KEY (`client_id`) REFERENCES `clients` (`client_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `reservation_with_tables` FOREIGN KEY (`table_id`) REFERENCES `tables` (`table_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
