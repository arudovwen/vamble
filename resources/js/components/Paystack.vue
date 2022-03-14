<template>
  <paystack
    :amount="amount * 100"
    :email="detail.email"
    :paystackkey="paystackkey"
    :reference="reference"
    :callback="callback"
    :close="close"
    :embed="false"
  >
    <i class="fas fa-money-bill-alt"></i>
    Make Payment
  </paystack>
</template>

<script type="text/javascript">
import paystack from "vue-paystack";
export default {
  components: {
    paystack,
  },
  props: ["detail", "amount",'price_per_night'],
  data() {
    return {
      paystackkey: "pk_live_592ef33267d46bcf3b3b6cb8bf092059ab47bd48", //paystack public key
    };
  },
  computed: {
    reference() {
      let text = "";
      let possible =
        "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789";

      for (let i = 0; i < 10; i++)
        text += possible.charAt(Math.floor(Math.random() * possible.length));

      return text;
    },
  },
  methods: {
    callback: function (response) {

      this.$props.detail.response = response;
      this.$props.detail.total_price = this.$props.amount;
      this.$props.detail.price_per_night = this.price_per_night;
      axios
        .post("/transactions/add", this.$props.detail)
        .then((res) => {
          if (res.status === 200) {
            if (res.data.status === "success") {
              this.$emit("paymentsuccessful", res);
            }
          }
        });
    },
    close: function () {
      console.log("Payment closed");
    },
  },
};
</script>