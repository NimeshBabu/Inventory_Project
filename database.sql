-- Enable strict mode for better data integrity
SET sql_mode = 'STRICT_TRANS_TABLES';

CREATE DATABASE IF NOT EXISTS InventorySystem;
USE InventorySystem;

-- Product Table
CREATE TABLE IF NOT EXISTS Product (
    ProductCode VARCHAR(10) PRIMARY KEY UNIQUE NOT NULL,
    ProductName VARCHAR(50) NOT NULL,
    Supplier VARCHAR(50) NOT NULL,
    Cost DECIMAL(10,2) NOT NULL,
    Price DECIMAL(10,2) NOT NULL,
    Description VARCHAR(100),
    Url VARCHAR(100),
    Quantity INT NOT NULL CHECK (Quantity >= 0)
);
-- Referencing to supplier table
ALTER TABLE product 
ADD COLUMN SupplierID INT NOT NULL,
ADD CONSTRAINT fk_supplier FOREIGN KEY (SupplierID) REFERENCES supplier(SupplierID) ON DELETE CASCADE ON UPDATE CASCADE;




-- Sales Table
CREATE TABLE IF NOT EXISTS Sales (
    SaleID INT AUTO_INCREMENT PRIMARY KEY,
    Date DATETIME DEFAULT CURRENT_TIMESTAMP,
    ProductCode VARCHAR(10),
    Customer VARCHAR(50),
    ShippingAddress VARCHAR(75),
    Biller VARCHAR(50),
    Quantity INT NOT NULL CHECK (Quantity > 0),
    SalesAmount DECIMAL(10,2) NOT NULL,
    PaymentStatus ENUM('Paid', 'Unpaid', 'Due') ,
    FOREIGN KEY (ProductCode) REFERENCES Product(ProductCode)
    ON UPDATE CASCADE ON DELETE RESTRICT
);

-- Purchase Table
CREATE TABLE IF NOT EXISTS Purchase (
    PurchaseID INT AUTO_INCREMENT PRIMARY KEY,
    Date DATETIME DEFAULT CURRENT_TIMESTAMP,
    ProductCode VARCHAR(10),
    Quantity INT NOT NULL CHECK (Quantity > 0),
    PurchaseAmount DECIMAL(10,2) NOT NULL,
    PaymentStatus ENUM('Paid', 'Unpaid', 'Due'),
    SupplierID INT,
    FOREIGN KEY (ProductCode) REFERENCES Product(ProductCode)
    ON UPDATE CASCADE ON DELETE CASCADE
);

-- Supplier Table
CREATE TABLE IF NOT EXISTS Supplier (
    SupplierID INT AUTO_INCREMENT PRIMARY KEY,
    Supplier VARCHAR(50) NOT NULL,
    Email VARCHAR(100) UNIQUE NOT NULL,
    PhoneNo VARCHAR(10) NOT NULL,
    Address VARCHAR(75),
    PANNo VARCHAR(20) UNIQUE NOT NULL
);

DELIMITER $$

-- Trigger: Decrease Product Quantity on Sale
CREATE TRIGGER AfterSaleInsert
BEFORE INSERT ON Sales
FOR EACH ROW
BEGIN
    -- Check if there is enough stock and update it in one step
    UPDATE Product
    SET Quantity = Quantity - NEW.Quantity
    WHERE ProductCode = NEW.ProductCode
    AND Quantity >= NEW.Quantity;

    IF ROW_COUNT() = 0 THEN
        SIGNAL SQLSTATE '45000'
        SET MESSAGE_TEXT = 'Not enough stock available or product does not exist';
    END IF;
END$$

-- Trigger: Increase Product Quantity on Purchase
CREATE TRIGGER AfterPurchaseInsert
BEFORE INSERT ON Purchase
FOR EACH ROW
BEGIN
    -- Ensure the product exists before updating
    IF NOT EXISTS (SELECT 1 FROM Product WHERE ProductCode = NEW.ProductCode) THEN
        SIGNAL SQLSTATE '45000'
        SET MESSAGE_TEXT = 'Product does not exist for this purchase';
    END IF;

    -- Increase stock
    UPDATE Product
    SET Quantity = Quantity + NEW.Quantity
    WHERE ProductCode = NEW.ProductCode;
END$$

DELIMITER ;
