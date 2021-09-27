/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require("./bootstrap");

window.Vue = require("vue").default;

import Vue from "vue";
export const bus = new Vue();

import HotelDatePicker from "vue-hotel-datepicker";
import "vue-hotel-datepicker/dist/vueHotelDatepicker.css";
import FullCalendar from "vue-full-calendar";
Vue.use(FullCalendar);
/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

Vue.component("banner-text", require("./components/BannerText.vue").default);
Vue.component("booking-mini", require("./components/Booking.vue").default);
Vue.component("booking-page", require("./components/BookingPage.vue").default);
Vue.component("update-book", require("./components/UpdateBooking.vue").default);
Vue.component(
    "search-booking",
    require("./components/SearchBooking.vue").default
);
Vue.component("search-name", require("./components/SearchName.vue").default);
Vue.component(
    "event-calendar",
    require("./components/EventCalendar.vue").default
);
Vue.component(
    "search-room",
    require("./components/Room/SearchRoom.vue").default
);
Vue.component(
    "room-result",
    require("./components/Room/RoomResult.vue").default
);
Vue.component("hotel-checker", HotelDatePicker).default;

Vue.component(
    "customers-chart",
    require("./components/Charts/CustomersChart.vue").default
);

Vue.use(require("vue-moment"));
Vue.filter("currencyFormat", function(numb) {
    var num = Number(numb);
    if (num) {
        return "₦ " + num.toFixed(2).replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1,");
    } else {
        return "₦ 0.00";
    }
});

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: "#app"
});

require("./script");
