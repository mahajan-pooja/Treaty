select * from user;

select * from userdetail;

select * from businessdetail;
SELECT businessname, businesssector, address1, address2, city, state, country, zipcode FROM businessdetail WHERE id=21;
UPDATE businessdetail 
SET businessname="walmart", businesssector="retail", address1="60 pikes descanso", city="la", state="ca", zipcode="1111", modified=sysdate() 
WHERE userid=22;

SELECT id,firstname,lastname, phonenumber, address1, address2, city, state, country, zipcode FROM userdetail WHERE userid="1";
select * from businesssector;
select * from businessoffer;

desc businessoffer;
select * from customerbusiness;

desc userdetail;

INSERT INTO `treaty`.`user` (id, email, role, encryptedpassword, isactive)
    VALUES (6, 'ituguest@gmail.com', 'Customer', ENCODE('test1234', 'secret'), 1);
    
select  DECODE(`encryptedpassword`, 'secret') as encryptedpassword from user;

-- SELECT role FROM user where email="test_1234@gmail.com" and encrypted_password="test1234";

-- INSERT INTO user (email,role,encrypted_password) VALUES ("test_12345@gmail.com","Customer","test12345") ;

-- UPDATE user SET encrypted_password="CqxPWJi5" WHERE email="test_1234@gmail.com";

INSERT INTO user (email,role,encryptedpassword) VALUES ("test_123@gmail.com","Customer","test_123");
INSERT INTO userdetail(userid, firstname, lastname, phonenumber, address1, address2, city, state, country, zipcode, modified, created) VALUES ("1","Tushar","Mhaskar","1234567890","1433 Cedarmeadow Ct","#1433" ,"San Jose","California","United States","95131", sysdate(), sysdate());
INSERT INTO businessdetail(userid, businessname, businesssector, address1, address2, city, state, country, zipcode, modified, created) VALUES ("6","Subway","Food","5 Saurabh Apt, Mahatma Phule Road, Arunodaya Society, Arunodaya Society","Arunodaya Society" ,"Dombivli","Swami Vivekanand School(Arunodaya)","India","421202", sysdate(), sysdate());

SELECT id, businessname, businesssector, address1, city
            	 		  FROM businessdetail
            			  WHERE userid=7
                          LIMIT 1;
                          
delete from userdetail where id=11;

SELECT bd.businessname, bd.businesssector
				  FROM businessdetail bd , businessoffer bo
				  WHERE bd.id = bo.businessid and bd.isactive=1 and bo.isactive=1
				  GROUP BY bd.businessname, bd.businesssector;
                  
                  
  SELECT bd.businessname, bd.businesssector, bo.offerdescription, bo.creditedpoints
			  FROM businessdetail bd , businessoffer bo
			  WHERE bd.id = bo.businessid and bd.isactive=1 and bo.isactive=1
			  GROUP BY bd.businessname, bd.businesssector, bo.offerdescription, bo.creditedpoints;
	select earnedpoints, businessname from customerbusiness cb, businessdetail bd  where cb.businessid=bd.id and cb.userid=2;
commit;


-- Location Query:
SELECT id,businessname,businesssector,address1,address2,city,state,country,zipcode,isactive, round(( 3959 * acos( cos( radians(37.437041) ) * cos( radians( latitude ) ) * cos( radians( longitude ) - radians(-121.878849) ) + sin( radians(37.437041) ) * sin( radians( latitude ) ) ) ),1) AS distance 
FROM treaty.businessdetail WHERE businesssector = "Restaurant" HAVING distance < 8 ORDER BY distance LIMIT 0 , 20;

-- business sector name and business detail table
use `treaty`;
SELECT a.businessname, b.businesssector, a.address1, a.address2, a.city, a.state, a.country, a.zipcode,a.businessphonenumber, a.businessimage
						  FROM businessdetail as a
                          JOIN businesssector as b
                          ON a.businesssector = b.id
						  WHERE a.id=4;
                          
SELECT a.businessname, b.businesssectortext FROM businessdetail as a JOIN businesssector as b ON a.businesssector = b.id WHERE userid=5 LIMIT 1;

-- All busi
SELECT DISTINCT a.userid,a.businessname,b.businesssectortext,a.businessimage FROM businessdetail as a JOIN businesssector as b ON a.businesssector = b.id GROUP BY userid; 

-- All offers
SELECT userid ,offername,offerdescription,startdate,expirationdate FROM businessoffer ORDER BY userid;

-- All cities
SELECT DISTINCT userid ,city FROM businessdetail ORDER BY userid;


-- Not used
SELECT a. userid ,a.businessname,c.businesssectortext,a.businessimage,a.businessdescription, b.offername,b.offerdescription, b.startdate, b.expirationdate
FROM businessdetail as a JOIN businessoffer as b  ON a.userid = b.userid INNER JOIN businesssector as c ON a.businesssector = c.id GROUP BY offername ORDER BY userid; 

SELECT DISTINCT a.userid,a.businessname,b.businesssectortext,a.businessimage,a.businessdescription 
			FROM businessdetail as a JOIN businesssector as b 
			ON a.businesssector = b.id 
			GROUP BY userid 
			ORDER BY userid;

select * from businessdetail;

Select phonenumber,businessname,email from user u,businessdetail b 
		where  u.id =14 and b.userid=15;
                    
INSERT INTO customerbusiness(userid, businessid,earnedpoints, redeemedpoints, balance, isactive, modified, created) 
VALUES ("14","15", 20, 0, 20, 1, sysdate(), sysdate());

describe customerbusiness;
describe businessoffer;
SELECT * FROM BUSINESSOFFER;