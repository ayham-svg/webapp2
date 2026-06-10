<?php
session_start();
include 'db.php';

if (!isset($_SESSION['gebruiker_id'])) {
    header('Location: login.php');
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['boeking_id'])) {
    $annuleer = $databaseVerbinding->prepare("UPDATE boekingen SET status = 'geannuleerd' WHERE id = ? AND gebruiker_id = ?");
    $annuleer->execute([$_POST['boeking_id'], $_SESSION['gebruiker_id']]);
    header('Location: mijn-account.php');
    exit();
}

$haalBoekingen = $databaseVerbinding->prepare("
    SELECT boekingen.id, boekingen.status, boekingen.aangemaakt_op,
           reizen.naam, reizen.bestemming, reizen.prijs, reizen.duur
    FROM boekingen
    JOIN reizen ON boekingen.reis_id = reizen.id
    WHERE boekingen.gebruiker_id = ?
    ORDER BY boekingen.aangemaakt_op DESC
");
$haalBoekingen->execute([$_SESSION['gebruiker_id']]);
$alleBoekingen = $haalBoekingen->fetchAll();
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Lano & Ayham Travels - My Account</title>
    <link rel="stylesheet" href="../css/style.css" />
    <link rel="stylesheet" href="../css/account.css" />
  </head>
  <body>

    <header class="navbar">
      <div class="logo">
        <a href="../index.html">Lano & Ayham Travels</a>
      </div>
      <nav class="nav-menu">
        <ul class="nav-lijst">
          <li><a href="../index.html">Home</a></li>
          <li><a href="../destinations.html">Destinations</a></li>
          <li><a href="../overons.html">About Us</a></li>
          <li><a href="../contact.html">Contact</a></li>
        </ul>
      </nav>
      <div class="nav-knoppen">
        <span class="nav-naam"><?php echo htmlspecialchars($_SESSION['naam']); ?></span>
        <a href="uitloggen.php" class="login-knop">Logout</a>
      </div>
    </header>

    <main class="account-main">

      <div class="account-kop">
        <h1>My Account</h1>
        <p>Welcome back, <?php echo htmlspecialchars($_SESSION['naam']); ?></p>
      </div>

      <section class="boekingen-sectie">
        <h2>My Bookings</h2>

        <?php if (count($alleBoekingen) === 0): ?>
          <p class="geen-boekingen">You have no bookings yet. <a href="../destinations.html">Explore trips</a></p>
        <?php else: ?>
          <div class="boekingen-lijst">
            <?php foreach ($alleBoekingen as $boeking): ?>
              <div class="boeking-kaart">
                <div class="boeking-info">
                  <h3><?php echo htmlspecialchars($boeking['naam']); ?></h3>
                  <p><?php echo htmlspecialchars($boeking['bestemming']); ?> · <?php echo htmlspecialchars($boeking['duur']); ?> days</p>
                  <p class="boeking-prijs">€ <?php echo number_format($boeking['prijs'], 2, ',', '.'); ?></p>
                </div>
                <div class="boeking-rechts">
                  <span class="status-label status-<?php echo $boeking['status']; ?>">
                    <?php echo ucfirst(htmlspecialchars($boeking['status'])); ?>
                  </span>
                  <?php if ($boeking['status'] !== 'geannuleerd'): ?>
                    <form method="POST" action="mijn-account.php">
                      <input type="hidden" name="boeking_id" value="<?php echo $boeking['id']; ?>" />
                      <button type="submit" class="annuleer-knop">Cancel</button>
                    </form>
                  <?php endif; ?>
                </div>
              </div>
            <?php endforeach; ?>
          </div>
        <?php endif; ?>
      </section>

    </main>

    <footer class="footer">
      <p>© 2025 Lano & Ayham Travels. All rights reserved.</p>
    </footer>

  </body>
</html>
