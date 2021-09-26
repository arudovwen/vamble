var currentDate = moment();
var weekStart = currentDate.clone().startOf("week");
var weekEnd = currentDate.clone().endOf("week");

var days = [];
var i;
for (i = 0; i <= 6; i++) {
    days.push(
        moment(weekStart)
            .add(i, "days")
            .format("MMMM Do,dddd")
    );
}

export const revenueChartData = {
    type: "line",
    data: {
        labels: days,
        datasets: [
            {
                label: "Weekly Revenue report",
                data: [0, 0, 1, 2, 9, 8, 7, 14],
                backgroundColor: "rgba(71, 183,132,.5)",
                borderColor: "#47b784",
                borderWidth: 3
            }
        ]
    },
    options: {
        responsive: true,
        lineTension: 1,
        scales: {
            yAxes: [
                {
                    ticks: {
                        beginAtZero: true,
                        padding: 25
                    }
                }
            ]
        }
    }
};

export default revenueChartData;
