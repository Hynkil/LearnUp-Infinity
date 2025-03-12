<?php
session_start();

// Ha nincs beállítva a lecke állapota, kezdjük az elsővel
if (!isset($_SESSION['completed_lessons'])) {
    $_SESSION['completed_lessons'] = [1 => true, 2 => false, 3 => false];
}

// Tesztkérdések
$questions = [
    "Mit nevezünk algebrai kifejezésnek?" => "Olyan matematikai kifejezést, amely számokat, műveleti jeleket és változókat tartalmaz.",
    "Oldd meg: 3x + 5 = 11. Mennyi x?" => "2",
    "Mennyi egy háromszög belső szögeinek összege?" => "180",
    "Mennyi az x, ha 2x - 4 = 10?" => "7",
    "Ha egy derékszögű háromszög két befogója 3 cm és 4 cm, mennyi az átfogó?" => "5"
];

$total_questions = count($questions);
$correct_answers = 0;

// Ha a felhasználó beküldte a tesztet
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    foreach ($questions as $question => $correct) {
        $user_answer = trim($_POST[str_replace(" ", "_", $question)] ?? "");
        if (strcasecmp($user_answer, $correct) == 0) {
            $correct_answers++;
        }
    }

    // Számoljuk a teljesítményt százalékban
    $score = ($correct_answers / $total_questions) * 100;

    if ($score >= 60) {
        // Ha a teszt sikeres, engedjük a következő leckét
        $current_lesson = $_SESSION['lesson_number'] ?? 1;
        $_SESSION['completed_lessons'][$current_lesson + 1] = true; // Feloldja a következőt
        header("Location: math.php"); // Vissza a leckeválasztóba
        exit();
    } else {
        // Ha nem sikerült, vissza az első leckére
        $_SESSION['lesson_number'] = 1;
        header("Location: math_lesson1.php");
        exit();
    }
}
?>


<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <title>Matematika Teszt</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #121212;
            color: #e0e0e0;
            text-align: center;
            padding: 50px;
        }
        .container {
            background-color: #1e1e1e;
            padding: 30px;
            border-radius: 10px;
            max-width: 600px;
            margin: auto;
            box-shadow: 0 4px 12px rgba(255, 255, 255, 0.1);
        }
        .btn-primary {
            background-color: #e2c376;
            border: none;
            width: 100%;
            padding: 10px;
            border-radius: 5px;
            font-size: 18px;
            color: white;
            transition: background-color 0.3s ease;
        }
        .btn-primary:hover {
            background-color: #cfa55b;
        }
    </style>
</head>
<body>

<div class="container">
    <h1>Matematika Teszt</h1>
    <p>A leckék alapján válaszolj a kérdésekre! Legalább 60%-ot kell elérned.</p>

    <form method="POST">
        <?php foreach ($questions as $question => $answer): ?>
            <p><?= htmlspecialchars($question) ?></p>
            <input type="text" name="<?= str_replace(" ", "_", $question) ?>" required>
        <?php endforeach; ?>

        <br><br>
        <button type="submit" class="btn btn-primary">Beküldés</button>
    </form>
</div>

</body>
</html>
