
$(document).ready(function(e) {
    //$("#cardDest").hide();
    $("#cardPDF").hide();
});

var deleteIcon = function(cell, formatterParams) { //plain text value
    return "<i class='fa fa-trash'></i>";
};

document.addEventListener("DOMContentLoaded", function() {
  

    orderList(null);

});

var table = new Tabulator("#idTable", {   // 주문 선택 테이블 정의
    height: "350px",
    data: listprice2,
    layout: "fitColumns",
    rowHeight: 40, //set rows to 40px height
    selectable: true, //make rows selectable
    columns: [
        // { title: "ID", field: "uid", width: 1lhs, editor: "input", editor: false, cellEdited: function (cell) { recal(cell); }, },
        {
            title: "단계",
            field: "grade",
            width: "15%",
            editor: "list",
            editor: false,
            headerHozAlign: "center",
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
            width: "25%",
            editor: false,
            headerHozAlign: "center",
            bottomCalcParams: {
                precision: 0
            }
        },
        {
            title: "단가(원)",
            field: "price",
            sorter: "number",
            width: "15%",
            editor: false,
            headerHozAlign: "center",
            formatter: "money",
            formatterParams: {
                thousand: ",",
                precision: 0,
            },
        },
        {
            title: "수량(개)",
            field: "count",
            editor: "input",
            width: "15%",
            headerHozAlign: "center",
            validator: "min:0",
            editorParams: {
                min: 0,
                max: 5000, // Adjust min and max values as needed
                step: 2,
                elementAttributes: {
                    type: "number"
                }
            },
            formatter: "money",
            formatterParams: {
                thousand: ",",
                precision: 0,
            },
            bottomCalc: "sum",
            bottomCalcFormatter: "money",
            bottomCalcFormatterParams: {
                formatter: "money",
                precision: 0,
                thousand: ","
            },
            cellEdited: function(cell) {
                calsum(cell);
            },
        },
        {
            title: "합계(원)",
            field: "total",
            editor: "input",
            formatter: "money",
            headerHozAlign: "center",
            editor: false,
            width: "20%",
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
            bottomCalcFormatter: "money",
            bottomCalcFormatterParams: {
                formatter: "money",
                precision: 0,
                thousand: ","
            }
        },
        {
            formatter: deleteIcon,
            width: "10%",
            hozAlign: "center",
            cellClick: function(e, cell) {
                deleteRow(cell.getRow())
            }
        },
    ],
}
);

var table1 = new Tabulator("#idTableConfirm", { //구매 확정된 Table
    height: "500px",
    layout: "fitColumns",
    rowHeight: 40, //set rows to 40px height
    selectable: true, //make rows selectable
    columns: [
        //{ title: "ID", field: "uid", visible: false , editor: "input", editor: false, cellEdited: function (cell) { recal(cell); }, },
        {
            title: "단계",
            field: "grade",
            width: "15%",
            editor: "list",
            editor: false,
            headerHozAlign: "center",
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
            width: "25%",
            editor: false,
            headerHozAlign: "center",
            bottomCalcParams: {
                precision: 0
            }
        },
        {
            title: "단가(원)",
            field: "price",
            sorter: "number",
            width: "15%",
            editor: false,
            headerHozAlign: "center",
            formatter: "money",
            formatterParams: {
                thousand: ",",
                precision: 0,
            },
        },
        {
            title: "수량(개)",
            field: "count",
            editor: "input",
            width: "15%",
            headerHozAlign: "center",
            validator: "min:0",
            editorParams: {
                min: 0,
                max: 5000, // Adjust min and max values as needed
                step: 2,
                elementAttributes: {
                    type: "number"
                }
            },
            formatter: "money",
            formatterParams: {
                thousand: ",",
                precision: 0,
            },
            bottomCalc: "sum",
            bottomCalcFormatter: "money",
            bottomCalcFormatterParams: {
                formatter: "money",
                precision: 0,
                thousand: ","
            },
            cellEdited: function(cell) {
                calsum(cell);
            },
        },
        {
            title: "합계(원)",
            field: "total",
            editor: "input",
            formatter: "money",
            headerHozAlign: "center",
            editor: false,
            width: "20%",
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
            bottomCalcFormatter: "money",
            bottomCalcFormatterParams: {
                formatter: "money",
                precision: 0,
                thousand: ","
            }
        },      
        {
            formatter: deleteIcon,
            width: "10%",
            hozAlign: "center",
            cellClick: function(e, cell) {
                deleteAddress(cell.getRow())
            }
        },
    ],
});

deleteAddress = (cell) => {

    var result = confirm("주소지를 삭제 하시겠습까?");

    var id = cell._row.data['No'];

    dispList = (resp) => {
        CallToast('주소지 삭제 성공!!', "success")
        cell.delete();
    }
    dispErr = (xhr) => {
        CallToast('주소지 삭제 실패!!', "error")
    }

    var options = {
        functionName: 'SRemoveAddress',
        otherData: {
            id: id
        }
    };

    if (result) {
        CallAjax("SMethods.php", "POST", options, dispList, dispErr);
    } else
        CallToast("주소지 삭제 취소 !!", "error");
}

var table2 = new Tabulator("#idTableDest", {   // 주소 리스트 table 생성
    height: "490px",
    //data: kgardenlist,
    layout: "fitColumns",
    rowHeight: 40, //set rows to 40px height
    selectable: 1, //make rows selectable
    rowClick: function(e, row) {
        // deselect previously selected rows
        table2.deselectRow();
  
        // select the clicked row
        row.toggleSelect();
      },
    columns: [{
            title: "No",
            field: "No",
            width: "5%",
            editor: "input",
            editor: false,
            cellEdited: function(cell) {
                recal(cell);
            },
        },
        {
            title: "이름",
            field: "name",
            width: "15%",
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
            title: "지사명",
            field: "owner",
            width: "15%",
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
            title: "주소",
            field: "addr",
            sorter: "number",
            width: "35%",
            editor: false,
            bottomCalcParams: {
                precision: 0
            }
        },
        {
            title: "우편번호",
            field: "zipcode",
            sorter: "number",
            width: "10%",
            editor: false,
            bottomCalcParams: {
                precision: 0
            }
        },
        {
            title: "전화",
            field: "mobile",
            sorter: "number",
            width: "7%",
            editor: false,
            bottomCalcParams: {
                precision: 0
            }
        },
        // { title: "password", field: "password", sorter: "number", width: 250, editor: false, bottomCalcParams: { precision: 0 } },
        {
            title: "등록일",
            field: "rdate",
            sorter: "number",
            width: "7%",
            editor: false,
            bottomCalcParams: {
                precision: 0
            }
        },
        {
            formatter: deleteIcon,
            width: "5%",
            hozAlign: "center",
            cellClick: function(e, cell) {
                deleteRow(cell.getRow())
            }
        },
    ],
});

table.on("rowSelected", function(row){
    var rowData = row.getData();
    if (Number(rowData.count) > 0) {
        row.select();
    }
    else 
    {
        row.deselect();
    }
})

listPor = (por_id) => {  

    var options = {
        functionName: 'SPorDetailList',
        otherData: {
            id: por_id
        }
    };
    dispList = (res) => {
        var js = res[0]['json']
        addPurcharseList(res, "");
        // porTable.setData(JSON.parse(js));

        // var cnt = $("#porTableDiv > div.tabulator-footer > div.tabulator-calcs-holder > div > div:nth-child(4)").html()
        // var sum = $("#porTableDiv > div.tabulator-footer > div.tabulator-calcs-holder > div > div:nth-child(5)").html()
        // $("#porTableDiv > div.tabulator-footer > div.tabulator-calcs-holder > div > div:nth-child(1)").html("총합")
        // $("#porTableDiv > div.tabulator-footer > div.tabulator-calcs-holder > div > div:nth-child(4)").html(parseInt(cnt/2));
        // $("#porTableDiv > div.tabulator-footer > div.tabulator-calcs-holder > div > div:nth-child(5)").html(cvtCurrency(parseInt(sum/2)));
        $("#idID2").val(res[0]['id']);
        $("#idName2").val(res[0]['order']);
        $("#idAddr2").val(res[0]['addr']);
        $("#idZip2").val(res[0]['zip']);
        $("#idRdate2").val(res[0]['rdate']);
        $("#idMobile2").val(res[0]['mobile']);
        $("#idFinish2").val(res[0]['confirm'] == "0" ? "미완료" : "완료");
        document.getElementById('pdfDiv').src = window.origin + "/Server/uploads/"+ res[0]['pdfname'];
    }
    dispErr = (error) => {
        CallToast('SPorDetailList falure!', "error")
    }

    CallAjax("SMethods.php", "POST", options, dispList, dispErr);

}

listPorRange = (start, end, name, id) => {  // 달별 구매 목록

    var options = {
        functionName: 'SPorDetailListRange',
        otherData: {
            start: start.slice(0,7), end: end, id: id, name: name
        }
    };
    dispList = (res) => {

        addPurcharseList(res, id);  
      
    }
    dispErr = (error) => {
        CallToast('SPorDetailList falure!', "error")
    }

    CallAjax("SMethods.php", "POST", options, dispList, dispErr);

}

listPorID = ( id, start, end) => {  // 달별 구매 목록

    var options = {
        functionName: 'SPorDetailListRange',
        otherData: {
            start: start, end: end, id: id
        }
    };
    dispList = (res) => {

        addPurcharseList(res['list'],id);  
 
        $("#idID2").val(res[0]['id']);
        $("#idName2").val(res[0]['order']);
        $("#idAddr2").val(res[0]['addr']);
        $("#idZip2").val(res[0]['zip']);
        $("#idMobile2").val(res[0]['mobile']);
        $("#idRdate2").val(res[0]['rdate']);
        $("#idFinish2").val(res[0]['confirm'] == "0" ? "미완료" : "완료");
      
    }
    dispErr = (error) => {
        CallToast('SPorDetailList falure!', "error")
    }

    CallAjax("SMethods.php", "POST", options, dispList, dispErr);

}


addPurcharseList = (res, id) => {      // 구매 내역을 월별 지사별 summary

    var tbody = $("#porTable tbody");

    $("#porTable tbody").empty();

    var sum=0;
    // Create a new row
    var arr ;
    if ( res.length == 2)
        arr = res[0]['list'];
    else
        arr = res;

    arr.forEach( ell =>  {
        //res[0]['list'].forEach( ell =>  {

        var newRow = $("<tr style='margin-top:10px'>");

        var json = JSON.parse(ell['json']);
        var dat  = ell['rdate'];

        newRow.append("<td > "+ ell['uname']+"</td>");   // branch name

        var jarr = "";
        var total = 0; 
        newRow.append("<td > "+ dat.slice(0,11)+"</td>"); 

        var i = 1;
        json.forEach(el => {
            if ((el['uid']) != "") {
                total += Number(el['total']);
                jarr +=
                    "<tr><td class='nb'>" +i+ ". &nbsp;</td>  <td class='nb'>" + el['title'] + "</td> <td class='nb'>" + cvtCurrency(parseInt(el['price'])) + "원</td> <td class='nb'>"+el['count']+"개</td></tr>";
            }
            i++;
        })
        newRow.append( "<td><table class='nb' style='width:100%; margin-top:0px'>" + jarr + "</table></td>" );
        newRow.append("<td>"+ cvtCurrency(total) +"원</td>");                                            // 단가
        newRow.append("<td> <div> "+ ell['addr'] + "</div> <br/> <div>" + ell['order']+ "</div></td>");  //주소
        let stat = res[0]['confirm'] == "0" ? "미완료" : "완료"
        newRow.append("<td> <div>"+ stat+ "</div> <br/> <div> <a href='#'>반송<a></div></td>");
        tbody.append(newRow);
            sum += total;
    })

//  add 택배비 

    if ( res.length == 2 ) {


    var newRow = $("<tr  style='background-color: yellow'>");
    var i = 0;
    var pricev = 0;
    if ( id == "전지사") {  // 전체 조회
         
        jarr = "";

        res[1]['parcel'].forEach(el => {

            pricev += Number(el['price']);

            jarr +=
                    "<tr><td class='nb'>" + i + ". &nbsp;</td> <td class='nb'>" + el['name'] + ". &nbsp;</td> <td class='nb'>"+cvtCurrency(Number(el['price']))+"원</td colspan='3'></tr>";
            i++;
        })   

        newRow.append("<td colspan='2'> <div><h5>택배비<h5></div> </td>");
        newRow.append("<td><table class='nb' style='width:100%; margin-top:0px'>" + jarr + "</table><td colspan='3'></td></td>");
        $("#idParcel").val(cvtCurrency(pricev));     
    }
    else   // 지사별 조회
    {
        if (res[1]['parcel'].length > 0 )
            pricev = Number(res[1]['parcel'][0]['price']);
        $("#idParcel").val(cvtCurrency(pricev));

        newRow.append("<td colspan='2'> <div><h7>택배비<h5></div> </td> <td> <div> <b>"+cvtCurrency(pricev)+"원</div><td colspan='3'></td></td>");
    }
    tbody.append(newRow);
    }

    var newRow = $("<tr  style='background-color: steelblue'>");
    newRow.append("<td colspan='2'> <div><h5>합계<h5></div> </td> <td> <div> <b>"+cvtCurrency(sum)+"원</div><td ><h5>총합(택배비포함)<h5></td></td>");
    newRow.append("<td> <div> <b>"+cvtCurrency(sum+pricev)+"원</div><td colspan='2'></td></td>");
    
    // Append the new row to the table body
    tbody.append(newRow);
}

document.getElementById("idPorList").addEventListener("change", function() {   // 개별 구매 의뢰서 내용 보기
    // 선택된 옵션 가져오기
    var selectedOption = this.options[this.selectedIndex];

    // 선택된 옵션의 값(value) 가져오기
    var selectedValue = selectedOption.value;

    // 선택된 옵션의 텍스트 가져오기
    var selectedText = selectedOption.text;

    listPor(selectedText);
});

document.getElementById("idDest").addEventListener("change", function() {   // 주소지 List
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
            id: user
        };

        dispList = (resp) => {
            var i = 1;
            var items = [];
            if ('success' in resp) {

                resp['success'].forEach(el => {
                    var jarr = {
                        "No": i,
                        "name": el['name'],
                        "owner": el['owner'],
                        "mobile": el['mobile'],
                        "addr": el['addr'],
                        "zipcode": el['zipcode'],
                        "rdate": el['rdate'],
                    }
                    items.push(jarr);
                    i++;
                });
                table2.clearData();
                table2.setData(items);
                CallToast("SShowAddr success!!", "success");
            }
            else 
                CallToast("SShowAddr Error", "error");
        }
        dispErr = () => {
            //alert(error);
            CallToast("SShowAddr Error", "error");
        }

        var options = {
            functionName: 'SShowAddr',
            otherData: {
                role: 2,    // not using current
                id: user
            }
        };

        CallAjax("SMethods.php", "POST", options, dispList, dispErr);

    } else {
        table2.clearData();
        //table2.setData(kgardenlist);
    }

});

document.getElementById("idGrade").addEventListener("change", function() { // 구매 목록 선택
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

  var monthPicker = document.getElementById("monthPicker");

  monthPicker.addEventListener('input', function(evt) {     // 월을 선택할 경우 List 출력

    let thisMoment = moment(monthPicker.value);
    let endOfMonth = moment(thisMoment).endOf('month').format('YYYY-MM-DD');
    let startOfMonth = moment(thisMoment).startOf('month').format('YYYY-MM-DD');

    var selectElement = document.getElementById("idPorBranch"); // 지사 또는 원관리
    var bname = selectElement.text;

    listPorRange( startOfMonth, endOfMonth, "", "" )

  })

  document.getElementById("idPorBranch").addEventListener("change", function() {   // 개별 구매 의뢰서 내용 보기
    // 선택된 옵션 가져오기
    var selectedOption = this.options[this.selectedIndex];

    // 선택된 옵션의 값(value) 가져오기
    var id = selectedOption.value;
    // 선택된 옵션의 텍스트 가져오기
    var name = selectedOption.text;
 
    let thisMoment = moment(monthPicker.value);
    let endOfMonth = moment(thisMoment).endOf('month').format('YYYY-MM-DD');
    let startOfMonth = moment(thisMoment).startOf('month').format('YYYY-MM-DD');

    listPorRange( startOfMonth, endOfMonth,  name, id);

    
    if ( selectedOption.text != "전체")
        $("#idBtParcel").removeClass('disabled');
});

AddParcel = () => {   // 택배비 월에 해당하는 지사에 추가

    let thisMoment = moment(monthPicker.value);
    let start = moment(thisMoment).endOf('month').format('YYYY-MM-DD');
    let endOfMonth = moment(thisMoment).endOf('month').format('YYYY-MM-DD');

    var selectElement  = document.getElementById("idPorBranch"); // 지사 또는 원관리
    var selectedOption = selectElement.options[selectElement.selectedIndex];
    var bname          = selectedOption.text;
    var id             = selectElement.value;

    var options = {
        functionName: 'SPorAddParcel',
        otherData: {
            start: start, id: id, name: bname, price: $("#idParcel").val()
        }
    };
    dispList = (res) => {

        listPorRange( start, endOfMonth,  bname, id);
        CallToast('SPorAddParcel success!', "success")
      
    }
    dispErr = (error) => {
        CallToast('SPorAddParcel falure!', "error")
    }

    CallAjax("SMethods.php", "POST", options, dispList, dispErr);

}

  let date = new Date();
  monthPicker.value=formatMonth();