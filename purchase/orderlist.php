<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.1/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/js/all.min.js"></script>
    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/alasql/4.2.2/alasql.min.js"></script>
    <!-- json util like sql -->
    <script src="https://unpkg.com/@popperjs/core@2"></script>
    <script src="https://unpkg.com/tippy.js@6"></script>
    <script src="https://unpkg.com/tabulator-tables@5.5.2/dist/js/tabulator.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/js/adminlte.min.js"></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.1/css/bootstrap.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/brands.min.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" />
    <link rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/select2-bootstrap-5-theme@1.3.0/dist/select2-bootstrap-5-theme.min.css" />
    <link rel="stylesheet" href="https://unpkg.com/tabulator-tables@5.5.2/dist/css/tabulator.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/css/adminlte.min.css">


</head>

<body>
    <div class="p-3">
        <section class="content">
            <div class="row">
                <div class="card card-outline card-primary">
                    <div class="card-header">
                        <h3 class="card-title">
                            <div class="input-group mb-3">
                                <!-- <button class="btn btn-outline-secondary" type="button">배송지선택</button>
                                    &nbsp;&nbsp; -->
                                <select class="form-select form-control-sm" id="idPorList"
                                    data-placeholder="Choose Items" style="width: 120px">
                                </select>
                                &nbsp;
                                <input class="form-control form-control-sm" id="idID" type="text" placeholder="ID">
                                &nbsp;
                                <input class="form-control form-control-sm" id="idName" type="text" placeholder="Name">
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
                                <input class="form-control form-control-sm" id="idFinish" type="text" placeholder="구매완료"
                                    style="width: 100px;">
                                &nbsp;
                                <input class="form-control form-control-sm" id="idRdate" type="text" placeholder="구매일"
                                    style="width: -5px;">
                                &nbsp;
                                <button class="btn btn-outline-primary btn-sm" type="button"
                                    onclick="execDaumPostcode()">
                                    주소찾기</button>
                                &nbsp;
                                <button class="btn btn-outline-success btn-sm" type="button" onclick="AddBranch()">배송지추가
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

                        <div id="porTableDiv"></div>
                    </div>

                </div>

            </div>
        </section>
    </div>

    <script>
    var table, table1, porTable;
    var items = [];
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
                // {
                //     formatter: deleteIcon,
                //     width: 40,
                //     hozAlign: "center",
                //     cellClick: function(e, cell) {
                //         deleteRow(cell.getRow())
                //     }
                // },
            ],
        });

        orderList(null);

    });

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

                $("#idID").val(res[0]['id']);
                $("#idName").val(res[0]['order']);
                $("#idAddr").val(res[0]['addr']);
                $("#idRdate").val(res[0]['rdate']);
                $("#idFinish").val(res[0]['confirm'] == "0" ? "미완료" : "완료");

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
    </script>
</body>

</html>