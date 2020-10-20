const demoBtn = document.querySelector(".demo-btn");
const name = document.querySelector("#name");
const email = document.querySelector("#email");
const username = document.querySelector("#username");
const password = document.querySelector("#password");
const mobileNumber = document.querySelector("#mobile");
const address = document.querySelector("#address");
const city = document.querySelector("#city");

demoBtn.addEventListener("click", () => {
  name.value = "Thushara Thiwanka";
  email.value = "thusharathiwanka123@gmail.com";
  username.value = "thushara01";
  password.value = "thushara01";
  mobileNumber.value = "0771738170";
  address.value = "120, Somewhere, Yakkala.";
  city.value = "Yakkala";
});
