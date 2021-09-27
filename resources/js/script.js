console.log(
    "🚀 ~ file: script.js ~ line 16 ~ location.pathname",
    location.pathname
);
var navigation = document.getElementById("nav");
var updateNavbarColor = () => {
    if (window.scrollY > window.innerHeight * 0.07) {
        navigation.classList.add("scrolling_navigation");
    } else {
        navigation.classList.remove("scrolling_navigation");
    }
    if (window.scrollY > window.innerHeight * 0.09) {
        $(".logo").addClass("logoShrink");
    } else {
        $(".logo").removeClass("logoShrink");
    }
};
if (location.pathname == "/") {
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

// $("#navbarSupportedContent").on("show.bs.collapse", function(e) {
//     $("#hamburger").addClass("is-active");
// });
// $("#navbarSupportedContent").on("hide.bs.collapse", function(e) {
//     $("#hamburger").removeClass("is-active");
// });

// function currency(numb) {
//     var num = Number(numb);
//     if (num) {
//         return "₦ " + num.toFixed(2).replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1,");
//     } else {
//         return "₦ 0.00";
//     }
// }
// $("#viewdetail").on("show.bs.modal", function(event) {
//     var info = $(event.relatedTarget);
//     var username = info.data("username");
//     var email = info.data("email");
//     var checkin = info.data("checkin");
//     var checkout = info.data("checkout");
//     var roomname = info.data("roomname") + " Apartment";
//     var rooms = info.data("rooms");
//     var pricepernight = info.data("pricepernight");
//     var guests = info.data("guests");
//     var nights = info.data("nights");
//     var payment_type = info.data("payment_type");
//     var totalprice = info.data("totalprice");
//     var payment_status = info.data("payment_status");
//     var amountpaid = info.data("amountpaid");

//     var modal = $(this);

//     modal.find(".modal-title").text("Reservation detail");
//     modal.find(".modal-body #username").text(username);
//     modal.find(".modal-body #email").text(email);
//     modal.find(".modal-body #rooms").text(rooms);
//     modal.find(".modal-body #checkin").text(moment(checkin).format("ll"));
//     modal.find(".modal-body #checkout").text(moment(checkout).format("ll"));
//     modal.find(".modal-body #roomname").text(roomname);
//     modal.find(".modal-body #pricepernight").text(currency(pricepernight));
//     modal.find(".modal-body #guests").text(guests);
//     modal.find(".modal-body #nights").text(nights);
//     modal.find(".modal-body #payment_type").text(payment_type);
//     modal.find(".modal-body #totalprice").text(currency(totalprice));
//     modal.find(".modal-body #payment_status").text(payment_status);
//     modal.find(".modal-body #amountpaid").text(currency(amountpaid));
// });
