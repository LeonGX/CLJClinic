// Set new default font family and font color to mimic Bootstrap's default styling
(Chart.defaults.global.defaultFontFamily = "Nunito"),
  '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
Chart.defaults.global.defaultFontColor = "#858796";

// Pie Chart Example

$(document).ready(function () {
  $.ajax({
    url: "database/getPatientsByGender.php",
    method: "GET",
    success: function (data) {
      const info = JSON.parse(data)
      var women = info[0].women;
      var men = info[0].men;
      var ctx = document.getElementById("gender-chart");
      var myPieChart = new Chart(ctx, {
        type: "doughnut",
        data: {
          labels: ["Mujeres","Hombres"],
          datasets: [
            {
              data: [women,men],
              backgroundColor: ["#F47DBB",  '#194260',],
              hoverBackgroundColor: ["#D94496", "#0A2C47"],
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
        }
      })
    },
  });

});
