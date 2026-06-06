CREATE DATABASE IF NOT EXISTS `uas_db`
    DEFAULT CHARACTER SET utf8mb4
    COLLATE utf8mb4_unicode_ci;

USE `uas_db`;

CREATE TABLE IF NOT EXISTS admin (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL
);

CREATE TABLE IF NOT EXISTS berita (
    id INT AUTO_INCREMENT PRIMARY KEY,
    judul VARCHAR(255) NOT NULL,
    isi TEXT NOT NULL,
    gambar VARCHAR(255) DEFAULT NULL,
    kategori VARCHAR(100) NOT NULL DEFAULT 'Technology',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

INSERT INTO admin (username, password)
VALUES ('admin', MD5('admin123'))
ON DUPLICATE KEY UPDATE username = VALUES(username);

INSERT INTO berita (judul, isi, gambar, kategori) VALUES
('AI Mengubah Cara Kerja Media Digital', 'Perkembangan AI membuat proses produksi, kurasi, dan distribusi berita menjadi semakin cepat dan adaptif.', 'ai.jpg', 'AI'),
('Tren Teknologi Cloud untuk Aplikasi Web', 'Cloud computing membantu aplikasi modern berjalan lebih stabil, mudah diskalakan, dan siap dideploy otomatis.', 'tech.jpg', 'Technology'),
('Futuristic News Platform Mulai Populer', 'Platform berita dengan tampilan modern semakin diminati karena memberikan pengalaman membaca yang lebih interaktif.', 'trend.jpg', 'Trending');
