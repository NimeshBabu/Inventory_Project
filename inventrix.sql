CREATE DATABASE inventrix;
USE inventrix;

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


--

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
('1221', 'Dining Table', 30000.00, 37000.00, '4 chair\r\n', 'https://i5.walmartimages.com/seo/SEGMART-Dining-Table-4-High-back-Upholstered-Chairs-Modern-Dinette-Set-Chairs-Set-Persons-Small-Home-Kitchen-Ideal-Apartment-Breakfast-Nook_bc8ea994-0caa-44fc-9fd9-c287225f7408.aa04dbb32beb866b7e87757d95a5c299.jpeg', 0, 'ABC Company-1111'),
('1254', 'Bed', 50000.00, 60000.00, 'King Size Bed', 'https://lifely.com.au/cdn/shop/files/JoseBedFrameGallery1.jpg?v=1733883102', 25, 'ABC Company-1111'),
('1578', 'Study Table', 18000.00, 25000.00, 'Aesthetic', 'https://nativesutra.com/wp-content/uploads/2024/12/Screenshot_3-1.png', 25, 'ABC Company-1111'),
('1982', 'Sofa', 30000.00, 35000.00, '3 piece,brown', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcS0sgzWXCBhGxlllcZ-DeQf3LPlUnzka5Wr1Q&s', 0, 'ABC Company-1111'),
('5214', 'Kitchen Set', 100000.00, 1400000.00, 'Full set', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQwPLSjGDXg-yiQb2AurSMv_-fWd2zvSGFS-A&s', 24, 'Sunshine Traders-1357'),
('7412', 'Wardrobe', 50000.00, 60000.00, 'Grey Color ', 'https://graphql.smithandfabricators.com/media/products/10_Grey_Wardrobe_Designs_Ideas_Modern_Interior_Look_722e8e20.jpeg', 5, 'ABC Company-1111');

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
  `Supplier-PAN` varchar(80) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


INSERT INTO `purchase` (`PurchaseID`, `Date`, `ProductCode`, `Quantity`, `PurchaseAmount`, `PaymentStatus`, `Supplier-PAN`) VALUES
(1229, '2025-03-05', '1221', 25, 750000.00, 'Paid', 'ABC Company-1111'),
(1232, '2025-03-20', '1221', 20, 600000.00, 'Paid', 'ABC Company-1111'),
(1233, '2025-03-18', '1221', 5, 150000.00, 'Unpaid', 'ABC Company-1111'),
(1234, '2025-03-17', '1221', 5, 150000.00, 'Paid', 'ABC Company-1111'),
(1235, '2025-03-12', '1221', 30, 900000.00, 'Paid', 'ABC Company-1111'),
(1237, '2025-03-19', '5214', 25, 2500000.00, 'Paid', 'Sunshine Traders-1357'),
(1238, '2025-02-26', '1578', 30, 540000.00, 'Due', 'ABC Company-1111'),
(1239, '2025-03-06', '1254', 25, 1250000.00, 'Paid', 'ABC Company-1111');

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
  `PaymentStatus` enum('Paid','Unpaid','Due') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
--

INSERT INTO `sales` (`SaleID`, `Date`, `ProductCode`, `Customer`, `ShippingAddress`, `Biller`, `Quantity`, `SalesAmount`, `PaymentStatus`) VALUES
(4, '2025-03-04', '1221', 'Ghanshyam ', 'Palpa', 'Biller A', 30, 1110000.00, 'Unpaid'),
(12, '2025-03-06', '1221', 'Ram ', 'Bhaktapur', 'Biller A', 10, 370000.00, 'Paid'),
(13, '2025-03-04', '1578', 'Ghanshyam ', 'Bhaktapur', 'Biller A', 5, 125000.00, 'Due'),
(15, '2025-03-07', '1982', 'Nimesh', 'Palpa', 'Biller C', 10, 350000.00, 'Unpaid'),
(16, '2025-03-07', '1982', 'Nimesh', 'Palpa', 'Biller C', 10, 350000.00, 'Unpaid'),
(17, '2025-03-07', '1982', 'Nimesh', 'Palpa', 'Biller C', 10, 350000.00, 'Unpaid'),
(18, '2025-03-07', '1982', 'Nimesh', 'Palpa', 'Biller C', 10, 350000.00, 'Unpaid'),
(19, '2025-03-18', '1578', 'Nimesh', 'Bhaktapur', 'Biller B', 10, 250000.00, 'Due'),
(20, '2025-03-05', '1254', 'Nimesh', 'Bhaktapur', 'Biller B', 1, 60000.00, 'Due'),
(21, '2025-03-04', '5214', 'Nimesh', 'Palpa', 'Biller B', 3, 4200000.00, 'Unpaid');

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

CREATE TABLE `supplier` (
  `Supplier-PAN` varchar(80) NOT NULL,
  `Supplier` varchar(50) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `PhoneNo` varchar(10) NOT NULL,
  `Address` varchar(75) DEFAULT NULL,
  `PANNo` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
--

INSERT INTO `supplier` (`Supplier-PAN`, `Supplier`, `Email`, `PhoneNo`, `Address`, `PANNo`) VALUES
('ABC Company-1111', 'ABC Company', 'abc@email.com', '9843350001', 'Bagbazar', '1111'),
('HelloWorld Traders-2586', 'HelloWorld Traders', 'hello_world@gmail.com', '9843350001', 'Bagbazar', '2586'),
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

--
--

INSERT INTO `user` (`s_no`, `email`, `password`, `date`) VALUES
(3, 'Kritisha123@gmail.com', '$2y$10$nF.mlRniMuEgLgTcwNya8uz6quU27RBVTDkuH8ZhyX8fAjUkFi/ZO', '2025-03-27'),
(4, 'Nimesh123@gmail.com', '$2y$10$6MMxsoQdoH7bSBhbf./yx.LsYcufnCXZINnrkarmtNRwvU1Qgmt1.', '2025-03-27'),
(5, 'Pratibha123@gmail.com', '$2y$10$0iyI0pPmwPz4Wv8cgbDRl.yW/cu.LaLWpzg.nSsWf.C0Gz2IVzcNq', '2025-03-27');

--
-- Indexes for dumped tables
--

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
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `purchase`
--
ALTER TABLE `purchase`
  MODIFY `PurchaseID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1240;

--
-- AUTO_INCREMENT for table `sales`
--
ALTER TABLE `sales`
  MODIFY `SaleID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `s_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

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