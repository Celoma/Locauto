<h1 class='titleProfil'>Compte admin</h1>
<h2 class='titlePartie'>Rechercher</h2>
<div class='conteneurAdmin'>
        <div id='rechercheClient'>
            <img src="../img/x-transparent-free-png.png" class='fermetureRecherche' id='RechercheClientFermetureBtn'>
            <p class='titleRecherche'>Rechercher un client</p>
            <div class='cacherClient'>
                <p class='titleForm'>Recherche par nom</p>
                <form action='recherche.php' method='post'>
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
                <form action='recherche.php' method='post'>
                    <div class="recherchePerso">
                        <div class="recherchePersoGauche">
                            <input type='text' name='emailChercher' placeholder='E-mail du client' required></input>
                        </div>
                        <div class="recherchePersoDroite">
                            <input type='submit' class='adminFormSubmit' value="Rechercher">
                        </div>
                    </div>
                </form>
                <a href="recherche.php?all=client" class='btnAdminAccessAll' id='btnAccesClient'>Tous les clients</a>
        </div>
        <div id='btnRechercheClient' class='btnRecherche'>Voir les recherches disponibles</div>
    </div>

    <div id='rechercheLocation'>
            <img src="../img/x-transparent-free-png.png" class='fermetureRecherche' id='RechercheLocationFermetureBtn'>
            <p class='titleRecherche'>Rechercher une Location</p>
            <div class='cacherLocation'>
                <p class='titleForm'>Recherche par nom du loueur</p>
                <form action='recherche.php' method='post'>
                    <div class="recherchePerso">
                        <div class="recherchePersoGauche">
                            <input type='text' name='nomChercher' placeholder='Nom du client'></input>
                        </div>
                        <div class="recherchePersoDroite">
                            <input type='submit' class='adminFormSubmit' value="Rechercher">
                        </div>
                    </div>
                </form>
                <p class='titleForm'>Recherche par E-mail du loueur</p>
                <form action='recherche.php' method='post'>
                    <div class="recherchePerso">
                        <div class="recherchePersoGauche">
                            <input type='text' name='nomChercher' placeholder='E-mail du client'></input>
                        </div>
                        <div class="recherchePersoDroite">
                            <input type='submit' class='adminFormSubmit' value="Rechercher">
                        </div>
                    </div>
                </form>
                <a href="recherche.php?all=location" class='btnAdminAccessAll' id='btnAccesLocation'>Toutes les locations</a>
        </div>
        <div id='btnRechercheLocation' class='btnRecherche'>Voir les recherches disponibles</div>
    </div>

    <div id='rechercheVoiture'>
            <img src="../img/x-transparent-free-png.png" class='fermetureRecherche' id='RechercheVoitureFermetureBtn'>
            <p class='titleRecherche'>Rechercher une Voiture</p>
            <div class='cacherVoiture'>
                <p class='titleForm'>Recherche par Immatriculation</p>
                <form>
                    <div class="recherchePerso">
                        <div class="recherchePersoGauche">
                            <input type='text' name='nomChercher' placeholder='Immatriculation véhicule'></input>
                        </div>
                        <div class="recherchePersoDroite">
                            <input type='submit' class='adminFormSubmit' value="Rechercher">
                        </div>
                    </div>
                </form>
                <p class='titleForm'>Recherche par identifiant</p>
                <form>
                    <div class="recherchePerso">
                        <div class="recherchePersoGauche">
                            <input type='text' name='nomChercher' placeholder='Identifiant du Voiture'></input>
                        </div>
                        <div class="recherchePersoDroite">
                            <input type='submit' class='adminFormSubmit' value="Rechercher">
                        </div>
                    </div>
                </form>
                <a href="recherche.php?all=voiture" class='btnAdminAccessAll' id='btnAccesVoiture'>Toutes les voitures</a>
        </div>
        <div id='btnRechercheVoiture' class='btnRecherche'>Voir les recherches disponibles</div>
    </div>
</div>
<h2 class='titlePartie'>Insertion</h2>
<script type='text/javascript' src='../js/rechercheProfilAdmin.js'></script>
