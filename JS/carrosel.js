
 document.addEventListener("DOMContentLoaded", function () {
        const carousel = document.getElementById("carouselExample");
        const myCarousel = new bootstrap.Carousel(carousel, {
            interval: 5000, 
            pause: "hover", 
            wrap: true 
        });
    });
