
  // Fonction pour afficher la valeur actuelle du curseur
    function afficherValeur(idSlider, idSpan) {
        var slider = document.getElementById(idSlider);
        var span = document.getElementById(idSpan);
    span.innerHTML = slider.value ;
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

const filters = [$minMaxRange["max_prix"]];

const result = filters.filter(($filter) => filter.value <= $minMaxRange["max_prix"]);

console.log(result);
