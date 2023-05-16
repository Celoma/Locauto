<?php
/* *************************************** *
 * bibliothèque de fonctions PHP *
 * *************************************** */
/* méthode générique de connexion à la BDD */
session_start();
function connexion() {
  require_once "access.php";
  // connexion persistante
$connexion = mysqli_connect(SERVEUR, LOGIN, MDP, BD) ;
if (!$connexion) {
  die('Could not connect: ' . mysql_error());
}
return $connexion;
}
?>