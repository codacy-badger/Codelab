function randNum(){
        return Math.floor(Math.random() * 100) + 1;
}



var ctx = document.getElementById('myChart1').getContext('2d');
var chart = new Chart(ctx, {
    // The type of chart we want to create
    type: 'line',

    // The data for our dataset
    data: {
        labels: ['start', 'Views 13:00', 'Views 14:00', 'Views 15:00', 'Views 16:00', 'Views 17:00', 'Views 18:00', 'Views 19:00', 'stop'],
        datasets: [{
            label: 'My First dataset',
            backgroundColor: '#ffffff',
            //* borderColor: '#193d65',*/
             borderWidth: 4, // and not lineWidth
            data: [0, randNum(), randNum(), randNum(), randNum(), randNum(), randNum(), randNum(), 0]
        }]
    },

    // Configuration options go here
    options: {
        responsive: true,
maintainAspectRatio: false,
elements: {
    point:{
        radius: [0, 4, 4, 4, 4, 4, 4, 4, 0],
    }
},
layout: {
    padding: {
        top: 5,
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
        labels: ['start', 'January 2010', 'Views 14.01', 'Views 15.01', 'Views 16.01', 'Views 17.01', 'Views 18.01', 'Views today', 'stop'],
        datasets: [{
            label: 'My First dataset',
            backgroundColor: '#ffffff',
            //* borderColor: '#193d65',*/
             borderWidth: 4, // and not lineWidth
            data: [0, randNum(), randNum(), randNum(), randNum(), randNum(), randNum(), randNum(), 0]
        }]
    },

    // Configuration options go here
    options: {
        responsive: true,
maintainAspectRatio: false,
elements: {
    point:{
        radius: [0, 4, 4, 4, 4, 4, 4, 4, 0],
    }
},
layout: {
    padding: {
        top: 5,
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
