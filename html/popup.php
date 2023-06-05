<div class='PopUpClient'>
        <form class='popup' action='' method='post'>
            <br>
            <h3>Insertion Client</h3>
            <div class='sousTitre'></div>
            <div class='formulaireInscription'>
                <div class='formulaireInscriptionGauche'>
                    <input type='text' name='nom' id='nomInscription' placeholder='Nom' required/>
                    <input type='text' name='telephone' id='telInscription' placeholder='Téléphone' minlength='10' required/>
                </div>
                <div class='formulaireInscriptionGauche'>
                    <input type='text' name='prenom' id='prenomInscription' placeholder='Prénom' required/>
                        <select name='type_client' id='typeSelect' onChange='InscriptionClientSpeciaux()' required>
                            <option value='' hidden selected>Choisissez votre profil</option>
                            <?php include 'choix_select.php'?>
                        </select>
                    </div>
                </div>
                <div class='formulaireInscriptionLigneSeul'>
                    <input type='text' name='groupe' id='groupe' placeholder=''/>
                    <input type='email' name='email' placeholder='E-mail' id='emailInscription' required/>
                    <input type='text' name='adressePostale' id='adresseInscription' placeholder='Adresse postale' required/>
                </div>
                <input type='submit' class='formulaireSubmit' value='Inserer'>
            </form>
</div>
<?php
    if(isset($_POST['telephone'])){
        $email = $_POST['email'];
        $tel = $_POST['telephone'];
        $adresse = $_POST['adressePostale'];
        $client_type = $_POST['type_client'];
        $prenom = $_POST['prenom'];
        $nom = $_POST['nom'];
        $groupe = $_POST['groupe'];
        $sql = "SELECT * FROM client WHERE mail='$email'";
        $result = mysqli_query($connexion, $sql);
        if (mysqli_num_rows($result) != 0) {
            exit();
        } else {
            try{
                $sql = "INSERT INTO client (nom, prenom, adresse, mail, telephone, id_type_de_client, groupe)
                VALUES ('$nom', '$prenom', '$adresse', '$email', '$tel', '$client_type', '$groupe');";
                mysqli_query($connexion, $sql);
            } catch(Exception $e){
                exit();
            }
        }
    }
    if(isset($_POST['immatriculation'])){
        $immatriculation = $_POST['immatriculation'];
        $compteur = $_POST['compteur'];
        $id_modele = $_POST['modele'];
        $id_ville = $_POST['ville'];
        $sql = "SELECT * FROM voiture WHERE immatriculation='$immatriculation'";
        $result = mysqli_query($connexion, $sql);
        if (mysqli_num_rows($result) != 0) {
            exit();
        } else {
            try{
                $sql = "INSERT INTO voiture (id_modele, id_garage, immatriculation, compteur)
                VALUES ('$id_modele', '$id_ville', '$immatriculation', '$compteur');";
                mysqli_query($connexion, $sql);
            } catch(Exception $e){
                exit();
            }
        }
    }
?>
<div class='PopUpLocation'>
        <form class='popup' action='' method='post'>
            <br>
            <h3>Insertion Location</h3>
            <div class='sousTitre'></div>
            <div class='formulaireInscription'>
                <div class='formulaireInscriptionGauche'>
                    <input type='text' placeholder="Date début" name='datedebut' required onfocus="(this.type='date')"/>
                    <input type='text' placeholder="Immatriculation voiture" name='immatriculation' required/>
                </div>
                <div class='formulaireInscriptionGauche'>
                    <input type='text' placeholder="Date fin" name='datefin' required onfocus="(this.type='date')"/>
                        <select name='type_client' id='typeSelect' onChange='InscriptionClientSpeciaux()' required>
                            <option value='' hidden selected>Choisissez votre profil</option>
                        </select>
                    </div>
                </div>
                <div class='formulaireInscriptionLigneSeul'>
                    <input type='text' name='groupe' id='groupe' placeholder=''/>
                    <input type='email' name='email' placeholder='E-mail' id='emailInscription' required/>
                    <input type='text' name='adressePostale' id='adresseInscription' placeholder='Adresse postale' required/>
                </div>
                <input type='submit' class='formulaireSubmit' value='Inserer'>
            </form>
</div>
<div class='PopUpVoiture'>
        <form class='popup' action='' method='post'>
            <br>
            <h3>Insertion Voiture</h3>
            <div class='sousTitre'></div>
            <div class='formulaireInscription'>
                <div class='formulaireInscriptionGauche'>
                    <select name="ville" required>
                            <option value="" hidden selected>Choisissez la ville de la voiture</option>
                            <?php
                            $req_marque = "SELECT * FROM garage";
                            $req_marque_res = mysqli_query($connexion, $req_marque);
                            while ($ligne_marque = mysqli_fetch_array($req_marque_res)) {
                                echo '<option value="' . $ligne_marque['id_garage'] . '"> ' . $ligne_marque['ville'] . ' </option>';
                            }
                            ?>
                    </select>
                    <select name="marque" id="insertion_marque" required onchange="updateModeles()">
                            <option value="" hidden selected>Choisissez votre marque de véhicule</option>
                            <?php
                            $req_marque = "SELECT * FROM marque";
                            $req_marque_res = mysqli_query($connexion, $req_marque);
                            while ($ligne_marque = mysqli_fetch_array($req_marque_res)) {
                                echo '<option value="' . $ligne_marque['id_marque'] . '"> ' . $ligne_marque['libelle'] . ' </option>';
                            }
                            ?>
                    </select>
                        <br>
                </div>
                <div class='formulaireInscriptionGauche'>
                <input type='text' name='immatriculation' placeholder='Immatriculation' required/>
                <select name="modele" id="insertion_modele" required>
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
                <div class='formulaireInscriptionLigneSeul'>
                    <input type='number' name='compteur' placeholder='Compteur' id='emailInscription' required/>
                </div>
                <input type='submit' class='formulaireSubmit' value='Inserer'>
            </form>
</div>