const slides = document.querySelector('.slides');
const prevBtn = document.querySelector('.prev');
const nextBtn = document.querySelector('.next');

let slideIndex = 0;

prevBtn.addEventListener('click', () => {
	slideIndex--;
	showSlide();
});

nextBtn.addEventListener('click', () => {
	slideIndex++;
	showSlide();
});

function showSlide() {
	const slideWidth = slides.clientWidth;
	const maxSlideIndex = slides.childElementCount - 1;

	if (slideIndex < 0) {
		slideIndex = maxSlideIndex;
	} else if (slideIndex > maxSlideIndex) {
		slideIndex = 0;
	}

	slides.style.transform = `translateX(-${slideIndex * slideWidth}px)`;
}

showSlide();
