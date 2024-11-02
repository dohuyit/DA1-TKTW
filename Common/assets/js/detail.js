const thumbnails = document.querySelectorAll(".item-thumbnail");

thumbnails.forEach((thumbnail) => {
  thumbnail.addEventListener("click", () => {
    thumbnails.forEach((thumb) => thumb.classList.remove("active"));

    document.getElementById("displayed-image").src = thumbnail.src;

    thumbnail.classList.add("active");
  });
});
