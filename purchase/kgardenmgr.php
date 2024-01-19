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

    <script src="https://cdn.jsdelivr.net/npm/alasql@4"></script>

    <title>학생등록관리</title>
</head>

<body>
    <div class="p-3">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h5>학생등록 관리리스트</h5>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="../index.php">Home</a></li>
                            <li class="breadcrumb-item active"><a href="javascript:window.history.back();">이전</a></li>
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
                                    <button class="btn btn-outline-secondary" type="button">Step 선택</button>
                                    &nbsp;&nbsp;
                                    <select class="form-select form-control-sm" id="idStudent"
                                        data-placeholder="Choose Items" style="width: 70px;">
                                        <option val="va">전체</option>
                                        <option val="sb">4세-Basic</option>
                                        <option val="s1">5세-Step1</option>
                                        <option val="s2">6세-Step2</option>
                                        <option val="s3">7세-Step3</option>
                                    </select>&nbsp;
                                    &nbsp;&nbsp;
                                    <input class="form-control " id="idClassname" type="text" placeholder="반이름">
                                    &nbsp;&nbsp;
                                    <input class="form-control " id="idNick" type="text" placeholder="시작아이디(영어)">
                                    &nbsp;&nbsp;
                                    <input class="form-control " id="idNumstudent" type="text" placeholder="원아수">
                                    &nbsp;&nbsp;
                                    <button class="btn btn-outline-primary" type="button" onclick="addChild()">추가
                                    </button>
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
                                <!-- <a id="anchorRead" href="javascript:addClassMember()" class="btn btn-info" role="button"
                                    data-toggle="tooltip" title="Add Student" aria-disabled="true"><i
                                        class="fa-solid fa-user"></i></a> -->
                                <button class="btn btn-outline-primary" type="button" data-toggle="tooltip"
                                    title="원아 추가 하기" onclick="addClassMember()"><i class="fa-solid fa-user"></i>추가
                                </button> &nbsp;&nbsp;
                                <button class="btn btn-success" type="button" data-toggle="tooltip" title="원아 프린트 하기"
                                    onclick="printClassMember()"><i class="fa-solid fa-print"></i>출력
                                </button>
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
                                학습현황
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js"></script>
    <script src="../common.js"></script>
    <script>
    var tab;

    const user = document.querySelector('meta[name="user"]').getAttribute('content');
    const role = document.querySelector('meta[name="role"]').getAttribute('content');
    const conf = document.querySelector('meta[name="confirm"]').getAttribute('content');
    const name = document.querySelector('meta[name="name"]').getAttribute('content');

    window.addEventListener('resize', function() {
        drawTable();
    })

    function drawTable() {
        var deleteIcon = function(cell, formatterParams) { //plain text value
            return "<i class='fa fa-trash'></i>";
        };

        tab = new Tabulator("#idTable", {
            height: "300px",
            layout: "fitColumns",
            columns: [{
                    title: "반이름",
                    field: "classnm",
                    width: "20%",
                    headerHozAlign: "center",
                    editor: "input",
                    editorParams: {
                        autocomplete: "true",
                        allowEmpty: true,
                        listOnEmpty: true,
                        valuesLookup: true
                    }
                },
                {
                    title: "원아명",
                    field: "name",
                    width: "20%",
                    headerHozAlign: "center",
                    editor: "input",
                    editorParams: {
                        autocomplete: "true",
                        allowEmpty: true,
                        listOnEmpty: true,
                        valuesLookup: true
                    }
                },
                {
                    title: "아이디",
                    field: "id",
                    width: "20%",
                    editor: "input",
                    headerHozAlign: "center",
                    editorParams: {
                        autocomplete: "true",
                        allowEmpty: true,
                        listOnEmpty: true,
                        valuesLookup: true
                    }
                },
                {
                    title: "비밀번호",
                    field: "passwd",
                    width: "20%",
                    editor: "input",
                    headerHozAlign: "center",
                    editorParams: {
                        autocomplete: "true",
                        allowEmpty: true,
                        listOnEmpty: true,
                        valuesLookup: true
                    }
                },
                {
                    title: "스텝",
                    field: "step",
                    width: "10%",
                    editor: "input",
                    headerHozAlign: "center",
                    editorParams: {
                        autocomplete: "true",
                        allowEmpty: true,
                        listOnEmpty: true,
                        valuesLookup: true
                    }
                },
                {
                    title: "삭제",
                    formatter: deleteIcon,
                    width: "10%",
                    headerHozAlign: "center",
                    hozAlign: "center",
                    cellClick: function(e, cell) {
                        ChildDelete(cell.getRow())
                    }
                },
            ],
        });
    }

    document.addEventListener("DOMContentLoaded", function() {
        drawTable();
        //showClassMembers("teacher1");
        showClass(user);
    });

    ChildDelete = (cell) => {

        var result = confirm("Are you sure to delete ??");

        var id = cell._row.data['id'];

        dispList = (resp) => {
            CallToast('원아 삭제 successfully!!', "success")
            cell.delete();
        }
        dispErr = (xhr) => {
            CallToast('원아 삭제 Error!!', "error")
        }

        var options = {
            functionName: 'SDeleteChild',
            otherData: {
                id: id
            }
        };

        if (result) {
            CallAjax("SMethods.php", "POST", options, dispList, dispErr);
        } else
            CallToast("원아 삭제 취소 !!", "error");
    }

    document.getElementById("idStudent").addEventListener("change", function() {
        // 선택된 옵션 가져오기
        var selectedOption = this.options[this.selectedIndex];

        // 선택된 옵션의 값(value) 가져오기
        var selectedValue = selectedOption.value;

        // 선택된 옵션의 텍스트 가져오기
        var selectedText = selectedOption.text;

        listStudent(selectedText);
    });

    listStudent = (step) => {

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
                id: user,
                step: step
            }
        };
        CallAjax("SMethods.php", "POST", options, dispList, dispErr);


    }

    addChild = () => {
        var selectElement = document.getElementById("idStudent");
        var selectedValue = selectElement.value;

        var classname = $("#idClassname").val();
        var nickname = $("#idNick").val();
        var num = $("#idNumstudent").val();
        var arr = [...Array(Number(num)).keys()];
        arr.forEach(el => {

            var data = {
                classnm: classname,
                id: nickname + el + "id",
                passwd: nickname + el + "passwd",
                step: selectedValue
            }
            tab.addRow(data);
        })
    };

    addClassMember = () => { // 학생등록
        var items = [];
        var item = tab.getRows();
        item.forEach(el => {
            var jarr = {
                "id": el._row.data['id'],
                "name": el._row.data['name'],
                "passwd": el._row.data['passwd'],
                "tid": user, //
                "role": "0", //
                "classnm": el._row.data['classnm'],
                "step": el._row.data['step'],
            }
            items.push(jarr);

        })
        var data = {
            "item": items
        };

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
            CallToast('New Branch Manager added falure !!', "error")
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

        dispList = (res) => {
            CallToast('Student list successfully!!', "success")
        }
        dispErr = (xhr) => {
            CallToast('Student list Error!!', "error")
        }

        var options = {
            functionName: 'SShowStudentList',
            otherData: {
                id: user,
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

    printClassMember = () => {
        tab.print();
    }
    </script>
</body>

</html>