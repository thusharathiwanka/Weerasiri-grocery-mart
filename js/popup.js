const closeBtn = document.querySelector("#close");
const popupWindow = document.querySelector(".pop-window");
const viewBtn = document.querySelector(".view-customer");

viewBtn.addEventListener("click", () => {
  setTimeout(() => {
    popupWindow.style.display = "block";
    popupWindow.style.pointerEvents = "all";
    console.log("clicked");
  }, 2000);
});
