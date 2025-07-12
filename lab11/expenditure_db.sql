CREATE DATABASE IF NOT EXISTS expenditure_db;
USE expenditure_db;

CREATE TABLE domestic_visitors (
    id INT AUTO_INCREMENT PRIMARY KEY,
    component VARCHAR(100) NOT NULL,
    year2010 DECIMAL(10,2) NOT NULL,
    year2011 DECIMAL(10,2) NOT NULL
);

CREATE TABLE domestic_tourists (
    id INT AUTO_INCREMENT PRIMARY KEY,
    component VARCHAR(100) NOT NULL,
    year2010 DECIMAL(10,2) NOT NULL,
    year2011 DECIMAL(10,2) NOT NULL
);

INSERT INTO domestic_tourists (component, year2010, year2011) VALUES
('Food & beverages', 6448, 7756),
('Transport', 6220, 7417),
('Accommodation', 6096, 4985),
('Shopping', 2603, 3801),
('Expenditure before the trip', 595, 801),
('Other activities', 1722, 2249);

INSERT INTO domestic_visitors (component, year2010, year2011) VALUES
('Shopping', 8914, 13149),
('Transport', 8098, 10019),
('Food & beverages', 7975, 9691),
('Accommodation', 6130, 5028),
('Expenditure before the trip', 894, 1097),
('Other activities', 2667, 3362);