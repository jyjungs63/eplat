<!DOCTYPE html>
<html lang="utf-8">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php
        include "../header.php";
    ?>
    <?php
        include "../include.php";
    ?>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.css">

    <link href="../common.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />

    <script src="https://cdn.jsdelivr.net/npm/alasql@4"></script>

    <title>학생등록관리</title>
</head>

<body>
    <div class="p-3">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h5 id="idStudyStatus">학생학습현황</h5>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="../index.php">Home</a></li>
                            <li class="breadcrumb-item active"><a href="javascipt:window.history.back()">Prev</a></li>
                        </ol>
                    </div>
                </div>
            </div>
        </section>
        <section class="content">
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-outline card-info">
                        <div class="card-header">
                            <h3 class="card-title">
                                <div class="input-group mb-3">
                                    <label for="idStep" class="form-label">Step선택</label>
                                    &nbsp;&nbsp;&nbsp;&nbsp;
                                    <select class="form-select form-control-sm" id="idStep"
                                        data-placeholder="Choose Items" style="width: 150px;">
                                        <option value="v0"></option>
                                        <option value="전체">전체</option>
                                        <option value="basic">4세-Basic</option>
                                        <option value="step1">5세-Step1</option>
                                        <option value="step2">6세-Step2</option>
                                        <option value="step3">7세-Step3</option>
                                    </select>&nbsp;&nbsp;&nbsp;
                                    <label for="idClass" class="form-label">반선택</label>
                                    <!-- <button class="btn btn-outline-secondary" type="button">반선택</button> -->
                                    &nbsp;&nbsp;&nbsp;&nbsp;
                                    <select class="form-select form-control-sm" id="idClass"
                                        data-placeholder="Choose Items" style="width: 150px;">
                                        <option value="v0"></option>
                                    </select>&nbsp;&nbsp;
                                    <!-- <input type="month" class="form-control form-control-sm" id="monthPicker"
                                        name="month" style="width: 85px"> -->
                                    <input class="form-control form-control-sm" id="reportrange" style="width: 200px">
                                    <i class="fa fa-calendar" style="margin-top: 7px; margin-left: 2px"></i>&nbsp;
                                    </input>
                                </div>
                            </h3>
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool btn-sm m-3" data-card-widget="collapse"
                                    data-toggle="tooltip" title="Collapse">
                                    <i class="fas fa-minus"></i></button>
                                <button type="button" class="btn btn-tool btn-sm m-3" data-card-widget="remove"
                                    data-toggle="tooltip" title="Remove">
                                    <i class="fas fa-times"></i></button>
                            </div>
                        </div>
                        <div class="card-body pad">
                            <div class="d-flex align-items-end justify-content-end" style="margin-bottom: 10px;">
                                <button class="btn btn-outline-primary" type="button" data-toggle="tooltip"
                                    title="원아 추가 하기" onclick="addClassMember()"><i class="fa-solid fa-user"></i>추가
                                </button> &nbsp;&nbsp;
                                <button class="btn btn-success" type="button" data-toggle="tooltip" title="원아 프린트 하기"
                                    onclick="orderToPdf()"><i class="fa-solid fa-print"></i>출력
                                </button>
                            </div>

                            <div id="idTable">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="card">
                                            <div class="card-header">
                                                <h3 class="card-title">
                                                    <i class="fas fa-chart-pie mr-1"></i>
                                                    학습현황
                                                </h3>
                                                <div class="card-tools d-flex">
                                                    <ul class="nav nav-pills">
                                                        <li class="nav-item">
                                                            <a class="nav-link active" href="#revenue-chart"
                                                                data-bs-toggle="pill">Area</a>
                                                        </li>
                                                        <!-- <li class="nav-item">
                                                            <a class="nav-link " href="#sales-chart"
                                                                data-bs-toggle="pill">Donut</a>
                                                        </li> -->
                                                    </ul> &nbsp; &nbsp;
                                                    </ul> &nbsp; &nbsp;
                                                    <button type="button" class="btn btn-tool btn-sm"
                                                        data-card-widget="collapse" data-toggle="tooltip"
                                                        title="Collapse">
                                                        <i class="fas fa-minus"></i></button>
                                                    <button type="button" class="btn btn-tool btn-sm"
                                                        data-card-widget="remove" data-toggle="tooltip" title="Remove">
                                                        <i class="fas fa-times"></i></button>
                                                </div>
                                            </div>
                                            <div class="card-body">
                                                <div class="tab-content p-0">
                                                    <div class="tab-pane container active" id="revenue-chart"
                                                        style="position: relative; height: 500px;">
                                                        <!-- <canvas id="revenue-chart-canvas" height="500px"></canvas> -->
                                                        <!-- <div id="myChart" -->
                                                        <!-- style="width:100%; max-width:600px; height:500px;"> -->
                                                        <canvas id="revenue-chart-canvas" height="500px"
                                                            style="height: 500px;"></canvas>
                                                        <!-- </div> -->
                                                    </div>
                                                    <div class=" tab-pane container " id="sales-chart"
                                                        style="position: relative; height: 500px;">
                                                        <canvas id="sales-chart-canvas" height="500px"
                                                            style="height: 500px;"></canvas>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </div>
    </section>
    </div>

    <?php
    include '../includescr.php';
    ?>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js"></script>
    <script src="https://www.gstatic.com/charts/loader.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.9.2/html2pdf.bundle.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
    <script src="../common.js"></script>
    <script src="../header.js"></script>
    <script>
    var tab;

    var salesChart;
    var salesChartCanvas = document.getElementById('revenue-chart-canvas').getContext('2d');
    var chartState = 0;



    window.addEventListener('resize', function() {

    })

    document.addEventListener("DOMContentLoaded", function() {
        $("#idStudyStatus").html(name + "학생학습현황");
        showClass(user);
        CallToast(name + "님 방문을 환영합니다!.", "success");
    });

    showClass = (tid) => {

        var data = {
            id: tid
        };

        dispList = (resp) => {
            let select = document.getElementById('idClass');
            let option = document.createElement('option');

            resp['success'].forEach(el => {
                var jarr = {
                    "classnm": el['classnm'],
                }

                let option = document.createElement('option');
                option.text = el['classnm']; // Set the text of the new option
                option.value = el['classnm']; // Set the value attribute (if needed)

                // Append the new option to the select element
                select.add(option);
            })
            //CallToast('Disply student list successfully!!', "success")
        }

        dispErr = (xhr) => {
            //CallToast('Disply student list falure !!', "error")
        }

        var options = {
            functionName: 'SShowClassList',
            otherData: {
                id: tid
            }
        };
        CallAjax("SMethods.php", "POST", options, dispList, dispErr);
    };

    var selectElement = document.getElementById('idStep');
    selectElement.addEventListener("change", function() {

        var selectedValue = selectElement.value;

        var dateRangePickerValue = $('#reportrange').val();
        var selectedDates = dateRangePickerValue.split(' ~ ');
        var startDate = selectedDates[0];
        var endDate = selectedDates[1];
        // Parse the value to extract start and end dates

        // 선택된 옵션 가져오기
        //var selectedOption = this.options[this.selectedIndex];

        // 선택된 옵션의 값(value) 가져오기
        //var selectedValue = selectedOption.value;

        // 선택된 옵션의 텍스트 가져오기
        //var selectedText = selectedOption.text;

        listStudent(selectedValue, startDate, endDate);
    });

    document.getElementById("idClass").addEventListener("change", function() {
        // 선택된 옵션 가져오기
        var selectedOption = this.options[this.selectedIndex];
        var dateRangePickerValue = $('#reportrange').val();
        var selectedDates = dateRangePickerValue.split(' ~ ');
        var startDate = selectedDates[0].trim();
        var endDate = selectedDates[1].trim();


        // 선택된 옵션의 값(value) 가져오기
        var selectedValue = selectedOption.value;

        // 선택된 옵션의 텍스트 가져오기
        var selectedText = selectedOption.text;

        listStudent2(selectedValue, startDate, endDate);
    });


    listStudent = (step, start, end) => {

        dispList = (res) => {
            var js = res['json'];
            drawChart(res['json']);
            CallToast('Student list successfully!!', "success")
        }
        dispErr = (xhr) => {
            CallToast('Student list Error!!', "error")
        }

        var options = {
            functionName: 'SShowStudyList',
            otherData: {
                id: user,
                step: step,
                start: start,
                end: end
            }
        };
        CallAjax("SMethods.php", "POST", options, dispList, dispErr);
    }

    listStudent2 = (classnm, start, end) => {

        dispList = (res) => {
            var js = res['json'];
            drawChart(res['json']);
            CallToast('Student list successfully!!', "success")
        }
        dispErr = (xhr) => {
            CallToast('Student list Error!!', "error")
        }

        var options = {
            functionName: 'SShowStudyList2',
            otherData: {
                id: user,
                classnm: classnm,
                start: start,
                end: end
            }
        };
        CallAjax("SMethods.php", "POST", options, dispList, dispErr);
    }

    /* Chart.js Charts */
    drawChart = (res) => {

        var dataSets = [];

        res.forEach(el => {
            var color = getRandomColor();
            let dt = {
                label: el['name'],
                backgroundColor: color,
                borderColor: color,
                pointColor: '#3b8bba',
                pointStrokeColor: 'rgba(60,141,188,1)',
                pointHighlightFill: '#fff',
                pointHighlightStroke: 'rgba(60,141,188,1)',
                data: [el['cnt']],
            }
            dataSets.push(dt);
        })

        // Chart configuration
        var options = {
            maintainAspectRatio: false,
            responsive: true,
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true
                    }
                }],
                y: {
                    max: 100,
                    min: 0
                }
            }
        };

        var salesChartData = {
            labels: ['학습현황'],
            datasets: dataSets
        }

        if (chartState == 0) {
            salesChart = new Chart(salesChartCanvas, {
                type: 'bar',
                data: salesChartData,
                options: options
            })
            chartState = 1;
        } else {
            salesChart.data = salesChartData;
            salesChart.update();
        }
    }


    orderToPdf = () => {
        var element = document.getElementById('revenue-chart');
        var opt = {
            margin: [3, 0, 0, 0],
            //margin: 0.1,
            filename: 'myfile.pdf',
            image: {
                type: 'jpeg',
                quality: 1
            },
            html2canvas: {
                scale: 1
            },
            jsPDF: {
                unit: 'cm',
                format: 'a4',
                orientation: 'landscape'
            }
        };

        // New Promise-based usage:
        html2pdf().set(opt).from(element).save();

        // Old monolithic-style usage:
        //html2pdf(element, opt);
    }

    // Donut Chart
    var pieChartCanvas = $('#sales-chart-canvas').get(0).getContext('2d')
    var pieData = {
        labels: [
            'Instore Sales',
            'Download Sales',
            'Mail-Order Sales',
        ],
        datasets: [{
            data: [30, 12, 20],
            backgroundColor: ['#f56954', '#00a65a', '#f39c12'],
        }]
    }
    var pieOptions = {
        legend: {
            display: false
        },
        maintainAspectRatio: false,
        responsive: true,
    }
    //Create pie or douhnut chart
    // You can switch between pie and douhnut using the method below.
    var pieChart = new Chart(pieChartCanvas, {
        type: 'doughnut',
        data: pieData,
        options: pieOptions
    });

    printClassMember = () => {
        tab.print();
    }

    var start = moment().startOf('week');
    var end = moment().endOf('week');

    function cb(start, end) {
        $('#reportrange span').html(start.format('YYYY/MM/DD') + ' - ' + end.format('YYYY/MM/DD'));
    }

    $('#reportrange').daterangepicker({
        startDate: start,
        endDate: end,
        locale: {
            format: 'YYYY-MM-DD', // 날짜 표시 형식
            separator: ' ~ ', // 날짜 범위 구분자
            applyLabel: '적용', // 적용 버튼 레이블
            cancelLabel: '취소', // 취소 버튼 레이블
            fromLabel: '부터', // 시작일 레이블
            toLabel: '까지', // 종료일 레이블
            customRangeLabel: '직접 선택', // 사용자 정의 범위 레이블
            weekLabel: '주', // 주 레이블
            daysOfWeek: ['일', '월', '화', '수', '목', '금', '토'], // 요일 배열
            monthNames: ['1월', '2월', '3월', '4월', '5월', '6월', '7월', '8월', '9월', '10월', '11월', '12월'], // 월 배열
            firstDay: 0 // 주의 시작 요일 (0: 일요일, 1: 월요일, ...)
        },
        ranges: {
            '오늘': [moment(), moment()],
            '어제': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
            '지난 7일': [moment().subtract(6, 'days'), moment()],
            '지난주': [moment().subtract(1, 'weeks').startOf('week'), moment().subtract(1, 'weeks').endOf(
                'week')],
            '이번주': [moment().startOf('week'), moment().endOf('week')],
            '다음주': [moment().add(1, 'weeks').startOf('week'), moment().add(1, 'weeks').endOf('week')],
            '지난 30일': [moment().subtract(29, 'days'), moment()],
            '이번달': [moment().startOf('month'), moment().endOf('month')],
            '지난달': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf(
                'month')]
        }
    }, cb);

    // var monthPicker = document.getElementById("monthPicker");

    // monthPicker.addEventListener('input', function(evt) {
    //     let thisMoment = moment(monthPicker.value);
    //     let endOfMonth = moment(thisMoment).endOf('month').format('YYYY-MM-DD');
    //     let startOfMonth = moment(thisMoment).startOf('month').format('YYYY-MM-DD');

    //     listPorRange(startOfMonth, endOfMonth)
    // })
    </script>
</body>

</html>