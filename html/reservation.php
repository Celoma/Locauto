<?php
    $id_session = session_id();
    include "../bdd/biblio.php";
    $connexion = connexion();
    include "formTraitment.php";
    $_SESSION['url'] = "reservation.php";
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
        <?php
            if(isset($_GET["voiture"])){
                $con = connexion();
                $sql = "SELECT * FROM voiture JOIN modele USING (id_modele) WHERE immatriculation='". $_GET["voiture"] ."';";
                $res = mysqli_query($con,$sql);
                echo mysqli_num_rows($res);
                while ($row = mysqli_fetch_row($res)) {
                    echo $row[0];
                    echo "<div class='presVoit'>
                        <div class='presVoitG'>
                            <img href='../img/bdd_auto/" . $row[0] . "'>
                        </div>
                        <div class='presVoitD'>
                        </div>
                    </div>";
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