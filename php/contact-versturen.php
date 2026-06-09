<?php
session_start();
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: ../contact.html');
    exit();
}

$naam    = trim($_POST['naam'] ?? '');
$email   = trim($_POST['email'] ?? '');
$bericht = trim($_POST['bericht'] ?? '');

if ($naam === '' || $email === '' || $bericht === '') {
    header('Location: ../contact.html?fout=1');
    exit();
}

$slaOp = $databaseVerbinding->prepare("INSERT INTO berichten (naam, email, bericht) VALUES (?, ?, ?)");
$slaOp->execute([$naam, $email, $bericht]);

header('Location: ../contact.html?verstuurd=1');
exit();
