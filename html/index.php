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
	<footer>
    <div class="sm-handle">
                    <a href="#" class="sm-button"><i class="fab fa-instagram"></i></a>
                    <a href="#" class="sm-button"><i class="fab fa-linkedin"></i></a>
                    <a href="#" class="sm-button"><i class="fab fa-facebook-f"></i></a>
                    <a href="#" class="sm-button"><i class="fab fa-twitter"></i></a>
                    <a href="#" class="sm-button"><i class="fab fa-github"></i></a>
        <div class='BodyPage'></div>
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
        <div class='BodyPage'>
        </div>
    </div>
        <div class='BodyPage'></div>
    </div>
    <?php include "footer.php"?>
    

<!-- Scripts -->
<script type='text/javascript' src='../js/pageConnexion.js'></script>
</body>
</html>