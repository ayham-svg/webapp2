<?php
session_start();
include 'php/db.php';
 
if (!isset($_SESSION['rol']) || $_SESSION['rol'] !== 'admin') {
    header('Location: login.php');
    exit();
}
 
$query = $databaseVerbinding->prepare("SELECT * FROM reizen");
$query->execute([]);
$alleReizen = $query->fetchAll();
?>
<!DOCTYPE html>
<html lang="nl">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Admin - Lano & Ayham Travels</title>
<link rel="stylesheet" href="css/style.css">
<link rel="stylesheet" href="css/admin.css">
</head>
<body>
 
<header class="navbar">
<div class="logo">
<a href="index.php">Lano & Ayham Travels</a>
</div>
<nav class="nav-menu">
<ul class="nav-lijst">
<li><a href="admin.php">Reizen</a></li>
<li><a href="admin.php?pagina=boekingen">Boekingen</a></li>
</ul>
</nav>
<div class="nav-knoppen">
<a href="php/uitloggen.php" class="login-knop">Uitloggen</a>
</div>
</header>
 
<div class="container-admin">
<div class="container-top">
<h1 class="admin-titel">Reizen beheren</h1>
<a href="reis-toevoegen.php" class="knop-toevoegen">+ Reis toevoegen</a>
</div>
 
<div class="reizen-lijst">
<div class="lijst-header">
<span>Naam</span>
<span>Locatie</span>
<span>Prijs</span>
<span>Vertrek</span>
<span>Terug</span>
<span>Acties</span>
</div>
<?php foreach ($alleReizen as $reis): ?>
<div class="lijst-rij">
<span><?php echo $reis['naam']; ?></span>
<span><?php echo $reis['locatie']; ?></span>
<span>€ <?php echo $reis['prijs']; ?></span>
<span><?php echo $reis['datum_vertrek']; ?></span>
<span><?php echo $reis['datum_terug']; ?></span>
<span>
<a href="reis-bewerken.php?id=<?php echo $reis['id']; ?>" class="knop-bewerken">Bewerken</a>
<a href="php/reis-verwijderen.php?id=<?php echo $reis['id']; ?>" class="knop-verwijderen">Verwijderen</a>
</span>
</div>
<?php endforeach; ?>
</div>
</div>
 
</body>
</html>