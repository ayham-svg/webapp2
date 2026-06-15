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
        </div>
    </header>

    <main>
      <h1>Mijn account</h1>
    <div class="account-overview">
        <div class="profile-icon">
            <img src="../images/150fa8800b0a0d5633abc1d1c4db3d87.jpg" alt="profile icon">
        </div>
        <div class="user-info">
            <div class="name"><?php echo $_SESSION['naam']; ?></div>
            <div class="mail"><?php echo $_SESSION['email']; ?></div>
        </div>
            <a href="uitloggen.php" class="logout-knop">Logout</a>
    </div>

  <div class="booked-items"> 
    <p class="booked-items-text">Geboekte reizen</p>

  </div>
    </main>

    <footer class="footer">
        <p>© 2025 Lano & Ayham Travels. All rights reserved.</p>
    </footer>

</body>

</html>