
DROP DATABASE IF EXISTS boarding_house;
CREATE DATABASE boarding_house;
USE boarding_house;

CREATE TABLE rooms (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(50) NOT NULL,
    price INT NOT NULL,
    status TINYINT(1) DEFAULT 0
);


INSERT INTO rooms (name, price, status) VALUES ('Phòng A101', 2500000, 1);
INSERT INTO rooms (name, price, status) VALUES ('Phòng B202', 3000000, 0);
INSERT INTO rooms (name, price, status) VALUES ('Phòng C303', 3500000, 1);


CREATE TABLE tenants (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    phone VARCHAR(20),
    email VARCHAR(255),
    room_id INT,
    start_date DATE,
    end_date DATE,
    FOREIGN KEY (room_id) REFERENCES rooms(id)
);

INSERT INTO tenants (name, phone, email, room_id, start_date, end_date) VALUES ('Nguyễn Văn A', '0987654321', 'nguyenvana@example.com', 1, '2023-01-01', '2023-12-31');
INSERT INTO tenants (name, phone, email, room_id, start_date, end_date) VALUES ('Trần Thị B', '0912345678', 'tranthib@example.com', 2, '2023-02-01', '2023-11-30');
INSERT INTO tenants (name, phone, email, room_id, start_date, end_date) VALUES ('Lê Văn C', '0901234567', 'levanc@example.com', 3, '2023-03-01', '2023-10-31');


CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    email VARCHAR(100) UNIQUE NOT NULL,
    password VARCHAR(255) NOT NULL,
    role ENUM('admin', 'staff', 'tenant') NOT NULL DEFAULT 'tenant',
    phone VARCHAR(20) NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
