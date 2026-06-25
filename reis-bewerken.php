<?php
session_start();
include 'php/db.php';

if (!isset($_SESSION['rol']) || $_SESSION['rol'] !== 'admin') {
    header('Location: login.php');
    exit();
}

$id = $_GET['id'];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $naam = $_POST['naam'];
    $locatie = $_POST['locatie'];
    $beschrijving = $_POST['beschrijving'];
    $prijs = $_POST['prijs'];
    $hotel = $_POST['hotel'];
    $datum_vertrek = $_POST['datum_vertrek'];
    $datum_terug = $_POST['datum_terug'];

    $query = $databaseVerbinding->prepare("UPDATE reizen SET naam = ?, locatie = ?, beschrijving = ?, prijs = ?, hotel = ?, datum_vertrek = ?, datum_terug = ? WHERE id = ?");
    $query->execute([$naam, $locatie, $beschrijving, $prijs, $hotel, $datum_vertrek, $datum_terug, $id]);

    header('Location: admin.php');
    exit();
}

$query = $databaseVerbinding->prepare("SELECT * FROM reizen WHERE id = ?");
$query->execute([$id]);
$reis = $query->fetch();
?>
<!DOCTYPE html>
<html lang="nl">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Reis bewerken - Lano & Ayham Travels</title>
<link rel="stylesheet" href="css/style.css">
<link rel="stylesheet" href="css/admin.css">
</head>
<body>

<?php include 'php/navbar-admin.php'; ?>

<div class="container-admin">

<div class="container-top">
<h1 class="admin-titel">Reis bewerken</h1>
<a href="admin.php" class="knop-terug">Terug</a>
</div>

<form class="reis-form" action="reis-bewerken.php?id=<?php echo $id; ?>" method="POST">
<label>Naam</label>
<input type="text" name="naam" value="<?php echo $reis['naam']; ?>">
<label>Locatie</label>
<input type="text" name="locatie" value="<?php echo $reis['locatie']; ?>">
<label>Beschrijving</label>
<textarea name="beschrijving"><?php echo $reis['beschrijving']; ?></textarea>
<label>Prijs</label>
<input type="number" name="prijs" value="<?php echo $reis['prijs']; ?>">
<label>Hotel</label>
<input type="text" name="hotel" value="<?php echo $reis['hotel']; ?>">
<label>Datum vertrek</label>
<input type="date" name="datum_vertrek" value="<?php echo $reis['datum_vertrek']; ?>">
<label>Datum terug</label>
<input type="date" name="datum_terug" value="<?php echo $reis['datum_terug']; ?>">
<button type="submit" class="knop-opslaan">Opslaan</button>
</form>

</div>

<?php include 'php/footer.php'; ?>

</body>
</html>
