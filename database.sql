
DROP DATABASE IF EXISTS boarding_house;
CREATE DATABASE boarding_house;
USE boarding_house;


-- Bảng Khu Trọ
CREATE TABLE dormitories (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    address VARCHAR(255) NOT NULL,
    owner_id INT NOT NULL,  -- Người quản lý khu trọ
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

INSERT INTO dormitories (name, address, owner_id) VALUES ('Khu trọ A', '123 Đường ABC, Quận 1, TP.HCM', 1);
INSERT INTO dormitories (name, address, owner_id) VALUES ('Khu trọ B', '456 Đường XYZ, Quận 2, TP.HCM', 2);
INSERT INTO dormitories (name, address, owner_id) VALUES ('Khu trọ C', '789 Đường LMN, Quận 3, TP.HCM', 3);

-- Bảng Phòng
CREATE TABLE rooms (
    id INT AUTO_INCREMENT PRIMARY KEY,
    hostel_id INT NOT NULL,  -- Thuộc khu trọ nào
    name VARCHAR(100) NOT NULL, -- Tên phòng
    area FLOAT NOT NULL,  -- Diện tích m²
    price DECIMAL(10,2) NOT NULL,  -- Giá thuê
    max_people INT NOT NULL,  -- Số người tối đa
    status ENUM('available', 'rented', 'reserved') DEFAULT 'available',
    description TEXT,
    FOREIGN KEY (hostel_id) REFERENCES dormitories(id) ON DELETE CASCADE
);

INSERT INTO rooms (hostel_id, name, area, price, max_people, status, description) VALUES (1, 'Phòng 101', 20, 2000000, 2, 'available', 'Phòng đẹp, thoáng mát');
INSERT INTO rooms (hostel_id, name, area, price, max_people, status, description) VALUES (1, 'Phòng 102', 25, 2500000, 3, 'available', 'Phòng rộng rãi, sạch sẽ');
INSERT INTO rooms (hostel_id, name, area, price, max_people, status, description) VALUES (1, 'Phòng 103', 30, 3000000, 4, 'available', 'Phòng lớn, có ban công');


CREATE TABLE tenants (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(50) NOT NULL,
    phone VARCHAR(20),
    email VARCHAR(255)
);

INSERT INTO tenants (name, phone, email) VALUES ('Nguyen Van A', '0901234567', 'nguyenvana@example.com');
INSERT INTO tenants (name, phone, email) VALUES ('Tran Thi B', '0902345678', 'tranthib@example.com');
INSERT INTO tenants (name, phone, email) VALUES ('Le Van C', '0903456789', 'levanc@example.com');

-- Bảng Hợp Đồng Thuê
CREATE TABLE contracts (
    id INT AUTO_INCREMENT PRIMARY KEY,
    room_id INT NOT NULL,
    tenant_id INT NOT NULL,
    start_date DATE NOT NULL,
    end_date DATE NOT NULL,
    deposit DECIMAL(10,2) NOT NULL, -- Tiền cọc
    deposit_received DECIMAL(10,2) NOT NULL DEFAULT 0, -- Tiền cọc đã nhận
    deposit_returned DECIMAL(10,2) NOT NULL DEFAULT 0, -- Tiền cọc đã trả
    deposit_received_at TIMESTAMP, -- Thời gian nhận tiền cọc
    deposit_returned_at TIMESTAMP, -- Thời gian trả tiền cọc
    rent_price DECIMAL(10,2) NOT NULL, -- Giá thuê
    -- chu kỳ thanh toán: 1: hàng tháng, 3: hàng quý, 6: hàng 6 tháng, 12: hàng năm
    payment_cycle ENUM('monthly', 'quarterly', 'half_yearly', 'yearly') DEFAULT 'monthly',
    -- ngày thanh toán trong chu kỳ
    payment_day INT DEFAULT 1, -- Mặc định là ngày đầu tiên
    status ENUM('pending', 'active', 'expired', 'terminated') DEFAULT 'pending', -- Trạng thái hợp đồng
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (room_id) REFERENCES rooms(id) ON DELETE CASCADE,
    FOREIGN KEY (tenant_id) REFERENCES tenants(id) ON DELETE CASCADE
);

INSERT INTO contracts (room_id, tenant_id, start_date, end_date, deposit, deposit_received, deposit_returned, deposit_received_at, deposit_returned_at, rent_price, payment_cycle, payment_day, status) 
VALUES (1, 1, '2023-01-01', '2023-12-31', 2000000, 2000000, 0, '2023-01-01 10:00:00', NULL, 2000000, 'monthly', 1, 'active');

INSERT INTO contracts (room_id, tenant_id, start_date, end_date, deposit, deposit_received, deposit_returned, deposit_received_at, deposit_returned_at, rent_price, payment_cycle, payment_day, status) 
VALUES (2, 2, '2023-02-01', '2023-12-31', 2500000, 2500000, 0, '2023-02-01 10:00:00', NULL, 2500000, 'monthly', 1, 'active');

INSERT INTO contracts (room_id, tenant_id, start_date, end_date, deposit, deposit_received, deposit_returned, deposit_received_at, deposit_returned_at, rent_price, payment_cycle, payment_day, status) 
VALUES (3, 3, '2023-03-01', '2023-12-31', 3000000, 3000000, 0, '2023-03-01 10:00:00', NULL, 3000000, 'monthly', 1, 'active');
-- Bảng Người Dùng
CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    email VARCHAR(100) UNIQUE NOT NULL,
    password VARCHAR(255) NOT NULL,
    role ENUM('admin', 'staff', 'tenant') NOT NULL DEFAULT 'tenant',
    phone VARCHAR(20) NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Bảng Đăng Nhập
CREATE TABLE logins (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT NOT NULL,
    login_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE
);