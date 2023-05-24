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
    <script src="https://kit.fontawesome.com/7628988a57.js" crossorigin="anonymous"></script>
</head>
    <title>Loc'Auto</title>
<body>

    <!-- Remettre les valeurs des formulaires s'ils sont mal renseignés -->
    <?php include "PopUpTraitment.php" ?>
    <div class='Main'>
        <?php include "ImportHeader.php"?>
        <div class='BodyPage'>
    </div>
    <nav class="nav">
        <input type="checkbox" id="check">
        <label for="check">
            <i class="fas fa-bars" id="btn"></i>
            <i class="fas fa-times" id="cancel"></i>
        </label>
        <div class="sidebar">
            <header class="info"><strong>Informations</strong></header>
            <ul>
                <li><a href="../pages/index.html"><i class="fas fa-home"></i> Acceuil</a></li>
                <li><a href="#Apropos"><i class="fas fa-question-circle"></i> A propos de nous</a></li>
                <li><a href="#"><i class="fas fa-calendar-week"></i> Nos événements</a></li>
                <li><a href="#"><i class="fas fa-sliders-h"></i> Paramètres</a></li>
                <li><a href="#contacter""><i class="fas fa-envelope"></i> Nous contactez</a></li>
            </ul>
        </div>
    </nav>
        <footer>
        </footer>

<!-- Scripts -->
<script type='text/javascript' src='../js/pageConnexion.js'></script>
</body>
</html>