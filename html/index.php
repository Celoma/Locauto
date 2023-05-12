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
            <div class="headerGauche">
                <img src="" class="navBarOpen">
                <div class="navBar">
                </div>
            </div>
            <div class="headerCentre">
            <h1>Loc'Auto</h1>
            <img src="../img/logo_voiture_marron.png">
            </div>
            <div class="headerDroit">
                <?php
                    if(!empty($_POST) && !empty($_POST['email']) && !empty($_POST['password'])){
                        echo "<a href='profils.php' class='speudo'>". $_POST['email'] ."</a>
                        <img src='../img/logo_compte.png' class='accesProfil'>";
                    } else {
                        echo "<div id='headerConnexion'><p>Connexion</p></div>
                        <div><p id='headerInscription'>Inscription</p></div>";
                    }
                ?>
            </div>

        </header>
        <div>
            <p>Code couleur:
            <br>#2E2828<br>#503A3A<br>#F65151<br>#FEF4F4
            </p>
            <p>Nom, Prénom, Adresse postale, Adresse Mail, Mdp, téléphone</p>
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


    <div class="PopUpInscription">
        <form name="inscription" action="index.php" method="post">
            <br>
            <h3>Inscription</h3>
            <div class="formulaireInscription">
                <div class="formulaireInscriptionGauche">
                    <input type="text" name="Nom" placeholder="Nom" required/>
                    <input type="text" name="Téléphone" placeholder="Téléphone" minlength="10" required/>
                </div>
                <div class="formulaireInscriptionGauche">
                    <input type="text" name="Prénom" placeholder="Prénom" required/>
                    <select name="type_client" id="typeSelect" required>
                        <option value="" hidden selected>Choisissez votre profil</option>
                        <?php
                            include "../bdd/biblio.php";
                            $connexion = connexion();
                            $requete = "
                            SELECT *
                            FROM type_de_client";
                            $resultat = mysqli_query($connexion, $requete);
                            $i = 1;
                            while($ligne = mysqli_fetch_array($resultat)){
                                if($i > 1){
                                    echo "<option value=" .$i . ">" . $ligne['libelle'] . "</option>";
                                }
                                $i+=1;
                            }
                        ?>
                    </select>
                </div>
            </div>
            <div class="formulaireInscriptionLigneSeul">
                <input type="text" name="Groupe" placeholder="Entreprise ou Association" required/>
                <input type="email" name="E-mail" placeholder="E-mail" required/>
            </div>
            <div class="formulaireInscription">
                <div class="formulaireInscriptionDroit">
                    <input type="password" name="password" id="mdp1" onkeyup="checkPass()" placeholder="Mot de passe" minlength="8" required/>
                </div>
                <div class="formulaireInscriptionGauche">
                    <input type="password" id="mdp2" placeholder="Confirmer mot de passe" onkeyup="checkPass()"  required/>
                    <div id="divcomp2">Correct</div><div id="divcomp">Incorrect</div>
                </div>
            </div>
            <input type="submit" value="Inscription">
        </form>
        <p id="linkConnexion">Se connecter</p>
    </div>


    <div class="PopUpConnexion">
        <form action="index.php" method="post">
        <br>
        <h3>Se connecter</h3>
        <div class="formulaireConnexion">
            <div class="formulaireConnexionCentre">
                <input type="text" name="email" placeholder="E-mail" />
                <input type="password" name="password" placeholder="Mot de passe" />
            </div>
        </div>
            <input type="submit" value="Connexion">
            </form>
            <p id="mdpOublie">Mot de passe oublié ?</p>
            <p id="linkInscription">S'incrire maintenant</p>
    </div>
<!-- Scripts -->
<script type="text/javascript" src="../js/pageConnexion.js"></script>
</body>
</html>