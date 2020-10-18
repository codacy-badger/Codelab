<?php
$clAjax = true;
include('../../../../../codelab.php');
?>
<h1>Dashboard</h1>
<div class="panelInner">
    <div class="widgets">
        <div class="widget">
            <div class="name">
                Guard
            </div>
            <div class="content">
                <div class="box">
                    Dziękujemy że korzystasz z systemu Codelab, stworzonego przez G3ck.com.
                </div>
            </div>
        </div>
        <div class="widget">
            <div class="name">
                System stats
            </div>
            <div class="content">
                <div class="box">
                    <ul>
                        <li><span>System name:</span> Codelab</li>
                        <li><span>Codename:</span> <?php echo clCodename; ?></li>
                        <li><span>Version:</span> <?php echo clVersion; ?></li>
                        <li><span>System size:</span> 134MB</li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="widget">
            <div class="name">
                System traffic
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
                        labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July'],
                        datasets: [{

                            label: 'My First dataset',
                            backgroundColor: 'rgb(255, 99, 132)',
                            borderColor: 'rgb(255, 99, 132)',
                            data: [<?php echo rand(1,200); ?>, <?php echo rand(1,200); ?>, <?php echo rand(1,200); ?>, <?php echo rand(1,200); ?>, <?php echo rand(1,200); ?>, <?php echo rand(1,200); ?>, <?php echo rand(1,200); ?>]
                        }]
                    },

                    // Configuration options go here
                    options: {}
                });
                </script>
                <canvas id="myChart" style="width: 100%; height: 200px;"></canvas>
                </div>
            </div>
        </div>

        <div class="widget">
            <div class="name">
                System traffic
            </div>
            <div class="content">
                <div class="box">
                <script type="text/javascript">
                var ctx = document.getElementById('myCharta').getContext('2d');
                var chart = new Chart(ctx, {
                    // The type of chart we want to create
                    type: 'line',

                    // The data for our dataset
                    data: {
                        labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July'],
                        datasets: [{
                            label: 'My First dataset',
                            backgroundColor: 'rgb(255, 99, 132)',
                            borderColor: 'rgb(255, 99, 132)',
                            data: [<?php echo rand(1,200); ?>, <?php echo rand(1,200); ?>, <?php echo rand(1,200); ?>, <?php echo rand(1,200); ?>, <?php echo rand(1,200); ?>, <?php echo rand(1,200); ?>, <?php echo rand(1,200); ?>]
                        }]
                    },

                    // Configuration options go here
                    options: {}
                });
                </script>
                <canvas id="myCharta" style="width: 100%; height: 200px;"></canvas>
                </div>
            </div>
        </div>
        <div class="widget">
            <div class="name">
                System traffic
            </div>
            <div class="content">
                <div class="box">
                <script type="text/javascript">
                var ctx = document.getElementById('myChartaa').getContext('2d');
                var chart = new Chart(ctx, {
                    // The type of chart we want to create
                    type: 'line',

                    // The data for our dataset
                    data: {
                        labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July'],
                        datasets: [{
                            label: 'My First dataset',
                            backgroundColor: 'rgb(255, 99, 132)',
                            borderColor: 'rgb(255, 99, 132)',
                            data: [<?php echo rand(1,200); ?>, <?php echo rand(1,200); ?>, <?php echo rand(1,200); ?>, <?php echo rand(1,200); ?>, <?php echo rand(1,200); ?>, <?php echo rand(1,200); ?>, <?php echo rand(1,200); ?>]
                        }]
                    },

                    // Configuration options go here
                    options: {}
                });
                </script>
                <canvas id="myChartaa" style="width: 100%; height: 200px;"></canvas>
                </div>
            </div>
        </div>

    </div>
</div>
