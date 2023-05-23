<h2><a class="retour" href="profil.php">Retour</a></h2>
<?php
    if (isset($_POST["nomChercher"])){
        echo "<h1>Recherche client</h1>
        <h2 class='recherchetitle'>Recherche par nom du client : '" . $_POST["nomChercher"]."'</h2><br><br>";
        $connexion = connexion();
        $sql = "SELECT * FROM Client JOIN type_de_client USING (id_type_de_client) WHERE nom = '". $_POST["nomChercher"] . "';";
        $resultat = mysqli_query($connexion, $sql);
        if (mysqli_num_rows($resultat)>1){
            echo "<h2 class='recherchetitle'>Il y a " . mysqli_num_rows($resultat) . " résultats trouvés <br>";
        } else {
        echo "<h2 class='recherchetitle'>Il y a " . mysqli_num_rows($resultat) . " résultat trouvé <br>";
        }
        if (mysqli_num_rows($resultat)>0){
        echo "<table>
        <tr class='enteteRecherche'>
            <td>Prénom</td>
            <td>Nom</td>
            <td>Adresse Postale</td>
            <td>Adresse mail</td>
            <td>Mot de passe</td>
            <td>Téléphone</td>
            <td>Type client</td>
        </tr></h2>";
        }


        while ($row =mysqli_fetch_row($resultat)) {
            echo "<tr>";
            foreach ($row as $k => &$value) {
                if ($k < 2) continue;
                    echo "<td> " . $value . " </td>";
            }
            echo "</tr>";
        }
        echo "</table>";
    } else if (isset($_POST["emailChercher"])) {
        echo "<h1>Recherche client</h1>
        <h2 class='recherchetitle'>Recherche par E-mail du client : '" . $_POST["emailChercher"]."'<br><br></h2>";
        $connexion = connexion();
        $sql = "SELECT * FROM Client JOIN type_de_client USING (id_type_de_client) WHERE mail = '". $_POST["emailChercher"] . "';";
        $resultat = mysqli_query($connexion, $sql);
        if (mysqli_num_rows($resultat)==1){
            echo "<h2 class='recherchetitle'>Il y a " . mysqli_num_rows($resultat) . " résultat trouvé <br>
            <table>
            <tr class='enteteRecherche'>
                <td>Prénom</td>
                <td>Nom</td>
                <td>Adresse Postale</td>
                <td>Adresse mail</td>
                <td>Mot de passe</td>
                <td>Téléphone</td>
                <td>Type client</td>
            </tr></h2>";
        } else {
        echo "<h2 class='recherchetitle'>Il y a " . mysqli_num_rows($resultat) . " résultat trouvé <br></h2>";
        }
        while ($row =mysqli_fetch_row($resultat)) {
            echo "<tr>";
            foreach ($row as $k => &$value) {
                if ($k < 2) continue;
                    echo "<td> " . $value . " </td>";
            }
            echo "</tr>";
        }
        echo "</table>";
    } else if(isset($_GET["all"])){
        $type = $_GET["all"];
        if ($type == 'client'){
            echo "<h1>Affichage des voitures</h1>";
            $connexion = connexion();
            $sql = "SELECT * FROM Client JOIN type_de_client USING (id_type_de_client)";
            $resultat = mysqli_query($connexion, $sql);
            $tableau = [];
        
            while ($row = mysqli_fetch_row($resultat)) {
                $tab = [];
                foreach ($row as $k => &$value) {
                    array_push($tab, $value);
                }
                array_push($tableau, "<td> " . $tab[5] . " </td>
                    <td> " . $tab[2] . " </td>
                    <td> " . $tab[3] . " </td>
                    <td> " . $tab[7] . " </td>
                    <td> " . $tab[8] . " </td>
                    <td> " . $tab[4] . " </td>
                    <td> " . $tab[6] . " </td>");
            }
            $totalItems = count($tableau);
            $itemsPerPage = 50;
            $totalPages = ceil($totalItems / $itemsPerPage);
            
            echo "<h2 class='recherchetitle'>Il y a " . $totalItems . " résultats trouvés <br>
                <div id='navigation'>
                    <button onclick='previousPage()'>Précédent</button>
                    <button onclick='nextPage()'>Suivant</button>
                    <div id='paginationInfo'></div>

                </div>
                <table id='tableau'>";
            
            echo "<div id='recupTableau' data-variable='" . htmlspecialchars(json_encode($tableau), ENT_QUOTES, 'UTF-8') . "'></div>";
            
            echo "</table>";
        } else if($type == 'location'){
            echo "<h1>Affichage des voitures</h1>";
            $connexion = connexion();
            $sql = "SELECT * FROM voiture JOIN garage USING(id_garage) JOIN modele USING (id_modele) JOIN marque USING (id_marque) JOIN categorie USING (id_categorie)";
            $resultat = mysqli_query($connexion, $sql);
            $tableau = [];
        
            while ($row = mysqli_fetch_row($resultat)) {
                $tab = [];
                foreach ($row as $k => &$value) {
                    array_push($tab, $value);
                }
                array_push($tableau, "<td> " . $tab[4] . " </td>
                    <td> " . $tab[11] . " </td>
                    <td> " . $tab[7] . " </td>
                    <td> " . $tab[12] . " </td>
                    <td> " . $tab[5] . " </td>
                    <td> " . $tab[6] . " </td>
                    <td> " . $tab[13] . " </td>
                    <td><img src='../img/bdd_auto/" . $tab[8] . "'></td>");
            }
            $totalItems = count($tableau);
            $itemsPerPage = 50;
            $totalPages = ceil($totalItems / $itemsPerPage);
            
            echo "<h2 class='recherchetitle'>Il y a " . $totalItems . " résultats trouvés <br>
                <div id='navigation'>
                    <button onclick='previousPage()'>Précédent</button>
                    <button onclick='nextPage()'>Suivant</button>
                    <div id='paginationInfo'></div>

                </div>
                <table id='tableau'>";
            
            echo "<div id='recupTableau' data-variable='" . htmlspecialchars(json_encode($tableau), ENT_QUOTES, 'UTF-8') . "'></div>";
            
            echo "</table>";
        } else if ($type == 'voiture') {
            echo "<h1>Affichage des voitures</h1>";
            $connexion = connexion();
            $sql = "SELECT * FROM voiture JOIN garage USING(id_garage) JOIN modele USING (id_modele) JOIN marque USING (id_marque) JOIN categorie USING (id_categorie) ORDER BY id_modele";
            $resultat = mysqli_query($connexion, $sql);
            $tableau = [];
        
            while ($row = mysqli_fetch_row($resultat)) {
                $tab = [];
                foreach ($row as $k => &$value) {
                    array_push($tab, $value);
                }
                array_push($tableau, "<td> " . $tab[4] . " </td>
                    <td> " . $tab[11] . " </td>
                    <td> " . $tab[7] . " </td>
                    <td> " . $tab[12] . " </td>
                    <td> " . $tab[5] . " </td>
                    <td> " . $tab[6] . " </td>
                    <td> " . $tab[13] . " </td>
                    <td><img src='../img/bdd_auto/" . $tab[8] . "'></td>");
            }
            $totalItems = count($tableau);
            $itemsPerPage = 50;
            $totalPages = ceil($totalItems / $itemsPerPage);
            
            echo "<h2 class='recherchetitle'>Il y a " . $totalItems . " résultats trouvés <br>
                <div id='navigation'>
                    <button onclick='previousPage()'>Précédent</button>
                    <button onclick='nextPage()'>Suivant</button>
                    <div id='paginationInfo'></div>

                </div>
                <table id='tableau'>";
            
            echo "<div id='recupTableau' data-variable='" . htmlspecialchars(json_encode($tableau), ENT_QUOTES, 'UTF-8') . "'></div>";
            
            echo "</table>";
        }
    }
?>

<script type='text/javascript' src='../js/gestionPageRecherche.js'></script>