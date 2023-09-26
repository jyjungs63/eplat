<!DOCTYPE html>
<html lang="en">

<head>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.1/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/js/all.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.1/css/bootstrap.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/brands.min.css" />

    <link href="https://unpkg.com/tabulator-tables@5.5.2/dist/css/tabulator.min.css" rel="stylesheet">
    <script type="text/javascript" src="https://unpkg.com/tabulator-tables@5.5.2/dist/js/tabulator.min.js"></script>
</head>

<body>
    <div class="col-lg-12 shadow m-6 rounded d-flex align-items-center justify-content-around">
        <div id="example-table" style="width: 100%;"></div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/luxon/build/global/luxon.min.js"></script>


    <script>
        //sample data
        var printIcon = function (cell, formatterParams) { //plain text value
                return "<i class='fa fa-lg fa-plus-circle'></i>";
            };
        //Build Tabulator
        var table = new Tabulator("#example-table", {
            height: "311px",
            layout: "fitColumns",
            ajaxURL: "http://localhost:3000/login/tabulator_js/example.php",
            ajaxConfig: "POST",
            ajaxParams: { func: "first_data" },
            progressiveLoad: "scroll",
            paginationSize: 20,
            placeholder: "No Data Set",
            columns: [
                    { formatter: printIcon, field: "detail", width: 40, align: "center", resizable: false, headerSort: false, "cellClick": cellClick },
                    { title: "Name", field: "name", sorter: "string", width: 200, "cellClick": cellClick },
                    { title: "Progress", field: "progress", sorter: "number", formatter: "progress" },
                    { title: "Gender", field: "gender", sorter: "string" },
                    { title: "Rating", field: "rating", formatter: "star", align: "center", width: 100 },
                    { title: "Favourite Color", field: "col", sorter: "string", sortable: false },
                    { title: "Date Of Birth", field: "dob", sorter: "date", align: "center" },
                    { title: "Driver", field: "car", align: "center", formatter: "tickCross", sorter: "boolean", "cellClick": cellClick },
                ],
            // columns: [
            //     { title: "Name", field: "name", sorter: "string", width: 200 },
            //     { title: "Progress", field: "progress", sorter: "number", formatter: "progress" },
            //     { title: "Gender", field: "gender", sorter: "string" },
            //     { title: "Rating", field: "rating", formatter: "star", hozAlign: "center", width: 100 },
            //     { title: "Favourite Color", field: "col", sorter: "string" },
            //     { title: "Date Of Birth", field: "dob", sorter: "date", hozAlign: "center" },
            //     { title: "Driver", field: "car", hozAlign: "center", formatter: "tickCross", sorter: "boolean" },
            // ],
        });
        function cellClick(e, cell) {

//cell.getData()

var $tgEl = $(e.currentTarget),
    $rowEl = $tgEl.parent(),
    rowIdx,

    //
    holderEl,
    buttonEl,
    tableEl;

/**
* rowIdx
* id [ intrger ] 로 각 데이터 번호를 unique 하게받아서 사용 => 배열에 사용할 값
* 만약 없다면 그냥 row 순서로 사용한다..
*/
rowIdx = cell.getRow().getData().id;
if (typeof rowIdx == "undefined") {
    rowIdx = parseInt($rowEl.index(), 10);
}


//
if (null == _arrPrevTableEl[rowIdx]) {

    //create and style holder elements
    holderEl = $("<div class='holderEl'></div>");
    buttonEl = $("<div class='buttonEl m-b-5'><button type='button' class='btn btn-success m-r-5 add_btn'>서버등록</button><button type='button' class='btn btn-danger del_btn'>삭제</button>");
    tableEl = $("<div></div>");

    holderEl.css({
        "display": "none",
        "box-sizing": "border-box",
        "padding": "10px 30px 10px 10px",
        "border-top": "1px solid #333",
        "border-bottom": "1px solid #333",
        "background": "#ddd",
    });

    holderEl.append(buttonEl);
    holderEl.append(tableEl);

    cell.getRow().getElement().append(holderEl);

    $tgEl.find("i").removeClass("fa-plus-circle").addClass("fa-minus-circle font-red");

    $(holderEl).slideDown();

    //
    _arrPrevTableEl[rowIdx] = tableEl.tabulator({
        height: "100%",
        layout: "fitDataFill",
        movableColumns: true,
        tooltips: true,
        pagination: "remote",
        ajaxURL: "example.php",
        ajaxConfig: "POST",
        ajaxParams: { func: "second_data" },
        paginationSize: 5,
        placeholder: "No Data Set",
        columns: [
            { title: "id", field: "id", visible: false },
            { title: "Name", field: "name", sorter: "string", width: 200 },
            { title: "Progress", field: "progress", sorter: "number", formatter: "progress" },
            { title: "Gender", field: "gender", sorter: "string" },
            { title: "Rating", field: "rating", formatter: "star", align: "center", width: 100 },
            { title: "Favourite Color", field: "col", sorter: "string", sortable: false },
            { title: "Date Of Birth", field: "dob", sorter: "date", align: "center" },
            { title: "Driver", field: "car", align: "center", formatter: "tickCross", sorter: "boolean" },

        ],

        //선택
        selectable: true,

        rowClick: function (e, row) { //trigger an alert message when the row is clicked
            //row.toggleSelect();

            var id = row.getData().id;
            //var name = row.getData().pools;

            //
            duplicateArraySplice(id, _arrRowSelected_ID);
            //duplicateArraySplice(name, _arrRowSelected_NAME);


        },

        renderComplete: function () {
            //window.setTimeout(function(){
            //$(".make-switch input").bootstrapSwitch();
            //}, 1000);
        },

    });
} else {

    $tgEl.find("i").removeClass("fa-minus-circle font-red").addClass("fa-plus-circle");

    holderEl = $rowEl.find(".holderEl");
    holderEl.slideUp();

    _arrPrevTableEl[rowIdx].tabulator("destroy");
    _arrPrevTableEl[rowIdx] = null;

}
}
    </script>
</body>


</html>