
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

const priceFilter = document.getElementById('prix');
//const cards = document.querySelectorAll('.card');

priceFilter.addEventListener('input', () => {
  const maxPrice = priceFilter.value;
  const filteredAnnouncements = Array.from(cards)
    .filter(card => {
        const price = card.dataset.price;
        console.log(price);
        return price > maxPrice;
    });
   
  filteredAnnouncements.forEach(card => card.style.display = 'block');
  console.log(filteredAnnouncements);
  cards.forEach(card => {
    if (!filteredAnnouncements.includes(card)) {
      card.style.display = 'none';
    }
  });
});

//affichage des annonce en detail

    document.addEventListener('DOMContentLoaded', function () {
      // Sélectionnez tous les boutons avec la classe 'button-occasions'
      var buttons = document.querySelectorAll('.button-occasions');
  
      // Ajoutez un gestionnaire d'événements pour chaque bouton
      buttons.forEach(function (button) {
          button.addEventListener('click', function () {
              // Récupérez la valeur du bouton (l'ID de la voiture)
              var carId = button.value;
              // Redirection vers carDetail.php avec l'ID comme paramètre
              location.href = '../templates/carDetail.php?id=' + carId;
          });
      });
  });


