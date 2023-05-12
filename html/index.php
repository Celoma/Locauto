<?php
    session_start();
    $id_session = session_id();
    include "../bdd/biblio.php";
    $connexion = connexion();
    if(isset($_SESSION['connected'])){
        if($_SESSION['connected'] == 'false'){
            session_reset();
        }
    } else {
        $_SESSION['connected'] = "false";
    }
    if (isset($_POST['email']) && isset($_POST['password'])) {
        $email = $_POST['email'];
        $pass = $_POST['password'];
        if (empty($email)) {
            header("Location: index.php?error=User Name is required");
            exit();
        }else if(empty($pass)){
            header("Location: index.php?error=Password is required");
            exit();
        }else{
            $sql = "SELECT * FROM client WHERE mail='$email' AND mots_de_passe='$pass'";
            $result = mysqli_query($connexion, $sql);
            if (mysqli_num_rows($result) === 1) {
                $row = mysqli_fetch_assoc($result);
                if ($row['mail'] === $email && $row['mots_de_passe'] === $pass) {
                    $_SESSION['email'] = $row['mail'];
                    $_SESSION['nom'] = $row['nom'];
                    $_SESSION['prenom'] = $row['prenom'];
                    $_SESSION['id'] = $row['id_client'];
                    $_SESSION['connected'] = "true";
                    header("Location: index.php");
                    exit();
                }else{
                    header("Location: index.php?error=Incorect User name or password");
                    exit();
                }
            }else{
                header("Location: index.php?error=Incorect User name or password");
                exit();
            }
        }
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
                    if($_SESSION['connected'] == "true"){
                        echo "<a href='profils.php' class='speudo'>". $_SESSION['nom'] . $_SESSION['prenom'] ."</a>
                        <div class='profilBar'>
                            <img src='../img/logo_compte.png' class='accesProfil'>
                            <ul>
                                <li><a href='profils.php'>Profils</a></li>
                                <li><a href='historique_achat'>Historique d'achat</a></li>
                                <li><a href='deconnexion.php'>Déconnexion</a></li>
                            </ul>
                        </div>
                        
                        
                        
                        
                        
                        ";
                    } else {
                        echo "<div id='headerConnexion'><p>Connexion</p></div>
                        <div><p id='headerInscription'>Inscription</p></div>";
                    }
                ?>
            </div>
        </header>
        <div class="BodyPage">
            <?php
            if($_SESSION['connected'] === "true"){
                echo "<p>" . $_SESSION['email'] . "<br>" .
                $_SESSION['nom'] . "<br>" .
                $_SESSION['prenom'] . "<br>" .
                $_SESSION['id'] . "</p>";
            } else {
                echo $_SESSION['connected'];
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
<script type='text/javascript' src='../js/pageConnexion.js'></script>
</body>
</html>