const navbar_elements = document.querySelectorAll(".navbar span");

navbar_elements.forEach((el) => {
    el.children[0].addEventListener("mouseover", (e) => {
        console.log(e)
        el.children[0].style= "color: red";
    })
    el.children[0].addEventListener("mouseout", (e) => {
        console.log(e)
        el.children[0].style= "color: black";
    })
})
const carouselContainer = document.querySelector('.carousel-container');
const prevButton = document.querySelector('.carousel-button-prev');
const nextButton = document.querySelector('.carousel-button-next');

let counter = 0;

prevButton.addEventListener('click', () => {
  counter--;
  if (counter < 0) {
    counter = 2;
  }
  carouselContainer.style.left = `-${counter * 100}%`;
});

nextButton.addEventListener('click', () => {
  counter++;
  if (counter > 2) {
    counter = 0;
  }
  carouselContainer.style.left = `-${counter * 100}%`;
});

setInterval(() => {
  counter++;
  if (counter > 2) {
    counter = 0;
  }
  carouselContainer.style.left = `-${counter * 100}%`;
}, 5000);
