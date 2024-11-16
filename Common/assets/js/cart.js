import { functionCarousel } from "./function.js";
import { functionQuatity } from "./function.js";

const carousel = new functionCarousel();
carousel.initSlider(
  ".container-products",
  ".card-product",
  null,
  null,
  3000,
  20
);

const fnQuantity = new functionQuatity();
fnQuantity.quatityInput(
  ".quantity-control",
  ".decrease",
  ".increase",
  ".quantity-input"
);
