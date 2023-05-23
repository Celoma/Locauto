<?php
    $id_session = session_id();
    include "../bdd/biblio.php";
    $connexion = connexion();
    include "formTraitment.php";
    if($_SESSION['connected'] == "false"){
        header("Location: index.php");
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
    <div class='Main'>
        <?php include "ImportHeader.php"?>
        <div class='BodyPage'>
            <?php
                if($_SESSION['idtype'] == 1){
                    include "profil_admin.php";
                } else {
                    include "profil_client.php";
                }
            ?>
        </div>

        <footer>
        </footer>
<!-- Scripts -->
</body>
</html>