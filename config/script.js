
//** Fonction pour afficher la valeur actuelle du curseur
  function afficherValeur(idSlider, idSpan) {
      var slider = document.getElementById(idSlider);
      var span = document.getElementById(idSpan);
    span.innerHTML = slider.value  ;
    }
//**Fonction appelée lors de la modification du curseur de prix
function updatePrixValue() {
  // Récupérer la valeur du curseur de prix
  var prixValue = document.getElementById('prix').value;
  // Mettre à jour le contenu de l'élément span avec la valeur du curseur
  document.getElementById('prixValeur').innerText = prixValue + ' €';
}
// Fonction pour filtrer les véhicules en fonction du prix
function getFilteredVehicles(prixValue,anneeValue,kmValue) {
  // Sélectionner toutes les cartes (ou éléments) que vous souhaitez filtrer
  const cards = document.querySelectorAll('.card');
  // Parcourir toutes les cartes et filtrer en fonction du prix
  cards.forEach(function(card) {
      // Récupérer le prix de la carte à partir de l'élément .prix
      var cardPrice = parseInt(card.querySelector('.prix').innerText);
      var cardAnnee = parseInt(card.querySelector('.year').innerText);
      var cardKm = parseInt(card.querySelector('.km').innerText);
      // Vérifier si le prix de la carte est inférieur ou égal à la valeur du curseur de prix
      if (cardPrice <= (prixValue+1)) {
        if (cardAnnee <= (anneeValue+1) && cardKm <= (kmValue+1)) {
          // Afficher la carte si elle correspond au critère de filtrage
          card.style.display = 'block';
      } else {
          // Masquer la carte si elle ne correspond pas au critère de filtrage
          card.style.display = 'none';
      }
  };
})
}

//**affichage des annonce en detail apres clic sur le bouton PLUS DE DETAIL
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
var InfoCarbuttons = document.querySelectorAll('.demandeInfo');
var carSubject = document.querySelector('.subject');

InfoCarbuttons.forEach(function(button) {
  button.addEventListener('click',function(){
    alert (carbouton);
    //redirection
  window.location.href = '../templates/contact.php';
    // Modifiez la valeur et le placeholder du champ de sujet
  carSubject.value = 'Demande info véhicule';
  carSubject.placeholder = 'Demande info véhicule';
});
});
});*/

/*document.addEventListener('DOMContentLoaded', function() {
  // Sélectionnez le bouton "Demande d'info"
  var infoButton = document.querySelector('.demandeInfo'); 

  // Ajoutez un gestionnaire d'événements au clic sur le bouton
  infoButton.addEventListener('click', function() {
      // Redirigez vers la page de contact
      window.location.href = '../templates/contact.php';
      subjectInfo(); // Appelez la fonction pour modifier le sujet
  });

  // Appelez la fonction pour modifier le sujet une fois que la page est chargée
  subjectInfo();
});

function subjectInfo() {
  var subjectInput = document.querySelector('.subject');
  // Modifiez la valeur et le placeholder de l'input
  subjectInput.value = 'Demande info véhicule';
  subjectInput.placeholder = 'Demande info véhicule';
}*/
document.addEventListener('DOMContentLoaded', function() {
  // Sélectionnez le bouton "Demande d'info"
  var infoButton = document.querySelector('.demandeInfo'); 

  // Ajoutez un gestionnaire d'événements au clic sur le bouton
  infoButton.addEventListener('click', function() {
      // Créez un formulaire temporaire
      var form = document.createElement('form');
      form.method = 'POST';
      form.action = '../templates/contact.php';

      // Ajoutez un champ de formulaire pour le sujet
      var subjectInput = document.createElement('input');
      subjectInput.type = 'hidden';
      subjectInput.name = 'subject';
      subjectInput.value = 'Demande info véhicule';

      // Ajoutez le champ de formulaire au formulaire
      form.appendChild(subjectInput);

      // Ajoutez le formulaire à la page et soumettez-le
      document.body.appendChild(form);
      form.submit();
  });
});



function checkboxMessage() {
document.addEventListener('DOMContentLoaded', function () {
    // Sélectionnez la case à cocher
var archiveInput = document.getElementById('archiveInput');
var checkBoxes = document.querySelectorAll('.checkboxMessage'); 
// Ajoutez un gestionnaire d'événements pour l'événement de changement de la case à cocher
checkBoxes.forEach(function(checkBox) {
checkBox.addEventListener('change', function() {
  // Vérifiez si la case à cocher est cochée
  if (checkBox.checked) {
    archiveInput.value = 'Y';
    // Créez une nouvelle div
    var messageDiv = document.createElement('div');
    // Ajoutez du texte à la div
    messageDiv.textContent = 'Message archivé';
    // Ajoutez une classe à la div si nécessaire
    messageDiv.classList.add('messageArchived');
    // Insérez la nouvelle div dans le document, par exemple, avant la case à cocher
    checkBox.parentNode.insertBefore(messageDiv, checkBox.nextSibling);
    
  } else {
    archiveInput.value = '';
    // Supprimez la div si la case à cocher est décochée (si nécessaire)
    var messageArchived = document.querySelector('.messageArchived');
    if (messageArchived) {
      messageArchived.parentNode.removeChild(messageArchived);
      }
    }
  });
  });
});
};

// Notifie  que le message archive avec modification de la valeur et creation de DIV
function checkboxMessage() {
  document.addEventListener('DOMContentLoaded', function () {
      // Sélectionnez toutes les cases à cocher des messages
      var checkBoxes = document.querySelectorAll('.checkboxMessage');

      // Pour chaque case à cocher
      checkBoxes.forEach(function(checkBox) {
          // Ajoutez un gestionnaire d'événements pour l'événement de changement de la case à cocher
          checkBox.addEventListener('change', function() {
              var messageDiv;
              if (checkBox.checked) {
                  // Créez une nouvelle div pour chaque message
                  messageDiv = document.createElement('div');
                  messageDiv.textContent = 'Message archivé';
                  messageDiv.classList.add('messageArchived');
                  
                  // Mettez à jour la valeur du champ caché d'archive
                  var archiveInput = checkBox.nextElementSibling;
                  if (archiveInput && archiveInput.classList.contains('archiveInput')) {
                      archiveInput.value = 'Y';
                  }
              } else {
                  // Recherchez la div correspondante pour chaque case à cocher désélectionnée
                  messageDiv = checkBox.nextElementSibling;
                  if (messageDiv && messageDiv.classList.contains('messageArchived')) {
                      // Supprimez la div si elle existe et contient la classe "messageArchived"
                      messageDiv.parentNode.removeChild(messageDiv);
                      
                      // Mettez à jour la valeur du champ caché d'archive
                      var archiveInput = checkBox.nextElementSibling;
                      if (archiveInput && archiveInput.classList.contains('archiveInput')) {
                          archiveInput.value = '';
                      }
                  }
                  return; // Sortie de la fonction si la case à cocher est désélectionnée
              }
              // Insérez la nouvelle div dans le document, juste après la case à cocher
              checkBox.parentNode.insertBefore(messageDiv, checkBox.nextSibling);
          });
      });
  });
};

function afficherEtoiles(nombre) {
  var etoiles = '';
  for (var i = 0; i < nombre; i++) {
      etoiles += '★'; // Ajoute une étoile à chaque itération
  }
  return etoiles;
}



