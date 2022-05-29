<?php

// Affiche le <head> de HTML
function entete($title, $charset, $stylesheet) {
    echo "<!DOCTYPE html>";
    echo "<html lang=\"fr\" dir=\"ltr\">";
    echo "<head>";

    echo "<meta http-equiv=\"Content-Type\" content=\"text/html;charset=".$charset."\"/>";
    echo "<title>".$title."</title>";

    echo "<!-- Google Fonts -->";
    echo "<link href=\"https://fonts.googleapis.com/css?family=Montserrat|Ubuntu\" rel=\"stylesheet\">";

    echo "<!-- Lien CDN pour la CSS de Bootstrap -->";
    echo "<link rel=\"stylesheet\" href=\"https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css\" crossorigin=\"anonymous\">";
    echo "<link rel=\"stylesheet\" href=\"".$stylesheet."\"/>";

    echo "<!-- Lien CDN pour Popper (librairie JS qui gère le positionnement des éléments) -->";
    echo "<script src=\"https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js\" crossorigin=\"anonymous\"></script>";

    echo "<!-- Lien CDN pour Boostrap -->";
    echo "<script src=\"https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js\" crossorigin=\"anonymous\"></script>";

    echo "<!-- Font Awesome -->";
    echo "<script src=\"https://kit.fontawesome.com/5ded21bbb7.js\" crossorigin=\"anonymous\"></script>";

    echo "<!-- JQuery -->";
    echo "<script src=\"https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js\"></script>";
    echo "<script src=\"js/to-top.js\"></script>";
    echo "<a id=\"button\"></a>";

    echo "<!-- Favicon -->";
    echo "<link href=\"favicon.ico\" rel=\"icon\" type=\"image/x-icon\" />";

    echo "<script>";
    echo "$(function() {";
    echo "$(\"#DivContent\").load(\"nav_bar.html\");";
    echo "});";
    echo "</script>";

    echo "</head>";

    echo "<body class=\"colored-section\">";
  }



// Génère le logo, le bandeau et le menu de chaque page
function debut($titre) {
  echo "<div class=\"container-fluid\">";
  echo "<h1 class=\"big-heading\">".$titre."</h1>";
}

// Génère un tableau d'affichage des résultats
function tab_result($values) {
  echo "<tr>";
  foreach ($values as $value)
  {
    echo "<td>".$value."</td>";
  }
  echo "</tr>";
}

// Génère une liste à puces
function liste_a_puces($values) {
  echo "<ul>";
  foreach ($values as $value){
    echo "<li>".$value."</li>";
  }
  echo "</ul>";
}

// Génère une page de retour au formulaire (en cas de problème notamment)
function retour($page) {
  echo "<p><a href=\"./".$page."\"><button type=\"button\" class=\"btn btn-light spaced\">Retour à la page principale</button></a></p>";
}
  
?>