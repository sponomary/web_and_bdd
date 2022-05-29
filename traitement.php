<body>
    <section class="colored-section" id="title">
        <div class="container-fluid ">
            <div id="DivContent"></div>
    </section>

    <section class="colored-section" id="bao1">

        <?php
          require_once("config.php");
          require_once("functions.php");

          entete("Recherche", "utf-8", "css/styles.css");
          debut("Résultat de la recherche");

          if ($_GET["ok"] == "select_by_scientific_name") {
            $nom = $_GET["plant_name"];

            $param_nom= '%'.$nom.'%';
            $requete = $sql->prepare("SELECT * FROM Plants WHERE 
            LOWER(scientific_name) LIKE LOWER(:param_nom) OR 
            LOWER(common_name_en) LIKE LOWER(:param_nom) OR 
            LOWER(common_name_fr) LIKE LOWER(:param_nom) OR 
            LOWER(common_name_ru) LIKE LOWER(:param_nom)");
            $requete->bindValue('param_nom', $param_nom);

            $requete->execute();

            $lignes = $requete->fetchAll();
            $nb = count($lignes);
            
            if ($nb == 0) {
              echo"<legend>Pas de résultat pour ce nom :-(</legend>";
            } else {
              echo"<legend>Il y a ".$nb." résultats pour ce nom</legend>";

              echo '<center><table class="table table-striped">
                  <thead>
                    <tr>
                      <th scope="col>Nom scientifique</th>
                      <th scope="col>Family</th>
                      <th scope="col>Nom commun EN</th>
                      <th scope="col>Nom commun FR</th>
                      <th scope="col>Nom commun RU</th>
                      <th scope="col>Image</th>
                    </tr>
                  </thead>
                  <tbody>';

              foreach ($lignes as $ligne) {
                echo "<tr>";
                echo "<td>".$ligne['scientific_name']."</td>";
                echo "<td>".$ligne['family']."</td>";
                echo "<td>".$ligne['common_name_en']."</td>";
                echo "<td>".$ligne['common_name_fr']."</td>";
                echo "<td>".$ligne['common_name_ru']."</td>";
                echo '<td><img src="images/'.$ligne['image'].'"></td>';
                echo "</tr>";
              }
              echo "</tbody></table></center>";
            }
          }
          elseif ($_GET["ok"] == "select_by_family") {
            $param_family = $_GET["plant_family"];
            $requete = $sql->prepare("SELECT * FROM Plants WHERE 
            LOWER(family) LIKE LOWER(:param_family)");
            $requete->bindParam('param_family', $param_family);

            $requete->execute();

            $lignes = $requete->fetchAll();
            $nb = count($lignes);
            
            if ($nb == 0) {
              echo"<legend>Pas de résultat pour cette famille :-(</legend>";
            } else {
              echo"<legend>Il y a ".$nb." résultats pour cette famille</legend>";
              echo '<center><table class="table table-striped">
                    <tr>
                    <th scope="col>Nom scientifique</th>
                    <th scope="col>Family</th>
                    <th scope="col>Nom commun EN</th>
                    <th scope="col>Nom commun FR</th>
                    <th scope="col>Nom commun RU</th>
                    <th scope="col>Image</th>
                    </tr></thead><tbody>';

              foreach ($lignes as $ligne) {
                echo "<tr>";
                echo "<td>".$ligne['scientific_name']."</td>";
                echo "<td>".$ligne['family']."</td>";
                echo "<td>".$ligne['common_name_en']."</td>";
                echo "<td>".$ligne['common_name_fr']."</td>";
                echo "<td>".$ligne['common_name_ru']."</td>";
                echo '<td><img class="plant-image-search img-fluid img-thumbnail mx-auto d-block" src="images/'.$ligne['image'].'"></td>';
                echo "</tr>";
              }

              echo "</tbody></table></center>";
            }

          } else {
            echo"<legend>marche pas</legend>";
          }

          retour("index.php");
      ?>

        </div>
    </section>
</body>

</html>