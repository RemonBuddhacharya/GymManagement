-- user - id - auto increment - username - password - phone number - address - email optional - full name
DROP DATABASE IF EXISTS gym;
CREATE DATABASE gym;
USE gym;
-- Create Staff table
CREATE TABLE Staff (
    staff_id INT AUTO_INCREMENT PRIMARY KEY,
    first_name VARCHAR(50) NOT NULL,
    last_name VARCHAR(50) NOT NULL,
    email VARCHAR(100) UNIQUE NOT NULL,
    phone_number VARCHAR(20),
    role ENUM('admin', 'manager', 'trainer', 'receptionist') NOT NULL
);
-- Create Members table
CREATE TABLE Members (
    member_id INT AUTO_INCREMENT PRIMARY KEY,
    first_name VARCHAR(50) NOT NULL,
    last_name VARCHAR(50) NOT NULL,
    email VARCHAR(100) UNIQUE NOT NULL,
    phone_number VARCHAR(20),
    address VARCHAR(255),
    membership_start_date DATE NOT NULL,
    membership_end_date DATE NOT NULL,
    status ENUM('active', 'inactive', 'suspended') NOT NULL
);
-- Create Users table
CREATE TABLE Users (
    user_id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(100) UNIQUE NOT NULL,
    password VARCHAR(255) NOT NULL,
    role ENUM('admin', 'staff', 'member') NOT NULL,
    member_id INT,
    staff_id INT,
    FOREIGN KEY (member_id) REFERENCES Members(member_id),
    FOREIGN KEY (staff_id) REFERENCES Staff(staff_id)
);
-- Insert dummy staff data
INSERT INTO Staff (first_name, last_name, email, phone_number, role)
VALUES (
        'Remon',
        'Buddhacharya',
        'remon@example.com',
        '1234567890',
        'admin'
    );
-- Insert dummy member data
INSERT INTO Members (
        first_name,
        last_name,
        email,
        phone_number,
        address,
        membership_start_date,
        membership_end_date,
        status
    )
VALUES (
        'Rijan',
        'Bajracharya',
        'rijan@example.com',
        '9876543210',
        '123 Street, City',
        '2024-04-07',
        '2025-04-07',
        'active'
    );
-- Insert dummy user data
INSERT INTO Users (username, password, role, member_id, staff_id)
VALUES (
        'remon',
        'password',
        'admin',
        NULL,
        1
    );
-- Assuming staff_id for Remon is 1
INSERT INTO Users (username, password, role, member_id, staff_id)
VALUES (
        'rijan',
        'password',
        'member',
        1,
        NULL
    );
-- Assuming member_id for Rijan is 1