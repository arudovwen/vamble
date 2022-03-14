/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require("./bootstrap");

window.Vue = require("vue").default;

import Vue from "vue";
export const bus = new Vue();

import Toast from "vue-toastification";
import "vue-toastification/dist/index.css";
Vue.use(Toast, {
    timeout: 2500
});
/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

Vue.component(
    "booking-mini",
    () =>
        import(/* webpackChunkName: "Booking" */ "./components/Booking.vue")
           
);
Vue.component(
    "booking-page",
    () => import( /* webpackChunkName: "Bookingpage" */  "./components/BookingPage.vue")
);
Vue.component(
    "update-book",
    () => import( /* webpackChunkName: "UpdateBooking" */  "./components/UpdateBooking.vue")
);
Vue.component(
    "search-booking",
    () => import( /* webpackChunkName: "SearchBooking" */  "./components/SearchBooking.vue")
);
Vue.component(
    "search-name",
    () =>
        import(
            /* webpackChunkName: "Searchname" */ "./components/SearchName.vue"
        )
);
Vue.component(
    "event-calendar",
    () => import( /* webpackChunkName: "eventcalendar" */  "./components/EventCalendar.vue")
);
Vue.component(
    "search-room",
    () => import( /* webpackChunkName: "Boosearchroomking" */  "./components/Room/SearchRoom.vue")
);
Vue.component(
    "room-result",
    () =>
        import(
            /* webpackChunkName: "roomresult" */ "./components/Room/RoomResult.vue"
        ).default
);

Vue.component(
    "customers-chart",
    () =>
        import(
            /* webpackChunkName:  "customerchart" */ "./components/Charts/CustomersChart.vue"
        ).default
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
