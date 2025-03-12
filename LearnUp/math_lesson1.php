<?php
session_start();

if (!isset($_SESSION['lesson_number'])) {
    $_SESSION['lesson_number'] = 1;
}

if (isset($_POST['next'])) {
    $_SESSION['lesson_number'] = min($_SESSION['lesson_number'] + 1, 3); // Max. 3 lehet
} elseif (isset($_POST['prev'])) {
    $_SESSION['lesson_number'] = max($_SESSION['lesson_number'] - 1, 1); // Min. 1 lehet
}

$lessons = [
    1 => [
        'title' => 'Törtek műveletei',
        'content' => '
            <h3>Összeadás és kivonás</h3>
            <p>Két törtet úgy adunk össze vagy vonunk ki, hogy közös nevezőre hozzuk őket.</p>
            <p><b>Példa:</b> \( \frac{3}{4} + \frac{2}{5} \)</p>
            <p>Legkisebb közös nevező: 20</p>
            <p>\( \frac{15}{20} + \frac{8}{20} = \frac{23}{20} \) vagyis \( 1 \frac{3}{20} \)</p>
        ',
        'image' => 'images/fractions.png'
    ],
    2 => [
        'title' => 'Egyenletek megoldása',
        'content' => '
            <h3>Egyszerű egyenletek</h3>
            <p>Az egyenlet megoldása során mindig egy lépésben próbáljuk izolálni az ismeretlent.</p>
            <p><b>Példa:</b> \( 2x + 3 = 11 \)</p>
            <p>Először kivonjuk a 3-at: \( 2x = 8 \)</p>
            <p>Majd osztunk 2-vel: \( x = 4 \)</p>
        ',
        'image' => 'images/equations.png'
    ],
    3 => [
        'title' => 'Háromszögek és szögeik',
        'content' => '
            <h3>A háromszög szögei</h3>
            <p>A háromszög belső szögeinek összege mindig 180°.</p>
            <p><b>Példa:</b> Ha egy háromszög két szöge 50° és 60°, akkor a harmadik: \( 180° - 50° - 60° = 70° \).</p>
        ',
        'image' => 'images/triangles.png'
    ],
];

$current_lesson = $lessons[$_SESSION['lesson_number']];
?>

<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $current_lesson['title'] ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #121212;
            color: #e0e0e0;
            text-align: center;
            padding: 30px;
        }
        .container {
            background-color: #1e1e1e;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 12px rgba(255, 255, 255, 0.1);
            max-width: 600px;
            margin: auto;
        }
        img {
            max-width: 100%;
            border-radius: 8px;
            margin: 20px 0;
        }
        .btn {
            margin: 10px;
            font-size: 18px;
        }
        h3 {
            color: #ffcc00;
        }
    </style>
</head>
<body>

<div class="container">
    <h1><?= $current_lesson['title'] ?></h1>
    <p><?= $current_lesson['content'] ?></p>
    <img src="<?= $current_lesson['image'] ?>" alt="Lesson Image">

    <div class="button-container">
        <form method="POST">
            <button type="submit" name="prev" class="btn btn-outline-light" <?= $_SESSION['lesson_number'] == 1 ? 'disabled' : '' ?>>Vissza</button>

            <?php if ($_SESSION['lesson_number'] < 3): ?>
                <button type="submit" name="next" class="btn btn-warning">Következő</button>
            <?php else: ?>
                <a href="math_lesson1_test.php" class="btn btn-success">Befejezés</a>
            <?php endif; ?>
        </form>
    </div>
</div>

</body>
</html>
