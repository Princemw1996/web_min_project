CREATE DATABASE mzuni_tuckshop;

USE mzuni_tuckshop;

CREATE TABLE product (
  product_id INT PRIMARY KEY AUTO_INCREMENT,
  product_name VARCHAR(255) NOT NULL,
  description VARCHAR(255),
  price DECIMAL(10, 2) NOT NULL,
  quantity INT NOT NULL
);

CREATE TABLE category (
  category_id INT PRIMARY KEY AUTO_INCREMENT,
  category_name VARCHAR(255) NOT NULL
);


CREATE TABLE product_category (
  product_id INT,
  category_id INT,
  PRIMARY KEY (product_id, category_id),
  FOREIGN KEY (product_id) REFERENCES product (product_id),
  FOREIGN KEY (category_id) REFERENCES category (category_id)
);

