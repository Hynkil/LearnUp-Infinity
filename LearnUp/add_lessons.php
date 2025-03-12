<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    die("Access denied. Please log in.");
}

$user_id = $_SESSION['user_id'];

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "webapp_db";

$lessons = [
    ['subject' => 'Matek', 'lesson_number' => 1, 'lesson_page' => 'math_lesson1.php'],
    ['subject' => 'Matek', 'lesson_number' => 2, 'lesson_page' => 'math_lesson2.php'],
    ['subject' => 'Történelem', 'lesson_number' => 1, 'lesson_page' => 'history_lesson1.php'],
    ['subject' => 'Történelem', 'lesson_number' => 2, 'lesson_page' => 'history_lesson2.php'],
    ['subject' => 'Magyar', 'lesson_number' => 1, 'lesson_page' => 'hungarian_lesson1.php'],
    ['subject' => 'Magyar', 'lesson_number' => 2, 'lesson_page' => 'hungarian_lesson2.php'],
];

$conn = new mysqli($servername, $username, $password, $dbname);

foreach ($lessons as $lesson) {
    $query = "INSERT INTO user_lessons (user_id, subject, lesson_number, lesson_page) 
              VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("isis", $user_id, $lesson['subject'], $lesson['lesson_number'], $lesson['lesson_page']);
    $stmt->execute();
}

$stmt->close();
$conn->close();
?>
