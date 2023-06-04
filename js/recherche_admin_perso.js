document.querySelector(".PopUpBg").style.display = 'block';
const body = document.querySelector(".Main");
body.style.filter = 'blur(10px)';


const PopUpBg = document.getElementById("PopUpBg");

PopUpBg.addEventListener('click', fermeture);

function fermeture(){
    document.querySelector(".PopUpBg").style.display = 'none';
    document.querySelector(".recherchePopUp").style.display = 'none';
    body.style.filter = 'blur(0px)';
}