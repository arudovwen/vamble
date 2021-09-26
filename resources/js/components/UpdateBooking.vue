<template>
  <div class="">
    <form @submit.prevent="updatereservation">
      <div class="mb-5">
        <div class="form-group">
          <HotelDatePicker
            @period-selected="handleBooking"
            :bookings="bookings"
          />
        </div>

        <div class="row">
          <div class="form-group col-12">
            <p class="mb-1 text-capitalize">
              Room Type : {{ updatedetail.room }}
            </p>
            <p class="mb-1">
              Check-in : {{ updatedetail.checkIn | moment("ll") }}
            </p>
            <p class="mb-1">
              Check-out : {{ updatedetail.checkOut | moment("ll") }}
            </p>
            <p class="mb-1">
              {{ updatedetail.nights > 1 ? "Nights" : "Night" }} x
              {{ updatedetail.nights }}
            </p>
            <p class="mb-1">
              {{ updatedetail.rooms > 1 ? "Rooms" : "Room" }} x
              {{ updatedetail.rooms }}
            </p>
            <p class="mb-1" v-if="selectedRoom">
              Room price :
              <span class="">{{ selectedRoom.price | currencyFormat }} </span>
            </p>
            <p v-if="selectedRoom">
              Total stay price :
              <strong class=""
                >{{
                  (selectedRoom.price *
                    updatedetail.rooms *
                    updatedetail.nights)
                    | currencyFormat
                }}
              </strong>
            </p>
          </div>
        </div>

        <div class="text-right">
          <button type="submit" class="btn btn-secondary btn-sm ml-auto">
            <span
              v-show="isChecking"
              class="spinner-border spinner-border-sm mr-1"
              role="status"
              aria-hidden="true"
              :disabled="isChecking"
            ></span>
            Update
          </button>
        </div>
      </div>
      <div>
        <div
          v-if="isAvailable"
          class="alert alert-success alert-dismissible fade show"
          role="alert"
        >
          <button
            type="button"
            class="close"
            data-dismiss="alert"
            aria-label="Close"
          >
            <span aria-hidden="true">&times;</span>
            <span class="sr-only">Close</span>
          </button>

          {{ message }}
        </div>
        <div
          v-if="isAvailable === false"
          class="alert alert-danger alert-dismissible fade show"
          role="alert"
        >
          <button
            type="button"
            class="close"
            data-dismiss="alert"
            aria-label="Close"
          >
            <span aria-hidden="true">&times;</span>
            <span class="sr-only">Close</span>
          </button>

          {{ message }}
        </div>
      </div>
    </form>
    <hr />
  </div>
</template>

<script>
import HotelDatePicker from "vue-hotel-datepicker";
import "vue-hotel-datepicker/dist/vueHotelDatepicker.css";

export default {
  components: {
    HotelDatePicker,
  },
  props: ["reservation"],
  data() {
    return {
      finalize: false,
      bookings: [],
      booked: [],
      booking: {},
      showdate: false,
      search: "",
      isAvailable: null,
      isChecking: false,
      isCheckingBooking: false,
      info: null,
      bookingNumber: "",
      rooms: [],
      isFinalizing: true,
      notfound: false,
      message: "",
      bookingNumb: null,
      updatedetail: {
        id: this.$props.reservation.id,
        checkIn: "",
        checkOut: "",
        room_id: null,
        nights: null,
        rooms: null,
        room: null,
      },
    };
  },
  created() {
    this.getRooms();
  },
  mounted() {
    this.updatedetail.id = this.$props.reservation.id;
    this.updatedetail.nights = this.$props.reservation.duration;
    this.updatedetail.rooms = this.$props.reservation.no_of_rooms;
    this.updatedetail.checkIn = this.$props.reservation.check_out;
    this.updatedetail.checkOut = this.$props.reservation.check_out;
    this.updatedetail.room_id = this.$props.reservation.room_id;
    this.updatedetail.room = this.$props.reservation.room.name;
  },
  computed: {
    detail() {
      var detail = {};

      return detail;
    },
    selectedRoom() {
      var room = this.rooms.find(
        (item) => item.id == this.updatedetail.room_id
      );
      return room;
    },
    totalPrice() {
      return (
        this.selectedRoom.price *
        this.updatedetail.rooms *
        this.updatedetail.nights
      );
    },
  },
  methods: {
    getRooms() {
      axios.get("http://localhost:8000/rooms").then((res) => {
        if (res.status == 200) {
          this.rooms = res.data;
        }
      });
    },
    handleBooking(event, checkin, checkout) {
      this.updatedetail.checkIn = this.$moment(checkin).format("YYYY-MM-DD");
      this.updatedetail.checkOut = this.$moment(checkout).format("YYYY-MM-DD");
      this.updatedetail.nights = this.$moment(checkout).diff(
        this.$moment(checkin),
        "days"
      );
    },

    updatereservation() {
      if (!this.updatedetail.checkIn || !this.updatedetail.checkIn) {
        this.message = "Please input a check-in and check-out date";
        this.isAvailable = false;
        setTimeout(() => {
          this.isAvailable = null;
        }, 3500);
        return;
      }
      this.isChecking = true;
      axios
        .put(
          `http://localhost:8000/reservations/${this.$props.reservation.id}`,
          this.updatedetail
        )
        .then((res) => {
          this.message = res.data.message;
          if (res.data.status == "available") {
            this.isAvailable = true;
            this.isChecking = false;
            return;
          }
          this.isAvailable = false;
          this.isChecking = false;
        })
        .catch(() => {
          this.isChecking = false;
        });
    },
  },
};
</script>

<style scoped>
td,
.side_tab {
  font-size: 0.75rem;
}
</style>