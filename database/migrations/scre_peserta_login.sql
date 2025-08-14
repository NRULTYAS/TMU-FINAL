CREATE TABLE scre_peserta_login (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(100) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    nama_lengkap VARCHAR(150),
    email VARCHAR(150),
    no_hp VARCHAR(20),
    tanggal_lahir DATE,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Contoh data peserta
INSERT INTO scre_peserta_login (username, password, nama_lengkap, email, no_hp, tanggal_lahir) VALUES
('peserta1', MD5('password1'), 'Peserta Satu', 'peserta1@email.com', '081234567890', '1990-01-01'),
('peserta2', MD5('password2'), 'Peserta Dua', 'peserta2@email.com', '081234567891', '1992-02-02');
