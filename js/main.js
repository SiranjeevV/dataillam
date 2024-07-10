
var navipanel = document.getElementById('navipanel');
    var toggle = document.getElementById('toggler');
    function opennavipanel() {
        navipanel.classList.toggle("opennav");
        toggle.classList.toggle("clicked");
    }

    
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
    //cursor
    const cursor=document.querySelector('.cursor');
document.addEventListener('mousemove', e => {
    cursor.setAttribute("style","top: "+(e.pageY-1) +"px; left: "+(e.pageX-24)+"px; ");
});
document.addEventListener('click', e=>{
    document.querySelector('.cursor-img').classList.add("expand");
    setTimeout(function(){
        document.querySelector('.cursor-img').classList.remove("expand")
    },500);
});
let timeout;
document.addEventListener('mousemove', () => {
  clearTimeout(timeout); // Clear the existing timeout
  timeout = setTimeout(() => {
    cursor.style.display = 'none'; // Hide the cursor after 2 seconds of inactivity (adjust as needed)
  }, 2000); // 2000 milliseconds (2 seconds)
});

 //highlighting effects
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
 {
    const elements= document.querySelectorAll(".headlines");
    // Define the class name and threshold
    const className = "appear";
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
        }, 1800);
    };
    spinner(0);
})(jQuery);  