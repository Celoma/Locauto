<?php
    session_start();
    $id_session = session_id();
    include "../bdd/biblio.php";
    $connexion = connexion();
    if(!isset($_SESSION['connected'])){
        $_SESSION['connected'] = "false";
    }

    #Fonction vérification pour connecter l'utilisateur à un compte
    if (isset($_POST['emailConnexion']) && isset($_POST['passwordConnexion'])) {
        $_SESSION['email'] = $_POST['emailConnexion'];
        $_SESSION['pass'] = $_POST['passwordConnexion'];
        $email = $_SESSION['email'];
        $pass = $_SESSION['pass'];
        if (empty($email)) {
            header("Location: index.php?error=Connection denied");
            exit();
        }else if(empty($pass)){
            header("Location: index.php?error=Connection denied");
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
                    header("Location: index.php?error=Connection denied");
                    exit();
                }
            }else{
                header("Location: index.php?error=Connection denied");
                exit();
            }
        }
    }

    #Fonction pour que l'utilisateur crée un compte
    if (isset($_POST['email'])){
        $email = $_POST['email'];
        $pass = $_POST['password'];
        $tel = $_POST['telephone'];
        $cp = $_POST['adressePostale'];
        $client_type = $_POST['type_client'];
        $prenom = $_POST['prenom'];
        $nom = $_POST['nom'];

        if($_POST['password'] != $_POST['verifypassword']){
            header("Location: index.php?error=Inscription denied&cause=Les deux mots de passes doivent être identiques");
            exit();
        } else if($_POST['type_client'] > 2 & $_POST['groupe'] == null) {
            header("Location: index.php?error=Inscription denied&cause=Tous les champs ne sont pas compléter");
            exit();
        } else {
            $sql = "SELECT * FROM client WHERE mail='$email'";
            $result = mysqli_query($connexion, $sql);
            if (mysqli_num_rows($result) != 0) {
                header("Location: index.php?error=Inscription denied&cause=E-mail déjà utilisé");
                exit();
            } else {
                $sql = "INSERT INTO client(nom, prenom, adresse, mail, mots_de_passe, telephone, id_type_de_client) 
                VALUES ('$nom', '$prenom', '$cp', '$email', '$pass', '$tel', '$client_type');";
                $result = mysqli_query($connexion, $sql);

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
                    } else {
                        header("Location: index.php?error=Inscription denied&cause=Une erreur est survenue");
                        exit();
                    }
                } else {
                    header("Location: index.php?error=Inscription denied&cause=E-mail déjà utilisé");
                    exit();
                }
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

    <!-- Remettre les valeurs des formulaires s'ils sont mal renseignés -->
    <input type="hidden" id="mdp" value=<?php if(isset($_SESSION['pass'])){echo $_SESSION['pass'];}  ?>/>
    <input type="hidden" id="email" value=<?php if(isset($_SESSION['email'])){echo $_SESSION['email'];} ?>/>


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
                        echo "<a href='profil.php' class='speudo'>". $_SESSION['nom'] ." " . $_SESSION['prenom'] ."</a>
                        <div class='profilBar'>
                            <img src='../img/logo_compte.png' class='accesProfil'>
                            <ul>
                                <li><a href='profil.php'>Profil</a></li>
                                <li><a href='historique_achat'>Historique d'achat</a></li>
                                <li><a href='deconnexion.php'>Déconnexion</a></li>
                            </ul>
                        </div>";
                    } else {
                        echo "<div><p id='headerInscription'>Inscription</p></div>
                        <div id='headerConnexion'><p>Connexion</p></div>";
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
            }
            ?>
        </div>
        <footer>
        </footer>
    </div>
    <div class="PopUpBg" id="PopUpBg">
    </div>


    <div class="PopUpInscription">
        <form name="inscription" action="" method="post">
            <br>
            <h3>Inscription</h3>
            <div class="sousTitre"></div>
            <div class="formulaireInscription">
                <div class="formulaireInscriptionGauche">
                    <input type="text" name="nom" placeholder="Nom" required/>
                    <input type="text" name="telephone" placeholder="Téléphone" minlength="10" required/>
                </div>
                <div class="formulaireInscriptionGauche">
                    <input type="text" name="prenom" placeholder="Prénom" required/>
                    <select name="type_client" id="typeSelect" onChange='InscriptionClientSpeciaux()' required>
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
                <input type="text" name="groupe" id='groupe' placeholder=""/>
                <input type="email" name="email" placeholder="E-mail" required/>
                <input type="text" name="adressePostale" placeholder="Adresse postale" required/>
            </div>
            <div class="formulaireInscription">
                <div class="formulaireInscriptionDroit">
                    <input type="password" name="password" id="mdp1" onkeyup="checkPass()" placeholder="Mot de passe" minlength="8" required/>
                </div>
                <div class="formulaireInscriptionGauche">
                    <input type="password" name="verifypassword" id="mdp2" placeholder="Confirmer mot de passe" onkeyup="checkPass()"  required/>
                    <div id="divcomp">Correct</div><div id="divcomp2">Incorrect</div>
                </div>
            </div>
            <p id="divcomp4"></p>
            <input type="submit" value="Inscription">
        </form>
        <p id="linkConnexion">Se connecter</p>
    </div>


    <div class="PopUpConnexion">
        <form action="" method="post">
        <br>
        <h3>Connexion</h3>
        <div class="sousTitre"></div>
        <div class="formulaireConnexion">
            <div class="formulaireConnexionCentre">
                <input type="text" name="emailConnexion" id="emailEntré" placeholder="E-mail" />
                <input type="password" name="passwordConnexion" id="mdpEntré" placeholder="Mot de passe" />
            </div>
        </div>
            <div id="divcomp3">E-mail ou mot de passe incorrect</div>
            <input type="submit" value="Connexion">
            </form>
            <p id="mdpOublie">Mot de passe oublié ?</p>
            <p id="linkInscription">S'incrire maintenant</p>
    </div>
<!-- Scripts -->
<script type='text/javascript' src='../js/pageConnexion.js'></script>
</body>
</html>