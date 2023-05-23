<div class='BodyProfilTop'>
    <h1 class='titreprofil'>Profil</h1>
    <?php echo "<h1>". $_SESSION["nom"] ." ". $_SESSION["prenom"] ."</h1>"; ?>
</div>
<div class="SplitBodyProfil">
    <div class="LeftBodyProfil">
        <div class="unParam">
            <p>Nom</p>
            <?php echo"<input type='text' value= " . $_SESSION['nom'] ."></input>"?>
        </div>
        <div class="unParam">
            <p>Nom</p>
            <?php echo"<input type='text' value= " . $_SESSION['nom'] ."></input>"?>
        </div>
        <div class="unParam">
            <p>Nom</p>
            <?php echo"<input type='text' value= " . $_SESSION['nom'] ."></input>"?>
        </div>
        <div class="unParam">
            <p>Nom</p>
            <?php echo"<input type='text' value= " . $_SESSION['nom'] ."></input>"?>
        </div>
        <div class="unParam">
            <p>Nom</p>
            <?php echo"<input type='text' value= " . $_SESSION['nom'] ."></input>"?>
        </div>
        <div class="unParam">
            <p>Nom</p>
            <?php echo"<input type='text' value= " . $_SESSION['nom'] ."></input>"?>
        </div>
    </div>
    <div class="RightBodyProfil">
        <ul>
            <li class="FirstLi">Dernières Locations</li>
            <?php
            $sql  ="SELECT *
                    FROM client JOIN location USING(id_client)
                    WHERE id_client = " . $_SESSION['id'] . "
                    ORDER BY date_fin DESC
                    LIMIT 3";
            $result = mysqli_query($connexion, $sql);
            if (mysqli_num_rows($result) > 0) {
            } else {
                echo "<li class='noRes'>Aucune réservation</li>";
            }
            ?>
        </ul>
    </div>
</div>