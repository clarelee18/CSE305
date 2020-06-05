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
	points INTEGER, -- NOT NULL
	PRIMARY KEY (uid)
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
  parent_cid VARCHAR(128),
  PRIMARY KEY (cid),
  CONSTRAINT fk_category_parent_cid FOREIGN KEY (parent_cid) REFERENCES Parent_Category(parent_cid) ON DELETE SET NULL
);

CREATE TABLE Products (
  prodid VARCHAR(128) NOT NULL,
  cid VARCHAR(128),
  name VARCHAR(128) NOT NULL,
  description VARCHAR(512),
  expiration_date DATE, 
  cost DOUBLE NOT NULL,
  manufacturer VARCHAR(128),
  PRIMARY KEY (prodid),
  CONSTRAINT fk_products_cid FOREIGN KEY (cid) REFERENCES Category (cid) ON DELETE SET NULL
);

CREATE TABLE Payment (
  pid VARCHAR(128) NOT NULL,
  payment_method VARCHAR(128) NOT NULL,
  payment_date DATE NOT NULL,
  PRIMARY KEY (pid)
);

CREATE TABLE Order_History (
  oid VARCHAR(128) NOT NULL,
  prodid VARCHAR(128),
  pid VARCHAR(128),
  order_date DATE NOT NULL,
  date_shipped DATE,
  total_price DOUBLE NOT NULL,
  quantity INTEGER NOT NULL,
  delivery_charge DOUBLE NOT NULL,
  PRIMARY KEY (oid),
  CONSTRAINT fk_order_prodid FOREIGN KEY (prodid) REFERENCES Products (prodid) ON DELETE SET NULL,
  CONSTRAINT fk_order_pid FOREIGN KEY (pid) REFERENCES Payment (pid) ON DELETE SET NULL
);

CREATE TABLE Shopping_cart (
  sid VARCHAR(128) NOT NULL,
  recently_updated_date DATE,
  number_of_products INTEGER NOT NULL,
  PRIMARY KEY (sid)
);

CREATE TABLE Cartitem (
  ciid VARCHAR(128) NOT NULL,
  quantity INTEGER NOT NULL,
  PRIMARY KEY (ciid)
);

/*tables that relate entities*/
/*  all the keys: 
    username VARCHAR(128)
    productname VARCHAR(128)
    subcategory VARCHAR(128)
    cid INTEGER 
    ciid INTEGER 
    pid INTEGER 
    oid INTEGER 
*/

/* User_Details (Manages) (Product (becomes) Cart_Item) */
CREATE TABLE Manages (
  username VARCHAR(128),
  productname VARCHAR(128),
  ciid INTEGER,
  PRIMARY KEY (uid, prodid, ciid),
  FOREIGN KEY (uid) REFERENCES Users_Details (uid), 
  FOREIGN KEY (productname) REFERENCES Products(productname),
  FOREIGN KEY (ciid) REFERENCES Cart                                          item (ciid)
);

/* User_Details (Makes) Payment*/
CREATE TABLE Makes (
  username VARCHAR(128),
  pid INTEGER,
  PRIMARY KEY (username, pid),
  FOREIGN KEY (username) REFERENCES Users_Details (username), 
  FOREIGN KEY (pid) REFERENCES Payment (pid)
);

/* Product (Belongs_to) Category */
CREATE TABLE Belongs_to (
  productname VARCHAR(128),
  subcategory VARCHAR(128),
  PRIMARY KEY (productname, subcategory),
  FOREIGN KEY (subcategory) REFERENCES Category (subcategory), 
  FOREIGN KEY (productname) REFERENCES Products (productname)
);

/* Product (Becomes) Cart_Item */
CREATE TABLE Becomes (
  productname VARCHAR(128),
  ciid INTEGER,
  PRIMARY KEY (productname, ciid),
  FOREIGN KEY (productname) REFERENCES Products (productname), 
  FOREIGN KEY (ciid) REFERENCES Cart_Item (ciid)
);

/* Shopping_Cart (Made_of) Cart_Item */
CREATE TABLE Made_of (
  cid INTEGER,
  ciid INTEGER,
  PRIMARY KEY (cid, ciid),
  FOREIGN KEY (cid) REFERENCES Shopping_Cart (cid), 
  FOREIGN KEY (ciid) REFERENCES Cart_Item (ciid)
);

/* Payment (Paid_for) Shopping_Cart */
CREATE TABLE Paid_for (
  cid INTEGER,
  pid INTEGER,
  PRIMARY KEY (cid, pid),
  FOREIGN KEY (cid) REFERENCES Shopping_Cart (cid), 
  FOREIGN KEY (pid) REFERENCES Payment (pid)
);

/* Order_History Has (Payment (Paid_for) Shopping_Cart) */
CREATE TABLE Has (
  oid INTEGER,
  pid INTEGER,
  cid INTEGER,
  PRIMARY KEY (oid, pid, cid),
  FOREIGN KEY (oid) REFERENCES Order_History (oid), 
  FOREIGN KEY (pid) REFERENCES Payment (pid),
  FOREIGN KEY (cid) REFERENCES Shopping_Cart (cid)
);

-- need to add more relations 

------------------------------------------------------------------------------

INSERT INTO Users (uid, username, password, first_name, last_name, email, delivery_addr, postal_code, phone_number, dob, credit_card_number, date_joined, points) VALUES 
("user_0", "Monty", "abcde1!", "Lamont", "Wood", "abcde@gmail.com", "seoul", "123-456", "010-1111-1111", "1998-01-01", "12345678", "2020-01-01", 200),
("user_1", "Rick", "fghij2!", "Kendrick", "Sandoval", "fghij@gmail.com", "pusan", "789-012", "010-2222-2222", "1998-02-01", "90123456", "2020-02-01", 0),
("user_2", "Jackie", "klmno3!", "John", "Carr", "klmno@gmail.com", "incheon", "345-678", "010-3333-3333", "1998-03-01", "78901234", "2020-03-01", 100),
("user_3", "Howie", "qrstu4!", "Howard", "Russell", "qrstu@gmail.com", "daegu", "901-234", "010-5555-5555", "1998-05-01", "56789012", "2020-04-01", 300),
("user_4", "Ted", "vwxyz5!", "Edward", "Cohen", "vwxyz@gmail.com", "daejun", "567-890", "010-7777-7777", "1998-07-01", "34567890", "2020-05-01", 200);

INSERT INTO Parent_Category (parent_cid, name, number_of_children) VALUES 
("parct_0", "Water & Beverages", 6), 
("parct_1", "Meat & Poultry", 4),
("parct_2", "Seafood", 3),
("parct_3", "Confectionery & Snacks", 5),
("parct_4", "Processed Food", 7);

INSERT INTO Category (cid, name, parent_cid) VALUES 
("cid_0", "Water", "parct_0"), 
("cid_1", "Soda", "parct_0"),
("cid_2", "Coffee", "parct_0"),
("cid_3", "Tea", "parct_0"),
("cid_4", "Juice", "parct_0"),
("cid_5", "Milk", "parct_0"), 
("cid_6", "Beef", "parct_1"),
("cid_7", "Pork", "parct_1"),
("cid_8", "Chicken", "parct_1"),
("cid_9", "Eggs", "parct_1"),
("cid_10", "Fish", "parct_2"), 
("cid_11", "Shellfish & Snails", "parct_2"),
("cid_12", "Dried Seafoods", "parct_2"),
("cid_13", "Chocolate", "parct_3"),
("cid_14", "Snacks", "parct_3"),
("cid_15", "Bread", "parct_3"), 
("cid_16", "Ice Cream", "parct_3"),
("cid_17", "Candy", "parct_3"),
("cid_18", "Noodles", "parct_4"),
("cid_19", "Jams", "parct_4"),
("cid_20", "Sauces", "parct_4"), 
("cid_21", "Seasonings & Spices", "parct_4"),
("cid_22", "Oils", "parct_4"),
("cid_23", "Canned Goods", "parct_4"),
("cid_24", "Instant Noodles", "parct_4");

INSERT INTO Products (prodid, cid, name, description, expiration_date, cost) VALUES 
("prod_0", "cid_0", "Kirkland Signature Bottled Water", "Kirkland Signature Bottled Water", "2020-07-01", 1000), 
("prod_1", "cid_0", "Voss Artesian Water", "Voss Artesian Water", "2020-07-02", 1100),
("prod_2", "cid_0", "Fiji", "Fiji", "2020-07-03", 1200),
("prod_3", "cid_0", "Samdasoo", "Samdasoo", "2020-07-04", 1300),
("prod_4", "cid_1", "Sprite", "Sprite", "2020-07-05", 500),
("prod_5", "cid_1", "Dr. Pepper", "Dr. Pepper", "2020-07-06", 600), 
("prod_6", "cid_1", "Coca-Cola", "Coca-Cola", "2020-07-07", 700),
("prod_7", "cid_1", "Pepsi", "Pepsi", "2020-07-08", 800),
("prod_8", "cid_1", "Mountain Dew", "Mountain Dew", "2020-07-09", 900),
("prod_9", "cid_2", "Latte", "Latte", "2020-07-10", 1200),
("prod_10", "cid_2", "Cappuccino", "Cappuccino", "2020-07-11", 1300), 
("prod_11", "cid_2", "Espresso", "Espresso", "2020-07-12", 1400),
("prod_12", "cid_2", "Americano", "Americano", "2020-07-13", 1500),
("prod_13", "cid_3", "Green Tea", "Green Tea", "2020-07-14", 2000),
("prod_14", "cid_3", "Peppermint Tea", "Peppermint Tea", "2020-07-15", 2100),
("prod_15", "cid_3", "Ginseng Root Tea", "Ginseng Root Tea", "2020-07-16", 2200), 
("prod_16", "cid_3", "Black Tea", "Black Tea", "2020-07-17", 2300),
("prod_17", "cid_3", "Oolong Tea", "Oolong Tea", "2020-07-18", 2400),
("prod_18", "cid_3", "Moringa Tea", "Moringa Tea", "2020-07-19", 2500),
("prod_19", "cid_3", "Rooibos Tea", "Rooibos Tea", "2020-07-20", 2600),
("prod_20", "cid_4", "Orange Juice", "Orange Juice", "2020-07-21", 2500), 
("prod_21", "cid_4", "Lemonade", "Lemonade", "2020-07-22", 2600),
("prod_22", "cid_4", "Apple Juice", "Apple Juice", "2020-07-23", 2700),
("prod_23", "cid_4", "Mango Juice", "Mango Juice", "2020-07-24", 2800),
("prod_24", "cid_4", "Grape Juice", "Grape Juice", "2020-07-25", 2900),
("prod_25", "cid_5", "Chocolate Milk", "Chocolate Milk", "2020-07-26", 2200), 
("prod_26", "cid_5", "Strawberry Milk", "Strawberry Milk", "2020-07-27", 2300),
("prod_27", "cid_5", "Banana Milk", "Banana Milk", "2020-07-28", 2400),
("prod_28", "cid_5", "Low-fat Milk", "Low-fat Milk", "2020-07-29", 2500),
("prod_29", "cid_6", "Chuck", "Chuck", "2020-07-30", 2600),
("prod_30", "cid_6", "Rib", "Rib", "2020-07-21", 2500), 
("prod_31", "cid_6", "Flank", "Flank", "2020-07-22", 2600),
("prod_32", "cid_6", "Brisket", "Brisket", "2020-07-23", 2700),
("prod_33", "cid_6", "Neck", "Neck", "2020-07-24", 2800),
("prod_34", "cid_6", "Breast", "Breast", "2020-07-25", 2900),
("prod_35", "cid_7", "Bacon", "Bacon", "2020-07-26", 2200), 
("prod_36", "cid_7", "Smoked Ham", "Smoked Ham", "2020-07-27", 2300),
("prod_37", "cid_7", "Sausage", "Sausage", "2020-07-28", 2400),
("prod_38", "cid_7", "Spareribs", "Spareribs", "2020-07-29", 2500),
("prod_39", "cid_7", "Tenderloin", "Tenderloin", "2020-07-30", 2600),
("prod_40", "cid_8", "Breast", "Breast", "2020-07-21", 2500), 
("prod_41", "cid_8", "Liver", "Liver", "2020-07-22", 2600),
("prod_42", "cid_8", "Wing", "Wing", "2020-07-23", 2700),
("prod_43", "cid_8", "Thigh", "Thigh", "2020-07-24", 2800),
("prod_44", "cid_8", "Leg", "Leg", "2020-07-25", 2900),
("prod_45", "cid_9", "Duck", "Duck", "2020-07-26", 2200), 
("prod_46", "cid_9", "Chicken", "Chicken", "2020-07-27", 2300),
("prod_47", "cid_9", "Quail", "Quail", "2020-07-28", 2400),
("prod_48", "cid_10", "Mackerel", "Mackerel", "2020-07-29", 2500),
("prod_49", "cid_10", "Tuna", "Tuna", "2020-07-30", 2600);

/*
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
*/
