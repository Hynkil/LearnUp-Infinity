<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bejelentkezés - LearnUp</title>
    <link rel="icon" href="Learnup.png" type="image/png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Jua&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/fontawesome-all.min.css">
    <link rel="stylesheet" type="text/css" href="css/iofrm-style.css">
    <link rel="stylesheet" type="text/css" href="css/iofrm-theme42.css">
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
        <h2 class="form-title">Bejelentkezés</h2>

        <?php
        if (isset($_GET['error'])) {
            if ($_GET['error'] == 'invalid_password') {
                echo "<div class='alert alert-danger'>Hibás jelszó vagy email-cím!</div>";
            } elseif ($_GET['error'] == 'no_user_found') {
                echo "<div class='alert alert-danger'>Nincs ilyen felhasználó ezzel az email címmel!</div>";
            }
        }
        ?>

        <form action="login_process.php" method="POST">
            <div class="form-group">
                <label for="email">Email cím:</label>
                <input type="email" class="form-control" id="email" name="email" placeholder="Email cím" required>
            </div>
            <div class="form-group">
                <label for="password">Jelszó:</label>
                <input type="password" class="form-control" id="password" name="password" placeholder="Jelszó" required>
            </div>
            <button type="submit" class="btn btn-primary">Bejelentkezés</button>
        </form>
        <div class="footer">
            <p>Nincs fiókod? <a href="registration">Regisztrálj itt</a></p>
        </div>
    </div>

    <button class="home-btn" onclick="window.location.href='Home'"><img src="learnup.png" width="60px"></button>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    
</body>
</html>
