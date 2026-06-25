<?php
session_start();
include 'php/db.php';

$fout = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $naam = $_POST['naam'];
  $email = $_POST['email'];
  $wachtwoord = $_POST['wachtwoord'];
  $wachtwoord_bevestig = $_POST['wachtwoord_bevestig'];

  if ($wachtwoord !== $wachtwoord_bevestig) {
    $fout = 'Wachtwoorden komen niet overeen.';
  } else {
    $zoekEmail = $databaseVerbinding->prepare("SELECT * FROM gebruikers WHERE email = ?");
    $zoekEmail->execute([$email]);
    $bestaandeGebruiker = $zoekEmail->fetch();

    if ($bestaandeGebruiker) {
      $fout = 'Dit emailadres is al in gebruik.';
    } else {
      $versleuteldWachtwoord = password_hash($wachtwoord, PASSWORD_DEFAULT);

      $nieuwGebruiker = $databaseVerbinding->prepare("INSERT INTO gebruikers (naam, email, wachtwoord) VALUES (?, ?, ?)");
      $nieuwGebruiker->execute([$naam, $email, $versleuteldWachtwoord]);

      header('Location: login.php');
      exit();
    }
  }
}
?>
<!DOCTYPE html>
<html lang="nl">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Lano & Ayham Travels - Register</title>
    <link rel="stylesheet" href="css/style.css" />
    <link rel="stylesheet" href="css/login.css" />
    <script src="js/wachtwoord-check.js"></script>
    <script src="js/burger.js"></script>
</head>

<body>

    <?php include 'php/navbar.php'; ?>

    <main>
        <section class="login-sectie">
            <div class="login-kaart">
                <h1 class="login-titel">Create Account</h1>
                <p class="login-subtitel">Join us and start your adventure</p>

                <?php if ($fout !== ''): ?>
                <p class="login-fout"><?php echo $fout; ?></p>
                <?php endif; ?>

                <form class="login-form" action="registreren.php" method="POST" onsubmit="return controleerWachtwoord()">
                    <div class="form-veld">
                        <label>Name</label>
                        <input type="text" name="naam" placeholder="John Doe" />
                    </div>
                    <div class="form-veld">
                        <label>Email</label>
                        <input type="email" name="email" placeholder="you@example.com" />
                    </div>
                    <div class="form-veld">
                        <label>Password</label>
                        <input type="password" name="wachtwoord" id="wachtwoord" />
                    </div>
                    <div class="form-veld">
                        <label>Confirm Password</label>
                        <input type="password" name="wachtwoord_bevestig" id="wachtwoord_bevestig" />
                    </div>
                    <button type="submit" class="login-knop-form">Register</button>
                </form>

                <p class="registreer-link">Already have an account? <a href="login.php">Login</a></p>
            </div>
        </section>
    </main>

    <?php include 'php/footer.php'; ?>

</body>

</html>