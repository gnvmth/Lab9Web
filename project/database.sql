CREATE DATABASE IF NOT EXISTS db_latihan CHARACTER SET utf8mb4;
USE db_latihan;

CREATE TABLE IF NOT EXISTS users (
    id         INT AUTO_INCREMENT PRIMARY KEY,
    nama       VARCHAR(100) NOT NULL,
    email      VARCHAR(150) NOT NULL UNIQUE,
    jurusan    VARCHAR(100) NULL,
    alamat     TEXT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

INSERT INTO users (nama, email, jurusan, alamat) VALUES
('Rina Putri',  'rina.putri@gmail.com',  'Teknik Informatika', 'Jl. Merdeka No. 10, Cikarang, Bekasi, Jawa Barat'),
('Budi Santoso','budi.santoso@gmail.com',  'Sistem Informasi',   'Jl. Raya Industri No. 5, Cikarang'),
('Sari Dewi',   'sari.dewi@gmail.com',  'Teknik Informatika', 'Perumahan Griya Asri Blok C2, Bekasi');
