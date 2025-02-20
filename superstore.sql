-- admin --

CREATE TABLE `admin` (
  `admin_id` int(6) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(15) NOT NULL,
  `last_name` varchar(15) NOT NULL,
  `gender` varchar(6) NOT NULL,
  `phone_no` varchar(14) NOT NULL,
  `email_id` varchar(30) NOT NULL,
  `password` varchar(50) NOT NULL,
  `created_date` date NOT NULL DEFAULT current_timestamp(),
  `updated_date` date NOT NULL,
  PRIMARY KEY (`admin_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4


-- customer_master --

CREATE TABLE `customer_master` (
  `customer_id` int(6) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(15) NOT NULL,
  `last_name` varchar(15) NOT NULL,
  `gender` varchar(6) NOT NULL,
  `date_of_birth` date NOT NULL,
  `phone_no` varchar(15) NOT NULL,
  `email_id` varchar(35) NOT NULL,
  `address1` varchar(25) NOT NULL,
  `city` varchar(15) NOT NULL,
  `province` varchar(20) NOT NULL,
  `postal_code` varchar(6) NOT NULL,
  `password` varchar(30) NOT NULL,
  `newsletter_YN` varchar(1) NOT NULL DEFAULT 'N',
  `remarks` text DEFAULT NULL,
  PRIMARY KEY (`customer_id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4


-- product_master --

CREATE TABLE `product_master` (
  `product_id` int(6) NOT NULL AUTO_INCREMENT,
  `product_name` varchar(25) NOT NULL,
  `product_type` varchar(20) NOT NULL,
  `supplier_id` int(6) NOT NULL,
  `unit_price` decimal(6,2) NOT NULL,
  `discount` decimal(2,0) DEFAULT NULL,
  `hst` int(2) DEFAULT NULL,
  `in_stock_yn` varchar(1) NOT NULL,
  `quantity` int(5) NOT NULL,
  `created_date` date NOT NULL DEFAULT current_timestamp(),
  `updated_date` date DEFAULT NULL,
  PRIMARY KEY (`product_id`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8mb4


-- supplier_master -- 

CREATE TABLE `supplier_master` (
  `supplier_id` int(6) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(15) NOT NULL,
  `last_name` varchar(15) NOT NULL,
  `gender` varchar(6) NOT NULL,
  `company_name` varchar(30) NOT NULL,
  `phone_no` varchar(14) NOT NULL,
  `email_id` varchar(35) NOT NULL,
  PRIMARY KEY (`supplier_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4


-- purchase_invoice_details --

CREATE TABLE `purchase_invoice_details` (
  `invoice_id` int(6) NOT NULL AUTO_INCREMENT,
  `supplier_id` int(6) NOT NULL,
  `invoice_date` datetime NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`invoice_id`),
  KEY `supplier_id` (`supplier_id`),
  CONSTRAINT `purchase_invoice_details_ibfk_1` FOREIGN KEY (`supplier_id`) REFERENCES `supplier_master` (`supplier_id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4


-- purchase_invoice_item_details --

CREATE TABLE `purchase_invoice_item_details` (
  `item_id` int(6) NOT NULL AUTO_INCREMENT,
  `invoice_id` int(6) NOT NULL,
  `product_id` int(6) NOT NULL,
  `unit_price` decimal(6,2) NOT NULL,
  `quantity` int(3) NOT NULL,
  `margin` int(3) NOT NULL,
  `hst` decimal(6,2) NOT NULL,
  `item_amount` decimal(6,2) NOT NULL,
  PRIMARY KEY (`item_id`),
  KEY `invoice_id` (`invoice_id`),
  KEY `product_id` (`product_id`),
  CONSTRAINT `purchase_invoice_item_details_ibfk_1` FOREIGN KEY (`invoice_id`) REFERENCES `purchase_invoice_details` (`invoice_id`),
  CONSTRAINT `purchase_invoice_item_details_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `product_master` (`product_id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4


-- purchase_invoice_payment_details --

CREATE TABLE `purchase_invoice_payment_details` (
  `payment_id` int(6) NOT NULL AUTO_INCREMENT,
  `invoice_id` int(6) NOT NULL,
  `total_amount` decimal(6,2) NOT NULL,
  `total_margin` decimal(6,2) NOT NULL,
  `total_tax` decimal(6,2) NOT NULL,
  `invoice_amount` decimal(6,2) NOT NULL,
  `payment_type` varchar(12) NOT NULL,
  PRIMARY KEY (`payment_id`),
  KEY `invoice_id` (`invoice_id`),
  CONSTRAINT `purchase_invoice_payment_details_ibfk_1` FOREIGN KEY (`invoice_id`) REFERENCES `purchase_invoice_details` (`invoice_id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4


-- sales_invoice_details --

CREATE TABLE `sales_invoice_details` (
  `invoice_id` int(6) NOT NULL AUTO_INCREMENT,
  `customer_id` int(6) NOT NULL,
  `invoice_date` datetime NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`invoice_id`),
  KEY `customer_id` (`customer_id`),
  CONSTRAINT `sales_invoice_details_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `customer_master` (`customer_id`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=utf8mb4


-- sales_invoice_item_details --

CREATE TABLE `sales_invoice_item_details` (
  `item_id` int(6) NOT NULL AUTO_INCREMENT,
  `invoice_id` int(6) NOT NULL,
  `product_id` int(6) NOT NULL,
  `unit_price` decimal(6,2) NOT NULL,
  `quantity` int(3) NOT NULL,
  `discount` int(3) NOT NULL,
  `hst` int(3) NOT NULL,
  `item_amount` decimal(6,2) NOT NULL,
  PRIMARY KEY (`item_id`),
  KEY `invoice_id` (`invoice_id`),
  KEY `product_id` (`product_id`),
  CONSTRAINT `sales_invoice_item_details_ibfk_1` FOREIGN KEY (`invoice_id`) REFERENCES `sales_invoice_details` (`invoice_id`),
  CONSTRAINT `sales_invoice_item_details_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `product_master` (`product_id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4


-- sales_invoice_payment_details -- 

CREATE TABLE `sales_invoice_payment_details` (
  `payment_id` int(6) NOT NULL AUTO_INCREMENT,
  `invoice_id` int(6) NOT NULL,
  `total_amount` decimal(6,2) NOT NULL,
  `total_discount` decimal(6,2) NOT NULL,
  `total_tax` decimal(6,2) NOT NULL,
  `invoice_amount` decimal(6,2) NOT NULL,
  `payment_type` varchar(12) NOT NULL,
  PRIMARY KEY (`payment_id`),
  KEY `invoice_id` (`invoice_id`),
  CONSTRAINT `sales_invoice_payment_details_ibfk_1` FOREIGN KEY (`invoice_id`) REFERENCES `sales_invoice_details` (`invoice_id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4