if (location.pathname == "/") {
    var navigation = document.getElementById("nav");
    var updateNavbarColor = () => {
        if (window.scrollY > window.innerHeight * 0.05) {
            navigation.classList.add("scrolling_navigation");
        } else {
            navigation.classList.remove("scrolling_navigation");
        }
        if (window.scrollY > window.innerHeight * 0.05) {
            $(".logo").addClass("logoShrink");
        } else {
            $(".logo").removeClass("logoShrink");
        }
    };

    window.addEventListener("scroll", updateNavbarColor);

    var contentObserver = new IntersectionObserver(entries => {
        entries.forEach(entry => {
            var content = entry.target.querySelector(".content");
            if (entry.isIntersecting) {
                content.classList.add("animate__fadeInUp");
                content.classList.remove("animate__fadeOut");
                return; // if we added the class, exit the function
            }
            // We're not intersecting, so remove the class!
        });
    });

    var firstObserver = new IntersectionObserver(entries => {
        entries.forEach(entry => {
            var content = entry.target.querySelector(".fade_text");
            if (entry.isIntersecting) {
                content.classList.add("animate__fadeInUp");
                content.classList.remove("animate__fadeOut");
                return; // if we added the class, exit the function
            }
            // We're not intersecting, so remove the class!
        });
    });

    var secondObserver = new IntersectionObserver(entries => {
        entries.forEach(entry => {
            var content = entry.target.querySelector(".fade_text");
            if (entry.isIntersecting) {
                content.classList.add("animate__fadeInUp");
                content.classList.remove("animate__fadeOut");
                return; // if we added the class, exit the function
            }
            // We're not intersecting, so remove the class!
        });
    });

    var thirdObserver = new IntersectionObserver(entries => {
        entries.forEach(entry => {
            var content = entry.target.querySelector(".fade_text");
            if (entry.isIntersecting) {
                content.classList.add("animate__fadeInUp");
                content.classList.remove("animate__fadeOut");
                return; // if we added the class, exit the function
            }
            // We're not intersecting, so remove the class!
        });
    });

    var fourthObserver = new IntersectionObserver(entries => {
        entries.forEach(entry => {
            var content = entry.target.querySelector(".fade_text");
            if (entry.isIntersecting) {
                content.classList.add("animate__fadeInUp");
                content.classList.remove("animate__fadeOut");
                return; // if we added the class, exit the function
            }
            // We're not intersecting, so remove the class!
        });
    });

    contentObserver.observe(document.querySelector(".secondContent"));
    firstObserver.observe(document.querySelector(".observer_1"));
    secondObserver.observe(document.querySelector(".observer_2"));
    thirdObserver.observe(document.querySelector(".observer_3"));
    fourthObserver.observe(document.querySelector(".observer_4"));

 
}

$("#navbarSupportedContent").on("show.bs.collapse", function(e) {
    $("#hamburger").addClass("is-active");
});
$("#navbarSupportedContent").on("hide.bs.collapse", function(e) {
    $("#hamburger").removeClass("is-active");
});

function currency(numb) {
    var num = Number(numb);
    if (num) {
        return "₦ " + num.toFixed(2).replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1,");
    } else {
        return "₦ 0.00";
    }
}


$("#videosId").on("hide.bs.modal", function(e) {

   document.getElementById('mainvideo').pause()
});

$("#videosId").on("show.bs.modal", function(e) {

   document.getElementById('mainvideo').play()
});

 $(".read-more-content").addClass("hide_content");
 $(".read-more-show, .read-more-hide").removeClass("hide_content");

 // Set up the toggle effect:
 $(".read-more-show").on("click", function(e) {
     $(this)
         .next(".read-more-content")
         .removeClass("hide_content");
     $(this).addClass("hide_content");
     e.preventDefault();
 });

 // Changes contributed by @diego-rzg
 $(".read-more-hide").on("click", function(e) {
     var p = $(this).parent(".read-more-content");
     p.addClass("hide_content");
     p.prev(".read-more-show").removeClass("hide_content"); // Hide only the preceding "Read More"
     e.preventDefault();
 });