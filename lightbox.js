// -----------------------------------------------------
// LIGHTBOX ELEMENTS
// -----------------------------------------------------
const lightbox = document.getElementById("lightbox");
const lightboxImg = document.querySelector(".lightbox-img");
const closeBtn = document.querySelector(".lightbox-close");
const captionBox = document.querySelector(".lightbox-caption");


// -----------------------------------------------------
// DATE FORMATTER (used for show photos)
// -----------------------------------------------------
function formatDate(dateString) {
  const [year, month, day] = dateString.split("-");

  const monthNames = [
    "January", "February", "March", "April", "May", "June",
    "July", "August", "September", "October", "November", "December"
  ];

  const monthIndex = parseInt(month, 10) - 1;
  const dayNum = parseInt(day, 10);

  const suffix =
    dayNum % 10 === 1 && dayNum !== 11 ? "st" :
    dayNum % 10 === 2 && dayNum !== 12 ? "nd" :
    dayNum % 10 === 3 && dayNum !== 13 ? "rd" : "th";

  return `${monthNames[monthIndex]} ${dayNum}${suffix}, ${year}`;
}


// -----------------------------------------------------
// BUILD IMAGE LISTS
// -----------------------------------------------------
let allImages = [];
let currentIndex = 0;

// Show Photos
const showImages = Array.from(document.querySelectorAll(".photo-card img")).map(img => ({
  src: img.src,
  caption: `
    <strong>${img.dataset.show}</strong><br>
    ${img.dataset.name}<br>
    <em>${formatDate(img.dataset.date)}</em>
  `
}));

// Virtual Tour Photos
const tourImages = Array.from(document.querySelectorAll(".tour-photo")).map(img => ({
  src: img.src,
  caption: img.dataset.caption || ""
}));

// Merge lists
allImages = [...showImages, ...tourImages];

// Track where tour images begin
const tourOffset = showImages.length;


// -----------------------------------------------------
// OPEN LIGHTBOX FUNCTION
// -----------------------------------------------------
function openLightbox(src, caption) {
  lightbox.style.display = "flex";
  lightboxImg.src = src;
  captionBox.innerHTML = caption;
}


// -----------------------------------------------------
// SHOW PHOTOS — CLICK HANDLER
// -----------------------------------------------------
document.addEventListener("click", (e) => {
  if (e.target.matches(".photo-card img")) {
    const index = showImages.findIndex(img => img.src === e.target.src);
    currentIndex = index;
    openLightbox(showImages[index].src, showImages[index].caption);
  }
});


// -----------------------------------------------------
// VIRTUAL TOUR — CLICK HANDLER
// -----------------------------------------------------
document.querySelectorAll(".tour-photo").forEach((img, index) => {
  img.addEventListener("click", () => {
    currentIndex = tourOffset + index;
    openLightbox(allImages[currentIndex].src, allImages[currentIndex].caption);
  });
});


// -----------------------------------------------------
// ARROW NAVIGATION
// -----------------------------------------------------
document.querySelector(".lightbox-next").addEventListener("click", () => {
  currentIndex = (currentIndex + 1) % allImages.length;
  openLightbox(allImages[currentIndex].src, allImages[currentIndex].caption);
});

document.querySelector(".lightbox-prev").addEventListener("click", () => {
  currentIndex = (currentIndex - 1 + allImages.length) % allImages.length;
  openLightbox(allImages[currentIndex].src, allImages[currentIndex].caption);
});


// -----------------------------------------------------
// CLOSE LIGHTBOX
// -----------------------------------------------------
closeBtn.addEventListener("click", () => {
  lightbox.style.display = "none";
});

lightbox.addEventListener("click", (e) => {
  if (e.target === lightbox) {
    lightbox.style.display = "none";
  }
});
