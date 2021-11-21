
<template>
  <div class="bookings px-0 py-3 py-md-3 px-md-3 p-md-0">
    <div class="container pb-5 pt-md-3">
      <div class="row">
        <div class="col-md-8 rounded mb-5">
          <stepper :step="step" @toggleStep="toggleStep">
            <template #one>
              <form @submit.prevent="checkAvailability">
                <div class="mb-5">
                  <div class="form-group">
                    <HotelDatePicker
                      @period-selected="handleBooking"
                      :bookings="bookings"
                    />
                  </div>
                  <div class="row">
                    <div class="form-group col-md-3">
                      <label for="">No of guests</label>
                      <select
                        class="form-control"
                        required
                        v-model="detail.guests"
                      >
                        <option :value="null" disabled>Select</option>
                        <option :value="n" v-for="n in 50" :key="n">
                          {{ n }}
                        </option>
                      </select>
                    </div>
                    <div class="form-group col-md-3">
                      <label for="">No of rooms</label>
                      <select
                        class="form-control"
                        required
                        v-model="detail.rooms"
                      >
                        <option :value="null" disabled>Select</option>
                        <option :value="n" v-for="n in 50" :key="n">
                          {{ n }}
                        </option>
                      </select>
                    </div>
                    <div class="form-group col-md-6">
                      <label for="">Apartment Type</label>
                      <select
                        class="form-control text-capitalize"
                        required
                        v-model="detail.flat_type"
                      >
                        <option disabled value="">Apartment type</option>
                        <option
                          :value="item.value"
                          v-for="item in roomOption"
                          :key="item.id"
                        >
                          <div
                            class="
                              d-flex
                              justify-content-between
                              align-items-center
                            "
                          >
                            <span
                              ><span>{{ item.text }}</span> apartment</span
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
                  <div class="row" v-if="detail.nights">
                    <div class="form-group col-12">
                      <div class="d-flex justify-content-between">
                        <div>
                          <p
                            class="mb-1"
                            v-if="detail.checkIn && detail.checkOut"
                          >
                            Check-in : {{ detail.checkIn | moment("ll") }}
                          </p>
                          <p class="mb-1">
                            Check-out : {{ detail.checkOut | moment("ll") }}
                          </p>
                        </div>
                        <div>
                          <p class="mb-1" v-if="detail.nights">
                            {{ detail.nights > 1 ? "Nights" : "Night" }} x
                            {{ detail.nights }}
                          </p>
                          <p class="mb-1" v-if="detail.rooms">
                            {{ detail.rooms > 1 ? "Rooms" : "Room" }} x
                            {{ detail.rooms }}
                          </p>
                        </div>
                      </div>
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

                  <div class="text-right mt-1">
                    <button
                      type="submit"
                      class="btn btn-secondary btn-sm ml-auto"
                    >
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
                    {{ message }}
                  </div>
                  <div
                    v-if="isAvailable === false"
                    class="alert alert-danger alert-dismissible fade show"
                    role="alert"
                  >
                    {{ message }}
                  </div>
                </div>
                <div class="d-flex justify-content-end mt-3" v-if="isAvailable">
                  <button
                    type="button"
                    @click="step++"
                    class="btn btn-primary btn-sm px-3"
                  >
                    Next
                  </button>
                </div>
              </form>
            </template>
            <template #two>
              <form
                v-if="isAvailable"
                class="animate__animated animate__fadeIn"
              >
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
                  <div class="form-group col-md-4">
                    <label for="">Phone</label>
                    <input
                      required
                      type="text"
                      class="form-control"
                      :disabled="!isAvailable"
                      aria-describedby="helpId"
                      placeholder=""
                      minlength="11"
                      maxlength="11"
                      v-model="detail.phone"
                    />
                  </div>
                  <div class="form-group col-md-4">
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
                  <div class="form-group col-md-4">
                    <label for="">Nationality</label>
                    <select
                      required
                      class="form-control"
                      :disabled="!isAvailable"
                      v-model="detail.nationality"
                    >
                      <option value="" disabled>Choose nationality</option>
                      <option value="nigeria">Nigeria</option>
                      <option value="other">Other</option>
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

                <div class="d-flex justify-content-end mt-4">
                  <button
                    type="button"
                    @click="step--"
                    class="btn btn-secondary btn-sm mr-3"
                  >
                    Previous
                  </button>
                  <button
                    type="button"
                    @click="step++"
                    class="btn btn-primary btn-sm"
                  >
                    Next
                  </button>
                </div>
              </form>

              <div v-else class="text-center p-4">
                <div
                  class="alert alert-info alert-dismissible fade show"
                  role="alert"
                >
                  <strong>No Room Selected</strong> Check Availability or check
                  back later
                </div>
              </div>
            </template>
            <template #three>
              <div class="p-3" v-if="isAvailable">
                <div class="border-0">
                  <h5 class="modal-title text-center mb-4" v-if="!finalize">
                    Finalize Reservation
                  </h5>
                  <h5 class="modal-title text-center mb-4" v-if="finalize">
                    Reservation successful
                  </h5>
                </div>
                <div class="">
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
                          {{ selectedRoom ? selectedRoom.text : "-" }} flat
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
                            !selectedRoom
                              ? "₦0"
                              : selectedRoom.price | currencyFormat
                          }}
                        </td>
                      </tr>
                    </table>

                    <div class="mb-1 text-right">
                      <div>
                        <span class="text-muted">
                          Nights x {{ detail.nights }}</span
                        >
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
                </div>
                <div class="" v-if="!finalize">
                  <Payment
                    :detail="detail"
                    :amount="totalPrice"
                    @paymentsuccessful="paymentsuccessful"
                  />
                  <button
                    type="button"
                    @click="payAtHotel"
                    class="btn btn-dark btn-sm ml-3"
                    :disabled="!isFinalizing"
                  >
                    Pay at hotel
                  </button>
                </div>
              </div>
              <div v-else class="text-center p-4">
                <div
                  class="alert alert-info alert-dismissible fade show"
                  role="alert"
                >
                  <strong>No Room Selected</strong> Check Availability or check
                  back later
                </div>
              </div>
              <div v-if="finalize && isAvailable" class="text-center">
                <i
                  class="fa fa-check-circle fa-5x text-success"
                  aria-hidden="true"
                ></i>

                <p class="my-1">Your reservation was successful</p>
                <p>Booking Number is #{{ bookingNumb }}</p>

                <small class="text-success"
                  ><i class="fa fa-info-circle" aria-hidden="true"></i> Check
                  your mail for your booking details</small
                >
                <div class="mt-4 text-center">
                  <button
                    type="button"
                    @click="reset"
                    class="btn btn-secondary btn-sm"
                  >
                    Reset
                  </button>
                </div>
              </div>
            </template>
          </stepper>
        </div>

        <div class="col-md-4 side_tab px-md-3">
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
                <table class="table table-bordered table-striped table-sm">
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

                  <tr class="mb-1" v-if="info.roomcalendar.length">
                    <td class="text-muted">Apartment type</td>

                    <td class="text-capitalize">
                      {{ info.roomcalendar[0].room.flat_type }}
                    </td>
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

                    <td>{{ info.price_per_night | currencyFormat }}</td>
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
                    <Payment
                      :detail="detail"
                      :amount="totalPrice"
                      @paymentsuccessful="paymentsuccessful"
                    />
                  </div>
                </div>
              </div>
            </div>

            <div class="alert alert-info" role="alert" v-if="info">
              <i class="fa fa-info-circle" aria-hidden="true"></i>
              <small
                >Contact our customer service for reservation
                modifications</small
              >
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
  </div>
</template>


<script>
import HotelDatePicker from "vue-hotel-datepicker";
import "vue-hotel-datepicker/dist/vueHotelDatepicker.css";
import UpdateBook from "./UpdateBooking.vue";
import { FormWizard, TabContent } from "vue-step-wizard";
import Payment from "./Paystack.vue";
import Stepper from "./Step.vue";

export default {
  components: {
    HotelDatePicker,
    UpdateBook,
    FormWizard,
    TabContent,
    Payment,
    Stepper,
  },
  data() {
    return {
      val: 2,
      step: 1,
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
        gender: "male",
        nationality: "nigeria",
        phone: "",
        guests: null,
        room_id: null,
        checkIn: "",
        checkOut: "",
        nights: null,
        rooms: null,
        payment_type: null,
        flat_type: "",
        total_price: 0,
        payment_status: "",
        status: "",
        price_per_night: null,
        flats: [],
      },
      roomOption: [
        {
          id: 3,
          text: "Standard",
          value: "standard",
          price: 30000,
        },
        {
          id: 1,
          text: "Luxury",
          value: "luxury",
          price: 110000,
        },
      ],
      info: null,
      bookingNumber: "",
      rooms: [],
      isFinalizing: true,
      notfound: false,
      message: "",
      bookingNumb: null,
    };
  },

  mounted() {
    $("#modelId").on("hidden.bs.modal", function (e) {
      if (this.finalize) {
        window.location.href = "/booking";
      }
    });

    var query = new URLSearchParams(window.location.search);
    if (
      query.has("room") &&
      query.has("count") &&
      query.has("checkin") &&
      query.has("checkout") &&
      query.has("guests")
    ) {
      this.detail.rooms = query.get("count");
      this.detail.flat_type = query.get("room");
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
      var room = this.roomOption.find(
        (item) => item.value == this.detail.flat_type
      );
      return room;
    },
    totalPrice() {
      return this.selectedRoom.price * this.detail.rooms * this.detail.nights;
    },
  },
  methods: {
    toggleStep(val) {
      if (!this.isAvailable) {
        return;
      }
      this.step = val;
    },
    reset() {
      window.location.reload();
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
      this.detail.price_per_night = this.selectedRoom.price;
      this.detail.room_id = this.selectedRoom.id;
      axios
        .post("/reserve", this.detail)
        .then((res) => {
          if (res.status == 201) {
            this.bookingNumb = res.data.booking_no;
            this.finalize = true;
            this.isFinalizing = true;
            this.detail = {
              name: "",
              email: "",
              address: "",
              gender: "",
              phone: "",
              guests: null,
              room_id: null,
              checkIn: "",
              checkOut: "",
              nights: null,
              rooms: null,
              payment_type: null,
              flat_type: "",
              total_price: 0,
              payment_status: "",
              status: "",
              price_per_night: null,
              flats: [],
            };
            this.bookings = [];

            window.scrollTo(0, 0);
          }
        })
        .catch(() => {
          this.isFinalizing = true;
        });
    },
    findBooking() {
      this.isCheckingBooking = true;
      axios
        .get(`/find/booking/${this.bookingNumber}`)
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
        .post("/check/availability", this.detail)
        .then((res) => {
          this.message = res.data.message;
          if (res.data.status == "available") {
            this.isAvailable = true;
            this.isChecking = false;
            this.detail.flats = res.data.rooms;

            return;
          }
          this.isAvailable = false;
          this.isChecking = false;
        })
        .catch(() => {
          this.isChecking = false;
        });
    },
    paymentsuccessful(res) {
      this.bookingNumb = res.data.booking_no;
      this.finalize = true;
      this.isFinalizing = true;
      this.detail = {
        name: "",
        email: "",
        address: "",
        gender: "",
        phone: "",
        guests: null,
        room_id: null,
        checkIn: "",
        checkOut: "",
        nights: null,
        rooms: null,
        payment_type: null,
        flat_type: "",
        total_price: 0,
        payment_status: "",
        status: "",
        price_per_night: null,
        flats: [],
      };
      this.bookings = [];
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
        .delete(`/reserve/${this.info.id}`)
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