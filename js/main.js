
var navipanel = document.getElementById('navipanel');
    var toggle = document.getElementById('toggler');
    function opennavipanel() {
        navipanel.classList.toggle("opennav");
        toggle.classList.toggle("clicked");
    }
document.addEventListener("DOMContentLoaded", function () {

    
    window.onscroll = function () { scrollFunction() };

    function scrollFunction() {
        if (document.body.scrollTop > 2 || document.documentElement.scrollTop > 100) {
            document.getElementById("backtotop").classList.add("show");
            document.getElementById("nav").classList.add("stick");

        } else {
            document.getElementById("backtotop").classList.remove("show");
            document.getElementById("nav").classList.remove("stick");

        }
    }
    document.getElementById("backtotop").addEventListener("click", function (e) {
        e.preventDefault();
        window.scrollTo({
            top: 0,
            behavior: "smooth"
        });
    });
   
});
{
    const elements= document.querySelectorAll(".highlight-effect");

    // Define the class name and threshold
    const className = "in-view";
    const threshold = 1;
    
    // Loop through each element and create an observer for it
    elements.forEach(element => {
        const observer = new IntersectionObserver(
            (entries) => {
                entries.forEach((entry) => {
                    if (entry.isIntersecting) {
                        element.classList.add(className);
                        return;
                    }
                    element.classList.remove(className);
                });
            },
            {
                threshold: threshold
            }
        );
    
        // Start observing the current element
        observer.observe(element);
    });
}



(function ($) {
    "use strict";

    // Spinner
    var spinner = function () {
        setTimeout(function () {
            // if ($('#spinner').length > 0) {
                $('#spinner').removeClass('show');
            // }
        }, 1500);
    };
    spinner(0);
})(jQuery);  