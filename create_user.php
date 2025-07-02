<?php
// Load konfigurasi database CodeIgniter
require 'app/Config/Database.php';

$db = \Config\Database::connect();

$username = 'admin';
$password = password_hash('admin123', PASSWORD_DEFAULT);

$sql = "INSERT INTO users (username, password) VALUES (?, ?)";
$db->query($sql, [$username, $password]);

echo "User admin berhasil dibuat\n";
