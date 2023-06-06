<?php
include "../bdd/biblio.php";

$imm = $_GET['voiture'];
$db = $_SESSION['datedebut'];
$df = $_SESSION['datefin'];
$id_client = $_POST['id_client'];
$vd = $_SESSION['villeDepart'];
$va = $_SESSION['villeArrive'];
$_SESSION['datedebut'];



$con = connexion ();

$sql = "SELECT immatriculation FROM voiture WHERE immatriculation ='". $imm ."';";
$res = mysqli_query($con, $sql);
$row = mysqli_fetch_assoc($res);
$cf = $row[0];
$cd = $cf;

$sql = "INSERT INTO location(date_debut, date_fin, compteur_debut, compteur_fin, id_client, immatriculation, id_garage_lieuArrivee, id_garage_depart)
        VALUES('$db', '$df', '$cd', '$cf', '$id_client','$imm', '$va', '$vd')";
mysqli_query($con, $sql);
header("Location: index.php");
?>