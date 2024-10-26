const slides = document.querySelectorAll('.slider img');
    let currentSlide = 0;

    function showSlide() {
        slides[currentSlide].classList.remove('active');
        currentSlide = (currentSlide + 1) % slides.length; // Cycle through slides
        slides[currentSlide].classList.add('active');
    }

    // Change slide every 5 seconds
    setInterval(showSlide, 5000);