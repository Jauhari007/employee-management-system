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

-- Insert dummy data
INSERT INTO pegawai (nama, jenis_kelamin, pendidikan_terakhir, usia) VALUES
('Budi Santoso', 'Laki-laki', 'S1', 28),
('Siti Aminah', 'Perempuan', 'D3', 25),
('Andi Wijaya', 'Laki-laki', 'SMA', 22),
('Rina Marlina', 'Perempuan', 'S1', 30),
('Joko Anwar', 'Laki-laki', 'S2', 35);
