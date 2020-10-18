<?php
$clAjax = true;
include('../../../../../codelab.php');
?>
<h1>Languages</h1>
<div class="panelInner">
    <div class="widgets">
        <div class="widget">
            <div class="name">
                Single language frontend
            </div>
            <div class="content">
                <div class="box">
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                </div>
            </div>
        </div>
        <div class="widget">
            <div class="name">
                Languages stats
            </div>
            <div class="content">
                <div class="box">
                    <ul>
                        <li><span>Default language:</span> PL - Polski</li>
                        <li><span>Active:</span> 1</li>
                        <li><span>Installed:</span> 7</li>
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
                var myRadarChart  = new Chart(ctx, {
                    // The type of chart we want to create
                    type: 'radar',
                    data: {
                        labels: ['Running', 'Swimming', 'Eating', 'Cycling', 'Eatinfg', 'Cycfling'],
                        datasets: [{
                            label: 'My First dataset',
                    		backgroundColor: "#FF6384",
                    		borderColor: "#FF6384",
                            data: [20, 10, 4, 100, 44, 77]
                        }]
                    },
                    options: {

                            scale: {
                                angleLines: {
                                    display: false
                                },
                                ticks: {
                                    suggestedMin: 10,
                                    suggestedMax: 50
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
