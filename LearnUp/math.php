<?php
session_start();

// Ha nincs még beállítva, kezdjük az első leckével
if (!isset($_SESSION['completed_lessons'])) {
    $_SESSION['completed_lessons'] = [1 => true, 2 => false, 3 => false];
}

// Leckék listája
$lessons = [
    1 => "Törtek műveletei",
    2 => "Egyenletek megoldása",
    3 => "Háromszögek és szögeik"
];

?>

<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <title>Matematika Leckék</title>
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
        .btn {
            margin: 10px;
            font-size: 18px;
            width: 100%;
        }
        .btn.disabled {
            background-color: gray;
            cursor: not-allowed;
        }
    </style>
</head>
<body>

<div class="container">
    <h1>Matematika Leckék</h1>
    <p>Válaszd ki, melyik leckét szeretnéd elvégezni! A következő csak akkor nyílik meg, ha az előző teszt sikerült.</p>

    <?php foreach ($lessons as $number => $title): ?>
        <?php if ($_SESSION['completed_lessons'][$number] ?? false): ?>
            <a href="math_lesson<?= $number ?>.php" class="btn btn-success"><?= $number ?>. <?= $title ?></a>
        <?php else: ?>
            <button class="btn btn-secondary disabled"><?= $number ?>. <?= $title ?> (Nem elérhető)</button>
        <?php endif; ?>
    <?php endforeach; ?>

</div>

</body>
</html>
