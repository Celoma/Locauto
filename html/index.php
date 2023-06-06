<?php
    $id_session = session_id();
    include "../bdd/biblio.php";
    $connexion = connexion();
    include "formTraitment.php";
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
    <section class="home" id="home">
        <div class="home-text">
            <h1 class="eslogan"><strong>Votre Location <br><span>Avec</span> <br>Simplicité</strong></h1>
            <p>Bienvenue chez Loc'Auto votre<br> spécialiste de la location de véhicule</p>
            <a href="#" class="btn">Choisi ta voiture</a>
        </div>
    </section>
    <section class="infos">
        <section class="infos-text">
            <h1 class="exp"><strong><span>15</span> ANS<br> D'EXPERIENCE</strong></h1>
        </section>
        <section class="right-infos-text">
        <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit.<br> Dolore iste in libero totam impedit soluta ad a natus<br> incidunt, at blanditiis alias magni, doloribus nemo,<br> eligendi quaerat laudantium modi nobis?</p>
        </section>
    </section>
    <section class="reserv">
        <div class="reserv-text">
            <a href='location.php' class="btn">Trouve ta réservation</a>
        </div>
    </section>
    </div>
    <?php include "footer.php" ?>

<!-- Scripts -->
<script type='text/javascript' src='../js/pageConnexion.js'></script>
</body>
</html>