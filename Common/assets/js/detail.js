import { functionCarousel } from "./function.js";
import { functionQuatity } from "./function.js";
const carousel = new functionCarousel();
carousel.initSlider(
  ".container-product-similar",
  ".card-product",
  "#Pre-product",
  "#Next-product",
  2500,
  20
);

const fnQuantity = new functionQuatity();
fnQuantity.quatityInput(
  ".btn-quantity",
  ".decrease",
  ".increase",
  ".quantity-input"
);

document.addEventListener("DOMContentLoaded", () => {
  initSlider(".container-brand", ".item-brand", "", "", 2500, 20);
});

const thumbnails = document.querySelectorAll(".item-thumbnail");

thumbnails.forEach((thumbnail) => {
  thumbnail.addEventListener("click", () => {
    thumbnails.forEach((thumb) => thumb.classList.remove("active"));

    document.getElementById("displayed-image").src = thumbnail.src;

    thumbnail.classList.add("active");
  });
});

// =============================TAB COMMENT =================//
// Hàm hiển thị form comment
function enableCommentForm() {
  const commentButton = document.getElementById("btn-comment");
  const innerOverlayComment = document.getElementById("innerOverlayComment");

  if (commentButton && innerOverlayComment) {
    commentButton.addEventListener("click", function () {
      innerOverlayComment.style.display = "flex";
      document.body.classList.add("no-scroll");
    });

    innerOverlayComment.addEventListener("click", function (event) {
      if (event.target === innerOverlayComment) {
        innerOverlayComment.style.display = "none";
        document.body.classList.remove("no-scroll");
      }
    });
  }
}
//========================================================//
