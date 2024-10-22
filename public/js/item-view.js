document.addEventListener("DOMContentLoaded", function () {
  // Function to select an image
  function selectImage(img) {
    // Remove the 'selected' class from all images
    document
      .querySelectorAll(".variation-img")
      .forEach((image) => image.classList.remove("selected"));

    // Add the 'selected' class to the clicked image
    img.classList.add("selected");

    // Update the main image source to the clicked image's source
    const mainImage = document.getElementById("main-image");
    if (mainImage && img.src) {
      mainImage.src = img.src;
    }
  }

  // Add event listener to each variation image
  document.querySelectorAll(".variation-img").forEach((img) => {
    img.addEventListener("click", function () {
      selectImage(this);
    });
  });

  // Initially select the first variation image and update the main image
  const firstImage = document.querySelector(".variation-img");
  if (firstImage) {
    selectImage(firstImage);
  }
});





// my size js
document.addEventListener('DOMContentLoaded', function() {
  // Select all items within the size-option class
  const items = document.querySelectorAll('.size-option .item');

  // Add click event listener to each item
  items.forEach(item => {
    item.addEventListener('click', function() {
      // Remove 'selected' class from all items
      items.forEach(i => i.classList.remove('selected'));

      // Add 'selected' class to the clicked item
      this.classList.add('selected');
    });
  });

  // Initially select the first item
  if (items.length > 0) {
    items[0].classList.add('selected');
  }
});

// featured caraousel
let currentIndex = 0;
const items = document.querySelectorAll('.carousel-item');
const totalItems = items.length;

function showNextSlide() {
  items[currentIndex].classList.remove('active');
  currentIndex = (currentIndex + 1) % totalItems; // Loop back to the first slide
  items[currentIndex].classList.add('active');
}

setInterval(showNextSlide, 5000); // Change slide every 5 seconds
