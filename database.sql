
DROP DATABASE IF EXISTS boarding_house;
CREATE DATABASE boarding_house;
USE boarding_house;

CREATE TABLE rooms (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    price DECIMAL(10,2) NOT NULL,
    status ENUM('trong', 'dang_thue', 'dang_sua') NOT NULL DEFAULT 'trong',
    area FLOAT NOT NULL,
    max_people INT NOT NULL,
    furniture TEXT,
    image VARCHAR(255) NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);


INSERT INTO rooms (name, price, status, area, max_people, furniture, image) VALUES ('Phòng 1', 1000000, 'trong', 20, 2, 'Giường, tủ, bàn, ghế', 'room1.jpg');
INSERT INTO rooms (name, price, status, area, max_people, furniture, image) VALUES ('Phòng 2', 1500000, 'trong', 25, 3, 'Giường, tủ, bàn, ghế', 'room2.jpg');
INSERT INTO rooms (name, price, status, area, max_people, furniture, image) VALUES ('Phòng 3', 2000000, 'trong', 30, 4, 'Giường, tủ, bàn, ghế', 'room3.jpg');
INSERT INTO rooms (name, price, status, area, max_people, furniture, image) VALUES ('Phòng 4', 2500000, 'trong', 35, 5, 'Giường, tủ, bàn, ghế', 'room4.jpg');


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
