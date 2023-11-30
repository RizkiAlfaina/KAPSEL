// Hamburger
const hamburger = document.querySelector('#hamburger');
const navMenu = document.querySelector('#nav-menu');
const logIn = document.querySelector('#login');
const topBar = document.querySelector('#top-bar')

hamburger.addEventListener('click', function() {
    hamburger.classList.toggle('hamburger-active');
    navMenu.classList.toggle('hidden');
    logIn.classList.toggle('hidden');
    topBar.classList.toggle('border-b-2')
})