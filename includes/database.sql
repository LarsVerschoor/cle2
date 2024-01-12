CREATE DATABASE kiryan_bv;

USE kiryan_bv;

CREATE TABLE admins (
                        id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
                        username VARCHAR(30) UNIQUE,
                        password VARCHAR(255)
);

INSERT INTO admins (username, password) VALUES ('admin', '$2y$10$AMux3z.fgceF2zQualXc0..AdVsXo6Q8LjwQBklc6JAPfUtsLqfhO');
