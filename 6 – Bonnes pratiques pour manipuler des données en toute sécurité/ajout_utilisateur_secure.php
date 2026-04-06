<?php
require 'connexion.php';

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    /*------------------ Nettoyage-------------------------------------*/

    $nom = htmlspecialchars(trim($_POST['nom'] ?? ''));
    $email = filter_var($_POST['email'] ?? '', FILTER_VALIDATE_EMAIL);

    /*------------------ Validation----------------------------------*/

    if (empty($nom) || !$email) {
        die("Données invalides !");
    }

    try {
     /*----------------- Requête sécurisée-----------------------*/

        $stmt = $pdo->prepare("INSERT INTO Utilisateur (nom, email) VALUES (:nom, :email)");
        $stmt->execute([
            'nom' => $nom,
            'email' => $email
        ]);

        echo "Utilisateur ajouté avec succès.";

    } catch (PDOException $e) {

      /*------------- Log error---------------------*/ 
      
        file_put_contents('errors.log', $e->getMessage(), FILE_APPEND);
        echo "Une erreur est survenue.";
    }
}