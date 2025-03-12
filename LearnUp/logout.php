<?php
session_start();
session_unset();  // 🔥 Minden session változó törlése
session_destroy(); // 🔥 Session megszüntetése

header("Location: home"); // 🔄 Átirányítás a főoldalra
exit();
?>
