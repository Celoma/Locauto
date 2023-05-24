<h2><a class="retour" href="profil.php">Retour</a></h2>
<?php
if(isset($_GET["type"])){
        $type = $_GET["type"];
        if ($type == 'client' or isset($_POST["nomChercher"]) or isset($_POST["emailChercher"])){
            echo "<h1>Affichage des voitures</h1>";
            $connexion = connexion();
            if (isset($_POST["nomChercher"])){
                echo "<h2 class='rechercheTitle'>Affichages des clients qui s'appellent : " . $_POST['nomChercher']. "</h2>";
                $sql = "SELECT *
                FROM Client JOIN type_de_client USING (id_type_de_client)
                WHERE nom = '" . $_POST["nomChercher"] . "';";
            } else if (isset($_POST["emailChercher"])){
                echo "<h2 class='rechercheTitle'>Affichages des clients avec pour e-mail : " . $_POST['emailChercher']. "</h2>";
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
                    array_push($tableau, "<tr class='rouge'><td> " . $tab[5] . " </td>
                    <td> " . $tab[2] . " </td>
                    <td> " . $tab[3] . " </td>
                    <td> " . $tab[7] . " </td>
                    <td> " . $tab[8] . " </td>
                    <td> " . $tab[4] . " </td>
                    <td> " . $tab[6] . " </td></tr>");
                } else {
                    array_push($tableau, "<td> " . $tab[5] . " </td>
                    <td> " . $tab[2] . " </td>
                    <td> " . $tab[3] . " </td>
                    <td> " . $tab[7] . " </td>
                    <td> " . $tab[8] . " </td>
                    <td> " . $tab[4] . " </td>
                    <td> " . $tab[6] . " </td>");
                }
            }
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
                if(count($tableau)%2 == 1){
                    array_push($tableau, "<tr class='rouge'><td> " . $tab[4] . " </td>
                    <td> " . $tab[11] . " </td>
                    <td> " . $tab[7] . " </td>
                    <td> " . $tab[12] . " </td>
                    <td> " . $tab[5] . " </td>
                    <td> " . $tab[6] . " </td>
                    <td> " . $tab[13] . " </td>
                    <td><img src='../img/bdd_auto/" . $tab[8] . "'></td></tr>");
                } else {
                    array_push($tableau, "<td> " . $tab[4] . " </td>
                    <td> " . $tab[11] . " </td>
                    <td> " . $tab[7] . " </td>
                    <td> " . $tab[12] . " </td>
                    <td> " . $tab[5] . " </td>
                    <td> " . $tab[6] . " </td>
                    <td> " . $tab[13] . " </td>
                    <td><img src='../img/bdd_auto/" . $tab[8] . "'></td>");
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