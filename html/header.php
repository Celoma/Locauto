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