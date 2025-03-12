<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Regisztráció - LearnUp</title>
    <link rel="icon" href="Learnup.png" type="image/png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Jua&display=swap" rel="stylesheet">
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
    max-width: 450px;
    padding: 40px;
    background-color: #1e1e1e;
    border-radius: 10px;
    box-shadow: 0 4px 12px rgba(255, 255, 255, 0.1);
    text-align: center;
}

.form-title {
    font-size: 36px;
    margin-bottom: 30px;
    color: #ffffff;
}

.form-group {
    margin-bottom: 15px;
    text-align: left;
}

label {
    color: #bbbbbb;
    font-size: 14px;
}

.form-control {
    border-radius: 8px;
    padding: 15px;
    font-size: 16px;
    background-color: #2c2c2c;
    border: 1px solid #444;
    color: #ffffff;
}

.form-control:focus {
    outline: none;
    border-color: #e2c376;
    box-shadow: 0 0 5px rgba(226, 195, 118, 0.5);
}

.btn-primary {
    background-color: #e2c376;
    border: none;
    width: 100%;
    padding: 15px;
    border-radius: 8px;
    font-size: 18px;
    color: white;
    transition: background-color 0.3s ease;
}

.btn-primary:hover {
    background-color: #e2c376;
}

.footer {
    margin-top: 30px;
    color: #aaaaaa;
    font-size: 14px;
}

.footer a {
    color: #e2c376;
    text-decoration: none;
}

.footer a:hover {
    text-decoration: underline;
}

.alert {
    margin-bottom: 20px;
    background-color: #b00020;
    color: white;
    padding: 10px;
    border-radius: 5px;
}

.home-btn {
    position: absolute;
    top: 20px;
    left: 20px;
    padding: 10px;
    border-radius: 50%;
    background-color: #222;
    width: 50px;
    height: 50px;
    border: none;
    cursor: pointer;
    display: flex;
    align-items: center;
    justify-content: center;
    transition: background-color 0.3s ease;
}

.home-btn img {
    width: 30px;
    height: 30px;
}

.home-btn:hover {
    background-color: #333;
}

    </style>
</head>
<body>

    <div class="container">
        <h2 class="form-title">Regisztráció</h2>
        <?php
        if (isset($_GET['error'])) {
            if ($_GET['error'] == 'password_mismatch') {
                echo "<div class='alert alert-danger'>A jelszavak nem egyeznek!</div>";
            } elseif ($_GET['error'] == 'registration_failed') {
                echo "<div class='alert alert-danger'>Hiba a regisztráció során. Kérjük, próbálja újra!</div>";
            }
        }
        ?>

        <form action="register_process.php" method="POST">
            <div class="form-group">
                <label for="name">Név:</label>
                <input type="text" class="form-control" id="name" name="name" placeholder="Teljes név" required>
            </div>
            <div class="form-group">
                <label for="email">Email cím:</label>
                <input type="email" class="form-control" id="email" name="email" placeholder="Email cím" required>
            </div>
            <div class="form-group">
                <label for="password">Jelszó:</label>
                <input type="password" class="form-control" id="password" name="password" placeholder="Jelszó" required>
            </div>
            <div class="form-group">
                <label for="password_confirm">Jelszó megerősítése:</label>
                <input type="password" class="form-control" id="password_confirm" name="password_confirm" placeholder="Jelszó megerősítése" required>
            </div>
            <button type="submit" class="btn btn-primary">Regisztráció</button>
        </form>
        <div class="footer">
            <p>Már van fiókod? <a href="login">Bejelentkezés itt</a></p>
        </div>
    </div>
    <button class="home-btn" onclick="window.location.href='home'"><img src="learnup.png" width="60px"></button>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
