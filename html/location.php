<?php
    $id_session = session_id();
    include "../bdd/biblio.php";
    $connexion = connexion();
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
        </div>
    </div>

<!-- Scripts -->
</body>
</html>