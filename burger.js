const burger = document.querySelector(".burger");
const info = document.querySelector(".header__info");
const burgerSpan = document.querySelector(".burger__span");
const after = document.querySelector(".burger__span:after");
const before = document.querySelector(".burger__span:before");

function burgerOpen() {
  if (info.closest(".open")) {
    info.classList.remove("open");
    burger.classList.remove("burgerOpen");
  } else {
    info.classList.add("open");
    burger.classList.add("burgerOpen");
  }
}

burger.addEventListener("click", burgerOpen);
