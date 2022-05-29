<body>
    <script type="text/javascript">
    // Mettez le code Jquery ici.
    </script>
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

            echo "<legend>Q : Trouvez l'equivalent du terme \"".$source['common_name_fr']."\" en anglais : </legend>";

            $requete = $sql->prepare("SELECT `plant_id`, `common_name_en` FROM `Plants` WHERE `plant_id` = :param_id UNION ALL
            (SELECT `plant_id`, `common_name_en` FROM `Plants` WHERE `plant_id` != :param_id ORDER BY RAND() limit 5) ORDER BY RAND()");
            $requete->execute(['param_id' => $hasard]);
            $lignes = $requete->fetchAll();

            ?>

        <form enctype="multipart/form-data" method="post">
            <div class="col">
                <div class="radio-left">

                <?php
                foreach ($lignes as $ligne) {
                  echo "<input id='reponse' type='radio' class='form-check-input' name='reponse' value='".$ligne['plant_id']."'>".$ligne['common_name_en']."<br />";
                }
                ?>
                </div>
                <input id="bonnereponse" name="bonnereponse" type="hidden" value="<?php echo $hasard; ?>">
                <div class="col-md-12">
                    <input type="button" id="confirmer" name="confirmer" class="btn btn-success" value="Confirmer">
                </div>
            </div>
        </form>
        <script>
        $(document).ready(function() {
            $(document).on("click", "#confirmer", function() {
                var Val = $("input[name=reponse]:checked").val();
                $("#chargement").load("resultats.php", {
                    bonnereponse: document.getElementById('bonnereponse').value,
                    reponse: Val,
                });
                $.ajaxSetup({
                    cache: false
                })
            });
        });
        </script>
        <div id="chargement"></div>

        </div>

        </div>
    </section>
</body>

</html>