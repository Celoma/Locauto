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
            echo "<h1>Affichage des clients</h1>
            <h2 class='recherchetitle'>Voici tous les clients</h2><br><br>";
            $connexion = connexion();
            $sql = "SELECT * FROM client JOIN type_de_client USING (id_type_de_client);";
            $resultat = mysqli_query($connexion, $sql);
            if (mysqli_num_rows($resultat)>0){
                echo "<h2 class='recherchetitle'>Il y a " . mysqli_num_rows($resultat) . " résultats trouvés <br>
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
            }
            while ($row =mysqli_fetch_row($resultat)) {
                echo "<tr>";
                foreach ($row as $k => &$value) {
                    if ($k < 2) continue;
                        echo "<td> " . $value . " </td>";
                }
                echo "</tr>";
            }
        } else if($type == 'location'){
            echo "<h1>Affichage des locations</h1>
            <h2 class='recherchetitle'>Voici toutes les locations</h2><br><br>";
            $connexion = connexion();
            $sql = "SELECT * FROM location JOIN client USING (id_client) JOIN voiture USING (id_voiture);";
            $resultat = mysqli_query($connexion, $sql);
            if (mysqli_num_rows($resultat)>1){
                echo "<h2 class='recherchetitle'>Il y a " . mysqli_num_rows($resultat) . " résultats trouvés <br>
                <table>
                <tr class='enteteRecherche'>
                    <td>Date début</td>
                    <td>Date fin</td>
                    <td>Compteur début</td>
                    <td>Compteur fin</td>
                    <td>E-mail Client</td>
                    <td>Nom Client</td>
                    <td>Immatriculation</td>
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
        } else if($type == 'voiture'){
            echo "<h1>Affichage des voitures</h1>
            <h2 class='recherchetitle'>Voici toutes les voitures</h2><br><br>";
            $connexion = connexion();
            $sql = "SELECT * FROM voiture JOIN client USING (id_client) JOIN voiture USING (id_voiture);";
            $resultat = mysqli_query($connexion, $sql);
            if (mysqli_num_rows($resultat)>1){
                echo "<h2 class='recherchetitle'>Il y a " . mysqli_num_rows($resultat) . " résultats trouvés <br>
                <table>
                <tr class='enteteRecherche'>
                    <td>Date début</td>
                    <td>Date fin</td>
                    <td>Compteur début</td>
                    <td>Compteur fin</td>
                    <td>E-mail Client</td>
                    <td>Nom Client</td>
                    <td>Immatriculation</td>
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
        }
    }
?>