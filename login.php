<?php
session_start();
include 'php/db.php';

$fout = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $email = $_POST['email'];
    $wachtwoord = $_POST['wachtwoord'];

    $zoekGebruiker = $databaseVerbinding->prepare("SELECT * FROM gebruikers WHERE email = ?");
    $zoekGebruiker->execute([$email]);
    $gebruiker = $zoekGebruiker->fetch();

    if ($gebruiker && password_verify($wachtwoord, $gebruiker['wachtwoord'])) {
        $_SESSION['gebruiker_id'] = $gebruiker['id'];
        $_SESSION['naam'] = $gebruiker['naam'];
        $_SESSION['email'] = $gebruiker['email'];
        $_SESSION['rol'] = $gebruiker['rol'];

        if ($gebruiker['rol'] === 'admin') {
            header('Location: admin.php');
        } else {
            header('Location: mijn-account.php');
        }
        exit();
    } else {
        $fout = 'Email of wachtwoord is onjuist.';
    }
}
?>
<!DOCTYPE html>
<html lang="nl">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Lano & Ayham Travels - Login</title>
    <link rel="stylesheet" href="css/style.css" />
    <link rel="stylesheet" href="css/login.css" />
    <script src="js/password.js"></script>
</head>

<body>

    <header class="navbar">
        <div class="logo">
            <a href="index.php">Lano & Ayham Travels</a>
        </div>

        <nav class="nav-menu">
            <ul class="nav-lijst">
                <li><a href="index.php">Home</a></li>
                <li><a href="destinations.php">Destinations</a></li>
                <li><a href="overons.html">About Us</a></li>
                <li><a href="contact.html">Contact</a></li>
            </ul>
        </nav>

        <div class="nav-knoppen">
            <a href="login.php" class="login-knop">Login</a>
            <a href="registreren.php" class="register-knop">Register</a>
        </div>
    </header>

    <main>
        <section class="login-sectie">
            <div class="login-kaart">
                <h1 class="login-titel">Welcome back</h1>
                <p class="login-subtitel">Sign in to your account</p>

                <?php if ($fout !== ''): ?>
                <p class="login-fout"><?php echo $fout; ?></p>
                <?php endif; ?>

                <form class="login-form" action="login.php" method="POST">
                    <div class="form-veld">
                        <label>Email</label>
                        <input type="email" name="email" placeholder="you@example.com" />
                    </div>
                    <div class="form-veld">
                        <label>Password</label>
                        <div class="password-box">
                            <input type="password" id="wachtwoord" name="wachtwoord" />

                            <button type="button" onclick="toonWachtwoord()">
                                Toon Wachtwoord
                            </button>
                        </div>
                    </div>
                    <button type="submit" class="login-knop-form">Login</button>
                </form>

                <p class="registreer-link">Don't have an account? <a href="registreren.php">Register</a></p>
            </div>
        </section>
    </main>

    <footer class="footer">
        <p>2025 Lano & Ayham Travels. All rights reserved.</p>
    </footer>

</body>

</html>