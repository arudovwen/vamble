<template>
  <div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
      <span>List</span>

      <div class="form-check form-switch" v-if="rooms.length">
        <input
          class="form-check-input"
          type="checkbox"
          id="flexSwitchCheckDefault"
          v-model="view"
        />
        <label
          class="form-check-label"
          :class="!view ? 'text-muted' : ''"
          for="flexSwitchCheckDefault"
          >All avaialble rooms</label
        >
      </div>
    </div>
    <div class="card-body p-0">
      <div class="d-flex justify-content-between align-items-center p-2">
        <div class="d-flex align-items-center"></div>
        <div class="form-group m-0">
          <input
            type="seacrh"
            class="form-control form-control-sm"
            name=""
            id=""
            aria-describedby="helpId"
            placeholder="Search name"
          />
        </div>
      </div>
      <table
        class="table table-bordered table-striped bg-white mb-0"
        v-if="availableRooms.length"
      >
        <thead>
          <tr>
            <th>Short Name</th>
            <th>Name</th>
            <th>Description</th>
            <th>Floor</th>
            <th>Max Occupancy</th>
            <th>Price</th>
          </tr>
        </thead>
        <tbody>
          <tr v-for="item in availableRooms" :key="item.id">
            <td scope="row" class="text-capitalize">
              {{ item.short_name }}
            </td>
            <td scope="row" class="text-capitalize">{{ item.name }}</td>
            <td>{{ item.description }}</td>
            <td>{{ item.floor }}</td>
            <td>{{ item.max_occupancy }}</td>
            <td>{{ item.price | currencyFormat }}</td>

            <td scope="row">
              <button
                type="button"
                class="btn btn-info btn-sm mr-2"
                style="font-size: 0.65rem"
                @click="bookroom(item)"
              >
                Book room
              </button>
            </td>
          </tr>
        </tbody>
      </table>
    </div>
    <div
      class="
        card-footer
        text-muted
        d-flex
        justify-content-between
        align-items-center
      "
    >
      <div v-if="availableRooms.length">
        Showing {{ availableRooms.length }} entries
      </div>
      <div></div>
    </div>

    <!-- Modal -->
    <div
      class="modal fade"
      id="reserve"
      tabindex="-1"
      role="dialog"
      aria-labelledby="modelTitleId"
      aria-hidden="true"
    >
      <div class="modal-header border-0">
        <h5 class="modal-title">Make reservation</h5>
        <button
          type="button"
          class="close"
          data-dismiss="modal"
          aria-label="Close"
        >
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-body">
            <div class="row">
              <div class="form-group col-12">
                <p class="mb-1">
                  Check-in : {{ detail.checkIn | moment("ll") }}
                </p>
                <p class="mb-1">
                  Check-out : {{ detail.checkOut | moment("ll") }}
                </p>
                <p class="mb-1">
                  {{ detail.nights > 1 ? "Nights" : "Night" }} x
                  {{ detail.nights }}
                </p>
                <p class="mb-1">
                  {{ detail.rooms > 1 ? "Rooms" : "Room" }} x
                  {{ detail.rooms }}
                </p>
                <p class="mb-1" v-if="info">
                  Room type :
                  <span class="text-capitalize">{{ info.name }} </span>
                </p>
                <p class="mb-1" v-if="info">
                  Room price :
                  <span class="">{{ info.price | currencyFormat }} </span>
                </p>
                <p v-if="info">
                  Total stay price :
                  <strong class=""
                    >{{
                      (info.price * detail.rooms * detail.nights)
                        | currencyFormat
                    }}
                  </strong>
                </p>
              </div>
            </div>

            <hr />
            <form @submit.prevent="payAtHotel" class="">
              <h5 class="mb-4">Guest Details</h5>
              <div class="form-group">
                <label for="">Full Name</label>
                <input
                  required
                  type="text"
                  class="form-control"
                  aria-describedby="helpId"
                  placeholder=""
                  v-model="detail.name"
                />
              </div>

              <div class="form-group">
                <label for="">Email </label>
                <input
                  required
                  type="email"
                  class="form-control"
                  aria-describedby="emailHelpId"
                  placeholder=""
                  v-model="detail.email"
                />
              </div>

              <div class="row">
                <div class="form-group col-sm-6">
                  <label for="">Phone</label>
                  <input
                    required
                    type="text"
                    class="form-control"
                    aria-describedby="helpId"
                    placeholder=""
                    v-model="detail.phone"
                  />
                </div>
                <div class="form-group col-sm-6">
                  <label for="">Gender</label>
                  <select required class="form-control" v-model="detail.gender">
                    <option value="" disabled>Choose gender</option>
                    <option value="male">Male</option>
                    <option value="female">Female</option>
                  </select>
                </div>
              </div>
              <div class="form-group">
                <label for="">Address</label>
                <input
                  required
                  type="text"
                  class="form-control"
                  aria-describedby="helpId"
                  v-model="detail.address"
                  placeholder=""
                />
              </div>

              <div class="text-right mt-3">
                <button type="submit" class="btn btn-primary mx-auto">
                  Make reservation
                </button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>
<script>
import { bus } from "../../app.js";
export default {
  data() {
    return {
      view: false,
      rooms: [],
      roomtypes: [],
      info: {},
      detail: {
        name: "",
        email: "",
        address: "",
        gender: "",
        phone: "",
        guests: 1,
        room_id: null,
        checkIn: "",
        checkOut: "",
        nights: null,
        rooms: null,
        payment_type: null,
        total_price: 0,
        payment_status: "",
        status: "",
      },
    };
  },
  created() {
    bus.$on("search-room", (data) => {
      this.rooms = data.rooms;
      this.roomtypes = data.roomtypes;
      this.detail = data.detail;
    });
  },

  computed: {
    availableRooms() {
      if (!this.view) {
        return this.roomtypes;
      } else {
        return this.rooms;
      }
    },
  },
  methods: {
    bookroom(info) {
      this.info = info;
      if (this.view) {
        this.detail.room_id = this.info.id;
      }
      $("#reserve").modal("show");
    },
    handleBooking(event, checkin, checkout) {
      this.detail.checkIn = this.$moment(checkin).format("YYYY-MM-DD");
      this.detail.checkOut = this.$moment(checkout).format("YYYY-MM-DD");
      this.detail.nights = this.$moment(checkout).diff(
        this.$moment(checkin),
        "days"
      );
    },
    payAtHotel() {
      this.isFinalizing = false;
      this.detail.total_price = this.totalPrice;
      this.detail.payment_type = "pay at hotel";
      this.detail.payment_status = "pending";
      this.detail.status = "reserved";
      axios
        .post("http://localhost:8000/reserve", this.detail)
        .then((res) => {
          if (res.status == 201) {
            this.bookingNumb = res.data.booking_no;
            this.finalize = false;
            this.isFinalizing = true;
            this.detail = {
              name: "",
              email: "",
              address: "",
              gender: "",
              phone: "",
              guests: 1,
              room_id: null,
              checkIn: "",
              checkOut: "",
              nights: null,
              rooms: null,
              payment_type: null,
              total_price: 0,
              payment_status: "",
              status: "",
            };
            this.bookings = [];
            this.isAvailable = null;
            $("#reserve").modal("hide");
            this.$toast.success("Reservation successful");
          }
        })
        .catch(() => {
          this.isFinalizing = true;
        });
    },
  },
};
</script>