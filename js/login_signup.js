const connexion = document.getElementById("headerConnexion");
const inscription = document.getElementById("headerInscription");
const body = document.querySelector("body");

connexion.addEventListener('click', connexionPopUp);
inscription.addEventListener('click', inscriptionPopUp);

function connexionPopUp(){
    body.style.filter = 'blur(10px)';
}

function inscriptionPopUp(){
    body.style.filter = 'blur(10px)';
}