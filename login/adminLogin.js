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
                width: 10,
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
                width: 120,
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
                width: 80,
                editor: true,
            },
            {
                title: "비밀번호",
                field: "password",
                width: 100,
                editor: false,
            },
            {
                title: "등록일",
                field: "rdate",
                width: 100,
                editor: false,
            },
            {
                title: "승인",
                field: "confirm",
                editor: "select",
                width: 120,
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