<div class='PopUpBg' id='PopUpBg'></div>
<!-- Ne rien écrire dans PopUpBg -->
<div class='recherchePopUp' >
    <?php
        $email = $_GET['search'];
        $con = connexion();
        $sql = "SELECT * FROM Client JOIN type_de_client USING (id_type_de_client) WHERE mail = '".$email."'";
        $resultat = mysqli_query($con, $sql);
        if (mysqli_num_rows($resultat) === 1){
            $row = mysqli_fetch_assoc($resultat);
            $email = $row['mail'];
            $nom = $row['nom'];
            $prenom = $row['prenom'];
            $telephone = $row['telephone'];
            $id_client = $row['id_client'];
            $addresse = $row['adresse'];
            $mdp = $row['mots_de_passe'];
            $groupe = $row['groupe'];
            $id_type_de_client = $row['id_type_de_client'];
            $type = $row['libelle'];
        }
        echo "  <form class='update' action='update_client.php' method='post'>
                    <div class='rechercheconteneur'>
                        <div class='left'>
                            <libelle>Nom</libelle>
                            <input type='text' name='nom' value='". $nom ."' id='emailInscription' required/>
                            <libelle>Prénom</libelle>
                            <input type='text' name='prenom' id='adresseInscription' value='". $prenom ."' required/>
                            <libelle>E-mail</libelle>
                            <input type='email' name='email' value='". $email ."' id='emailInscription' required/>
                            <libelle>Adresse postale</libelle>
                            <input type='text' name='adressePostale' id='adresseInscription' value='". $addresse ."' required/>
                        </div>
                        <div class='right'>
                            <libelle>Télephone</libelle>
                            <input type='text' name='telephone' value='". $telephone ."' id='emailInscription' required/>
                            <libelle>Mot de passe</libelle>
                            <input type='password' name='mdp' id='adresseInscription' value='". $mdp ."' required/>
                            <libelle>Type</libelle>
                            <select name='type_client' id='typeSelect' onChange='InscriptionClientSpeciaux()' required>
                                <option value='". $id_type_de_client ."' hidden selected>" . $type ."</option>";
                                $requete = "
                                SELECT *
                                FROM type_de_client";
                                $resultat = mysqli_query($connexion, $requete);
                                $i = 1;
                                while($ligne = mysqli_fetch_array($resultat)){
                                    echo "<option value=" .$i . ">" . $ligne['libelle'] . "</option>";
                                    $i+=1;
                                }
        echo "              </select>
                            <libelle>Groupe</libelle>
                            <input type='groupe' name='groupe' id='adresseInscription' value='". $groupe ."'>
                        </div>
                    </div>
                    <input type='submit' value='Modifier'>
                    <input class='hide' name='idclient' value='". $id_client ."'>
                </form>
                <a href=update_client.php?search=" . $_GET['search'] . ">Supprimer le client</a>"
    ?>
</div>
<script type='text/javascript' src='../js/recherche_admin_perso.js'></script>