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

    <!-- Toastr CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" rel="stylesheet">

    <script src="https://cdn.jsdelivr.net/npm/alasql@4"></script>

    <title>Branch Manage</title>
</head>

<body>
    <div class="p-3">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h5>Kinder garden Manage</h5>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrum-item"><a href="#">Home</a></li>
                            <li class="breadcrum-item"><a hred="#">Prev</a></li>
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
                                    <select class="form-select" id="idStudent" data-placeholder="Choose Items">

                                    </select>
                                    &nbsp;&nbsp;
                                    <input class="form-control " id="idClassname" type="text"
                                        placeholder="Add Class Name"> &nbsp;&nbsp;
                                    <input class="form-control " id="idNick" type="text"
                                        placeholder="Id Prefix (English)"> &nbsp;&nbsp;
                                    <input class="form-control " id="idNumstudent" type="text" placeholder="학생수">
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
                                    data-toggle="tooltip" title="Add Student" aria-disabled="true"><i
                                        class="fa-solid fa-user"></i></a>
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
                            <div class="card-tools d-flex">
                                <ul class="nav nav-pills">
                                    <li class="nav-item">
                                        <a class="nav-link active" href="#revenue-chart" data-bs-toggle="pill">Area</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link " href="#sales-chart" data-bs-toggle="pill">Donut</a>
                                    </li>
                                </ul> &nbsp; &nbsp;
                                </ul> &nbsp; &nbsp;
                                <button type="button" class="btn btn-tool btn-sm" data-card-widget="collapse"
                                    data-toggle="tooltip" title="Collapse">
                                    <i class="fas fa-minus"></i></button>
                                <button type="button" class="btn btn-tool btn-sm" data-card-widget="remove"
                                    data-toggle="tooltip" title="Remove">
                                    <i class="fas fa-times"></i></button>

                            </div>
                        </div>
                        <div class="card-body">
                            <div class="tab-content p-0">
                                <div class=" tab-pane container active" id="revenue-chart"
                                    style="position: relative; height: 500px;">
                                    <canvas id="revenue-chart-canvas" height="500px" style="height: 500px;"></canvas>
                                </div>
                                <div class=" tab-pane container " id="sales-chart"
                                    style="position: relative; height: 500px;">
                                    <canvas id="sales-chart-canvas" height="500px" style="height: 500px;"></canvas>
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
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.1/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/js/all.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/js/adminlte.min.js"></script>
    <script src="https://unpkg.com/tabulator-tables@5.5.2/dist/js/tabulator.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script> -->

    <script>
    var tab;
    document.addEventListener("DOMContentLoaded", function() {

        tab = new Tabulator("#idTable", {
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
        //showClassMembers("teacher1");
        showClass("teacher1");
    });

    document.getElementById("idStudent").addEventListener("change", function() {
        // 선택된 옵션 가져오기
        var selectedOption = this.options[this.selectedIndex];

        // 선택된 옵션의 값(value) 가져오기
        var selectedValue = selectedOption.value;

        // 선택된 옵션의 텍스트 가져오기
        var selectedText = selectedOption.text;

        listStudent(selectedText);
    });

    listStudent = (classnm) => {

        dispList = (res) => {
            var js = res['json'];
            tab.setData(js);
            //tab.setData(JSON.parse(js));
            CallToast('Student list successfully!!', "success")
        }
        dispErr = (xhr) => {
            CallToast('Student list Error!!', "error")
        }

        var options = {
            functionName: 'SShowStudentList',
            otherData: {
                id: "teacher1",
                classnm: classnm
            }
        };
        CallAjax("SMethods.php", "POST", options, dispList, dispErr);


    }

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

    addClassMember = () => { // 학생등록
        var items = [];
        var item = tab.getRows();
        item.forEach(el => {
            var jarr = {
                "id": el._row.data['Id'],
                "name": el._row.data['Name'],
                "passwd": el._row.data['Passwd'],
                "tid": "teacher1", //
                "role": "0", //
                "classnm": "장미"
            }
            items.push(jarr);

        })
        var data = {
            "item": items
        };
        // $.ajax({
        //     url: "../Server/SinsertStudent.php",
        //     type: "POST",
        //     dataType: "json",
        //     data: JSON.stringify(data),
        //     success: function(e) {},
        //     error: function(e) {}
        // })

        dispList = (resp) => {
            CallToast('New Student added successfully!!', "success")
        }
        dispErr = (xhr) => {
            CallToast('New Student  added falure !!', "error")
        }

        var options = {
            functionName: 'SinsertStudent',
            otherData: {
                items
            }
        };
        CallAjax("SMethods.php", "POST", options, dispList, dispErr);

    }

    showClass = (tid) => {
        var data = {
            id: tid
        };
        // $.ajax({
        //     url: "../Server/SShowClassList.php",
        //     type: "POST",
        //     dataType: "json",
        //     data: data,
        //     success: function(resp) {

        //         let select = document.getElementById('idStudent');
        //         let option = document.createElement('option');
        //         option.text = ""; // Set the text of the new option
        //         option.value = ""; // Set the value attribute (if needed)
        //         select.add(option);
        //         resp.forEach(el => {
        //             var jarr = {
        //                 "classnm": el['classnm'],
        //             }
        //             //items.push(jarr);
        //             // Create a new option element
        //             let option = document.createElement('option');
        //             option.text = el['classnm']; // Set the text of the new option
        //             option.value = el['classnm']; // Set the value attribute (if needed)

        //             // Append the new option to the select element
        //             select.add(option);
        //         })
        //     },
        //     error: function(e) {

        //     }
        // });

        dispList = (resp) => {
            let select = document.getElementById('idStudent');
            let option = document.createElement('option');
            option.text = ""; // Set the text of the new option
            option.value = ""; // Set the value attribute (if needed)
            select.add(option);
            resp.forEach(el => {
                var jarr = {
                    "classnm": el['classnm'],
                }
                //items.push(jarr);
                // Create a new option element
                let option = document.createElement('option');
                option.text = el['classnm']; // Set the text of the new option
                option.value = el['classnm']; // Set the value attribute (if needed)

                // Append the new option to the select element
                select.add(option);
            })
            CallToast('New Branch Manager added successfully!!', "success")
        }

        dispErr = (xhr) => {
            CallToast('New Branch Manager added successfully!!', "error")
        }

        var options = {
            functionName: 'SShowClassList',
            otherData: {
                id: tid
            }
        };
        CallAjax("SMethods.php", "POST", options, dispList, dispErr);


    };

    showClassMembers = (tid) => {
        var data = {
            id: tid
        };
        // $.ajax({
        //     url: "../Server/SShowStudentList.php",
        //     type: "POST",
        //     dataType: "json",
        //     data: JSON.stringify(data),
        //     success: function(e) {

        //     },
        //     error: function(e) {

        //     }
        // })

        dispList = (res) => {
            // var js = res['json'];
            // tab.setData(js);
            //tab.setData(JSON.parse(js));
            CallToast('Student list successfully!!', "success")
        }
        dispErr = (xhr) => {
            CallToast('Student list Error!!', "error")
        }

        var options = {
            functionName: 'SShowStudentList',
            otherData: {
                id: "teacher1",
                classnm: classnm
            }
        };
        CallAjax("SMethods.php", "POST", options, dispList, dispErr);
    }

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