select * from user;

SELECT role FROM user where email="test_1234@gmail.com" and encrypted_password="test1234";

INSERT INTO user (email,role,encrypted_password) VALUES ("test_12345@gmail.com","Customer","test12345") ;

UPDATE user SET encrypted_password="CqxPWJi5" WHERE email="test_1234@gmail.com" 