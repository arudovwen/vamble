
<template>
  <div
    class="container py-3 px-4 rounded bg-dark-opacity text-white text-center"
  >
    <h4 class="mb-3">Book your stay today</h4>
    <div
      class="
        row
        flex-column flex-md-row
        justify-content-between
        align-items-center
        px-4
      "
    >
      <div
        class="
          d-flex
          flex-column flex-md-row flex-grow-1
          mr-2
          rounded
          mb-4 mb-md-0
          banner_booking
        "
      >
        <div
          class="
            bg-white
            border-right
            text-center text-dark
            col-md-6
            mb-1 mb-md-0
            d-flex
            align-items-center
            px-0
          "
        >
          <HotelDatePicker @period-selected="handleBooking" />
        </div>

        <div
          class="
            bg-white
            border-right
            text-center text-dark
            col-md-3
            mb-1 mb-md-0
          "
        >
          <select
            class="form-control border-0 no-focus"
            v-model="guests"
            name=""
            id=""
          >
            <option disabled :value="null">No of guests</option>
            <option value="1">2</option>
          </select>
        </div>
        <div class="bg-white text-center text-dark col-md-3 mb-1 mb-md-0">
          <select
            class="form-control border-0 no-focus"
            name=""
            v-model="apartment"
            id=""
          >
            <option disabled value="">Apartment type</option>
            <option value="1">Standard</option>
          </select>
        </div>
      </div>
      <button type="button" class="btn btn-primary">Check Availabilty</button>
    </div>
  </div>
</template>


<script>
import HotelDatePicker from "vue-hotel-datepicker";
import "vue-hotel-datepicker/dist/vueHotelDatepicker.css";

export default {
  components: {
    HotelDatePicker,
  },
  data() {
    return {
      booking: {},
      showdate: false,
      guests: null,
      apartment: "",
      checkIn: "",
      checkOut: "",
      nights: null,
    };
  },
  mounted() {
    console.log(this.$moment());
  },
  methods: {
    handleBooking(event, checkin, checkout) {
      this.checkIn = checkin;
      this.checkOut = checkout;
      this.nights = this.$moment(checkout).diff(this.$moment(checkin), "days");

      console.log(
        "🚀 ~ file: Booking.vue ~ line 105 ~ handleBooking ~  this.$moment(checkin).diff",
        this.$moment(checkout).diff(this.$moment(checkin), "days")
      );
    },
  },
};
</script>