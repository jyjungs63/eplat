<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bar Chart Example</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.3"></script>
</head>

<body>
    <canvas id="myBarChart" width="400" height="200"></canvas>

    <script>
    // Example data
    var data = {
        labels: ["January", "February", "March", "April", "May"],
        datasets: [{
            label: 'Monthly Sales',
            data: [50, 80, 60, 120, 100],
            backgroundColor: 'rgba(75, 192, 192, 0.2)', // Background color of bars
            borderColor: 'rgba(75, 192, 192, 1)', // Border color of bars
            borderWidth: 1 // Border width of bars
        }]
    };

    // Chart configuration
    var options = {
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero: true
                }
            }]
        }
    };

    // Get the canvas element
    var ctx = document.getElementById('myBarChart').getContext('2d');

    // Create a bar chart
    var myBarChart = new Chart(ctx, {
        type: 'bar',
        data: data,
        options: options
    });
    </script>
</body>

</html>