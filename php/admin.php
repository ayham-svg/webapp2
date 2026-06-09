<?php
session_start();
include 'db.php';

if (!isset($_SESSION['rol']) || $_SESSION['rol'] !== 'admin') {
    header('Location: login.php');
    exit();
}
?>
<!DOCTYPE html>
<html lang="nl">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Lano & Ayham Travels - Admin</title>
  <link rel="stylesheet" href="../css/style.css" />
</head>
<body>

  <header class="navbar">
    <div class="logo">
      <a href="../index.html">Lano & Ayham Travels</a>
    </div>
    <nav class="nav-menu">
      <ul class="nav-lijst">
        <li><a href="admin.php">Dashboard</a></li>
      </ul>
    </nav>
    <div class="nav-knoppen">
      <a href="uitloggen.php" class="login-knop">Uitloggen</a>
    </div>
  </header>

  <main>
    <p>Welkom, <?php echo $_SESSION['naam']; ?></p>
  </main>

</body>
</html>
