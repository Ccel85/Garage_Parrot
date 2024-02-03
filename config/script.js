
  // Fonction pour afficher la valeur actuelle du curseur
function afficherValeur(idSlider, idSpan) {
        var slider = document.getElementById(idSlider);
        var span = document.getElementById(idSpan);
    span.innerHTML = slider.value  ;
    }
    // Ajouter des écouteurs d'événements pour chaque curseur
    document.getElementById("prix").addEventListener("input", function () {
        afficherValeur("prix", "prixValeur");
    });

    document.getElementById("annee").addEventListener("input", function () {
        afficherValeur("annee", "anneeValeur");
    });

    document.getElementById("km").addEventListener("input", function () {
        afficherValeur("km", "kmValeur");
    });
//Fonction appelée lors de la modification du curseur de prix
function updatePrixValue() {
    // Récupérer la valeur du curseur de prix
    var prixValue = document.getElementById('prix').value;

    // Mettre à jour le contenu de l'élément span avec la valeur du curseur
    document.getElementById('prixValeur').innerText = prixValue + ' €';

    // Appeler votre fonction ici avec la valeur du curseur (par exemple, filtrer les résultats, etc.)
    // Exemple fictif : appel d'une fonction appelée "maFonction" avec la valeur du curseur en tant que paramètre
    getFilteredVehicles(prixValue);
}
// Exemple fictif de fonction à appeler
function getFilteredVehicles(valeur) {
    console.log('La fonction est appelée avec la valeur :', valeur);
    // Ajoutez le code de votre fonction ici
}
//essai avec black box ai
/*function filterElements(array, filterFunction) {
    return array.filter(filterFunction);
  }
  
  const elements = [
    { id: 1, name: 'Element 1', category: 'Category 1' },
    { id: 2, name: 'Element 2', category: 'Category 1' },
    { id: 3, name: 'Element 3', category: 'Category 2' },
    { id: 4, name: 'Element 4', category: 'Category 3' },
  ];
  
  // Filtre pour obtenir les éléments de la catégorie 'Category 1'
  const filterCategory1 = (element) => element.category === 'Category 1';
  
  const filteredElements = filterElements(elements, filterCategory1);
  
  console.log(filteredElements);*/

  //autre essai

  const priceFilter = document.getElementById('prix');
const cards = document.querySelectorAll('.card');

priceFilter.addEventListener('input', () => {
  const maxPrice = priceFilter.value;
  const filteredAnnouncements = Array.from(cards)
    .filter(card => {
        const price = card.dataset.price;
        return price > maxPrice;
    });
    console.log(filteredAnnouncements)
  filteredAnnouncements.forEach(card => card.style.display = 'block');
  cards.forEach(card => {
    if (!filteredAnnouncements.includes(card)) {
      card.style.display = 'none';
    }
  });
});
