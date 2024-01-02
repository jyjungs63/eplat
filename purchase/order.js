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

