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


function truncateText(selector, wordLimit) {
    var elements = document.querySelectorAll(selector);  // Select all <p> tags inside .more-recent

    elements.forEach(function (element) {  // Loop through each <p> element
        var text = element.innerHTML.trim();  // Get the text and remove extra spaces
        var words = text.split(/\s+/);  // Split by any whitespace characters

        if (words.length > wordLimit) {
            var truncated = words.slice(0, wordLimit).join(' ') + '...';  // Truncate to the word limit
            element.innerHTML = truncated;  // Update the element with the truncated text
        }
    });
}

// Example: Limit all <p> tags inside .more-recent to 10 words
truncateText('.more-recent p', 10);
truncateText('.all-posts p', 10);