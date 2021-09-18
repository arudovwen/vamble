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
