<?php
session_start();
include 'php/db.php';

if (!isset($_SESSION['gebruiker_id'])) {
    header('Location: login.php');
    exit();
}   

$id = $_GET["id"];

$query = $databaseVerbinding->prepare("SELECT * FROM reizen WHERE id = ?");
$query->execute([$id]);
$reis = $query->fetch();



if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $aantal = $_POST['aantal_personen'];
    $query = $databaseVerbinding->prepare("INSERT INTO boekingen (gebruiker_id, reis_id, aantal_personen)VALUES (?, ?, ?)");
    $query->execute([$_SESSION['gebruiker_id'], $id, $aantal]);
    header('Location: mijn-account.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lano & Ayham Travels - Boeken</title>
    <link rel="stylesheet" href="css/style.css">
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
            <a href="php/uitloggen.php" class="login-knop">Uitloggen</a>
        </div>
    </header>

    <div class="container-boeken">
<h1 class="boeken-titel">Reis boeken</h1>
<p class="boeken-naam"><?php echo $reis['naam']; ?></p>
<p class="boeken-prijs">€ <?php echo $reis['prijs']; ?> p.p.</p>

<form class="boek-form" action="boeken.php?id=<?php echo $id; ?>" method="POST">
<label>Aantal personen</label>
<input type="number" name="aantal_personen" min="1">
<button type="submit" class="knop-boeken">Boeken</button>
</form>
</div>

<footer class="footer">
      <p>2025 Lano & Ayham Travels. All rights reserved.</p>
    </footer>

    
    
</body>
</html>