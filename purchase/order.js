
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

var table1 = new Tabulator("#idTableConfirm", { //구매 확정된 Table
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

listPor = (por_id) => {

    var options = {
        functionName: 'SPorDetailList',
        otherData: {
            id: por_id
        }
    };
    dispList = (res) => {
        var js = res[0]['json']
        porTable.setData(JSON.parse(js));

        var cnt = $("#porTableDiv > div.tabulator-footer > div.tabulator-calcs-holder > div > div:nth-child(4)").html()
        var sum = $("#porTableDiv > div.tabulator-footer > div.tabulator-calcs-holder > div > div:nth-child(5)").html()
        $("#porTableDiv > div.tabulator-footer > div.tabulator-calcs-holder > div > div:nth-child(1)").html("총합")
        $("#porTableDiv > div.tabulator-footer > div.tabulator-calcs-holder > div > div:nth-child(4)").html(parseInt(cnt/2));
        $("#porTableDiv > div.tabulator-footer > div.tabulator-calcs-holder > div > div:nth-child(5)").html(cvtCurrency(parseInt(sum/2)));
        $("#idID2").val(res[0]['id']);
        $("#idName2").val(res[0]['order']);
        $("#idAddr2").val(res[0]['addr']);
        $("#idRdate2").val(res[0]['rdate']);
        $("#idFinish2").val(res[0]['confirm'] == "0" ? "미완료" : "완료");
    }
    dispErr = (error) => {
        CallToast('SPorDetailList falure!', "error")
    }

    CallAjax("SMethods.php", "POST", options, dispList, dispErr);

}

listPorRange = (start, end) => {

    var options = {
        functionName: 'SPorDetailListRange',
        otherData: {
            start: start, end: end
        }
    };
    dispList = (res) => {
        porTable.clearData();
        res.forEach ( ell => {
            var json = JSON.parse(ell['json']);
            json.forEach(el => {
                if (Number(el['count']) > 0) {
                    var jarr = {
                        "uid": el['uid'],
                        "grade": el['grade'],
                        "title": el['title'],
                        "price": el['price'],
                        "count": el['count'],
                        "total": el['total']
                    }
                    porTable.addRow(jarr);
                }
            })
            //porTable.setData(JSON.parse(el['json']));       
        })

        var cnt = $("#porTableDiv > div.tabulator-footer > div.tabulator-calcs-holder > div > div:nth-child(4)").html()
        var sum = $("#porTableDiv > div.tabulator-footer > div.tabulator-calcs-holder > div > div:nth-child(5)").html()
        $("#porTableDiv > div.tabulator-footer > div.tabulator-calcs-holder > div > div:nth-child(1)").html("총합")
        $("#porTableDiv > div.tabulator-footer > div.tabulator-calcs-holder > div > div:nth-child(4)").html(parseInt(cnt/2));
        $("#porTableDiv > div.tabulator-footer > div.tabulator-calcs-holder > div > div:nth-child(5)").html(cvtCurrency(parseInt(sum/2)));

        $("#idID2").val(res[0]['id']);
        $("#idName2").val(res[0]['order']);
        $("#idAddr2").val(res[0]['addr']);
        $("#idRdate2").val(res[0]['rdate']);
        $("#idFinish2").val(res[0]['confirm'] == "0" ? "미완료" : "완료");
    }
    dispErr = (error) => {
        CallToast('SPorDetailList falure!', "error")
    }

    CallAjax("SMethods.php", "POST", options, dispList, dispErr);

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


    var sql;
    if ("주소지" == selectedText) {
        var items = [];
        var data = {
            role: 2,
            id: "manager"
        };

        dispList = (resp) => {
            var i = 1;
            var items = [];
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
            CallToast("SShowMgr success!!", "success");
        }
        dispErr = () => {
            //alert(error);
            CallToast("SShowMgr Error", "error");
        }

        var options = {
            functionName: 'SShowMgr',
            otherData: {
                role: 2,
                id: "manager"
            }
        };

        CallAjax("SMethods.php", "POST", options, dispList, dispErr);

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
        sql = 'select uid, grade,title,price from ? where grade="' + selectedText +
        '" order by uid asc'
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

var start = moment().startOf('week');
var end = moment().endOf('week');

function cb(start, end) {
    $('#reportrange span').html(start.format('YYYY/MM/DD') + ' - ' + end.format('YYYY/MM/DD'));
}

$('#reportrange').daterangepicker({
    startDate: start,
    endDate: end,
    locale: {
        format: 'YYYY-MM-DD', // 날짜 표시 형식
        separator: ' ~ ', // 날짜 범위 구분자
        applyLabel: '적용', // 적용 버튼 레이블
        cancelLabel: '취소', // 취소 버튼 레이블
        fromLabel: '부터', // 시작일 레이블
        toLabel: '까지', // 종료일 레이블
        customRangeLabel: '직접 선택', // 사용자 정의 범위 레이블
        weekLabel: '주', // 주 레이블
        daysOfWeek: ['일', '월', '화', '수', '목', '금', '토'], // 요일 배열
        monthNames: ['1월', '2월', '3월', '4월', '5월', '6월', '7월', '8월', '9월', '10월', '11월', '12월'], // 월 배열
        firstDay: 0 // 주의 시작 요일 (0: 일요일, 1: 월요일, ...)
    },
    ranges: {
        '오늘': [moment(), moment()],
        '어제': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
        '지난 7일': [moment().subtract(6, 'days'), moment()],
        '지난주': [moment().subtract(1, 'weeks').startOf('week'), moment().subtract(1, 'weeks').endOf(
            'week')],
        '이번주': [moment().startOf('week'), moment().endOf('week')],
        '다음주': [moment().add(1, 'weeks').startOf('week'), moment().add(1, 'weeks').endOf('week')],
        '지난 30일': [moment().subtract(29, 'days'), moment()],
        '이번달': [moment().startOf('month'), moment().endOf('month')],
        '지난달': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf(
            'month')]
    }
}, cb);


$('#reportrange').on('apply.daterangepicker', function(ev, picker) {

    listPorRange( picker.startDate.format('YYYY-MM-DD'), picker.endDate.format('YYYY-MM-DD') )
    console.log(picker.startDate.format('YYYY-MM-DD'));
    console.log(picker.endDate.format('YYYY-MM-DD'));
  });