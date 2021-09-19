var navigation = document.getElementById("nav");

const updateNavbarColor = () => {
    if (
        document.documentElement.scrollTop > 29 ||
        document.body.scrollTop > 29
    ) {
        navigation.classList.add("scrolling_navigation");
        navigation.classList.remove("initial_navigation");
    } else if (
        document.documentElement.scrollTop < 30 ||
        document.body.scrollTop < 30
    ) {
        navigation.classList.add("initial_navigation");
        navigation.classList.remove("scrolling_navigation");
    }
};

if (location.pathname == "/") {
    window.addEventListener("scroll", updateNavbarColor);
} else {
    navigation.classList.remove("initial_navigation");
    navigation.classList.remove("scrolling_navigation");
    navigation.classList.add("default_navigation");
}

// set active class
$(document).ready(function() {
    $(function() {
        var current_page_URL = location.href;

        $("a").each(function() {
            if ($(this).attr("href") !== "#") {
                var target_URL = $(this).prop("href");

                if (target_URL == current_page_URL) {
                    $("nav a")
                        .parents("li, ul")
                        .removeClass("active");
                    $(this)
                        .parent("li")
                        .addClass("active");

                    return false;
                }
            }
        });
    });
});
const contentObserver = new IntersectionObserver(entries => {
    entries.forEach(entry => {
        const content = entry.target.querySelector(".content");
        if (entry.isIntersecting) {
            content.classList.add("animate__fadeInUp");
            content.classList.remove("animate__fadeOut");
            return; // if we added the class, exit the function
        }
        // We're not intersecting, so remove the class!
    });
});

const firstObserver = new IntersectionObserver(entries => {
    entries.forEach(entry => {
        const content = entry.target.querySelector(".fade_text");
        if (entry.isIntersecting) {
            content.classList.add("animate__fadeInRight");
            content.classList.remove("animate__fadeOut");
            return; // if we added the class, exit the function
        }
        // We're not intersecting, so remove the class!
    });
});

const secondObserver = new IntersectionObserver(entries => {
    entries.forEach(entry => {
        const content = entry.target.querySelector(".fade_text");
        if (entry.isIntersecting) {
            content.classList.add("animate__fadeInLeft");
            content.classList.remove("animate__fadeOut");
            return; // if we added the class, exit the function
        }
        // We're not intersecting, so remove the class!
    });
});

const thirdObserver = new IntersectionObserver(entries => {
    entries.forEach(entry => {
        const content = entry.target.querySelector(".fade_text");
        if (entry.isIntersecting) {
            content.classList.add("animate__fadeInRight");
            content.classList.remove("animate__fadeOut");
            return; // if we added the class, exit the function
        }
        // We're not intersecting, so remove the class!
    });
});

const fourthObserver = new IntersectionObserver(entries => {
    entries.forEach(entry => {
        const content = entry.target.querySelector(".fade_text");
        if (entry.isIntersecting) {
            content.classList.add("animate__fadeInRight");
            content.classList.remove("animate__fadeOut");
            return; // if we added the class, exit the function
        }
        // We're not intersecting, so remove the class!
    });
});

if (window.location.pathname == "/") {
    contentObserver.observe(document.querySelector(".secondContent"));
    firstObserver.observe(document.querySelector(".observer_1"));
    secondObserver.observe(document.querySelector(".observer_2"));
    thirdObserver.observe(document.querySelector(".observer_3"));
    fourthObserver.observe(document.querySelector(".observer_4"));

    //Know more scroll
    const knowmore = document.querySelector(".know_more");
    knowmore.addEventListener("click", () => {
        var currentHeight = window.innerHeight;
        window.scrollTo(0, currentHeight * 0.7);
    });
}
