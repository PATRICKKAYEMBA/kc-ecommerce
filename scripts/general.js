document.addEventListener("DOMContentLoaded", function() {
    let currentSlide = 0;
    const slides = document.querySelectorAll(".hero-content");

    if (slides.length === 0) {
        console.error("No slides found. Check your HTML structure or class names.");
        return;
    }

    function showSlide(index) {
        slides.forEach((slide, i) => {
            slide.classList.toggle("active", i === index);
        });
    }

    // Make sure nextSlide is defined in this scope
    function nextSlide() {
        currentSlide = (currentSlide + 1) % slides.length;
        showSlide(currentSlide);
    }

    // Show the initial slide
    showSlide(currentSlide);

    // Set an interval to change slides every 5 seconds
    setInterval(nextSlide, 5000); // Call nextSlide every 3 seconds
});
