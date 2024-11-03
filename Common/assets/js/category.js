import { functionCarousel } from "./function.js";
const carousel = new functionCarousel();
carousel.initSlider(".container-brand", ".item-brand", null, null, 2000, 20);

// Hàm để thay đổi số cột
function changeColumns(columnCount) {
  const productContainer = document.getElementById("products-body");

  // Xóa tất cả các class liên quan đến cột trước đó
  productContainer.classList.remove("columns-2", "columns-3", "columns-4");

  // Thêm class mới dựa trên số cột được chọn
  productContainer.classList.add(`columns-${columnCount}`);
}

// Gán sự kiện cho các nút khi DOM đã sẵn sàng
document.addEventListener("DOMContentLoaded", function () {
  document.getElementById("btn-two").addEventListener("click", function () {
    changeColumns(2);
  });

  document.getElementById("btn-three").addEventListener("click", function () {
    changeColumns(3);
  });

  document.getElementById("btn-four").addEventListener("click", function () {
    changeColumns(4);
  });
});
