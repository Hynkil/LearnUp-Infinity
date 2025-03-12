<?php
session_start(); // 🔥 SESSION INDÍTÁSA

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php?error=not_logged_in");
    exit();
}

$user_id = $_SESSION['user_id'];


// Ha nincs bejelentkezett felhasználó, hibaüzenet
if (!isset($_SESSION['user_id'])) {
    die("User not found. Please log in.");
}

$user_id = $_SESSION['user_id'];

// Adatbázis kapcsolat
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "webapp_db";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Tantárgyak lekérése
$query = "SELECT subject, lesson_number, lesson_page FROM user_lessons WHERE user_id = ? AND subject IN ('Matek', 'Történelem', 'Magyar') ORDER BY subject, lesson_number LIMIT 1";
$stmt = $conn->prepare($query);
$stmt->bind_param("i", $user_id);
$stmt->execute();
$stmt->store_result();
$stmt->bind_result($subject, $lesson_number, $lesson_page);

$lessons = [];

while ($stmt->fetch()) {
    $lessons[$subject] = [
        'lesson_number' => $lesson_number,
        'lesson_page' => $lesson_page,
    ];
}

$stmt->close();
$conn->close();

// Ha nincs adat, alapértelmezett értékek
if (empty($lessons)) {
    $lessons = [
        'Matek' => ['lesson_number' => 1, 'lesson_page' => 'math_lesson1.php'],
        'Történelem' => ['lesson_number' => 1, 'lesson_page' => 'history_lesson1.php'],
        'Magyar' => ['lesson_number' => 1, 'lesson_page' => 'hungarian_lesson1.php'],
    ];
}
?>

<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LearnUp</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-family: 'Jua', sans-serif;
            background-color: #121212;
            color: #e0e0e0;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .container {
            text-align: center;
            background-color: #1e1e1e;
            padding: 40px;
            border-radius: 10px;
            box-shadow: 0 4px 12px rgba(255, 255, 255, 0.1);
        }

        h1 {
            color: #ffffff;
            margin-bottom: 30px;
        }

        .button-container {
            display: flex;
            justify-content: center;
            flex-wrap: wrap;
            gap: 15px;
        }

        .subject-button {
            padding: 15px 30px;
            font-size: 20px;
            background-color: #e2c376;
            color: #121212;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            transition: background-color 0.3s ease, transform 0.2s ease;
        }

        .subject-button:hover {
            background-color: #cfa55b;
            transform: scale(1.05);
        }
    </style>
</head>
<body>

<div class="container">
    <h1 class="text-center my-5">Válassz tantárgyat</h1>

    <div class="button-container">
        <?php foreach ($lessons as $subject => $lesson): ?>
            <form action="<?= htmlspecialchars($lesson['lesson_page']) ?>" method="GET">
                <button type="submit" class="subject-button"><?= htmlspecialchars($subject) ?></button>
            </form>
        <?php endforeach; ?>
    </div>

    <br>
    <a href="logout.php">Kijelentkezés</a>
</div>

</body>
</html>
