/**
 *
 * @author Clare Lee, Kelly Peng, Eunju Park
 * Clare.Lee@stonybrook.edu, MingYu.Peng@stonybrook.edu, Eun-Ju.Park@stonybrook.edu
 */

DROP DATABASE IF EXISTS fooddb;

CREATE DATABASE fooddb;

GRANT ALL PRIVILEGES ON fooddb.* to localhost IDENTIFIED BY 'root';

USE fooddb;

CREATE TABLE User_Details (
  username VARCHAR(128) NOT NULL, -- assertion: should be unique
  password VARCHAR(128) NOT NULL, -- assertion: contains at least 5 characters, at least 1 number, and at least 1 special character (!@#$%^&*)
	first_name VARCHAR(128) NOT NULL,
	last_name VARCHAR(128) NOT NULL,
	email VARCHAR(128) NOT NULL,
  birthdate DATE,
  points INTEGER NOT NULL,
  PRIMARY KEY (username)
);
----------USING FOREIGN KEY WITH SAME PRIMARY KEY-----------
CREATE TABLE User_Ordering (
  username VARCHAR(128),
  delivery_addr VARCHAR(512) NOT NULL,
  contact_number VARCHAR(128) NOT NULL,
  PRIMARY KEY (username, delivery_addr, contact_number),
  CONSTRAINT fk_user_ordering_username FOREIGN KEY (username) REFERENCES User_Details (username)
);


CREATE TABLE User_Address (
  delivery_addr VARCHAR(512) NOT NULL,
  postal_code INTEGER NOT NULL,
  PRIMARY KEY (delivery_addr)
);

CREATE TABLE Category (
  subcategory VARCHAR(128) NOT NULL,
  category VARCHAR(128),
  PRIMARY KEY (subcategory)
);

CREATE TABLE Products (
  productname VARCHAR(128) NOT NULL,
  image VARCHAR(128),
  description VARCHAR(512),
  cost INTEGER NOT NULL,
  PRIMARY KEY (productname)
);

CREATE TABLE Payment (
  pid INTEGER NOT NULL,
  payment_method VARCHAR(128) NOT NULL,
  payment_time TIME NOT NULL,
  payment_date DATE NOT NULL,
  PRIMARY KEY (pid)
);

CREATE TABLE Order_History (
  oid INTEGER NOT NULL,
  shipping_date DATE NOT NULL,
  total_price INTEGER NOT NULL,
  total_quantity INTEGER NOT NULL,
  PRIMARY KEY (oid)
);

CREATE TABLE Order_Shipping_Fee (
  total_price INTEGER NOT NULL,
  delivery_charge INTEGER NOT NULL,
  PRIMARY KEY(total_price)
);

CREATE TABLE Shopping_Cart (
  cid INTEGER NOT NULL,
  number_of_items INTEGER NOT NULL,
  PRIMARY KEY (sid)
);

CREATE TABLE Cart_Item (
  ciid INTEGER NOT NULL,
  quantity INTEGER NOT NULL,
  PRIMARY KEY (ciid)
);

--tables that relate entities
/*  all the keys: 
    username VARCHAR(128)
    productname VARCHAR(128)
    subcategory VARCHAR(128)
    cid INTEGER 
    ciid INTEGER 
    pid INTEGER 
    oid INTEGER 
*/

--User_Details (Manages) (Product (becomes) Cart_Item)
CREATE TABLE Manages (
  username VARCHAR(128),
  productname VARCHAR(128),
  ciid INTEGER,
  PRIMARY KEY (username, productname, ciid),
  CONSTRAINT fk_manages_username FOREIGN KEY (username) REFERENCES User_Details (username), 
  CONSTRAINT fk_manages_productname FOREIGN KEY (productname) REFERENCES Products (productname),
  CONSTRAINT fk_manages_ciid FOREIGN KEY (ciid) REFERENCES Cart_Item (ciid)
);

--User_Details (Makes) Payment
CREATE TABLE Makes (
  username VARCHAR(128),
  pid INTEGER,
  PRIMARY KEY (username, pid),
  CONSTRAINT fk_makes_username FOREIGN KEY (username) REFERENCES User_Details (username), 
  CONSTRAINT fk_makes_pid FOREIGN KEY (pid) REFERENCES Payment (pid)
);

--Product (Belongs_to) Category
CREATE TABLE Belongs_to (
  productname VARCHAR(128),
  subcategory VARCHAR(128),
  PRIMARY KEY (productname, subcategory),
  CONSTRAINT fk_belongs_to_subcategory FOREIGN KEY (subcategory) REFERENCES Category (subcategory), 
  CONSTRAINT fk_belongs_to_productname FOREIGN KEY (productname) REFERENCES Products (productname)
);

--Product (Becomes) Cart_Item
CREATE TABLE Becomes (
  productname VARCHAR(128),
  ciid INTEGER,
  PRIMARY KEY (productname, ciid),
  CONSTRAINT fk_becomes_productname FOREIGN KEY (productname) REFERENCES Products (productname), 
  CONSTRAINT fk_becomes_ciid FOREIGN KEY (ciid) REFERENCES Cart_Item (ciid)
);

--Shopping_Cart (Made_of) Cart_Item
CREATE TABLE Made_of (
  sid INTEGER,
  ciid INTEGER,
  PRIMARY KEY (sid, ciid),
  CONSTRAINT fk_made_of_sid FOREIGN KEY (sid) REFERENCES Shopping_Cart (sid), 
  CONSTRAINT fk_made_of_ciid FOREIGN KEY (ciid) REFERENCES Cart_Item (ciid)
);

--Payment (Paid_for) Shopping_Cart
CREATE TABLE Paid_for (
  sid INTEGER,
  pid INTEGER,
  PRIMARY KEY (sid, pid),
  CONSTRAINT fk_paid_for_sid FOREIGN KEY (sid) REFERENCES Shopping_Cart (sid), 
  CONSTRAINT fk_paid_for_pid FOREIGN KEY (pid) REFERENCES Payment (pid)
);

--Order_History Has (Payment (Paid_for) Shopping_Cart)
CREATE TABLE Has (
  oid INTEGER,
  pid INTEGER,
  sid INTEGER,
  PRIMARY KEY (oid, pid, sid),
  CONSTRAINT fk_has_oid FOREIGN KEY (oid) REFERENCES Order_History (oid), 
  CONSTRAINT fk_has_pid FOREIGN KEY (pid) REFERENCES Payment (pid),
  CONSTRAINT fk_has_sid FOREIGN KEY (sid) REFERENCES Shopping_Cart (sid)
);
-- need to add more relations 

------------------------------------------------------------------------------
INSERT INTO User_Details (username, password, first_name, last_name, email, birthdate, points) VALUES 
("kelly00", "0002", "Kelly", "Peng", "01@gmail.com", "2000-04-14", 10),
("mark99", "0002", "Mark", "Lee", "02@hotmail.com", "1999-08-02", 12),
("jean97", "abcd", "Jean", "Kim", "jeann@gmail.com", "1997-11-24", 240),
("kid", "a73j", "Sam", "Lee", "kidsam@gmail.com", "2003-12-30", 56),
("sev", "a5y^", "Steven", "Peng", "01@gmail.com", "2000-04-01", 80);

INSERT INTO User_Ordering (username, delivery_addr, contact_number) VALUES
("kelly00", "incheon", "01058495838"),
("mark99", "seoul", "01048573837"),
("mark99", "incheon", "01048573837"),
("kid", "busan", "01056462734"),
("kelly00", "incheon", "01058495838"),
("sev", "daegu", "01042322936"),
("kid", "daejeon", "01023163789"),
("jean97", "ulsan", "01012345678");

INSERT INTO User_Address (delivery_addr, postal_code) VALUES
("incheon", 434),
("seoul", 343),
("busan", 142),
("daegu", 856),
("daejeon", 457),
("ulsan", 856);

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

---------------------ADD IMAGES-----------------------------------------------
INSERT INTO Products (prodid, image, description, cost) VALUES 
("Fiji", "!", "The unique mineral profile, which contributes to FIJI Water's signature soft, 
smooth taste, reflects The Nature of Water sourced from an artesian aquifer and untouched 
until you unscrew the cap.", 2000), 
("Samdasoo", "!", "Following upon the eruption of Jeju Island's Halla Mountain volcano 25,000 years 
ago, a now famed water was born. Mineral-rich and beneficial Jeju Samdasoo water, a little 
treasure of the ecosystem, has spread from Halla Mountain to the world.",1200),
("Sprite", "!", "A delectable lemon-lime beverage best served cold and fizzy, and possibly 
with lemonade or alcohol, or both. It has possibly the shortest half-life of any soda, as it
 goes flat within minutes. ", 1800),
("Pepsi", "!", "Pepsi is a carbonated soft drink manufactured by PepsiCo. Originally created and 
developed in 1893 by Caleb Bradham and introduced as Brad's Drink, it was renamed as Pepsi-Cola 
in 1898, and then shortened to Pepsi in 1961.", 1500),
("Latte", "!", "Café latte is espresso served with plenty of steamed milk, which makes it smooth, 
light brown, and not bitter or harsh.", 2900),
("Americano", "!", "The term 'Americano' means 'American', and it derives from American Spanish, 
dating to the 1970s, or from Italy. The term 'caffè Americano' specifically is Italian for 
'American coffee'.", 2200),
("Peppermint Tea", "!", "Peppermint tea is a popular herbal tea that is naturally calorie- and 
caffeine-free. Some research has suggested that the oils in peppermint may have a number of other 
health benefits, such as fresher breath, better digestion, and reduced pain from headaches. 
Peppermint tea also has antibacterial properties.", 1400),
("Rooibos Tea", "!", "Smoky, sweet, woody, grassy, vanilla, floral, geranium, honey, herbal and 
caramel are just a handful of the words that can describe the flavor spectrum of sipping a rooibos 
tea. Because it’s an herb, rooibos is completely caffeine free. So it’s a popular alternative to 
traditional caffeinated beverages like tea or coffee.", 1900),
("Orange Juice", "!", "Orange juice is a liquid extract of the orange tree fruit, produced by 
squeezing or reaming oranges. It comes in several different varieties, including blood orange, 
navel oranges, valencia orange, clementine, and tangerine. ", 3000),
("Apple Juice", "!", "Apple juice can be useful for rehydrating when you're sick. Its disease-fighting 
plant compounds may also protect your heart and brain as you age. However, apple juice is not very 
filling compared to whole apples, nor does it offer much fiber, vitamins, or minerals.", 2900),
("Strawberry Milk", "!", "Strawberry Milk is simply milk, mixed with either natural or artificial 
strawberry fruit flavoring.", 3000),
("Banana Milk", "!", "High in potassium, vitamin B6 and pectin, banana milk is nutritious and full of 
filling fiber. It has a light, sweet flavor.", 3000),
("Beef Chuck Steak", "!", "Chuck steak is a cut of beef and is part of the sub-prime cut known as the chuck. 
The typical chuck steak is a rectangular cut, about 2.54cm thick and containing parts of the shoulder 
bones, and is often known as a '7-bone steak,' as the shape of the shoulder bone in cross section 
resembles the numeral '7'.", 7000),
("Beef Short Ribs", "!", "Short ribs are tender and have a lot more flavor than some other cuts. It has the 
bone in it, so when you serve it, it has a nice look to it.", 5300),
("Bacon", "!", "Bacon is a type of salt-cured pork. Bacon is prepared from several different cuts of meat, 
typically from the pork belly or from back cuts, which have less fat than the belly. ", 5500),
("Sausage", "!", "Sausages are a meat product usually made from ground meat, often pork, beef, or poultry, 
along with salt, spices and other flavourings. ", 3000),
("Chicken Breast", "!", "Chicken breast is a great source of lean protein (protein without a lot of 
accompanying fat). People who eat enough protein are more likely to maintain muscle mass and preserve
 a healthy metabolism.", 3200),
("Chicken Thigh", "!", "Chicken thighs are the top part of the chicken leg where it connects to
 the body (as opposed to the drumstick, which is the bottom half). Because they are dark meat, chicken
  thighs cook up moist and tender.", 1800),
(),
(),
(),
(),
(),
(),
(),
(),
(),
();

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

/* payment moethod: bank transfer, cash, credit card, mobile payment*/
/* date: YYYY-MM-DD time: hh:mm:ss*/
INSERT INTO Payment (pid, payment_method, payment_date, payment_time) VALUES 
(1, "cash", "2019-06-06", "08:02:25"),
(2, "mobile payment", "2020-02-06", "13:06:29"),
(3, "credit card", "2020-04-14", "23:07:16"),
(4, "bank transfer", "2019-09-09", "11:59:36"),
(5, "credit card", "2019-11-22", "15:55:42"),
(6, "mobile payment", "2020-04-23", "15:40:45"),
(7, "cash", "2020-06-01", "17:17:01"),
(8, "bank transfer", "2019-01-15", "09:42:45"),
(9, "bank transfer", "2020-05-09", "10:35:09");


/*
INSERT INTO Order_History (oid, shipping_date, total_price, total_quantity) VALUES 
(1, "2019-06-09", , ),
(2, "2020-02-10", , ),
(3, "2020-04-17", , ),
(4, "2019-09-12", , ),
(5, "2019-11-23", , ),
(6, "2020-04-25", , ),
(7, "2020-06-03", , ),
(8, "2019-01-17", , ),
(9, "2020-05-13", , );

*/

