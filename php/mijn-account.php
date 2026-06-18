<?php
session_start();
include 'db.php';

if (!isset($_SESSION['gebruiker_id'])) {
    header('Location: login.php');
    exit();
}
?>
<!DOCTYPE html>
<html lang="nl">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Lano & Ayham Travels - Mijn Account</title>
  <link rel="stylesheet" href="../css/style.css" />
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
      <a href="uitloggen.php" class="login-knop">Logout</a>
    </div>
  </header>

  <main>
    <p>Welkom, <?php echo $_SESSION['naam']; ?></p>
  </main>

  <footer class="footer">
    <p>2025 Lano & Ayham Travels. All rights reserved.</p>
  </footer>

</body>
</html>
