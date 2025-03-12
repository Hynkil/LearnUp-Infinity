<?php
session_start();

// Ha nincs beállítva a lecke száma, kezdjük az elsővel
if (!isset($_SESSION['lesson_number'])) {
    $_SESSION['lesson_number'] = 1;
}

// Gombkezelés
if (isset($_POST['next'])) {
    $_SESSION['lesson_number'] = min($_SESSION['lesson_number'] + 1, 3); // Max. 3 lehet
} elseif (isset($_POST['prev'])) {
    $_SESSION['lesson_number'] = max($_SESSION['lesson_number'] - 1, 1); // Min. 1 lehet
}

// Új lecke betöltése (ugyanazon az oldalon marad)
header("Location: math_lesson" . $_SESSION['lesson_number'] . ".php");
exit();
?>
