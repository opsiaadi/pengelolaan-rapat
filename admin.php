<?php
require "koneksi.php";

// Admin default
$username = "admin";
$password = "ROLEadmin@123";
$role     = "admin";

$cek = $conn->prepare("SELECT * FROM user WHERE username = ? LIMIT 1");
$cek->bind_param("s", $username);
$cek->execute();
$cekRes = $cek->get_result();

if ($cekRes->num_rows > 0) {
    die("Admin sudah ada!");
}

$hash = password_hash($password, PASSWORD_DEFAULT);

$stmt = $conn->prepare("INSERT INTO user (username, password, role) VALUES (?, ?, ?)");
$stmt->bind_param("sss", $username, $hash, $role);

if ($stmt->execute()) {
    echo "Admin berhasil dibuat!<br>";
    echo "Username: admin<br>Password: Admin@123";
} else {
    echo "Gagal membuat admin: " . $conn->error;
}
?>
