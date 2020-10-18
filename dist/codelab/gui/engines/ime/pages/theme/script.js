function randNum(){
        return Math.floor(Math.random() * 100) + 1;
}



var ctx = document.getElementById('myChart1').getContext('2d');
var chart = new Chart(ctx, {
    // The type of chart we want to create
    type: 'line',

    // The data for our dataset
    data: {
        labels: ['13.01', '14.01', '15.01', '16.01', '17.01'],
        datasets: [{
            label: 'My First dataset',
            backgroundColor: '#ffffff',
            borderColor: '#29507b',
             borderWidth: 4, // and not lineWidth
            data: [randNum(), randNum(), randNum(), randNum(), randNum()]
        }]
    },

    // Configuration options go here
    options: {
        responsive: true,
maintainAspectRatio: false,
        layout: {
            padding: {
                bottom: 5,
                top: 5,
                left:5,
                right:5
            }
        },
        scales:{
            xAxes: [{
                display: false //this will remove all the x-axis grid lines
            }],
            yAxes: [{
                display: false //this will remove all the x-axis grid lines
            }],
        },

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




var ctx = document.getElementById('myChart2').getContext('2d');
var chart = new Chart(ctx, {
    // The type of chart we want to create
    type: 'line',

    // The data for our dataset
    data: {
        labels: ['10:00', '11:00', '12:00', '13:00', '14:00', '15:00', '16:00', '17:00', '18:00', 'Now'],
        datasets: [{
            label: 'My First dataset',
            backgroundColor: '#ffffff',
            borderColor: '#FF6384',
             borderWidth: 4, // and not lineWidth
            data: [randNum(), randNum(), randNum(), randNum(), randNum(), randNum(), randNum(), randNum(), randNum(), randNum(),randNum(),randNum(),randNum(),randNum()]
        }]
    },

    // Configuration options go here
    options: {
        responsive: true,
maintainAspectRatio: false,
        layout: {
            padding: {
                bottom: 5,
                top: 5,
                left:5,
                right:5
            }
        },
        scales:{
            xAxes: [{
                display: false //this will remove all the x-axis grid lines
            }],
            yAxes: [{
                display: false //this will remove all the x-axis grid lines
            }],
        },

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

var ctx = document.getElementById('myChart3').getContext('2d');
var chart = new Chart(ctx, {
    // The type of chart we want to create
    type: 'line',

    // The data for our dataset
    data: {
        labels: ['13:00', '14:00', '15:00', '16:00', '17:00', '18:00', 'Now'],
        datasets: [{
            label: 'My First dataset',
            backgroundColor: '#ffffff',
            borderColor: '#FF6384',
             borderWidth: 4, // and not lineWidth
            data: [randNum(), randNum(), randNum(), randNum(), randNum(), randNum(), randNum(),randNum(),randNum(),randNum(),randNum()]
        }]
    },

    // Configuration options go here
    options: {
        responsive: true,
maintainAspectRatio: false,
        layout: {
            padding: {
                bottom: 5,
                top: 5,
                left:5,
                right:5
            }
        },
        scales:{
            xAxes: [{
                display: false //this will remove all the x-axis grid lines
            }],
            yAxes: [{
                display: false //this will remove all the x-axis grid lines
            }],
        },

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













var ctx = document.getElementById('myChart4').getContext('2d');
var chart = new Chart(ctx, {
    // The type of chart we want to create
    type: 'line',

    // The data for our dataset
    data: {
        labels: ['13.01', '14.01', '15.01', '16.01', '17.01'],
        datasets: [{
            label: 'My First dataset',
            backgroundColor: '#ffffff',
            borderColor: '#29507b',
             borderWidth: 4, // and not lineWidth
            data: [randNum(), randNum(), randNum(), randNum(), randNum()]
        }]
    },

    // Configuration options go here
    options: {
        responsive: true,
maintainAspectRatio: false,
        layout: {
            padding: {
                bottom: 5,
                top: 5,
                left:5,
                right:5
            }
        },
        scales:{
            xAxes: [{
                display: false //this will remove all the x-axis grid lines
            }],
            yAxes: [{
                display: false //this will remove all the x-axis grid lines
            }],
        },

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




var ctx = document.getElementById('myChart5').getContext('2d');
var chart = new Chart(ctx, {
    // The type of chart we want to create
    type: 'line',

    // The data for our dataset
    data: {
        labels: ['10:00', '11:00', '12:00', '13:00', '14:00', '15:00', '16:00', '17:00', '18:00', 'Now'],
        datasets: [{
            label: 'My First dataset',
            backgroundColor: '#ffffff',
            borderColor: '#FF6384',
             borderWidth: 4, // and not lineWidth
            data: [randNum(), randNum(), randNum(), randNum(), randNum(), randNum(), randNum(), randNum(), randNum(), randNum(),randNum(),randNum(),randNum(),randNum()]
        }]
    },

    // Configuration options go here
    options: {
        responsive: true,
maintainAspectRatio: false,
        layout: {
            padding: {
                bottom: 5,
                top: 5,
                left:5,
                right:5
            }
        },
        scales:{
            xAxes: [{
                display: false //this will remove all the x-axis grid lines
            }],
            yAxes: [{
                display: false //this will remove all the x-axis grid lines
            }],
        },

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

var ctx = document.getElementById('myChart6').getContext('2d');
var chart = new Chart(ctx, {
    // The type of chart we want to create
    type: 'line',

    // The data for our dataset
    data: {
        labels: ['13:00', '14:00', '15:00', '16:00', '17:00', '18:00', 'Now'],
        datasets: [{
            label: 'My First dataset',
            backgroundColor: '#ffffff',
            borderColor: '#FF6384',
             borderWidth: 4, // and not lineWidth
            data: [randNum(), randNum(), randNum(), randNum(), randNum(), randNum(), randNum(),randNum(),randNum(),randNum(),randNum()]
        }]
    },

    // Configuration options go here
    options: {
        responsive: true,
maintainAspectRatio: false,
        layout: {
            padding: {
                bottom: 5,
                top: 5,
                left:5,
                right:5
            }
        },
        scales:{
            xAxes: [{
                display: false //this will remove all the x-axis grid lines
            }],
            yAxes: [{
                display: false //this will remove all the x-axis grid lines
            }],
        },

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
