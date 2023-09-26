<!DOCTYPE html>
<html lang='ko'>

<head>
    <meta charset="utf-8">

    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta http-equiv="Content-Script-Type" content="text/javascript">
    <meta http-equiv="Content-Style-Type" content="text/css">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <meta http-equiv="refresh" content="43200"><!-- 12hours 43200 -->
    <meta name="viewport"
        content="width=device-width, initial-scale=1.0, user-scalable=0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <meta name="format-detection" content="telephone=no" />

    <meta name="description" content="serpiko's HTML5 Template ver 2016.11.02" />
    <meta name="author" content="serpiko@hanmail.net ( http://serpiko.tistory.com )" />

    <!--
	<link rel="shortcut icon" href="favicon.ico">
	<link rel="apple-touch-icon" href="apple-touch-icon.png">
	-->

    <title>Document</title>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.1/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/js/all.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.1/css/bootstrap.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/brands.min.css" />

    <link href="https://unpkg.com/tabulator-tables@5.5.2/dist/css/tabulator.min.css" rel="stylesheet">
    <script type="text/javascript" src="https://unpkg.com/tabulator-tables@5.5.2/dist/js/tabulator.min.js"></script>

    <style>
        * {
            box-sizing: border-box;
            -moz-box-sizing: border-box;
            -webkit-box-sizing: border-box;
        }

        #wrap {
            padding: 10px;
        }

        .m-t-10 {
            margin-top: 10px;
        }

        .m-b-10 {
            margin-bottom: 10px;
        }

        .font-red {
            color: #FF0000;
        }
    </style>
</head>

<body>

    <div id="wrap">

        <div class='m-t-10 m-b-10'>
            Page: <select class='table-pagenation'>
                <option value='5'>5</option>
                <option value='10'>10</option>
                <option value='20'>20</option>
                <option value='30'>30</option>
            </select>

            <button type='button' id='download-xlsx'>download-xlsx</button>
            <button type='button' id='download-pdf'>download-pdf</button>

            Field:
            <select id="filter-field">
                <option></option>
                <option value="name">Name</option>
                <option value="progress">Progress</option>
                <option value="gender">Gender</option>
                <option value="rating">Rating</option>
                <option value="col">Favourite Colour</option>
                <option value="dob">Date Of Birth</option>
                <option value="car">Drives</option>
                <option value="function">Drives &amp;Rating &lt; 3</option>
            </select>

            Type:
            <select id="filter-type">
                <option value="=">=</option>
                <option value="<">&lt;</option>
                <option value="<=">&lt;=</option>
                <option value=">">&gt;</option>
                <option value=">=">&gt;=</option>
                <option value="!=">!=</option>
                <option value="like">like</option>
            </select>

            Value:
            <input id="filter-value" type="text" placeholder="value to filter">

            <button type='button' id='filter-clear'>Clear Filter</button>

            <button type='button' id="refresh">refresh</button>

        </div>



        <div id="example-table"></div>


    </div>

    <!-- script -->
    <!-- <script src="https://code.jquery.com/jquery-1.11.2.min.js"></script> -->
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script> -->
    <!-- Latest compiled and minified JavaScript -->
    <!-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"
        integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa"
        crossorigin="anonymous"></script> -->
    <!-- <script type="text/javascript" src="dist/js/tabulator.min.js"></script> -->
    <script type="text/javascript" src="http://oss.sheetjs.com/js-xlsx/xlsx.full.min.js"></script>

    <script>
        $(document).ready(function () {
            //////////////////////////////

            var _arrRowSelected_ID = [];
            var _arrRowSelected_NAME = [];
            var _lastSelected_NAME = "";

            // child table 배열
            var _arrPrevTableEl = [];

            // 중복된 배열을 검사하여 삭제 ( 토글했을때 삭제해줘야 하기 떄문에 )
            function duplicateArraySplice($element, $array) {
                var index = $array.indexOf($element);

                if (-1 === index) $array.push($element);
                else $array.splice(index, 1);
            }

            // 테이블의 현재 페이지를 reload 한다
            function currentPageReload($tgId) {
                var currentPage = $tgId.tabulator("getPage");
                $tgId.tabulator("setPage", currentPage);
                //$tgId.tabulator("setData");
            }

            //Generate print icon
            var printIcon = function (cell, formatterParams) { //plain text value
                return "<i class='fa fa-lg fa-plus-circle'></i>";
            };

            // var table = new Tabulator("#example-table", {
            // height: "311px",
            // layout: "fitColumns",
            // ajaxURL: "http://localhost:3000/login/tabulator_js/example.php",
            // progressiveLoad: "scroll",
            // paginationSize: 20,
            // placeholder: "No Data Set",
            //     columns: [
            //         { formatter: printIcon, field: "detail", width: 40, align: "center", resizable: false, headerSort: false, "cellClick": cellClick },
            //         { title: "Name", field: "name", sorter: "string", width: 200, "cellClick": cellClick },
            //         { title: "Progress", field: "progress", sorter: "number", formatter: "progress" },
            //         { title: "Gender", field: "gender", sorter: "string" },
            //         { title: "Rating", field: "rating", formatter: "star", align: "center", width: 100 },
            //         { title: "Favourite Color", field: "col", sorter: "string", sortable: false },
            //         { title: "Date Of Birth", field: "dob", sorter: "date", align: "center" },
            //         { title: "Driver", field: "car", align: "center", formatter: "tickCross", sorter: "boolean", "cellClick": cellClick },
            //     ],
            // });

        var table = new Tabulator("#example-table", {
                //height:205, // set height of table (in CSS or here), this enables the Virtual DOM and improves render speed dramatically (can be any valid css height value)
                height: "311px",
            layout: "fitColumns",
            ajaxURL: "http://localhost:3000/login/tabulator_js/ajaxprogressive.php",
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

                // 지속성 옵션
                persistentLayout: false, // 열 레이아웃 지속성 사용
                persistentSort: false, // 정렬 지속성 사용
                persistentFilter: false,
                selectablePersistence: false, // 롤링 선택 해제

                //선택
                selectable: true,

                ajaxRequesting: function () {

                    var key = Object.keys(_arrPrevTableEl);

                    if (0 < _arrPrevTableEl.length) {

                        if (null != _arrPrevTableEl[key] || "undefined" != typeof _arrPrevTableEl[key]) {
                            _arrPrevTableEl[key].tabulator('destroy');
                            _arrPrevTableEl[key] = null;
                        }
                    }
                },
            });

            // 출력할 데이터 개수 변경
            $(".table-pagenation").on("change", function (e) {
                var value = parseInt($(e.currentTarget).val(), 10);
                $("#table").Tabulator("setPageSize", value);
            });

            //trigger download of data.xlsx file
            $("#download-xlsx").click(function () {
                $("#example-table").Tabulator("download", "xlsx", "data.xlsx", { sheetName: "My Data" });
            });

            //trigger download of data.pdf file
            $("#download-pdf").click(function () {
                $("#example-table").Tabulator("download", "pdf", "data.pdf", {
                    orientation: "portrait", //set page orientation to portrait
                    title: "Example Report", //add title to report
                });
            });

            $("#refresh").click(function () {
                currentPageReload($("#example-table"));
            });

            //Custom filter example
            function customFilter(data) {
                return data.car && data.rating < 3;
            }

            //Trigger setFilter function with correct parameters
            function updateFilter() {

                var filter = $("#filter-field").val() == "function" ? customFilter : $("#filter-field").val();

                if ($("#filter-field").val() == "function") {
                    $("#filter-type").prop("disabled", true);
                    $("#filter-value").prop("disabled", true);
                } else {
                    $("#filter-type").prop("disabled", false);
                    $("#filter-value").prop("disabled", false);
                }

                $("#example-table").tabulator("setFilter", filter, $("#filter-type").val(), $("#filter-value").val());
            }

            //Update filters on value change
            $("#filter-field, #filter-type").change(updateFilter);
            $("#filter-value").keyup(updateFilter);

            //Clear filters on "Clear Filters" button click
            $("#filter-clear").click(function () {
                $("#filter-field").val("");
                $("#filter-type").val("=");
                $("#filter-value").val("");

                $("#example-table").tabulator("clearFilter");
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
                    tableEl  = $("<div id='tableEl'></div>");

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
                    _arrPrevTableEl[rowIdx] = new Tabulator("#tableEl",{
                    //_arrPrevTableEl[rowIdx] = tableEl.tabulator({
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

            //			window.setInterval(function(){
            //				currentPageReload( $("#example-table") );
            //			}, 5000);

            //////////////////////////////
        });	//end. rdy
    </script>
</body>

</html>