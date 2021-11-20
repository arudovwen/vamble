<template>
  <paystack
    :amount="detail.amount * 100"
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
  props: ["detail", "amount"],
  data() {
    return {
      paystackkey: "pk_test_xxxxxxxxxxxxxxxxxxxxxxx", //paystack public key
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
      console.log(response);
      axios
        .post("http://localhost:8000/transactions/add", this.$props.detail)
        .then((res) => {
          if (res.status === 200) {
            if (res.data.status === "success") {
              this.$emit("paymentsuccessful", response);
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