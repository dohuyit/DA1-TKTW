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

// Dữ liệu nội dung cho mỗi tab
const tabContents = {
  description: `
      <div id="description" class="section-content">
                  <div class="box-img">
                    <img src="./image/table-size.jpeg" alt="" />
                  </div>
                  <div class="box-desc">
                    <h3>Jordan Stadium 90</h3>
                    <p>
                      Lorem, ipsum dolor sit amet consectetur adipisicing elit.
                      Nemo qui maxime eligendi, rem atque, numquam corporis,
                      nulla quam magni dolorum aspernatur illo laborum
                      repellendus provident deleniti consequuntur consectetur
                      soluta illum. Praesentium quam deserunt tempora vel dolore
                      qui illo nemo distinctio! In quos enim accusantium unde
                      minus dolore magnam facilis? Aperiam nemo ullam
                      repudiandae doloribus itaque provident animi ad quod
                      eaque! Enim accusantium saepe in temporibus maiores.
                    </p>
                    <h3>Thông số</h3>
                    <ul>
                      <li>
                        Thiết kế Upper bằng nylon nhẹ nhàng và thoáng khí kết
                        hợp lớp phủ da lộn bền bỉ
                      </li>
                      <li>
                        Lót giày bằng bọt cao cấp mang lại sự thoải mái vượt
                        trội
                      </li>
                      <li>Đế giữa EVA nhẹ nhàng và thoải mái</li>
                      <li>
                        Đế ngoài hoàn toàn bằng cao su cho độ bám linh hoạt và
                        độ bền bỉ
                      </li>
                      <li>Kích cỡ thông thường</li>
                      <li>Loại dây cột tiêu chuẩn</li>
                    </ul>
                  </div>
                </div>
  `,
  "care-instructions": `
      <div id="care-instructions" class="section-content">
                  <ul>
                    <li>Bảo quản giày ở nơi thoáng mát và khô ráo</li>
                    <li>
                      Tránh ánh nắng trực tiếp để ngăn mất màu và biến dạng
                    </li>
                    <li>Sử dụng túi giày để tránh bụi và giữ giày luôn mới</li>
                    <li>
                      Tránh nước và độ ẩm cao, (đặc biệt là đối với chất liệu
                      da/ da lộn) để hạn chế tình trạng phai màu và bong tróc.
                    </li>
                    <li>
                      Sử dụng các sản phẩm chăm sóc giày chuyên dụng để vệ sinh
                      giày
                    </li>
                    <li>
                      Sử dụng bình xịt chống thấm nước để bảo vệ đôi giày của
                      bạn khỏi nước mưa, bùn đất hoặc những vết bẩn khác
                    </li>
                    <li>
                      Sử dụng bóng khử mùi hoặc xịt khử mùi để ngăn ngừa vi
                      khuẩn gây mùi
                    </li>
                  </ul>
                </div>
  `,
  comments: `
      <div id="comments" class="section-content">
                  <div class="wrapper-comment">
                    <div class="list-comment">
                      <div class="item-comment">
                        <!-- <p class="text-empty">Chưa có bình luận</p> -->
                        <div class="title-comment">
                          <span>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                          </span>
                          <p>2025-11-3</p>
                        </div>
                        <p class="text-comments">
                          Lorem ipsum dolor, sit amet consectetur adipisicing
                          elit. In minima deleniti, ipsum, nihil debitis nulla
                          ipsa amet animi quisquam accusantium nobis labore
                          quidem praesentium cum ab perspiciatis. Et, dolores.
                          Quibusdam?
                        </p>
                        <div class="footer-comment">
                          <img src="./image/auth.png" alt="" />
                          <div class="content">
                            <p>
                              <span>Đỗ Huy</span>
                              <span
                                ><ion-icon name="shield-checkmark"></ion-icon
                              ></span>
                            </p>
                            <p>huy@gmail.com</p>
                          </div>
                        </div>
                      </div>
                      <button id="btn-comment">
                        <span>Viết bình luận</span>
                        <span><i class="fa-solid fa-pen-to-square"></i></span>
                      </button>
                      <!-- <p class="text-login-form-comment">
                        Vui lòng <a href="index.php?action=login">đăng nhập</a> để
                        viết bình luận!!!
                      </p> -->
                    </div>
                    
                  </div>
                </div>
  `,
};

// Lấy các tab và nội dung hiển thị
const tabs = document.querySelectorAll(".header-tab .list-tab li");
const contentDisplay = document.getElementById("content-display");

// Thêm sự kiện click cho từng tab
tabs.forEach((tab) => {
  tab.addEventListener("click", () => {
    // Loại bỏ class active từ tất cả các tab
    tabs.forEach((t) => t.classList.remove("active"));

    // Thêm class active cho tab được chọn
    tab.classList.add("active");

    // Lấy dữ liệu nội dung dựa trên data-content của tab
    const contentKey = tab.getAttribute("data-content");
    contentDisplay.innerHTML = tabContents[contentKey];

    // Kích hoạt lại sự kiện cho nút comment khi nội dung tab thay đổi
    enableCommentForm();
  });
});

// Kích hoạt sự kiện comment form lần đầu
enableCommentForm();

function initSlider(
  containerSelector,
  itemSelector,
  nextBtnSelector,
  prevBtnSelector,
  autoScrollTime = 2500
) {
  const container = document.querySelector(containerSelector);
  const widthItem = document.querySelector(itemSelector).offsetWidth + 20;
  const btnNext = document.querySelector(nextBtnSelector);
  const btnPrev = document.querySelector(prevBtnSelector);

  function scrollNext() {
    if (container.scrollLeft + container.offsetWidth >= container.scrollWidth) {
      container.scrollLeft = 0;
    } else {
      container.scrollLeft += widthItem;
    }
  }

  function scrollPrev() {
    if (container.scrollLeft <= 0) {
      container.scrollLeft = container.scrollWidth - container.offsetWidth;
    } else {
      container.scrollLeft -= widthItem;
    }
  }

  let autoScrollInterval = setInterval(scrollNext, autoScrollTime);

  container.addEventListener("mouseover", () =>
    clearInterval(autoScrollInterval)
  );
  container.addEventListener(
    "mouseout",
    () => (autoScrollInterval = setInterval(scrollNext, autoScrollTime))
  );

  if (btnNext) btnNext.addEventListener("click", scrollNext);
  if (btnPrev) btnPrev.addEventListener("click", scrollPrev);
}

initSlider(
  ".container-product-similar",
  ".card-product",
  "#Pre-product",
  "#Next-product",
  2500
);
