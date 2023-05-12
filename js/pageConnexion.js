const connexion = document.getElementById("headerConnexion");
const inscription = document.getElementById("headerInscription");
const body = document.querySelector(".Main");
const PopUpBg = document.getElementById("PopUpBg");
const linkInscription = document.getElementById("linkInscription");
const linkConnexion = document.getElementById("linkConnexion");


linkConnexion.addEventListener('click', connexionPopUp);
linkInscription.addEventListener('click', inscriptionPopUp);
connexion.addEventListener('click', connexionPopUp);
inscription.addEventListener('click', inscriptionPopUp);
PopUpBg.addEventListener('click', closeAll);

function connexionPopUp(){
    document.querySelector(".PopUpInscription").style.visibility = 'Hidden';
    body.style.filter = 'blur(10px)';
    document.querySelector(".PopUpBg").style.visibility = 'Visible';
    document.querySelector(".PopUpConnexion").style.visibility = 'Visible';
}

function inscriptionPopUp(){
    document.querySelector(".PopUpConnexion").style.visibility = 'Hidden';
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