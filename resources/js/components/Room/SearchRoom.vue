<template>
  <div>
    <form @submit.prevent="checkAvailability">
      <div
        class="alert alert-danger alert-dismissible fade show"
        role="alert"
        v-show="showAlert"
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
        Ensure Check in and Check out fileds are filled
      </div>
      <div class="row">
        <div class="col-12 mb-4">
          <div id="bookingtool">
            <hotel-checker @period-selected="handleBooking"></hotel-checker>
          </div>
        </div>
        <div class="col-sm-4">
          <div class="form-group">
            <select class="form-control" required v-model="detail.rooms">
              <option :value="null" disabled>No of rooms</option>
              <option :value="n" v-for="n in 50" :key="n">{{ n }}</option>
            </select>
          </div>
        </div>
        <div class="col-sm-4">
          <div class="form-group">
            <select class="form-control" required v-model="detail.guests">
              <option :value="null" disabled>No of guests</option>
              <option :value="n" v-for="n in 50" :key="n">{{ n }}</option>
            </select>
          </div>
        </div>
        <div class="col-sm-4">
          <div class="form-group">
            <select
              class="form-control text-capitalize"
              name="room_id"
              v-model="detail.room_id"
            >
              <option :value="null" disabled>Apartment type</option>
              <option :value="0">Any</option>
              <option :value="room.id" v-for="room in allrooms" :key="room.id">
                {{ room.name }}
              </option>
            </select>
          </div>
        </div>
      </div>
      <div class="text-center my-2">
        <button type="submit" class="btn btn-primary" :disabled="isChecking">
          Search availability
        </button>
      </div>
    </form>
  </div>
</template>
<script>
import { bus } from "../../app";
export default {
  data() {
    return {
      allrooms: [],
      detail: {
        checkIn: "",
        checkout: "",
        nights: "",
        room_id: null,
        rooms: null,
        guests: null,
      },
      isChecking: false,
      rooms: [],
      showAlert: false,
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
      this.detail.checkIn = this.$moment(checkin).format("YYYY-MM-DD");
      this.detail.checkOut = this.$moment(checkout).format("YYYY-MM-DD");
      this.detail.nights = this.$moment(checkout).diff(
        this.$moment(checkin),
        "days"
      );
    },
    checkAvailability() {
      if (!this.detail.checkIn || !this.detail.checkOut) {
        this.showAlert = true;

        setTimeout(() => {
          this.showAlert = false;
        }, 2500);
        return;
      }
      this.isChecking = true;
      axios
        .post("http://localhost:8000/search/room", this.detail)
        .then((res) => {
          if (res.data.message == "available") {
            this.isChecking = false;
            this.rooms = res.data.rooms;
            bus.$emit("search-room", this.rooms);
            return;
          }

          this.isChecking = false;
        })
        .catch(() => {
          this.isChecking = false;
        });
    },
  },
};
</script>