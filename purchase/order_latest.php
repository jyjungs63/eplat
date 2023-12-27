<!DOCTYPE html>
<html lang="utf-8">

<head>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/4.6.1/css/bootstrap.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/brands.min.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/css/adminlte.min.css">
    <link rel="stylesheet" href="https://unpkg.com/tabulator-tables@5.5.2/dist/css/tabulator.min.css">
    <script src="https://cdn.jsdelivr.net/npm/alasql@4"></script> <!-- json util like sql -->
    <link href="../common.css" rel="stylesheet">
    <style>

    </style>
</head>

<body>
    <div class="p-3">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h5>Purchase</h5>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active"><a href="#custom-tabs-one-profile">Purchase
                                    List</a></li>
                        </ol>
                    </div>
                </div>
            </div> <!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-outline card-info card-tabs">
                        <div class="card-header">
                            <h3 class="card-title">

                            </h3>
                            <ul class="nav nav-tabs" id="custom-tabs-one-tab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="custom-tabs-one-home-tab" data-toggle="pill"
                                        href="#custom-tabs-one-home" role="tab" aria-controls="custom-tabs-one-home"
                                        aria-selected="true">Order</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="custom-tabs-one-profile-tab" data-toggle="pill"
                                        href="#custom-tabs-one-profile" role="tab"
                                        aria-controls="custom-tabs-one-profile" aria-selected="false">Purchase List</a>
                                </li>
                            </ul>
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool btn-sm" data-card-widget="collapse"
                                    data-toggle="tooltip" title="Collapse">
                                    <i class="fas fa-minus"></i></button>
                                <button type="button" class="btn btn-tool btn-sm" data-card-widget="remove"
                                    data-toggle="tooltip" title="Remove">
                                    <i class="fas fa-times"></i></button>
                            </div>
                        </div>
                        <div class="card-body pad" id="cardMain">
                            <div class="tab-content" id="custom-tabs-one-tabContent">
                                <div class="tab-pane fade show active" id="custom-tabs-one-home" role="tabpanel"
                                    aria-labelledby="custom-tabs-one-home-tab">

                                    <div class="d-flex align-items-end justify-content-end"
                                        style="margin-bottom: 10px;">
                                        <div class="input-group mb-3">
                                            <button class="btn btn-outline-secondary btn-sm" type="button">Select
                                                Items</button>
                                            &nbsp;
                                            <select class="form-select form-control-sm" id="idGrade"
                                                style="width: 100px;" data-placeholder="Choose Items">
                                                <option val="va">전체</option>
                                                <option val="v4">4세</option>
                                                <option val="v5">5세</option>
                                                <option val="v6">6세</option>
                                                <option val="v7">7세</option>
                                                <option val="ve">교구</option>
                                            </select>
                                        </div>
                                        <a id="anchorRead" href="javascript:orderPrint()" class="btn btn-warning"
                                            role="button" data-toggle="tooltip" title="Order and PDF file"
                                            aria-disabled="true"><i class="fa-solid fa-print"></i></a>
                                        &nbsp;&nbsp;

                                        <a id="anchorRead" href="javascript:orderBook()" class="btn btn-info"
                                            role="button" data-toggle="tooltip" title="Add to Cart "
                                            aria-disabled="true"><i
                                                class="fa-solid fa-cart-shopping"></i></a>&nbsp;&nbsp;
                                        <a id="anchorRead" href="javascript:selectAll()" class="btn btn-success"
                                            role="button" data-toggle="tooltip" title="Select All"
                                            aria-disabled="true"><i class="fa-solid fa-save"></i></a>
                                    </div>

                                    <div id="idTable">

                                    </div>
                                    <div class="d-flex align-items-end justify-content-end" style="margin-top: 10px;">
                                        <div align="center">

                                        </div>
                                    </div>

                                    <div id="idTableConfirm" style="margin-top: 10px;">

                                    </div>
                                </div>
                                <div class="tab-pane fade" id="custom-tabs-one-profile" role="tabpanel"
                                    aria-labelledby="custom-tabs-one-profile-tab">
                                    <div class="input-group mb-3">
                                        <!-- <button class="btn btn-outline-secondary" type="button">배송지선택</button>
                                    &nbsp;&nbsp; -->
                                        <select class="form-select form-control-sm" id="idPorList"
                                            data-placeholder="Choose Items" style="width: 120px">
                                        </select>
                                        &nbsp;
                                        <input class="form-control form-control-sm" id="idID2" type="text"
                                            placeholder="ID">
                                        &nbsp;
                                        <input class="form-control form-control-sm" id="idName2" type="text"
                                            placeholder="Name">
                                        &nbsp;
                                        <input class="form-control form-control-sm" id="idOwner2" type="text"
                                            placeholder="Owner">&nbsp;
                                        <input class="form-control form-control-sm" id="idPasswd2" type="text"
                                            placeholder="Password">
                                        &nbsp;
                                        <input class="form-control form-control-sm" id="idMobile2" type="text"
                                            placeholder="Mobile">
                                        &nbsp;
                                        <input class="form-control form-control-sm" id="idAddr2" type="text"
                                            placeholder="Address" style="width: 150px;">
                                        &nbsp;
                                        <input class="form-control form-control-sm" id="idFinish2" type="text"
                                            placeholder="구매완료" style="width: 100px;">
                                        &nbsp;
                                        <input class="form-control form-control-sm" id="idRdate2" type="text"
                                            placeholder="구매일" style="width: -5px;">
                                        &nbsp;
                                        <button class="btn btn-outline-primary btn-sm" type="button"
                                            onclick="execDaumPostcode('idZip','idAddr2' )">
                                            주소찾기</button>
                                        &nbsp;
                                        <button class="btn btn-outline-success btn-sm" type="button"
                                            onclick="AddBranch()">배송지추가
                                        </button>
                                    </div>
                                    <div id="porTableDiv"></div>
                                </div>
                            </div>
                        </div>
                        <!-- <div class="card-footer">

                        </div> -->
                    </div>
                </div>
            </div>
        </section>
    </div>
    <div class="p-3">
        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-outline card-primary">
                        <div class="card-header">
                            <h3 class="card-title">
                                <div class="input-group mb-3">
                                    <!-- <button class="btn btn-outline-secondary" type="button">배송지선택</button>
                                    &nbsp;&nbsp; -->
                                    <select class="form-select form-control-sm" id="idDest"
                                        data-placeholder="Choose Items">
                                        <option val="va">전체</option>
                                        <option val="v4">원리스트</option>
                                        <option val="v5">주소지</option>
                                    </select>
                                    &nbsp;
                                    <input class="form-control form-control-sm" id="idID" type="text" placeholder="ID">
                                    &nbsp;
                                    <input class="form-control form-control-sm" id="idName" type="text"
                                        placeholder="Name">
                                    &nbsp;
                                    <input class="form-control form-control-sm" id="idOwner" type="text"
                                        placeholder="Owner">&nbsp;
                                    <input class="form-control form-control-sm" id="idPasswd" type="text"
                                        placeholder="Password">
                                    &nbsp;
                                    <input class="form-control form-control-sm" id="idMobile" type="text"
                                        placeholder="Mobile">
                                    &nbsp;
                                    <input class="form-control form-control-sm" id="idAddr" type="text"
                                        placeholder="Address" style="width: 150px;">
                                    &nbsp;
                                    <input class="form-control form-control-sm" id="idZip" type="text"
                                        placeholder="Zip Code" style="width: -5px;">
                                    &nbsp;
                                    <button class="btn btn-outline-primary btn-sm" type="button"
                                        onclick="execDaumPostcode('idAddr','idZip')">
                                        주소찾기</button>
                                    &nbsp;
                                    <button class="btn btn-outline-success btn-sm" type="button"
                                        onclick="AddBranch()">배송지추가
                                    </button>
                                </div>
                            </h3>
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool btn-sm" data-card-widget="collapse"
                                    data-toggle="tooltip" title="Collapse">
                                    <i class="fas fa-minus"></i></button>
                                <button type="button" class="btn btn-tool btn-sm" data-card-widget="remove"
                                    data-toggle="tooltip" title="Remove">
                                    <i class="fas fa-times"></i></button>
                            </div>
                        </div>
                        <div class="card-body " id="cardDest">

                            <div id="idTableDest" style="margin-top: 10px;">

                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="card card-outline card-primary">
                    <div class="card-header">
                        <h3 class="card-title">
                            Purchase List
                        </h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool btn-sm" data-card-widget="collapse"
                                data-toggle="tooltip" title="Collapse">
                                <i class="fas fa-minus"></i></button>
                            <button type="button" class="btn btn-tool btn-sm" data-card-widget="remove"
                                data-toggle="tooltip" title="Remove">
                                <i class="fas fa-times"></i></button>
                        </div>
                    </div>
                    <div class="card-body " id="cardPDF">
                        <iframe id="pdfDiv" style="width: 100%; height: 900px"></iframe>
                    </div>

                </div>
            </div>

        </section>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/4.6.1/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/js/all.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/js/adminlte.min.js"></script>
    <script src="https://unpkg.com/tabulator-tables@5.5.2/dist/js/tabulator.min.js"></script>
    <!-- <link href="tabulator-master/dist/css/tabulator_midnight.css" rel="stylesheet"> -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.4.0/jspdf.umd.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf-autotable/3.5.20/jspdf.plugin.autotable.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/luxon/build/global/luxon.min.js"></script>
    <script src="listprice2.js"></script>

    <!-- <script src="https://unpkg.com/pdf-lib@1.4.0"></script> -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdf-lib/1.17.1/pdf-lib.min.js"></script>
    <script src="https://unpkg.com/@pdf-lib/fontkit@0.0.4/dist/fontkit.umd.min.js"></script>
    <script src="https://unpkg.com/downloadjs@1.4.7"></script>
    <script src="//t1.daumcdn.net/mapjsapi/bundle/postcode/prod/postcode.v2.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Faker/3.1.0/faker.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/chance/1.1.11/chance.min.js"></script>
    <script src="kgardenlist_2.js"></script>

    <script>
    const {
        PDFDocument,
        rgb
    } = PDFLib;
    // Create a new PDFDocument

    $(document).ready(function(e) {
        $("#cardDest").hide();
        $("#cardPDF").hide();
    });

    var deleteIcon = function(cell, formatterParams) { //plain text value
        return "<i class='fa fa-trash'></i>";
    };

    document.addEventListener("DOMContentLoaded", function() {
        // Get the modal element by its ID
        porTable = new Tabulator("#porTableDiv", {
            height: "490px",
            layout: "fitColumns",
            rowHeight: 40, //set rows to 40px height
            selectable: true, //make rows selectable
            columns: [

                // { title: "ID", field: "uid", width: 1lhs, editor: "input", editor: false, cellEdited: function (cell) { recal(cell); }, },
                {
                    title: "Grade",
                    field: "grade",
                    width: 150,
                    editor: "list",
                    editor: false,
                    editorParams: {
                        autocomplete: "true",
                        allowEmpty: true,
                        listOnEmpty: true,
                        valuesLookup: true
                    }
                },
                {
                    title: "품명",
                    field: "title",
                    sorter: "number",
                    width: 350,
                    editor: false,
                    bottomCalcParams: {
                        precision: 0
                    }
                },
                {
                    title: "단가",
                    field: "price",
                    sorter: "number",
                    width: 150,
                    editor: false,
                    hozAlign: "right",
                    formatterParams: {
                        thousand: ",",
                        precision: 0,
                    },
                },
                {
                    title: "Count",
                    field: "count",
                    editor: "input",
                    width: 150,
                    editor: false,
                    hozAlign: "right",
                    validator: "min:0",
                    editorParams: {
                        min: 0,
                        max: 1000, // Adjust min and max values as needed
                        step: 2,
                        elementAttributes: {
                            type: "number"
                        }
                    },
                    cellEdited: function(cell) {
                        calsum(cell);
                    },
                    bottomCalc: "sum"
                },
                {
                    title: "Total",
                    field: "total",
                    editor: "input",
                    formatter: "money",
                    hozAlign: "right",
                    editor: false,
                    formatterParams: {
                        thousand: ",",
                        precision: 0,
                    },
                    editorParams: {
                        elementAttributes: {
                            type: "number"
                        }
                    },
                    bottomCalc: "sum",
                    bottomCalcFormatterParams: {
                        formatter: "money",
                        precision: 0,
                        thousand: ","
                    }
                },
            ],
        });

        orderList(null);

    });
    orderList = () => {
        items = [];
        var data = {
            id: "manager"
        };

        $.ajax({
            url: "../Server/SShowOrderList.php",
            type: "POST",
            dataType: "json",
            data: JSON.stringify(data),
            success: function(resp) {
                let select = document.getElementById('idPorList');
                let option = document.createElement('option');
                option.text = ""; // Set the text of the new option
                option.value = ""; // Set the value attribute (if needed)
                select.add(option);
                resp.forEach(el => {
                    var jarr = {
                        "id": el['id'],
                        "por_id": el['por_id'],
                        "order": el['order'],
                        "addr": el['addr'],
                        "mobile": el['mobile'],
                        "rdate": el['rdate'],
                        "confirm": el['confirm'] == 1 ? "승인" : "미승인",
                    }
                    items.push(jarr);
                    // Create a new option element
                    let option = document.createElement('option');
                    option.text = el['por_id']; // Set the text of the new option
                    option.value = el['por_id']; // Set the value attribute (if needed)

                    // Append the new option to the select element
                    select.add(option);
                });
            },
            error: function(e) {
                alert('falure');
                $("#err").html(e).fadeIn();
            }
        });

        var deleteIcon = function(cell, formatterParams) { //plain text value
            return "<i class='fa fa-trash'></i>";
        };
    }

    listPor = (por_id) => {

        $.ajax({
            url: "../Server/SPorDetailList.php",
            type: "POST",
            dataType: "json",
            data: {
                id: por_id
            },
            success: function(res) {
                var js = res[0]['json']
                porTable.setData(JSON.parse(js));

                $("#idID2").val(res[0]['id']);
                $("#idName2").val(res[0]['order']);
                $("#idAddr2").val(res[0]['addr']);
                $("#idRdate2").val(res[0]['rdate']);
                $("#idFinish2").val(res[0]['confirm'] == "0" ? "미완료" : "완료");

            },
            error: function(jqXFR, textStatus, errorThrown) {
                if (textStatus == "error") {
                    alert(loc + ' ' + textStatus);
                }
            }
        });
    }

    document.getElementById("idPorList").addEventListener("change", function() {
        // 선택된 옵션 가져오기
        var selectedOption = this.options[this.selectedIndex];

        // 선택된 옵션의 값(value) 가져오기
        var selectedValue = selectedOption.value;

        // 선택된 옵션의 텍스트 가져오기
        var selectedText = selectedOption.text;

        listPor(selectedText);
    });

    var table = new Tabulator("#idTable", {
        height: "490px",
        data: listprice2,
        layout: "fitColumns",
        rowHeight: 40, //set rows to 40px height
        selectable: true, //make rows selectable
        columns: [

            // { title: "ID", field: "uid", width: 1lhs, editor: "input", editor: false, cellEdited: function (cell) { recal(cell); }, },
            {
                title: "Grade",
                field: "grade",
                width: 150,
                editor: "list",
                editor: false,
                editorParams: {
                    autocomplete: "true",
                    allowEmpty: true,
                    listOnEmpty: true,
                    valuesLookup: true
                }
            },
            {
                title: "품명",
                field: "title",
                sorter: "number",
                width: 350,
                editor: false,
                bottomCalcParams: {
                    precision: 0
                }
            },
            {
                title: "단가",
                field: "price",
                sorter: "number",
                width: 150,
                editor: false,
                hozAlign: "right",
                formatterParams: {
                    thousand: ",",
                    precision: 0,
                },
            },
            {
                title: "Count",
                field: "count",
                editor: "input",
                width: 150,
                hozAlign: "right",
                validator: "min:0",
                editorParams: {
                    min: 0,
                    max: 1000, // Adjust min and max values as needed
                    step: 2,
                    elementAttributes: {
                        type: "number"
                    }
                },
                cellEdited: function(cell) {
                    calsum(cell);
                },
                bottomCalc: "sum"
            },
            {
                title: "Total",
                field: "total",
                editor: "input",
                formatter: "money",
                hozAlign: "right",
                editor: false,
                formatterParams: {
                    thousand: ",",
                    precision: 0,
                },
                editorParams: {
                    elementAttributes: {
                        type: "number"
                    }
                },
                bottomCalc: "sum",
                bottomCalcFormatterParams: {
                    formatter: "money",
                    precision: 0,
                    thousand: ","
                }
            },
            {
                formatter: deleteIcon,
                width: 40,
                hozAlign: "center",
                cellClick: function(e, cell) {
                    deleteRow(cell.getRow())
                }
            },
        ],
    });

    var table1 = new Tabulator("#idTableConfirm", {
        height: "300px",
        layout: "fitColumns",
        rowHeight: 40, //set rows to 40px height
        selectable: true, //make rows selectable
        columns: [
            // { title: "ID", field: "uid", width: 1lhs, editor: "input", editor: false, cellEdited: function (cell) { recal(cell); }, },
            {
                title: "Grade",
                field: "grade",
                width: 150,
                editor: "list",
                editor: false,
                editorParams: {
                    autocomplete: "true",
                    allowEmpty: true,
                    listOnEmpty: true,
                    valuesLookup: true
                }
            },
            {
                title: "품명",
                field: "title",
                sorter: "number",
                width: 350,
                editor: false,
                bottomCalcParams: {
                    precision: 0
                }
            },
            {
                title: "단가",
                field: "price",
                sorter: "number",
                width: 150,
                editor: false,
                hozAlign: "right",
                formatterParams: {
                    thousand: ",",
                    precision: 0,
                },

            },
            {
                title: "수량",
                field: "count",
                editor: "input",
                width: 150,
                hozAlign: "right",
                validator: "min:0",
                editorParams: {
                    min: 0,
                    max: 150, // Adjust min and max values as needed
                    step: 2,
                    elementAttributes: {
                        type: "number"
                    }
                },
                cellEdited: function(cell) {
                    calsum(cell);
                },
                bottomCalc: "sum"
            },
            {
                title: "합계",
                field: "total",
                editor: "input",
                formatter: "money",
                hozAlign: "right",
                editor: false,
                formatterParams: {
                    thousand: ",",
                    precision: 0,
                },
                editorParams: {
                    elementAttributes: {
                        type: "number"
                    }
                },
                bottomCalc: "sum",
                bottomCalcFormatterParams: {
                    formatter: "money",
                    precision: 0,
                    thousand: ","
                }
            },
            {
                formatter: deleteIcon,
                width: 40,
                hozAlign: "center",
                cellClick: function(e, cell) {
                    deleteRow(cell.getRow())
                }
            },
        ],
    });

    var table2 = new Tabulator("#idTableDest", {
        height: "490px",
        data: kgardenlist,
        layout: "fitColumns",
        rowHeight: 40, //set rows to 40px height
        selectable: true, //make rows selectable
        columns: [{
                title: "No",
                field: "No",
                width: 150,
                editor: "input",
                editor: false,
                cellEdited: function(cell) {
                    recal(cell);
                },
            },
            {
                title: "name",
                field: "name",
                width: 250,
                editor: "list",
                editor: false,
                editorParams: {
                    autocomplete: "true",
                    allowEmpty: true,
                    listOnEmpty: true,
                    valuesLookup: true
                }
            },
            {
                title: "owner",
                field: "owner",
                width: 250,
                editor: "list",
                editor: false,
                editorParams: {
                    autocomplete: "true",
                    allowEmpty: true,
                    listOnEmpty: true,
                    valuesLookup: true
                }
            },
            {
                title: "address",
                field: "addr",
                sorter: "number",
                width: 550,
                editor: false,
                bottomCalcParams: {
                    precision: 0
                }
            },
            {
                title: "mobile",
                field: "mobile",
                sorter: "number",
                width: 150,
                editor: false,
                bottomCalcParams: {
                    precision: 0
                }
            },
            // { title: "password", field: "password", sorter: "number", width: 250, editor: false, bottomCalcParams: { precision: 0 } },
            {
                title: "rdate",
                field: "rdate",
                sorter: "number",
                width: 150,
                editor: false,
                bottomCalcParams: {
                    precision: 0
                }
            },
        ],
    });

    table2.on("rowClick", function(e, row) {
        //e - the click event object
        //table2.deselectRow();

        $("#idName").val(row._row.data['name']);
        $("#idOwner").val(row._row.data['owner']);
        $("#idMobile").val(row._row.data['mobile']);
        $("#idAddr").val(row._row.data['addr']);
        //table2.selectRow(Number(row._row.position));
        table2.selectRow(1);
        //alert(Number(row._row.position));
    });

    function calsum(cell) {
        var row = cell.getRow();
        var rowData = row.getData();
        var sum = Number(rowData.count) * Number(rowData.price);
        row.update({
            total: sum,
            check: true
        });
        if (Number(rowData.count) > 0)
            row.select();
        // else
        //     row.unselect();
        var parent = $(".tabulator-calcs-bottom").find('div:first').html("<p>합계</p>");
    }

    function deleteRow(row) {
        row.delete();
    }

    orderBook = () => {
        var item = table.getSelectedData();
        item.forEach(el => {
            if (Number(el['count']) > 0) {
                var jarr = {
                    "uid": el['uid'],
                    "grade": el['grade'],
                    "title": el['title'],
                    "price": el['price'],
                    "count": el['count'],
                    "total": el['total']
                }
                table1.addRow(jarr);
            }
        })
        var parent = $(
                "#idTableConfirm > div.tabulator-footer > div.tabulator-calcs-holder > div > div:nth-child(1)")
            .html("총합");
        //table1.setData(item);
    }

    var orderPrint = () => {

        makePurchasePDFList();

        $("#cardMain").toggle();
        $("#cardDest").hide();
        $("#cardPDF").show();

    }

    document.getElementById("idDest").addEventListener("change", function() {
        // 선택된 옵션 가져오기
        var selectedOption = this.options[this.selectedIndex];

        // 선택된 옵션의 값(value) 가져오기
        var selectedValue = selectedOption.value;

        // 선택된 옵션의 텍스트 가져오기
        var selectedText = selectedOption.text;

        // 결과 출력
        console.log("Selected Value:", selectedValue);
        console.log("Selected Text:", selectedText);

        var items = [];
        var sql;
        if ("주소지" == selectedText) {
            var items = [];
            var data = {
                role: 2,
                id: "manager"
            };
            $.ajax({
                url: "../../Server/SShowMgr.php",
                type: "POST",
                dataType: "json",
                data: data,
                success: function(resp) {
                    var i = 1;
                    resp.forEach(el => {
                        var jarr = {
                            "No": i,
                            "name": el['name'],
                            "mobile": el['mobile'],
                            "addr": el['addr'],
                            "zipcode": el['zipcode'],
                            "password": el['password'],
                            "rdate": el['rdate'],
                        }

                        items.push(jarr);
                        i++;
                    });
                    table2.clearData();
                    table2.setData(items);
                },
                error: function(e) {
                    alert('falure');
                    $("#err").html(e).fadeIn();
                }
            });
        } else {
            table2.clearData();
            table2.setData(kgardenlist);
        }

    });

    document.getElementById("idGrade").addEventListener("change", function() {
        // 선택된 옵션 가져오기
        var selectedOption = this.options[this.selectedIndex];

        // 선택된 옵션의 값(value) 가져오기
        var selectedValue = selectedOption.value;

        // 선택된 옵션의 텍스트 가져오기
        var selectedText = selectedOption.text;

        // 결과 출력
        console.log("Selected Value:", selectedValue);
        console.log("Selected Text:", selectedText);

        var items = [];
        var sql;
        if ("전체" == selectedText)
            sql = 'select uid, grade,title,price from ?  order by uid '
        else
            sql = 'select uid, grade,title,price from ? where grade="' + selectedText + '" order by uid asc'
        var res = alasql(sql, [listprice2])

        res.forEach(el => {
            var jarr = {
                "uid": el['uid'],
                "grade": el['grade'],
                "title": el['title'],
                "price": el['price']
            }
            items.push(jarr);
        });
        table.clearData()
        table.setData(items);
        console.log(items);
    });

    async function makePurchasePDFList() {

        const pdfDoc = await PDFDocument.create()

        pdfDoc.registerFontkit(fontkit)
        const fontBytes = await fetch('NanumBarunGothic.ttf').then((res) => res.arrayBuffer());
        const customFont = await pdfDoc.embedFont(fontBytes);

        const page = pdfDoc.addPage()
        const {
            width,
            height
        } = page.getSize()
        const fontSize = 12

        page.setFont(customFont);
        page.setFontSize(fontSize);

        //
        var buyArr = [];
        var item = table1.getSelectedData();
        item.forEach(el => {
            if (Number(el['count']) > 0) {
                var jarr = {
                    "uid": el['uid'],
                    "grade": el['grade'],
                    "title": el['title'],
                    "price": el['price'].toString(),
                    "count": el['count'].toString(),
                    "total": el['total'].toString()
                }
                buyArr.push(jarr)
            }
        })
        //
        var xx = (510 / 5);
        var lineStart = height - 4 * fontSize; //  y axis start point of drawing
        var textStart = height - 4 * fontSize + 5; //  y axis start point of drawing
        var lineStep = fontSize * 1.7;
        var lhs = 50,
            lhe = 560,
            mn = 10;


        var s = {
            x: lhs,
            y: lineStart
        };
        var e = {
            x: lhe,
            y: lineStart
        };

        tick = 1.;
        drawLines(page, s, e, rgb(0, 0, 0), tick);

        var header = ['Grade', 'Title', 'Price', 'Count', 'Total', ''];

        for (var i = 0; i < 6; i++) { // vertical line 

            var s = {
                x: lhs + (xx * i),
                y: lineStart - (lineStep * 0)
            };
            var e = {
                x: lhs + (xx * i),
                y: lineStart - (lineStep * (buyArr.length + 1))
            };

            if (i == 0 || i == 5)
                tick = 1.;
            else
                tick = 0.5;

            drawLines(page, s, e, rgb(0, 0, 0), tick);

            drawTexts(page, lhs + (xx * i) + mn, textStart - (lineStep * 1), fontSize, rgb(0.0, 0.0, 0.0), header[
                i]);
        }

        drawTexts(page, width / 2.5, height - 3 * fontSize, fontSize, rgb(0.0, 0.0, 0.0), "Purchase Order List")

        for (var i = 0; i <= buyArr.length + 1; i++) { // x horizontal line 

            s = {
                x: lhs,
                y: lineStart - (lineStep * i)
            };
            e = {
                x: lhe,
                y: lineStart - (lineStep * i)
            };

            if (i == buyArr.length) {
                tick = 0.5;
                drawLines(page, s, e, rgb(0, 0, 0), tick);
            } else if (i == buyArr.length + 1) {
                tick = 1.0;
                drawLines(page, s, e, rgb(0, 0, 0), tick);

                var name = $(
                    "#idTableConfirm > div.tabulator-footer > div.tabulator-calcs-holder > div > div:nth-child(1)"
                ).html();
                var cnt = $(
                    "#idTableConfirm > div.tabulator-footer > div.tabulator-calcs-holder > div > div:nth-child(4)"
                ).html()
                var total = $(
                    "#idTableConfirm > div.tabulator-footer > div.tabulator-calcs-holder > div > div:nth-child(5)"
                ).html()
                var rest = cvtCurrency(parseFloat(total));
                drawTexts(page, lhs + (xx * 0) + mn, textStart - (lineStep * (i + 2)), fontSize, rgb(0.0, 0.0, 1.0),
                    "총금액");
                drawTexts(page, lhs + (xx * 1) + mn, textStart - (lineStep * (i + 2)), fontSize, rgb(0.0, 0.0, 1.0),
                    "");
                drawTexts(page, lhs + (xx * 2) + mn, textStart - (lineStep * (i + 2)), fontSize, rgb(0.0, 0.0, 1.0),
                    "");
                drawTexts(page, lhs + (xx * 3) + mn, textStart - (lineStep * (i + 2)), fontSize, rgb(0.0, 0.0, 1.0),
                    cnt);
                drawTexts(page, lhs + (xx * 4) + mn, textStart - (lineStep * (i + 2)), fontSize, rgb(0.0, 0.0, 1.0),
                    rest)
                s = {
                    x: lhs,
                    y: lineStart - (lineStep * (i + 2))
                };
                e = {
                    x: lhe,
                    y: lineStart - (lineStep * (i + 2))
                };
                drawLines(page, s, e, rgb(0, 0, 0), tick);
            } else {
                tick = 0.5;
                if (i == 1)
                    tick = 1.0;
                drawLines(page, s, e, rgb(0, 0, 0), tick);

                drawTexts(page, lhs + (xx * 0) + mn, textStart - (lineStep * (i + 2)), fontSize, rgb(0.0, 0.0, 0.0),
                    buyArr[i]['grade']);
                drawTexts(page, lhs + (xx * 1) + mn, textStart - (lineStep * (i + 2)), fontSize, rgb(0.0, 0.0, 0.0),
                    buyArr[i]['title']);
                drawTexts(page, lhs + (xx * 2) + mn, textStart - (lineStep * (i + 2)), fontSize, rgb(0.0, 0.0, 0.0),
                    cvtCurrency(parseFloat(buyArr[i]['price'])));
                drawTexts(page, lhs + (xx * 3) + mn, textStart - (lineStep * (i + 2)), fontSize, rgb(0.0, 0.0, 0.0),
                    buyArr[i]['count']);
                drawTexts(page, lhs + (xx * 4) + mn, textStart - (lineStep * (i + 2)), fontSize, rgb(0.0, 0.0, 0.0),
                    cvtCurrency(parseFloat(buyArr[i]['total'])));
            }
        }


        // Serialize the PDFDocument to bytes (a Uint8Array)

        const pngUrl = 'https://www.eplat.co.kr/assets/img/logo.png'

        const pngImageBytes = await fetch(pngUrl).then((res) => res.arrayBuffer())

        const pngImage = await pdfDoc.embedPng(pngImageBytes)

        const pngDims = pngImage.scale(0.07)

        page.drawImage(pngImage, {
            x: pngDims.width - 10,
            y: page.getHeight() - 30,
            width: pngDims.width,
            height: pngDims.height,
        })

        // 베송지
        drawTexts(page, 100, 250, 12, rgb(0., 0., 0.), "배송지:");
        drawTexts(page, 150, 250, 12, rgb(0., 0., 0.), $("#idName").val());
        drawTexts(page, 250, 250, 12, rgb(0., 0., 0.), $("#idMobile").val());
        drawTexts(page, 300, 300, 12, rgb(0., 0., 0.), formatDate());
        drawTexts(page, 100, 200, 12, rgb(0., 0., 0.), $("#idAddr").val());
        drawTexts(page, 150, 200, 12, rgb(0., 0., 0.), $("#idZip").val());


        const pdfBytes = await pdfDoc.save()


        // Trigger the browser to download the PDF document
        //download(pdfBytes, "pdf-lib_creation_example.pdf", "application/pdf");

        // 예시: fetch를 사용한 파일 업로드

        const formData = new FormData();
        formData.append('pdfFile', new Blob([pdfBytes]), 'generated_pdf.pdf');
        item = table1.getSelectedData();
        var porList = []
        item.forEach(el => {
            var jarr = {
                "uid": el['uid'],
                "grade": el['grade'],
                "title": el['title'],
                "price": el['price'],
                "count": el['count'],
                "total": el['total']
            }
            porList.push(jarr);
        });
        formData.append('id', 'manager');
        formData.append('order', chance.string({
            length: 8,
            casing: 'upper',
            alpha: true,
            numeric: true
        }));
        formData.append('addr', chance.address());
        formData.append('mobile', chance.address());
        formData.append('postlist', JSON.stringify(porList));
        formData.append('porid', 'P-' + formatDate() + "-" + chance.string({
            length: 8,
            casing: 'upper',
            alpha: true,
            numeric: true
        }))
        // fetch('../Server/SUploadBoardPDF.php', {
        //     //fetch('./data.php', {
        //     method: 'POST',
        //     body: formData,
        // })
        //     .then(response => {
        //         if (!response.ok) {
        //             throw new Error('Network response was not ok');
        //         }
        //         return response.json();

        //     }).then(data => {
        //         // Process the fetched data
        //         ///alert(data);
        //         document.getElementById('pdfDiv').src = data['url'];
        //     })
        //     .catch(error => {
        //         alert('error');
        //         // 오류 처리
        //     });
        $.ajax({
            url: '../Server/SUploadBoardPDF.php',
            type: "POST",
            processData: false,
            contentType: false,
            data: formData,
            success: function(response) {
                document.getElementById('pdfDiv').src = response['url'];
            },
            error: function(e) {
                alert('falure');
            }
        })


        //const pdfDataUri = await pdfDoc.saveAsBase64({ dataUri: true });

    }

    function formatDate() {
        const date = new Date(); // Get current date
        const year = date.getFullYear();
        const month = String(date.getMonth() + 1).padStart(2, '0'); // Adding leading zero if needed
        const day = String(date.getDate()).padStart(2, '0'); // Adding leading zero if needed

        return `${year}-${month}-${day}`;
    }
    drawLines = (page, s, e, color, thick) => {
        page.drawLine({
            start: {
                x: s.x,
                y: s.y
            },
            end: {
                x: e.x,
                y: e.y
            },
            color: color, // 선 색상 설정 (RGB)
            thickness: thick, // 선 두께 설정
        });
    }

    drawTexts = (page, x, y, fontSize, color, text) => {
        page.drawText(text, {
            x: x,
            y: y,
            size: fontSize,
            // font: timesRomanFont,
            color: color,
        })
    }
    selectAll = () => {
        //var parent = $("#idTableConfirm > div.tabulator-footer > div.tabulator-calcs-holder > div > div:nth-child(1)").val("총합");
        //var parent = $(".tabulator-calcs-bottom").find('div:first').html("<p>합계</p>");
        table1.selectRow();

        var rows = table1.getRows();

        rows.forEach(function(row) {
            if (row.getData().name === "Summary") {
                // 요약 행 발견
                var summaryRow = row;
                // 여기에서 요약 행에 대한 처리 수행
                console.log("Summary Row:", summaryRow.getData());
            }
        });
    }

    function cvtCurrency(amount) {
        return amount.toLocaleString("ko-KR");
    }

    function execDaumPostcode() {
        new daum.Postcode({
                oncomplete: function(data) {
                    // 팝업에서 검색결과 항목을 클릭했을때 실행할 코드를 작성하는 부분입니다.

                    // 각 주소의 노출 규칙에 따라 주소를 조합한다.
                    // 내려오는 변수가 값이 없는 경우엔 공백('')값을 가지므로, 이를 참고하여 분기 한다.
                    let addr = ''; // 주소 변수

                    //사용자가 선택한 주소 타입에 따라 해당 주소 값을 가져온다.
                    if (data.userSelectedType === 'R') {
                        // 사용자가 도로명 주소를 선택했을 경우
                        addr = data.roadAddress;
                    } else {
                        // 사용자가 지번 주소를 선택했을 경우(J)
                        addr = data.jibunAddress;
                    }

                    $("#idZip").val(data.zonecode);
                    $("#idAddr").val(addr);
                    $("#idAddr").focus();
                }
            }

        ).open();
    }
    </script>

</body>

</html>