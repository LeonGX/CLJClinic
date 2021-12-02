// Set new default font family and font color to mimic Bootstrap's default styling
(Chart.defaults.global.defaultFontFamily = "Nunito"),
  '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
Chart.defaults.global.defaultFontColor = "#858796";

// Pie Chart Example

$(document).ready(function () {
  $.ajax({
    url: "database/getPatientsByBlood.php",
    method: "GET",
    success: function (data) {
      const info = JSON.parse(data);
      var apos = info[0].apos;
      var aneg = info[0].aneg;
      var opos = info[0].opos;
      var oneg = info[0].oneg;
      var bpos = info[0].bpos;
      var bneg = info[0].bneg;
      var abpos = info[0].abpos;
      var abneg = info[0].abneg;
      var ctx = document.getElementById("blood-chart");
      var myPieChart = new Chart(ctx, {
        type: "doughnut",
        data: {
          labels: ["A+", "A-", "O+", "O-", "B+", "B-", "AB+", "AB-"],
          datasets: [
            {
              data: [apos, aneg, opos, oneg, bpos, bneg, abpos, abneg],
              backgroundColor: [
                "#FF1616",
                "#FF751B",
                "#FFD528",
                "#99FF20",
                "#24FF19",
                "#23FF91",
                "#16F1FF",
                "#215DFF",
              ],
              hoverBackgroundColor: [
                "#C91414",
                "#C25914",
                "#BF9F1C",
                "#71BA1A",
                "#1FB617",
                "#1CBE6D",
                "#11B5BF",
                "#1E47B6",
              ],
              hoverBorderColor: "rgba(234, 236, 244, 1)",
            },
          ],
        },
        options: {
          maintainAspectRatio: false,
          tooltips: {
            backgroundColor: "rgb(255,255,255)",
            bodyFontColor: "#858796",
            borderColor: "#dddfeb",
            borderWidth: 1,
            xPadding: 15,
            yPadding: 15,
            displayColors: false,
            caretPadding: 10,
          },
          legend: {
            display: false,
          },
          cutoutPercentage: 80,
        },
      });
    },
  });
});
