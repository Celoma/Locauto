const connexion = document.getElementById("headerConnexion");
const inscription = document.getElementById("headerInscription");
const body = document.querySelector(".Main");
const PopUpBg = document.getElementById("PopUpBg");

connexion.addEventListener('click', connexionPopUp);
inscription.addEventListener('click', inscriptionPopUp);
PopUpBg.addEventListener('click', closeAll);

function connexionPopUp(){
    body.style.filter = 'blur(10px)';
    document.querySelector(".PopUpBg").style.visibility = 'Visible';
    document.querySelector(".PopUpConnexion").style.visibility = 'Visible';
}

function inscriptionPopUp(){
    body.style.filter = 'blur(10px)';
    document.querySelector(".PopUpBg").style.visibility = 'Visible';
    document.querySelector(".PopUpInscription").style.visibility = 'Visible';
}

function closeAll(){
    body.style.filter = 'blur(0px)';
    document.querySelector(".PopUpBg").style.visibility = 'Hidden';
    document.querySelector(".PopUpConnexion").style.visibility = 'Hidden';
    document.querySelector(".PopUpInscription").style.visibility = 'Hidden';
}