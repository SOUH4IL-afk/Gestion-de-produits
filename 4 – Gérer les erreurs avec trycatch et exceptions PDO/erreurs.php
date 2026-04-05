<?php
require 'connexion.php';

try {
    $pdo->query("SELECT * FROM table_inexistante");
} catch (PDOException $e) {
    echo "Erreur SQL : " . $e->getMessage();
}

/*---------------- Enregistrer les erreurs (optionnel)----------*/
try {
    $pdo->query("SELECT * FROM table_inexistante");
}catch (PDOException $e) {
    file_put_contents('erreurs.log', $e->getMessage(), FILE_APPEND);
    echo "Une erreur est survenue. Contactez l'administrateur.";
}
 ?>