<?php
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
        $adresse = $_POST['adressePostale'];
        $client_type = $_POST['type_client'];
        $prenom = $_POST['prenom'];
        $nom = $_POST['nom'];

        $_SESSION['emailInscription']=$_POST['email'];
        $_SESSION['passwordInscription']=$_POST['password'];
        $_SESSION['verifypasswordInscription']=$_POST['verifypassword'];
        $_SESSION['telephoneInscription']=$_POST['telephone'];
        $_SESSION['adressePostaleInscription']=$_POST['adressePostale'];
        $_SESSION['typeclientInscription']=$_POST['type_client'];
        $_SESSION['prenomInscription']=$_POST['prenom'];
        $_SESSION['nomInscription']=$_POST['nom'];
        $_SESSION['groupInscription']=$_POST['groupe'];

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
                try{
                    $sql = "INSERT INTO client (nom, prenom, adresse, mail, mots_de_passe, telephone, id_type_de_client)
                    VALUES ('$nom', '$prenom', '$adresse', '$email', '$pass', '$tel', '$client_type');";
                    mysqli_query($connexion, $sql);
                } catch(Exception $e){
                    header("Location: index.php?error=Inscription denied&cause=Une erreur est survenue, n'utilisé pas ' s'il vous plait");
                    exit();
                }
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