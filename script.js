const allSideMenu = document.querySelectorAll('#sidebar .side-menu.top li a');

allSideMenu.forEach(item=> {
	const li = item.parentElement;

	item.addEventListener('click', function () {
		allSideMenu.forEach(i=> {
			i.parentElement.classList.remove('active');
		})
		li.classList.add('active');
	})
});




// TOGGLE SIDEBAR
const menuBar = document.querySelector('#content nav .bx.bx-menu');
const sidebar = document.getElementById('sidebar');

menuBar.addEventListener('click', function () {
	sidebar.classList.toggle('hide');
})







const searchButton = document.querySelector('#content nav form .form-input button');
const searchButtonIcon = document.querySelector('#content nav form .form-input button .bx');
const searchForm = document.querySelector('#content nav form');

searchButton.addEventListener('click', function (e) {
	if(window.innerWidth < 576) {
		e.preventDefault();
		searchForm.classList.toggle('show');
		if(searchForm.classList.contains('show')) {
			searchButtonIcon.classList.replace('bx-search', 'bx-x');
		} else {
			searchButtonIcon.classList.replace('bx-x', 'bx-search');
		}
	}
})





if(window.innerWidth < 768) {
	sidebar.classList.add('hide');
} else if(window.innerWidth > 576) {
	searchButtonIcon.classList.replace('bx-x', 'bx-search');
	searchForm.classList.remove('show');
}


window.addEventListener('resize', function () {
	if(this.innerWidth > 576) {
		searchButtonIcon.classList.replace('bx-x', 'bx-search');
		searchForm.classList.remove('show');
	}
})



const switchMode = document.getElementById('switch-mode');

switchMode.addEventListener('change', function () {
	if(this.checked) {
		document.body.classList.add('dark');
	} else {
		document.body.classList.remove('dark');
	}
})



// Sélectionnez les éléments HTML
var divA = document.getElementById('divA');
var divB = document.getElementById('divB');
var divC = document.getElementById('divC');
var divD = document.getElementById('divD');
var linkA = document.getElementById('linkA');
var linkB = document.getElementById('linkB');
var linkC = document.getElementById('linkC');
var linkD = document.getElementById('linkD');
var container = document.getElementById('container');

container.innerHTML = divA.innerHTML;
divB.style.display="none";
divC.style.display="none";
divD.style.display="none";
// Fonction pour afficher le contenu de A
linkA.addEventListener('click', function() {
    // container.innerHTML = divA.innerHTML;
	container.innerHTML = divA.innerHTML;
	divB.style.display="none";
	divC.style.display="none";
	divD.style.display="none";
});

// Fonction pour afficher le contenu de B
linkB.addEventListener('click', function() {
    // container.innerHTML = divB.innerHTML;
	divA.style.display="none";
	container.innerHTML = divB.innerHTML;
	divC.style.display="none";
	divD.style.display="none";
});

// Fonction pour afficher le contenu de C
linkC.addEventListener('click', function() {
    // container.innerHTML = divC.innerHTML;
	divA.style.display="none";
	divB.style.display="none";
	divD.style.display="none";
	container.innerHTML = divC.innerHTML;
});

// Fonction pour afficher le contenu de C
linkD.addEventListener('click', function() {
    // container.innerHTML = divC.innerHTML;
	divA.style.display="none";
	divB.style.display="none";
	divC.style.display="none";
	container.innerHTML = divD.innerHTML;
});
