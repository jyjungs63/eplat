<!DOCTYPE html>
<html lang="utf-8">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.1/css/bootstrap.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/brands.min.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/css/adminlte.min.css">
    <link rel="stylesheet" href="https://unpkg.com/tabulator-tables@5.5.2/dist/css/tabulator.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.css">

    <script src="https://cdn.jsdelivr.net/npm/alasql@4"></script>

    <title>Branch Manage</title>
</head>

<body>
    <div class="p-3">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Branch Manage</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrum-item"><a href="#">Home</a></li>
                            <li class="breadcrum-item"><a hred=""></a></li>
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
                                    <button class="btn btn-outline-secondary" type="button">Select Items</button>
                                    &nbsp;&nbsp;
                                    <select class="form-select" id="idGrade" data-placeholder="Choose Items">
                                        <option val="va">전체</option>
                                        <option val="v4">4세</option>
                                        <option val="v5">5세</option>
                                        <option val="v6">6세</option>
                                        <option val="v7">7세</option>
                                        <option val="ve">교구</option>
                                    </select>
                                    &nbsp;&nbsp;
                                    <input class="form-control " id="idClassname" type="text"
                                        placeholder="Add Class Name"> &nbsp;&nbsp;
                                    <input class="form-control " id="idNumstudent" type="text"
                                        placeholder="Number of students">
                                    &nbsp;&nbsp;
                                    <button class="btn btn-outline-primary" type="button" onclick="addChild()">Add
                                        Class</button>
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
                                <a id="anchorRead" href="javascript:addClassMember()" class="btn btn-info" role="button"
                                    aria-disabled="true"><i class="fa-solid fa-cart-shopping"></i></a>
                            </div>

                            <div id="idTable">

                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">
                                <i class="fas fa-chart-pie mr-1"></i>
                                Sales
                            </h3>
                            <div class="card-tools">
                                <ul class="nav nav-pills ml-auto">
                                    <li class="nav-item">
                                        <a class="nav-link " href="#revenue-chart" data-toggle="tab">Area</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link active" href="#sales-chart" data-toggle="tab">Donut</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="tab-content p-0">

                                <div class="chart tab-pane " id="revenue-chart"
                                    style="position: relative; height: 500px;">
                                    <canvas id="revenue-chart-canvas" height="300" style="height: 300px;"></canvas>
                                </div>
                                <div class="chart tab-pane active" id="sales-chart"
                                    style="position: relative; height: 300px;">
                                    <canvas id="sales-chart-canvas" height="300" style="height: 300px;"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </div>
    </section>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.1/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/js/all.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/js/adminlte.min.js"></script>
    <script src="https://unpkg.com/tabulator-tables@5.5.2/dist/js/tabulator.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js"></script>

    <script>
    var tab = new Tabulator("#idTable", {
        height: "300px",
        layout: "fitColumns",
        columns: [{
                title: "Id",
                field: "Id",
                width: 150,
                editor: "input",
                editorParams: {
                    autocomplete: "true",
                    allowEmpty: true,
                    listOnEmpty: true,
                    valuesLookup: true
                }
            },
            {
                title: "Passwd",
                field: "Passwd",
                width: 150,
                editor: "input",
                editorParams: {
                    autocomplete: "true",
                    allowEmpty: true,
                    listOnEmpty: true,
                    valuesLookup: true
                }
            },
            {
                title: "Name",
                field: "Name",
                width: 150,
                editor: "input",
                editorParams: {
                    autocomplete: "true",
                    allowEmpty: true,
                    listOnEmpty: true,
                    valuesLookup: true
                }
            },
        ],
    });

    addChild = () => {
        var classname = $("#idClassname").val();
        var num = $("#idNumstudent").val();
        var arr = [...Array(Number(num)).keys()];
        arr.forEach(el => {

            var data = {
                Id: classname + el + "id",
                Passwd: classname + el + "passwd",
                Name: classname + el
            }
            tab.addRow(data);
        })

    };

    /* Chart.js Charts */
    // Sales chart
    var salesChartCanvas = document.getElementById('revenue-chart-canvas').getContext('2d');
    //$('#revenue-chart').get(0).getContext('2d');

    var salesChartData = {
        labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July'],
        datasets: [{
                label: 'Digital Goods',
                backgroundColor: 'rgba(60,141,188,0.9)',
                borderColor: 'rgba(60,141,188,0.8)',
                pointRadius: false,
                pointColor: '#3b8bba',
                pointStrokeColor: 'rgba(60,141,188,1)',
                pointHighlightFill: '#fff',
                pointHighlightStroke: 'rgba(60,141,188,1)',
                data: [28, 48, 40, 19, 86, 27, 90]
            },
            {
                label: 'Electronics',
                backgroundColor: 'rgba(210, 214, 222, 1)',
                borderColor: 'rgba(210, 214, 222, 1)',
                pointRadius: false,
                pointColor: 'rgba(210, 214, 222, 1)',
                pointStrokeColor: '#c1c7d1',
                pointHighlightFill: '#fff',
                pointHighlightStroke: 'rgba(220,220,220,1)',
                data: [65, 59, 80, 81, 56, 55, 40]
            },
        ]
    }

    var salesChartOptions = {
        maintainAspectRatio: false,
        responsive: true,
        legend: {
            display: false
        },
        scales: {
            xAxes: [{
                gridLines: {
                    display: false,
                }
            }],
            yAxes: [{
                gridLines: {
                    display: false,
                }
            }]
        }
    }

    // This will get the first returned node in the jQuery collection.
    var salesChart = new Chart(salesChartCanvas, {
        type: 'line',
        data: salesChartData,
        options: salesChartOptions
    })

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
    </script>
</body>

</html>