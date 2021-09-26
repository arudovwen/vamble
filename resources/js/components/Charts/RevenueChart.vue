<template>
  <div>
    <canvas id="revenue-chart"></canvas>
  </div>
</template>

<script>
import Chart from "chart.js";
import revenueChartData from "./Revenue";

export default {
  name: "revenueChart",
  data() {
    return {
      revenueChartData: revenueChartData,
    };
  },
  mounted() {
    const ctx = document.getElementById("revenue-chart");
    new Chart(ctx, this.revenueChartData);
  },
};
</script>