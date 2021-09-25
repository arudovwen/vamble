
<template>
  <div class="bg-white rounded p-3 w-100">
    <div class="mb-3">
      <form @submit.prevent="findBooking" class="text-center">
        <div class="form-group">
          <label for="">Provide your booking # </label>
          <input
            type="search"
            class="form-control form-control-sm"
            aria-describedby="helpId"
            v-model="bookingNumber"
            placeholder="78658587"
            required
          />
        </div>
        <div
          v-if="notfound"
          class="alert alert-danger alert-dismissible fade show mb-2 p-2"
          role="alert"
        >
          Booking # not found
        </div>

        <div>
          <button type="submit" class="btn btn-primary btn-sm ml-auto">
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
            <td class="text-muted">Date</td>

            <td>{{ info.created_at }}</td>
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

            <td>{{ info.total_price | currencyFormat }} </td>
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
          <div>
            <button
              type="button"
              class="btn btn-light btn-sm"
              @click="clearInfo"
            >
              Clear <i class="fa fa-times" aria-hidden="true"></i>
            </button>
          </div>
          <div>
            <button type="button" class="btn btn-primary btn-sm">
              Print invoice
            </button>
          </div>
        </div>
      </div>
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
      search: "",
      isAvailable: null,
      isChecking: false,
      isCheckingBooking: false,

      info: null,
      bookingNumber: "",
      rooms: [],
      isFinalizing: true,
      notfound: false,
    };
  },

  methods: {
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
              this.bookingNumber = "";
            }
          }
        })
        .catch(() => {
          this.isCheckingBooking = false;
        });
    },

    clearInfo() {
      this.info = null;
      this.bookingNumber = "";
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