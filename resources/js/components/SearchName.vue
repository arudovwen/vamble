
<template>
  <div class="bg-white rounded p-3 w-100">
    <div class="mb-3">
      <form @submit.prevent="findBooking" class="text-center">
        <div class="form-group">
          <label for="">Provide your name or email </label>
          <input
            type="search"
            class="form-control form-control-sm"
            aria-describedby="helpId"
            v-model="bookingNumber"
            placeholder="Search reservation by name or email"
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
    <div
      v-if="bookings.length"
      id="accordianId"
      role="tablist"
      aria-multiselectable="true"
      class="mb-5"
    >
      <div class="card" v-for="item in bookings" :key="item.id">
        <div class="card-header" role="tab" id="section1HeaderId">
          <h5 class="mb-0">
            <a
              data-toggle="collapse"
              data-parent="#accordianId"
              :href="`#booking${item.id}`"
              aria-expanded="true"
              aria-controls="section1ContentId"
            >
              <div class="d-flex justify-content-between">
                <div class="date">
                  {{ item.check_in | moment("ddd, MMM Do YYYY") }}
                </div>
                <div class="bookingnumber">#{{ item.booking_no }}</div>
              </div>
            </a>
          </h5>
        </div>
        <div
          :id="`booking${item.id}`"
          class="collapse in"
          role="tabpanel"
          aria-labelledby="section1HeaderId"
        >
          <div class="card-body">
            <div class="mb-4">
              <h6 class="text-center">Reservation details</h6>
              <div>
                <table class="table table-bordered table-sm">
                  <tr class="mb-1">
                    <td class="text-muted">Guest name</td>

                    <td class="text-capitalize">{{ item.user.name }}</td>
                  </tr>

                  <tr class="mb-1">
                    <td class="text-muted">Guest email</td>

                    <td>{{ item.user.email }}</td>
                  </tr>

                  <tr class="mb-1">
                    <td class="text-muted">Apartment type</td>

                    <td class="text-capitalize">{{ item.room.name }}</td>
                  </tr>

                  <tr class="mb-1">
                    <td class="text-muted">Check-in Date</td>

                    <td>{{ item.check_in | moment("ll") }}</td>
                  </tr>
                  <tr class="mb-1">
                    <td class="text-muted">Check-out Date</td>

                    <td>{{ item.check_out | moment("ll") }}</td>
                  </tr>

                  <tr class="pr-3">
                    <td class="text-muted">No of guests</td>

                    <td>{{ item.no_of_guests }}</td>
                  </tr>

                  <tr class="mb-1">
                    <td class="text-muted">No of nights</td>

                    <td>{{ item.duration }}</td>
                  </tr>
                  <tr class="mb-1">
                    <td class="text-muted">No of rooms</td>

                    <td>{{ item.no_of_rooms }}</td>
                  </tr>

                  <tr class="mb-1">
                    <td class="text-muted">Price per night</td>

                    <td>{{ item.room.price | currencyFormat }} i</td>
                  </tr>

                  <tr class="mb-1">
                    <td class="text-muted">Total price</td>

                    <td>{{ item.total_price | currencyFormat }} i</td>
                  </tr>

                  <tr class="mb-1">
                    <td class="text-muted">Payment type</td>

                    <td class="text-capitalize">{{ item.payment_type }}</td>
                  </tr>

                  <tr class="mb-1">
                    <td class="text-muted">Payment status</td>

                    <td class="text-capitalize">{{ item.payment_status }}</td>
                  </tr>
                  <tr class="mb-1">
                    <td class="text-muted">Amount paid</td>

                    <td>
                      NGN
                      {{
                        item.payment_status == "pending"
                          ? "₦0"
                          : item.total_price | currencyFormat
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

      bookings: [],
      bookingNumber: "",
      rooms: [],
      isFinalizing: true,
      notfound: false,
    };
  },

  methods: {
    findBooking() {
      this.isCheckingBooking = true;
      var data = {
        booking: this.bookingNumber,
      };
      axios
        .post(`/find/bookings/`, data)
        .then((res) => {
          this.isCheckingBooking = false;
          if (res.status === 200) {
            if (res.data.message == "not found") {
              this.notfound = true;
              setTimeout(() => {
                this.notfound = false;
              }, 5000);
            } else {
              this.bookings = res.data;
              this.bookingNumber = "";
            }
          }
        })
        .catch(() => {
          this.isCheckingBooking = false;
        });
    },

    clearInfo() {
      this.bookingNumber = "";
    },
  },
};
</script>

<style scoped lang="scss">
td,
.side_tab {
  font-size: 0.75rem;
}
.date {
  font-size: 0.9rem;
  color: rgba($color: #000000, $alpha: 0.74);
}
.bookingnumber {
  font-size: 0.9rem;
  color: rgba($color: #000000, $alpha: 0.64);
}
</style>