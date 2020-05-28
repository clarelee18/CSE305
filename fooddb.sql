/**
 *
 * @author Clare Lee, Kelly Peng, Eunju Park
 * Clare.Lee@stonybrook.edu, MingYu.Peng@stonybrook.edu, Eun-Ju.Park@stonybrook.edu
 */

DROP DATABASE IF EXISTS fooddb;

CREATE DATABASE fooddb;

GRANT ALL PRIVILEGES ON fooddb.* to localhost IDENTIFIED BY 'root';

USE fooddb;

CREATE TABLE Users (
	uid VARCHAR(128) NOT NULL,
	username VARCHAR(128) NOT NULL, -- assertion: should be unique
	password VARCHAR(128) NOT NULL, -- assertion: contains at least 5 characters, at least 1 number, and at least 1 special character (!@#$%^&*)
	first_name VARCHAR(128) NOT NULL,
	last_name VARCHAR(128) NOT NULL,
	email VARCHAR(128) NOT NULL,
	delivery_addr VARCHAR(512) NOT NULL,
	postal_code VARCHAR(128),
	phone_number VARCHAR(128) NOT NULL,
	dob DATE,                       -- assertion: to confirm user is over age 18
	credit_card_number VARCHAR(128),
	date_joined DATE,
	points INTEGER NOT NULL,
	PRIMARY KEY (uid)
);

CREATE TABLE Products (
  prodid VARCHAR(128) NOT NULL,
  cid VARCHAR(128) NOT NULL,
  name VARCHAR(128) NOT NULL,
  description VARCHAR(512),
  expiration_date DATE, 
  cost DOUBLE NOT NULL,
  manufacturer VARCHAR(128),
  PRIMARY KEY (prodid),
  FOREIGN KEY (cid) REFERENCES Category
);

CREATE TABLE Order_History (
  oid VARCHAR(128) NOT NULL,
  prodid VARCHAR(128) NOT NULL,
  pid VARCHAR(128) NOT NULL,
  order_date DATE NOT NULL,
  date_shipped DATE,
  total_price DOUBLE NOT NULL,
  quantity INTEGER NOT NULL,
  delivery_charge DOUBLE NOT NULL,
  PRIMARY KEY (oid),
  FOREIGN KEY (prodid) REFERENCES Products,
  FOREIGN KEY (pid) REFERENCES Payment
);

CREATE TABLE Shopping_cart (
  sid VARCHAR(128) NOT NULL,
  recently_updated_date DATE,
  number_of_products INTEGER NOT NULL,
  PRIMARY KEY (sid)
);

CREATE TABLE Payment (
  pid VARCHAR(128) NOT NULL,
  payment_method VARCHAR(128) NOT NULL,
  payment_date DATE NOT NULL,
  PRIMARY KEY (pid)
);

CREATE TABLE Parent_Category (
  parent_cid VARCHAR(128) NOT NULL,
  name VARCHAR(128) NOT NULL,
  number_of_children INTEGER NOT NULL,
  PRIMARY KEY (parent_cid)
);

CREATE TABLE Category (
  cid VARCHAR(128) NOT NULL,
  name VARCHAR(128) NOT NULL,
  parent_cid VARCHAR(128) NOT NULL,
  PRIMARY KEY (cid)
  FOREIGN KEY (parent_cid) REFERENCES Parent_Category
);

-- need to add more relations 

------------------------------------------------------------------------------

INSERT INTO Users (uid, username, password, first_name, last_name, email, delivery_addr, postal_code, phone_number, dob, credit_card_number, date_joined, points) VALUES 
(user_0, "Monty", "abcde1!", "Lamont", "Wood" "abcde@gmail.com", "seoul", "123-456", "010-1111-1111", "1998-01-01", "12345678", "2020-01-01", 200), 
(user_1, "Rick", "fghij2!", "Kendrick", "Sandoval" "fghij@gmail.com", "pusan", "789-012", "010-2222-2222", "1998-02-01", "90123456", "2020-02-01", 0),
(user_2, "Jackie", "klmno3!", "John", "Carr" "klmno@gmail.com", "incheon", "345-678", "010-3333-3333", "1998-03-01", "78901234", "2020-03-01", 100),
(user_3, "Howie", "qrstu4!", "Howard", "Russell" "qrstu@gmail.com", "daegu", "901-234", "010-5555-5555", "1998-05-01", "56789012", "2020-04-01", 300),
(user_4, "Ted", "vwxyz5!", "Edward", "Cohen" "vwxyz@gmail.com", "daejun", "567-890", "010-7777-7777", "1998-07-01", "34567890", "2020-05-01", 200);

INSERT INTO Parent_Category (parent_cid, name, number_of_children) VALUES 
(parct_0, "Water & Beverages", 6), 
(parct_1, "Meat & Poultry", 4),
(parct_2, "Seafood", 3),
(parct_3, "Confectionery & Snacks", 5),
(parct_4, "Processed Food", 7);

INSERT INTO Category (cid, name, parent_cid) VALUES 
(cid_0, "Water", parct_0), 
(cid_1, "Soda", parct_0),
(cid_2, "Coffee", parct_0),
(cid_3, "Tea", parct_0),
(cid_4, "Juice", parct_0);
(cid_5, "Milk", parct_0), 
(cid_6, "Beef", parct_1),
(cid_7, "Pork", parct_1),
(cid_8, "Chicken", parct_1),
(cid_9, "Eggs", parct_1);
(cid_10, "Fish", parct_2), 
(cid_11, "Shellfish & Snails", parct_2),
(cid_12, "Dried Seafoods", parct_2),
(cid_13, "Chocolate", parct_3),
(cid_14, "Snacks", parct_3);
(cid_15, "Bread", parct_3), 
(cid_16, "Ice Cream", parct_3),
(cid_17, "Candy", parct_3),
(cid_18, "Noodles", parct_4),
(cid_19, "Jams", parct_4);
(cid_20, "Sauces", parct_4), 
(cid_21, "Seasonings & Spices", parct_4),
(cid_22, "Oils", parct_4),
(cid_23, "Canned Goods", parct_4),
(cid_24, "Instant Noodles", parct_4);

INSERT INTO Products (prodid, cid, name, description, expiration_date, cost) VALUES 
(prod_0, ), 
(prod_1, ),
(prod_2, ),
(prod_3, ),
(prod_4, );

INSERT INTO Order_History (oid, prodid, pid, order_date, date_shipped, total_price, quantity, delivery_charge) VALUES 
(oid_0, ), 
(oid_1, ),
(oid_2, ),
(oid_3, ),
(oid_4, );

INSERT INTO Payment (pid, payment_method, payment_date) VALUES 
(pid_0, ), 
(pid_1, ),
(pid_2, ),
(pid_3, ),
(pid_4, );

