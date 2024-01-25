<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chart.js Redraw Example</title>
    <!-- Include Chart.js library -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>

<body>

    <div style="width:80%;">
        <canvas id="myChart"></canvas>
    </div>

    <button onclick="updateChart()">Update Chart</button>

    <script>
    // Initial data for the chart
    var initialData = {
        labels: ['January', 'February', 'March', 'April', 'May'],
        datasets: [{
            label: 'Dataset 1',
            data: [10, 20, 15, 25, 30],
            borderColor: 'rgba(75, 192, 192, 1)',
            borderWidth: 2,
            fill: false
        }]
    };

    // Create a chart
    var ctx = document.getElementById('myChart').getContext('2d');
    var myChart = new Chart(ctx, {
        type: 'line',
        data: initialData,
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

    // Function to update the chart data
    function updateChart() {
        // New data to update the chart
        var newData = {
            labels: ['June', 'July', 'August', 'September', 'October'],
            datasets: [{
                label: 'Dataset 1',
                data: [15, 25, 20, 30, 35],
                borderColor: 'rgba(255, 99, 132, 1)',
                borderWidth: 2,
                fill: false
            }]
        };

        // Update the chart data and redraw
        myChart.data = newData;
        myChart.update();
    }
    </script>
</body>

</html>