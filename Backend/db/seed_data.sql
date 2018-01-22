use `treaty`;
START TRANSACTION;

DELETE FROM `treaty`.`user`;
    
ALTER TABLE `treaty`.`user` AUTO_INCREMENT = 1;

INSERT INTO `treaty`.`user` (id, email, role, encrypted_password, isactive, modifiedby, createdby)
    VALUES (1, 'test_1234@gmail.com', 'Customer', 'test1234', 1, 1, 1);
    
    
COMMIT;