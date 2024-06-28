// Stocker la position de défilement précédente
var prevScrollPos = window.pageYOffset;

// Sélectionner le header
var Monheader = document.getElementById('Myheader');

// Fonction pour gérer le défilement
function handleScroll() {
    // Obtenir la position de défilement actuelle
    let currentScrollPos = window.pageYOffset;

    // Vérifier si la direction de défilement est vers le haut
    if (prevScrollPos > currentScrollPos) {
        // Afficher le header
        // Monheader.style.position='stick';
        Monheader.style.zIndex='1';
        Monheader.style.top = '0';
        Monheader.style.transition = '500ms ease-in-out';
    } else {
        Monheader.style.zIndex='1';
        Monheader.style.top = '-' + Monheader.offsetHeight + 'px';
    }

    // Mettre à jour la position de défilement précédente
    prevScrollPos = currentScrollPos;
}

// Attacher un écouteur d'événement de défilement
window.addEventListener('scroll', handleScroll);


const toggleButton = document.querySelector('.amburgeur');
  const NavMenu = document.getElementById('nav');
  const Toogle = document.getElementById('menu');
  const Retour = document.getElementById('retour');

  toggleButton.addEventListener('click', function() {
    // Vérifiez si le menu est actuellement caché
    if (NavMenu.classList.contains('cacher')) {
      // Afficher le menu en retirant la classe "hidden"
      NavMenu.classList.remove('cacher');
      Toogle.style.display = 'none';
      Retour.style.display = 'block';

    } else {
      // Cacher le menu en ajoutant la classe "hidden"
      NavMenu.classList.add('cacher');
      Toogle.style.display = 'block';
      Toogle.style.transition = '200ms ease-in-out';
      Retour.style.display = 'none';
    }
  });

  
