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

          echo "VERSION 12";
          echo "<br />";

        //if ($_GET["start_game"] == "go") {
          # Vérifier le nombre d'entrées dans le tableau
          $requete = $sql->prepare("SELECT COUNT(*) AS max_num FROM Plants");
          $requete->execute();
          $ligne = $requete->fetch();
          $max_num = $ligne['max_num'];

          # Utiliser le nombre maximal d'entrées pour générer le nombre aléatoire
          $hasard = rand(0, $max_num);
       
          echo "<br />";

          //

            // Saisir un nom commun en français au hasard parmi ceux existant dans la BDD
            $requete = $sql->prepare("SELECT common_name_fr FROM Plants WHERE plant_id = :param_id");
            $requete->execute(['param_id' => $hasard]);
            $source = $requete->fetch();

            echo "<legend>Q : Trouvez l'equivalent du terme ".$source['common_name_fr']." en anglais : </legend>";

            $requete = $sql->prepare("SELECT `plant_id`, `common_name_en` FROM `Plants` WHERE `plant_id` = :param_id UNION ALL
            (SELECT `plant_id`, `common_name_en` FROM `Plants` WHERE `plant_id` != :param_id ORDER BY RAND() limit 5) ORDER BY RAND()");
            $requete->execute(['param_id' => $hasard]);
            $lignes = $requete->fetchAll();

            ?>

            <iframe id="myIframe" name="myIframe" width="0" height="0" frameborder="0"></iframe>
            <form action="quiz.php" target="myIframe" method="POST">
              <div class="col">
                <label for="options" class="form-label"> Faites le choix : </label><br />

            <?php
            foreach ($lignes as $ligne) {
              echo "<input id='option' type='radio' class='form-check-input' name='reponse' value='".$ligne['plant_id']."'>".$ligne['common_name_en']."<br />";
            }

            ?>
              <div class="col-md-12">
                <button type="submit" name="confirmer" class="btn btn-success">Confirmer</button>
              </div>
            </div>
          </form>


          <?php   

            if(isset($_POST['confirmer']))
            {
              // Récuperer la réponse
              $reponse = $_POST["reponse"];
              echo "<br/>";
              echo $hasard;
              echo "<br/>";
              echo $reponse;
              echo "<br/>";

              // Verifier si la réponse donnée est correcte
              if ($hasard == $reponse ) {
                echo "<p>Correct</p>";
                echo '<button type=" submit" name="ok" value="confirmer" class="btn btn-success">Continuer</button>';
              }
              else {
                echo "<p>Faux</p>";
              }

            }
  
        //}  
        //else {
          //echo "Tant pis pour vous.";
       // }

      ?>

       

        

        </div>
    </section>
</body>

</html>