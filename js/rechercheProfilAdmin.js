const btnOpenClient = document.getElementById("btnRechercheClient");
const RechercheClientFermetureBtn = document.getElementById("RechercheClientFermetureBtn");

btnOpenClient.addEventListener('click', ouvertureRechercheClient);
RechercheClientFermetureBtn.addEventListener('click', fermetureRechercheClient);

function ouvertureRechercheClient(){
    btnOpenClient.style.display = 'none';
    RechercheClientFermetureBtn.style.display = 'block';
    document.querySelector('.cacherClient').style.display = 'block';
}

function fermetureRechercheClient(){
    btnOpenClient.style.display = 'block';
    RechercheClientFermetureBtn.style.display = 'none'
    document.querySelector('.cacherClient').style.display = 'none';
}


const btnOpenVoiture = document.getElementById("btnRechercheVoiture");
const RechercheVoitureFermetureBtn = document.getElementById("RechercheVoitureFermetureBtn");

btnOpenVoiture.addEventListener('click', ouvertureRechercheVoiture);
RechercheVoitureFermetureBtn.addEventListener('click', fermetureRechercheVoiture);

function ouvertureRechercheVoiture(){
    btnOpenVoiture.style.display = 'none';
    RechercheVoitureFermetureBtn.style.display = 'block';
    document.querySelector('.cacherVoiture').style.display = 'block';
}

function fermetureRechercheVoiture(){
    btnOpenVoiture.style.display = 'block';
    RechercheVoitureFermetureBtn.style.display = 'none'
    document.querySelector('.cacherVoiture').style.display = 'none';
}
const btnOpenLocation = document.getElementById("btnRechercheLocation");
const RechercheLocationFermetureBtn = document.getElementById("RechercheLocationFermetureBtn");

btnOpenLocation.addEventListener('click', ouvertureRechercheLocation);
RechercheLocationFermetureBtn.addEventListener('click', fermetureRechercheLocation);

function ouvertureRechercheLocation(){
    btnOpenLocation.style.display = 'none';
    RechercheLocationFermetureBtn.style.display = 'block';
    document.querySelector('.cacherLocation').style.display = 'block';
}

function fermetureRechercheLocation(){
    btnOpenLocation.style.display = 'block';
    RechercheLocationFermetureBtn.style.display = 'none'
    document.querySelector('.cacherLocation').style.display = 'none';
}