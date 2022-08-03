<!-- plugins para las tablas -->
<script src="https://startbootstrap.github.io/startbootstrap-sb-admin-2/vendor/datatables/jquery.dataTables.min.js"></script>
<script src="https://startbootstrap.github.io/startbootstrap-sb-admin-2/vendor/datatables/dataTables.bootstrap4.min.js"></script>

<script type="text/javascript">
  // Set new default font family and font color to mimic Bootstrap's default styling
Chart.defaults.global.defaultFontFamily = 'Nunito', '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
Chart.defaults.global.defaultFontColor = '#858796';
</script>

<!--script src="https://cdnjs.cloudflare.com/ajax/libs/TableExport/5.2.0/js/tableexport.min.js" integrity="sha512-XmZS54be9JGMZjf+zk61JZaLZyjTRgs41JLSmx5QlIP5F+sSGIyzD2eJyxD4K6kGGr7AsVhaitzZ2WTfzpsQzg==" crossorigin="anonymous" referrerpolicy="no-referrer">
  

</script-->


<?php foreach ($arrayVA as $va): ?>  
  <div class="card shadow mb-4">
      <div class="card-header py-3">
          <h6 class="m-0 font-weight-bold text-primary"><?php echo $va["nom"]; ?></h6>
      </div>
      <div class="card-body">
          <div class="chart-bar">
              <canvas id="chart<?php echo $va["id"]; ?>"></canvas>
          </div>
          <hr>
      </div>
  </div>
  
  

  <script type="text/javascript">
  	// Set new default font family and font color to mimic Bootstrap's default styling
  /*Chart.defaults.global.defaultFontFamily = 'Nunito', '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
  Chart.defaults.global.defaultFontColor = '#858796';*/

  function number_format(number, decimals, dec_point, thousands_sep) {
    // *     example: number_format(1234.56, 2, ',', ' ');
    // *     return: '1 234,56'
    number = (number + '').replace(',', '').replace(' ', '');
    var n = !isFinite(+number) ? 0 : +number,
      prec = !isFinite(+decimals) ? 0 : Math.abs(decimals),
      sep = (typeof thousands_sep === 'undefined') ? ',' : thousands_sep,
      dec = (typeof dec_point === 'undefined') ? '.' : dec_point,
      s = '',
      toFixedFix = function(n, prec) {
        var k = Math.pow(10, prec);
        return '' + Math.round(n * k) / k;
      };
    // Fix for IE parseFloat(0.55).toFixed(0) = 0;
    s = (prec ? toFixedFix(n, prec) : '' + Math.round(n)).split('.');
    if (s[0].length > 3) {
      s[0] = s[0].replace(/\B(?=(?:\d{3})+(?!\d))/g, sep);
    }
    if ((s[1] || '').length < prec) {
      s[1] = s[1] || '';
      s[1] += new Array(prec - s[1].length + 1).join('0');
    }
    return s.join(dec);
  }

  // Bar Chart Example
  var ctx = document.getElementById("chart<?php echo $va["id"]; ?>");
  var chart<?php echo $va["id"]; ?> = new Chart(ctx, {
    type: 'bar',
    data: {
      labels: ["comunicacion_escrita", "razonamiento_cuantitativo", "lectura_critica", "competencias_ciudadanas", "ingles"],
      datasets: [{
        label: "VA: ",
        backgroundColor: "#4e73df",
        hoverBackgroundColor: "#2e59d9",
        borderColor: "#4e73df",
        data: [<?php echo $va["comunicacion_escrita"]["pro"] . ", " . $va["razonamiento_cuantitativo"]["pro"] . ", " . $va["lectura_critica"]["pro"] . ", " . $va["competencias_ciudadanas"]["pro"] . ", " . $va["ingles"]["pro"]; ?>],
      }],
    },
    options: {
      maintainAspectRatio: false,
      layout: {
        padding: {
          left: 10,
          right: 25,
          top: 25,
          bottom: 0
        }
      },
      scales: {
        xAxes: [{
          time: {
            unit: 'month'
          },
          gridLines: {
            display: false,
            drawBorder: false
          },
          ticks: {
            maxTicksLimit: 6
          },
          maxBarThickness: 25,
        }],
        yAxes: [{
          ticks: {
            min: 0,
            max: 100,
            maxTicksLimit: 5,
            padding: 10,
            // Include a dollar sign in the ticks
            callback: function(value, index, values) {
              return '' + number_format(value);
            }
          },
          gridLines: {
            color: "rgb(234, 236, 244)",
            zeroLineColor: "rgb(234, 236, 244)",
            drawBorder: false,
            borderDash: [2],
            zeroLineBorderDash: [2]
          }
        }],
      },
      legend: {
        display: false
      },
      tooltips: {
        titleMarginBottom: 10,
        titleFontColor: '#6e707e',
        titleFontSize: 14,
        backgroundColor: "rgb(255,255,255)",
        bodyFontColor: "#858796",
        borderColor: '#dddfeb',
        borderWidth: 1,
        xPadding: 15,
        yPadding: 15,
        displayColors: false,
        caretPadding: 10,
        callbacks: {
          label: function(tooltipItem, chart) {
            var datasetLabel = chart.datasets[tooltipItem.datasetIndex].label || '';
            return datasetLabel + '' + number_format(tooltipItem.yLabel);
          }
        }
      },
    }
  });

  </script>

     <div class="col-12">
       <div class="card shadow mb-4">
            <!-- Card Header - Dropdown -->
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">comunicacion_escrita</h6>
            </div>
            <!-- Card Body -->
            <div class="card-body text-center row">
                <div class="col-3">
                  <div class="row">
                    <div class="col-12">
                      LENGUAJE
                    </div>
                    <div class="col-12">
                      <canvas id="c1c1<?php echo $va["id"]; ?>"></canvas>
                    </div>
                  </div>
                </div>
                <div class="col-3">
                  <div class="row">
                    <div class="col-12">
                      MATEMATICAS
                    </div>
                    <div class="col-12">
                      <canvas id="c1c2<?php echo $va["id"]; ?>"></canvas>
                    </div>
                  </div>
                </div>
                <div class="col-3">
                  <div class="row">
                    <div class="col-12">
                      SOCIALES
                    </div>
                    <div class="col-12">
                      <canvas id="c1c3<?php echo $va["id"]; ?>"></canvas>
                    </div>
                  </div>
                </div>
                <div class="col-3">
                  <div class="row">
                    <div class="col-12">
                      QUIMICA
                    </div>
                    <div class="col-12">
                      <canvas id="c1c4<?php echo $va["id"]; ?>"></canvas>
                    </div>
                  </div>
                </div>
                <hr>
                <div class="mt-4 col-12 text-center small">
                    <span class="mr-2">
                        <i class="fas fa-circle text-success"></i>Bueno
                    </span>
                    <span class="mr-2">
                        <i class="fas fa-circle text-danger"></i>Malo
                    </span>
                </div>
            </div>
        </div>
        <script type="text/javascript">
          // Pie Chart Example
          var ctx = document.getElementById("c1c1<?php echo $va["id"]; ?>");
          var c1c1<?php echo $va["id"]; ?> = new Chart(ctx, {
            type: 'doughnut',
            data: {
              labels: ["Bueno", "Malo"],
              datasets: [{
                data: [<?php echo round($va["comunicacion_escrita"]["c1"]["bueno"]); ?>, <?php echo round($va["comunicacion_escrita"]["c1"]["malo"]); ?>],
                backgroundColor: ['#1cc88a', '#e74a3b'],
                hoverBackgroundColor: ['#17a673', '#b53c30'],
                hoverBorderColor: "rgba(234, 236, 244, 1)",
              }],
            },
            options: {
              maintainAspectRatio: false,
              tooltips: {
                backgroundColor: "rgb(255,255,255)",
                bodyFontColor: "#858796",
                borderColor: '#dddfeb',
                borderWidth: 1,
                xPadding: 15,
                yPadding: 15,
                displayColors: false,
                caretPadding: 10,
              },
              legend: {
                display: false
              },
              cutoutPercentage: 80,
            },
          });

// Pie Chart Example
          var ctx = document.getElementById("c1c2<?php echo $va["id"]; ?>");
          var c1c2<?php echo $va["id"]; ?> = new Chart(ctx, {
            type: 'doughnut',
            data: {
              labels: ["Bueno", "Malo"],
              datasets: [{
                data: [<?php echo round($va["comunicacion_escrita"]["c2"]["bueno"]); ?>, <?php echo round($va["comunicacion_escrita"]["c2"]["malo"]); ?>],
                backgroundColor: ['#1cc88a', '#e74a3b'],
                hoverBackgroundColor: ['#17a673', '#b53c30'],
                hoverBorderColor: "rgba(234, 236, 244, 1)",
              }],
            },
            options: {
              maintainAspectRatio: false,
              tooltips: {
                backgroundColor: "rgb(255,255,255)",
                bodyFontColor: "#858796",
                borderColor: '#dddfeb',
                borderWidth: 1,
                xPadding: 15,
                yPadding: 15,
                displayColors: false,
                caretPadding: 10,
              },
              legend: {
                display: false
              },
              cutoutPercentage: 80,
            },
          });

          // Pie Chart Example
          var ctx = document.getElementById("c1c3<?php echo $va["id"]; ?>");
          var c1c3<?php echo $va["id"]; ?> = new Chart(ctx, {
            type: 'doughnut',
            data: {
              labels: ["Bueno", "Malo"],
              datasets: [{
                data: [<?php echo round($va["comunicacion_escrita"]["c3"]["bueno"]); ?>, <?php echo round($va["comunicacion_escrita"]["c3"]["malo"]); ?>],
                backgroundColor: ['#1cc88a', '#e74a3b'],
                hoverBackgroundColor: ['#17a673', '#b53c30'],
                hoverBorderColor: "rgba(234, 236, 244, 1)",
              }],
            },
            options: {
              maintainAspectRatio: false,
              tooltips: {
                backgroundColor: "rgb(255,255,255)",
                bodyFontColor: "#858796",
                borderColor: '#dddfeb',
                borderWidth: 1,
                xPadding: 15,
                yPadding: 15,
                displayColors: false,
                caretPadding: 10,
              },
              legend: {
                display: false
              },
              cutoutPercentage: 80,
            },
          });

          // Pie Chart Example
          var ctx = document.getElementById("c1c4<?php echo $va["id"]; ?>");
          var c1c4<?php echo $va["id"]; ?> = new Chart(ctx, {
            type: 'doughnut',
            data: {
              labels: ["Bueno", "Malo"],
              datasets: [{
                data: [<?php echo round($va["comunicacion_escrita"]["c4"]["bueno"]); ?>, <?php echo round($va["comunicacion_escrita"]["c4"]["malo"]); ?>],
                backgroundColor: ['#1cc88a', '#e74a3b'],
                hoverBackgroundColor: ['#17a673', '#b53c30'],
                hoverBorderColor: "rgba(234, 236, 244, 1)",
              }],
            },
            options: {
              maintainAspectRatio: false,
              tooltips: {
                backgroundColor: "rgb(255,255,255)",
                bodyFontColor: "#858796",
                borderColor: '#dddfeb',
                borderWidth: 1,
                xPadding: 15,
                yPadding: 15,
                displayColors: false,
                caretPadding: 10,
              },
              legend: {
                display: false
              },
              cutoutPercentage: 80,
            },
          });


        </script>
     </div>

     <div class="col-12">
       <div class="card shadow mb-4">
            <!-- Card Header - Dropdown -->
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">razonamiento_cuantitativo</h6>
            </div>
            <!-- Card Body -->
            <div class="card-body text-center row">
                <div class="col-3">
                  <div class="row">
                    <div class="col-12">
                      LENGUAJE
                    </div>
                    <div class="col-12">
                      <canvas id="c2c1<?php echo $va["id"]; ?>"></canvas>
                    </div>
                  </div>
                </div>
                <div class="col-3">
                  <div class="row">
                    <div class="col-12">
                      MATEMATICAS
                    </div>
                    <div class="col-12">
                      <canvas id="c2c2<?php echo $va["id"]; ?>"></canvas>
                    </div>
                  </div>
                </div>
                <div class="col-3">
                  <div class="row">
                    <div class="col-12">
                      SOCIALES
                    </div>
                    <div class="col-12">
                      <canvas id="c2c3<?php echo $va["id"]; ?>"></canvas>
                    </div>
                  </div>
                </div>
                <div class="col-3">
                  <div class="row">
                    <div class="col-12">
                      QUIMICA
                    </div>
                    <div class="col-12">
                      <canvas id="c2c4<?php echo $va["id"]; ?>"></canvas>
                    </div>
                  </div>
                </div>
                <hr>
                <div class="mt-4 col-12 text-center small">
                    <span class="mr-2">
                        <i class="fas fa-circle text-success"></i>Bueno
                    </span>
                    <span class="mr-2">
                        <i class="fas fa-circle text-danger"></i>Malo
                    </span>
                </div>
            </div>
        </div>
        <script type="text/javascript">
          // Pie Chart Example
          var ctx = document.getElementById("c2c1<?php echo $va["id"]; ?>");
          var c2c1<?php echo $va["id"]; ?> = new Chart(ctx, {
            type: 'doughnut',
            data: {
              labels: ["Bueno", "Malo"],
              datasets: [{
                data: [<?php echo round($va["razonamiento_cuantitativo"]["c1"]["bueno"]); ?>, <?php echo round($va["razonamiento_cuantitativo"]["c1"]["malo"]); ?>],
                backgroundColor: ['#1cc88a', '#e74a3b'],
                hoverBackgroundColor: ['#17a673', '#b53c30'],
                hoverBorderColor: "rgba(234, 236, 244, 1)",
              }],
            },
            options: {
              maintainAspectRatio: false,
              tooltips: {
                backgroundColor: "rgb(255,255,255)",
                bodyFontColor: "#858796",
                borderColor: '#dddfeb',
                borderWidth: 1,
                xPadding: 15,
                yPadding: 15,
                displayColors: false,
                caretPadding: 10,
              },
              legend: {
                display: false
              },
              cutoutPercentage: 80,
            },
          });

// Pie Chart Example
          var ctx = document.getElementById("c2c2<?php echo $va["id"]; ?>");
          var c2c2<?php echo $va["id"]; ?> = new Chart(ctx, {
            type: 'doughnut',
            data: {
              labels: ["Bueno", "Malo"],
              datasets: [{
                data: [<?php echo round($va["razonamiento_cuantitativo"]["c2"]["bueno"]); ?>, <?php echo round($va["razonamiento_cuantitativo"]["c2"]["malo"]); ?>],
                backgroundColor: ['#1cc88a', '#e74a3b'],
                hoverBackgroundColor: ['#17a673', '#b53c30'],
                hoverBorderColor: "rgba(234, 236, 244, 1)",
              }],
            },
            options: {
              maintainAspectRatio: false,
              tooltips: {
                backgroundColor: "rgb(255,255,255)",
                bodyFontColor: "#858796",
                borderColor: '#dddfeb',
                borderWidth: 1,
                xPadding: 15,
                yPadding: 15,
                displayColors: false,
                caretPadding: 10,
              },
              legend: {
                display: false
              },
              cutoutPercentage: 80,
            },
          });

          // Pie Chart Example
          var ctx = document.getElementById("c2c3<?php echo $va["id"]; ?>");
          var c2c3<?php echo $va["id"]; ?> = new Chart(ctx, {
            type: 'doughnut',
            data: {
              labels: ["Bueno", "Malo"],
              datasets: [{
                data: [<?php echo round($va["razonamiento_cuantitativo"]["c3"]["bueno"]); ?>, <?php echo round($va["razonamiento_cuantitativo"]["c3"]["malo"]); ?>],
                backgroundColor: ['#1cc88a', '#e74a3b'],
                hoverBackgroundColor: ['#17a673', '#b53c30'],
                hoverBorderColor: "rgba(234, 236, 244, 1)",
              }],
            },
            options: {
              maintainAspectRatio: false,
              tooltips: {
                backgroundColor: "rgb(255,255,255)",
                bodyFontColor: "#858796",
                borderColor: '#dddfeb',
                borderWidth: 1,
                xPadding: 15,
                yPadding: 15,
                displayColors: false,
                caretPadding: 10,
              },
              legend: {
                display: false
              },
              cutoutPercentage: 80,
            },
          });

          // Pie Chart Example
          var ctx = document.getElementById("c2c4<?php echo $va["id"]; ?>");
          var c2c4<?php echo $va["id"]; ?> = new Chart(ctx, {
            type: 'doughnut',
            data: {
              labels: ["Bueno", "Malo"],
              datasets: [{
                data: [<?php echo round($va["razonamiento_cuantitativo"]["c4"]["bueno"]); ?>, <?php echo round($va["razonamiento_cuantitativo"]["c4"]["malo"]); ?>],
                backgroundColor: ['#1cc88a', '#e74a3b'],
                hoverBackgroundColor: ['#17a673', '#b53c30'],
                hoverBorderColor: "rgba(234, 236, 244, 1)",
              }],
            },
            options: {
              maintainAspectRatio: false,
              tooltips: {
                backgroundColor: "rgb(255,255,255)",
                bodyFontColor: "#858796",
                borderColor: '#dddfeb',
                borderWidth: 1,
                xPadding: 15,
                yPadding: 15,
                displayColors: false,
                caretPadding: 10,
              },
              legend: {
                display: false
              },
              cutoutPercentage: 80,
            },
          });


        </script>
     </div>

     <div class="col-12">
       <div class="card shadow mb-4">
            <!-- Card Header - Dropdown -->
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">lectura_critica</h6>
            </div>
            <!-- Card Body -->
            <div class="card-body text-center row">
                <div class="col-3">
                  <div class="row">
                    <div class="col-12">
                      LENGUAJE
                    </div>
                    <div class="col-12">
                      <canvas id="c3c1<?php echo $va["id"]; ?>"></canvas>
                    </div>
                  </div>
                </div>
                <div class="col-3">
                  <div class="row">
                    <div class="col-12">
                      MATEMATICAS
                    </div>
                    <div class="col-12">
                      <canvas id="c3c2<?php echo $va["id"]; ?>"></canvas>
                    </div>
                  </div>
                </div>
                <div class="col-3">
                  <div class="row">
                    <div class="col-12">
                      SOCIALES
                    </div>
                    <div class="col-12">
                      <canvas id="c3c3<?php echo $va["id"]; ?>"></canvas>
                    </div>
                  </div>
                </div>
                <div class="col-3">
                  <div class="row">
                    <div class="col-12">
                      QUIMICA
                    </div>
                    <div class="col-12">
                      <canvas id="c3c4<?php echo $va["id"]; ?>"></canvas>
                    </div>
                  </div>
                </div>
                <hr>
                <div class="mt-4 col-12 text-center small">
                    <span class="mr-2">
                        <i class="fas fa-circle text-success"></i>Bueno
                    </span>
                    <span class="mr-2">
                        <i class="fas fa-circle text-danger"></i>Malo
                    </span>
                </div>
            </div>
        </div>
        <script type="text/javascript">
          // Pie Chart Example
          var ctx = document.getElementById("c3c1<?php echo $va["id"]; ?>");
          var c3c1<?php echo $va["id"]; ?> = new Chart(ctx, {
            type: 'doughnut',
            data: {
              labels: ["Bueno", "Malo"],
              datasets: [{
                data: [<?php echo round($va["lectura_critica"]["c1"]["bueno"]); ?>, <?php echo round($va["lectura_critica"]["c1"]["malo"]); ?>],
                backgroundColor: ['#1cc88a', '#e74a3b'],
                hoverBackgroundColor: ['#17a673', '#b53c30'],
                hoverBorderColor: "rgba(234, 236, 244, 1)",
              }],
            },
            options: {
              maintainAspectRatio: false,
              tooltips: {
                backgroundColor: "rgb(255,255,255)",
                bodyFontColor: "#858796",
                borderColor: '#dddfeb',
                borderWidth: 1,
                xPadding: 15,
                yPadding: 15,
                displayColors: false,
                caretPadding: 10,
              },
              legend: {
                display: false
              },
              cutoutPercentage: 80,
            },
          });

// Pie Chart Example
          var ctx = document.getElementById("c3c2<?php echo $va["id"]; ?>");
          var c3c2<?php echo $va["id"]; ?> = new Chart(ctx, {
            type: 'doughnut',
            data: {
              labels: ["Bueno", "Malo"],
              datasets: [{
                data: [<?php echo round($va["lectura_critica"]["c2"]["bueno"]); ?>, <?php echo round($va["lectura_critica"]["c2"]["malo"]); ?>],
                backgroundColor: ['#1cc88a', '#e74a3b'],
                hoverBackgroundColor: ['#17a673', '#b53c30'],
                hoverBorderColor: "rgba(234, 236, 244, 1)",
              }],
            },
            options: {
              maintainAspectRatio: false,
              tooltips: {
                backgroundColor: "rgb(255,255,255)",
                bodyFontColor: "#858796",
                borderColor: '#dddfeb',
                borderWidth: 1,
                xPadding: 15,
                yPadding: 15,
                displayColors: false,
                caretPadding: 10,
              },
              legend: {
                display: false
              },
              cutoutPercentage: 80,
            },
          });

          // Pie Chart Example
          var ctx = document.getElementById("c3c3<?php echo $va["id"]; ?>");
          var c3c3<?php echo $va["id"]; ?> = new Chart(ctx, {
            type: 'doughnut',
            data: {
              labels: ["Bueno", "Malo"],
              datasets: [{
                data: [<?php echo round($va["lectura_critica"]["c3"]["bueno"]); ?>, <?php echo round($va["lectura_critica"]["c3"]["malo"]); ?>],
                backgroundColor: ['#1cc88a', '#e74a3b'],
                hoverBackgroundColor: ['#17a673', '#b53c30'],
                hoverBorderColor: "rgba(234, 236, 244, 1)",
              }],
            },
            options: {
              maintainAspectRatio: false,
              tooltips: {
                backgroundColor: "rgb(255,255,255)",
                bodyFontColor: "#858796",
                borderColor: '#dddfeb',
                borderWidth: 1,
                xPadding: 15,
                yPadding: 15,
                displayColors: false,
                caretPadding: 10,
              },
              legend: {
                display: false
              },
              cutoutPercentage: 80,
            },
          });

          // Pie Chart Example
          var ctx = document.getElementById("c3c4<?php echo $va["id"]; ?>");
          var c3c4<?php echo $va["id"]; ?> = new Chart(ctx, {
            type: 'doughnut',
            data: {
              labels: ["Bueno", "Malo"],
              datasets: [{
                data: [<?php echo round($va["lectura_critica"]["c4"]["bueno"]); ?>, <?php echo round($va["lectura_critica"]["c4"]["malo"]); ?>],
                backgroundColor: ['#1cc88a', '#e74a3b'],
                hoverBackgroundColor: ['#17a673', '#b53c30'],
                hoverBorderColor: "rgba(234, 236, 244, 1)",
              }],
            },
            options: {
              maintainAspectRatio: false,
              tooltips: {
                backgroundColor: "rgb(255,255,255)",
                bodyFontColor: "#858796",
                borderColor: '#dddfeb',
                borderWidth: 1,
                xPadding: 15,
                yPadding: 15,
                displayColors: false,
                caretPadding: 10,
              },
              legend: {
                display: false
              },
              cutoutPercentage: 80,
            },
          });


        </script>
     </div>


     <div class="col-12">
       <div class="card shadow mb-4">
            <!-- Card Header - Dropdown -->
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">competencias_ciudadanas</h6>
            </div>
            <!-- Card Body -->
            <div class="card-body text-center row">
                <div class="col-3">
                  <div class="row">
                    <div class="col-12">
                      LENGUAJE
                    </div>
                    <div class="col-12">
                      <canvas id="c4c1<?php echo $va["id"]; ?>"></canvas>
                    </div>
                  </div>
                </div>
                <div class="col-3">
                  <div class="row">
                    <div class="col-12">
                      MATEMATICAS
                    </div>
                    <div class="col-12">
                      <canvas id="c4c2<?php echo $va["id"]; ?>"></canvas>
                    </div>
                  </div>
                </div>
                <div class="col-3">
                  <div class="row">
                    <div class="col-12">
                      SOCIALES
                    </div>
                    <div class="col-12">
                      <canvas id="c4c3<?php echo $va["id"]; ?>"></canvas>
                    </div>
                  </div>
                </div>
                <div class="col-3">
                  <div class="row">
                    <div class="col-12">
                      QUIMICA
                    </div>
                    <div class="col-12">
                      <canvas id="c4c4<?php echo $va["id"]; ?>"></canvas>
                    </div>
                  </div>
                </div>
                <hr>
                <div class="mt-4 col-12 text-center small">
                    <span class="mr-2">
                        <i class="fas fa-circle text-success"></i>Bueno
                    </span>
                    <span class="mr-2">
                        <i class="fas fa-circle text-danger"></i>Malo
                    </span>
                </div>
            </div>
        </div>
        <script type="text/javascript">
          // Pie Chart Example
          var ctx = document.getElementById("c4c1<?php echo $va["id"]; ?>");
          var c4c1<?php echo $va["id"]; ?> = new Chart(ctx, {
            type: 'doughnut',
            data: {
              labels: ["Bueno", "Malo"],
              datasets: [{
                data: [<?php echo round($va["competencias_ciudadanas"]["c1"]["bueno"]); ?>, <?php echo round($va["competencias_ciudadanas"]["c1"]["malo"]); ?>],
                backgroundColor: ['#1cc88a', '#e74a3b'],
                hoverBackgroundColor: ['#17a673', '#b53c30'],
                hoverBorderColor: "rgba(234, 236, 244, 1)",
              }],
            },
            options: {
              maintainAspectRatio: false,
              tooltips: {
                backgroundColor: "rgb(255,255,255)",
                bodyFontColor: "#858796",
                borderColor: '#dddfeb',
                borderWidth: 1,
                xPadding: 15,
                yPadding: 15,
                displayColors: false,
                caretPadding: 10,
              },
              legend: {
                display: false
              },
              cutoutPercentage: 80,
            },
          });

// Pie Chart Example
          var ctx = document.getElementById("c4c2<?php echo $va["id"]; ?>");
          var c4c2<?php echo $va["id"]; ?> = new Chart(ctx, {
            type: 'doughnut',
            data: {
              labels: ["Bueno", "Malo"],
              datasets: [{
                data: [<?php echo round($va["competencias_ciudadanas"]["c2"]["bueno"]); ?>, <?php echo round($va["competencias_ciudadanas"]["c2"]["malo"]); ?>],
                backgroundColor: ['#1cc88a', '#e74a3b'],
                hoverBackgroundColor: ['#17a673', '#b53c30'],
                hoverBorderColor: "rgba(234, 236, 244, 1)",
              }],
            },
            options: {
              maintainAspectRatio: false,
              tooltips: {
                backgroundColor: "rgb(255,255,255)",
                bodyFontColor: "#858796",
                borderColor: '#dddfeb',
                borderWidth: 1,
                xPadding: 15,
                yPadding: 15,
                displayColors: false,
                caretPadding: 10,
              },
              legend: {
                display: false
              },
              cutoutPercentage: 80,
            },
          });

          // Pie Chart Example
          var ctx = document.getElementById("c4c3<?php echo $va["id"]; ?>");
          var c4c3<?php echo $va["id"]; ?> = new Chart(ctx, {
            type: 'doughnut',
            data: {
              labels: ["Bueno", "Malo"],
              datasets: [{
                data: [<?php echo round($va["competencias_ciudadanas"]["c3"]["bueno"]); ?>, <?php echo round($va["competencias_ciudadanas"]["c3"]["malo"]); ?>],
                backgroundColor: ['#1cc88a', '#e74a3b'],
                hoverBackgroundColor: ['#17a673', '#b53c30'],
                hoverBorderColor: "rgba(234, 236, 244, 1)",
              }],
            },
            options: {
              maintainAspectRatio: false,
              tooltips: {
                backgroundColor: "rgb(255,255,255)",
                bodyFontColor: "#858796",
                borderColor: '#dddfeb',
                borderWidth: 1,
                xPadding: 15,
                yPadding: 15,
                displayColors: false,
                caretPadding: 10,
              },
              legend: {
                display: false
              },
              cutoutPercentage: 80,
            },
          });

          // Pie Chart Example
          var ctx = document.getElementById("c4c4<?php echo $va["id"]; ?>");
          var c4c4<?php echo $va["id"]; ?> = new Chart(ctx, {
            type: 'doughnut',
            data: {
              labels: ["Bueno", "Malo"],
              datasets: [{
                data: [<?php echo round($va["competencias_ciudadanas"]["c4"]["bueno"]); ?>, <?php echo round($va["competencias_ciudadanas"]["c4"]["malo"]); ?>],
                backgroundColor: ['#1cc88a', '#e74a3b'],
                hoverBackgroundColor: ['#17a673', '#b53c30'],
                hoverBorderColor: "rgba(234, 236, 244, 1)",
              }],
            },
            options: {
              maintainAspectRatio: false,
              tooltips: {
                backgroundColor: "rgb(255,255,255)",
                bodyFontColor: "#858796",
                borderColor: '#dddfeb',
                borderWidth: 1,
                xPadding: 15,
                yPadding: 15,
                displayColors: false,
                caretPadding: 10,
              },
              legend: {
                display: false
              },
              cutoutPercentage: 80,
            },
          });


        </script>
     </div>

     <div class="col-12">
       <div class="card shadow mb-4">
            <!-- Card Header - Dropdown -->
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">ingles</h6>
            </div>
            <!-- Card Body -->
            <div class="card-body text-center row">
              <div class="col-12">
                <div class="">
                    <canvas id="c5<?php echo $va["id"]; ?>"></canvas>
                </div>
              </div>
                <hr>
                <div class="mt-4 col-12 text-center small">
                    <span class="mr-2">
                        <i class="fas fa-circle text-success"></i>Bueno
                    </span>
                    <span class="mr-2">
                        <i class="fas fa-circle text-danger"></i>Malo
                    </span>
                </div>
            </div>
        </div>
        <script type="text/javascript">

          // Pie Chart Example
          var ctx = document.getElementById("c5<?php echo $va["id"]; ?>");
          var c5<?php echo $va["id"]; ?> = new Chart(ctx, {
            type: 'doughnut',
            data: {
              labels: ["Bueno", "Malo"],
              datasets: [{
                data: [<?php echo round($va["ingles"]["c5"]["bueno"]); ?>, <?php echo round($va["ingles"]["c5"]["malo"]); ?>],
                backgroundColor: ['#1cc88a', '#e74a3b'],
                hoverBackgroundColor: ['#17a673', '#b53c30'],
                hoverBorderColor: "rgba(234, 236, 244, 1)",
              }],
            },
            options: {
              maintainAspectRatio: false,
              tooltips: {
                backgroundColor: "rgb(255,255,255)",
                bodyFontColor: "#858796",
                borderColor: '#dddfeb',
                borderWidth: 1,
                xPadding: 15,
                yPadding: 15,
                displayColors: false,
                caretPadding: 10,
              },
              legend: {
                display: false
              },
              cutoutPercentage: 80,
            },
          });

        </script>
     </div>
   </div>

   <div class="col-12">
       <div class="card shadow mb-4">
            <!-- Card Header - Dropdown -->
            <div class="card-header py-3">
                <div class="row">
                  <div class="col">
                    <h5 class="card-title">Resultados</h5>
                  </div>
                  <div class="col-auto">
                    <button onclick="exel('<?php echo $va["id"] ?>', '<?php echo $va["nom"] ?>')" class="btn shadow btn-success btn-sm">Descargar Informe</button>
                  </div>
                </div>
            </div>
            <!-- Card Body -->
            <div class="card-body">
              <div class="card-body">
                  <div class="table-responsive">
                      <table class="table table-sm table-responsive table-bordered" id="tabla<?php echo $va["id"] ?>" width="100%" cellspacing="0">
                          <thead>
                              <tr>
                                  <th colspan="9">Prueba</th>
                                  <th colspan="9">comunicacion_escrita</th>
                                  <th colspan="9">razonamiento_cuantitativo</th>
                                  <th colspan="9">lectura_critica</th>
                                  <th colspan="9">competencias_ciudadanas</th>
                                  <th colspan="4">ingles</th>
                              </tr>
                              <tr>
                                  <!-- Prueba -->
                                  <th>A.C ICFES</th>
                                  <th><?php echo $va["nom"]; ?></th>
                                  <th>NO. C.C.</th>
                                  <th>NOMBRE Y APELLIDOS</th>
                                  <th>PROGRAMA</th>
                                  <th>LENGUAJE</th>
                                  <th>MATEMATICAS</th>
                                  <th>SOCIALES</th>
                                  <th>QUIMICA</th>
                                  <!-- FIN Prueba -->
                                  <!-- comunicacion_escrita -->
                                  <th><?php echo $va["nom"]; ?></th>
                                  <th>Valor esperado Lenguaje</th>
                                  <th>Valor esperado Matematicas</th>
                                  <th>Valor esperado Sociales</th>
                                  <th>Valor esperado Quimica</th>
                                  <th>VA o Residuo lenguaje</th>
                                  <th>VA o Residuo Matematicas</th>
                                  <th>VA o Residuo Sociales</th>
                                  <th>VA o Residuo Quimica</th>
                                  <!-- FIN comunicacion_escrita -->
                                  <!-- comunicacion_escrita -->
                                  <th><?php echo $va["nom"]; ?></th>
                                  <th>Valor esperado Lenguaje</th>
                                  <th>Valor esperado Matematicas</th>
                                  <th>Valor esperado Sociales</th>
                                  <th>Valor esperado Quimica</th>
                                  <th>VA o Residuo lenguaje</th>
                                  <th>VA o Residuo Matematicas</th>
                                  <th>VA o Residuo Sociales</th>
                                  <th>VA o Residuo Quimica</th>
                                  <!-- FIN comunicacion_escrita -->
                                  <!-- comunicacion_escrita -->
                                  <th><?php echo $va["nom"]; ?></th>
                                  <th>Valor esperado Lenguaje</th>
                                  <th>Valor esperado Matematicas</th>
                                  <th>Valor esperado Sociales</th>
                                  <th>Valor esperado Quimica</th>
                                  <th>VA o Residuo lenguaje</th>
                                  <th>VA o Residuo Matematicas</th>
                                  <th>VA o Residuo Sociales</th>
                                  <th>VA o Residuo Quimica</th>
                                  <!-- FIN comunicacion_escrita -->
                                  <!-- comunicacion_escrita -->
                                  <th><?php echo $va["nom"]; ?></th>
                                  <th>Valor esperado Lenguaje</th>
                                  <th>Valor esperado Matematicas</th>
                                  <th>Valor esperado Sociales</th>
                                  <th>Valor esperado Quimica</th>
                                  <th>VA o Residuo lenguaje</th>
                                  <th>VA o Residuo Matematicas</th>
                                  <th>VA o Residuo Sociales</th>
                                  <th>VA o Residuo Quimica</th>
                                  <!-- FIN comunicacion_escrita -->
                                  <!-- comunicacion_escrita -->
                                  <th>ICFES</th>
                                  <th><?php echo $va["nom"]; ?></th>
                                  <th>VALOR ESPERADO</th>
                                  <th>RESIDUO O VALOR AGREGADO</th>
                                  <!-- FIN comunicacion_escrita -->
                              </tr>
                          </thead>
                          <tfoot>
                              <tr>
                                  <!-- Prueba -->
                                  <th>A.C ICFES</th>
                                  <th><?php echo $va["nom"]; ?></th>
                                  <th>NO. C.C.</th>
                                  <th>NOMBRE Y APELLIDOS</th>
                                  <th>PROGRAMA</th>
                                  <th>LENGUAJE</th>
                                  <th>MATEMATICAS</th>
                                  <th>SOCIALES</th>
                                  <th>QUIMICA</th>
                                  <!-- FIN Prueba -->
                                  <!-- comunicacion_escrita -->
                                  <th><?php echo $va["nom"]; ?></th>
                                  <th>Valor esperado Lenguaje</th>
                                  <th>Valor esperado Matematicas</th>
                                  <th>Valor esperado Sociales</th>
                                  <th>Valor esperado Quimica</th>
                                  <th>VA o Residuo lenguaje</th>
                                  <th>VA o Residuo Matematicas</th>
                                  <th>VA o Residuo Sociales</th>
                                  <th>VA o Residuo Quimica</th>
                                  <!-- FIN comunicacion_escrita -->
                                  <!-- comunicacion_escrita -->
                                  <th><?php echo $va["nom"]; ?></th>
                                  <th>Valor esperado Lenguaje</th>
                                  <th>Valor esperado Matematicas</th>
                                  <th>Valor esperado Sociales</th>
                                  <th>Valor esperado Quimica</th>
                                  <th>VA o Residuo lenguaje</th>
                                  <th>VA o Residuo Matematicas</th>
                                  <th>VA o Residuo Sociales</th>
                                  <th>VA o Residuo Quimica</th>
                                  <!-- FIN comunicacion_escrita -->
                                  <!-- comunicacion_escrita -->
                                  <th><?php echo $va["nom"]; ?></th>
                                  <th>Valor esperado Lenguaje</th>
                                  <th>Valor esperado Matematicas</th>
                                  <th>Valor esperado Sociales</th>
                                  <th>Valor esperado Quimica</th>
                                  <th>VA o Residuo lenguaje</th>
                                  <th>VA o Residuo Matematicas</th>
                                  <th>VA o Residuo Sociales</th>
                                  <th>VA o Residuo Quimica</th>
                                  <!-- FIN comunicacion_escrita -->
                                  <!-- comunicacion_escrita -->
                                  <th><?php echo $va["nom"]; ?></th>
                                  <th>Valor esperado Lenguaje</th>
                                  <th>Valor esperado Matematicas</th>
                                  <th>Valor esperado Sociales</th>
                                  <th>Valor esperado Quimica</th>
                                  <th>VA o Residuo lenguaje</th>
                                  <th>VA o Residuo Matematicas</th>
                                  <th>VA o Residuo Sociales</th>
                                  <th>VA o Residuo Quimica</th>
                                  <!-- FIN comunicacion_escrita -->
                                  <!-- comunicacion_escrita -->
                                  <th>ICFES</th>
                                  <th><?php echo $va["nom"]; ?></th>
                                  <th>VALOR ESPERADO</th>
                                  <th>RESIDUO O VALOR AGREGADO</th>
                                  <!-- FIN comunicacion_escrita -->
                              </tr>
                          </tfoot>
                          <tbody>
                            <?php for ($i=0; $i < count($va["est"]); $i++): ?>
                              <tr>
                                  <!-- Prueba -->
                                  <td><?php echo $va["saber"]["re"][$i]; ?></td>
                                  <td><?php echo $va["prueba"]["re"][$i]; ?></td>
                                  <td><?php echo $va["est"][$i]["cc"]; ?></td>
                                  <td ><?php echo utf8_decode(utf8_decode($va["est"][$i]["nom"])); ?></td>
                                  <td><?php echo $va["est"][$i]["programa"]; ?></td>
                                  <td><?php echo $va["saber"]["c1"][$i]; ?></td>
                                  <td><?php echo $va["saber"]["c2"][$i]; ?></td>
                                  <td><?php echo $va["saber"]["c3"][$i]; ?></td>
                                  <td><?php echo $va["saber"]["c4"][$i]; ?></td>
                                  <!-- FIN Prueba -->
                                  <!-- comunicacion_escrita -->
                                  <td><?php echo $va["prueba"]["c1"][$i]; ?></td>
                                  <td><?php echo round($va["comunicacion_escrita"]["c1"]["ve"][$i]); ?></td>
                                  <td><?php echo round($va["comunicacion_escrita"]["c2"]["ve"][$i]); ?></td>
                                  <td><?php echo round($va["comunicacion_escrita"]["c3"]["ve"][$i]); ?></td>
                                  <td><?php echo round($va["comunicacion_escrita"]["c4"]["ve"][$i]); ?></td>
                                  <td><?php echo round($va["comunicacion_escrita"]["c1"]["va"][$i]); ?></td>
                                  <td><?php echo round($va["comunicacion_escrita"]["c2"]["va"][$i]); ?></td>
                                  <td><?php echo round($va["comunicacion_escrita"]["c3"]["va"][$i]); ?></td>
                                  <td><?php echo round($va["comunicacion_escrita"]["c4"]["va"][$i]); ?></td>
                                  <!-- FIN comunicacion_escrita -->
                                  <!-- razonamiento_cuantitativo -->
                                  <td><?php echo $va["prueba"]["c2"][$i]; ?></td>
                                  <td><?php echo round($va["razonamiento_cuantitativo"]["c1"]["ve"][$i]); ?></td>
                                  <td><?php echo round($va["razonamiento_cuantitativo"]["c2"]["ve"][$i]); ?></td>
                                  <td><?php echo round($va["razonamiento_cuantitativo"]["c3"]["ve"][$i]); ?></td>
                                  <td><?php echo round($va["razonamiento_cuantitativo"]["c4"]["ve"][$i]); ?></td>
                                  <td><?php echo round($va["razonamiento_cuantitativo"]["c1"]["va"][$i]); ?></td>
                                  <td><?php echo round($va["razonamiento_cuantitativo"]["c2"]["va"][$i]); ?></td>
                                  <td><?php echo round($va["razonamiento_cuantitativo"]["c3"]["va"][$i]); ?></td>
                                  <td><?php echo round($va["razonamiento_cuantitativo"]["c4"]["va"][$i]); ?></td>
                                  <!-- FIN razonamiento_cuantitativo -->
                                  <!-- lectura_critica  -->
                                  <td><?php echo $va["prueba"]["c3"][$i]; ?></td>
                                  <td><?php echo round($va["lectura_critica"]["c1"]["ve"][$i]); ?></td>
                                  <td><?php echo round($va["lectura_critica"]["c2"]["ve"][$i]); ?></td>
                                  <td><?php echo round($va["lectura_critica"]["c3"]["ve"][$i]); ?></td>
                                  <td><?php echo round($va["lectura_critica"]["c4"]["ve"][$i]); ?></td>
                                  <td><?php echo round($va["lectura_critica"]["c1"]["va"][$i]); ?></td>
                                  <td><?php echo round($va["lectura_critica"]["c2"]["va"][$i]); ?></td>
                                  <td><?php echo round($va["lectura_critica"]["c3"]["va"][$i]); ?></td>
                                  <td><?php echo round($va["lectura_critica"]["c4"]["va"][$i]); ?></td>
                                  <!-- FIN lectura_critica  -->
                                  <!-- competencias_ciudadanas -->
                                  <td><?php echo $va["prueba"]["c4"][$i]; ?></td>
                                  <td><?php echo round($va["competencias_ciudadanas"]["c1"]["ve"][$i]); ?></td>
                                  <td><?php echo round($va["competencias_ciudadanas"]["c2"]["ve"][$i]); ?></td>
                                  <td><?php echo round($va["competencias_ciudadanas"]["c3"]["ve"][$i]); ?></td>
                                  <td><?php echo round($va["competencias_ciudadanas"]["c4"]["ve"][$i]); ?></td>
                                  <td><?php echo round($va["competencias_ciudadanas"]["c1"]["va"][$i]); ?></td>
                                  <td><?php echo round($va["competencias_ciudadanas"]["c2"]["va"][$i]); ?></td>
                                  <td><?php echo round($va["competencias_ciudadanas"]["c3"]["va"][$i]); ?></td>
                                  <td><?php echo round($va["competencias_ciudadanas"]["c4"]["va"][$i]); ?></td>
                                  <!-- FIN competencias_ciudadanas -->
                                  <!-- comunicacion_escrita -->
                                  <td><?php echo $va["saber"]["c5"][$i]; ?></td>
                                  <td><?php echo $va["prueba"]["c5"][$i]; ?></td>
                                  <td><?php echo round($va["ingles"]["c5"]["ve"][$i]); ?></td>
                                  <td><?php echo round($va["ingles"]["c5"]["va"][$i]); ?></td>
                                  <!-- FIN comunicacion_escrita -->
                              </tr>
                            <?php endfor; ?>
                          </tbody>
                      </table>
                  </div>
              </div>
            </div>
        </div>
    </div>

<script type="text/javascript">
  // Call the dataTables jQuery plugin
$(document).ready(function() {
  $('#tabla<?php echo $va["id"] ?>').DataTable();
});

</script>
   
<?php endforeach;?>

<script type="text/javascript">
  function exel(id, nom) {
    let tabla = document.getElementById("tabla"+id);
    let tableExport = new TableExport(tabla, {
        exportButtons: false, // No queremos botones
        filename: nom+id, //Nombre del archivo de Excel
        sheetname: nom, //Título de la hoja
    });
    let datos = tableExport.getExportData();
    //console.log(datos["tabla"+id]);
    let preferenciasDocumento = datos["tabla"+id].xlsx;
    tableExport.export2file(preferenciasDocumento.data, preferenciasDocumento.mimeType, preferenciasDocumento.filename, preferenciasDocumento.fileExtension, preferenciasDocumento.merges, preferenciasDocumento.RTL, preferenciasDocumento.sheetname);
  }
</script>

<script type="text/javascript" src="https://unpkg.com/xlsx@0.18.5/dist/xlsx.full.min.js"></script>
<script type="text/javascript" src="https://unpkg.com/file-saverjs@1.3.6/FileSaver.min.js"></script>
<script type="text/javascript" src="https://unpkg.com/tableexport@5.2.0/dist/js/tableexport.min.js"></script>