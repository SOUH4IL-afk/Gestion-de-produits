<?php
require 'connexion.php';

try {
    $stmt = $pdo->prepare("INSERT INTO Utilisateur (nom, email) VALUES (:nom, :email)");
    $stmt->execute([
        'nom' => 'Charlie',
        'email' => 'charlie@test.com'
    ]);
    echo "Utilisateur ajouté avec succès.";
} catch (PDOException $e) {
    echo "Erreur : " . $e->getMessage();
}
/*--------UPDATE------*/
try {
$stmt = $pdo->prepare("UPDATE Utilisateur SET email = :email WHERE id = :id");
$stmt->execute([
    'email' => 'charlie.new@test.com',
    'id' => 3
]);
echo "Utilisateur mis à jour.";
} catch (PDOException $e) {
    echo "Erreur : " . $e->getMessage();
}
/*----------DELETE--------*/
try {
$stmt = $pdo->prepare("DELETE FROM Utilisateur WHERE id = :id");
$stmt->execute(['id' => 3]);
echo "Utilisateur supprimé.";
} catch (PDOException $e) {
    echo "Erreur". $e->getMessage();
}
?>