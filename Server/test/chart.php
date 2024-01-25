<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Multi-Dataset Chart Example</title>
    <!-- Include Chart.js library -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>

<body>
    <div style="width:80%;">
        <canvas id="myChart"></canvas>
    </div>

    <script>
    // Sample data for multiple datasets with the same period
    var labels = ['January'];
    var dt1 = ['12'];
    var dt2 = ['2'];
    var dt3 = ['3'];
    var dt4 = ['1'];
    var dt5 = ['5'];



    // Create a chart
    var ctx = document.getElementById('myChart').getContext('2d');
    var myChart = new Chart(ctx, {
        type: 'bar', // You can change the chart type (e.g., 'bar', 'radar', etc.)
        data: {
            labels: labels,
            datasets: [{
                label: 'Dataset 1',
                data: dt1,
                borderColor: 'rgba(75, 192, 192, 1)',
                backgroundColor: 'rgba(75, 192, 192, 1)',
                borderWidth: 2,
                fill: false
            }, {
                label: 'Dataset 2',
                data: dt2,
                borderColor: 'rgba(255, 99, 132, 1)',
                borderWidth: 2,
                fill: false
            }, {
                label: 'Dataset 3',
                data: dt3,
                borderColor: 'rgba(125, 99, 132, 1)',
                borderWidth: 2,
                fill: false
            }, {
                label: 'Dataset 4',
                data: dt4,
                borderColor: 'rgba(150, 99, 132, 1)',
                borderWidth: 2,
                fill: false
            }, {
                label: 'Dataset 5',
                data: dt5,
                borderColor: 'rgba(178, 99, 132, 1)',
                borderWidth: 2,
                fill: true
            }]
        },
        options: {
            scales: {
                x: {
                    display: true,
                    title: {
                        display: true,
                        text: 'Month'
                    }
                },
                y: {
                    display: true,
                    title: {
                        display: true,
                        text: 'Value'
                    }
                }
            }
        }
    });
    </script>
</body>

</html>