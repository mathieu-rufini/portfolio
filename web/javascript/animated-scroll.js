// **********************************************************************************
// FONCTION QUI PERMET DE DONNER UN EFFET DE DEFILEMENT FLUIDE AUX LIENS 
// CE FICHIER A ETE CREE PAR JOHN DUFRENE
// **********************************************************************************


// ******************************* VERSION JAVASCRIPT *******************************

window.addEventListener('DOMContentLoaded', function() {
    var elt = document.querySelectorAll(".scrollTo");
    elt.forEach(function(element) {
		element.onclick = function(){
   		var page = this.getAttribute('href');
   		var speed = 750;
   		$('html').animate( { scrollTop: $(page).offset().top }, speed );
		return false;
   		}
	});	
});

// ******************************* VERSION JQUERY *******************************

// $(document).ready(function() {
// 		$('.scrollTo').on('click', function() { // Au clic sur un élément
// 			var page = $(this).attr('href'); // Page cible
// 			var speed = 750; // Durée de l'animation (en ms)
// 			$('html, body').animate( { scrollTop: $(page).offset().top }, speed ); // Go
// 			return false;
// 		});
// 	});

// ******************************* MISE EN PLACE HTML *******************************

// <ul class="menu">
// 		<li><a class="js-scrollTo" href="#page-1">Page1</a></li>
// 		<li><a class="js-scrollTo" href="#page-2">Page 2</a></li>
// </ul>

// <div id="page-1">
// 		Contenu Page 1
// </div>

// <div id="page-2">
// 		Contenu Page 
// </div>

// ******************************* INFORMATIONS *******************************

// La méthode .offset() renvoie les coordonnées (relatives au document) de l’élément (ici la page ciblée).
// On modifie la position de la scrollbar (grâce à scrollTop) jusqu’à atteindre cet élément, en animant le défilement avec .animate().




