<body>
  <section class="colored-section" id="title">
    <div class="container-fluid">

<?php
ini_set('display_errors', 'on');

// Include config file
require_once("config.php");
require_once("functions.php");

entete("Recherche", "utf-8", "css/styles.css");
debut("Résultat de la recherche");

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
  // print_r($lignes);
  echo "</br>";

  echo '<center><table>
                <tr>
                <th>scientific_name</th>
                <th>family</th>
                <th>image</th>
                </tr>';

          foreach ($lignes as $ligne) {
            echo "<tr>";
            echo "<td>".$ligne['scientific_name']."</td>";
            echo "<td>".$ligne['common_name_en']."</td>";
            echo '<td><img src="images/'.$ligne['image'].'"></td>';
            echo "</tr>";
          }

          
          echo "</table></center>";
          echo "</br>";


  echo "<table>";
  echo "<th>Nom</th><th>Explication</th><th>URL</th>";
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

retour("index.html");
fin();

?>

    </div>
  </body>
</html>
