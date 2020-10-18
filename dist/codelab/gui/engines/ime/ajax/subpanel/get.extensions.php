<h1>Extensions</h1>
<div class="panelInner">
    <div class="widgets">
        <div class="widget">
            <div class="name">
                Whats about my users
            </div>
            <div class="content">
                Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
            </div>
        </div>
        <div class="widget">
            <div class="name">
                Users statistics
            </div>
            <div class="content">
                <script type="text/javascript">
                  google.charts.load('current', {'packages':['corechart']});
                  google.charts.setOnLoadCallback(drawChart);

                  function drawChart() {
                    var data = google.visualization.arrayToDataTable([
                      ['Year', 'Sales', 'Expenses'],
                      ['2013',  1000,      400],
                      ['2014',  1170,      460],
                      ['2015',  660,       1120],
                      ['2016',  1030,      540]
                    ]);

                    var options = {
                      title: 'Company Performance',
                      hAxis: {title: 'Year',  titleTextStyle: {color: '#333'}},
                      vAxis: {minValue: 0}
                    };

                    var chart = new google.visualization.AreaChart(document.getElementById('chart_div'));
                    chart.draw(data, options);
                  }
                </script>
                <div id="chart_div" style="width: 100%; height: 200px;"></div>
            </div>
        </div>
    </div>
</div>
