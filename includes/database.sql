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
                           name VARCHAR(100),
                           description text,
                           added DATETIME DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE categories (
                            id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
                            name VARCHAR(100),
                            description text,
                            added DATETIME DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE pickup_dates (
                              id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
                              date DATE DEFAULT (CURRENT_DATE)
);

CREATE TABLE products (
                          id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
                          name VARCHAR(255),
                          description text,
                          image VARCHAR(255),
                          price DECIMAL(10, 2),
                          material_id BIGINT UNSIGNED,
                          category_id BIGINT UNSIGNED,
                          stock MEDIUMINT,
                          available BOOLEAN,
                          added_at DATETIME DEFAULT CURRENT_TIMESTAMP,
                          FOREIGN KEY (material_id) REFERENCES materials(id),
                          FOREIGN KEY (category_id) REFERENCES categories(id)
);

CREATE TABLE reservations (
                              id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
                              customer_id BIGINT UNSIGNED,
                              pickup_date_id BIGINT UNSIGNED,
                              pickup_completed BOOLEAN DEFAULT FALSE,
                              FOREIGN KEY (customer_id) REFERENCES customers(id),
                              FOREIGN KEY (pickup_date_id) REFERENCES pickup_dates(id)
);

CREATE TABLE shopping_cart_items (
                                     customer_id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
                                     product_id BIGINT UNSIGNED,
                                     quantity SMALLINT UNSIGNED,
                                     added_at DATETIME DEFAULT (CURRENT_DATE),
                                     reservation_id BIGINT UNSIGNED,
                                     FOREIGN KEY (product_id) REFERENCES products(id),
                                     FOREIGN KEY (customer_id) REFERENCES customers(id),
                                     FOREIGN KEY (reservation_id) REFERENCES reservations(id)
);