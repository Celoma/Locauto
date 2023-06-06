<h1 class='titleProfil'>Compte admin</h1>
<h2 class='titlePartie'>Rechercher</h2>
<div class='conteneurAdmin'>
        <div id='rechercheClient'>
            <img src="../img/x-transparent-free-png.png" class='fermetureRecherche' id='RechercheClientFermetureBtn'>
            <p class='titleRecherche'>Rechercher un client</p>
            <div class='cacherClient'>
                <p class='titleForm'>Recherche par nom</p>
                <form action='recherche.php?type=client&page=0' method='post'>
                    <div class="recherchePerso">
                        <div class="recherchePersoGauche">
                            <input type='text' name='nomChercher' placeholder='Nom du client' required></input>
                        </div>
                        <div class="recherchePersoDroite">
                            <input type='submit' class='adminFormSubmit' value="Rechercher">
                        </div>
                    </div>
                </form>
                <p class='titleForm'>Recherche par e-mail</p>
                <form action='recherche.php?type=client&page=0' method='post'>
                    <div class="recherchePerso">
                        <div class="recherchePersoGauche">
                            <input type='text' name='emailChercher' placeholder='E-mail du client' required></input>
                        </div>
                        <div class="recherchePersoDroite">
                            <input type='submit' class='adminFormSubmit' value="Rechercher">
                        </div>
                    </div>
                </form>
                <a href="recherche.php?type=client" class='btnAdminAccessAll' id='btnAccesClient'>Tous les clients</a>
        </div>
        <div id='btnRechercheClient' class='btnRecherche'>Voir les recherches disponibles</div>
    </div>
    <div id='rechercheLocation'>
            <img src="../img/x-transparent-free-png.png" class='fermetureRecherche' id='RechercheLocationFermetureBtn'>
            <p class='titleRecherche'>Rechercher une Location</p>
            <div class='cacherLocation'>
                <p class='titleForm'>Recherche par nom du loueur</p>
                <form action='recherche.php?type=location&page=0' method='post'>
                    <div class="recherchePerso">
                        <div class="recherchePersoGauche">
                            <input type='text' name='clientChercher' placeholder='Nom du client'></input>
                        </div>
                        <div class="recherchePersoDroite">
                            <input type='submit' class='adminFormSubmit' value="Rechercher">
                        </div>
                    </div>
                </form>
                <p class='titleForm'>Recherche par immatriculation</p>
                <form action='recherche.php?type=location&page=0' method='post'>
                    <div class="recherchePerso">
                        <div class="recherchePersoGauche">
                            <input type='text' name='immatriculationChercher' placeholder='Numéro Immatriculation'></input>
                        </div>
                        <div class="recherchePersoDroite">
                            <input type='submit' class='adminFormSubmit' value="Rechercher">
                        </div>
                    </div>
                </form>
                <a href="recherche.php?type=location" class='btnAdminAccessAll' id='btnAccesLocation'>Toutes les locations</a>
        </div>
        <div id='btnRechercheLocation' class='btnRecherche'>Voir les recherches disponibles</div>
    </div>
    <div id='rechercheVoiture'>
            <img src="../img/x-transparent-free-png.png" class='fermetureRecherche' id='RechercheVoitureFermetureBtn'>
            <p class='titleRecherche'>Rechercher une Voiture</p>
            <div class='cacherVoiture'>
                <p class='titleForm'>Recherche par Immatriculation</p>
                <form action='recherche.php?type=voiture&page=0' method='post'>
                    <div class="recherchePerso">
                        <div class="recherchePersoGauche">
                            <input type='text' name='immatriculation' placeholder='Immatriculation véhicule'></input>
                        </div>
                        <div class="recherchePersoDroite">
                            <input type='submit' class='adminFormSubmit' value="Rechercher">
                        </div>
                    </div>
                </form>
                <p class='titleForm'>Recherche par marque</p>
                <form action='recherche.php?type=voiture&page=0' method='post'>
                    <div class="recherchePerso">
                        <div class="recherchePersoGauche">
                            <select name='marque' required>
                                <option value='' hidden selected>Recherche par marque</option>
                                <?php
                                    $connexion = connexion();
                                    $requete = "
                                    SELECT *
                                    FROM marque";
                                    $resultat = mysqli_query($connexion, $requete);
                                    $i = 1;
                                    while($ligne = mysqli_fetch_array($resultat)){
                                            echo "<option value=" . $ligne['libelle'] . ">" . $ligne['libelle'] . "</option>";
                                    }
                                ?>
                            </select>
                        </div>
                        <div class="recherchePersoDroite">
                            <input type='submit' class='adminFormSubmit' value="Rechercher">
                        </div>
                    </div>
                </form>
                <p class='titleForm'>Recherche par garage</p>
                <form action='recherche.php?type=voiture&page=0' method='post'>
                    <div class="recherchePerso">
                        <div class="recherchePersoGauche">
                        <select name='garage' required>
                            <option value='' hidden selected>Recherche par ville</option>
                            <?php
                                $connexion = connexion();
                                $requete = "
                                SELECT *
                                FROM garage";
                                $resultat = mysqli_query($connexion, $requete);
                                $i = 1;
                                while($ligne = mysqli_fetch_array($resultat)){
                                    if($i > 1){
                                        echo "<option value=" . $ligne['ville'] . ">" . $ligne['ville'] . "</option>";
                                    }
                                    $i+=1;
                                }
                            ?>
                        </select>
                        </div>
                        <div class="recherchePersoDroite">
                            <input type='submit' class='adminFormSubmit' value="Rechercher">
                        </div>
                    </div>
                </form>
                <a href="recherche.php?type=voiture" class='btnAdminAccessAll' id='btnAccesVoiture'>Toutes les voitures</a>
        </div>
        <div id='btnRechercheVoiture' class='btnRecherche'>Voir les recherches disponibles</div>
    </div>
</div>
<h2 class='titlePartie'>Insertion</h2>
<div class='conteneurAdmin'>
        <div id='btnInsertionClient' class='btnRecherche'>Insertion Client</div>
        <div class='btnRecherche' ><a href="../html/location.php">Insertion Location</a></div> 
        <div id='btnInsertionVoiture' class='btnRecherche'>Insertion Voiture</div>
</div>
<div class="PopUpBg" id="PopUpBg"></div>

<script type='text/javascript' src='../js/profilAdmin_Insertion.js'></script>
<script type='text/javascript' src='../js/rechercheProfilAdmin.js'></script>
