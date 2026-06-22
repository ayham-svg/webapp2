<?php
session_start();
include 'db.php';

if (!isset($_SESSION['rol']) || $_SESSION['rol'] !== 'admin') {
    header('Location: login.php');
    exit();
}

$stmt = $databaseVerbinding->prepare("SELECT * FROM reizen");
$stmt->execute([]);
$alleReizen = $stmt->fetchAll();
?>
<!DOCTYPE html>
<html lang="nl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Lano & Ayham Travels</title>
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
            <h1 class="admin-titel">Reizen beheren</h1>
            <a href="reis-toevoegen.php" class="knop-toevoegen">+ Reis toevoegen</a>
        </div>

        <table class="reizen-tabel">
            <tr>
                <th>Naam</th>
                <th>Locatie</th>
                <th>Prijs</th>
                <th>Vertrek</th>
                <th>Terug</th>
                <th>Acties</th>
            </tr>
            <?php foreach ($alleReizen as $reis): ?>
            <tr>
                <td><?php echo $reis['naam']; ?></td>
                <td><?php echo $reis['locatie']; ?></td>
                <td>€ <?php echo $reis['prijs']; ?></td>
                <td><?php echo $reis['datum_vertrek']; ?></td>
                <td><?php echo $reis['datum_terug']; ?></td>
                <td>
                    <a href="reis-bewerken.php?id=<?php echo $reis['id']; ?>" class="knop-bewerken">Bewerken</a>
                    <a href="reis-verwijderen.php?id=<?php echo $reis['id']; ?>"
                        class="knop-verwijderen">Verwijderen</a>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
    </div>

</body>

</html>