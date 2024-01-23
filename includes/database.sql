DROP DATABASE kiryan_bv;
CREATE DATABASE kiryan_bv;

USE kiryan_bv;

CREATE TABLE admins (
    id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(30) UNIQUE,
    password VARCHAR(255)
);

INSERT INTO admins (username, password) VALUES ('admin', '$2y$10$AMux3z.fgceF2zQualXc0..AdVsXo6Q8LjwQBklc6JAPfUtsLqfhO');

CREATE TABLE customers (
    id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    email VARCHAR(255),
    password VARCHAR(255),
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE materials (
    id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) UNIQUE,
    description text,
    added DATETIME DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE categories (
    id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) UNIQUE,
    description text,
    added DATETIME DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE pickup_dates (
    id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    date DATE DEFAULT (CURRENT_DATE)
);

CREATE TABLE products (
    id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) UNIQUE,
    description text,
    image VARCHAR(255),
    price DECIMAL(10, 2),
    unit varchar(100),
    material_id BIGINT UNSIGNED,
    category_id BIGINT UNSIGNED,
    stock MEDIUMINT,
    available BOOLEAN,
    added_at DATETIME DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (material_id) REFERENCES materials(id),
    FOREIGN KEY (category_id) REFERENCES categories(id)
);

INSERT INTO materials (name, description) VALUES ('Marmer', 'Een witte steensoort met strepen');
INSERT INTO materials (name, description) VALUES ('Graniet', 'Een grijze steensoort met veel textuur');
INSERT INTO materials (name, description) VALUES ('Keramiek', 'Een gebakken aardewerk met een glazuurlaag');

INSERT INTO categories (name, description) VALUES ('Stenen tegels (buiten en binnen)', 'Deze stenen tegels zijn geschikt voor buiten en binnen.');
INSERT INTO categories (name, description) VALUES ('Wasbakken', 'Een wasbak voor onder een kraan');

INSERT INTO products (name, description, price, unit, material_id, category_id, stock, available)
VALUES ('Stenen tegels van marmer', 'Stenen tegels 24x40cm x kg / m² x dik', 40.50, 'm²', 1, 1, 80, 1);

INSERT INTO products (name, description, price, unit, material_id, category_id, stock, available)
VALUES ('Stenen tegels van graniet', 'Stenen tegels 24x40cm y kg / m² y mm dik', 30.50, 'm²', 2, 1, 80, 1);

INSERT INTO products (name, description, price, unit, material_id, category_id, stock, available)
VALUES ('Keramieke wasbak', 'Witte wasbak van keramiet kleur: x, gewicht: x, x, x, x, y, g', 30.50, 'm²', 3, 2, 80, 1);

CREATE TABLE reservations (
    id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    customer_id BIGINT UNSIGNED,
    pickup_date_id BIGINT UNSIGNED,
    pickup_completed BOOLEAN DEFAULT FALSE,
    FOREIGN KEY (customer_id) REFERENCES customers(id),
    FOREIGN KEY (pickup_date_id) REFERENCES pickup_dates(id)
);

CREATE TABLE shopping_cart_items (
    customer_id BIGINT UNSIGNED,
    product_id BIGINT UNSIGNED,
    quantity SMALLINT UNSIGNED,
    added_at DATETIME DEFAULT (CURRENT_DATE),
    reservation_id BIGINT UNSIGNED,
    FOREIGN KEY (product_id) REFERENCES products(id),
    FOREIGN KEY (customer_id) REFERENCES customers(id),
    FOREIGN KEY (reservation_id) REFERENCES reservations(id)
);