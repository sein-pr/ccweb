// Get modal elements
const searchModal = document.getElementById("search-modal");
const searchIcon = document.getElementById("search-icon");
const closeModal = document.querySelector(".modal .close");

// Open the modal when search icon is clicked
searchIcon.onclick = function () {
  searchModal.style.display = "flex";
};

// Close the modal when 'x' is clicked
closeModal.onclick = function () {
  searchModal.style.display = "none";
};

// Close the modal when clicking outside of the modal content
window.onclick = function (event) {
  if (event.target == searchModal) {
    searchModal.style.display = "none";
  }
};

// Carousel script
let currentIndex = 0;
const images = document.querySelectorAll(".carousel-images img");
const totalImages = images.length;
const indicators = document.querySelectorAll(".indicator");

function showNextImage() {
  currentIndex = (currentIndex + 1) % totalImages;
  updateCarousel();
}

function showPrevImage() {
  currentIndex = (currentIndex - 1 + totalImages) % totalImages;
  updateCarousel();
}

function setCurrentImage(index) {
  currentIndex = index;
  updateCarousel();
}

function updateCarousel() {
  const offset = -currentIndex * 100; // Move by 100% of the width of one image
  document.querySelector(
    ".carousel-images"
  ).style.transform = `translateX(${offset}%)`;

  // Update indicators
  indicators.forEach((indicator, index) => {
    indicator.classList.toggle("active", index === currentIndex);
  });
}

// Automatic sliding
function startAutoSlide() {
  setInterval(showNextImage, 5000); // Change image every 3 seconds
}

// Start automatic sliding when the page loads
window.onload = startAutoSlide;

// trending js starts here

const contentData = {
  "best-sellers": [
    {
      imgSrc: "/assets/data/green-adventure_300x300.jpg",
      name: "Green Adventure",
      price: "$10.00",
    },
    {
      imgSrc:
        "/assets/data/cow_e3860c30-3b1a-40b7-959e-6cd5bfe580c3_300x300.jpg",
      name: "Cow",
      price: "$25.00",
    },
    {
      imgSrc: "/assets/data/bangles_2048x2048.jpg",
      name: "Bangles",
      price: "$110.00",
    },
    {
      imgSrc:
        "/assets/data/cow_e3860c30-3b1a-40b7-959e-6cd5bfe580c3_300x300.jpg",
      name: "Cow",
      price: "$25.00",
    },
    {
      imgSrc: "/assets/data/bangles_2048x2048.jpg",
      name: "Bangles",
      price: "$110.00",
    },
    {
      imgSrc:
        "/assets/data/cow_e3860c30-3b1a-40b7-959e-6cd5bfe580c3_300x300.jpg",
      name: "Cow",
      price: "$25.00",
    },
    {
      imgSrc: "/assets/data/bangles_2048x2048.jpg",
      name: "Bangles",
      price: "$110.00",
    },
  ],
  "new-arrivals": [
    {
      imgSrc: "/assets/data/deep-in-thought_2048x2048.jpg",
      name: "Deep In Thoughts",
      price: "$150.00",
    },
    {
      imgSrc: "/assets/data/grey_2048x2048.jpg",
      name: "Grey",
      price: "$20.00",
    },
    // Add more items as needed
  ],
  "hot-sales": [
    {
      imgSrc: "/assets/data/circle-rhythm_300x300.jpg",
      name: "Circle Rhythm",
      price: "$5.00",
    },
    {
      imgSrc: "/assets/data/Color your life (1).png",
      name: "Color Your Life",
      price: "$7.00",
    },
    // Add more items as needed
  ],
};

function showSection(sectionId) {
  // Remove 'active' class from all buttons
  document.querySelectorAll(".btn span").forEach(function (btn) {
    btn.classList.remove("active");
  });

  // Add 'active' class to the clicked button
  document
    .querySelector(".btn span[onclick=\"showSection('" + sectionId + "')\"]")
    .classList.add("active");

  // Get the content for the selected section
  const items = contentData[sectionId];

  // Clear existing content
  const contentSection = document.getElementById("content-section");
  contentSection.innerHTML = "";

  // Populate content dynamically
  items.forEach(function (item) {
    const itemContainer = document.createElement("div");
    itemContainer.className = "item-container visible";

    // Check if the section is "New Arrivals" to add the badge
    const newBadge =
      sectionId === "new-arrivals" ? '<div class="new-badge">New</div>' : "";

    itemContainer.innerHTML = `
            ${newBadge}
            <img src="${item.imgSrc}" alt="item">
            <div class="item-icons">
                <ul>
                    <li><i class="uil uil-shopping-bag"></i></li>
                    <li><i class="uil uil-heart"></i></li>
                    <li><i class="uil uil-eye" onclick="window.location.href='item-view.html'"></i></li>
                </ul>
            </div>
            <p class="item-name">${item.name}</p>
            <p class="item-rating"></p>
            <p class="item-price">${item.price}</p>
        `;

    // Add the fade-in effect after a slight delay
    setTimeout(function () {
      itemContainer.classList.add("fade-in");
    }, 100);

    contentSection.appendChild(itemContainer);
  });
}

// Initially show Best Sellers section
showSection("best-sellers");

// cart modal bringer
function toggleCartModal() {
  const cartModal = document.getElementById("cartModal");
  cartModal.style.display =
    cartModal.style.display === "none" || !cartModal.style.display
      ? "block"
      : "none";
}

function closeCartModal() {
  document.getElementById("cartModal").style.display = "none";
}

// Nav links hiding
const menuIcon = document.querySelector(".menu-icon");
const navLinks = document.querySelector(".nav-links");

if (menuIcon && navLinks) {
  console.log("Elements found:", menuIcon, navLinks);

  document.addEventListener("click", function (event) {
    if (
      !menuIcon.contains(event.target) &&
      !navLinks.contains(event.target) &&
      window.innerWidth <= 767.98
    ) {
      navLinks.style.display = "none";
      navLinks.style.opacity = "0";
    }
  });

  // Show nav links on hover
  menuIcon.addEventListener("mouseover", function () {
    console.log("Mouseover on menuIcon");
    if (window.innerWidth <= 1024) {
      navLinks.style.display = "flex";
      setTimeout(() => {
        navLinks.style.opacity = "1";
      }, 10);
    }
  });

  // Close nav links when mouse leaves the nav links
  navLinks.addEventListener("mouseleave", function () {
    console.log("Mouse leave from navLinks");
    if (window.innerWidth <= 1024) {
      navLinks.style.display = "none";
      navLinks.style.opacity = "0";
    }
  });

  // Ensure nav links are visible on large screens
  window.addEventListener("resize", function () {
    if (window.innerWidth > 1024) {
      navLinks.style.display = "flex";
      navLinks.style.opacity = "1";
    } else {
      navLinks.style.display = "none";
      navLinks.style.opacity = "0";
    }
  });
} else {
  console.error("Menu icon or nav links not found on the page");
}

// cart js quantity counter
function increment() {
  let quantity = document.getElementById("quantity");
  quantity.value = parseInt(quantity.value) + 1;
}

function decrement() {
  let quantity = document.getElementById("quantity");
  if (quantity.value > 0) {
    quantity.value = parseInt(quantity.value) - 1;
  }
}

// Typing animation for the footer
const words = ["style", "beauty", "culture", "creativity"];
let i = 0;
let j = 0;
let isDeleting = false;
const typingElement = document.querySelector(".typing");
const typingSpeed = 150; // Constant speed for typing and deleting
const pauseBetweenWords = 2000; // Pause before starting to delete or move to the next word

function type() {
  if (i < words.length) {
    if (!isDeleting) {
      typingElement.textContent = words[i].substring(0, j++);
    } else {
      typingElement.textContent = words[i].substring(0, j--);
    }

    if (j === words[i].length + 1 && !isDeleting) {
      isDeleting = true;
      setTimeout(type, pauseBetweenWords); // Pause before deleting starts
      return;
    }

    if (j < 0) {
      isDeleting = false;
      i++;
      if (i >= words.length) i = 0;
    }

    setTimeout(type, typingSpeed);
  }
}

type();


