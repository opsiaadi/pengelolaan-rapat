<?php
session_start();

// Koneksi langsung dari login.php ke database
$host = "localhost";
$user = "root";
$pass = "";
$db   = "manajemenrapat";

$conn = new mysqli($host, $user, $pass, $db);
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    header("Location: index.php");
    exit;
}

$username = trim($_POST["username"]);
$password = trim($_POST["password"]);
$role     = trim($_POST["role"]);

// Ambil data user dari tabel "user"
$stmt = $conn->prepare("SELECT * FROM user WHERE username = ? AND role = ? LIMIT 1");
$stmt->bind_param("ss", $username, $role);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows === 1) {
    $row = $result->fetch_assoc();

    // Cocokkan password yang di-hash
    if (password_verify($password, $row["password"])) {
        $_SESSION["isLoggedIn"] = true;
        $_SESSION["username"] = $row["username"];
        $_SESSION["role"] = $row["role"];

        header("Location: dashboard2.html");
        exit;
    } else {
        echo "<script>alert('Password salah!'); history.back();</script>";
    }
} else {
    echo "<script>alert('Akun tidak ditemukan!'); history.back();</script>";
}
?>
