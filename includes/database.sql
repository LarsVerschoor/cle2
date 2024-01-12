CREATE DATABASE kiryan_bv;

CREATE TABLE admins (
                        id BIGINT UNSIGNED AUTO_INCREMENT,
                        username VARCHAR(30) UNIQUE,
                        password VARCHAR(255)
);

INSERT INTO admins (username, password) VALUES ('admin', 'admin');