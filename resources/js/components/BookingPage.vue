
<template>
  <div class="bookings">
    <div class="container py-5">
      <div class="row">
        <div class="col-sm-8 px-5 py-3 bg-white rounded">
          <form @submit.prevent="checkAvailability">
            <h5 class="mb-4">Make reservation</h5>
            <div class="mb-5">
              <div class="form-group">
                <HotelDatePicker
                  @period-selected="handleBooking"
                  :bookings="bookings"
                />
              </div>
              <div class="row">
                <div class="form-group col-sm-3">
                  <label for="">No of guests</label>
                  <select class="form-control" required v-model="detail.guests">
                    <option :value="null" disabled>Select</option>
                    <option :value="n" v-for="n in 50" :key="n">{{ n }}</option>
                  </select>
                </div>
                <div class="form-group col-sm-3">
                  <label for="">No of rooms</label>
                  <select class="form-control" required v-model="detail.rooms">
                    <option :value="null" disabled>Select</option>
                    <option :value="n" v-for="n in 50" :key="n">{{ n }}</option>
                  </select>
                </div>
                <div class="form-group col-sm-6">
                  <label for="">Apartment Type</label>
                  <select
                    class="form-control text-capitalize"
                    required
                    v-model="detail.room_id"
                  >
                    <option :value="null" disabled>Select</option>
                    <option :value="n.id" v-for="n in rooms" :key="n.id">
                      <div
                        class="
                          d-flex
                          justify-content-between
                          align-items-center
                        "
                      >
                        <span
                          ><span class="text-capitalize">{{ n.name }}</span>
                          apartment</span
                        >
                        -
                        <span
                          >{{ n.price | currencyFormat }}
                          <small>/ night</small></span
                        >
                      </div>
                    </option>
                  </select>
                </div>
              </div>
              <div class="row">
                <div class="form-group col-12" v-show="detail.nights">
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
                  <p class="mb-1" v-if="selectedRoom">
                    Room price :
                    <span class=""
                      >{{ selectedRoom.price | currencyFormat }}
                    </span>
                  </p>
                  <p v-if="selectedRoom">
                    Total stay price :
                    <strong class=""
                      >{{
                        (selectedRoom.price * detail.rooms * detail.nights)
                          | currencyFormat
                      }}
                    </strong>
                  </p>
                </div>
              </div>

              <div class="text-right mt-3">
                <button type="submit" class="btn btn-secondary btn-sm ml-auto">
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

          <form
            @submit.prevent="makereserve"
            v-if="isAvailable"
            class="animate__animated animate__slideInUp"
          >
            <h5 class="mb-4">Guest Details</h5>
            <div class="form-group">
              <label for="">Full Name</label>
              <input
                required
                type="text"
                class="form-control"
                :disabled="!isAvailable"
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
                :disabled="!isAvailable"
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
                  :disabled="!isAvailable"
                  aria-describedby="helpId"
                  placeholder=""
                  v-model="detail.phone"
                />
              </div>
              <div class="form-group col-sm-6">
                <label for="">Gender</label>
                <select
                  required
                  class="form-control"
                  :disabled="!isAvailable"
                  v-model="detail.gender"
                >
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
                :disabled="!isAvailable"
                aria-describedby="helpId"
                v-model="detail.address"
                placeholder=""
              />
            </div>

            <div class="text-right mt-3">
              <button
                type="submit"
                class="btn btn-primary mx-auto"
                :disabled="!isAvailable"
              >
                Make reservation
              </button>
            </div>
          </form>
        </div>
        <div class="col-sm-4 side_tab">
          <div class="bg-white rounded p-3 w-100">
            <h5
              class="mb-4"
              data-toggle="modal"
              data-target="#deletereservation"
            >
              Manage your booking
            </h5>

            <div class="mb-3">
              <form @submit.prevent="findBooking" class="text-center">
                <div class="form-group">
                  <label for="">Provide your booking # </label>
                  <input
                    type="search"
                    class="form-control form-control-sm"
                    aria-describedby="helpId"
                    v-model="bookingNumber"
                    placeholder="90499472"
                    minlength="8"
                    maxlength="8"
                    required
                  />
                </div>

                <div>
                  <button
                    type="submit"
                    class="btn btn-secondary btn-sm ml-auto"
                  >
                    <span
                      v-show="isCheckingBooking"
                      class="spinner-border spinner-border-sm mr-1"
                      role="status"
                      aria-hidden="true"
                      :disabled="isCheckingBooking"
                    ></span>
                    {{ isCheckingBooking ? "Checking" : "Check" }} Booking
                  </button>
                </div>

                <div
                  v-if="notfound"
                  class="
                    alert alert-danger alert-dismissible
                    fade
                    show
                    my-2
                    p-2
                  "
                  role="alert"
                >
                  Booking # not found
                </div>
              </form>
            </div>
            <hr />

            <div class="mb-4" v-if="info">
              <h6 class="text-center">Your Reservation details</h6>
              <div>
                <table class="table table-bordered table-sm">
                  <tr class="mb-1">
                    <td class="text-muted">ID</td>

                    <td>#{{ info.booking_no }}</td>
                  </tr>
                  <tr class="mb-1">
                    <td class="text-muted">Creation Date</td>

                    <td>{{ info.created_at | moment("ll") }}</td>
                  </tr>

                  <tr class="mb-1">
                    <td class="text-muted">Guest name</td>

                    <td class="text-capitalize">{{ info.user.name }}</td>
                  </tr>

                  <tr class="mb-1">
                    <td class="text-muted">Guest email</td>

                    <td>{{ info.user.email }}</td>
                  </tr>

                  <tr class="mb-1">
                    <td class="text-muted">Apartment type</td>

                    <td class="text-capitalize">{{ info.room.name }}</td>
                  </tr>

                  <tr class="mb-1">
                    <td class="text-muted">Check-in Date</td>

                    <td>{{ info.check_in | moment("ll") }}</td>
                  </tr>
                  <tr class="mb-1">
                    <td class="text-muted">Check-out Date</td>

                    <td>{{ info.check_out | moment("ll") }}</td>
                  </tr>

                  <tr class="pr-3">
                    <td class="text-muted">No of guests</td>

                    <td>{{ info.no_of_guests }}</td>
                  </tr>

                  <tr class="mb-1">
                    <td class="text-muted">No of nights</td>

                    <td>{{ info.duration }}</td>
                  </tr>
                  <tr class="mb-1">
                    <td class="text-muted">No of rooms</td>

                    <td>{{ info.no_of_rooms }}</td>
                  </tr>

                  <tr class="mb-1">
                    <td class="text-muted">Price per night</td>

                    <td>{{ info.room.price | currencyFormat }}</td>
                  </tr>

                  <tr class="mb-1">
                    <td class="text-muted">Total price</td>

                    <td>{{ info.total_price | currencyFormat }}</td>
                  </tr>

                  <tr class="mb-1">
                    <td class="text-muted">Payment type</td>

                    <td class="text-capitalize">{{ info.payment_type }}</td>
                  </tr>

                  <tr class="mb-1">
                    <td class="text-muted">Payment status</td>

                    <td class="text-capitalize">{{ info.payment_status }}</td>
                  </tr>
                  <tr class="mb-1">
                    <td class="text-muted">Amount paid</td>

                    <td>
                      NGN
                      {{
                        info.payment_status == "pending"
                          ? "₦0"
                          : info.total_price | currencyFormat
                      }}
                    </td>
                  </tr>
                </table>

                <div class="d-flex justify-content-between">
                  <div class="d-flex">
                    <!-- <button
                      type="button"
                      class="btn btn-light btn-sm mr-2"
                      @click="edit"
                    >
                      <small> <i class="fas fa-edit"></i> Edit</small>
                    </button> -->
                    <button
                      type="button"
                      class="btn btn-light btn-sm"
                      data-toggle="modal"
                      data-target="#deletereservation"
                    >
                      <small>
                        <i class="fa fa-trash" aria-hidden="true"></i>
                        Cancel</small
                      >
                    </button>
                  </div>
                  <div></div>
                  <div>
                    <button type="button" class="btn btn-primary btn-sm">
                      <small> Make Payment</small>
                    </button>
                  </div>
                </div>
              </div>
            </div>

            <div class="text-center">
              <a
                :disabled="!isAvailable"
                class="btn btn-default btn-sm"
                href="/bookings"
                role="button"
                >View previous bookings</a
              >
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Modal -->
    <div
      class="modal fade"
      id="modelId"
      tabindex="-1"
      role="dialog"
      aria-labelledby="modelTitleId"
      aria-hidden="true"
    >
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header border-0">
            <h5 class="modal-title" v-if="!finalize">Finalize Reservation</h5>
            <h5 class="modal-title" v-if="finalize">Reservation successful</h5>
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
            <div class="mb-4" v-if="!finalize && detail">
              <table class="table table-bordered table-sm">
                <tr class="mb-1">
                  <td class="text-muted">Guest name</td>

                  <td class="text-capitalize">{{ detail.name }}</td>
                </tr>

                <tr class="mb-1">
                  <td class="text-muted">Guest email</td>

                  <td>{{ detail.email }}</td>
                </tr>

                <tr class="mb-1">
                  <td class="text-muted">Apartment type</td>

                  <td class="text-capitalize">
                    {{ selectedRoom ? selectedRoom.name : "-" }}
                  </td>
                </tr>

                <tr class="mb-1">
                  <td class="text-muted">Check-in date</td>

                  <td>{{ detail.checkIn | moment("ll") }}</td>
                </tr>
                <tr class="mb-1">
                  <td class="text-muted">Check-out date</td>

                  <td>{{ detail.checkOut | moment("ll") }}</td>
                </tr>

                <tr class="pr-3">
                  <td class="text-muted">No of guests</td>

                  <td>{{ detail.guests }}</td>
                </tr>
                <tr class="mb-1">
                  <td class="text-muted">No of rooms</td>

                  <td>{{ detail.rooms }}</td>
                </tr>

                <tr class="mb-1">
                  <td class="text-muted">No of nights</td>

                  <td>{{ detail.nights }}</td>
                </tr>
                <tr class="mb-1">
                  <td class="text-muted">Price per night</td>

                  <td>
                    {{
                      !selectedRoom ? "₦0" : selectedRoom.price | currencyFormat
                    }}
                  </td>
                </tr>
              </table>

              <div class="mb-1 text-right">
                <div>
                  <span class="text-muted"> Nights x {{ detail.nights }}</span>
                </div>

                <div
                  class="
                    finalize_price
                    d-flex
                    justify-content-between
                    align-items-end
                  "
                  v-if="selectedRoom"
                >
                  <small class="text-muted">Total stay price</small>
                  <span>
                    {{
                      (selectedRoom.price * detail.rooms * detail.nights)
                        | currencyFormat
                    }}</span
                  >
                </div>
              </div>
            </div>
            <div v-if="finalize" class="text-center">
              <i
                class="fa fa-check-circle fa-5x text-success"
                aria-hidden="true"
              ></i>

              <p class="my-1">Your reservation was successful</p>
              <p>Booking Number is #{{ bookingNumb }}</p>

              <small class="text-success"
                ><i class="fa fa-info-circle" aria-hidden="true"></i> Check your
                mail for your booking details</small
              >
            </div>
          </div>
          <div class="modal-footer" v-if="!finalize">
            <button
              type="button"
              @click="makePayment"
              class="btn btn-secondary"
              :disabled="!isFinalizing"
            >
              Proceed to payment
            </button>
            <button
              type="type"
              @click="payAtHotel"
              class="btn btn-primary"
              :disabled="!isFinalizing"
            >
              Pay at hotel
            </button>
          </div>
        </div>
      </div>
    </div>

    <!-- Modal -->
    <div
      class="modal fade"
      id="deletereservation"
      tabindex="-1"
      role="dialog"
      aria-labelledby="modelTitleId"
      aria-hidden="true"
    >
      <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
          <div class="modal-body">Are you sure ?</div>
          <div class="modal-footer">
            <button
              type="button"
              class="btn btn-secondary"
              data-dismiss="modal"
            >
              Close
            </button>
            <button
              type="button"
              @click="dropreservation"
              class="btn btn-danger"
            >
              Yes cancel
            </button>
          </div>
        </div>
      </div>
    </div>

    <!-- Modal -->
    <div
      class="modal fade"
      id="editbooking"
      tabindex="-1"
      role="dialog"
      aria-labelledby="modelTitleId"
      aria-hidden="true"
    >
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header border-0">
            <h5 class="modal-title">Modify your reservation</h5>
            <button
              type="button"
              class="close"
              data-dismiss="modal"
              aria-label="Close"
            >
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body border-0">
            <update-book v-if="editbook" :reservation="info"></update-book>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>


<script>
import HotelDatePicker from "vue-hotel-datepicker";
import "vue-hotel-datepicker/dist/vueHotelDatepicker.css";
import UpdateBook from "./UpdateBooking.vue";
export default {
  components: {
    HotelDatePicker,
    UpdateBook,
  },
  data() {
    return {
      editbook: false,
      finalize: false,
      bookings: [],
      booked: [],
      booking: {},
      showdate: false,
      search: "",
      isAvailable: null,
      isChecking: false,
      isCheckingBooking: false,
      detail: {
        name: "",
        email: "",
        address: "",
        gender: "",
        phone: "",
        guests: 1,
        room_id: 1,
        checkIn: "",
        checkOut: "",
        nights: null,
        rooms: 1,
        payment_type: null,
        total_price: 0,
        payment_status: "",
        status: "",
      },

      info: null,
      bookingNumber: "",
      rooms: [],
      isFinalizing: true,
      notfound: false,
      message: "",
      bookingNumb: null,
    };
  },
  created() {
    this.getRooms();
  },
  mounted() {
    var query = new URLSearchParams(window.location.search);
    if (
      query.has("room") &&
      query.has("count") &&
      query.has("checkin") &&
      query.has("checkout") &&
      query.has("guests")
    ) {
      this.detail.rooms = query.get("count");
      this.detail.room_id = Number(query.get("room"));
      this.detail.guests = query.get("guests");
      this.handleBooking("event", query.get("checkin"), query.get("checkout"));
      this.bookings = [
        {
          event: true,
          checkInDate: this.$moment(query.get("checkin")).format("YYYY-MM-DD"),
          checkOutDate: this.$moment(query.get("checkout")).format(
            "YYYY-MM-DD"
          ),
          style: {
            backgroundColor: "#399694",
          },
        },
      ];
      this.checkAvailability();
    }
  },
  computed: {
    selectedRoom() {
      var room = this.rooms.find((item) => item.id == this.detail.room_id);
      return room;
    },
    totalPrice() {
      return this.selectedRoom.price * this.detail.rooms * this.detail.nights;
    },
  },
  methods: {
    makereserve() {
      var modalId = new bootstrap.Modal(document.getElementById("modelId"));

      modalId.show();
    },
    getRooms() {
      axios.get("http://localhost:8000/rooms").then((res) => {
        if (res.status == 200) {
          this.rooms = res.data;
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
            this.bookingNumb = res.data.reservation.booking_no;
            this.finalize = true;
            this.isFinalizing = true;
            this.detail = {
              name: "",
              email: "",
              address: "",
              gender: "",
              phone: "",
              guests: 1,
              room_id: 1,
              checkIn: "",
              checkOut: "",
              nights: null,
              rooms: 1,
              payment_type: null,
              total_price: 0,
              payment_status: "",
              status: "",
            };
            this.bookings = [];
            this.isAvailable = null;
          }
        })
        .catch(() => {
          this.isFinalizing = true;
        });
    },
    findBooking() {
      this.isCheckingBooking = true;
      axios
        .get(`http://localhost:8000/find/booking/${this.bookingNumber}`)
        .then((res) => {
          this.isCheckingBooking = false;
          if (res.status === 200) {
            if (res.data.message == "not found") {
              this.notfound = true;
              setTimeout(() => {
                this.notfound = false;
              }, 5000);
            } else {
              this.info = res.data;
            }
          }
        })
        .catch(() => {
          this.isCheckingBooking = false;
        });
    },
    checkAvailability() {
      if (!this.detail.checkIn || !this.detail.checkIn) {
        this.message = "Please input a check-in and check-out date";
        this.isAvailable = false;
        setTimeout(() => {
          this.isAvailable = null;
        }, 3500);
        return;
      }
      this.isChecking = true;
      axios
        .post("http://localhost:8000/check/availability", this.detail)
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
    makePayment() {
      this.isFinalizing = true;
      this.detail.total_price = this.totalPrice;
    },
    clearInfo() {
      this.info = null;
    },
    edit() {
      this.editbook = true;
      $("#editbooking").modal("show");
    },
    dropreservation() {
      axios
        .delete(`http://localhost:8000/reserve/${this.info.id}`)
        .then((res) => {
          if (res.status == 200) {
            this.info = null;

            $(document).ready(function () {
              $("#deletereservation").modal("hide");
            });
          }
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