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
    var ctx = document.getElementById('myChart').getContext('2d');

    var myChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: ['Label 1', 'Label 2', 'Label 3'],
            datasets: [{
                label: 'Dataset 1',
                data: [10, 20, 30],
                backgroundColor: 'rgba(255, 99, 132, 0.2)',
                borderColor: 'rgba(255, 99, 132, 1)',
                borderWidth: 1
            }]
        },
        options: {
            legend: {
                display: true,
                position: 'top', // You can set 'top', 'bottom', 'left', 'right', or custom position like {x: 0, y: 0}
                fullWidth: true // Set to false if you want the legend to be a specific width
            }
        }
    });
    </script>
</body>

</html>