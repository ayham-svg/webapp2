<?php
session_start();
include 'php/db.php';

$query = $databaseVerbinding->prepare("SELECT * FROM reizen");
$query->execute([]);
$alleReizen = $query->fetchAll();
?>
<!DOCTYPE html>
<html lang="nl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lano & Ayham Travels - Bestemmingen</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/destinations.css">
    <script src="js/burger.js"></script>
</head>

<body>

    <?php include 'php/navbar.php'; ?>

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
                    <a href="boeken.php?id=<?php echo $reis['id']; ?>" class="knop-boeken" onclick="return confirm('Weet je zeker dat je deze reis wilt boeken?');">Boeken</a>
                </div>
            </div>
            <?php endforeach; ?>
        </div>

    </div>

    <?php include 'php/footer.php'; ?>

</body>

</html>