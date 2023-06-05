<?php
    $id_session = session_id();
    include "../bdd/biblio.php";
    $connexion = connexion();
    if($_SESSION['connected'] == "false"){
        header("Location: index.php");
    }
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
    <div class='Main'>
        <?php include "ImportHeader.php"?>
        <div class='BodyPage'>
        </div>
    </div>
    <h1 class='location'>Louer la voiture de votre rêve</h1>
    <?php
        $date1 = new DateTime($_POST['datedebut']);
        $date2 = new DateTime($_POST['datefin']);
        $interval = $date1->diff($date2);
        $numberOfDays = $interval->days;
        $_SESSION['nb_day'] = $numberOfDays + 1;
        echo "<h2 class='location'>Réservation pour " . $numberOfDays + 1 . " jours</h2>" ;
    ?>
    <div class='sousTitre'></div>

    <div class="voitureLoc">
        <?php
            if(isset($_POST["villeDepart"])){
                $date_debut = $_POST['datedebut'];
                $date_fin = $_POST['datefin'];
                $nom_de_la_ville = $_POST['villeDepart'];
                $nom_de_la_ville2 = $_POST['villeArrive'];
                $modele = $_POST['modele'];
                $marque = $_POST['marque'];
                $con = connexion();
                if($_POST['modele'] != ""){
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
                } else if($_POST['marque'] != ""){
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
                $res = mysqli_query($con,$sql);
                while ($row = mysqli_fetch_row($res)) {
                    echo"<div class='voiture'>
                        <img src='../img/bdd_auto/" . $row[3] ."'>
                        <h2> Marque : " . $row[2] . "</h2>
                        <h2> Modèle : " . $row[0] . "</h2>
                        <h2> Prix : " . $row[4] * $_SESSION['nb_day'] . "€</h2>
                        <a href='' class='btn2'>Réserver</a>
                    </div>";
                }
            }
        ?>
    </div>
    <?php include "footer.php" ?>


<!-- Scripts -->
</body>
</html>