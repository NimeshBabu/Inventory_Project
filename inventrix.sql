CREATE DATABASE inventrix;
USE inventrix;

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

CREATE TABLE `product` (
  `ProductCode` varchar(10) NOT NULL,
  `ProductName` varchar(50) NOT NULL,
  `Cost` decimal(10,2) NOT NULL,
  `Price` decimal(10,2) NOT NULL,
  `Description` varchar(100) DEFAULT NULL,
  `Url` varchar(500) DEFAULT NULL,
  `Quantity` int(11) NOT NULL CHECK (`Quantity` >= 0),
  `Supplier-PAN` varchar(80) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


INSERT INTO `product` (`ProductCode`, `ProductName`, `Cost`, `Price`, `Description`, `Url`, `Quantity`, `Supplier-PAN`) VALUES
('1043', 'Wall-mounted Bookshelf', 22000.00, 27000.00, '5-Shelf, White', 'https://www.nepal.ubuy.com/productimg/?image=aHR0cHM6Ly9pbWFnZXMtbmEuc3NsLWltYWdlcy1hbWF6b24uY29tL2ltYWdlcy9JLzYxOFIwNmVEWUlMLl9TUzQwMF8uanBn.jpg', 34, 'Global Exports-4562'),
('1254', 'Bed', 50000.00, 60000.00, 'King Size Bed', 'https://lifely.com.au/cdn/shop/files/JoseBedFrameGallery1.jpg?v=1733883102', 37, 'ABC Company-1111'),
('1578', 'Study Table', 18000.00, 25000.00, 'Aesthetic', 'https://nativesutra.com/wp-content/uploads/2024/12/Screenshot_3-1.png', 70, 'ABC Company-1111'),
('1982', 'Sofa', 30000.00, 35000.00, '3 piece,brown', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcS0sgzWXCBhGxlllcZ-DeQf3LPlUnzka5Wr1Q&s', 20, 'ABC Company-1111'),
('3697', 'TV Unit', 25000.00, 32000.00, 'Modern design', 'https://m.media-amazon.com/images/I/61cleXQ6GfS._AC_SL1150_.jpg', 5, 'Mountain Traders-6745'),
('4568', 'Recliner Sofa', 45000.00, 55000.00, 'Leather, Grey', 'https://media-5.eldoradofurniture.com/images/products/marketing/2019-08/POWER-MOTION-LEATHER-SOFA-CHARLIE-LIGHT-GRAY-EL-DORADO-FURNITURE-100770130-03_1902_MEDIUM.jpg', 60, 'Kathmandu Wholesalers-1122'),
('4827', 'Office Desk', 25000.00, 32000.00, 'Executive, Walnut', 'https://www.mfaonline.co.za/wp-content/uploads/2024/06/mwvopb1800.jpg', 19, 'Nepal Mart-3344'),
('5023', 'Kids Study Desk', 16000.00, 21000.00, 'Adjustable Height, Blue', 'https://www.amazingooh.com.au/cdn/shop/products/120cm-height-adjustable-children-kids-ergonomic-study-desk-only-blue-au-861872.jpg?v=1639669571', 6, 'Pashupati Distributors-7788'),
('5214', 'Kitchen Set', 100000.00, 1400000.00, 'Full set', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQwPLSjGDXg-yiQb2AurSMv_-fWd2zvSGFS-A&s', 17, 'Sunshine Traders-1357'),
('5219', 'Shoe Rack', 15000.00, 20000.00, '5 shelves', 'https://nephot.com/wp-content/uploads/2023/06/Portable-Folding-Shoes-Rack-5-Tiers-Multi-Purpose-Shoe-Storage-Organizer_.jpg', 30, 'Kathmandu Wholesalers-1122'),
('5894', 'Dining Chair', 7000.00, 10000.00, 'Set of 2, cushioned', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTAhjqKpkr0IWlFYjP7FB-KxaSe-WSDp8OkUg&s', 24, 'Nepal Mart-3344'),
('6137', 'Reclining Office Chair', 30000.00, 40000.00, 'High Back, Leather', 'https://i5.walmartimages.com/seo/Lacoo-Faux-Leather-High-Back-Ergonomic-Executive-Office-Chair-with-Foot-Rest-Black_dbe7ed7f-8d72-4719-9906-cf599aa28550.7d122761da44485a9a25e286c6bbc927.jpeg', 30, 'Nepal Mart-3344'),
('6293', 'Rocking Chair', 18000.00, 25000.00, 'Wooden, Handcrafted', 'https://5.imimg.com/data5/ANDROID/Default/2023/11/363278646/RQ/SA/QM/203117447/product-jpeg-500x500.jpg', 12, 'Summit Suppliers-5566'),
('6321', 'Bedside Table', 10000.00, 15000.00, 'Wooden, small drawer', 'https://cdn2.blanxer.com/uploads/6643159c6f73f03df02c1124/product_image-71jee4cajil_sl1500_-4970.webp', 4, 'Summit Suppliers-5566'),
('6628', 'Kitchen Cabinet', 70000.00, 90000.00, 'Modular, White Finish', 'https://www.nobiliaindia.com/images/campaing/white-5.jpg', 0, 'Mountain Traders-6745'),
('7215', 'Massage Chair', 85000.00, 100000.00, 'Reclining, Leather', 'https://foter.com/photos/453/faux-leather-reclining-heated-massage-chair-2.jpg?s=lbx', 10, 'Mountain Traders-6745'),
('7391', 'Folding Bed', 40000.00, 52000.00, 'Metal Frame, Space Saver', 'https://i.ebayimg.com/images/g/06kAAOSw1fRmWgF8/s-l1200.jpg', 6, 'Pashupati Distributors-7788'),
('7412', 'Wardrobe', 50000.00, 60000.00, 'Grey Color ', 'https://graphql.smithandfabricators.com/media/products/10_Grey_Wardrobe_Designs_Ideas_Modern_Interior_Look_722e8e20.jpeg', 9, 'ABC Company-1111'),
('7482', 'Bookshelf', 20000.00, 25000.00, 'Wooden, 5 shelves', 'https://i5.walmartimages.com/seo/LINSY-HOME-68in-5-Tier-Bookshelf-Tall-Bookcase-Shelf-Storage-Organizer-Modern-Book-Shelf-for-Bedroom-Living-Room-and-Home-Office-Light-Brown_b463a852-f978-48e8-9d08-4c9b53f431c9.ca7a746501942f4763f4d659f2e5bd0b.jpeg', 50, 'Himalayan Goods-9023'),
('7743', 'Dressing Table', 30000.00, 40000.00, 'Mirror attached', 'https://www.furniselan.com/cdn/shop/files/boston-solid-wood-rattan-cane-dressing-table-894495_grande.jpg?v=1721689822', 35, 'Pashupati Distributors-7788'),
('7749', 'Corner Shelf', 9000.00, 12000.00, '4-Tier, Brown', 'https://assets.wfcdn.com/im/75100971/resize-h800-w800%5Ecompr-r85/3087/308796368/Modern+Corner+Shelf%2C5+Tier+Corner+Bookcase+With+Led+Light%2C+Storage+Standing+Shelf+Unit.jpg', 20, 'Himalayan Goods-9023'),
('8136', 'TV Stand', 28000.00, 36000.00, 'Wooden, Storage Drawers', 'https://m.media-amazon.com/images/I/81VPIPj54qL._AC_UF894,1000_QL80_.jpg', 4, 'Himalayan Goods-9023'),
('8491', 'Console Table', 18000.00, 24000.00, 'Wooden, Entryway Table', 'https://tribesigns.com/cdn/shop/files/709-wood-console-table-farmhouse-sofa-table-entryway-table-902340.jpg?v=1724884953', 37, 'Summit Suppliers-5566'),
('8521', 'Office Chair', 12000.00, 16000.00, 'Ergonomic, black', 'https://media.officedepot.com/images/f_auto,q_auto,e_sharpen,h_450/products/5993159/5993159_o01/5993159', 30, 'Everest Suppliers-7890'),
('8856', 'L-Shaped Sofa', 55000.00, 70000.00, 'Fabric, Grey', 'https://img.drz.lazcdn.com/static/np/p/0b7d2ea5ed6d06f1c782c56e14113c91.jpg_720x720q80.jpg', 15, 'Everest Suppliers-7890'),
('9175', 'Glass Coffee Table', 20000.00, 26000.00, 'Round, Transparent', 'https://www.homesdirect365.co.uk/images/owen-round-gold-metal-coffee-table-with-clear-glass-top-p87592-194087_zoom.jpg', 13, 'Everest Suppliers-7890'),
('9635', 'Coffee Table', 8000.00, 12000.00, 'Wooden, Round', 'https://img-us.aosomcdn.com/thumbnail/100/n0/product/2024/07/26/7oY702190eca910fa.jpg', 5, 'Global Exports-4562'),
('9932', 'Wooden Dining Set', 60000.00, 75000.00, '6 Chairs, Solid Wood', 'https://cdn02.plentymarkets.com/vji7b8phcm0f/item/images/121885/full/Casa-Padrino-Landhausstil-Esszimmer-Moebel-Set-Braun---Weiss-1-Esstisch-und-8-Esszimmerstuehle-Massivholz-Esszimmer-Moebel-Landhausstil-Moebel-121885_7.JPG', 23, 'Global Exports-4562');

-- --------------------------------------------------------

--
-- Table structure for table `purchase`
--

CREATE TABLE `purchase` (
  `PurchaseID` int(11) NOT NULL,
  `Date` date NOT NULL DEFAULT current_timestamp(),
  `ProductCode` varchar(10) NOT NULL,
  `Quantity` int(11) NOT NULL CHECK (`Quantity` > 0),
  `PurchaseAmount` decimal(10,2) NOT NULL,
  `PaymentStatus` enum('Paid','Unpaid','Due') DEFAULT NULL,
  `Supplier-PAN` varchar(80) NOT NULL,
  `DueAmount` decimal(10,2) DEFAULT 0.00
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;



INSERT INTO `purchase` (`PurchaseID`, `Date`, `ProductCode`, `Quantity`, `PurchaseAmount`, `PaymentStatus`, `Supplier-PAN`, `DueAmount`) VALUES
(1252, '2025-04-02', '1043', 10, 220000.00, 'Paid', 'Global Exports-4562', 0.00),
(1253, '2025-04-09', '1578', 25, 450000.00, 'Paid', 'ABC Company-1111', 0.00),
(1254, '2025-03-30', '3697', 10, 250000.00, 'Due', 'Mountain Traders-6745', 0.00),
(1255, '2025-04-10', '3697', 10, 250000.00, 'Unpaid', 'Mountain Traders-6745', 0.00),
(1256, '2025-04-23', '4827', 10, 250000.00, 'Unpaid', 'Nepal Mart-3344', 0.00),
(1257, '2025-04-15', '5214', 3, 300000.00, 'Paid', 'Sunshine Traders-1357', 0.00),
(1258, '2025-04-07', '5894', 30, 210000.00, 'Due', 'Nepal Mart-3344', 0.00),
(1259, '2025-04-22', '6321', 10, 100000.00, 'Paid', 'Summit Suppliers-5566', 0.00),
(1260, '2025-04-09', '7215', 5, 425000.00, 'Paid', 'Mountain Traders-6745', 0.00),
(1261, '2025-04-17', '7412', 6, 300000.00, 'Unpaid', 'ABC Company-1111', 0.00),
(1262, '2025-04-15', '7743', 8, 240000.00, 'Unpaid', 'Pashupati Distributors-7788', 0.00),
(1263, '2025-04-21', '8491', 12, 216000.00, 'Due', 'Summit Suppliers-5566', 0.00),
(1264, '2025-04-10', '8856', 20, 1100000.00, 'Paid', 'Everest Suppliers-7890', 0.00),
(1265, '2025-04-23', '9175', 7, 140000.00, 'Paid', 'Everest Suppliers-7890', 0.00),
(1266, '2025-04-15', '9932', 8, 480000.00, 'Paid', 'Global Exports-4562', 0.00),
(1267, '2025-04-23', '1578', 20, 360000.00, 'Due', 'ABC Company-1111', 0.00),
(1268, '2025-04-09', '7215', 10, 850000.00, 'Due', 'Mountain Traders-6745', 0.00),
(1269, '2025-04-24', '5219', 25, 375000.00, 'Paid', 'Kathmandu Wholesalers-1122', 0.00),
(1270, '2025-04-08', '7482', 50, 1000000.00, 'Paid', 'Himalayan Goods-9023', 0.00),
(1271, '2025-04-17', '1982', 20, 600000.00, 'Due', 'ABC Company-1111', 0.00),
(1272, '2025-03-30', '7743', 30, 900000.00, 'Paid', 'Pashupati Distributors-7788', 0.00),
(1273, '2025-03-12', '1254', 25, 1250000.00, 'Paid', 'ABC Company-1111', 0.00),
(1274, '2025-04-23', '4568', 60, 2700000.00, 'Unpaid', 'Kathmandu Wholesalers-1122', 0.00),
(1275, '2025-03-30', '8521', 30, 360000.00, 'Paid', 'Everest Suppliers-7890', 0.00),
(1276, '2025-04-17', '6137', 30, 900000.00, 'Paid', 'Nepal Mart-3344', 0.00);

-- --------------------------------------------------------

--
-- Table structure for table `sales`
--

CREATE TABLE `sales` (
  `SaleID` int(11) NOT NULL,
  `Date` date DEFAULT current_timestamp(),
  `ProductCode` varchar(10) NOT NULL,
  `Customer` varchar(50) DEFAULT NULL,
  `ShippingAddress` varchar(75) DEFAULT NULL,
  `Biller` varchar(50) DEFAULT NULL,
  `Quantity` int(11) NOT NULL CHECK (`Quantity` > 0),
  `SalesAmount` decimal(10,2) NOT NULL,
  `PaymentStatus` enum('Paid','Unpaid','Due') DEFAULT NULL,
  `DueAmount` decimal(10,2) DEFAULT 0.00
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;



INSERT INTO `sales` (`SaleID`, `Date`, `ProductCode`, `Customer`, `ShippingAddress`, `Biller`, `Quantity`, `SalesAmount`, `PaymentStatus`, `DueAmount`) VALUES
(33, '2025-04-16', '5023', 'Ram ', 'Bhaktapur', 'Biller A', 3, 63000.00, 'Paid', 0.00),
(34, '2025-04-10', '7215', 'Prajjwol', 'Balkot', 'Biller C', 1, 100000.00, 'Due', 0.00),
(35, '2025-04-30', '7412', 'Anusha', 'Basundhara', 'Biller D', 2, 120000.00, 'Paid', 0.00),
(36, '2025-04-29', '4827', 'Manish', 'Dhapasi', 'Biller A', 4, 128000.00, 'Paid', 0.00),
(37, '2025-04-24', '8856', 'Nineytika', 'Kritipur', 'Biller B', 5, 350000.00, 'Due', 0.00),
(38, '2025-04-24', '9932', 'Prativa', 'Greenland', 'Biller B', 1, 75000.00, 'Unpaid', 0.00),
(39, '2025-04-24', '9175', 'Nimesh', 'Dhunche', 'Biller C', 2, 52000.00, 'Paid', 0.00),
(40, '2025-04-03', '8491', 'Kritisha', 'Gatthaghar', 'Biller A', 3, 72000.00, 'Paid', 0.00),
(41, '2025-04-16', '3697', 'HB Traders', 'Bagbazar', 'Biller C', 30, 960000.00, 'Paid', 0.00),
(42, '2025-04-17', '7215', 'RK Fitness', 'Banepa', 'Biller C', 5, 500000.00, 'Paid', 0.00),
(43, '2025-04-09', '7743', 'Gyan and sons', 'Chardobato', 'Biller C', 10, 400000.00, 'Paid', 0.00),
(44, '2025-04-30', '9175', 'Hema', 'Koteshowr', 'Biller D', 2, 52000.00, 'Unpaid', 0.00),
(45, '2025-04-16', '8521', 'Leapfrog Ltd.', 'Putalisadak', 'Biller B', 10, 160000.00, 'Paid', 0.00),
(46, '2025-04-10', '7482', 'Keshar Library', 'Durbarmarg', 'Biller B', 8, 200000.00, 'Paid', 0.00),
(47, '2025-04-16', '8136', 'Ava', 'USA', 'Biller C', 5, 180000.00, 'Paid', 0.00),
(48, '2025-04-30', '9635', 'Luna', 'Phillipines', 'Biller A', 10, 120000.00, 'Paid', 0.00),
(49, '2025-04-17', '6321', 'Ivy', 'France', 'Biller B', 9, 135000.00, 'Due', 0.00),
(50, '2025-04-23', '4568', 'Upang', 'Thiland', 'Biller B', 5, 275000.00, 'Paid', 0.00),
(51, '2025-04-16', '8521', 'Mio', 'Japan', 'Biller B', 5, 80000.00, 'Paid', 0.00),
(52, '2025-04-16', '8856', 'Dendup', 'Bhutan', 'Biller B', 10, 700000.00, 'Paid', 0.00),
(53, '2025-04-25', '5214', 'Pema and daughters', 'Dolakha', 'Biller D', 10, 14000000.00, 'Paid', 0.00),
(54, '2025-04-09', '5219', 'Zuri Bros Ltd', 'African', 'Biller A', 40, 800000.00, 'Paid', 0.00);

-- --------------------------------------------------------

-- // Table structure for table `supplier`
 
CREATE TABLE `supplier` (
  `Supplier-PAN` varchar(80) NOT NULL,
  `Supplier` varchar(50) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `PhoneNo` varchar(10) NOT NULL,
  `Address` varchar(75) DEFAULT NULL,
  `PANNo` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;



INSERT INTO `supplier` (`Supplier-PAN`, `Supplier`, `Email`, `PhoneNo`, `Address`, `PANNo`) VALUES
('ABC Company-1111', 'ABC Company', 'abc@email.com', '9843958141', 'Bagbazar', '1111'),
('Everest Suppliers-7890', 'Everest Suppliers', 'everest@gmail.com', '9801234567', 'New Baneshwor', '7890'),
('Global Exports-4562', 'Global Exports', 'global_exports@gmail.com', '9812345678', 'Kalimati', '4562'),
('HelloWorld Traders-2586', 'HelloWorld Traders', 'hello_world@gmail.com', '9843395081', 'Bagbazar', '2586'),
('Himalayan Goods-9023', 'Himalayan Goods', 'himalayan@gmail.com', '9823456789', 'Patan', '9023'),
('Kathmandu Wholesalers-1122', 'Kathmandu Wholesalers', 'kathmandu_wholesalers@gmail.com', '9855678901', 'Lalitpur', '1122'),
('Mountain Traders-6745', 'Mountain Traders', 'mountain@gmail.com', '9844567890', 'Bhaktapur', '6745'),
('Nepal Mart-3344', 'Nepal Mart', 'nepal_mart@gmail.com', '9866789012', 'Maharajgunj', '3344'),
('Pashupati Distributors-7788', 'Pashupati Distributors', 'pashupati@gmail.com', '9888901234', 'Chabahil', '7788'),
('Summit Suppliers-5566', 'Summit Suppliers', 'summit@gmail.com', '9877890123', 'Banepa', '5566'),
('Sunshine Traders-1357', 'Sunshine Traders', 'sunshine@gmail.com', '9843695481', 'Greenland', '1357');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `s_no` int(11) NOT NULL,
  `email` varchar(25) NOT NULL,
  `password` varchar(255) NOT NULL,
  `date` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


INSERT INTO `user` (`s_no`, `email`, `password`, `date`) VALUES
(3, 'Kritisha123@gmail.com', '$2y$10$nF.mlRniMuEgLgTcwNya8uz6quU27RBVTDkuH8ZhyX8fAjUkFi/ZO', '2025-03-27'),
(4, 'Nimesh123@gmail.com', '$2y$10$6MMxsoQdoH7bSBhbf./yx.LsYcufnCXZINnrkarmtNRwvU1Qgmt1.', '2025-03-27'),
(5, 'Pratibha123@gmail.com', '$2y$10$0iyI0pPmwPz4Wv8cgbDRl.yW/cu.LaLWpzg.nSsWf.C0Gz2IVzcNq', '2025-03-27');


--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`ProductCode`),
  ADD KEY `product_ibfk_1` (`Supplier-PAN`);

--
-- Indexes for table `purchase`
--
ALTER TABLE `purchase`
  ADD PRIMARY KEY (`PurchaseID`),
  ADD KEY `purchase_ibfk_1` (`ProductCode`);

--
-- Indexes for table `sales`
--
ALTER TABLE `sales`
  ADD PRIMARY KEY (`SaleID`),
  ADD KEY `sales_ibfk_1` (`ProductCode`);

--
-- Indexes for table `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`Supplier-PAN`),
  ADD UNIQUE KEY `Email` (`Email`),
  ADD UNIQUE KEY `PANNo` (`PANNo`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`s_no`),
  ADD UNIQUE KEY `email` (`email`);


--
-- AUTO_INCREMENT for table `purchase`
--
ALTER TABLE `purchase`
  MODIFY `PurchaseID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1277;

--
-- AUTO_INCREMENT for table `sales`
--
ALTER TABLE `sales`
  MODIFY `SaleID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `s_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_ibfk_1` FOREIGN KEY (`Supplier-PAN`) REFERENCES `supplier` (`Supplier-PAN`) ON UPDATE CASCADE;

--
-- Constraints for table `purchase`
--
ALTER TABLE `purchase`
  ADD CONSTRAINT `purchase_ibfk_1` FOREIGN KEY (`ProductCode`) REFERENCES `product` (`ProductCode`) ON UPDATE CASCADE;

--
-- Constraints for table `sales`
--
ALTER TABLE `sales`
  ADD CONSTRAINT `sales_ibfk_1` FOREIGN KEY (`ProductCode`) REFERENCES `product` (`ProductCode`) ON UPDATE CASCADE;
COMMIT;

