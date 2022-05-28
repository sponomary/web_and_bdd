<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="utf-8">
    <title>Projet final Web & BDD</title>
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
    <script> 
      $(function(){
        $("#DivContent").load("nav_bar.html"); 
      });
    </script> 
  </head>

  <body>
    <section class="colored-section" id="title">
    <div class="container-fluid ">
    <div id="DivContent"></div>
    </section>

    <section class="colored-section" id="bao1">
  
      <?php
          require_once("config.php");

          if ($_GET["ok"] == "select_by_scientific_name") {
            $nom = $_GET["plant_name"];

            $param_nom= '%'.$nom.'%';
            $requete = $sql->prepare("SELECT * FROM Plants WHERE scientific_name like :param_nom");
            $requete->bindValue('param_nom', $param_nom);

            $requete->execute();

            $lignes = $requete->fetchAll();
            $nb = count($lignes);
            
            if ($nb == 0) {
              echo"<legend>Pas de résultat pour ce nom :-(</legend>";
            } else {
              echo"<legend>Il y a ".$nb." résultats pour ce nom</legend>";

              echo '<center><table>
                    <tr>
                    <th>scientific_name</th>
                    <th>family</th>
                    <th>image</th>
                    </tr>';

              foreach ($lignes as $ligne) {
                echo "<tr>";
                echo "<td>".$ligne['scientific_name']."</td>";
                echo "<td>".$ligne['family']."</td>";
                echo '<td><img src="images/'.$ligne['image'].'"></td>';
                echo "</tr>";
              }

              echo "</table></center>";
            }
          }
          elseif ($_GET["ok"] == "select_by_family") {
            $param_family = $_GET["plant_family"];
            $requete = $sql->prepare("SELECT * FROM Plants WHERE family = :param_family");
            $requete->bindParam('param_family', $param_family);

            $requete->execute();

            $lignes = $requete->fetchAll();
            //print_r($lignes);
            $nb = count($lignes);
            
            if ($nb == 0) {
              echo"<legend>Pas de résultat pour cette famille :-(</legend>";
            } else {
              echo"<legend>Il y a ".$nb." résultats pour cette famille</legend>";
              echo '<center><table>
                    <tr>
                    <th>scientific_name</th>
                    <th>family</th>
                    <th>image</th>
                    </tr>';

              foreach ($lignes as $ligne) {
                echo "<tr>";
                echo "<td>".$ligne['scientific_name']."</td>";
                echo "<td>".$ligne['family']."</td>";
                echo '<td><img src="images/'.$ligne['image'].'"></td>';
                echo "</tr>";
              }

              echo "</table></center>";
            }

          } else {
            echo"<legend>marche pas</legend>";
          }

      ?>
          

              

        
      

      </div>
    </section>
  </body>

</html>
