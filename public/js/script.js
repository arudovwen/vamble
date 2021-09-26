var navigation = document.getElementById("nav");

if (location.pathname == "/") {
    var updateNavbarColor = () => {
        if (
            document.documentElement.scrollTop > 35 ||
            document.body.scrollTop > 35
        ) {
            navigation.classList.add("scrolling_navigation");
            navigation.classList.remove("initial_navigation");
        } else if (
            document.documentElement.scrollTop < 36 ||
            document.body.scrollTop < 36
        ) {
            navigation.classList.add("initial_navigation");
            navigation.classList.remove("scrolling_navigation");
        }
    };
    window.addEventListener("scroll", updateNavbarColor);
} else {
    navigation.classList.remove("initial_navigation");
    navigation.classList.remove("scrolling_navigation");
    navigation.classList.add("default_navigation");
}

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
            content.classList.add("animate__fadeInRight");
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
            content.classList.add("animate__fadeInLeft");
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
            content.classList.add("animate__fadeInRight");
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

if (window.location.pathname == "/") {
    contentObserver.observe(document.querySelector(".secondContent"));
    firstObserver.observe(document.querySelector(".observer_1"));
    secondObserver.observe(document.querySelector(".observer_2"));
    thirdObserver.observe(document.querySelector(".observer_3"));
    fourthObserver.observe(document.querySelector(".observer_4"));

    //Know more scroll
    var knowmore = document.querySelector(".know_more");
    knowmore.addEventListener("click", () => {
        var currentHeight = window.innerHeight;
        window.scrollTo(0, currentHeight * 0.7);
    });
}
