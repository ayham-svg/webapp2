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
        <button class="burger-icon" onclick="burgerMenu()">≡</button>
        <ul id="burger" hidden>
            <li><a class="burger-link" href="index.php">Home</a></li>
            <li><a class="burger-link" href="destinations.php">Destinations</a></li>
            <li><a class="burger-link" href="overons.html">About Us</a></li>
            <li><a class="burger-link" href="contact.html">Contact</a></li>
        </ul>
    </nav>
    <div class="nav-knoppen">
        <?php if (isset($_SESSION['gebruiker_id'])): ?>
            <a href="php/uitloggen.php" class="login-knop">Uitloggen</a>
        <?php else: ?>
            <a href="login.php" class="login-knop">Login</a>
            <a href="registreren.php" class="register-knop">Register</a>
        <?php endif; ?>
    </div>
</header>
