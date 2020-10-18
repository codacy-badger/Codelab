<?php
$clAjax = true;
include('../../../../../codelab.php');
?>
<h1>Dashboard</h1>
<div class="panelInner">
    <div class="widgets">
        <div class="widget">
            <div class="name">
                System info
            </div>
            <div class="content">
                <div class="box">
                    <ul>
                        <li><span>System:</span> SPF</li>
                        <li><span>Codename:</span> <?php echo clCodename; ?></li>
                        <li>
                            <span>Version:</span> <?php echo clVersion; ?>
                            <div class="badge red">New version available</div>
                            <div class="badge green"><i class="fas fa-check"></i></div>
                        </li>
                        <li><span>System size:</span> 134MB</li>
                    </ul>
                </div>
            </div>
        </div>


        <div class="widget">
            <div class="name">
                Backend activity
            </div>
            <div class="content">
                <div class="box">
                <script type="text/javascript">
                var ctx = document.getElementById('myChart').getContext('2d');
                var chart = new Chart(ctx, {
                    // The type of chart we want to create
                    type: 'line',

                    // The data for our dataset
                    data: {
                        fill: "#000000",
                        labels: ['17.01', '18.01', '19.01', '20.01', '21.01', '22.01', '23.01 Today'],
                        datasets: [{
                            label: 'My First dataset',
                            backgroundColor: 'rgb(255, 99, 132)',
                            borderColor: 'rgb(255, 99, 132)',
                            data: [<?php echo rand(1,200); ?>, <?php echo rand(1,200); ?>, <?php echo rand(1,200); ?>, <?php echo rand(1,200); ?>, <?php echo rand(1,200); ?>, <?php echo rand(1,200); ?>, <?php echo rand(1,200); ?>]
                        }]
                    },

                    // Configuration options go here
                    options: {

                        legend: {
                          display: false
                        },
                          tooltips: {
                          callbacks: {
                              label: function(tooltipItem) {
                            console.log(tooltipItem)
                              return tooltipItem.yLabel;
                            }
                          }
                        }
                    }
                });
                </script>
                <canvas id="myChart" style="width: 100%; height: 200px;"></canvas>
                </div>
            </div>
        </div>
    </div>
</div>
