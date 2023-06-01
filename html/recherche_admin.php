<h2><a class="retour" href="profil.php">Retour</a></h2>
<?php
if(isset($_GET["type"])){
        $type = $_GET["type"];
        if ($type == 'client' or isset($_POST["nomChercher"]) or isset($_POST["emailChercher"])){
            echo "<h1>Affichage des clients</h1>";
            $connexion = connexion();
            if (isset($_POST["nomChercher"])){
                echo "<h2 class='rechercheTitle'>Affichages des clients qui s'appellent : '" . $_POST['nomChercher']. "'</h2>";
                $sql = "SELECT *
                FROM Client JOIN type_de_client USING (id_type_de_client)
                WHERE nom = '" . $_POST["nomChercher"] . "';";
            } else if (isset($_POST["emailChercher"])){
                echo "<h2 class='rechercheTitle'>Affichages des clients avec pour e-mail : '" . $_POST['emailChercher']. "'</h2>";
                $sql = "SELECT *
                FROM Client JOIN type_de_client USING (id_type_de_client)
                WHERE mail = '" . $_POST["emailChercher"] . "';";
            } else {
                $sql = "SELECT * FROM Client JOIN type_de_client USING (id_type_de_client)";
            }
            $resultat = mysqli_query($connexion, $sql);
            $tableau = [];

            while ($row = mysqli_fetch_row($resultat)) {
                $tab = [];
                foreach ($row as $k => &$value) {
                    array_push($tab, $value);
                }
                if(count($tableau)%2 == 1){
                    array_push($tableau, "<tr class='rouge' value='" . $tab[5] . "'><td> " . $tab[5] . " </td>
                    <td> " . $tab[2] . " </td>
                    <td> " . $tab[3] . " </td>
                    <td> " . $tab[7] . " </td>
                    <td> " . $tab[4] . " </td>
                    <td> " . $tab[6] . " </td>
                    <td> " . $tab[9] . " </td>
                    <td> " . $tab[8] . " </td></tr>");
                } else {
                    array_push($tableau, "<tr class='blanche' value='" . $tab[5] . "'><td> " . $tab[5] . " </td>
                    <td> " . $tab[2] . " </td>
                    <td> " . $tab[3] . " </td>
                    <td> " . $tab[7] . " </td>
                    <td> " . $tab[4] . " </td>
                    <td> " . $tab[6] . " </td>
                    <td> " . $tab[9] . " </td>
                    <td> " . $tab[8] . " </td><tr>");
                }
            }
        } else if ($type == 'location' or isset($_POST["clientChercher"]) or isset($_POST["immatriculationChercher"])){
            echo "<h1>Affichage des locations</h1>";
            $connexion = connexion();
            if (isset($_POST["clientChercher"])){
                echo "<h2 class='rechercheTitle'>Affichages des locations de : '" . $_POST['clientChercher']. "'</h2>";
                $sql = "SELECT * FROM location
                JOIN client USING (id_client)
                JOIN voiture USING (immatriculation)
                JOIN garage AS ville_garage_depart ON location.id_garage_depart = ville_garage_depart.id_garage
                JOIN garage AS ville_garage_arrivee ON location.id_garage_lieuArrivee = ville_garage_arrivee.id_garage
                JOIN modele USING (id_modele) JOIN marque USING (id_marque)
                WHERE nom = '" . $_POST["clientChercher"] . "';";
            } else if (isset($_POST["immatriculationChercher"])){
                echo "<h2 class='rechercheTitle'>Affichages des locations du véhicule : '" . $_POST['immatriculationChercher']. "'</h2>";
                $sql = "SELECT * FROM location
                JOIN client USING (id_client)
                JOIN voiture USING (immatriculation)
                JOIN garage AS ville_garage_depart ON location.id_garage_depart = ville_garage_depart.id_garage
                JOIN garage AS ville_garage_arrivee ON location.id_garage_lieuArrivee = ville_garage_arrivee.id_garage
                JOIN modele USING (id_modele) JOIN marque USING (id_marque)
                WHERE immatriculation = '" . $_POST["immatriculationChercher"] . "';";
            } else {
                $sql = "SELECT * FROM location
                JOIN client USING (id_client)
                JOIN voiture USING (immatriculation)
                JOIN garage AS ville_garage_depart ON location.id_garage_depart = ville_garage_depart.id_garage
                JOIN garage AS ville_garage_arrivee ON location.id_garage_lieuArrivee = ville_garage_arrivee.id_garage
                JOIN modele USING (id_modele) JOIN marque USING (id_marque)";
            }
            $resultat = mysqli_query($connexion, $sql);
            $tableau = [];

            while ($row = mysqli_fetch_row($resultat)) {
                $tab = [];
                foreach ($row as $k => &$value) {
                    array_push($tab, $value);
                }
                if(count($tableau)%2 == 1){
                    array_push($tableau, "<tr class='rouge' value='" . $tab[4] . "'><td> " . $tab[11] . " </td>
                    <td> " . $tab[12] . " </td>
                    <td> " . $tab[14] . " </td>
                    <td> " . $tab[16] . " </td>
                    <td> " . $tab[22] . " </td>
                    <td> " . $tab[24] . " </td>
                    <td> " . $tab[5] . " </td>
                    <td> " . $tab[6] . " </td>
                    <td> " . $tab[2] . " </td>
                    <td> " . $tab[25] . " </td>
                    <td> " . $tab[30] . " </td>
                    <td> " . $tab[7] . " </td>
                    <td> " . $tab[8] . " </td></tr>");
                } else {
                    array_push($tableau, "<tr class='blanche' value='" . $tab[4] . "'><td> " . $tab[11] . " </td>
                    <td> " . $tab[12] . " </td>
                    <td> " . $tab[14] . " </td>
                    <td> " . $tab[16] . " </td>
                    <td> " . $tab[22] . " </td>
                    <td> " . $tab[24] . " </td>
                    <td> " . $tab[5] . " </td>
                    <td> " . $tab[6] . " </td>
                    <td> " . $tab[2] . " </td>
                    <td> " . $tab[25] . " </td>
                    <td> " . $tab[30] . " </td>
                    <td> " . $tab[7] . " </td>
                    <td> " . $tab[8] . " </td></tr>");
                }
            }
        } else if ($type == 'voiture' or isset($_POST["garage"]) or isset($_POST["immatriculation"]) or isset($_POST['marque'])) {
            echo "<h1>Affichage des voitures</h1>";
            $connexion = connexion();
            if(isset($_POST["immatriculation"])){
                echo "<h2 class='rechercheTitle'>Affichage de la voiture immatriculée : '" . $_POST['immatriculation']. "'</h2>";
                $sql = "SELECT * FROM voiture JOIN garage USING(id_garage)
                JOIN modele USING (id_modele) JOIN marque USING (id_marque)
                JOIN categorie USING (id_categorie)
                WHERE immatriculation = '" . $_POST['immatriculation'] . "'";
            } else if (isset($_POST["marque"])) {
                echo "<h2 class='rechercheTitle'>Affichages des voitures de la marque : '" . $_POST['marque']. "'</h2>";
                $sql = "SELECT * FROM voiture JOIN garage USING(id_garage)
                JOIN modele USING (id_modele) JOIN marque USING (id_marque)
                JOIN categorie USING (id_categorie)
                WHERE marque.libelle = '" . $_POST['marque'] . "' ORDER BY id_modele";
            } else if (isset($_POST["garage"])) {
                echo "<h2 class='rechercheTitle'>Affichages des voitures actuellement sur : '" . $_POST['garage']. "'</h2>";
                $sql = "SELECT * FROM voiture JOIN garage USING(id_garage)
                JOIN modele USING (id_modele) JOIN marque USING (id_marque)
                JOIN categorie USING (id_categorie)
                WHERE ville = '" . $_POST['garage'] . "' ORDER BY id_modele";
            }
            else {
                $sql = "SELECT * FROM voiture JOIN garage USING(id_garage)
                JOIN modele USING (id_modele) JOIN marque USING (id_marque)
                JOIN categorie USING (id_categorie) ORDER BY id_modele";
            }
            $resultat = mysqli_query($connexion, $sql);
            $tableau = [];
            while ($row = mysqli_fetch_row($resultat)) {
                $tab = [];
                foreach ($row as $k => &$value) {
                    array_push($tab, $value);
                }
                if(count($tableau)%2 == 1){
                    array_push($tableau, "<tr class='rouge' value='" . $tab[4] . "'><td> " . $tab[4] . " </td>
                    <td> " . $tab[11] . " </td>
                    <td> " . $tab[7] . " </td>
                    <td> " . $tab[12] . " </td>
                    <td> " . $tab[5] . " </td>
                    <td> " . $tab[6] . " </td>
                    <td> " . $tab[13] . " </td>
                    <td><img src='../img/bdd_auto/" . $tab[8] . "'></td></tr>");
                } else {
                    array_push($tableau, "<tr class='blanche' value='" . $tab[4] . "'><td> " . $tab[4] . " </td>
                    <td> " . $tab[11] . " </td>
                    <td> " . $tab[7] . " </td>
                    <td> " . $tab[12] . " </td>
                    <td> " . $tab[5] . " </td>
                    <td> " . $tab[6] . " </td>
                    <td> " . $tab[13] . " </td>
                    <td><img src='../img/bdd_auto/" . $tab[8] . "'></td></tr>");
            }
        }
    }
    $totalItems = count($tableau);
    $itemsPerPage = 50;
    $totalPages = ceil($totalItems / $itemsPerPage);
    if(count($tableau)==1){
        echo "<h2 class='rechercheTitle'>Il y a " . $totalItems . " résultat trouvé <br>
            <div id='navigation'>
                <button onclick='previousPage()'>Précédent</button>
                <button onclick='nextPage()'>Suivant</button>
            <div id='paginationInfo'></div>

            </div>
            <table id='tableau'>";

        echo "<div id='recupTableau' data-variable='" . htmlspecialchars(json_encode($tableau), ENT_QUOTES, 'UTF-8') . "'></div>";

        echo "</table>";
        } else if(count($tableau)>0){
        echo "<h2 class='rechercheTitle'>Il y a " . $totalItems . " résultats trouvés <br>
            <div id='navigation'>
                <button onclick='previousPage()'>Précédent</button>
                <button onclick='nextPage()'>Suivant</button>
            <div id='paginationInfo'></div>

            </div>
            <table id='tableau'>";

        echo "<div id='recupTableau' data-variable='" . htmlspecialchars(json_encode($tableau), ENT_QUOTES, 'UTF-8') . "'></div>";

        echo "</table>
            <div id='navigation'>";
        } else {
            echo "<h2 class='rechercheTitle'>Aucun résultat trouvé</h2>";
        }
    }
    
?>

<script type='text/javascript' src='../js/gestionPageRecherche.js'></script>