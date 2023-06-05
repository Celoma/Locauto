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
    <h1 class='location'>Louer la voiture de votre rêve</h1>
    <div class='sousTitre'></div>
    <form class='popup' action='voiture.php' method='post'>
        <div class='locationform'>
            <div class='locformG'>
                <input type='text' placeholder="Date début" id='start' name='datedebut' min="<?php echo date('Y-m-d'); ?>" required onfocus="(this.type='date')"/>
                <select name="villeDepart" id='arrive' required>
                            <option value="" hidden required>Ville de départ</option>
                            <?php
                            $req_marque = "SELECT * FROM garage";
                            $req_marque_res = mysqli_query($connexion, $req_marque);
                            while ($ligne_marque = mysqli_fetch_array($req_marque_res)) {
                                echo '<option value="' . $ligne_marque['id_garage'] . '"> ' . $ligne_marque['ville'] . ' </option>';
                            }
                            ?>
                    </select>
            </div>
            <div class='locformD'>
                <input type='text' placeholder="Date fin" id='end' name='datefin' required onfocus="(this.type='date')"/>
                    <select name="villeArrive" id='depart' required>
                            <option value="" hidden required>Ville d'arrivé</option>
                            <?php
                            $req_marque = "SELECT * FROM garage";
                            $req_marque_res = mysqli_query($connexion, $req_marque);
                            while ($ligne_marque = mysqli_fetch_array($req_marque_res)) {
                                echo '<option value="' . $ligne_marque['id_garage'] . '"> ' . $ligne_marque['ville'] . ' </option>';
                            }
                            ?>
                    </select>
            </div>
            

       
        </div>
        <h2 class='location'>Option de recherche</h2>
            <div class='sousTitre'></div>
            <h3 class='location'>Ajouter une option de marque ou modèle</h3>
            <div class='sousTitre'></div>
            <div class="locationform">
            <div class='formulaireInscriptionGauche'>
                    <select name="marque" id="insertion_marque" onchange="updateModeles()">
                            <option value="" selected>Choisissez une marque / Marque non défini</option>
                            <?php
                            $req_marque = "SELECT * FROM marque";
                            $req_marque_res = mysqli_query($connexion, $req_marque);
                            while ($ligne_marque = mysqli_fetch_array($req_marque_res)) {
                                echo '<option value="' . $ligne_marque['id_marque'] . '"> ' . $ligne_marque['libelle'] . ' </option>';
                            }
                            ?>
                    </select>
            </div>
                <div class='formulaireInscriptionGauche'>
                <select name="modele" id="insertion_modele" >
                            <option value="" hidden selected>Choisissez un modèle</option>
                            <?php
                            $requete = "SELECT *
                            FROM modele";
                            $resultat = mysqli_query($connexion, $requete);
                            while($ligne = mysqli_fetch_array($resultat)){
                                    echo "<option value=" . $ligne['id_modele'] . ">" . $ligne['libelle'] . "</option>";
                            }
                        ?>
                        </select>
                        <script>
                            function updateModeles() {
                                var marqueSelect = document.getElementById("insertion_marque");
                                var modeleSelect = document.getElementById("insertion_modele");
                                var selectedMarque = marqueSelect.value;

                                // Création de l'objet XMLHttpRequest
                                var xhr = new XMLHttpRequest();

                                // Configuration de la requête AJAX
                                xhr.open("GET", "get_modeles.php?marque=" + selectedMarque, true);

                                // Gestion de la réponse de la requête
                                xhr.onreadystatechange = function() {
                                    if (xhr.readyState === XMLHttpRequest.DONE) {
                                        if (xhr.status === 200) {
                                            // Réponse de la requête reçue avec succès
                                            var modeles = JSON.parse(xhr.responseText);
                                            console.log(modeles);
                                            // Effacer les options actuelles du select modele
                                            modeleSelect.innerHTML = "";

                                            // Ajouter les nouvelles options du select modele
                                            for (var i = 0; i < modeles.length; i++) {
                                                var modeleOption = document.createElement("option");
                                                modeleOption.value = modeles[i].id_modele;
                                                modeleOption.textContent = modeles[i].libelle;
                                                modeleSelect.appendChild(modeleOption);
                                            }
                                        } else {
                                            // Erreur lors de la requête AJAX
                                            console.error("Erreur lors de la requête AJAX");
                                        }
                                    }
                                };

                                // Envoyer la requête AJAX
                                xhr.send();
                            }
                        </script>
                    </div>
                </div>
            </div>

            <input type='submit' class='formulaireSubmit' value='Voir les résultats'>
    </form>
    <?php include "footer.php" ?>

<!-- Scripts -->
<script type='text/javascript' src='../js/loc.js'></script>
</body>
</html>