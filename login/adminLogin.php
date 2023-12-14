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
                                <select class="form-select form-control-sm" id="idDest" data-placeholder="Choose Items">
                                    <option val="va">전체</option>
                                    <option val="v4">원리스트</option>
                                    <option val="v5">주소지</option>
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

    <div class="modal" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modal Title</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <section class="content">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card card-outline card-info">
                                    <div class="card-header">
                                        <h3 class="card-title">
                                            <div class="input-group mb-3">
                                                <button class="btn btn-outline-secondary" type="button">Select
                                                    Items</button>
                                                <select class="form-select" id="idGrade"
                                                    data-placeholder="Choose Items">
                                                    <option val="va">전체</option>
                                                    <option val="v4">승인</option>
                                                    <option val="v4">미승인</option>
                                                </select>
                                            </div>
                                        </h3>
                                        <div class="card-tools">
                                            <button type="button" class="btn btn-tool btn-sm"
                                                data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                                                <i class="fas fa-minus"></i></button>
                                            <button type="button" class="btn btn-tool btn-sm" data-card-widget="remove"
                                                data-toggle="tooltip" title="Remove">
                                                <i class="fas fa-times"></i></button>
                                        </div>
                                    </div>
                                    <div class="card-body pad">
                                        <div class="d-flex align-items-end justify-content-end"
                                            style="margin-bottom: 10px;">
                                            <a id="anchorRead" href="javascript:orderBook()" class="btn btn-info"
                                                role="button" aria-disabled="true"><i
                                                    class="fa-solid fa-cart-shopping"></i></a>
                                        </div>

                                        <div id="idTable">

                                        </div>
                                        <div id="idTableConfirm" style="margin-top: 20px;">

                                        </div>

                                        <div id="idOrderConfirm" style="margin-top: 20px;">

                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </section>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-bs-dismiss="modal"
                        onclick="updateItem()">Update</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    <script src="../login/tabulator_js/kgardenlist.js"></script>
    <script>
    var table, table1, porTable;
    var items = [];
    var deleteIcon = function(cell, formatterParams) { //plain text value
        return "<i class='fa fa-trash'></i>";
    };

    document.addEventListener("DOMContentLoaded", function() {
        // Get the modal element by its ID
        var myModal = new bootstrap.Modal(document.getElementById('exampleModal'));

        table = new Tabulator("#idTable", {
            height: "490px",
            //data: kgardenlist,
            layout: "fitColumns",
            rowHeight: 40, //set rows to 40px height
            selectable: true, //make rows selectable
            columns: [{
                    formatter: "rowSelection",
                    field: "check",
                    width: 50,
                    titleFormatter: "rowSelection",
                    hozAlign: "left",
                    headerSort: false,
                    cellClick: function(e, cell) {
                        cell.getRow().toggleSelect();
                    }
                },
                {
                    title: "ID",
                    field: "id",
                    width: 100,
                    editor: "input",
                    editor: false,
                },
                {
                    title: "NAME",
                    field: "name",
                    width: 100,
                    editor: "input",
                    editor: false,
                },
                {
                    title: "Mobile",
                    field: "mobile",
                    width: 150,
                    editor: "list",
                    editor: false,
                },
                {
                    title: "주소",
                    field: "addr",
                    sorter: "input",
                    width: 300,
                    editor: true,
                },
                {
                    title: "우편번호",
                    field: "zipcode",
                    width: 150,
                    editor: true,
                },
                {
                    title: "비밀번호",
                    field: "password",
                    width: 150,
                    editor: false,
                },
                {
                    title: "등록일",
                    field: "rdate",
                    width: 150,
                    editor: false,
                },
                {
                    title: "승인",
                    field: "confirm",
                    editor: "select",
                    width: 150,
                    editorParams: { // 에디터 파라미터 설정
                        values: ["승인", "미승인"], // 콤보박스에 표시될 값들
                    },
                },

            ],
        });
        table1 = new Tabulator("#idOrderConfirm", {
            height: "300px",
            layout: "fitColumns",
            rowHeight: 40, //set rows to 40px height
            selectable: true, //make rows selectable
            columns: [{
                    title: "POR ID",
                    field: "por_id",
                    sorter: "number",
                    width: 350,
                    editor: false,
                    bottomCalcParams: {
                        precision: 0
                    }
                },
                {
                    title: "구매자",
                    field: "order",
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
                    title: "주소",
                    field: "addr",
                    editor: "input",
                    width: 150,
                    hozAlign: "right",
                },
                {
                    title: "Mobile",
                    field: "mobile",
                    editor: "input",
                    formatter: "money",
                    hozAlign: "right",
                    editor: false,

                },
                {
                    title: "rdate",
                    field: "rdate",
                    editor: "input",
                    hozAlign: "right",
                    editor: false,

                },
                {
                    title: "확인",
                    field: "confirm",
                    editor: "input",
                    hozAlign: "right",
                    editor: false,

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
                    title: "rdate",
                    field: "rdate",
                    editor: "input",
                    hozAlign: "right",
                    editor: false,

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

        confirmList(null);
        orderList(null);
        // Show the modal
        myModal.show();

        table1.on("rowClick", function(e, row) {
            listPor(row._row.data['por_id'])
            $("#exampleModal").modal('hide');
        });
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
                $("#idName").val(res[0]['order']);
                $("#idAddr").val(res[0]['addr']);
                $("#idRdate").val(res[0]['rdate']);
            },
            error: function(jqXFR, textStatus, errorThrown) {
                if (textStatus == "error") {
                    alert(loc + ' ' + textStatus);
                }
            }
        });
    }

    document.getElementById("idGrade").addEventListener("change", function() {
        // 선택된 옵션 가져오기
        var selectedOption = this.options[this.selectedIndex];

        // 선택된 옵션의 값(value) 가져오기
        var selectedValue = selectedOption.value;

        // 선택된 옵션의 텍스트 가져오기
        var selectedText = selectedOption.text;

        confirmList(selectedText);
    });

    confirmList = (value) => {
        var sel = 0;
        if (value != null) {
            if (value == "승인")
                sel = 1;
            else
                sel = 2;
        }

        var items = [];
        var data = {
            num: sel
        };

        $.ajax({
            url: "../Server/SShowConfirm.php",
            type: "POST",
            dataType: "json",
            data: data,
            success: function(resp) {
                resp.forEach(el => {
                    var jarr = {
                        "id": el['id'],
                        "name": el['name'],
                        "mobile": el['mobile'],
                        "addr": el['addr'],
                        "zipcode": el['zipcode'],
                        "password": el['password'],
                        "rdate": el['rdate'],
                        "confirm": el['confirm'] == 1 ? "승인" : "미승인",
                    }
                    items.push(jarr);
                });
                table.clearData()
                table.setData(items);
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

    orderList = () => {
        var data = {
            id: "manager"
        };

        $.ajax({
            url: "../Server/SShowOrderList.php",
            type: "POST",
            dataType: "json",
            data: JSON.stringify(data),
            success: function(resp) {
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
                });
                table1.clearData()
                table1.setData(items);
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
    updateItem = () => {

        var item = table.getSelectedData();

        item.forEach(el => {

            var jarr = {
                "id": el['id'],
                "name": el['name'],
                "mobile": el['mobile'],
                "addr": el['addr'],
                "zipcode": el['zipcode'],
                "password": el['password'],
                "rdate": el['rdate'],
                "confirm": el['confirm'] == "승인" ? 1 : 0,
            }
            items.push(jarr);

        })

        var data = {
            "item": items
        }

        $.ajax({
            url: "../Server/SShowConfirmUpdate.php",
            type: "POST",
            dataType: "json",
            data: JSON.stringify(data),
            success: function(resp) {},
            error: function(e) {
                alert('falure');
                $("#err").html(e).fadeIn();
            }
        });
    }
    </script>
</body>

</html>