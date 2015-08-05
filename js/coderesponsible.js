const mobileBreak = '480';
const inbetween = '600';
const tabletBreak = '880';
const searchLink = document.getElementById('search-link');
const menuLink = document.getElementById('menu-link');
const mainNav = document.getElementById('main-nav');
const searchform = document.getElementById('searchform');

window.onresize = (event) => {
	let windowWidth = window.innerWidth;
	
	if(windowWidth >= inbetween){
		mainNav.classList.add('show');
		mainNav.classList.remove('hide');
		searchform.classList.add('show');
		searchform.classList.remove('hide');
	}else if(windowWidth <= inbetween){
		mainNav.classList.add('hide');
		mainNav.classList.remove('show');
		searchform.classList.add('hide');
		searchform.classList.remove('show');
	}
};

let searchOpenCose = () => {
	if(searchform.offsetParent === null){
		searchLink.className = searchLink.className.replace('hide', '');
		searchform.classList.add('fadeIn');
	}else{
		searchform.className = searchform.className.replace('fadeIn', '');
	}
}

searchLink.addEventListener('click', searchOpenCose);


let menuOpenCose = () => {	
	if(mainNav.offsetParent === null){
		menuLink.className = menuLink.className.replace('hide', '');
		mainNav.classList.add('fadeIn');
	}else{
		mainNav.className = mainNav.className.replace('fadeIn', '');
	}
}

menuLink.addEventListener('click', menuOpenCose);