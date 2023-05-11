const connexion = document.getElementById("headerConnexion");
const inscription = document.getElementById("headerInscription");
const body = document.querySelector(".Main");

connexion.addEventListener('click', connexionPopUp);
inscription.addEventListener('click', inscriptionPopUp);

function connexionPopUp(){
    body.style.filter = 'blur(10px)';
    document.querySelector(".PopUpBg").style.visibility = 'Visible';
    document.querySelector(".PopUp").style.visibility = 'Visible';


}

function inscriptionPopUp(){
    body.style.filter = 'blur(10px)';
    document.querySelector(".PopUpBg").style.visibility = 'Visible';
    document.querySelector(".PopUp").style.visibility = 'Visible';
}