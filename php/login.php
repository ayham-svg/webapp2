<?php session_start(); ?>
<!DOCTYPE html>
<html lang="nl">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Lano & Ayham Travels - Login</title>
    <link rel="stylesheet" href="../css/style.css" />
    <link rel="stylesheet" href="../css/login.css" />
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
        <a href="login.php" class="login-knop">Login</a>
        <a href="registreren.php" class="register-knop">Register</a>
      </div>
    </header>

    <main>
      <section class="login-sectie">
        <div class="login-kaart">
          <h1 class="login-titel">Welcome back</h1>
          <p class="login-subtitel">Sign in to your account</p>

          <form class="login-form" action="login.php" method="POST">
            <div class="form-veld">
              <label>Email</label>
              <input type="email" name="email" placeholder="you@example.com" />
            </div>
            <div class="form-veld">
              <label>Password</label>
              <input type="password" name="wachtwoord" placeholder="••••••••" />
            </div>
            <a href="wachtwoord-vergeten.php" class="vergeten-link">Forgot Password?</a>
            <button type="submit" class="login-knop-form">Login</button>
          </form>

          <p class="registreer-link">Don't have an account? <a href="registreren.php">Register</a></p>
        </div>
      </section>
    </main>

    <footer class="footer">
      <p>&copy; 2025 Lano & Ayham Travels. All rights reserved.</p>
    </footer>

  </body>
</html>
