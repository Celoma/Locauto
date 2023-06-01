<?php
    include "../bdd/biblio.php";
    if (isset($_POST['email'])){
        $email = $_POST['email'];
        $pass = $_POST['mdp'];
        $tel = $_POST['telephone'];
        $adresse = $_POST['adressePostale'];
        $client_type = $_POST['type_client'];
        $prenom = $_POST['prenom'];
        $nom = $_POST['nom'];
        $type = $_POST['type_client'];
        $groupe = $_POST['groupe'];
        $idclient = $_POST['idclient'];
        $con = connexion();
        $sql_test = "SELECT * FROM Client WHERE mail ='" . $email ."';";
        $res = mysqli_query($con, $sql_test);
        if(mysqli_num_rows($res) == 0){
            $sql = "UPDATE Client set prenom = '" . $prenom . "', nom = '" . $nom . "', adresse = '" . $adresse . "',
            mail = '" . $email . "', mots_de_passe = '" . $pass . "', telephone = '" . $tel . "', groupe = '" . $groupe . "',
            id_type_de_client = '" . $client_type . "'
            WHERE id_client = '". $idclient ."';";
            mysqli_query($con, $sql);
            header("Location: recherche.php?type=client");
        } else {
            $row = mysqli_fetch_assoc($res);
            if($row['id_client'] == $idclient){
                $sql = "UPDATE Client set prenom = '" . $prenom . "', nom = '" . $nom . "', adresse = '" . $adresse . "',
                mail = '" . $email . "', mots_de_passe = '" . $pass . "', telephone = '" . $tel . "', groupe = '" . $groupe . "',
                id_type_de_client = '" . $client_type . "'
                WHERE id_client = '". $idclient ."';";
                mysqli_query($con, $sql);
                header("Location: recherche.php?type=client");
            }
        }
        header("Location: recherche.php?type=client");
    } else {
        $con = connexion();
        $sql = "DELETE FROM client
        WHERE mail = '" . $_GET['search'] . "';";
        mysqli_query($con, $sql);
        header("Location: recherche.php?type=client");
    }
?>