CREATE TABLE rooms (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(50) NOT NULL,
    price INT NOT NULL,
    status TINYINT(1) DEFAULT 0
);


INSERT INTO rooms (name, price, status) VALUES ('Phòng A101', 2500000, 1);
INSERT INTO rooms (name, price, status) VALUES ('Phòng B202', 3000000, 0);
INSERT INTO rooms (name, price, status) VALUES ('Phòng C303', 3500000, 1);