const profilMenusDropdown = document.querySelector("#profilmenus");
const profil = document.querySelector("#profil");

profil.addEventListener("click", function () {
  if (window.innerWidth < 1280) {
    profilMenusDropdown.classList.toggle("hidden");
  }
});
