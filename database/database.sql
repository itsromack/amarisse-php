CREATE TABLE IF NOT EXISTS users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(30) UNIQUE NOT NULL,
    `password` VARCHAR(255) NOT NULL,
    `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE IF NOT EXISTS jobs (
    id BIGINT AUTO_INCREMENT PRIMARY KEY,
    position VARCHAR(255) NOT NULL,
    description TEXT NOT NULL,
    minimum_years_xp TINYINT DEFAULT 0,
    company VARCHAR(100) NOT NULL,
    company_address VARCHAR(255) NOT NULL,
    salary_from DOUBLE(9,2) DEFAULT NULL,
    salary_to DOUBLE(9,2) DEFAULT NULL,
    is_internship TINYINT DEFAULT 0,
    `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    created_by INT DEFAULT NULL
);