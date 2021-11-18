<template>
  <div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
      <span>Available rooms</span>
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
            <th>Flat type</th>
            <th>Flat name</th>
            <th>Room name</th>
            <th>Description</th>
            <th>Floor</th>
            <th style="">Max</th>
            <th>Price</th>
            <th class="text-center">Select</th>
          </tr>
        </thead>
        <tbody>
          <tr
            v-for="item in availableRooms"
            :key="item.id"
            :class="{
              'opacity-50':
                detail.flats.length == detail.rooms &&
                !detail.flats.some((val) => val == item.id),
            }"
          >
            <td scope="row" class="text-capitalize">
              {{ item.flat_type }}
            </td>
            <td scope="row" class="text-capitalize">{{ item.flat_name }}</td>
            <td scope="row" class="text-capitalize">{{ item.room_name }}</td>
            <td>{{ item.description }}</td>
            <td>{{ item.floor }}</td>
            <td>{{ item.max_occupancy }}</td>
            <td>{{ item.price | currencyFormat }}</td>

            <td scope="row" class="text-center">
              <input
                type="checkbox"
                :disabled="
                  detail.flats.length == detail.rooms &&
                  !detail.flats.some((val) => val == item.id)
                "
                v-model="detail.flats"
                :value="item.id"
              />
            </td>
          </tr>
        </tbody>
      </table>

      <div class="text-right m-3" v-if="detail.flats.length">
        <button
          type="button"
          class="btn btn-success"
          style="font-size: 0.65rem"
          @click="bookroom"
        >
          Book room
        </button>
      </div>
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
      <div class="modal-dialog" role="document">
        <div class="modal-content">
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
          <div class="modal-body">
            <div class="row">
              <div class="form-group col-12">
                <div class="d-flex justify-content-between">
                  <p class="mb-1">
                    <span class="text-muted"> Check-in : </span>
                    {{ detail.checkIn | moment("ll") }}
                  </p>
                  <p class="mb-1">
                    <span class="text-muted"> Check-out : </span>
                    {{ detail.checkOut | moment("ll") }}
                  </p>
                </div>
                <div class="d-flex justify-content-between">
                  <p class="mb-1">
                    {{ detail.nights > 1 ? "Nights" : "Night" }} x
                    {{ detail.nights }}
                  </p>
                  <p class="mb-1">
                    {{ detail.rooms > 1 ? "Rooms" : "Room" }} x
                    {{ detail.rooms }}
                  </p>
                </div>
                <div class="d-flex justify-content-between">
                  <p class="mb-1" v-if="info">
                    <span class="text-muted">Flat type :</span>
                    <span class="text-capitalize">{{ info.flat_type }} </span>
                  </p>
                  <p class="mb-1" v-if="info">
                    <span class="text-muted">Flat name :</span>
                    <span class="text-capitalize">{{ info.flat_name }} </span>
                  </p>
                </div>
                <p class="mb-1" v-if="info">
                  <span class="text-muted"> Room price :</span>
                  <span class="">{{ info.price | currencyFormat }} </span>
                </p>
                <p v-if="info">
                  <span class="text-muted"> Total stay price :</span>
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
              <h5 class="mb-4 text-center">Guest Details</h5>
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
        flats: [],
        payment_type: null,
        total_price: 0,
        payment_status: "",
        status: "",
        flat_type: "",
        price: null,
      },
    };
  },
  created() {
    bus.$on("search-room", (data) => {
      this.rooms = data.rooms;
      this.detail.checkIn = data.detail.checkIn;
      this.detail.checkOut = data.detail.checkOut;
      this.detail.rooms = data.detail.rooms;
      this.detail.guests = data.detail.guests;
      this.detail.nights = data.detail.nights;
      this.detail.total_price = data.detail.total_price;
      this.detail.flat_type = data.detail.flat_type;
      this.detail.flats = [];
    });
  },

  computed: {
    availableRooms() {
      return this.rooms;
    },
  },
  methods: {
    bookroom() {
      this.info = this.rooms.find((item) => item.id == this.detail.flats[0]);
      this.detail.price = this.info.price;
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
        .post("http://localhost:8000/admin/reserve", this.detail)
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
              flats: [],
              payment_type: null,
              total_price: 0,
              payment_status: "",
              status: "",
              price: null,
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

<style scoped lang="scss">
p {
  font-size: 0.8rem;
}
.opacity-50 {
  opacity: 0.5;
}
</style>