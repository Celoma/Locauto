<?php
    $requete = "
    SELECT *
    FROM type_de_client";
    $resultat = mysqli_query($connexion, $requete);
    $i = 1;
    while($ligne = mysqli_fetch_array($resultat)){
        if($i > 1){
            echo "<option value=" .$i . ">" . $ligne['libelle'] . "</option>";
        }
        $i+=1;
    }
?>