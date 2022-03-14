
<template>
  <div
    class=" rounded  w-100 booking-container text-center"
  >


    <form @submit.prevent="checkAvailability" class="w-100 d-flex  flex-column flex-md-row align-items-center justify-content-center">

        <div
          class="
           row
            flex-column flex-md-row
            rounded

            banner_booking
            w-100
            mx-auto

          "
        >
          <div
            class="
              bg-white
              border-right
              text-center text-dark
              col-md-4
              mb-1 mb-md-0
              d-flex
              align-items-center
              px-0
            "
          >
            <HotelDatePicker @period-selected="handleBooking" />
          </div>

          <div class="d-flex col-md-4 px-0">
            <div
              class="
                w-100
                bg-white
                border-right
                text-center text-dark
                mb-1 mb-md-0
                d-flex
                align-items-center
              "
            >
              <select
                class="form-control form-control-sm border-0 no-focus"
                required
                name="flat_name"
                v-model="flat_name"
                id="flat_name"
              >
                <option value="" disabled>Choose home type</option>
                <option value="room">Room</option>
                <option value="apartment">Apartment</option>
              </select>
            </div>
            <div
              class="
                w-100
                bg-white
                border-right
                text-center text-dark
                mb-1 mb-md-0
                d-flex
                align-items-center
              "
            >
              <select
                class="form-control form-control-sm border-0 no-focus text-capitalize"
                name="room_id"
                v-model="flat_type"
                required
              >
                <option disabled value="">Choose option</option>
                <option
                  :value="item.name"
                  v-for="item in sorteditems"
                  :key="item.id"
                >
                  <div
                    class="d-flex justify-content-between align-items-center"
                  >
                    <span
                      ><span>{{ item.name }}</span> {{ item.type }}</span
                    >
                    -
                    <span
                      >{{ item.price | currencyFormat }}
                      <small>/ night</small></span
                    >
                  </div>
                </option>
              </select>
            </div>
          </div>
          <div class="d-flex col-md-4 px-0">
            <div
              class="
                w-100
                bg-white
                border-right
                text-center text-dark
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
                <option :value="n" v-for="n in 6" :key="n">{{ n }}</option>
              </select>
            </div>
            <div
              class="
                w-100
                bg-white
                border-right
                text-center text-dark
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
                <option :value="n" v-for="n in 6" :key="n">{{ n }}</option>
              </select>
            </div>
          </div>
        </div>



       <div class="bg-primary h-100 booking-button">
           <button type="submit" class="btn btn-primary h-100d d-none d-sm-block">
          <span
            v-show="isChecking"
            class="spinner-border spinner-border-sm mr-1"
            role="status"
            aria-hidden="true"
            :disabled="isChecking"
          ></span>
          {{ isChecking ? "" : "Search " }}
        </button>
         <button type="submit" class="btn btn-primary h-100 btn-block d-sm-none">
          <span
            v-show="isChecking"
            class="spinner-border spinner-border-sm mr-1"
            role="status"
            aria-hidden="true"
            :disabled="isChecking"
          ></span>
          {{ isChecking ? "" : "Search " }}
        </button>
       </div>

    </form>
    <div class="text-danger py-2" v-if="isAvailable === false">
      <i class="fa fa-info-circle" aria-hidden="true"></i> {{ message }}
    </div>
  </div>
</template>

<style scoped>
td{
  padding:5px 10px;
}
</style>
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
      flat_type: "",
      flat_name: "",
      room_id: "",
      checkIn: "",
      checkOut: "",
      nights: null,
      isChecking: false,
      allrooms: [],
      isAvailable: null,
      message: "",
      items: [
        {
          id: 1,
          name: "standard",
          price: 30000,
          type: "room",
        },
        {
          id: 2,
          name: "executive",
          price: 45000,
          type: "room",
        },
        {
          id: 3,
          name: "standard",
          price: 110000,
          type: "apartment",
        },
        {
          id: 4,
          name: "executive",
          price: 120000,
          type: "apartment",
        },
        {
          id: 5,
          name: "platinum",
          price: 150000,
          type: "apartment",
        },
      ],
    };
  },
  mounted() {
    // this.getRooms();
  },
  computed: {
    sorteditems() {
      return this.items.filter((item) => item.type == this.flat_name);
    },
  },
  methods: {
    getRooms() {
      axios.get("/room/types").then((res) => {
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
        flat_type: this.flat_type,
        flat_name: this.flat_name,
      };
      axios
        .post("/check/availability", data)
        .then((res) => {
          this.message = res.data.message;
          if (res.data.status == "available") {
            this.isChecking = false;
            this.isAvailable = true;
            var routeData = `/booking?room=${this.flat_type}&flat_name=${this.flat_name}&count=${this.rooms}&checkin=${this.checkIn}&checkout=${this.checkOut}&guests=${this.guests}`;
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