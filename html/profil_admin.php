<h1 class='titleProfil'>Compte admin</h1>
<h2 class='titlePartie'>Rechercher</h2>
<div class='conteneurAdmin'>
        <div id='rechercheClient'>
            <img src="../img/x-transparent-free-png.png" class='fermetureRecherche' id='RechercheClientFermetureBtn'>
            <p class='titleRecherche'>Rechercher un client</p>
            <div class='cacherClient'>
                <p class='titleForm'>Recherche par nom</p>
                <form class='RechercheByName'>
                    <div class="recherchePerso">
                        <div class="recherchePersoGauche">
                            <input type='text' name='nomChercher' placeholder='Nom du client'></input>
                        </div>
                        <div class="recherchePersoDroite">
                            <input type='submit' class='adminFormSubmit' value="Rechercher">
                        </div>
                    </div>
                </form>
                <p class='titleForm'>Recherche par identifiant</p>
                <form class='RechercheByName'>
                    <div class="recherchePerso">
                        <div class="recherchePersoGauche">
                            <input type='text' name='nomChercher' placeholder='Identifiant du Client'></input>
                        </div>
                        <div class="recherchePersoDroite">
                            <input type='submit' class='adminFormSubmit' value="Rechercher">
                        </div>
                    </div>
                </form>

                <a href="#" class='btnAdminAccessAll' id='btnAccesClient'>Toules les clients</a>
        </div>
        <div id='btnRechercheClient' class='btnRecherche'>Voir les recherches disponibles</div>
    </div>

    <div id = 'rechercheResa'>
        <p class='titleRecherche'>Rechercher une location</p>
        <form>
        </form>
        <a href="#" class='btnAdminAccessAll'>Toutes les locations</a>
    </div>
    <div id='rechercheVoiture'>
        <p class='titleRecherche'>Rechercher une voiture</p>
        <form>
        </form>
        <a href="#" class='btnAdminAccessAll'>Toutes les voitures</a>
    </div>
</div>
<h2 class='titlePartie'>Insertion</h2>
<script type='text/javascript' src='../js/rechercheProfilAdmin.js'></script>