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
            <h1>Trouve ta <br>réservation</h1>
        </div>
    </section>
    </div>
	<footer>
    <div class="sm-handle">
                    <a href="https://instagram.com/ronakgiriraj" class="sm-button"><i class="fab fa-instagram"></i></a>
                    <a href="https://www.linkedin.com/in/giri-raj-ronak-999257212" class="sm-button"><i class="fab fa-linkedin"></i></a>
                    <a href="https://facebook.com/giriraj.ronak" class="sm-button"><i class="fab fa-facebook-f"></i></a>
                    <a href="https://twitter.com/ronakgiriraj" class="sm-button"><i class="fab fa-twitter"></i></a>
                    <a href="https://github.com/ronakgiriraj" class="sm-button"><i class="fab fa-github"></i></a>
    </div>
    <div class="footer-links">
        <div class="menu">
            <h4 class="menu-title">Menu</h4>							
            <a href="#" class="menu-links">Nos garages<a>
            <a href="#" class="menu-links">Nos vehicules</a>
            <a href="#" class="menu-links">Rejoins-nous</a>
            <a href="#" class="menu-links">A propos de nous</a>
        </div>
        <div class="menu">
            <h4 class="menu-title">Autres pages</h4>
            <a href="#" class="other-links">FAQ</a>
            <a href="#" class="other-links">Nous contacter</a>
            <a href="#" class="other-links">Conditions d'utilisation</a>
            <a href="#" class="other-links">Politique de confidentialité</a>
        </div>
    </div>
        <p class="copyright">&copy Copyright 2023 | Florian & Clément</p>
</footer>

<!-- Scripts -->
<script type='text/javascript' src='../js/pageConnexion.js'></script>
</body>
</html>