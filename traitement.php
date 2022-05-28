<!DOCTYPE html>
<html lang="fr" dir="ltr">

<head>
  <meta charset="utf-8">
  <title>Projet final Web & BD</title>
  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Montserrat|Ubuntu" rel="stylesheet">
  <!-- Lien CDN pour la CSS de Bootstrap -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" crossorigin="anonymous">
  <link rel="stylesheet" href="css/styles.css">
  <!-- Lien CDN pour Popper (librairie JS qui gère le positionnement des éléments) -->
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" crossorigin="anonymous"></script>
  <!-- Lien CDN pour Boostrap -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" crossorigin="anonymous"></script>
  <!-- Font Awesome -->
  <script src="https://kit.fontawesome.com/5ded21bbb7.js" crossorigin="anonymous"></script>
  <!-- JQuery -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="js/to-top.js"></script>
  <a id="button"></a>
  <!-- Favicon -->
  <link href="favicon.ico" rel="icon" type="image/x-icon" />
</head>

<body>
  <section class="colored-section" id="title">
    <div class="container-fluid">

<?php
ini_set('display_errors', 'on');

// Include config file
require_once("config.php");
// require_once("functions.php");

if ($_GET["ok"] == "select_by_scientific_name") {

  // Définition et envoi d’une requête avec paramètres
  $nom = $_GET["plant_name"];
  $requete = $sql->prepare("SELECT * FROM Plants WHERE scientific_name LIKE :nom");

  // Définition et protection des paramètres
  $requete->bindParam(':nom', $nom);

  // Exécution de la requête
  $resultat = $requete->execute();

  // Récupération et affichage des résultats
  $lignes = $requete->fetchAll();
  print_r($lignes);
  echo "</br>";

  echo '<center><table>
                <tr>
                <th>scientific_name</th>
                <th>family</th>
                <th>image</th>
                </tr>';


          // On affiche chaque recette une à une
          foreach ($lignes as $ligne) {
            echo "<tr>";
            echo "<td>".$ligne['scientific_name']."</td>";
            echo "<td>".$ligne['family']."</td>";
            echo '<td><img src="images/'.$ligne['image'].'"></td>';
            echo "</tr>";
          }

          
          echo "</table></center>";
          echo "</br>";

  echo "<table>";
  echo "<th>Nom</th><th>Explication</th><th>URL</th>";

  echo "TOTOTOTO";

  while($ligne = $requete->fetch(PDO::FETCH_OBJ)) {
    tab_result($ligne);
  echo "</table>";
  }

}

elseif ($_GET["ok"] == "select_by_family") {
  $nom = $_GET["plant_name"];
  $requete = $sql->prepare("SELECT * FROM Plants WHERE family = :nom");
  $requete->bindParam(':nom', $nom);
  $resultat = $requete->execute();
}

elseif ($_GET["ok"] == "select_all") {
  $requete = $sql->prepare("SELECT * FROM Plants");

  // Définition et protection des paramètres
  $requete->bindParam(':nom', $nom);

  // Exécution de la requête
  $resultat = $requete->execute();

  $lignes = $requete->fetchAll();
  foreach ($lignes as $ligne) {
    echo $ligne;
    echo "Affichage executé";
  }
  $nb_resultats = $requete->rowCount();
  echo "Nombre de résultats de la rêquete : ".$nb_resultats;
}

elseif ($_GET["ok"] == "insert") {
  echo "TEST INSERT";
}

else {
  echo "SOSOSOSOSO";
}


// header("Recherche", "utf-8", "css/styles.css");
// debut("Résultat de la recherche");


?>

    </div>
  </body>
</html>
