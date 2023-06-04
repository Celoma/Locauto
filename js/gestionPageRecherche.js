page = new URLSearchParams(window.location.search).get('page');
arg = new URLSearchParams(window.location.search).get('type');
var itemsPerPage = 50; // Nombre d'éléments à afficher par page
if(page == null){
  window.location.href = window.location.pathname + "?type=" + arg + "&page=0";
}
function affichagePage(page) {
  var tableauJS = JSON.parse(document.getElementById('recupTableau').dataset.variable);
  const affichage = document.getElementById('tableau');
  const startIndex = page * itemsPerPage;
  const endIndex = startIndex + itemsPerPage;

  // Vérifier les limites de l'indice de fin
  const slicedTableau = tableauJS.slice(startIndex, endIndex);
  if(arg=='voiture'){
    affichage.innerHTML = "<h2><tr class='enteteRecherche'><td>Immatriculation</td><td>Marque</td><td>Modèle</td><td>Type véhicule</td><td>Compteur</td><td>Garage</td><td>Prix</td><td>Image</td></tr></h2>"; 
  } else if(arg=='client') {
    affichage.innerHTML = "<h2><tr class='enteteRecherche'><td>E-mail</td><td>Nom</td><td>Prénom</td><td>Téléphone</td><td>Adresse postale</td><td>Mot de passe</td><td>Type utilisateur</td><td>Groupe appartenance</td></tr></h2>"; 
  } else if(arg=='location'){
    affichage.innerHTML = "<h2><tr class='enteteRecherche'> \
    <td>Nom</td><td>Prénom</td><td>E-mail</td><td>Téléphone</td><td>Garage départ</td> \
    <td>Garage arrivé</td><td>Date départ</td><td>Date Fin</td><td>Immatriculation</td><td>Modèle</td><td>Marque</td> \
    <td>Compteur début</td><td>Compteur Fin</td></tr></h2>";
  }
  for (let i = 0; i < slicedTableau.length; i++) {
    affichage.innerHTML += slicedTableau[i];
  }

  // Met à jour les informations de pagination
  const paginationInfo = document.getElementById('paginationInfo');
  const totalPages = Math.ceil(tableauJS.length / itemsPerPage);
  const startRange = startIndex + 1;
  const endRange = Math.min(startIndex + itemsPerPage, tableauJS.length);
  pageaff = +page + 1;
  paginationInfo.innerHTML = `Page ${pageaff} / ${totalPages} - Affichage de ${startRange}-${endRange} sur ${tableauJS.length} éléments`;
  gestionValue()
}

function goToPage(page) {

  window.location.href = window.location.pathname + "?type=" + arg + "&page=" + page;
}

function previousPage() {
  if (page > 0) {
    page--;
    window.location.href = window.location.pathname + "?type=" + arg + "&page=" + page;
  }
}

function nextPage() {
  page = new URLSearchParams(window.location.search).get('page');
  var tableauJS = JSON.parse(document.getElementById('recupTableau').dataset.variable);
  const maxPage = Math.ceil(tableauJS.length / itemsPerPage) - 1;

  if (page < maxPage) {
    page++;
    window.location.href = window.location.pathname + "?type=" + arg + "&page=" + pageaff;
  }
}

affichagePage(page);

function gestionValue(){
  var rows = document.getElementsByTagName('tr');

  // Ajouter un événement de clic à chaque ligne
  for (var i = 0; i < rows.length; i++) {
    rows[i].addEventListener('click', function() {
      // Supprimer la classe 'selected' de toutes les lignes
      for (var j = 0; j < rows.length; j++) {
        rows[j].classList.remove('selected');
      }

      // Ajouter la classe 'selected' à la ligne cliquée
      this.classList.add('selected');

      // Récupérer l'immatriculation de la ligne
      var value = this.getAttribute('value');
      if(value != null){
        window.location.href = window.location.pathname + "?type=" + arg + "&search=" + value + "&page=" + page;
      }

  });
}
}
