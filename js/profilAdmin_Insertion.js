const btnClient = document.getElementById('btnInsertionClient');
const btnVoiture = document.getElementById('btnInsertionVoiture');
const btnLocation = document.getElementById('btnInsertionLocation');

const PopUpBg = document.getElementById("PopUpBg");
document.querySelector(".PopUpBg").style.display = 'none';

PopUpBg.addEventListener('click', fermeture);
btnClient.addEventListener("click", insertClient);
btnLocation.addEventListener("click", insertLocation);
btnVoiture.addEventListener("click", insertVoiture);


function fermeture(){
    document.querySelector(".PopUpBg").style.display = 'none';
    document.querySelector(".PopUpClient").style.display = 'none';
    document.querySelector(".PopUpLocation").style.display = 'none';
    document.querySelector(".PopUpVoiture").style.display = 'none';


    const body = document.querySelector(".Main");
    body.style.filter = 'blur(0px)';
}

function setUp(){
    document.querySelector(".PopUpBg").style.display = 'block';
    const body = document.querySelector(".Main");
    body.style.filter = 'blur(10px)';
}

function insertClient(){
    document.querySelector(".PopUpClient").style.display = 'block';
    setUp();
    InscriptionClientSpeciaux();
}

function insertLocation(){
    document.querySelector(".PopUpLocation").style.display = 'block';
    setUp();
}

function insertVoiture(){
    document.querySelector(".PopUpVoiture").style.display = 'block';
    setUp();
}

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
