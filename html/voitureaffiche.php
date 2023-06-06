<?php
    $id_session = session_id();
    include "../bdd/biblio.php";
    $connexion = connexion();
    include "formTraitment.php";
    // Afficher l'URL
    $_SESSION['url'] = "voitureaffiche.php";
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../css/style.css">
    <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>
</head>
    <title>Loc'Auto</title>
<body>
<?php include "PopUpTraitment.php" ?>

    <div class='Main'>
        <?php include "ImportHeader.php"?>
        <div class='BodyPage'>
        </div>
    </div>
    <h1 class='location'>Notre parc automobile</h1>
    <?php
            $_SESSION['nb_day'] =  1;
            echo "<h2 class='location'>Tarif affiché pour 1 journée sans options</h2>" ;
    ?>
    <div class='sousTitre'></div>

    <div class="voitureLoc">
        <?php
            $con = connexion();
            $_SESSION['garage'] = 0;

            
                $sql = "SELECT modele.libelle, v.immatriculation, marque.libelle, modele.image, categorie.prix
                        FROM Voiture v
                        LEFT JOIN Location l ON v.immatriculation = l.immatriculation JOIN modele USING(id_modele) JOIN marque USING (id_marque) JOIN categorie USING (id_categorie)
                        GROUP BY modele.libelle
                        ORDER by marque.libelle ASC";
            
            $res = mysqli_query($con,$sql);
            while ($row = mysqli_fetch_row($res))
                echo"<div class='voiture'>
                    <img src='../img/bdd_auto/" . $row[3] ."'>
                    <h2> Marque : " . $row[2] . "</h2>
                    <h2> Modèle : " . $row[0] . "</h2>
                    <h2> Prix : " . $row[4] * $_SESSION['nb_day']  . "€</h2>
                </div>";
        ?>
    </div>
    <?php include "footer.php" ?>


<!-- Scripts -->
<script type='text/javascript' src='../js/pageConnexion.js'></script>

</body>
</html>