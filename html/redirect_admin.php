<?php 
if(isset($_GET['search'])){
    if($_GET['type']=='voiture'){
        include "recherche_admin_voiture.php";
    } else if($_GET['type']=='location'){
    include "recherche_admin_location.php";

    } else if($_GET['type']=='client'){
    include "recherche_admin_client.php";
    }
}
?>