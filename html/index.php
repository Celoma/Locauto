<?php
    $id_session = session_id();
    include "../bdd/biblio.php";
    $connexion = connexion();
    include "formTraitment.php";
    $_SESSION['url'] = "index.php";

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
            <a href="../html/voiture.php" class="btn">Choisi ta voiture</a>
        </div>
    </section>
    <section class="infos" id='azerty'>
        <section class="infos-text">
            <h1 class="exp"><strong><span>15</span> ANS<br> D'EXPERIENCE</strong></h1>
        </section>
        <section class="right-infos-text">
        <p>Nous somme une entreprise basée à Rennes.<br> Nous avons plus de 200 modèles disponibles et plus<br> de 1800 Véhicules disponibles sur l'ensemble de nos parcs<br> partout en France.</p>
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