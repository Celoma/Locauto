<?php
    $id_session = session_id();
    include "../bdd/biblio.php";
    $connexion = connexion();
    include "formTraitment.php";
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

    <!-- Remettre les valeurs des formulaires s'ils sont mal renseignés -->
    <?php include "PopUpTraitment.php" ?>
    <div class='Main'>
        <?php include "ImportHeader.php"?>
        <div class='BodyPage'>
            <?php
                if($_SESSION['idtype'] == 1){
                    echo "<h1 class='titreprofil'>Profil</h1>
                    <h1>". $_SESSION["nom"]."</h1>";
                } else {
                    include "profil_client.php";
                }
            ?>
        </div>
        <footer>
        </footer>

<!-- Scripts -->
<script type='text/javascript' src='../js/pageConnexion.js'></script>
</body>
</html>