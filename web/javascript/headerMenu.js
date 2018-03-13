//N.B : Toute les fonctionnalité sont comprise dans la méthode 'fixerMenu()'

//****************************************************************************
window.onscroll = fixerMenu;
function fixerMenu(){
// NOM : Fixer Menu
// DESCRIPTION : 
//	Permet de faire apparaitre le menu
//	seulement après 1/5 de la hauteur de la div 'accueil'

	var nav1 = document.getElementById("menu");
	
	if (window.pageYOffset >= document.documentElement.offsetHeight/5) 
	// if (window.pageYOffset >= 1) 
	{
		nav1.classList.add("bloquerMenu");
	}else{
		nav1.classList.remove("bloquerMenu");
	}

//****************************************************************************
// NOM : Scroll Effet Menu
// DESCRIPTION : 
//	Permet d'affecter la classe 'effetMenu' à un élément du menu
//	en fonction de la position du scroll 
//	(ex: effectue 'effetMenu' sur l'élément 'Expérience' du menu
//	lorsque le scroll est entre l'élément 'Expérience' et l'élément suivant)


	// Recupération des éléments du menu afin de créer un tableau dynamique
	// (les éléments sont contenus dans des sections)
	var menus = document.querySelector("#menu").querySelectorAll("a");
	var sections = document.querySelectorAll("section");
	var accueil = sections[0].id;

	// Création du tableau contenant les éléments à vérifier
	var pairs = [];
	for ( var i = 0; i < menus.length; i++ ) {
		pairs.push([ menus[i].id, sections[i+1].id ]);
	}

	// Constantes permettant le calcul de la hauteur des sections en px
	var scrollTOP =  document.documentElement.scrollTop;
	var scrollB = document.getElementById(accueil).offsetHeight;


	// Parcours du tableau et vérification des éléments afin d'attribuer la classe 'effetMenu'
	for ( var i = 0; i < pairs.length; i++ ) {
		scrollA = scrollB;
		scrollB = scrollA + document.getElementById(pairs[i][1]).offsetHeight;
		var element = document.getElementById(pairs[i][0]);

		if( scrollTOP >= scrollA && scrollTOP < scrollB){
			element.classList.add("effetMenu");
		}
		else {
			element.classList.remove("effetMenu");
		}
	}

//****************************************************************************

}
