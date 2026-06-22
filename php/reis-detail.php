<?php
session_start();
include 'php/db.php';

$id = $_GET["id"];

$stmt = $databaseVerbinding->prepare("SELECT * FROM reizen");
$stmt->execute([]);
$alleReizen = $stmt->fetchAll();



if($_SERVER('REQUEST_METHOD' === $_POST)) {
    $aantal = $_POST['aantal_personen'];
    $stmt = $databaseVerbinding->prepare("INSERT INTO boekingen (gebruiker_id, reis_id, aantal_personen)VALUES (?, ?, ?)");
    $stmt->execute([$_SESSION['gebruiker_id'], $id, $aantal]);
    header('Location: mijn-account.php');
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lano & Ayham Travels - Reis Detail</title>
</head>
<body>
        <header class="navbar">
        <div class="logo">
            <a href="../index.php">Lano & Ayham Travels</a>
        </div>
        <nav class="nav-menu">
            <ul class="nav-lijst">
                <li><a href="../index.php">Home</a></li>
                <li><a href="../destinations.php">Destinations</a></li>
                <li><a href="../overons.html">About Us</a></li>
                <li><a href="../contact.html">Contact</a></li>
            </ul>
        </nav>
        <div class="nav-knoppen">
            <a href="php/login.php" class="login-knop">Inloggen</a>
            <a href="php/registreren.php" class="register-knop">Registreren</a>
        </div>
    </header>

    <main>
      <h1>Mijn account</h1>
    <div class="account-overview">
        <div class="user-info">
            <div class="reis-naam"><?php echo $_SESSION['naam']; ?></div>
        </div>
            <a href="uitloggen.php" class="logout-knop">Logout</a>
    </div>
    </main>

    <footer class="footer">
        <p>© 2025 Lano & Ayham Travels. All rights reserved.</p>
    </footer>
</body>
</html>