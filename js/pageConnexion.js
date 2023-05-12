const connexion = document.getElementById("headerConnexion");
const inscription = document.getElementById("headerInscription");
const body = document.querySelector(".Main");
const PopUpBg = document.getElementById("PopUpBg");
const linkInscription = document.getElementById("linkInscription");
const linkConnexion = document.getElementById("linkConnexion");

try {
linkConnexion.addEventListener('click', connexionPopUp);
linkInscription.addEventListener('click', inscriptionPopUp);
connexion.addEventListener('click', connexionPopUp);
inscription.addEventListener('click', inscriptionPopUp);
PopUpBg.addEventListener('click', closeAll);
} catch {}


if(new URLSearchParams(window.location.search).get('error') != null){
    document.getElementById("mdpEntré").value = document.getElementById("mdp").value.slice(0, -1);
    document.getElementById("emailEntré").value = document.getElementById("email").value.slice(0, -1);
    document.getElementById("divcomp3").style.visibility = 'visible';
    connexionPopUp();
}

function connexionPopUp(){
    document.querySelector(".PopUpInscription").style.display = 'None';
    body.style.filter = 'blur(10px)';
    document.querySelector(".PopUpBg").style.display = 'block';
    document.querySelector(".PopUpConnexion").style.display = 'block';
}

function inscriptionPopUp(){
    document.querySelector(".PopUpConnexion").style.display = 'None';
    body.style.filter = 'blur(10px)';
    document.querySelector(".PopUpBg").style.display = 'block';
    document.querySelector(".PopUpInscription").style.display = 'block';
}


function closeAll(){
    body.style.filter = 'blur(0px)';
    document.getElementById("mdpEntré").value = null;
    document.getElementById("emailEntré").value = null;
    document.querySelector(".PopUpBg").style.display = 'None';
    document.querySelector(".PopUpConnexion").style.display = 'None';
    document.querySelector(".PopUpInscription").style.display = 'None';
    document.getElementById("divcomp3").style.visibility = 'hidden';
}


function checkPass()
{
console.log("salam")
var champA = document.getElementById("mdp1").value;
var champB = document.getElementById("mdp2").value;
var div_comp = document.getElementById("divcomp");
    if(champA == champB)
        {
        document.getElementById("divcomp2").style.display = 'hidden';
        document.getElementById("divcomp2").style.display = 'none';
        document.getElementById("divcomp").style.display = 'block';
        }
    else
        {
        document.getElementById("divcomp").style.display = 'none';
        document.getElementById("divcomp2").style.display = 'block';
        document.getElementById("divcomp2").style.visibility = 'visible';
        }
}
