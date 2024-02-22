CREATE DATABASE registration_form;
USE registration_form;

CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255),
    email VARCHAR(255),
    mobile_number BIGINT(10),
    mobile_code INT(),
    profession VARCHAR(1),
    related_to_iwsa BOOLEAN,
    payment_method VARCHAR(1),
    qr_code_path VARCHAR(255)
);