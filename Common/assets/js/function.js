export class functionCarousel {
  initSlider(
    containerSelector,
    itemSelector,
    nextBtnSelector,
    prevBtnSelector,
    autoScrollTime = 2500,
    numberOffset
  ) {
    const container = document.querySelector(containerSelector);
    const item = document.querySelector(itemSelector);

    // Exit if the container or item elements are not found
    if (!container || !item) {
      console.warn(
        `Elements not found for slider: ${containerSelector}, ${itemSelector}`
      );
      return;
    }

    const widthItem = item.offsetWidth + parseInt(numberOffset);
    const btnNext = document.querySelector(nextBtnSelector);
    const btnPrev = document.querySelector(prevBtnSelector);

    function scrollNext() {
      if (
        container.scrollLeft + container.offsetWidth >=
        container.scrollWidth
      ) {
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
}
