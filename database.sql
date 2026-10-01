CREATE DATABASE IF NOT EXISTS data_pegawai;
USE data_pegawai;

CREATE TABLE IF NOT EXISTS pegawai (
    id INT(11) AUTO_INCREMENT PRIMARY KEY,
    nama VARCHAR(100) NOT NULL,
    jenis_kelamin ENUM('Laki-laki', 'Perempuan') NOT NULL,
    pendidikan_terakhir VARCHAR(50) NOT NULL,
    usia INT(3) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Insert data
INSERT INTO pegawai (nama, jenis_kelamin, pendidikan_terakhir, usia) VALUES
('Budi Santoso', 'Laki-laki', 'S1', 28),
('Siti Aminah', 'Perempuan', 'D3', 25),
('Andi Wijaya', 'Laki-laki', 'SMA', 22),
('Rina Marlina', 'Perempuan', 'S1', 30),
('Joko Anwar', 'Laki-laki', 'S2', 35);

-- Table for users (login)
CREATE TABLE IF NOT EXISTS users (
    id INT(11) AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Insert default admin user
INSERT INTO users (username, password) VALUES
('23081010006', '$2y$10$NnPN7uOUqDfNMrfI/nPuG.MH8oKraAfls/U7o3LjF9m4JKTGNVxtG');
