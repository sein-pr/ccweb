// Get modal elements
const searchModal = document.getElementById('search-modal');
const searchIcon = document.getElementById('search-icon');
const closeModal = document.querySelector('.modal .close');

// Open the modal when search icon is clicked
searchIcon.onclick = function() {
    searchModal.style.display = 'flex';
};

// Close the modal when 'x' is clicked
closeModal.onclick = function() {
    searchModal.style.display = 'none';
};

// Close the modal when clicking outside of the modal content
window.onclick = function(event) {
    if (event.target == searchModal) {
        searchModal.style.display = 'none';
    }
};


// featured crousel
const images = document.querySelector('.featured-images');
const indicators = document.querySelectorAll('.carousel-indicators span');
let currentIndex = 0;

function showSlide(index) {
  const slideWidth = images.children[0].clientWidth;
  images.style.transform = `translateX(-${index * slideWidth}px)`;
  indicators.forEach(ind => ind.classList.remove('active'));
  indicators[index].classList.add('active');
  currentIndex = index;
}

indicators.forEach((indicator, index) => {
  indicator.addEventListener('click', () => {
    showSlide(index);
  });
});

setInterval(() => {
  currentIndex = (currentIndex + 1) % indicators.length;
  showSlide(currentIndex);
}, 3000); // Change slide every 3 seconds

// cart modal bringer
function toggleCartModal() {
  const cartModal = document.getElementById('cartModal');
  cartModal.style.display = cartModal.style.display === 'none' || !cartModal.style.display ? 'block' : 'none';
}

function closeCartModal() {
  document.getElementById('cartModal').style.display = 'none';
}
