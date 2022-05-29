<?php   

    // Verifier si la réponse donnée est correcte
    if ($_POST['bonnereponse'] == $_POST['reponse']) {
        echo "<p class='accent'>CORRECT</p>";
    }
    else {
        echo "<p class='accent'>FAUX</p>";
    }
    echo '<form action="quiz.php" method="get">';

    echo '<button type="submit" name="start_game" value="go" class="btn btn-success">Continuer le jeu</button>';
    echo '</form>';
?>