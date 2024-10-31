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

function sliderBanner() {
  const container = document.querySelector(".carousel-container");
  const widthItem = document.querySelector(".carousel-item").offsetWidth + 20;

  function autoScroll() {
    if (container.scrollLeft + container.offsetWidth >= container.scrollWidth) {
      container.scrollLeft = 0;
    } else {
      container.scrollLeft += widthItem;
    }
  }

  let autoScrollInterval = setInterval(autoScroll, 1500);

  container.addEventListener("mouseover", function () {
    clearInterval(autoScrollInterval);
  });

  container.addEventListener("mouseout", function () {
    autoScrollInterval = setInterval(autoScroll, 1500);
  });
}

sliderBanner();

function sliderSale() {
  const container = document.querySelector(".container-sale");
  const widthItem = document.querySelector(".cart-sale").offsetWidth + 20;

  document.getElementById("btn-next").onclick = function () {
    if (container.scrollLeft + container.offsetWidth >= container.scrollWidth) {
      container.scrollLeft = 0;
    } else {
      container.scrollLeft += widthItem;
    }
  };

  document.getElementById("btn-pre").onclick = function () {
    if (container.scrollLeft <= 0) {
      container.scrollLeft = container.scrollWidth - container.offsetWidth;
    } else {
      container.scrollLeft -= widthItem;
    }
  };

  function autoScroll() {
    if (container.scrollLeft + container.offsetWidth >= container.scrollWidth) {
      container.scrollLeft = 0;
    } else {
      container.scrollLeft += widthItem;
    }
  }

  let autoScrollInterval = setInterval(autoScroll, 3500);

  container.addEventListener("mouseover", function () {
    clearInterval(autoScrollInterval);
  });

  container.addEventListener("mouseout", function () {
    autoScrollInterval = setInterval(autoScroll, 2500);
  });
}

sliderSale();

// Đặt thời gian kết thúc
const endTime = new Date("2024-12-31T23:59:59").getTime();

// Hàm cập nhật thời gian đếm ngược
function updateCountdown() {
  const now = new Date().getTime();
  const timeLeft = endTime - now;

  // Tính toán giờ, phút, giây
  const hours = Math.floor(
    (timeLeft % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60)
  );
  const minutes = Math.floor((timeLeft % (1000 * 60 * 60)) / (1000 * 60));
  const seconds = Math.floor((timeLeft % (1000 * 60)) / 1000);

  // Cập nhật nội dung HTML
  document.getElementById("hours").textContent = String(hours).padStart(2, "0");
  document.getElementById("minutes").textContent = String(minutes).padStart(
    2,
    "0"
  );
  document.getElementById("seconds").textContent = String(seconds).padStart(
    2,
    "0"
  );

  // Nếu hết thời gian, dừng đếm ngược
  if (timeLeft < 0) {
    clearInterval(countdownInterval);
    document.querySelector(".title-time-sale").textContent =
      "Đã hết thời gian khuyến mãi";
  }
}

// Cập nhật đếm ngược mỗi giây
const countdownInterval = setInterval(updateCountdown, 1000);

// Chạy hàm ngay lập tức để hiển thị thời gian đúng khi tải trang
updateCountdown();
