<template>
  <div>
    <canvas id="customer-chart"></canvas>
  </div>
</template>

<script>
import Chart from "chart.js";

export default {
  name: "customerChart",
  props: ["customers"],
  data() {
    return {
      days: [],
      customerChartData: {},
    };
  },
  created() {},
  mounted() {
    var currentDate = this.$moment();
    var weekStart = currentDate.clone().startOf("week");
    var weekEnd = currentDate.clone().endOf("week");

    var i;
    for (i = 0; i <= 6; i++) {
      this.days.push(
        this.$moment(weekStart).add(i, "days").format("YYYY-MM-DD")
      );
    }
    this.handleChart();
  },
  watch: {
    userdata: "handleChart",
  },
  methods: {
    handleChart() {
      this.customerChartData = {
        type: "line",

        data: {
          labels: this.days,
          datasets: [
            {
              label: "Weekly Reservations report",
              data: this.userdata,
              backgroundColor: "rgba(116, 84, 18, 0.54)",
              borderColor: "#fffacc",
              borderWidth: 3,
            },
          ],
        },
        options: {
          responsive: true,
          lineTension: 1,
          scales: {
            yAxes: [
              {
                ticks: {
                  beginAtZero: true,
                  padding: 25,
                },
              },
            ],
          },
        },
      };
      const ctx = document.getElementById("customer-chart");
      new Chart(ctx, this.customerChartData);
    },
  },
  computed: {
    mappeddata() {
      return this.$props.customers.map((item) =>
        this.$moment(item.created_at).format("YYYY-MM-DD")
      );
    },
    userdata() {
      return this.days.map((item) => {
        var result = this.mappeddata.filter((val) => {
          if (this.$moment(item).isSame(val)) {
            return val;
          }
        });
        return result.length;
      });
    },
  },
};
</script>