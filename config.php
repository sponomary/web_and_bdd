<?php

// Définition des paramètres
$bd = 'PlantAndLearn';
$login = 'root';
$mdp = 'root';
$serveur = 'localhost';

// Gestion des erreurs
try {
    // Connexion à MySQL avec affichage des résultats en UTF-8
    $sql = new PDO('mysql:host='.$serveur.';dbname='.$bd, $login, $mdp, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
    //echo "BDD est connéctée.";
} catch(PDOException $e) {
    die("ERROR: Could not connect. " . $e->getMessage());
}

?>
