// DOM Elements
const searchToggle = document.querySelector(".ulo-search-toggle");
const modalOverlay = document.getElementById("searchModal");
const closeModalBtn = document.getElementById("closeModal");
const searchInput = document.getElementById("searchInput");
const clearSearchBtn = document.getElementById("clearSearch");
const emptyState = document.getElementById("emptyState");
const loadingState = document.getElementById("loadingState");
const resultsContainer = document.getElementById("resultsContainer");
const noResults = document.getElementById("noResults");

let searchTimeout;

// ==================== MODAL CONTROLS ====================

// Open Modal
searchToggle.addEventListener("click", () => {
  modalOverlay.classList.add("active");
  searchInput.focus();
});

// Close Modal
function closeModal() {
  modalOverlay.classList.remove("active");
  searchInput.value = "";
  clearSearchBtn.classList.remove("visible");
  resetSearchStates();
}

closeModalBtn.addEventListener("click", closeModal);

// Close on overlay click
modalOverlay.addEventListener("click", (e) => {
  if (e.target === modalOverlay) {
    closeModal();
  }
});

// Close on Escape key
document.addEventListener("keydown", (e) => {
  if (e.key === "Escape" && modalOverlay.classList.contains("active")) {
    closeModal();
  }
});

// ==================== SEARCH INPUT CONTROLS ====================

// Clear Search
clearSearchBtn.addEventListener("click", () => {
  searchInput.value = "";
  searchInput.focus();
  clearSearchBtn.classList.remove("visible");
  resetSearchStates();
});

// Show/hide clear button
searchInput.addEventListener("input", (e) => {
  if (e.target.value.length > 0) {
    clearSearchBtn.classList.add("visible");
  } else {
    clearSearchBtn.classList.remove("visible");
  }
});

// ==================== SEARCH FUNCTIONALITY ====================

// Search Input Handler
searchInput.addEventListener("input", (e) => {
  const query = e.target.value.trim();

  // Clear previous timeout
  clearTimeout(searchTimeout);

  if (query.length === 0) {
    resetSearchStates();
    return;
  }

  // Show loading state
  showLoadingState();

  // Simulate API call with timeout (replace with actual API call)
  searchTimeout = setTimeout(() => {
    performSearch(query);
  }, 500); // 500ms debounce
});

// Show Loading State
function showLoadingState() {
  emptyState.style.display = "none";
  loadingState.style.display = "block";
  resultsContainer.style.display = "none";
  noResults.style.display = "none";
}

// Reset to Empty State
function resetSearchStates() {
  emptyState.style.display = "block";
  loadingState.style.display = "none";
  resultsContainer.style.display = "none";
  noResults.style.display = "none";
  resultsContainer.innerHTML = "";
}

// Perform Search 
function performSearch(query) {

  fetch(`/wp-json/wp/v2/doctor?search=${query}`)
    .then((response) => response.json())
    .then((data) => {

      loadingState.style.display = 'none';
      resultsContainer.style.display = 'block';


      if (data.length === 0) {
        console.log(data)
        resultsContainer.innerHTML = "<p>No doctors found</p>";
        return;
      }

      // Build output
      let output = "<ul>";
      data.forEach((doctor) => {
        output += `<li class="result-title"><a href="${doctor.link}">${doctor.title.rendered}</a></li>`;
      });
      output += '</ul>';
      
      resultsContainer.innerHTML = output;
      
    })

    
    .catch((error) => {
      console.error("Search error:", error);
      
    });

  
}

// Display Search Results
// function displayResults(results, query) {
//   loadingState.style.display = "none";

//   if (results.length === 0) {
//     noResults.style.display = "block";
//     resultsContainer.style.display = "none";
//     return;
//   }

//   noResults.style.display = "none";
//   resultsContainer.style.display = "block";

//   // Build results HTML
//   resultsContainer.innerHTML = results
//     .map((event) => {
//       const highlightedTitle = highlightText(event.title, query);
//       return `
//             <div class="result-item" data-id="${event.id}">
//                 <div class="result-icon">
//                     <span class="dashicons dashicons-calendar-alt"></span>
//                 </div>
//                 <div class="result-content">
//                     <div class="result-title">${highlightedTitle}</div>
//                     <div class="result-meta">${event.type} • ${event.venue} • ${
//         event.date
//       }</div>
//                     <div class="result-description">${event.description}</div>
//                     <div class="result-tags">
//                         ${event.tags
//                           .map(
//                             (tag) => `<span class="result-tag">${tag}</span>`
//                           )
//                           .join("")}
//                     </div>
//                 </div>
//             </div>
//         `;
//     })
//     .join("");

//   // Add click handlers to results
//   document.querySelectorAll(".result-item").forEach((item) => {
//     item.addEventListener("click", () => {
//       const eventId = item.dataset.id;
//       handleResultClick(eventId);
//     });
//   });
// }

// Highlight matching text in results
function highlightText(text, query) {
  if (!query) return text;
  const regex = new RegExp(`(${escapeRegex(query)})`, "gi");
  return text.replace(regex, '<span class="highlight">$1</span>');
}

// Escape special regex characters
function escapeRegex(string) {
  return string.replace(/[.*+?^${}()|[\]\\]/g, "\\$&");
}

// Handle Result Click
function handleResultClick(eventId) {
  console.log("Event clicked:", eventId);

  // ===== REPLACE THIS WITH YOUR ACTUAL LOGIC =====
  // Examples:
  // - Navigate to event page: window.location.href = `/events/${eventId}`;
  // - Open event details modal
  // - Trigger a callback function
  // - Update application state

  alert(`You clicked event ID: ${eventId}`);
  closeModal();
}

// ==================== BODY SCROLL PREVENTION ====================

// Prevent body scroll when modal is open
const observer = new MutationObserver(() => {
  if (modalOverlay.classList.contains("active")) {
    document.body.style.overflow = "hidden";
  } else {
    document.body.style.overflow = "";
  }
});

observer.observe(modalOverlay, {
  attributes: true,
  attributeFilter: ["class"],
});

// ==================== OPTIONAL: KEYBOARD NAVIGATION ====================

// Add keyboard navigation for results (arrow keys, enter)
searchInput.addEventListener("keydown", (e) => {
  const items = document.querySelectorAll(".result-item");
  if (items.length === 0) return;

  let currentIndex = -1;
  items.forEach((item, index) => {
    if (item.classList.contains("active")) {
      currentIndex = index;
    }
  });

  if (e.key === "ArrowDown") {
    e.preventDefault();
    items.forEach((item) => item.classList.remove("active"));
    const nextIndex = currentIndex < items.length - 1 ? currentIndex + 1 : 0;
    items[nextIndex].classList.add("active");
    items[nextIndex].scrollIntoView({ block: "nearest" });
  } else if (e.key === "ArrowUp") {
    e.preventDefault();
    items.forEach((item) => item.classList.remove("active"));
    const prevIndex = currentIndex > 0 ? currentIndex - 1 : items.length - 1;
    items[prevIndex].classList.add("active");
    items[prevIndex].scrollIntoView({ block: "nearest" });
  } else if (e.key === "Enter" && currentIndex >= 0) {
    e.preventDefault();
    const eventId = items[currentIndex].dataset.id;
    handleResultClick(eventId);
  }
});
