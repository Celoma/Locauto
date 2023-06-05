<?php
    $id_session = session_id();
    include "../bdd/biblio.php";
    $connexion = connexion();
    include "formTraitment.php"
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
        </div>
        <?php include "footer.php" ?>


<!-- Scripts -->
<script type='text/javascript' src='../js/pageConnexion.js'></script>
</body>
</html>