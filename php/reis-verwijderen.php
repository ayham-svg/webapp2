<?php
session_start();
include 'db.php';

if (!isset($_SESSION['rol']) || $_SESSION['rol'] !== 'admin') {
    header('Location: login.php');
    exit();
}

$id = $_GET['id'];

$stmt = $databaseVerbinding->prepare("DELETE FROM reizen WHERE id = ?");
$stmt->execute([$id]);

header('Location: admin.php');
exit();
