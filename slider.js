const track = document.querySelector(".slider-track");
const cards = document.querySelectorAll(".property-card");
const prevBtn = document.querySelector(".slider-prev");
const nextBtn = document.querySelector(".slider-next");

let index = 0;

function getCardWidth() {
  return cards[0].getBoundingClientRect().width;
}

function updateSlider() {
  const cardWidth = getCardWidth();
  track.style.transform = `translateX(-${index * cardWidth}px)`;
}

nextBtn.addEventListener("click", () => {
  index = index < cards.length - 1 ? index + 1 : cards.length - 1;
  updateSlider();
});

prevBtn.addEventListener("click", () => {
  index = index > 0 ? index - 0.5 : 0;
  updateSlider();
});

window.addEventListener("resize", updateSlider);