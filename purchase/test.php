<!DOCTYPE html>
<html lang="ko">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>막대 차트에 값 표시</title>

    <!-- Chart.js 및 datalabels 플러그인 라이브러리 포함 -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels"></script>
</head>

<body>

    <!-- 막대 차트를 렌더링할 캔버스 요소 생성 -->
    <canvas id="myChart1" height="300" width="500"></canvas>
    <canvas id="myChart2" height="300" width="500"></canvas>

    <script>
    // 막대 차트에 표시할 샘플 데이터
    var chartData = {
        labels: ["January", "February", "March", "April", "May", "June"],
        datasets: [{
            fillColor: "#79D1CF",
            strokeColor: "#79D1CF",
            data: [60, 80, 81, 56, 55, 40]
        }]
    };


    var ctx = document.getElementById("myChart2").getContext("2d");
    var myBar = new Chart(ctx, chartData, {
        type: 'bar',
        showTooltips: false,
        onAnimationComplete: function() {

            var ctx = this.chart.ctx;
            ctx.font = this.scale.font;
            ctx.fillStyle = this.scale.textColor
            ctx.textAlign = "center";
            ctx.textBaseline = "bottom";

            this.datasets.forEach(function(dataset) {
                dataset.bars.forEach(function(bar) {
                    ctx.fillText(bar.value, bar.x, bar.y - 5);
                });
            })
        }
    });

    // 막대 차트 생성
    </script>

</body>

</html>