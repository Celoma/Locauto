<?php
    $id_session = session_id();
    include "../bdd/biblio.php";
    $connexion = connexion();
    include "formTraitment.php";
    // Afficher l'URL
    $_SESSION['url'] = "location.php";
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
    <h1 class='location'>Louer la voiture de votre rêve</h1>
    <?php
        if(isset($_POST["datedebut"])){
                $_SESSION['datedebut'] = $_POST['datedebut'];
                $_SESSION['datefin'] = $_POST['datefin'];
                $_SESSION['villeDepart'] = $_POST['villeDepart'];
                $_SESSION['villeArrive'] = $_POST['villeArrive'];
                $_SESSION['modele'] = $_POST['modele'];
                $_SESSION['marque'] = $_POST['marque'];
        }
        if(isset($_SESSION['datedebut'])){
            $date1 = new DateTime($_SESSION['datedebut']);
            $date2 = new DateTime($_SESSION['datefin']);
            $interval = $date1->diff($date2);
            $numberOfDays = $interval->days;
            $_SESSION['nb_day'] = $numberOfDays + 1;
            echo "<h2 class='location'>Réservation pour " . $numberOfDays + 1 . " jours</h2>" ;
        } else {
            $_SESSION['nb_day'] =  1;
            echo "<h2 class='location'>Réservation pour 1 jour</h2>" ;
        }

    ?>
    <div class='sousTitre'></div>

    <div class="voitureLoc">
        <?php
            $con = connexion();
            $garage = 0;
            if(isset($_SESSION['datedebut'])){
                $date_debut = $_SESSION['datedebut'];
                $date_fin = $_SESSION['datefin'];
                $nom_de_la_ville = $_SESSION['villeDepart'];
                $nom_de_la_ville2 = $_SESSION['villeArrive'];
                if($nom_de_la_ville != $nom_de_la_ville2){
                    $garage = 250;
                }
                if($_SESSION['modele'] != ""){
                    $modele = $_SESSION['modele'];

                    $sql = "SELECT modele.libelle, v.immatriculation, marque.libelle, modele.image, categorie.prix
                    FROM Voiture v
                    LEFT JOIN Location l ON v.immatriculation = l.immatriculation JOIN modele USING(id_modele) JOIN marque USING (id_marque) JOIN categorie USING (id_categorie)
                    WHERE v.id_garage = '$nom_de_la_ville' AND v.id_modele = '$modele'
                        AND (
                            (l.date_debut IS NULL AND l.date_fin IS NULL)
                            OR NOT (
                                (l.date_debut BETWEEN '$date_debut' AND '$date_fin')
                                OR (l.date_fin BETWEEN '$date_debut' AND '$date_fin')
                            )
                        )
                    GROUP BY modele.libelle";
                } else if($_SESSION['marque'] != ""){
                    $marque = $_SESSION['marque'];

                    $sql = "SELECT modele.libelle, v.immatriculation, marque.libelle, modele.image, categorie.prix
                    FROM Voiture v
                    LEFT JOIN Location l ON v.immatriculation = l.immatriculation JOIN modele USING(id_modele) JOIN marque USING (id_marque) JOIN categorie USING (id_categorie)
                    WHERE v.id_garage = '$nom_de_la_ville' AND id_marque = '$marque'
                        AND (
                            (l.date_debut IS NULL AND l.date_fin IS NULL)
                            OR NOT (
                                (l.date_debut BETWEEN '$date_debut' AND '$date_fin')
                                OR (l.date_fin BETWEEN '$date_debut' AND '$date_fin')
                            )
                        )
                    GROUP BY modele.libelle";
                } else {
                    $sql = "SELECT modele.libelle, v.immatriculation, marque.libelle, modele.image, categorie.prix
                        FROM Voiture v
                        LEFT JOIN Location l ON v.immatriculation = l.immatriculation JOIN modele USING(id_modele) JOIN marque USING (id_marque) JOIN categorie USING (id_categorie)
                        WHERE v.id_garage = '$nom_de_la_ville'
                            AND (
                                (l.date_debut IS NULL AND l.date_fin IS NULL)
                                OR NOT (
                                    (l.date_debut BETWEEN '$date_debut' AND '$date_fin')
                                    OR (l.date_fin BETWEEN '$date_debut' AND '$date_fin')
                                )
                            )
                        GROUP BY modele.libelle";
                }
            } else {
                $sql = "SELECT modele.libelle, v.immatriculation, marque.libelle, modele.image, categorie.prix
                        FROM Voiture v
                        LEFT JOIN Location l ON v.immatriculation = l.immatriculation JOIN modele USING(id_modele) JOIN marque USING (id_marque) JOIN categorie USING (id_categorie)
                        GROUP BY modele.libelle
                        ORDER by marque.libelle ASC";
            }
            $res = mysqli_query($con,$sql);
            while ($row = mysqli_fetch_row($res))
                echo"<div class='voiture'>
                    <img src='../img/bdd_auto/" . $row[3] ."'>
                    <h2> Marque : " . $row[2] . "</h2>
                    <h2> Modèle : " . $row[0] . "</h2>
                    <h2> Prix : " . $row[4] * $_SESSION['nb_day'] + $garage . "€</h2>
                    <a href='reservation.php?voiture=" . $row[1] . "' class='btn2'>Réserver</a>
                </div>";
        ?>
    </div>
    <?php include "footer.php" ?>


<!-- Scripts -->
<script type='text/javascript' src='../js/pageConnexion.js'></script>

</body>
</html>