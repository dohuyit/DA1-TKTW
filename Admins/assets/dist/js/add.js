function uploadfilesMores() {
  const uploadContainer = document.getElementById("upload-container");
  const input = document.getElementById("images");
  const preview = document.getElementById("preview");

  uploadContainer.addEventListener("click", () => {
    input.click();
  });

  uploadContainer.addEventListener("dragover", (e) => {
    e.preventDefault();
    uploadContainer.style.borderColor = "#00e6e6";
  });

  uploadContainer.addEventListener("dragleave", () => {
    uploadContainer.style.borderColor = "rgba(255, 255, 255, 0.5)";
  });

  uploadContainer.addEventListener("drop", (e) => {
    e.preventDefault();
    uploadContainer.style.borderColor = "rgba(255, 255, 255, 0.5)";
    const files = Array.from(e.dataTransfer.files);
    handleFiles(files);
  });

  input.addEventListener("change", () => {
    const files = Array.from(input.files);
    handleFiles(files);
  });

  function handleFiles(files) {
    files.forEach((file) => {
      const reader = new FileReader();
      reader.onload = () => {
        const previewItem = document.createElement("div");
        previewItem.classList.add("preview-item");

        const img = document.createElement("img");
        img.src = reader.result;

        const progressBar = document.createElement("div");
        progressBar.classList.add("progress-bar");
        previewItem.appendChild(progressBar);

        const deleteBtn = document.createElement("button");
        deleteBtn.classList.add("delete-btn");
        deleteBtn.innerHTML = '<i class="fas fa-times"></i>';
        deleteBtn.addEventListener("click", () => {
          preview.removeChild(previewItem);
        });

        previewItem.appendChild(img);
        previewItem.appendChild(deleteBtn);
        preview.appendChild(previewItem);

        // Giả lập tiến trình upload
        simulateProgress(progressBar);
      };
      reader.readAsDataURL(file);
    });
  }

  function simulateProgress(progressBar) {
    let width = 0;
    const interval = setInterval(() => {
      width += 10;
      progressBar.style.width = width + "%";
      if (width >= 100) clearInterval(interval);
    }, 100);
  }
}

uploadfilesMores();

const uploadContainer = document.getElementById("uploadContainer");
const imageInput = document.getElementById("imageInput");
const uploadButton = document.getElementById("uploadButton");

// Mở tab chọn file chỉ khi nhấp vào container
uploadContainer.addEventListener("click", () => {
  imageInput.click();
});

// Hiển thị ảnh xem trước sau khi chọn
function displayPreview(event) {
  const file = event.target.files[0];
  const previewImage = document.getElementById("previewImage");
  const uploadMessage = document.getElementById("uploadMessage");

  if (file) {
    const reader = new FileReader();
    reader.onload = function (e) {
      previewImage.src = e.target.result;
      previewImage.style.display = "block";
      uploadMessage.style.display = "none"; // Ẩn text
      uploadButton.style.display = "block"; // Hiện nút chọn lại
    };
    reader.readAsDataURL(file);
  }
}
