const nav = document.querySelector(".nav-links");
const menuOpen = document.querySelector("#menu");
const menuClose = document.querySelector("#close");
const links = document.querySelectorAll(".nav-links li a");

menuOpen.addEventListener("click", () => {
  nav.classList.toggle("nav-open");
  setTimeout(() => {
    menuClose.style.display = "block";
  }, 100);
});

menuClose.addEventListener("click", () => {
  nav.classList.toggle("nav-open");
  menuClose.style.display = "none";
});

links.forEach((link) => {
  link.addEventListener("click", () => {
    nav.classList.toggle("nav-open");
    menuClose.style.display = "none";
    menuOpen.style.display = "block";
  });
});
