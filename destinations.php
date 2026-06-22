<?php
session_start();
include 'php/db.php';

$stmt = $databaseVerbinding->prepare("SELECT * FROM reizen");
$stmt->execute([]);
$alleReizen = $stmt->fetchAll();
?>
<!DOCTYPE html>
<html lang="nl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lano & Ayham Travels - Bestemmingen</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/destinations.css">
</head>

<body>

    <header class="navbar">
        <div class="logo">
            <a href="index.php">Lano & Ayham Travels</a>
        </div>
        <nav class="nav-menu">
            <ul class="nav-lijst">
                <li><a href="index.php">Home</a></li>
                <li><a href="destinations.php">Bestemmingen</a></li>
                <li><a href="overons.html">Over Ons</a></li>
                <li><a href="contact.html">Contact</a></li>
            </ul>
        </nav>
        <div class="nav-knoppen">
            <a href="php/login.php" class="login-knop">Inloggen</a>
            <a href="php/registreren.php" class="register-knop">Registreren</a>
        </div>
    </header>

    <div class="container-bestemmingen">

        <h1 class="bestemmingen-titel">Bestemmingen</h1>

        <div class="container-kaarten">
            <?php foreach ($alleReizen as $reis): ?>
            <div class="reis-kaart">
                <h3 class="kaart-naam"><?php echo $reis['naam']; ?></h3>
                <p class="kaart-locatie"><?php echo $reis['locatie']; ?></p>
                <p class="kaart-beschrijving"><?php echo $reis['beschrijving']; ?></p>
                <p class="kaart-prijs">€ <?php echo $reis['prijs']; ?> p.p.</p>
                <div class="kaart-knoppen">
                    <a href="php/boeken.php?id=<?php echo $reis['id']; ?>" class="knop-boeken" onclick="return confirm('Weet je zeker dat je deze reis wilt boeken?');">Boeken</a>
                </div>
            </div>
            <?php endforeach; ?>
        </div>

    </div>

    <footer class="footer">
        <p>2025 Lano & Ayham Travels. Alle rechten voorbehouden.</p>
    </footer>

</body>

</html>