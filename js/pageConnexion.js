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

try {
    const aaa = document.getElementById("bugguer");
    aaa.addEventListener('click', connexionPopUp);

} catch{}

if(new URLSearchParams(window.location.search).get('error') == "Connection denied"){
    document.getElementById("mdpEntré").value = document.getElementById("mdp").value.slice(0, -1);
    document.getElementById("emailEntré").value = document.getElementById("email").value.slice(0, -1);
    document.getElementById("divcomp3").style.visibility = 'visible';
    connexionPopUp();
} else if(new URLSearchParams(window.location.search).get('error') == "Inscription denied"){
    document.getElementById("nomInscription").value = document.getElementById("nomInscriptionHide").value.slice(0, -1);
    document.getElementById("telInscription").value = document.getElementById("telephoneInscriptionHide").value.slice(0, -1);
    document.getElementById("prenomInscription").value = document.getElementById("prenomInscriptionHide").value.slice(0, -1);
    document.getElementById("typeSelect").value = document.getElementById("typeclientInscriptionHide").value.slice(0, -1);
    try {
        document.getElementById("groupe").value = document.getElementById("groupInscriptionHide").value.slice(0, -1);
    } catch {}
    document.getElementById("emailInscription").value = document.getElementById("emailInscriptionHide").value.slice(0, -1);
    document.getElementById("adresseInscription").value = document.getElementById("adressePostaleInscriptionHide").value.slice(0, -1);
    document.getElementById("mdp2").value = document.getElementById("verifypasswordInscriptionHide").value.slice(0, -1);
    document.getElementById("mdp1").value = document.getElementById("passwordInscriptionHide").value.slice(0, -1);

    document.getElementById("divcomp4").innerHTML = new URLSearchParams(window.location.search).get('cause');
    document.getElementById("divcomp4").style.visibility = 'visible';
    inscriptionPopUp();
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
    InscriptionClientSpeciaux();
    checkPass();
}

/* Ferme les popup inscription et connexion */
function closeAll(){
    body.style.filter = 'blur(0px)';
    document.getElementById("mdpEntré").value = null;
    document.getElementById("emailEntré").value = null;

    document.getElementById("nomInscription").value = null;
    document.getElementById("telInscription").value = null;
    document.getElementById("prenomInscription").value = null;
    document.getElementById("typeSelect").value = "";
    document.getElementById("groupe").value = null;
    document.getElementById("emailInscription").value = null;
    document.getElementById("adresseInscription").value = null;
    document.getElementById("mdp1").value = null;
    document.getElementById("mdp2").value = null;

    document.querySelector(".PopUpBg").style.display = 'None';
    document.querySelector(".PopUpConnexion").style.display = 'None';
    document.querySelector(".PopUpInscription").style.display = 'None';

    document.getElementById("divcomp").style.visibility = 'hidden';
    document.getElementById("divcomp2").style.visibility = 'hidden';
    document.getElementById("divcomp3").style.visibility = 'hidden';
    document.getElementById("divcomp4").style.visibility = 'hidden';
}

/* Check Password during inscription if they are the same */
function checkPass()
{
let champA = document.getElementById("mdp1").value;
let champB = document.getElementById("mdp2").value;

var div_comp = document.getElementById("divcomp");
    if(champA == champB && champA!="")
        {
        document.getElementById("divcomp2").style.visibility = 'hidden';
        document.getElementById("divcomp2").style.display = 'none';
        document.getElementById("divcomp").style.display = 'block';
        document.getElementById("divcomp").style.visibility = 'visible';
        }
    else if (champA != champB)
        {
        document.getElementById("divcomp").style.display = 'none';
        document.getElementById("divcomp").style.visibility = 'hidden';
        document.getElementById("divcomp2").style.display = 'block';
        document.getElementById("divcomp2").style.visibility = 'visible';
        }
}

/* Selection type_client Nom du group */
function InscriptionClientSpeciaux() {
    if(document.getElementById("typeSelect").value == 3){
        document.getElementsByName("groupe")[0].placeholder="Nom de l'entreprise";
        document.getElementsByName("groupe")[0].style.display='block';
        } else if (document.getElementById("typeSelect").value == 4){
        document.getElementsByName("groupe")[0].placeholder="Nom de l'association";
        document.getElementsByName("groupe")[0].style.display='block';
    } else {
        document.getElementsByName("groupe")[0].style.display='none';
    }
}
