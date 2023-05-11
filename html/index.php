<?php
    session_start();
    $id_session = session_id();
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
    <div class="Main">
        <header>
            <img src="../img/bouton_menu_ouvrir.png" class="navBarOpen">
            <div class="navBar">
            </div>
            <div class="headerDroit"></div>
            <div id="headerConnexion"><p >Connexion</p></div>
            <div><p id="headerInscription">Inscription</p></div>
        </header>
        <div>
            <p>Code couleur:
            <br>#2E2828<br>#503A3A<br>#F65151<br>#FEF4F4
            </p>
            <?php

            if(!empty($_POST) && !empty($_POST['email']) && !empty($_POST['password'])){
                echo $_POST['email'] . "<br>" . $_POST['password'];
            }
            ?>
        </div>
        <footer>
        </footer>
    </div>
    <div class="PopUpBg" id="PopUpBg">
    </div>
    <div class="PopUpConnexion">
    <form action="index.php" method="post">
    <br>
    <h1>Se connecter</h1>
    <div>
    <label for="email">Email:</label>
    <input type="email" id="email" name="email">
    </div>

    <div>
        <label for="pass">Mot de passe:</label>
        <input type="password" id="pass" name="password"
            minlength="8" required>
    </div>

    <input type="submit" value="Connexion">
    </form>
    <p id="mdpOublie">Mot de passe oublié ?</p>
    <p id="linkInscription">S'incrire maintenant</p>
    </div>
<!-- Scripts -->
<script type="text/javascript" src="../js/login_signup.js"></script>
</body>
</html>