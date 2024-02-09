
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

//inserer titre dans DOM Info vehicule sur le formulaire

/*document.addEventListener('DOMContentLoaded', function() {
var InfoCarbuttons = document.querySelectorAll('.info-occasions');
var carSubject = document.querySelector('.subject');

InfoCarbuttons.forEach(function(button) {
  button.addEventListener('click',function(){
    // Modifiez la valeur et le placeholder du champ de sujet
  carSubject.value = 'Demande info véhicule';
  carSubject.placeHolder = 'Demande info véhicule';
  //redirection
  window.location.href = '../templates/contact.php';
});
});
});*/

function demandeInfo() {
  // Sélectionnez le bouton "Demande d'info"
  var infoButton = document.querySelector('.demandeInfo'); 
  
  // Ajoutez un gestionnaire d'événements au clic sur le bouton
  infoButton.addEventListener('click', function() {
    // Redirigez vers la page de contact
    window.location.href = '../templates/contact.php';
  });
    document.addEventListener('DOMContentLoaded', function() {
      // Sélectionnez l'élément input avec la classe "subject"
  var subjectInput = document.querySelector('.subject');

      // Modifiez la valeur et le placeholder de l'input
      subjectInput.value = 'Demande info véhicule';
      subjectInput.placeholder = 'Demande info véhicule';
    });
};
    
    
function checkboxMessage() {
document.addEventListener('DOMContentLoaded', function () {
    // Sélectionnez la case à cocher
var checkBox = document.querySelector('.checkboxMessage'); 
// Ajoutez un gestionnaire d'événements pour l'événement de changement de la case à cocher
checkBox.addEventListener('change', function() {
  // Vérifiez si la case à cocher est cochée
  if (checkBox.checked) {
    // Créez une nouvelle div
    var messageDiv = document.createElement('div');
    // Ajoutez du texte à la div
    messageDiv.textContent = 'Message archivé';
    // Ajoutez une classe à la div si nécessaire
    messageDiv.classList.add('messageArchived');
    // Insérez la nouvelle div dans le document, par exemple, avant la case à cocher
    checkBox.parentNode.insertBefore(messageDiv, checkBox.nextSibling);
  } else {
    // Supprimez la div si la case à cocher est décochée (si nécessaire)
    var messageArchived = document.querySelector('.messageArchived');
    if (messageArchived) {
      messageArchived.parentNode.removeChild(messageArchived);
    }
  }
});
  });
};

    


