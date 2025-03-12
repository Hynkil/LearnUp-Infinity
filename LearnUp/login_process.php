<?php
session_start(); // 🔥 SESSION INDÍTÁSA

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "webapp_db";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Kapcsolódási hiba: " . $conn->connect_error);
}

$email = $_POST['email'];
$password = $_POST['password'];

$stmt = $conn->prepare("SELECT id, password FROM users WHERE email = ?");
$stmt->bind_param("s", $email);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    
    if (password_verify($password, $row['password'])) {
        $_SESSION['user_id'] = $row['id'];  // 🔥 MENTJÜK A FELHASZNÁLÓ ID-JÁT
        $_SESSION['logged_in'] = true;

        header("Location: learn");
        exit();
    } else {
        header("Location: login.php?error=invalid_password");
        exit();
    }
} else {
    header("Location: login.php?error=no_user_found");
    exit();
}

$stmt->close();
$conn->close();
?>
