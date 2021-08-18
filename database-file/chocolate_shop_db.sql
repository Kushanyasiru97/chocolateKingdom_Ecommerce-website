-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 23, 2021 at 05:30 AM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 7.3.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `chocolate_shop_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_table`
--

CREATE TABLE `admin_table` (
  `admin_id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(150) NOT NULL,
  `image_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin_table`
--

INSERT INTO `admin_table` (`admin_id`, `username`, `password`, `email`, `image_name`) VALUES
(1, 'Nirmani', '4297f44b13955235245b2497399d7a93', 'nirmani@gmail.com', '');

-- --------------------------------------------------------

--
-- Table structure for table `cart_table`
--

CREATE TABLE `cart_table` (
  `cart_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `cart_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cart_table`
--

INSERT INTO `cart_table` (`cart_id`, `user_id`, `item_id`, `qty`, `cart_date`) VALUES
(1, 1, 1, 3, '2021-07-12'),
(2, 1, 3, 4, '2021-07-12'),
(3, 1, 1, 3, '2021-07-12'),
(4, 1, 1, 2, '2021-07-12'),
(5, 1, 1, 1, '2021-07-12'),
(6, 1, 1, 1, '2021-07-12'),
(7, 1, 1, 1, '2021-07-12'),
(8, 1, 1, 1, '2021-07-12'),
(9, 1, 5, 1, '2021-07-12'),
(10, 1, 5, 1, '2021-07-14'),
(11, 1, 9, 1, '2021-07-20'),
(12, 1, 10, 1, '2021-07-20');

-- --------------------------------------------------------

--
-- Table structure for table `category_table`
--

CREATE TABLE `category_table` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `image_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category_table`
--

INSERT INTO `category_table` (`category_id`, `category_name`, `description`, `image_name`) VALUES
(3, 'Chocolate', 'Premium chocolate cakes for every occasion!', 'img_1.jpg'),
(4, 'Chocolate cake', 'Premium chocolate cakes for every occasion!', 'img_2.png'),
(5, 'Chocolate ice cream', 'something new something different all thing is new and all things wonderful.', 'img_7.jpg'),
(6, 'Chocolate Chip Cookies', 'Enjoy the freshness of cookies! Unique taste experience', 'img_10.jpg'),
(7, 'Chocolate Pudding', 'Delicious Chocolate pudding, so yummy it will melt your heart...', 'img_9.jpg'),
(8, 'Chocolate Toffee', 'Our Toffee has Been Enjoyed by Thousands Of Customers and a Few Famous Friends.', 'img_3.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `item_table`
--

CREATE TABLE `item_table` (
  `item_id` int(11) NOT NULL,
  `item_name` varchar(150) NOT NULL,
  `image_name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `category_id` int(11) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `item_table`
--

INSERT INTO `item_table` (`item_id`, `item_name`, `image_name`, `description`, `price`, `category_id`, `date`) VALUES
(9, 'Cadbury Chocolate Fruit & Nut Silk 55g', 'Item_Img_35.jpeg', 'Discover Cadbury deliciously creamy milk chocolate bar with raisins, cashews and apricot. Plump raisins and chunky almonds are the source of all our fruity nuttiness. This pack contains Cadbury Dairy Milk Silk Fruit & Nut Chocolate Bar, 55g Pack of 8.\r\n', '440.00', 3, '2021-07-16'),
(10, 'Ritzbury Revello Chocolate Hazalnut 100g', 'Item_Img_112.jpeg', 'Scrumptious Hazelnuts buried in layers of rich Milk chocolate. ', '300.00', 3, '2021-07-16'),
(11, 'Kandos Chocolate Super Large Milk 160g', 'Item_Img_883.jpeg', 'Kandos Chocolate Super Large Milk 160g. Creamy Milk Chocolate.', '350.00', 3, '2021-07-16'),
(12, 'Kandos Chocolate 21 Fivestar Extra Bitter Dark 100g', 'Item_Img_298.jpeg', 'The ultimate in exquisite chocolates made with the worlds finest grade of cocoa butter bringing you a range of fine flavours to satisfy the connoisseur in you.', '400.00', 3, '2021-07-16'),
(13, 'Torren Coco Coz Milk Coconut Bar 52g', 'Item_Img_831.jpeg', 'Nutrition Facts 100g, Oil 2245g, Carbohydrate 6464g, Sugar 5106g, Fiber 664, Protein 462g, Salt 0.8g.', '295.00', 3, '2021-07-16'),
(14, 'Torren Classic Expresso & Beans 100g', 'Item_Img_213.jpeg', 'Compound chocolates differ from regular chocolatesin that cocoa butter is replaced with vegetable fats, creating a chocolate coating that will melt and turn into a hard shell at room temperature.Compound chocolates have many uses and are available indark,', '295.00', 3, '2021-07-16'),
(15, 'Kandos Chocolate Celebration 360g', 'Item_Img_868.jpeg', 'The perfect gift to express your love! A Kandos Celebrations in a special ‘Thank You’ gift sleeve alongside a Heroes,Roses and a selection of milk chocolate. ', '1100.00', 3, '2021-07-17'),
(16, 'Kandos Chocolate 21 Collective Five Star Hazel Nut 200g', 'Item_Img_134.jpeg', 'Silky smooth, soul satisfying sweet goodness of fine chocolate with crunchy Hazelnut. The ultimate in exquisite chocolates made with the worlds finest grade of cocoa butter bringing you a range of fine flavours to satisfy the connoisseur in you.', '890.00', 3, '2021-07-17'),
(17, 'Toblerone Chocolate Milk 100g', 'Item_Img_21.jpeg', 'Toblerone Swiss Milk Chocolate With Honey And Almond Nougat.', '985.00', 3, '2021-07-17'),
(18, 'Lindt Chocolate Excellence Mint Intense 100g', 'Item_Img_169.jpeg', '47 Percent Cocoa dark chocolate with fresh mint. Explore the classic flavour combination of chocolate and cool mint. Elevate yourself to the ultimate dark chocolate pleasure experience. Suitable for vegetarians, store in a cool and dry place.', '742.00', 3, '2021-07-17'),
(19, 'Ritzbury Chocolate Choco-a-nut 100g', 'Item_Img_607.jpeg', 'Ritzbury Chocolate Choco-a-nut 100g', '100.00', 3, '2021-07-17'),
(20, 'Kandos Chocolate Choconuts 90g', 'Item_Img_442.jpeg', 'Kandos Chocolate Choconuts 90g', '100.00', 3, '2021-07-17'),
(21, 'Kandos Chocolate Bar Caramel 45g', 'Item_Img_162.jpeg', 'Bar shaped Caramel centered Creamy Milk Chocolate.', '120.00', 3, '2021-07-17'),
(22, 'Snikers Chocolate Snake Size 32g', 'Item_Img_41.jpeg', 'Packed with roasted peanuts, nougat, caramel and milk chocolate. Consisting of nougat topped with caramel and peanuts, enrobed in milk chocolate. ', '135.00', 3, '2021-07-17'),
(23, 'Nestle Kit Kat Chocolate 20.5g', 'Item_Img_947.jpeg', 'KITKAT 2 Finger is a perfect balance of delicious chocolate and light wafer with an extra crispy. Extra creamy experience that is guaranteed to put a smile in your break', '140.00', 3, '2021-07-17'),
(24, 'Ritzbury Choclate Bubbles 100g', 'Item_Img_603.jpeg', 'Ritzbury Choclate Bubbles 100g', '100.00', 3, '2021-07-17'),
(25, 'Chocolate Cake', 'Item_Img_708.jpeg', 'Chocolate cake or chocolate gâteau is a cake flavored with melted chocolate, cocoa powder, or both.', '1800.00', 4, '2021-07-18'),
(26, 'Coffee Sponge Cake', 'Item_Img_420.jpeg', 'The Coffee Cake is rectangular in shape, and consists of two layers of coffee cake sandwiched with coffee icing, the cake is garnished with coffee icing, a border of gateaux cream, and sprinkled with cashew and a chocolate design.', '1800.00', 4, '2021-07-18'),
(27, 'Chocolate Nougatine', 'Item_Img_522.jpeg', 'Before starting this Chocolate and Nougatine Tartlet recipe, organise the necessary ingredients for the almond rich shortcrust pastry.', '1900.00', 4, '2021-07-18'),
(28, 'Cheese Cake', 'Item_Img_582.jpeg', 'Cheesecake is a sweet dessert consisting of one or more layers. The main, and thickest, layer consists of a mixture of a soft, fresh cheese, eggs, and sugar. If there is a bottom layer, it most often consists of a crust or base made from crushed cookies, ', '2800.00', 4, '2021-07-18'),
(29, 'Chocolate Fudge Cake', 'Item_Img_76.jpeg', 'A fudge cake is a chocolate cake containing fudge.', '2000.00', 4, '2021-07-18'),
(30, 'Munchee  biscuit Chocolate Chip Cookies 100g', 'Item_Img_250.jpeg', 'Matchless Taste, Good Quality & Locally known product.\r\n\r\n', '100.00', 6, '2021-07-18'),
(31, 'Vichy Biscuit Chocolate Chips Cookies 100g', 'Item_Img_507.jpeg', 'Vichy Chocolate And Chips Cookies Tin 400g.', '120.00', 6, '2021-07-18'),
(32, 'Vichy Biscuit Chocolate Chips Cookies Tin 240g', 'Item_Img_712.jpeg', 'CookieMan cookies at our door step. Made with CookieMan proprietary recipe', '390.00', 6, '2021-07-18'),
(33, 'Vichy Biscuit Chocolate Chips Cookies Tin 400g', 'Item_Img_693.jpeg', 'When you take a bite of these chocolate chip cookies you will also take a trip down memory lane.  These chocolate chip cookies are perfect anytime your sweet tooth is ready.', '740.00', 6, '2021-07-18'),
(34, 'Little Lion Biscuit Dark Fantacy Choco Cookies 350g', 'Item_Img_811.jpeg', 'Abundance of Chocochips. Chocolatey Crunchy cookies. Great snack to have with tea or coffee.', '600.00', 6, '2021-07-18'),
(35, 'P&S Biscuit Choc Cookies Tin 450g', 'Item_Img_935.jpeg', ' Buttery, sweet biscuits with dry fruits like cashew in it are perfect for a small bite. Cashew biscuits are packed with magnesium, zinc, iron, and it gives instant energy. ', '650.00', 6, '2021-07-18'),
(36, 'Kandos Dessert Biscuit Pudding Chocolate 400g', 'Item_Img_784.jpeg', 'Kandos Chocolate Biscuit Pudding, is a favorite desert for Sri Lankans. Chocolate biscuit pudding is made up of alternating layers of milk-dipped biscuits and chocolate pudding or icing. These layers can be seen clearly when cutting through the dish, whic', '500.00', 7, '2021-07-20'),
(37, 'Revello Chocolate Biscuits Pudding 375g', 'Item_Img_869.jpeg', 'Chocolate biscuit pudding is Sri Lankans favorite dessert, Revello Chocolate Biscuit Pudding is made up of alternating layers of milk dipped Marie biscuits and chocolate pudding or icing.', '475.00', 7, '2021-07-20'),
(38, 'Kandos Dessert Biscuit Pudding Chocolate 50g', 'Item_Img_737.jpeg', 'Kandos Dessert Biscuit Pudding Chocolate', '100.00', 7, '2021-07-20'),
(39, 'Elephant House Chocolate Ice Cream 2l', 'Item_Img_830.jpg', 'Elephant House chocolate ice cream is made with the perfect blend of natural cocoa and rich dairy ice cream to delight the taste buds of every chocoholic.', '520.00', 5, '2021-07-20'),
(40, 'Elephant House Ice Cream Chocolate Cup 80ml', 'Item_Img_161.jpg', 'Elephant House Ice Cream Chocolate Cup ', '40.00', 5, '2021-07-20'),
(41, 'Cargills Magic Choc Ice Cream 75ml', 'Item_Img_919.jpg', 'Cargills Magic Choc Ice Cream ', '50.00', 5, '2021-07-20'),
(42, 'Cargills Magic Chocolate Ice Cream 1L', 'Item_Img_474.jpg', 'Brand: Cargills Magic. Product: Ice Cream. Flavour: Vanilla Choco Mix. Weight: 1L', '320.00', 5, '2021-07-20');

-- --------------------------------------------------------

--
-- Table structure for table `order_table`
--

CREATE TABLE `order_table` (
  `order_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `total_price` decimal(10,2) NOT NULL,
  `order_date` date NOT NULL,
  `customer_name` varchar(255) NOT NULL,
  `customer_address` varchar(255) NOT NULL,
  `customer_contact` int(10) NOT NULL,
  `status` varchar(100) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `user_table`
--

CREATE TABLE `user_table` (
  `user_id` int(11) NOT NULL,
  `first_name` varchar(80) NOT NULL,
  `last_name` varchar(80) NOT NULL,
  `email` varchar(150) NOT NULL,
  `address` varchar(255) NOT NULL,
  `contact_number` int(10) NOT NULL,
  `password` varchar(255) NOT NULL,
  `image_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_table`
--

INSERT INTO `user_table` (`user_id`, `first_name`, `last_name`, `email`, `address`, `contact_number`, `password`, `image_name`) VALUES
(1, 'H.M.C.', 'Nirmani', 'cnirmani1997@gmail.com', 'Monaragala', 719796916, '4297f44b13955235245b2497399d7a93', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_table`
--
ALTER TABLE `admin_table`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `cart_table`
--
ALTER TABLE `cart_table`
  ADD PRIMARY KEY (`cart_id`);

--
-- Indexes for table `category_table`
--
ALTER TABLE `category_table`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `item_table`
--
ALTER TABLE `item_table`
  ADD PRIMARY KEY (`item_id`);

--
-- Indexes for table `order_table`
--
ALTER TABLE `order_table`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `user_table`
--
ALTER TABLE `user_table`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_table`
--
ALTER TABLE `admin_table`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `cart_table`
--
ALTER TABLE `cart_table`
  MODIFY `cart_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `category_table`
--
ALTER TABLE `category_table`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `item_table`
--
ALTER TABLE `item_table`
  MODIFY `item_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `order_table`
--
ALTER TABLE `order_table`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user_table`
--
ALTER TABLE `user_table`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
