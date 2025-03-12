<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "webapp_db";

$conn = new mysqli($servername, $username, $password, $dbname);
session_start();

// Ensure that lesson_number is provided and is a valid integer
if (!isset($_POST['lesson_number']) || !is_numeric($_POST['lesson_number'])) {
    die("Invalid request.");
}

$lesson_number = (int) $_POST['lesson_number']; // Explicit cast to integer

// Define lessons
$lessons = [
    1 => 'math_lesson1.php',
    2 => 'math_lesson2.php',
    // Add more lessons as needed
];

// Return the lesson content based on the current lesson number
$current_lesson = isset($lessons[$lesson_number]) ? $lessons[$lesson_number] : $lessons[1];

include $current_lesson;

// Close the database connection (optional, as it's used minimally here)
$conn->close();
?>
