<?php
session_start();
include 'db.php';

if (!isset($_SESSION['rol']) || $_SESSION['rol'] !== 'admin') {
    header('Location: login.php');
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $naam = $_POST['naam'];
    $locatie = $_POST['locatie'];
    $beschrijving = $_POST['beschrijving'];
    $prijs = $_POST['prijs'];
    $hotel = $_POST['hotel'];
    $datum_vertrek = $_POST['datum_vertrek'];
    $datum_terug = $_POST['datum_terug'];

    $stmt = $databaseVerbinding->prepare("INSERT INTO reizen (naam, locatie, beschrijving, prijs, hotel, datum_vertrek, datum_terug) VALUES (?, ?, ?, ?, ?, ?, ?)");
    $stmt->execute([$naam, $locatie, $beschrijving, $prijs, $hotel, $datum_vertrek, $datum_terug]);

    header('Location: admin.php');
    exit();
}
?>
<!DOCTYPE html>
<html lang="nl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reis toevoegen - Lano & Ayham Travels</title>
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/admin.css">
</head>

<body>

    <header class="navbar">
        <div class="logo">
            <a href="../index.php">Lano & Ayham Travels</a>
        </div>
        <nav class="nav-menu">
            <ul class="nav-lijst">
                <li><a href="admin.php">Reizen</a></li>
                <li><a href="admin.php?pagina=boekingen">Boekingen</a></li>
            </ul>
        </nav>
        <div class="nav-knoppen">
            <a href="uitloggen.php" class="login-knop">Uitloggen</a>
        </div>
    </header>

    <div class="container-admin">

        <div class="container-top">
            <h1 class="admin-titel">Reis toevoegen</h1>
            <a href="admin.php" class="knop-terug">Terug</a>
        </div>

        <form class="reis-form" action="reis-toevoegen.php" method="POST">
            <label>Naam</label>
            <input type="text" name="naam">
            <label>Locatie</label>
            <input type="text" name="locatie">
            <label>Beschrijving</label>
            <textarea name="beschrijving"></textarea>
            <label>Prijs</label>
            <input type="number" name="prijs">
            <label>Hotel</label>
            <input type="text" name="hotel">
            <label>Datum vertrek</label>
            <input type="date" name="datum_vertrek">
            <label>Datum terug</label>
            <input type="date" name="datum_terug">
            <button type="submit" class="knop-opslaan">Opslaan</button>
        </form>

    </div>

</body>

</html>