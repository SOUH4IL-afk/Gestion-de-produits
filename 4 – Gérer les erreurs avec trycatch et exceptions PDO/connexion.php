<?php
$host = 'localhost';
$dbname = 'blogdb';
$username = 'root';
$password = '';

$dsn = "mysql:host=$host;dbname=$dbname;charset=utf8";

try {
    $pdo = new PDO($dsn, $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Connexion réussie à la base $dbname";
} catch (PDOException $e) {
    echo "Erreur de connexion : " . $e->getMessage();
}
 ?>