function sliderShow() {
  const btnPre = document.getElementById("pre");
  const btnNext = document.getElementById("next");
  const slide = document.querySelector(".slide-container");
  const imgItem = document.querySelectorAll(".img-item");
  const dots = document.querySelectorAll(".dots-slide li");

  var index = 0;
  var lengthImg = imgItem.length - 1;

  let autoReload = setInterval(() => {
    btnNext.click();
  }, 2500);

  function reloadSlider() {
    let checkleft = imgItem[index].offsetLeft;
    slide.style.transform = `translateX(-${checkleft}px)`;

    let lastActiveDot = document.querySelector(".dots-slide li.active");
    lastActiveDot.classList.remove("active");
    dots[index].classList.add("active");
  }

  dots.forEach((li, key) => {
    li.addEventListener("click", function () {
      index = key;
      reloadSlider();
    });
  });

  btnNext.onclick = function () {
    if (index === lengthImg) {
      index = 0;
    } else {
      index++;
    }
    reloadSlider();
    clearInterval(autoReload);
  };

  btnPre.onclick = function () {
    if (index === 0) {
      index = lengthImg;
    } else {
      index--;
    }
    reloadSlider();
    clearInterval(autoReload);
  };
}
sliderShow();
