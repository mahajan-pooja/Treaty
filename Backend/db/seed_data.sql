use `treaty`;
START TRANSACTION;

DELETE FROM `treaty`.`customerbusiness`;
DELETE FROM `treaty`.`businessoffer`;
DELETE FROM `treaty`.`businessdetail`;
DELETE FROM `treaty`.`userdetail`;
DELETE FROM `treaty`.`user`;

ALTER TABLE `treaty`.`user` AUTO_INCREMENT = 1;
ALTER TABLE `treaty`.`userdetail` AUTO_INCREMENT = 1;
ALTER TABLE `treaty`.`businessdetail` AUTO_INCREMENT = 1;
ALTER TABLE `treaty`.`businessoffer` AUTO_INCREMENT = 1;
ALTER TABLE `treaty`.`customerbusiness` AUTO_INCREMENT = 1;

-- insert script for user
INSERT INTO `treaty`.`user` (id, email, phonenumber, role, encryptedpassword, isactive)
    VALUES (1, 'test_1234@gmail.com','1234567890', 'Customer', 'test1234', 1);

INSERT INTO `treaty`.`user` (id, email, phonenumber, role, encryptedpassword, isactive)
    VALUES (2, 'poonam.6788@gmail.com','1234567890', 'Customer', 'test1234', 1);

INSERT INTO `treaty`.`user` (id, email, phonenumber, role, encryptedpassword, isactive)
    VALUES (3, 'koradepoona1008@students.itu.edu','1234567890', 'Customer', 'test1234', 1);

INSERT INTO `treaty`.`user` (id, email, phonenumber, role, encryptedpassword, isactive)
    VALUES (4, 'poojamahajan2092@gmail.com','1234567890', 'Business Owner', 'test1234', 1);

INSERT INTO `treaty`.`user` (id, email, phonenumber, role, encryptedpassword, isactive)
    VALUES (5, 'rajeshwaripatil09@gmail.com','1234567890', 'Business Owner', 'test1234', 1);

-- insert script for userdetail
INSERT INTO `treaty`.`userdetail` (id, userid, firstname, lastname, phonenumber, address1, city, state, country, zipcode, isactive)
    VALUES (1, 1, 'test1', 'test2', '1234567890', 'ITU1234', 'San Jose', 'CA', 'USA', '95134', 1);

INSERT INTO `treaty`.`userdetail` (id, userid, firstname, lastname, phonenumber, address1, city, state, country, zipcode, isactive)
    VALUES (2, 2, 'Poonam', 'Korade', '4242909770', '2711 N 1st St.', 'San Jose', 'CA', 'USA', '95134', 1);

INSERT INTO `treaty`.`userdetail` (id, userid, firstname, lastname, phonenumber, address1, city, state, country, zipcode, isactive)
    VALUES (3, 4, 'Pooja', 'Mahajan', '6072329877', '2565 N 1st St', 'San Jose', 'CA', 'USA', '95131', 1);

INSERT INTO `treaty`.`userdetail` (id, userid, firstname, lastname, phonenumber, address1, city, state, country, zipcode, isactive)
    VALUES (4, 5, 'Rajeshwari', 'Patil', '9096728817', '2077 N 1st St', 'San Jose', 'CA', 'USA', '95131', 1);

INSERT INTO `treaty`.`userdetail` (id, userid, firstname, lastname, phonenumber, address1, city, state, country, zipcode, isactive)
    VALUES (5, 3, 'Poonam', 'Mhaskar', '0987654321', 'ITU4321', 'San Jose', 'CA', 'USA', '95131', 1);

-- insert script for businessdetail

INSERT INTO `treaty`.`businessdetail` (id, userid, businessname, businesssector, address1, city, state, country, zipcode, latitude, longitude, isactive)
    VALUES (1, 4, 'Dennys', 'Restaurant', '2565 N 1st St', 'San Jose', 'CA', 'USA', '95131',37.384867,-121.927876, 1);

INSERT INTO `treaty`.`businessdetail` (id, userid, businessname, businesssector, address1, city, state, country, zipcode, latitude, longitude,isactive)
    VALUES (2, 5, 'Subway', 'Restaurant', '1095 E. Brokaw Road, Suite 60, Brokaw Commons', 'San Jose', 'CA', 'USA', '95131',37.383142,-121.897038, 1);

INSERT INTO `treaty`.`businessdetail` (id, userid, businessname, businesssector, address1, city, state, country, zipcode, latitude, longitude, isactive)
    VALUES (3, 5, 'Papaya', 'Retail', 'Great Mall, 447 Great Mall Dr', 'Milpitas', 'CA', 'USA', '95035',37.415738,-121.897412, 1);

INSERT INTO `treaty`.`businessdetail` (id, userid, businessname, businesssector, address1, city, state, country, zipcode, latitude, longitude, isactive)
    VALUES (4, 5, 'T-Mobile', 'Telecom', '1095 E Brokaw Rd 50', 'San Jose', 'CA', 'USA', '95131',37.383100,-121.896945, 0);

INSERT INTO `treaty`.`businessdetail` (id, userid, businessname, businesssector, address1, city, state, country, zipcode, latitude, longitude, isactive)
    VALUES (5, 5, 'Pizza Hut', 'Restaurant', '102 S Park Victoria Dr', 'Milpitas', 'CA', 'USA', '95035',37.434039,-121.883343, 1);

INSERT INTO `treaty`.`businessdetail` (id, userid, businessname, businesssector, address1, city, state, country, zipcode, latitude, longitude, isactive)
    VALUES (6, 5, 'Omega', 'Restaurant', '90 S Park Victoria Dr', 'Milpitas', 'CA', 'USA', '95035',37.434313,-121.883432, 1);
    
INSERT INTO `treaty`.`businessdetail` (id, userid, businessname, businesssector, address1, city, state, country, zipcode, latitude, longitude, isactive)
    VALUES (7, 5, 'Naan n Masala', 'Restaurant', '94 Dempsey Rd', 'Milpitas', 'CA', 'USA', '95035',37.433218,-121.885443, 1);  

INSERT INTO `treaty`.`businessdetail` (id, userid, businessname, businesssector, address1, city, state, country, zipcode, latitude, longitude, isactive)
    VALUES (8, 5, 'Hyderabad Dum Biryani', 'Restaurant', '55 Dempsey Rd', 'Milpitas', 'CA', 'USA', '95035',37.435230,-121.884775, 1);  

INSERT INTO `treaty`.`businessdetail` (id, userid, businessname, businesssector, address1, city, state, country, zipcode, latitude, longitude, isactive)
    VALUES (9, 5, 'Juanita''s Polynesian Delights', 'Restaurant', '36601 Newark Blvd #87', 'Newark', 'CA', 'USA', '94560',37.538941,-122.034422, 1);  



-- Ignore no long lat maintained.
INSERT INTO `treaty`.`businessdetail` (id, userid, businessname, businesssector, address1, city, state, country, zipcode, isactive)
    VALUES (9, 5, 'Bambu Dessert & Drinks', 'Restaurant', '89 S Park Victoria Dr', 'Milpitas', 'CA', 'USA', '95035', 1);
  
INSERT INTO `treaty`.`businessdetail` (id, userid, businessname, businesssector, address1, city, state, country, zipcode, isactive)
    VALUES (10, 5, 'Pho 909', 'Restaurant', '72 S Park Victoria Dr', 'Milpitas', 'CA', 'USA', '95035', 1);
    
INSERT INTO `treaty`.`businessdetail` (id, userid, businessname, businesssector, address1, city, state, country, zipcode, isactive)
    VALUES (11, 5, 'Golden Bakery', 'Restaurant', '30 S Park Victoria Dr', 'Milpitas', 'CA', 'USA', '95035', 1);    

INSERT INTO `treaty`.`businessdetail` (id, userid, businessname, businesssector, address1, city, state, country, zipcode, isactive)
    VALUES (12, 5, 'Victoria Laundry', 'Laundry', '60 S Park Victoria Dr', 'Milpitas', 'CA', 'USA', '95035', 1);  
    
INSERT INTO `treaty`.`businessdetail` (id, userid, businessname, businesssector, address1, city, state, country, zipcode, isactive)
    VALUES (13, 5, 'Nails L''Amour', 'Nail Salon', '49 S Park Victoria Dr', 'Milpitas', 'CA', 'USA', '95035', 1);  
 
INSERT INTO `treaty`.`businessdetail` (id, userid, businessname, businesssector, address1, city, state, country, zipcode, isactive)
    VALUES (14, 5, 'Karachi Cafe', 'Cafe', '74 Dempsey Rd', 'Milpitas', 'CA', 'USA', '95035', 1);  
    
INSERT INTO `treaty`.`businessdetail` (id, userid, businessname, businesssector, address1, city, state, country, zipcode, isactive)
    VALUES (15, 5, 'Milpitas Halal Market', 'Supermarket', '74 Dempsey Rd', 'Milpitas', 'CA', 'USA', '95035', 1);
    
INSERT INTO `treaty`.`businessdetail` (id, userid, businessname, businesssector, address1, city, state, country, zipcode, isactive)
    VALUES (16, 5, 'Savers', 'Thrift Store', '60 Dempsey Rd', 'Milpitas', 'CA', 'USA', '95035', 1);

INSERT INTO `treaty`.`businessdetail` (id, userid, businessname, businesssector, address1, city, state, country, zipcode, isactive)
    VALUES (17, 5, 'Organic Pisa', 'Restaurant', '106 Dempsey Rd', 'Milpitas', 'CA', 'USA', '95035', 1);
    
INSERT INTO `treaty`.`businessdetail` (id, userid, businessname, businesssector, address1, city, state, country, zipcode, isactive)
    VALUES (18, 5, 'Tina''s Hair Design', 'Beauty Salon', '31 S Park Victoria Dr', 'Milpitas', 'CA', 'USA', '95035', 1); 
    
INSERT INTO `treaty`.`businessdetail` (id, userid, businessname, businesssector, address1, city, state, country, zipcode, isactive)
    VALUES (19, 5, 'Oasis Acupuncture & Spa', 'Spa', '64 S Park Victoria D', 'Milpitas', 'CA', 'USA', '95035', 1);     
    
INSERT INTO `treaty`.`businessdetail` (id, userid, businessname, businesssector, address1, city, state, country, zipcode, isactive)
    VALUES (20, 5, 'Beyond Beauty', 'Beauty Salon', '96 S Park Victoria Dr', 'Milpitas', 'CA', 'USA', '95035', 1); 
    
INSERT INTO `treaty`.`businessdetail` (id, userid, businessname, businesssector, address1, city, state, country, zipcode, isactive)
    VALUES (21, 5, 'Ocean Supermarket', 'Supermarket', '2 S Park Victoria Dr', 'Milpitas', 'CA', 'USA', '95035', 1);     
-- ITU Location
INSERT INTO `treaty`.`businessdetail` (id, userid, businessname, businesssector, address1, city, state, country, zipcode, isactive)
    VALUES (22, 5, 'Thai Orchid', 'Restaurant', '2591 N 1st St', 'San Jose', 'CA', 'USA', '95131', 1);    
    
INSERT INTO `treaty`.`businessdetail` (id, userid, businessname, businesssector, address1, city, state, country, zipcode, isactive)
    VALUES (23, 5, 'Dish n Dash', 'Restaurant', '2551 N 1st St', 'San Jose', 'CA', 'USA', '95131', 1);     

INSERT INTO `treaty`.`businessdetail` (id, userid, businessname, businesssector, address1, city, state, country, zipcode, isactive)
    VALUES (24, 5, 'Olives Greek Cafe', 'Cafe', '2567 N 1st St', 'San Jose', 'CA', 'USA', '95131', 1);     
    
INSERT INTO `treaty`.`businessdetail` (id, userid, businessname, businesssector, address1, city, state, country, zipcode, isactive)
    VALUES (25, 5, 'Pho Viet', 'Restaurant', '2557 N 1st St', 'San Jose', 'CA', 'USA', '95131', 1);     
    
INSERT INTO `treaty`.`businessdetail` (id, userid, businessname, businesssector, address1, city, state, country, zipcode, isactive)
    VALUES (26, 5, 'Okayama Express', 'Restaurant', '2587 N 1st St', 'San Jose', 'CA', 'USA', '95131', 1);     
 
INSERT INTO `treaty`.`businessdetail` (id, userid, businessname, businesssector, address1, city, state, country, zipcode, isactive)
    VALUES (27, 5, 'Light Health Center', 'Spa', '2571 N 1st St', 'San Jose', 'CA', 'USA', '95131', 1);   
    
INSERT INTO `treaty`.`businessdetail` (id, userid, businessname, businesssector, address1, city, state, country, zipcode, isactive)
    VALUES (28, 5, 'Philly''s Cheesesteaks & Wings', 'Restaurant', '2561 N 1st St', 'San Jose', 'CA', 'USA', '95131', 1);   
    
INSERT INTO `treaty`.`businessdetail` (id, userid, businessname, businesssector, address1, city, state, country, zipcode, isactive)
    VALUES (29, 5, 'Una Mas Mexican Grill', 'Restaurant', '2559 N 1st St', 'San Jose', 'CA', 'USA', '95131', 1);   

INSERT INTO `treaty`.`businessdetail` (id, userid, businessname, businesssector, address1, city, state, country, zipcode, isactive)
    VALUES (30, 5, 'Biryani Stop', 'Restaurant', '2565 N 1st St', 'San Jose', 'CA', 'USA', '95131', 1);   
		
INSERT INTO `treaty`.`businessdetail` (id, userid, businessname, businesssector, address1, city, state, country, zipcode, isactive)
    VALUES (31, 5, 'Espressi', 'Restaurant', '2580 N 1st St #130', 'San Jose', 'CA', 'USA', '95131', 1);   

INSERT INTO `treaty`.`businessdetail` (id, userid, businessname, businesssector, address1, city, state, country, zipcode, isactive)
    VALUES (32, 5, 'Specialty''s Cafe & Bakery', 'Cafe', '2580 N 1st St', 'San Jose', 'CA', 'USA', '95131', 1);   
   
INSERT INTO `treaty`.`businessdetail` (id, userid, businessname, businesssector, address1, city, state, country, zipcode, isactive)
    VALUES (33, 5, 'Patxi''s Pizza', 'Cafe', '3350 Zanker Rd', 'San Jose', 'CA', 'USA', '95134', 1);   
   
INSERT INTO `treaty`.`businessdetail` (id, userid, businessname, businesssector, address1, city, state, country, zipcode, isactive)
    VALUES (34, 5, 'Round Table Pizza', 'Restaurant', '3730 N 1st St', 'San Jose', 'CA', 'USA', '95134', 1);   
    
INSERT INTO `treaty`.`businessdetail` (id, userid, businessname, businesssector, address1, city, state, country, zipcode, isactive)
    VALUES (35, 5, 'The Coffee Bean & Tea Leaf', 'Cafe', '4190 N 1st St', 'San Jose', 'CA', 'USA', '95134', 1);
 
 -- Pooja Location   
INSERT INTO `treaty`.`businessdetail` (id, userid, businessname, businesssector, address1, city, state, country, zipcode, isactive)
    VALUES (36, 4, 'Ramen Seas', 'Restaurant', '173 S Murphy Ave', 'Sunnyvale', 'CA', 'USA', '94086', 1);

INSERT INTO `treaty`.`businessdetail` (id, userid, businessname, businesssector, address1, city, state, country, zipcode, isactive)
    VALUES (37, 4, 'King Wah', 'Restaurant', '219 E Washington Ave', 'Sunnyvale', 'CA', 'USA', '94086', 1);

INSERT INTO `treaty`.`businessdetail` (id, userid, businessname, businesssector, address1, city, state, country, zipcode, isactive)
    VALUES (38, 4, 'Roberto''s Cantina', 'Restaurant', '168 S Murphy Ave', 'Sunnyvale', 'CA', 'USA', '94086', 1);

INSERT INTO `treaty`.`businessdetail` (id, userid, businessname, businesssector, address1, city, state, country, zipcode, isactive)
    VALUES (39, 4, 'Turmeric', 'Restaurant', '141 S Murphy Ave', 'Sunnyvale', 'CA', 'USA', '94086', 1);

INSERT INTO `treaty`.`businessdetail` (id, userid, businessname, businesssector, address1, city, state, country, zipcode, isactive)
    VALUES (40, 4, 'Coffee & More', 'Cafe', '100 S Murphy Ave #1', 'Sunnyvale', 'CA', 'USA', '94086', 1);

INSERT INTO `treaty`.`businessdetail` (id, userid, businessname, businesssector, address1, city, state, country, zipcode, isactive)
    VALUES (41, 4, 'Sansar Indian Cuisine', 'Restaurant', '1214 Apollo Way', 'Sunnyvale', 'CA', 'USA', '94085', 1);
        
INSERT INTO `treaty`.`businessdetail` (id, userid, businessname, businesssector, address1, city, state, country, zipcode, isactive)
    VALUES (42, 4, 'Happy Lemon', 'Cafe', '520 Lawrence Expy Ste 301', 'Sunnyvale', 'CA', 'USA', '94085', 1);
 
 -- Poonam Location
INSERT INTO `treaty`.`businessdetail` (id, userid, businessname, businesssector, address1, city, state, country, zipcode, isactive)
    VALUES (43, 3, 'Gong Cha', 'Restaurant', '1701 Lundy Ave', 'San Jose', 'CA', 'USA', '95131', 1);
 
 INSERT INTO `treaty`.`businessdetail` (id, userid, businessname, businesssector, address1, city, state, country, zipcode, isactive)
    VALUES (44, 3, 'Ma''s', 'Restaurant', '1715 Lundy Ave', 'San Jose', 'CA', 'USA', '95131', 1);
 
INSERT INTO `treaty`.`businessdetail` (id, userid, businessname, businesssector, address1, city, state, country, zipcode, isactive)
    VALUES (45, 3, 'Shanghai Garden', 'Restaurant', '1701 Lundy Ave', 'San Jose', 'CA', 'USA', '95131', 1);

INSERT INTO `treaty`.`businessdetail` (id, userid, businessname, businesssector, address1, city, state, country, zipcode, isactive)
    VALUES (46, 3, '99 Ranch Market', 'Supermarket', '1688 Hostetter Rd', 'San Jose', 'CA', 'USA', '95131', 1);
 
INSERT INTO `treaty`.`businessdetail` (id, userid, businessname, businesssector, address1, city, state, country, zipcode, isactive)
    VALUES (47, 3, 'A Word Floris', 'Florist', '1688 Hostetter Rd', 'San Jose', 'CA', 'USA', '95131', 1);

INSERT INTO `treaty`.`businessdetail` (id, userid, businessname, businesssector, address1, city, state, country, zipcode, isactive)
    VALUES (48, 3, 'Da Tang Foot Spa', 'Spa', '1688 Hostetter Rd', 'San Jose', 'CA', 'USA', '95131', 1);

INSERT INTO `treaty`.`businessdetail` (id, userid, businessname, businesssector, address1, city, state, country, zipcode, isactive)
    VALUES (49, 3, 'HK Hair & Beauty', 'Salon', '1715 Lundy Ave', 'San Jose', 'CA', 'USA', '95131', 1);


-- insert script for businessoffer
INSERT INTO `treaty`.`businessoffer` (id, userid, businessid, offername, offerdescription, creditedpoints, startdate, expirationdate, isactive)
    VALUES (1, 5, 4, 'Papaya-WINTER', '5 points per $ spent', 100, '2018-01-22', '2018-01-30',1);

INSERT INTO `treaty`.`businessoffer` (id, userid, businessid, offername, offerdescription, creditedpoints, startdate, expirationdate, isactive)
    VALUES (2, 5, 3, 'Subway-EATFREE', '1 point per $ spent', 20, '2018-01-23', '2018-02-25',1);

INSERT INTO `treaty`.`businessoffer` (id, userid, businessid, offername, offerdescription, creditedpoints, startdate, expirationdate, isactive)
    VALUES (3, 4, 2, 'Dennys-JIYO', '50 points per $ spent', 200, '2018-01-25', '2018-04-30',1);

-- insert script for customeroffer
INSERT INTO `treaty`.`customerbusiness` (id, userid, businessid, isactive)
    VALUES (1, 2, 4, 0);

INSERT INTO `treaty`.`customerbusiness` (id, userid, businessid, isactive)
    VALUES (2, 3, 3, 1);

INSERT INTO `treaty`.`customerbusiness` (id, userid, businessid, isactive)
    VALUES (3, 2, 2, 1);

COMMIT;
