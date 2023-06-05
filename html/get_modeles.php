<?php
include "../bdd/biblio.php";
$connexion = connexion();


$selectedMarque = $_GET["marque"];

$req_modeles = "SELECT * FROM modele WHERE id_marque = " . $selectedMarque;
$req_modeles_res = mysqli_query($connexion, $req_modeles);

$modeles = array();
$modele = array(
    "id_modele" => "",
    "libelle" => "Choisissez un modèle / Modèle non défini"
);
array_push($modeles, $modele);

while ($ligne_modele = mysqli_fetch_array($req_modeles_res)) {
    $modele = array(
        "id_modele" => $ligne_modele["id_modele"],
        "libelle" => $ligne_modele["libelle"]
    );
    array_push($modeles, $modele);
}
// Renvoyer les modèles sous forme de JSON
echo json_encode($modeles);
?>