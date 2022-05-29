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

          if ($verif == $reponse){
            echo "Correct ";
          }
          else{
            echo "Faux ";
          }

          retour("index.php");
      ?>

        </div>
    </section>
</body>

</html>