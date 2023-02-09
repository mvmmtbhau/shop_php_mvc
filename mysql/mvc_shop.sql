-- DROP DATABASE mvc_shop;
CREATE DATABASE mvc_shop CHARACTER SET utf8 COLLATE utf8_general_ci;
USE mvc_shop;

CREATE TABLE tbl_admin (
	admin_id INT AUTO_INCREMENT NOT NULl,
	username VARCHAR(255) NOT NULL,
    password VARCHAR(255) NOT NULL,
	PRIMARY KEY(admin_id)
);
INSERT INTO `mvc_shop`.`tbl_admin` (`username`, `password`) VALUES ('admin', '123456');
SELECT * FROM tbl_admin;

CREATE TABLE tbl_info (
	info_id INT AUTO_INCREMENT NOT NULl,
	info_content TEXT NOT NULL,
	PRIMARY KEY(info_id)
);
SELECT * FROM tbl_info;

CREATE TABLE tbl_customer (
	customer_id INT AUTO_INCREMENT NOT NULl,
	customer_name VARCHAR(255) NOT NULL,
    customer_phone VARCHAR(255) NOT NULL,
    customer_address VARCHAR(255) NOT NULL,
    customer_email VARCHAR(255) NOT NULL,
    customer_password VARCHAR(255) NOT NULL,
	PRIMARY KEY(customer_id)
);
-- DROP TABLE tbl_customer;
SELECT * FROM tbl_customer;

CREATE TABLE tbl_category (
	category_id INT AUTO_INCREMENT NOT NULl,
	category_name VARCHAR(255) NOT NULL,
    category_desc VARCHAR(255),
	PRIMARY KEY(category_id)
);
SELECT * FROM tbl_category;

CREATE TABLE tbl_product (
	product_id INT AUTO_INCREMENT NOT NULl,
    category_id INT NOT NULL,
	product_name VARCHAR(255) NOT NULL,
    product_desc TEXT,
    product_price VARCHAR(255) NOT NULL,
    product_quantity INT NOT NULL,
	product_image VARCHAR(255) NOT NULL ,
    product_hot INT NOT NULL,
	PRIMARY KEY(product_id),
    FOREIGN KEY(category_id) REFERENCES tbl_category(category_id) 
    ON DELETE CASCADE ON UPDATE CASCADE
);
SELECT * FROM tbl_product;

CREATE TABLE tbl_category_post (
	category_post_id INT AUTO_INCREMENT NOT NULl,
	category_post_name VARCHAR(255) NOT NULL,
    category_post_desc VARCHAR(255),
	PRIMARY KEY(category_post_id)
);
SELECT * FROM tbl_category_post;

CREATE TABLE tbl_post (
	post_id INT AUTO_INCREMENT NOT NULl,
    category_post_id INT NOT NULL,
	post_title VARCHAR(255) NOT NULL,
    post_content TEXT,
	post_image VARCHAR(255) NOT NULL ,
	PRIMARY KEY(post_id),
    FOREIGN KEY(category_post_id) REFERENCES tbl_category_post(category_post_id) 
    ON DELETE CASCADE ON UPDATE CASCADE
);
SELECT * FROM tbl_post;

CREATE TABLE tbl_order (
	order_id INT AUTO_INCREMENT NOT NULl,
    customer_id INT NOT NULL,
    order_code INT NOT NULL,
	order_date TIMESTAMP DEFAULT(CURRENT_TIMESTAMP()),
    order_status INT NOT NULL,
	PRIMARY KEY(order_id),
    FOREIGN KEY(customer_id) REFERENCES tbl_customer(customer_id) 
    ON DELETE CASCADE ON UPDATE CASCADE
);
-- DROP TABLE tbl_order;
SELECT * FROM tbl_order;

CREATE TABLE tbl_order_detail (
	order_detail_id INT AUTO_INCREMENT NOT NULl,
    order_code INT NOT NULL,
    product_id INT NOT NULL,
    product_soluong INT NOT NULL,
	name VARCHAR(255) NOT NULL,
    phone VARCHAR(255) NOT NULL,
    address VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL,
    message VARCHAR(255) NOT NULL,
	PRIMARY KEY(order_detail_id),
    FOREIGN KEY(product_id) REFERENCES tbl_product(product_id) 
    ON DELETE CASCADE ON UPDATE CASCADE
);
-- DROP TABLE tbl_order_detail;
SELECT * FROM tbl_order_detail;
