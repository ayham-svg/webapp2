<?php
session_start();
include 'php/db.php';

$zoekterm = '';
if (isset($_GET['zoekterm'])) {
    $zoekterm = $_GET['zoekterm'];
}
$query = $databaseVerbinding->prepare("SELECT * FROM reizen WHERE naam LIKE ? OR locatie LIKE ?");
$query->execute(["%$zoekterm%", "%$zoekterm%"]);
$alleReizen = $query->fetchAll();
?>
<!DOCTYPE html>
<html lang="nl">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Lano & Ayham Travels - Home</title>
    <link rel="stylesheet" href="css/style.css" />
    <link rel="stylesheet" href="css/home.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <script src="js/burger.js"></script>
</head>

<body>

    <header class="navbar">
        <div class="logo">
            <a href="index.php">Lano & Ayham Travels</a>
        </div>



        <nav class="nav-menu">
            <ul class="nav-lijst" id="nav-lijst">
                <li><a href="index.php">Home</a></li>
                <li><a href="destinations.php">Destinations</a></li>
                <li><a href="overons.html">About Us</a></li>
                <li><a href="contact.html">Contact</a></li>
            </ul>
            <button class="burger-icon" onclick="burgerMenu()">
                ≡
            </button>
            <ul id="burger" hidden>
                <li>
                    <a class="burger-link" href="index.php">Home</a>
                </li>
                <li>
                    <a class="burger-link" href="destinations.php">Destinations</a>
                </li>
                <li>
                    <a class="burger-link" href="overons.html">About Us</a>
                </li>
                <li>

                    <a class="burger-link" href="contact.html">Contact</a>
                </li>
            </ul>
        </nav>

        <div class="nav-knoppen">
            <a href="login.php" class="login-knop">Login</a>
            <a href="registreren.php" class="register-knop">Register</a>
        </div>
    </header>

    <main>
        <section class="hero">
            <div class="hero-inhoud">
                <h1 class="hero-titel">Discover Your Next<br>Adventure</h1>
                <p class="hero-subtitel">Simple and unforgettable travel experiences.</p>
                <div class="hero-knoppen">
                    <a href="zoeken.php" class="knop-zoeken">Search Trips</a>
                    <a href="boeken.php" class="knop-boeken">Book Now</a>
                </div>
            </div>
        </section>

        <section class="zoek-sectie">
            <form class="zoek-form" action="index.php" method="GET">
                <input type="text" name="zoekterm" placeholder="Zoek een bestemming..."
                    value="<?php echo $zoekterm; ?>" />
                <button type="submit">Zoeken</button>
            </form>
        </section>

        <section class="reizen-sectie">
            <h2 class="sectie-titel">Populaire Reizen</h2>
            <div class="reizen-grid">

                <?php foreach ($alleReizen as $reis): ?>
                <div class="reis-kaart">
                    <div class="reis-info">
                        <h3><?php echo $reis['naam']; ?></h3>
                        <p><?php echo $reis['locatie']; ?></p>
                        <p>vanaf € <?php echo $reis['prijs']; ?></p>
                        <a href="reis-detail.php?id=<?php echo $reis['id']; ?>">Bekijk reis</a>
                    </div>
                </div>
                <?php endforeach; ?>

            </div>
        </section>

    </main>

    <footer class="footer">
        <p>2025 Lano & Ayham Travels. All rights reserved.</p>
    </footer>

</body>

</html>