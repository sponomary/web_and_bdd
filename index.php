<!DOCTYPE html>
<html lang="fr" dir="ltr">

<head>
    <meta charset="utf-8">
    <title>Projet Web & BDD</title>
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat|Ubuntu" rel="stylesheet">
    <!-- Lien CDN pour la CSS de Bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css"
        crossorigin="anonymous">
    <link rel="stylesheet" href="css/styles.css">
    <!-- Lien CDN pour Popper (librairie JS qui gère le positionnement des éléments) -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" crossorigin="anonymous">
    </script>
    <!-- Lien CDN pour Boostrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" crossorigin="anonymous">
    </script>
    <!-- Font Awesome -->
    <script src="https://kit.fontawesome.com/5ded21bbb7.js" crossorigin="anonymous"></script>
    <!-- JQuery -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="js/to-top.js"></script>
    <a id="button"></a>
    <!-- Favicon -->
    <link href="favicon.ico" rel="icon" type="image/x-icon" />
    <script>
    $(function() {
        $("#DivContent").load("nav_bar.html");
    });
    </script>
</head>

<body>
    <section class="colored-section" id="title">
        <div class="container-fluid">

            <!-- Nav Bar -->
            <div id="DivContent"></div>

            <!-- Présentation -->
            <div class="presentation">

                <h2 class="big-heading">Présentation</h2>
                <p>Ce site contient l'ensemble des résultats obtenus lors la réalisation du projet du cours "Web et
                    bases de données" dispensé par Sarra El Hayari dans le cadre du master TAL 2 (Ingenirie Multilingue)
                    à
                    l'INALCO. Le projet a pour le but de créer un site Internet, avec interaction dynamique avec une
                    base de données. L’idée est d'utiliser tout ce nous avons vu en cours : HTML5, CSS, SQL et PHP.
                    Avant de commencer les tâches, nous avons
                    défini le sujet suivant :
                <ul class="fa-ul">
                    <li><span class="fa-li"><i class="fas fa-check-square"></i></span>Consultation / recherche via
                        SELECT. L'utilisateur aura l'accès aux équivalents du terme sur les autres langues, ainsi que
                        des exemples d'utilisation. Vu que, par exemple,
                        les noms scientifiques des plantes sont en latin et seront peut-être les mêmes dans 3 langues,
                        je vais utiliser les noms courants</li>
                    <li><span class="fa-li"><i class="fas fa-check-square"></i></span>Création de ses propres listes des
                        termes préférés via CREATE/UPDATE pour ensuite les consulter, réviser avec la possibilité de
                        supprimer si besoin (DELETE).</li>
                    <li><span class="fa-li"><i class="fas fa-check-square"></i></span>Les quiz / mini jeux terminologies
                        basés sur les listes personnalisées.</li>
                </ul>
                </p>
                <p>Je vais, du coup, ajouter la possibilité de créer un compte et s'y connecter peut-être (si j'arrive).
                </p>
            </div>
    </section>

    <!-- Fonctionnalité 1 -->
    <section class="white-section" id="func1">
        <div class="container-fluid">
            <header class="bao-head">
                <div>
                    <h3>Consultation du contenu de la base terminologique</h3>
                </div>
            </header>
            <br />

            <form class="" action="traitement.php" method="get">
                <!-- éléments du formulaire -->
                <fieldset class="spaced">

                    <div class="bao">
                        <h5>Description</h5>
                        <p>Dans cette partie l'utilisateur peut effectuer une recherche d'un terme dans la base de
                            données. Pour cela, nous avons utilisé un formulaire </p>
                        <br />
                    </div>

                    <div class="row g-3">
                        <div class="col-md-6">
                            <label for="family" class="form-label">Par famille :</label><br />

                            <select name="plant_family">

                                <?php

              require_once("config.php");
              $requete = $sql->prepare("SELECT * FROM Families order by family_name");
              $requete->execute();
              $lignes = $requete->fetchAll();

              foreach ($lignes as $ligne) {
                echo "<option value='".$ligne['family_id']."'>".$ligne['family_name']."</option>";
              }

              ?>
                            </select>
                        </div>

                        <div class="col-md-6">
                            <label for="name" class="form-label">Par nom :</label>
                            <input id="name" name="plant_name" type="text" class="form-control"
                                placeholder="Quelques exemples" list="plants">

                            <datalist id="plants">

                                <?php

              require_once("config.php");
              $requete = $sql->prepare("SELECT scientific_name FROM `Plants` limit 4");
              $requete->execute();
              $lignes = $requete->fetchAll();

              foreach ($lignes as $ligne) {
                echo "<option value='".$ligne['scientific_name']."'>";
              }

            ?>

                            </datalist>
                        </div>
                    </div>

                </fieldset>
                <div class="row g-3">
                    <div class="col-md-6">
                        <button type="submit" name="ok" value="select_by_family" class="btn btn-success">Rechercher par
                            famille
                        </button>
                    </div>

                    <div class="col-md-6">
                        <button type="submit" name="ok" value="select_by_scientific_name"
                            class="btn btn-success">Rechercher par nom
                        </button>
                    </div>
                </div>
            </form>

        </div>
    </section>

    <!-- Fonctionnalité 2 -->
    <section class="colored-section">
        <div class="container-fluid">
            <header class="bao-head">
                <div>
                    <h3>Creation de ses propres listes des termes préférés via CREATE/UPDATE pour ensuite les consulter,
                        reviser avec la possibilité de supprimer si plus besoin (DELETE)</h3>
                </div>
            </header>
            <p>Ceci est un tesst</p>


            <form class="" action="traitement.php" method="get">
                <!-- éléments du formulaire -->
                <fieldset>
                    <legend>Informations personnelles</legend>
                    <div class="row g-3">
                        <div class="col">
                            <label for="civ_emprunteur" class="form-label">Civilité :</label><br />
                            <input id="mme" type="radio" class="form-check-input" name="civi" value="Madame" /> Madame
                            <input id="mr" type="radio" class="form-check-input" name="civi" value="Monsieur"
                                checked="checked" /> Monsieur
                            <input id="n/r" type="radio" class="form-check-input" name="civi" value="Non renseigné" />
                            Non renseigné
                        </div>
                        <div class="col">
                            <label for="nom_emprunteur" class="form-label">Emprunteur :</label><br />
                            <input id="nom_emprunteur" name="nom_prenom" type="text" class="form-control" maxlength="40"
                                placeholder="Indiquez votre nom et prénom" required />
                        </div>
                        <div class="col">
                            <label for="num_emprunteur" class="form-label">Numéro d'adhérent (7 chiffres)
                                :</label><br />
                            <input id="num_emprunteur" name="num_adhesion" type="text" class="form-control"
                                pattern="[0-9]{7}" placeholder="Indiquez votre numéro d'adhesion" required />
                        </div>
                    </div>
                    <br />
                    <div class="row g-3">
                        <div class="col">
                            <label for="email_utilisateur" class="form-label">Email :</label><br />
                            <input id="emailHelp" name="email" type="email" aria-describedby="emailHelp"
                                class="form-control" placeholder="name@example.com" required />
                            <div id="emailHelp" class="form-text">Nous n'allons pas partager vos données personnelles.
                            </div>
                        </div>
                        <div class="col">
                            <label for="nom_utilisateur" class="form-label">Téléphone :</label><br />
                            <input id="tel_emprunteur" name="telephone" type="tel" class="form-control"
                                pattern="(07|06)[0-9]{7}" placeholder="Indiquez votre numéro de téléphone" required />
                        </div>
                    </div>
                </fieldset>
                <br />
                <fieldset>
                    <legend>Informations sur l'emprunt</legend>
                    <div class="mb-3">
                        <label for="type_emprunt" class="form-label">Type d'emprunt :</label><br />
                        <select>
                            <option value="1">Livre</option>
                            <option value="2">Journal, revue</option>
                            <option value="3">Publication</option>
                            <option value="4">Autre</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="nom_utilisateur" class="form-label">Motivation d'emprunt :</label><br />
                        <input type="checkbox" class="form-check-input" name="motivation[]" value="aide scolaire"
                            id="aide_scolaire" /> Aide scolaire
                        <input type="checkbox" class="form-check-input" name="motivation[]" value="recherches"
                            id="recherches" /> Recherches
                        <input type="checkbox" class="form-check-input" name="motivation[]" value="divertissement"
                            id="divertissement" /> Divertissement
                    </div>
                    <div class="mb-3">
                        <label for="type_emprunt" class="form-label">Auteur :</label><br />
                        <input type="text" class="form-control" placeholder="Quelques exemples" list="auteurs">
                        <datalist id="auteurs">
                            <option value="Victor Hugo">
                            <option value="Jules Verne">
                            <option value="Émile Zola">
                            <option value="J.K. Rowling">
                            <option value="Fiodor Dostoïevski">
                            <option value="Mathieu Valette">
                        </datalist>
                    </div>
                    <div class="mb-3">
                        <label for="nom_emprunt" class="form-label">Nom d'emprunt (optionnel) :</label><br />
                        <input id="nom" name="nom_emprunt" type="text" class="form-control" maxlength="50"
                            placeholder="Par ex., Approche textuelle pourle traitement automatique du discours évaluatif" />
                    </div>
                    <div class="row g-3">
                        <div class="col">
                            <label for="isbn_emprunt" class="form-label">Code ISBN :</label><br />
                            <input id="isbn" name="isbn" type="text" class="form-control"
                                pattern="[0-9]{1}-[0-9]{4}-[0-9]{4}-[0-9]{1}" placeholder="Par ex., 2-7654-1005-4" />
                        </div>
                        <div class="col">
                            <label for="nbr_exemp" class="form-label">Nombre d'exemplaires (5 max.):</label><br />
                            <input id="num_emprunteur" name="num_adhesion" type="number" class="form-control"
                                pattern="[1-5]{1}" placeholder="Par ex. 1" required />
                        </div>
                    </div>
                    <br />
                    <div class="row g-3">
                        <div class="col">
                            <label for="date_emprunt" class="form-label">Date prêt :</label><br />
                            <input type="date" class="form-control" />
                        </div>
                        <div class="col">
                            <label for="dae_rendu" class="form-label">A rendre le :</label><br />
                            <input type="date" class="form-control" />
                        </div>
                    </div>
                </fieldset>
                <br />
                <fieldset>
                    <legend>Autre</legend>
                    <div class="mb-3">
                        <label for="misc" class="form-label">Commentaires, remarques : </label><br />
                        <textarea class="form-control">
    Dites-nous ce que vous en pensez !
    </textarea>
                    </div>
                </fieldset>
                <form action="">
                    <button type="submit" class="btn btn-info">Confirmer</button>
                </form>
            </form>



        </div>
    </section>

    <!-- Fonctionnalité 3 -->
    <section class="white-section">
        <div class="container-fluid">
            <header class="bao-head">
                <div>
                    <h3>Mini Quizz</h3>
                </div>
            </header>
            <br />
            <p>Dans cette partie vous pouvez vérifier vos connaissances en matière de noms de plantes vertes d'intérieur
                en trois langues.</p>
            <form action="quiz.php" method="get">
                
                <button type="submit" name="start_game" value="go" class="btn btn-success">Commencer le
                    jeu</button>
            </form>
        </div>
    </section>


    <!-- Conclusion Section -->

    <section class="colored-section" id="conclusion">

        <div class="container-fluid">

            <div class="presentation">
                <h2 class="big-heading">Conclusion</h2>
                <p>Blablabla :
                <ul>
                    <li><a class="text-light" href="https://getbootstrap.com/" target="_blank">Framework Bootstrap</a>,
                        une collection d'outils utiles à la création du design de sites (j’ai utilisé v4.6)
                    <li><a class="text-light" href="https://fontawesome.com/" target="_blank">Font Awesome</a>, une
                        collection d'icônes</li>
                    <li><a class="text-light" href="https://fonts.google.com/" target="_blank">Google Fonts</a>, une
                        collection gratuite de polices d'écritures</li>
                    <li><a class="text-light" href="https://highlightjs.org/" target="_blank">Highlight.js</a>, un
                        surligneur de syntaxe écrit en JavaScript</li>
                    </p>
            </div>

        </div>

    </section>

    <!-- Photo Section -->

    <section class="white-section" id="tools">

        <div class="container-fluid">

            <!-- Carousel -->
            <h3>Voici le carousel avec trois images : </h3>
            <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-indicators">
                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0"
                        class="active" aria-current="true" aria-label="Slide 1"></button>
                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"
                        aria-label="Slide 2"></button>
                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2"
                        aria-label="Slide 3"></button>
                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="3"
                        aria-label="Slide 4"></button>
                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="4"
                        aria-label="Slide 5"></button>
                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="5"
                        aria-label="Slide 6"></button>
                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="6"
                        aria-label="Slide 7"></button>
                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="7"
                        aria-label="Slide 8"></button>
                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="8"
                        aria-label="Slide 9"></button>
                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="9"
                        aria-label="Slide 10"></button>

                </div>
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img class="plant-image"
                            src="https://images.unsplash.com/photo-1617693322135-13831d116f79?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=765&q=80"
                            class="d-block w-100" alt="...">
                    </div>
                    <div class="carousel-item">
                        <img class="plant-image"
                            src="https://images.unsplash.com/photo-1622479303268-c7be347dfaf3?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=764&q=80"
                            class="d-block w-100" alt="...">
                    </div>
                    <div class="carousel-item">
                        <img class="plant-image"
                            src="https://images.unsplash.com/photo-1623910935919-02ed22d54bd8?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=764&q=80"
                            class="d-block w-100" alt="...">
                    </div>
                    <div class="carousel-item">
                        <img class="plant-image"
                            src="https://images.unsplash.com/photo-1620311497344-bce841c9c060?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=765&q=80"
                            class="d-block w-100" alt="...">
                    </div>
                    <div class="carousel-item">
                        <img class="plant-image"
                            src="https://images.unsplash.com/photo-1609142621730-db3293839541?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=764&q=80"
                            class="d-block w-100" alt="...">
                    </div>
                    <div class="carousel-item">
                        <img class="plant-image"
                            src="https://images.unsplash.com/photo-1645605172209-19c0ffd4b9e7?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=764&q=80"
                            class="d-block w-100" alt="...">
                    </div>
                    <div class="carousel-item">
                        <img class="plant-image"
                            src="https://images.unsplash.com/photo-1642511271208-1c149222e5f4?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=928&q=80"
                            class="d-block w-100" alt="...">
                    </div>
                    <div class="carousel-item">
                        <img class="plant-image"
                            src="https://images.unsplash.com/photo-1633789242145-30a264c28dd2?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=764&q=80"
                            class="d-block w-100" alt="...">
                    </div>
                    <div class="carousel-item">
                        <img class="plant-image"
                            src="https://images.unsplash.com/photo-1632320208754-37317b24b156?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=764&q=80"
                            class="d-block w-100" alt="...">
                    </div>
                    <div class="carousel-item">
                        <img class="plant-image"
                            src="https://images.unsplash.com/photo-1623910935919-02ed22d54bd8?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=764&q=80"
                            class="d-block w-100" alt="...">
                    </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators"
                    data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators"
                    data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
                <p>Source des photos : <a href="https://unsplash.com/@feeypflanzen">Severin Candrian (feey.ch)</a></p>
            </div>

        </div>

    </section>


    <!-- Pied de page -->

    <footer class="white-section" id="footer">
        <div class="container-fluid">
            <ul class="nav justify-content-center border-bottom pb-3 mb-3">
                <li class="nav-item"><a href="#" class="nav-link px-2 text-muted">Plantes rendent heureux</a></li>
                <li class="nav-item"><a href="#" class="nav-link px-2 text-muted">Plantes purifient l'air</a></li>
                <li class="nav-item"><a href="#" class="nav-link px-2 text-muted">Plantes donnent du style</a></li>
            </ul>
            <a class="text-dark" href="https://www.linkedin.com/in/alexandra-ponomareva-22228710b/" target="_blank"><i
                    class="social-icon fab fa-linkedin"></i></a>
            <a class="text-dark" href="mailto:alex.ponomaryova@gmail.com" target="_blank"><i
                    class="social-icon fas fa-envelope"></i></a>
            <p>© <script>
                document.write(new Date().getFullYear())
                </script> Alexandra Ponomareva 🌱</p>
        </div>
    </footer>
</body>

</html>