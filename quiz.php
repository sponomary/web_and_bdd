<body>
    <section class="colored-section" id="title">
        <div class="container-fluid ">
            <div id="DivContent"></div>
    </section>

    <section class="colored-section" id="bao1">

        <?php
          require_once("config.php");
          require_once("functions.php");

          entete("Quiz", "utf-8", "css/styles.css");
          debut("Quiz");

          echo "VERSION 4";
          echo "<br />";

          # Vérifier le nombre d'entrées dans le tableau
          $requete = $sql->prepare("SELECT COUNT(*) AS max_num FROM Plants");
          $requete->execute();
          $ligne = $requete->fetch();
          $max_num = $ligne['max_num'];
          echo $max_num;
          echo "<br />";

          # Utiliser le nombre maximal d'entrées pour générer le nombre aléatoire
          $hasard = rand(0, $max_num);
          echo $hasard;
          echo "<br />";

          if ($_GET["start_game"] == "go") {

            // Saisir un nom commun en français au hasard parmi ceux existant dans la BDD
            $requete = $sql->prepare("SELECT common_name_fr FROM Plants WHERE plant_id = :param_id");
            $requete->execute(['param_id' => $hasard]);
            $source = $requete->fetch();

            echo $source['common_name_fr']; // terme dont il faut trouver l'equivalent

            echo "<legend>Q : Trouvez l'equivalent du terme ".$source['common_name_fr']." en anglais : </legend>";
        }  
        else {
          echo "Tant pis pour vous.";
        }

      ?>

        <form action="">
            <div class="col">
                <label for="options" class="form-label"> Faites le choix : </label><br />
                <?php
          
          for ($i=0; $i<3; $i++) {

            $requete = $sql->prepare("SELECT DISTINCT common_name_en FROM Plants WHERE plant_id = ROUND( RAND() * 9 ) + 1");
            $var = $requete->execute();
            echo $var;
            
            echo '<input id="option" type="radio" class="form-check-input" name="reponse" value="" />'.$var."<br />";
          }
         ?>
                <div class="col-md-12">
                    <button type=" submit" name="go" value="start_game" class="btn btn-success">Confirmer</button>
                </div>
            </div>
        </form>

        <?php   
          // Récuperer la réponse
          $reponse = $_GET["confirmer"];

          // Verifier si la réponse donnée est correcte
          if ($source == $reponse ) {
            echo "<p>Correct</p>";
            echo '<button type=" submit" name="ok" value="confirmer" class="btn btn-success">Continuer</button>';
          }
          else {
            echo "<p>Faux</p>";
          }

          retour("index.php");
          
        ?>

        </div>
    </section>
</body>

</html>