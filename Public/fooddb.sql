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
  password VARCHAR(128) NOT NULL,
	first_name VARCHAR(128) NOT NULL,
	last_name VARCHAR(128) NOT NULL,
	email VARCHAR(128) NOT NULL,
  birthdate DATE,
  PRIMARY KEY (username)
);

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
  sid INTEGER NOT NULL,
  number_of_items INTEGER NOT NULL, -- assertion: should be at least 1
  PRIMARY KEY (sid)
);

/*tables that relate entities*/
/*  all the keys: 
    username VARCHAR(128)
    productname VARCHAR(128)
    subcategory VARCHAR(128)
    sid INTEGER 
    pid INTEGER 
    oid INTEGER 
*/

/*User_Details (Manages) Shopping_Cart*/
CREATE TABLE Manages (
  username VARCHAR(128),
  sid INTEGER,
  PRIMARY KEY (username, sid),
  CONSTRAINT fk_manages_username FOREIGN KEY (username) REFERENCES User_Details (username), 
  CONSTRAINT fk_manages_sid FOREIGN KEY (sid) REFERENCES Shopping_Cart (sid)
);

/*User_Details (Makes) Payment*/
CREATE TABLE Makes (
  username VARCHAR(128),
  pid INTEGER,
  PRIMARY KEY (username, pid),
  CONSTRAINT fk_makes_username FOREIGN KEY (username) REFERENCES User_Details (username), 
  CONSTRAINT fk_makes_pid FOREIGN KEY (pid) REFERENCES Payment (pid)
);

/*Product (Belongs_to) Category*/
CREATE TABLE Belongs_to (
  productname VARCHAR(128),
  subcategory VARCHAR(128),
  PRIMARY KEY (productname, subcategory),
  CONSTRAINT fk_belongs_to_subcategory FOREIGN KEY (subcategory) REFERENCES Category (subcategory), 
  CONSTRAINT fk_belongs_to_productname FOREIGN KEY (productname) REFERENCES Products (productname)
);

/*Shopping_Cart (Made_of) Products*/
CREATE TABLE Made_of (
  sid INTEGER,
  productname VARCHAR(128),
  PRIMARY KEY (sid, productname),
  FOREIGN KEY (sid) REFERENCES Shopping_Cart (sid), 
  FOREIGN KEY (productname) REFERENCES Products (productname)
);

/*Payment (Paid_for) Shopping_Cart*/
CREATE TABLE Paid_for (
  sid INTEGER,
  pid INTEGER,
  PRIMARY KEY (sid, pid),
  CONSTRAINT fk_paid_for_sid FOREIGN KEY (sid) REFERENCES Shopping_Cart (sid), 
  CONSTRAINT fk_paid_for_pid FOREIGN KEY (pid) REFERENCES Payment (pid)
);

/*Order_History Has (Payment (Paid_for) Shopping_Cart)*/
CREATE TABLE Has (
  oid INTEGER,
  pid INTEGER,
  sid INTEGER,
  PRIMARY KEY (oid, pid, sid),
  CONSTRAINT fk_has_oid FOREIGN KEY (oid) REFERENCES Order_History (oid), 
  CONSTRAINT fk_has_pid FOREIGN KEY (pid) REFERENCES Payment (pid),
  CONSTRAINT fk_has_sid FOREIGN KEY (sid) REFERENCES Shopping_Cart (sid)
);

INSERT INTO User_Details (username, password, first_name, last_name, email, birthdate) VALUES 
("kelly00", "0002", "Kelly", "Peng", "01@gmail.com", "2000-04-14"),
("mark99", "0002", "Mark", "Lee", "02@hotmail.com", "1999-08-02"),
("jean97", "abcd", "Jean", "Kim", "jeann@gmail.com", "1997-11-24"),
("kid", "a73j", "Sam", "Lee", "kidsam@gmail.com", "2003-12-30"),
("sev", "a5y^", "Steven", "Peng", "01@gmail.com", "2000-04-01");

INSERT INTO User_Ordering (username, delivery_addr, contact_number) VALUES
("kelly00", "incheon", "01058495838"),
("mark99", "seoul", "01048573837"),
("mark99", "incheon", "01048573837"),
("kid", "busan", "01056462734"),
("kelly00", "busan", "01058495838"),
("sev", "daegu", "01042322936");

INSERT INTO User_Address (delivery_addr, postal_code) VALUES
("incheon", 434),
("seoul", 343),
("busan", 142),
("daegu", 856),
("daejeon", 457),
("ulsan", 856);

INSERT INTO Category (subcategory, category) VALUES 
("Water", "Water & Beverages"), 
("Soda", "Water & Beverages"),
("Coffee", "Water & Beverages"),
("Tea", "Water & Beverages"),
("Juice", "Water & Beverages"),
("Milk", "Water & Beverages"), 
("Beef", "Meat & Poultry"),
("Pork", "Meat & Poultry"),
("Chicken", "Meat & Poultry"),
("Eggs", "Meat & Poultry"),
("Fish", "Seafood"), 
("Shellfish & Snails", "Seafood"),
("Dried Seafoods", "Seafood"),
("Chocolate", "Bread & Snacks"),
("Snacks", "Bread & Snacks"),
("Bread", "Bread & Snacks"), 
("Ice Cream", "Bread & Snacks"),
("Candy", "Bread & Snacks"),
("Noodles", "Processed Food"),
("Jams", "Processed Food"),
("Sauces", "Processed Food"), 
("Seasonings & Spices", "Processed Food"),
("Oils", "Processed Food"),
("Canned Goods", "Processed Food"),
("Instant Noodles", "Processed Food");

INSERT INTO Products (productname, image, description, cost) VALUES 
("Fiji", "Fiji.jpg", "The unique mineral profile, which contributes to FIJI Water's signature soft, 
smooth taste, reflects The Nature of Water sourced from an artesian aquifer and untouched 
until you unscrew the cap.", 2000), 
("Samdasoo", "Samdasoo.jpeg", "Following upon the eruption of Jeju Island's Halla Mountain volcano 25,000 years 
ago, a now famed water was born. Mineral-rich and beneficial Jeju Samdasoo water, a little 
treasure of the ecosystem, has spread from Halla Mountain to the world.",1200),
("Sprite", "Sprite.jpg", "A delectable lemon-lime beverage best served cold and fizzy, and possibly 
with lemonade or alcohol, or both. It has possibly the shortest half-life of any soda, as it
 goes flat within minutes. ", 1800),
("Pepsi", "Pepsi.jpeg", "Pepsi is a carbonated soft drink manufactured by PepsiCo. Originally created and 
developed in 1893 by Caleb Bradham and introduced as Brad's Drink, it was renamed as Pepsi-Cola 
in 1898, and then shortened to Pepsi in 1961.", 1500),
("Latte", "Latte.jpg", "Cafe latte is espresso served with plenty of steamed milk, which makes it smooth, 
light brown, and not bitter or harsh.", 2900),
("Americano", "Americano.jpg", "The term 'Americano' means 'American', and it derives from American Spanish, 
dating to the 1970s, or from Italy. The term 'caffe Americano' specifically is Italian for 
'American coffee'.", 2200),
("PeppermintTea", "Peppermint Tea.jpg", "Peppermint tea is a popular herbal tea that is naturally calorie- and 
caffeine-free. Some research has suggested that the oils in peppermint may have a number of other 
health benefits, such as fresher breath, better digestion, and reduced pain from headaches. 
Peppermint tea also has antibacterial properties.", 1400),
("RooibosTea", "Rooibos Tea.jpg", "Smoky, sweet, woody, grassy, vanilla, floral, geranium, honey, herbal and 
caramel are just a handful of the words that can describe the flavor spectrum of sipping a rooibos 
tea. Because it's an herb, rooibos is completely caffeine free. So it's a popular alternative to 
traditional caffeinated beverages like tea or coffee.", 1900),
("OrangeJuice", "Orange Juice.jpeg", "Orange juice is a liquid extract of the orange tree fruit, produced by 
squeezing or reaming oranges. It comes in several different varieties, including blood orange, 
navel oranges, valencia orange, clementine, and tangerine. ", 3000),
("AppleJuice", "Apple Juice.jpg", "Apple juice can be useful for rehydrating when you're sick. Its disease-fighting 
plant compounds may also protect your heart and brain as you age. However, apple juice is not very 
filling compared to whole apples, nor does it offer much fiber, vitamins, or minerals.", 2900),
("StrawberryMilk", "Strawberry Milk.jpg", "Strawberry Milk is simply milk, mixed with either natural or artificial 
strawberry fruit flavoring.", 3000),
("BananaMilk", "Banana Milk.jpg", "High in potassium, vitamin B6 and pectin, banana milk is nutritious and full of 
filling fiber. It has a light, sweet flavor.", 3000),
("BeefChuckSteak", "Beef Chuck Steak.jpeg", "Chuck steak is a cut of beef and is part of the sub-prime cut known as the chuck. 
The typical chuck steak is a rectangular cut, about 2.54cm thick and containing parts of the shoulder 
bones, and is often known as a '7-bone steak,' as the shape of the shoulder bone in cross section 
resembles the numeral '7'.", 7000),
("BeefShortRibs", "Beef Short Ribs.png", "Short ribs are tender and have a lot more flavor than some other cuts. It has the 
bone in it, so when you serve it, it has a nice look to it.", 5300),
("Bacon", "Bacon.jpg", "Bacon is a type of salt-cured pork. Bacon is prepared from several different cuts of meat, 
typically from the pork belly or from back cuts, which have less fat than the belly. ", 5500),
("Sausage", "Sausage.png", "Sausages are a meat product usually made from ground meat, often pork, beef, or poultry, 
along with salt, spices and other flavourings. ", 3000),
("ChickenBreast", "Chicken Breast.jpg", "Chicken breast is a great source of lean protein (protein without a lot of 
accompanying fat). People who eat enough protein are more likely to maintain muscle mass and preserve
 a healthy metabolism.", 3200),
("ChickenThigh", "Chicken Thigh.jpg", "Chicken thighs are the top part of the chicken leg where it connects to
 the body (as opposed to the drumstick, which is the bottom half). Because they are dark meat, chicken
  thighs cook up moist and tender.", 1800),
("DuckEgg", "Duck Egg.jpg", "A duck egg??s white tends to be nearly transparent, lacking the slight yellowish tint
 some chicken eggs have. Its yolk, though, is what??s so prized by chefs: a duck yolk is much bigger than
  a chicken yolk.", 1000),
("ChickenEgg", "Chicken Egg.jpg", "In the chicken egg, there is a balance of numerous, high quality nutrients, many
 of which are highly bioavailable. The egg confers a multitude of health benefits to consumers emphasizing
  its classification as a functional food.", 300),
("Tuna", "Tuna.jpg", "A tuna is a saltwater fish that belongs to the tribe Thunnini, a subgrouping of the 
Scombridae family. The Thunnini comprise 15 species across five genera, the sizes of which vary greatly, 
ranging from the bullet tuna up to the Atlantic bluefin tuna. ", 40000),
("Salmon", "Salmon.jpg", "Salmon is a common food classified as an oily fish with a rich content of protein and 
omega-3 fatty acids.", 15000),
("Scallop", "Scallop.jpeg", "An edible bivalve mollusk with a ribbed fan-shaped shell. Scallops swim by rapidly
 opening and closing the shell valves.", 12000),
("Oyster", "Oyster.jpg", "A bivalve mollusk with an irregular long shell that is normally attached to rocks
 and that is consumed as food.", 20000),
("Laver", "Laver.jpg", "An edible seaweed with thin flat fronds of a reddish-purple and green colour
 that becomes black when dry.", 3000),
("DriedSquid", "Dried Squid.jpg", "Dried shredded squid is a dried, shredded, seasoned, seafood product, made
 from squid, commonly found in coastal Asian countries, Russia, and Hawaii.", 15000),
("UdonNoodles", "Udon Noodles.jpg", "Udon is a type of thick, wheat-flour noodle used frequently in Japanese
 cuisine. It is often served hot as a noodle soup in its simplest form, as kake udon, in a mildly
  flavoured broth called kakejiru, which is made of dashi, soy sauce, and mirin. It is usually
   topped with thinly chopped scallions.", 3000),
("SobaNoodles", "Soba Noodles.jpg", "Soba is the Japanese name for buckwheat. It usually refers to thin noodles
 made from buckwheat flour, or a combination of buckwheat and wheat flours.", 10000),
("BlackberryJam", "Blackberry Jam.jpg", "Perfect to serve on toast or with an ice cream. Blackberries make 
scrumptious jam.", 11000),
("ApricotJam", "Apricot Jam.jpg", "A sweet preserve made from apricots.", 14000),
("Cumin", "Cumin.jpg", "The aromatic seeds of a plant of the parsley family, used as a spice, especially
 ground and used in curry powder.", 3000),
("Cinnamon", "Cinnamon.jpg", "An aromatic spice made from the peeled, dried, and rolled bark of a Southeast
 Asian tree.", 2800),
("AvocadoOil", "Avocado Oil.jpg", "Avocado oil is an edible oil pressed from the fruit of the Persea americana 
(avocado). As a food oil, it is used as an ingredient in other dishes, and as a cooking oil.", 12000),
("AlmondOil", "Almond Oil.jpg", "Almond oil may promote heart health, stabilize blood sugar levels, prevent free
 radical damage and help you maintain a healthy weight. What's more, the oil makes an excellent 
 moisturizer for both the skin and hair, and it may even help prevent stretch marks and protect 
 your skin from sun damage.", 14500),
("Popcorn",  "Popcorn.jpg", "Popcorn is a variety of corn kernel which expands and puffs up when heated;
 the same names are also used to refer to the foodstuff produced by the expansion.", 3000),
("Pretzel", "Pretzel.jpg", "DescriptionA pretzel, from dialectal German pronunciation, standard German:
 Breze is a type of baked pastry made from dough that is commonly shaped into a knot. ", 3500),
("Baguette", "Baguette.jpg", "A baguette is a long, thin loaf of French bread that is commonly made from
 basic lean dough. It is distinguishable by its length and crisp crust.", 4000),
("WhiteBread", "White Bread.jpg", "White bread typically refers to breads made from wheat flour from which
 the bran and the germ layers have been removed from the whole wheatberry as part of the flour
  grinding or milling process, producing a light-colored flour.", 4000),
("Melona", "Melona.jpg", "Melona is a South Korean flavored ice pop, manufactured by the Binggrae Co. Ltd.
 Although the product is called Melona and is identified by its melon flavor, the ice pop also
  comes in other fruit flavors.", 800),
("WorldCone", "World Cone.jpg", "An ice cream product made by Lotte Confectionery, is one of the best-selling
 Korean ice cream products of all time.", 1200),
("Skittles", "Skittles.jpg", "Skittles is a brand of fruit-flavored candy, currently produced and marketed by
 the Wrigley Company, a division of Mars, Inc. Skittles consist of hard sugar shells imprinted with
  the letter S.", 1500),
("Starburst", "Starburst.jpg", "Starburst is the brand name of a box-shaped, fruit-flavored soft taffy candy
 manufactured by The Wrigley Company, a subsidiary of Mars, Incorporated. Starburst has many different
  varieties, such as Tropical, Sour, FaveREDs, Very Berry, Superfruit Flavor, Summer Blast, 
  and Original.", 2000);


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



INSERT INTO Order_History (oid, total_price, total_quantity) VALUES 
(1, 49500, 4), -- blackberry, apricot, soba, almond
(2, 40000, 2), -- oyster*2
(3, 5100, 3), -- chichen thigh, chicken egg, banana milk
(4, 43000, 5), -- Salmon*2, sausage*2, beef chunk steak
(5, 41200, 10), -- latte*3, americao*5, almond oil, beef chunck steak 
(6, 9600, 10), -- Melona*6, world cone*4
(7, 13000, 7), -- skittles*2, starbust*2, fiji*3
(8, 30000, 3), -- salmon, scallop, udon noodles
(9, 44500, 7); -- blackberry jam, apricot jam, white bread*2, cinnamon, latte*3

/* Free over 40000 */
INSERT INTO Order_Shipping_Fee (total_price, delivery_charge) VALUES
(49500, 0),
(40000, 0),
(5100, 2000),
(43000, 0),
(41200, 0),
(9600, 2000),
(13000, 2000),
(30000, 2000),
(44500, 0)
;


INSERT INTO Shopping_Cart (sid, number_of_items) VALUES 
(1, 0),
(2, 0),
(3, 0),
(4, 0),
(5, 0)
;

INSERT INTO Belongs_to (productname, subcategory) VALUES 
("Fiji", "Water"),
("Samdasoo", "Water"),
("Sprite", "Soda"),
("Pepsi", "Soda"),
("Latte", "Coffee"),
("Americano", "Coffee"),
("PeppermintTea","Tea"),
("RooibosTea","Tea"),
("OrangeJuice", "Juice"),
("AppleJuice", "Juice"),
("StrawberryMilk", "Milk"),
("BananaMilk", "Milk"),
("BeefChuckSteak", "Beef"),
("BeefShortRibs", "Beef"),
("Bacon", "Pork"),
("Sausage", "Pork"),
("ChickenBreast", "Chicken"),
("ChickenThigh", "Chicken"),
("DuckEgg", "Eggs"),
("ChickenEgg", "Eggs"),
("Tuna", "Fish"),
("Salmon", "Fish"),
("Scallop", "Shellfish & Snails"),
("Oyster", "Shellfish & Snails"),
("Laver", "Dried Seafoods"),
("DriedSquid", "Dried Seafoods"),
("Popcorn", "Snacks"),
("Pretzel", "Snacks"),
("Baguette", "Bread"),
("WhiteBread", "Bread"),
("Melona", "Ice Cream"),
("WorldCone", "Ice Cream"),
("Skittles", "Candy"),
("Starburst", "Candy"),
("UdonNoodles", "Noodles"),
("SobaNoodles", "Noodles"),
("BlackberryJam", "Jams"),
("ApricotJam", "Jams"),
("Cumin", "Seasonings & Spices"),
("Cinnamon", "Seasonings & Spices"),
("AvocadoOil", "Oils"),
("AlmondOil", "Oils")
;

INSERT INTO Manages (username, sid) VALUES 
("kelly00", 1),
("mark99", 2),
("jean97", 3),
("kid", 4),
("sev", 5)
;


