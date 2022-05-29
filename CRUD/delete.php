<?php
/* Verifiez si le paramettre id existe */
if(isset($_GET["id"]) && !empty(trim($_GET["id"]))){
  require_once("../config.php");

  $param_id= $_GET["id"];
  $requete = $sql->prepare("SELECT * FROM Plants WHERE plant_id = :param_id");
  $requete->execute(['param_id' => $param_id]);
  $ligne = $requete->fetch();

  $scientific_name= $ligne['scientific_name'];
  $family=$ligne['family'];
  $common_name_en=$ligne['common_name_en'];
  $common_name_fr=$ligne['common_name_fr'];
  $common_name_ru=$ligne['common_name_ru'];
  $note=$ligne['common_name_ru'];
}
?> 

 <!DOCTYPE html>
<html lang="fr" dir="ltr">

<head>
  <meta charset="utf-8">
  <title>Projet final Web & BDD</title>
  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Montserrat|Ubuntu" rel="stylesheet">
  <!-- Lien CDN pour la CSS de Bootstrap -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" crossorigin="anonymous">
  <link rel="stylesheet" href="../css/styles.css">
  <!-- Lien CDN pour Popper (librairie JS qui gère le positionnement des éléments) -->
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" crossorigin="anonymous"></script>
  <!-- Lien CDN pour Boostrap -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" crossorigin="anonymous"></script>
  <!-- Font Awesome -->
  <script src="https://kit.fontawesome.com/5ded21bbb7.js" crossorigin="anonymous"></script>
  <!-- JQuery -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="../js/to-top.js"></script>
  <script> 
    $(function(){
      $("#DivContent").load("../nav_bar.html"); 
    });
  </script> 
</head>

<body>
<section class="colored-section" id="title">
<div class="container-fluid">
    <div id="DivContent"></div>
</section>
 <!-- Fonctionnalité 2 -->
 <section class="colored-section">
    <div class="container-fluid">
      <header class="bao-head">
        <div>
          <h3>Supprimer une plante</h3>
          <br />
        </div>
      </header>

      <form method="POST" action="" enctype="multipart/form-data">
        <!-- éléments du formulaire -->
        <fieldset>
          <legend>Informations</legend>
          <div class="row g-3">

            <div class="col">
              <label for="scientific_name" class="form-label">Nom :</label>
            </div>
            <div class="col">
              <input id="scientific_name" name="scientific_name" type="text"  value="<?php echo $scientific_name; ?>" class="form-control" maxlength="40" placeholder="Indiquez le nom scientifique" required />
            </div>

          </div>
          <br />
          <div class="row g-3">  

            <div class="col">
              <label for="Family_plant" class="form-label">Famille de plante : </label><br />
            </div>
            <div class="col">
              <select name="plant_family" value=<?php echo $family;?>>
              <?php
                require_once("../config.php");
                $requete = $sql->prepare("SELECT * FROM Families order by family_name");
                $requete->execute();
                $lignes = $requete->fetchAll();
                foreach ($lignes as $ligne) {
                  echo "<option ".($family == $ligne['family_id'] ? 'selected="selected"' : '')." value='".$ligne['family_id']."'>".$ligne['family_name']."</option>";
                }
              ?>
              </select>
            </div>
          </div>
          <br />
          <div class="row g-3">

            <div class="col">
              <label for="common_name_en" class="form-label">Nom Anglais : </label>
            </div>
            <div class="col">
              <input id="common_name_en" name="common_name_en" type="text" value="<?php echo $common_name_en; ?>" class="form-control" maxlength="40" placeholder="Indiquez le nom en anglais" required />
            </div>
          </div>
          <br />
          <div class="row g-3">
            <div class="col">
              <label for="common_name_fr" class="form-label">Nom Français : </label>
            </div>
            <div class="col">
              <input id="common_name_fr" name="common_name_fr" type="text" value="<?php echo $common_name_fr; ?>" class="form-control" maxlength="40" placeholder="Indiquez le nom en français" required />
            </div>
          </div>
          <br />
          <div class="row g-3">
            <div class="col">
              <label for="common_name_ru" class="form-label">Nom Russe : </label>
            </div>
            <div class="col">
              <input id="common_name_ru" name="common_name_ru" type="text" value="<?php echo $common_name_ru; ?>" class="form-control" maxlength="40" placeholder="Indiquez le nom en russe" required />
            </div>
          </div>
          <br />
          <br />
        </fieldset>
        <fieldset>
          <legend>Photo de la plante</legend>
          <div class="row g-3">
            <div class="col">
              <label for="file">Fichier :</label>
            </div>
            <div class="col">
              <input type="file" name="file">
            </div>
          </div>
          <br />
        </fieldset>
        <br />
        <fieldset>
          <legend>Note</legend>
          <div class="mb-3">
            <textarea id="note" name="note" class="form-control" value="<?php echo $note; ?>" placeholder="Dites-nous ce que vous en pensez !"><?php echo $note; ?></textarea>
          </div>
        </fieldset>
        <button type="submit" name="submit" class="btn btn-danger">Supprimer</button>
      </form>
      <?php 
      if(isset($_POST['submit']))
      { 
        echo '<br />';
        require_once("../config.php");

        $requete = $sql->prepare("DELETE FROM Plants WHERE plant_id = :param_id");
        $requete->execute(['param_id' => $param_id]);

        if($requete){
          echo "La suppression s'est bien déroulée"; 
        }else{
          echo "Erreur lors de l'a supression"; 
        }

      }?>


    </div>
  </section>

  </body>

</html>