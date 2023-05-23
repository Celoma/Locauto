var currentPage = 0; // Variable pour suivre la page actuelle
var itemsPerPage = 50; // Nombre d'éléments à afficher par page

function affichagePage(page) {
  var tableauJS = JSON.parse(document.getElementById('recupTableau').dataset.variable);
  const affichage = document.getElementById('tableau');
  const startIndex = page * itemsPerPage;
  const endIndex = startIndex + itemsPerPage;

  // Vérifier les limites de l'indice de fin
  const slicedTableau = tableauJS.slice(startIndex, endIndex);
  if(new URLSearchParams(window.location.search).get('all')=='voiture'){
    affichage.innerHTML = "<h2><tr class='enteteRecherche'><td>Immatriculation</td><td>Marque</td><td>Modèle</td><td>Type véhicule</td><td>Compteur</td><td>Garage</td><td>Prix</td><td>Image</td></tr></h2>"; 
  } else if(new URLSearchParams(window.location.search).get('all')=='client') {
    affichage.innerHTML = "<h2><tr class='enteteRecherche'><td>E-mail</td><td>Nom</td><td>Prénom</td><td>Téléphone</td><td>Groupe appartenance</td><td>Adresse postale</td><td>Mot de passe</td></tr></h2>"; 
  } else if(new URLSearchParams(window.location.search).get('all')=='location'){
    affichage.innerHTML = "<h2><tr class='enteteRecherche'><td>Immatriculation</td><td>Marque</td><td>Modèle</td><td>Type véhicule</td><td>Compteur</td><td>Garage</td><td>Prix</td><td>Image</td></tr></h2>";
  }
  for (let i = 0; i < slicedTableau.length; i++) {
    affichage.innerHTML += slicedTableau[i];
  }

  // Met à jour les informations de pagination
  const paginationInfo = document.getElementById('paginationInfo');
  const totalPages = Math.ceil(tableauJS.length / itemsPerPage);
  const startRange = startIndex + 1;
  const endRange = Math.min(startIndex + itemsPerPage, tableauJS.length);

  paginationInfo.innerHTML = `Page ${page + 1} / ${totalPages} - Affichage de ${startRange}-${endRange} sur ${tableauJS.length} éléments`;
}

function goToPage(page) {
  currentPage = page;
  affichagePage(currentPage);
}

function previousPage() {
  if (currentPage > 0) {
    currentPage--;
    affichagePage(currentPage);
  }
}

function nextPage() {
  var tableauJS = JSON.parse(document.getElementById('recupTableau').dataset.variable);
  const maxPage = Math.ceil(tableauJS.length / itemsPerPage) - 1;

  if (currentPage < maxPage) {
    currentPage++;
    affichagePage(currentPage);
  }
}

affichagePage(currentPage);
