import { functionCarousel } from "./function.js";
const carousel = new functionCarousel();
carousel.initSlider(
  ".container-products",
  ".card-product",
  null,
  null,
  3000,
  20
);

document.querySelectorAll(".quantity-control").forEach((control) => {
  const decreaseButton = control.querySelector(".decrease");
  const increaseButton = control.querySelector(".increase");
  const quantityInput = control.querySelector(".quantity-input");

  // Sự kiện giảm số lượng
  decreaseButton.addEventListener("click", () => {
    let currentValue = parseInt(quantityInput.value);
    if (currentValue > 1) {
      // Giới hạn không cho xuống dưới 1
      quantityInput.value = currentValue - 1;
    }
  });

  // Sự kiện tăng số lượng
  increaseButton.addEventListener("click", () => {
    let currentValue = parseInt(quantityInput.value);
    quantityInput.value = currentValue + 1;
  });
});
