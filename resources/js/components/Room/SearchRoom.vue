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

        <div class="col-sm-3">
          <div class="form-group">
            <select
              class="form-control"
              required
              name="flat_name"
              v-model="detail.flat_name"
              id="flat_name"
            >
              <option value="" disabled>Choose home type</option>
              <option value="room">Room</option>
              <option value="apartment">Apartment</option>
            </select>
          </div>
        </div>
        <div class="col-sm-3">
          <div class="form-group">
            <select
              class="form-control text-capitalize"
              name="room_id"
              v-model="detail.flat_type"
              required
            >
              <option disabled value="">Choose option</option>
              <option
                :value="item.name"
                v-for="item in sorteditems"
                :key="item.id"
              >
                <div class="d-flex justify-content-between align-items-center">
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
        <div class="col-sm-3">
          <div class="form-group">
            <select class="form-control" required v-model="detail.rooms">
              <option :value="null" disabled>No of rooms</option>
              <option :value="n" v-for="n in 10" :key="n">{{ n }}</option>
            </select>
          </div>
        </div>
        <div class="col-sm-3">
          <div class="form-group">
            <select class="form-control" required v-model="detail.guests">
              <option :value="null" disabled>No of guests</option>
              <option :value="n" v-for="n in 5" :key="n">{{ n }}</option>
            </select>
          </div>
        </div>
      </div>
      <div class="text-center my-2">
        <button
          type="submit"
          class="btn btn-primary btn-sm"
          :disabled="isChecking"
        >
          Search availability
        </button>
      </div>
    </form>
    <div
      class="alert alert-success alert-dismissible fade show"
      role="alert"
      v-if="status == 'available'"
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
      <strong>{{ message }}</strong>
    </div>
    <div
      class="alert alert-info alert-dismissible fade show"
      role="alert"
      v-if="status == 'unavailable' || status == 'less-available'"
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
      <strong>{{ message }}</strong>
    </div>
  </div>
</template>
<script>
import { bus } from "../../app";
export default {
  data() {
    return {
      type: "all",
      message: "",
      status: null,
      roomtypes: [],
      allrooms: [],
      detail: {
        name: "",
        email: "",
        address: "",
        gender: "",
        phone: "",
        guests: null,
        room_id: null,
        flat_type: "",
        flat_name: "room",
        checkIn: "",
        checkOut: "",
        nights: null,
        rooms: null,
        payment_type: null,
        total_price: 0,
        payment_status: "",
        status: "",
      },
      isChecking: false,
      rooms: [],
      showAlert: false,
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
          price: 100000,
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
    this.getRooms();
  },
  computed: {
    sorteditems() {
      return this.items.filter((item) => item.type == this.detail.flat_name);
    },
  },
  methods: {
    getRooms() {
      axios.get("/room/types").then((res) => {
        if (res.status == 200) {
          this.roomtypes = res.data;
        }
      });
    },
    getallavailble() {
      axios.get("/available/rooms").then((res) => {
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
        .post("/search/room", this.detail)
        .then((res) => {
          if (res.status == 200) {
            this.isChecking = false;
            this.rooms = res.data.rooms;
            this.message = res.data.message;
            this.status = res.data.status;
            var data = {
              rooms: res.data.rooms,

              detail: this.detail,
            };
            bus.$emit("search-room", data);
            setTimeout(() => {
              this.message = "";
              this.status = null;
            }, 2500);
            return;
          }
        })
        .catch(() => {
          this.isChecking = false;
        });
    },
  },
};
</script>