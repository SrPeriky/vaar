<script type="text/javascript">
  // Set new default font family and font color to mimic Bootstrap's default styling
Chart.defaults.global.defaultFontFamily = 'Nunito', '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
Chart.defaults.global.defaultFontColor = '#858796';
</script>

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
        data: [<?php echo (intval($va["comunicacion_escrita"]["bueno"])*100)/intval($va["comunicacion_escrita"]["total"]) ?>, <?php echo (intval($va["razonamiento_cuantitativo"]["bueno"])*100)/intval($va["razonamiento_cuantitativo"]["total"]) ?>, <?php echo (intval($va["lectura_critica"]["bueno"])*100)/intval($va["lectura_critica"]["total"]) ?>, <?php echo (intval($va["competencias_ciudadanas"]["bueno"])*100)/intval($va["competencias_ciudadanas"]["total"]) ?>, <?php echo (intval($va["ingles"]["bueno"])*100)/intval($va["ingles"]["total"]) ?>],
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


   <div class="row text-center">
     <div class="col-6">
       <div class="card shadow mb-4">
            <!-- Card Header - Dropdown -->
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">comunicacion_escrita</h6>
            </div>
            <!-- Card Body -->
            <div class="card-body">
                <div class="chart-pie pt-4">
                    <canvas id="t1<?php echo $va["id"]; ?>"></canvas>
                </div>
                <hr>
                <div class="mt-4 text-center small">
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
          var ctx = document.getElementById("t1<?php echo $va["id"]; ?>");
          var t1<?php echo $va["id"]; ?> = new Chart(ctx, {
            type: 'doughnut',
            data: {
              labels: ["Bueno", "Malo"],
              datasets: [{
                data: [<?php echo ((intval($va["comunicacion_escrita"]["bueno"])*100)/intval($va["comunicacion_escrita"]["total"]));?>, <?php echo ((intval($va["comunicacion_escrita"]["bueno"])*100)/intval($va["comunicacion_escrita"]["total"]))-100;?>],
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
     <div class="col-6">
       <div class="card shadow mb-4">
            <!-- Card Header - Dropdown -->
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">razonamiento_cuantitativo</h6>
            </div>
            <!-- Card Body -->
            <div class="card-body">
                <div class="chart-pie pt-4">
                    <canvas id="t2<?php echo $va["id"]; ?>"></canvas>
                </div>
                <hr>
                <div class="mt-4 text-center small">
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
          var ctx = document.getElementById("t2<?php echo $va["id"]; ?>");
          var t2<?php echo $va["id"]; ?> = new Chart(ctx, {
            type: 'doughnut',
            data: {
              labels: ["Bueno", "Malo"],
              datasets: [{
                data: [<?php echo ((intval($va["razonamiento_cuantitativo"]["bueno"])*100)/intval($va["razonamiento_cuantitativo"]["total"]));?>, <?php echo ((intval($va["razonamiento_cuantitativo"]["bueno"])*100)/intval($va["razonamiento_cuantitativo"]["total"]))-100;?>],
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
     <div class="col-4">
       <div class="card shadow mb-4">
            <!-- Card Header - Dropdown -->
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">lectura_critica</h6>
            </div>
            <!-- Card Body -->
            <div class="card-body">
                <div class="chart-pie pt-4">
                    <canvas id="t3<?php echo $va["id"]; ?>"></canvas>
                </div>
                <hr>
                <div class="mt-4 text-center small">
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
          var ctx = document.getElementById("t3<?php echo $va["id"]; ?>");
          var t3<?php echo $va["id"]; ?> = new Chart(ctx, {
            type: 'doughnut',
            data: {
              labels: ["Bueno", "Malo"],
              datasets: [{
                data: [<?php echo ((intval($va["comunicacion_escrita"]["bueno"])*100)/intval($va["comunicacion_escrita"]["total"]));?>, <?php echo ((intval($va["comunicacion_escrita"]["bueno"])*100)/intval($va["comunicacion_escrita"]["total"]))-100;?>],
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
     <div class="col-4">
       <div class="card shadow mb-4">
            <!-- Card Header - Dropdown -->
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">competencias_ciudadanas</h6>
            </div>
            <!-- Card Body -->
            <div class="card-body">
                <div class="chart-pie pt-4">
                    <canvas id="t4<?php echo $va["id"]; ?>"></canvas>
                </div>
                <hr>
                <div class="mt-4 text-center small">
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
          var ctx = document.getElementById("t4<?php echo $va["id"]; ?>");
          var t4<?php echo $va["id"]; ?> = new Chart(ctx, {
            type: 'doughnut',
            data: {
              labels: ["Bueno", "Malo"],
              datasets: [{
                data: [<?php echo ((intval($va["comunicacion_escrita"]["bueno"])*100)/intval($va["comunicacion_escrita"]["total"]));?>, <?php echo ((intval($va["comunicacion_escrita"]["bueno"])*100)/intval($va["comunicacion_escrita"]["total"]))-100;?>],
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
     <div class="col-4">
       <div class="card shadow mb-4">
            <!-- Card Header - Dropdown -->
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">ingles</h6>
            </div>
            <!-- Card Body -->
            <div class="card-body">
                <div class="chart-pie pt-4">
                    <canvas id="t5<?php echo $va["id"]; ?>"></canvas>
                </div>
                <hr>
                <div class="mt-4 text-center small">
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
          var ctx = document.getElementById("t5<?php echo $va["id"]; ?>");
          var t5<?php echo $va["id"]; ?> = new Chart(ctx, {
            type: 'doughnut',
            data: {
              labels: ["Bueno", "Malo"],
              datasets: [{
                data: [<?php echo ((intval($va["ingles"]["bueno"])*100)/intval($va["ingles"]["total"]));?>, <?php echo ((intval($va["ingles"]["bueno"])*100)/intval($va["ingles"]["total"]))-100;?>],
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
<?php endforeach;?>