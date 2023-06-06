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
    <link rel="icon" href="../img/logo_blanc_noir.png">
    <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>
    <title>Loc'Auto</title>
<body>
    <!-- Remettre les valeurs des formulaires s'ils sont mal renseignés -->
    <?php include "PopUpTraitment.php" ?>
    <div class='Main'>
        <?php include "ImportHeader.php"?>
    </div>
    <div class="garage">
      <img src="../img/mapfr.png" class='ratio'alt="carte de france">
      <div class="listegarage">
        <h1 class="tiitle">Liste de nos garages</h1>
        <ul class="villee">
            <li class="namee">
                Angers
            </li>
            <li class="namee">
                Lille
            </li>
            <li class="namee">
                Monaco
            </li>
            <li class="namee">
                Paris
            </li>
            <li class="namee">
                Rennes
            </li>
            <li class="namee">
                Strasbourg
            </li>
        </ul>
      </div>
    </div>
    <?php include "footer.php" ?>

<!-- Scripts -->
<script type='text/javascript' src='../js/pageConnexion.js'></script>
</body>
</html>