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

let menuOpenCose = () => {
	console.log('click')
	if(searchform.offsetParent === null){
		searchform.classList.add('open');
	}else{
		searchform.classList.add('close');
	}
}

searchLink.addEventListener('click', menuOpenCose);