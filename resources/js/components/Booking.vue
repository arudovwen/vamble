
<template>
  <div
    class="container py-3 px-4 rounded bg-dark-opacity text-white text-center"
  >
    <h5 class="mb-3">Book your stay today</h5>
    <form @submit.prevent="checkAvailability">
      <div
        class="
          row
          flex-column flex-md-row
          justify-content-between
          align-items-center
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
              col-md-5
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
              col-md-2
              mb-1 mb-md-0
              d-flex
              align-items-center
            "
          >
            <select
              required
              class="form-control form-control-sm border-0 no-focus"
              v-model="guests"
            >
              <option disabled :value="null">No of guests</option>
              <option :value="n" v-for="n in 50" :key="n">{{ n }}</option>
            </select>
          </div>
          <div
            class="
              bg-white
              border-right
              text-center text-dark
              col-md-2
              mb-1 mb-md-0
              d-flex
              align-items-center
            "
          >
            <select
              required
              class="form-control form-control-sm border-0 no-focus"
              v-model="rooms"
            >
              <option disabled :value="null">No of rooms</option>
              <option :value="n" v-for="n in 50" :key="n">{{ n }}</option>
            </select>
          </div>
          <div
            class="
              bg-white
              text-center text-dark
              col-md-3
              mb-1 mb-md-0
              d-flex
              align-items-center
            "
          >
            <select
              required
              class="form-control form-control-sm border-0 no-focus"
              v-model="room_id"
            >
              <option disabled value="">Apartment type</option>
              <option :value="n.id" v-for="n in allrooms" :key="n.id">
                <div class="d-flex justify-content-between align-items-center">
                  <span
                    ><span class="text-capitalize">{{ n.name }}</span>
                    apartment</span
                  >
                  -
                  <span
                    >{{ n.price | currencyFormat }} <small>/ night</small></span
                  >
                </div>
              </option>
            </select>
          </div>
        </div>
        <button type="submit" class="btn btn-primary">
          <span
            v-show="isChecking"
            class="spinner-border spinner-border-sm mr-1"
            role="status"
            aria-hidden="true"
            :disabled="isChecking"
          ></span>
          {{ isChecking ? "Checking" : "Check" }} Availabilty
        </button>
      </div>
    </form>
    <div class="text-danger py-2" v-if="isAvailable === false">
      <i class="fa fa-info-circle" aria-hidden="true"></i> {{ message }}
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
      rooms: null,
      room_id: "",
      checkIn: "",
      checkOut: "",
      nights: null,
      isChecking: false,
      allrooms: [],
      isAvailable: null,
      message: "",
    };
  },
  mounted() {
    this.getRooms();
  },
  methods: {
    getRooms() {
      axios.get("http://localhost:8000/rooms").then((res) => {
        if (res.status == 200) {
          this.allrooms = res.data;
        }
      });
    },
    handleBooking(event, checkin, checkout) {
      this.checkIn = checkin;
      this.checkOut = checkout;
      this.nights = this.$moment(checkout).diff(this.$moment(checkin), "days");
    },

    checkAvailability() {
      if (!this.checkIn || !this.checkIn) {
        this.message = "Please input a check-in and check-out date";
        this.isAvailable = false;
        setTimeout(() => {
          this.isAvailable = true;
        }, 3500);
        return;
      }
      this.isChecking = true;
      var data = {
        rooms: this.rooms,
        room_id: this.room_id,
        checkIn: this.checkIn,
        checkOut: this.checkOut,
        nights: this.nights,
      };
      axios
        .post("http://localhost:8000/check/availability", data)
        .then((res) => {
          this.message = res.data.message;
          if (res.data.status == "available") {
            this.isChecking = false;
            this.isAvailable = true;
            var routeData = `http://localhost:8000/booking?room=${this.room_id}&count=${this.rooms}&checkin=${this.checkIn}&checkout=${this.checkOut}&guests=${this.guests}`;
            window.location.href = routeData;
            return;
          }

          this.isChecking = false;
          this.isAvailable = false;
          setTimeout(() => {
            this.isAvailable = true;
          }, 4500);
        })
        .catch(() => {
          this.isChecking = false;
        });
    },
  },
};
</script>