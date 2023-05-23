function affichagePage(X){
    for(i = 1 + 50 * X; i <= 50 + 50 * X; i++){
        document.getElementById('tableau').innerHTML += "<?php echo $tableau[" & i & "] ?>";
    }
}

const tableau = document.getElementById('tableau');
affichagePage(1);
