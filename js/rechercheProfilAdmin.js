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
