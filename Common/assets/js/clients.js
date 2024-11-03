import { functionCarousel } from "./function.js";
const carousel = new functionCarousel();
carousel.initSlider(
  ".carousel-container",
  ".carousel-item",
  "#btn-next",
  "#btn-pre",
  1500,
  20
);

carousel.initSlider(
  ".container-sale",
  ".cart-sale",
  "#btn-next",
  "#btn-pre",
  2500,
  20
);

carousel.initSlider(
  ".container-comment",
  ".card-comment",
  "#Next-comment",
  "#Pre-comment",
  2500,
  20
);

// Slider đặc biệt với điều hướng và dots
function sliderShow() {
  const btnPre = document.getElementById("pre");
  const btnNext = document.getElementById("next");
  const slide = document.querySelector(".slide-container");
  const imgItem = document.querySelectorAll(".img-item");
  const dots = document.querySelectorAll(".dots-slide li");

  let index = 0;
  const lengthImg = imgItem.length - 1;

  let autoReload = setInterval(() => btnNext.click(), 2500);

  function reloadSlider() {
    slide.style.transform = `translateX(-${imgItem[index].offsetLeft}px)`;
    document.querySelector(".dots-slide li.active").classList.remove("active");
    dots[index].classList.add("active");
  }

  dots.forEach((li, key) =>
    li.addEventListener("click", () => {
      index = key;
      reloadSlider();
    })
  );

  btnNext.onclick = () => {
    index = index === lengthImg ? 0 : index + 1;
    reloadSlider();
    clearInterval(autoReload);
  };

  btnPre.onclick = () => {
    index = index === 0 ? lengthImg : index - 1;
    reloadSlider();
    clearInterval(autoReload);
  };
}

sliderShow();

// Countdown timer
const endTime = new Date("2024-12-31T23:59:59").getTime();

function updateCountdown() {
  const now = new Date().getTime();
  const timeLeft = endTime - now;
  const hours = Math.floor(
    (timeLeft % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60)
  );
  const minutes = Math.floor((timeLeft % (1000 * 60 * 60)) / (1000 * 60));
  const seconds = Math.floor((timeLeft % (1000 * 60)) / 1000);

  document.getElementById("hours").textContent = String(hours).padStart(2, "0");
  document.getElementById("minutes").textContent = String(minutes).padStart(
    2,
    "0"
  );
  document.getElementById("seconds").textContent = String(seconds).padStart(
    2,
    "0"
  );

  if (timeLeft < 0) {
    clearInterval(countdownInterval);
    document.querySelector(".title-time-sale").textContent =
      "Đã hết thời gian khuyến mãi";
  }
}

const countdownInterval = setInterval(updateCountdown, 1000);
updateCountdown();
