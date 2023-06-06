<?php
    $id_session = session_id();
    include "../bdd/biblio.php";
    $connexion = connexion();
    include "formTraitment.php";
    $_SESSION['url'] = "reservation.php?voiture=" . $_GET["voiture"];
    if(!isset($_SESSION['nb_day'])){
        $_SESSION['nb_day'] = 1;
        $_SESSION['garage'] = "";
    }
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="icon" href="../img/logo_blanc_noir.png">
    <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>
    <title>Loc'Auto</title>
<body>
    <!-- Remettre les valeurs des formulaires s'ils sont mal renseignés -->
    <?php include "PopUpTraitment.php" ?>
    <div class='Main'>
        <?php include "ImportHeader.php"?>
        <h2><a class="retour" href="voiture.php">Retour</a></h2>

        <?php
            if(isset($_GET["voiture"])){
                $con = connexion();
                $sql = "SELECT image, modele.libelle, marque.libelle, puissance, categorie.libelle, prix
                FROM voiture  JOIN modele USING (id_modele) JOIN marque USING (id_marque) JOIN categorie USING(id_categorie)
                WHERE immatriculation='". $_GET["voiture"] ."';";
                $res = mysqli_query($con,$sql);
                while ($row = mysqli_fetch_row($res)) {
                    echo "
                        <h1 class='location'>" . $row[2] . " : ".$row[1] . "</h1>
                        <div class='toutpres'>
                            <div class='presVoit'>
                                <div class='presVoitG'>
                                    <img src='../img/bdd_auto/" . $row[0] . "'>
                                </div>
                                <div class='presVoitD'>
                                    <ul>
                                        <li> <div class='aa'> Marque : </div>" . $row[2] . "</li>
                                        <li> <div class='aa'> Modèle : </div>" . $row[1] . "</li>
                                        <li> <div class='aa'> Puissance : </div>" . $row[3] . " cheveaux</li>
                                        <li> <div class='aa'> Catégorie : </div>" . $row[4] . "</li>
                                        <li> <div class='aa'> Prix : </div>" . $row[5] * $_SESSION['nb_day'] + $_SESSION['garage'] . "€</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                            ";
                            if($_SESSION['garage'] == "") {

                            } else {
                                if($_SESSION['connected'] == 'true'){
                                    if($_SESSION['idtype'] == 1){
                                        echo"salam";
                                    } else {
                                        echo"salam les royas";
                                    }
                                } else {
                                    echo"<p class='btn2' id='bugguer'>Se connecter</p>";
                            }
                            }

                }

            } else {
                header("Location: location.php");
            }
        ?>
    </div>
    <?php include "footer.php" ?>

<!-- Scripts -->
<script type='text/javascript' src='../js/pageConnexion.js'></script>
</body>
</html>