<!DOCTYPE html>
<html lang="utf-8">
<?php
include "../header.php";
?>

<head>
    <!-- <?php
            include '../include.php';
            ?>  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/4.6.1/css/bootstrap.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/brands.min.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/css/adminlte.min.css">
    <link rel="stylesheet" href="https://unpkg.com/tabulator-tables@5.5.2/dist/css/tabulator.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" type="text/css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">

    <link href="../common.css" rel="stylesheet">

    <script src="https://cdn.jsdelivr.net/npm/alasql@4"></script>
    <style>
        .custom-width {
            width: 50px;
            /* Set your desired width */
        }

        table,
        th,
        td {
            border: 1px solid black;
            text-align: center;
        }

        th.col1 {
            width: 10%;
        }

        th.col2 {
            width: 305;
        }

        th.col3 {
            width: 15%;
        }

        th.col4 {
            width: 35%;
        }

        th.col5 {
            width: 10%;
        }

        .nb {
            border: none;
            /* Remove borders from table cells */

            text-align: center;
        }
    </style>
</head>

<body style="background-color: #f4f6f9">
    <div class="p-3">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h5 id="idOrdertext">Purchase</h5>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="../index.php">Home</a></li>
                            <li class="breadcrumb-item active"><a href="javascript:window.history.back();">이전</a></li>
                        </ol>
                    </div>
                </div>
            </div> <!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-outline card-info card-tabs" id="idCardPurchase">
                        <div class="card-header" style="background-color: #38998580">
                            <h3 class="card-title">

                            </h3>
                            <ul class="nav nav-tabs" id="custom-tabs-one-tab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="custom-tabs-one-home-tab" data-toggle="pill" href="#custom-tabs-one-home" role="tab" aria-controls="custom-tabs-one-home" aria-selected="true">주문</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="custom-tabs-one-profile-tab" data-toggle="pill" href="#custom-tabs-one-profile" role="tab" aria-controls="custom-tabs-one-profile" aria-selected="false">주문내역</a>
                                </li>
                            </ul>
                            <div class="card-tools">
                                <button id="idCardPurchaseBtn" type="button" class="btn  btn-sm btn-primary" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">접기/펴기
                                </button>
                                <!-- <button type="button" class="btn btn-tool btn-sm" data-card-widget="remove"
                                    data-toggle="tooltip" title="Remove">
                                    <i class="fas fa-times"></i></button> -->
                            </div>
                        </div>
                        <div class="card-body pad" id="cardMain" style="background-color: #88babe87">
                            <div class="tab-content" id="custom-tabs-one-tabContent">
                                <div class="tab-pane fade show active" id="custom-tabs-one-home" role="tabpanel" aria-labelledby="custom-tabs-one-home-tab">

                                    <div class="d-flex align-items-end justify-content-end" style="margin-bottom: 10px;">
                                        <div class="input-group mb-3">
                                            <span class="d-flex badge bg-light text-dark align-items-center">필터</span>
                                            &nbsp;
                                            <select class="form-select form-control-sm" id="idGrade" data-placeholder="Choose Items" style="width: 120px">
                                                <option val="va">전체</option>
                                                <option val="v4">4세</option>
                                                <option val="v5">5세</option>
                                                <option val="v6">6세</option>
                                                <option val="v7">7세</option>
                                                <option val="ve">교구</option>
                                            </select>
                                        </div>
                                        <!-- <a id="anchorRead" href="javascript:orderToPdf()" class="btn btn-success"
                                            role="button" data-toggle="tooltip" title="Save PDF file"
                                            aria-disabled="true"><i class="fa-solid fa-file-pdf"></i></a>
                                        &nbsp;&nbsp; -->
                                        <!-- <a id="anchorRead" href="javascript:orderPrint()" class="btn btn-warning"
                                            role="button" data-toggle="tooltip" title="Order and PDF file"
                                            aria-disabled="true"><i class="fa-solid fa-print"></i></a>
                                        &nbsp;&nbsp; -->

                                        <!-- <a id="anchorRead" href="javascript:orderBook()" class="btn btn-info"
                                            role="button" data-toggle="tooltip" title="Add to Cart "
                                            aria-disabled="true"><i
                                                class="fa-solid fa-cart-shopping"></i></a>&nbsp;&nbsp; -->
                                        <!-- <a id="anchorRead" href="javascript:selectAll()" class="btn btn-success"
                                            role="button" data-toggle="tooltip" title="Select All"
                                            aria-disabled="true"><i class="fa-solid fa-save"></i></a> -->
                                    </div>
                                    <h5>
                                        <b> 주문할 상품 선택</b>
                                    </h5>
                                    <div id="idTable">

                                    </div>
                                    <div class="d-flex align-items-end justify-content-end" style="margin-top: 10px;">
                                        <div align="center">

                                        </div>
                                    </div>

                                    <div class="col-12 text-center">
                                        <a id="anchorRead" href="javascript:orderBook()" class="btn btn-info align-items-end justify-content-end" role="button" data-toggle="tooltip" title="Add to Cart " aria-disabled="true"><i class="fa-solid fa-cart-shopping"></i> 장바구니담기</a>&nbsp;&nbsp;
                                    </div>
                                    <h5> <b>주문한 상품 확정</b></h5>
                                    <div id="idTableConfirm" style="margin-top: 10px;">

                                    </div>
                                </div>
                                <div class="tab-pane fade" id="custom-tabs-one-profile" role="tabpanel" aria-labelledby="custom-tabs-one-profile-tab">
                                    <div class="input-group input-group-sm mb-3" style="width: 950px">
                                        <!-- <button class="btn btn-outline-primary btn-sm" type="button">개별조회</button> -->
                                        <span class="d-flex badge bg-light text-dark align-items-center">개별조회</span>
                                        &nbsp;&nbsp;
                                        <select class="form-select form-control-sm" id="idPorList" data-placeholder="주문서선택" style="width: 150px">
                                        </select>
                                        &nbsp;&nbsp;
                                        <span class="d-flex badge bg-light text-dark align-items-center">지사별조회</span>
                                        &nbsp;&nbsp;
                                        <select class="form-select form-control-sm" id="idPorBranch" data-placeholder="지사선택" style="width: 150px">
                                        </select>
                                        &nbsp;&nbsp;
                                        <!-- <button class="btn btn-outline-primary btn-sm" type="button">월별조회</button> -->
                                        <span class="d-flex badge bg-light text-dark align-items-center">월별조회</span>
                                        &nbsp;&nbsp;
                                        <input type="month" class="form-control form-control-sm" id="monthPicker" name="month" style="width: 120px">
                                        </input>
                                        &nbsp;
                                        <span class="d-flex badge bg-light text-dark align-items-center">택배비</span>
                                        &nbsp;&nbsp;
                                        <input class="form-control form-control-sm custom-width" id="idParcel" type="text" placeholder="택배비" style="width: 100px;">
                                        &nbsp;&nbsp;
                                        <button id="idBtParcel" class="btn btn-outline-success btn-sm disabled" type="button" onclick="AddParcel()">택배비추가
                                        </button>
                                    </div>

                                    <div id="porTableDiv"></div>
                                    <table id="porTable" style="width: 100%;border: 1px solid black;">
                                        <thead>
                                            <tr>
                                                <th style="height: 50px" class="col1">지사명</th>
                                                <th style="height: 50px" class="col1">날짜/주문번호</th>
                                                <th class="col2">내역</th>
                                                <th class="col3">금액</th>
                                                <th class="col4">배송주소</th>
                                                <th class="col5">주문상태</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>

                                            </tr>
                                        </tbody>
                                    </table>
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
                        <div class="card-header" style="background-color: #38998580">
                            <h3 class="card-title">

                                <p> <b>배송지 확정</b></p>
                            </h3>
                            <div class="input-group mb-3">
                                <!-- <button class="btn btn-outline-secondary" type="button">배송지선택</button>
                                    &nbsp;&nbsp; -->
                                <select class="form-select form-control-sm" id="idDest" data-placeholder="Choose Items">
                                    <option val="va">전체</option>
                                    <option val="v4">원리스트</option>
                                    <option val="v5">주소지</option>
                                </select>
                                &nbsp;
                                <!-- <input class="form-control form-control-sm" id="idID" type="text" placeholder="아이디">
                                &nbsp; -->
                                <input class="form-control form-control-sm custom-width" id="idName" type="text" placeholder="이름">
                                &nbsp;
                                <input class="form-control form-control-sm custom-width" id="idOwner" type="text" placeholder="Owner">&nbsp;
                                <!-- <input class="form-control form-control-sm" id="idPasswd" type="text"
                                    placeholder="비밀번호"> -->
                                &nbsp;
                                <input class="form-control form-control-sm custom-width" id="idMobile" type="text" placeholder="전화" style="width: 20px;">
                                &nbsp;
                                <input class="form-control form-control-sm" id="idAddr" type="text" placeholder="주소" style="width: 300px;">
                                &nbsp;
                                <input class="form-control form-control-sm custom-width" id="idZip" type="text" placeholder="우편번호" style="width: 20px;">
                                &nbsp;
                                <button class="btn btn-outline-primary btn-sm" type="button" onclick="execDaumPostcode( 'idZip','idAddr')">
                                    주소찾기</button>
                                &nbsp;
                                <button class="btn btn-outline-success btn-sm" type="button" onclick="AddBranch()">배송지추가
                                </button>
                            </div>
                            </h3>
                            <div class="card-tools" id="idCardAddress">
                                <!-- <a id="idConfirmOrder" href="javascript:orderPrint()" class="btn btn-warning disabled"
                                    role="button" data-toggle="tooltip" title="구매확정" aria-disabled="true"><i
                                        class="fa-solid fa-print ">구매확정</i></a> -->
                                &nbsp;&nbsp;
                                <button id="idCardAddressBtn" type="button" class="btn  btn-sm btn-primary" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">접기/펴기</button>
                                <!-- <button type="button" class="btn btn-tool btn-sm" data-card-widget="remove"
                                    data-toggle="tooltip" title="Remove">
                                    <i class="fas fa-times"></i></button> -->
                            </div>
                        </div>
                        <div class="card-body " id="cardDest" style="background-color: #88babe87">
                            <p> <b>배송지 선택</b></p>
                            <div id="idTableDest" style="margin-top: 10px;">

                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <div class="row mt-5">
                <div class="col-md-12">
                    <div class="card card-outline card-secondary" id="idCardPDF">
                        <div class="card-header" style="background-color: #38998580">
                            <h3 class="card-title">
                                <p> <b>구매내역서</b></p>

                            </h3>
                            <div class="text-center"><a id="idConfirmOrder" href="javascript:orderPrint()" class="btn btn-warning disabled" role="button" data-toggle="tooltip" title="구매확정" aria-disabled="true"><i class="fa-solid fa-print "></i>구매확정</a>
                            </div>
                            <div class="card-tools">
                                <button id="idCardPDFBtn" type="button" class="btn btn-sm btn-primary" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">접기/펴기</button>
                                <!-- <button type="button" class="btn btn-tool btn-sm" data-card-widget="remove"
                                data-toggle="tooltip" title="Remove">
                                <i class="fas fa-times"></i></button> -->
                            </div>
                        </div>
                        <div class="card-body " id="cardPDF" style="background-color: #88babe87">

                            <iframe id="pdfDiv" style="width: 100%; height: 900px"></iframe>
                        </div>

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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/luxon/build/global/luxon.min.js"></script>
    <script src="listprice2.js"></script>

    <!-- <script src="https://unpkg.com/pdf-lib@1.4.0"></script> -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdf-lib/1.17.1/pdf-lib.min.js"></script>
    <script src="https://unpkg.com/@pdf-lib/fontkit@0.0.4/dist/fontkit.umd.min.js"></script>
    <script src="https://unpkg.com/downloadjs@1.4.7"></script>
    <script src="//t1.daumcdn.net/mapjsapi/bundle/postcode/prod/postcode.v2.js"></script>
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/Faker/3.1.0/faker.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/chance/1.1.11/chance.min.js"></script> -->

    <script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
    <script type="text/javascript" src="https://raw.githack.com/eKoopmans/html2pdf/master/dist/html2pdf.bundle.js">
    </script>

    <script src="kgardenlist_2.js"></script>
    <script src="../common.js"></script>
    <script src="../header.js"></script>
    <script src="order.js"></script>

    <script>
        if (role != '1' && role != '9') {
            CallToast("지사 관리 권한으로 로긴 하세요", "error");
            window.location.href = "../login/login.php";
        }

        cardWidgetManage($('#idCardPurchase'), $('#idCardPurchaseBtn')); //idCardAddressBtn
        cardWidgetManage($('#idCardAddress'), $('#idCardAddressBtn')); //idCardAddressBtn
        cardWidgetManage($('#idCardPDF'), $('#idCardPDFBtn')); //idCardAddressBtn


        orderToPdf = () => {
            var element = document.getElementById('idTableConfirm');
            var opt = {
                margin: [3, 0.5, 0, 0.5],
                filename: 'myfile.pdf',
                image: {
                    type: 'jpeg',
                    quality: 0.98
                },
                html2canvas: {
                    scale: 2
                },
                jsPDF: {
                    unit: 'cm',
                    format: 'a4',
                    orientation: 'landscape'
                }
            };

            // New Promise-based usage:
            html2pdf().set(opt).from(element).save();

            // Old monolithic-style usage:
            //html2pdf(element, opt);
        }

        document.getElementById("idOrdertext").innerHTML = (user + " 지사장/구매");

        const {
            PDFDocument,
            rgb
        } = PDFLib;

        orderList = () => {
            items = [];
            blist = [];

            dispList = (resp) => {
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
                    option = document.createElement('option');

                    option.text = el['por_id']; // Set the text of the new option
                    option.value = el['por_id']; // Set the value attribute (if needed)
                    // Append the new option to the select element
                    select.add(option);

                    blist.push([el['id'], el['bname']])

                })
                //const unqueArr = blist.filter((value, index, self) => self.indexOf(value) === index); // 지사명 중복 제거
                const unqueArr = blist.filter((element, index) => {
                    return (
                        blist.findIndex(
                            (item) => item[0] === element[0] && item[1] === element[1]
                        ) === index
                    );
                })

                let select2 = document.getElementById('idPorBranch');
                let option2 = document.createElement('option');
                option2.text = "전지사"; // Set the text of the new option
                option2.value = "전지사"; // Set the value attribute (if needed)
                select2.add(option2);

                for (let i = 0; i < unqueArr.length; i++) {
                    option2 = document.createElement('option');
                    option2.value = unqueArr[i][0]; // Set the value attribute (if needed)
                    option2.text = unqueArr[i][1]; // Set the text of the new option
                    select2.add(option2);
                }

                // unqueArr.forEach(e => {
                //     // 지사별 조회 셀렉션 박스에 지사명 추가
                //     option2 = document.createElement('option');
                //     option2.text = e; // Set the text of the new option
                //     option2.value = e; // Set the value attribute (if needed)
                //     select2.add(option2);
                // })

            }

            dispErr = (error) => {
                CallToast('SShowOrderList !', "error")
            }

            var options = {
                functionName: 'SShowOrderList',
                otherData: {
                    id: "manager"
                }
            };

            CallAjax("SMethods.php", "POST", options, dispList, dispErr);

            var deleteIcon = function(cell, formatterParams) { //plain text value
                return "<i class='fa fa-trash'></i>";
            };
        }


        table2.on("rowClick", function(e, row) { /// 배달 주소지 클릭시
            //e - the click event object
            var selectedRows = table2.getSelectedData();
            selectedRows.forEach(function(row) {
                //table2.deselectRow(row.id);
            });

            // table2.deselectRow();
            var ar = row._row.data['addr'].split('우(');
            $("#idName").val(row._row.data['name']);
            $("#idOwner").val(row._row.data['owner']);
            $("#idMobile").val(row._row.data['mobile']);
            if (ar.length == 2) {
                $("#idAddr").val(ar[0]);
                $("#idZip").val(ar[1].slice(0, ar[1].length - 1));
            } else {
                $("#idAddr").val(row._row.data['addr']);
                $("#idZip").val(row._row.data['zipcode']);
            }

            //table2.selectRow(Number(row._row.position));

            $("#idConfirmOrder").removeClass('disabled');
            //table2.selectRow();
            //alert(Number(row._row.position));
        });

        AddBranch = () => {

            var selectElement = document.getElementById("idGrade"); // 지사 또는 원관리
            var selectedValue = selectElement.value;

            var id = $("#idName").val(); // 아이디
            var name = $("#idName").val(); // 이름
            var owner = $("#idOwner").val(); // 지사명
            var password = $("#idPasswd").val();
            var mobile = $("#idMobile").val();
            var addr = $("#idAddr").val();
            var zipcode = $("#idZip").val();
            var role = 2; // 1 branch manager , 2 // teacher
            var rdate = "";

            const formattedDate = formatDate();
            if (rdate == undefined || rdate == "") rdate = formattedDate;

            var items = {
                id: name,
                name: name,
                owner: owner,
                password: "",
                mobile: mobile,
                addr: addr,
                zipcode: zipcode,
                mid: user,
                role: role,
                rdate: rdate,
                confirm: 0,
            }

            var data = {
                "item": items
            }
            dispList = (resp) => {
                if ('success' in resp) {
                    CallToast('New Branch Manager added successfully!!', "success")
                    table.addRow(items);
                } else
                    CallToast('New Branch Manager added falure!', "error")

            }
            dispErr = (xhr) => {
                CallToast('New Branch Manager DB Call error!', "error")
            }
            jsdata = JSON.stringify(items);
            var options = {
                functionName: 'SRegistermgr2',
                otherData: {
                    items
                }
            };
            CallAjax("SMethods.php", "POST", options, dispList, dispErr);
        };

        function calsum(cell) {
            var row = cell.getRow();
            var rowData = row.getData();
            var sum = Number(rowData.count.replace(',', '')) * Number(rowData.price);
            if (Number(rowData.count) > 0) {
                row.select();
                row.update({
                    total: sum
                });
            } else {
                row.update({
                    count: ''
                });
            }
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

            table1.selectRow();
            // var cnt = $("#idTable > div.tabulator-footer > div.tabulator-calcs-holder > div > div:nth-child(4)")
            //     .html()
            // var sum = $("#idTable > div.tabulator-footer > div.tabulator-calcs-holder > div > div:nth-child(5)")
            //     .html()

            // $("#idTable > div.tabulator-footer > div.tabulator-calcs-holder > div > div:nth-child(4)").html(
            //     cvtCurrency(parseInt(cnt)));
            // $("#idTable > div.tabulator-footer > div.tabulator-calcs-holder > div > div:nth-child(5)").html(
            //     cvtCurrency(parseInt(sum)));


            var parent = $(
                    "#idTableConfirm > div.tabulator-footer > div.tabulator-calcs-holder > div > div:nth-child(1)"
                )
                .html("합계");
            // var cnt = $("#idTableConfirm > div.tabulator-footer > div.tabulator-calcs-holder > div > div:nth-child(4)")
            //     .html()
            // var sum = $("#idTableConfirm > div.tabulator-footer > div.tabulator-calcs-holder > div > div:nth-child(5)")
            //     .html()

            // $("#idTableConfirm > div.tabulator-footer > div.tabulator-calcs-holder > div > div:nth-child(4)").html(
            //     cvtCurrency(parseInt(cnt)));
            // $("#idTableConfirm > div.tabulator-footer > div.tabulator-calcs-holder > div > div:nth-child(5)").html(
            //     cvtCurrency(parseInt(sum)));

            //table1.setData(item);
        }

        var orderPrint = () => {

            makePurchasePDFList();
            $("#idConfirmOrder").addClass('disabled');

            $("#cardMain").toggle();
            $("#cardDest").hide();
            $("#cardPDF").show();

        }

        async function makePurchasePDFList() {

            if ($("#idName").val() == "" || $("#idName").val() == undefined)
                alert('Name missing')
            if ($("#idAddr").val() == "" || $("#idAddr").val() == undefined)
                alert('Address  missing')

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
            var item = table1.getData();
            //var item = table1.getSelectedData();

            var name = $("#idTableConfirm > div.tabulator-footer > div.tabulator-calcs-holder > div > div:nth-child(1)")
                .html();
            var cnt = $("#idTableConfirm > div.tabulator-footer > div.tabulator-calcs-holder > div > div:nth-child(4)")
                .html();
            var total = $(
                    "#idTableConfirm > div.tabulator-footer > div.tabulator-calcs-holder > div > div:nth-child(5)")
                .html();
            var rest = cvtCurrency(parseFloat(total));

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

            var xx = (510 / 5);
            var lineStart = height - 5 * fontSize; //  y axis start point of drawing
            var textStart = height - 5 * fontSize + 5; //  y axis start point of drawing
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

            var header = ['단계', '품명', '단가(원)', '수량', '합계(원)', ''];

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

                drawTexts(page, lhs + (xx * i) + mn, textStart - (lineStep * 1), fontSize, rgb(0.0, 0.0,
                    0.0), header[
                    i]);
            }

            drawTexts(page, width / 2.5, height - 4 * fontSize, fontSize, rgb(0.0, 0.0, 0.0),
                "구매내역서")
            drawTexts(page, width / 4, height - 4 * fontSize, fontSize, rgb(0.0, 0.0, 0.0),
                formatDate())

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

                    drawTexts(page, lhs + (xx * 0) + mn, textStart - (lineStep * (i + 2)), fontSize,
                        rgb(0.0, 0.0, 1.0),
                        "총금액");
                    drawTexts(page, lhs + (xx * 1) + mn, textStart - (lineStep * (i + 2)), fontSize,
                        rgb(0.0, 0.0, 1.0),
                        "");
                    drawTexts(page, lhs + (xx * 2) + mn, textStart - (lineStep * (i + 2)), fontSize,
                        rgb(0.0, 0.0, 1.0),
                        "");
                    drawTexts(page, lhs + (xx * 3) + mn, textStart - (lineStep * (i + 2)), fontSize,
                        rgb(0.0, 0.0, 1.0),
                        cnt);
                    drawTexts(page, lhs + (xx * 4) + mn, textStart - (lineStep * (i + 2)), fontSize,
                        rgb(0.0, 0.0, 1.0),
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

                    drawTexts(page, lhs + (xx * 0) + mn, textStart - (lineStep * (i + 2)), fontSize,
                        rgb(0.0, 0.0, 0.0),
                        buyArr[i]['grade']);
                    drawTexts(page, lhs + (xx * 1) + mn, textStart - (lineStep * (i + 2)), fontSize,
                        rgb(0.0, 0.0, 0.0),
                        buyArr[i]['title']);
                    drawTexts(page, lhs + (xx * 2) + mn, textStart - (lineStep * (i + 2)), fontSize,
                        rgb(0.0, 0.0, 0.0),
                        cvtCurrency(parseFloat(buyArr[i]['price'])));
                    drawTexts(page, lhs + (xx * 3) + mn, textStart - (lineStep * (i + 2)), fontSize,
                        rgb(0.0, 0.0, 0.0),
                        buyArr[i]['count']);
                    drawTexts(page, lhs + (xx * 4) + mn, textStart - (lineStep * (i + 2)), fontSize,
                        rgb(0.0, 0.0, 0.0),
                        cvtCurrency(parseFloat(buyArr[i]['total'])));
                }
            }


            // Serialize the PDFDocument to bytes (a Uint8Array)

            const pngUrl = 'https://www.eplat.co.kr/assets/img/logo.png'

            const pngImageBytes = await fetch(pngUrl).then((res) => res.arrayBuffer())

            const pngImage = await pdfDoc.embedPng(pngImageBytes)

            const pngDims = pngImage.scale(0.07)

            page.drawImage(pngImage, {
                x: pngDims.width + 10,
                y: page.getHeight() - 50,
                width: pngDims.width,
                height: pngDims.height,
            })

            // 베송지
            let cm = 28.34;
            var xm = 30;
            var ym = -50;

            drawTexts(page, 100 + xm, 160 + ym, 12, rgb(0., 0., 0.), "배송지:");
            drawTexts(page, 150 + xm, 160 + ym, 12, rgb(0., 0., 0.), $("#idAddr").val());
            drawTexts(page, 100 + xm, 130 + ym, 12, rgb(0., 0., 0.), "주문인:");
            drawTexts(page, 150 + xm, 130 + ym, 12, rgb(0., 0., 0.), $("#idName").val());
            drawTexts(page, 300 + xm, 130 + ym, 12, rgb(0., 0., 0.), "우편번호:");
            drawTexts(page, 350 + xm, 130 + ym, 12, rgb(0., 0., 0.), $("#idZip").val());
            drawTexts(page, 100 + xm, 100 + ym, 12, rgb(0., 0., 0.), "구매일:");
            drawTexts(page, 150 + xm, 100 + ym, 12, rgb(0., 0., 0.), formatDate());
            drawTexts(page, 300 + xm, 100 + ym, 12, rgb(0., 0., 0.), "모바일:");
            drawTexts(page, 350 + xm, 100 + ym, 12, rgb(0., 0., 0.), $("#idMobile").val());



            const pdfBytes = await pdfDoc.save()


            // Trigger the browser to download the PDF document
            //download(pdfBytes, "pdf-lib_creation_example.pdf", "application/pdf");

            // 예시: fetch를 사용한 파일 업로드

            var formData = new FormData();
            formData.append('pdfFile', new Blob([pdfBytes]), 'generated_pdf.pdf');
            item = table1.getData();
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

            porList.push({
                "uid": "",
                "grade": "총금액",
                "title": "",
                "price": "",
                "count": cnt,
                "total": total
            });

            formData.append('id', user);
            formData.append('order', $("#idOwner").val())

            // $("#idName").val()
            // $("#idAddr").val()
            // $("#idOwner").val();
            // $("#idMobile").val();
            // $("#idAddr").val();
            // $("#idZip").val();

            formData.append('zip', $("#idZip").val());
            formData.append('addr', $("#idAddr").val());
            formData.append('mobile', $("#idMobile").val());
            formData.append('postlist', JSON.stringify(porList));
            formData.append('porid', 'P' + "-" + formatDate() + "-" + $("#idName").val() + Math.floor(Math.random() *
                10) + 1)
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
            // $.ajax({
            //     url: '../Server/SUploadBoardPDF.php',
            //     type: "POST",
            //     processData: false,
            //     contentType: false,
            //     data: formData,
            //     success: function(response) {
            //         document.getElementById('pdfDiv').src = response['url'];
            //     },
            //     error: function(e) {
            //         CallToast('SUploadBoardPDF!', "error")
            //     }
            // })

            dispList = (resp) => {
                CallToast('Upload Pdf successfully!!', "success")
                document.getElementById('pdfDiv').src = resp['url'];
            }
            dispErr = (xhr) => {
                CallToast('Upload Pdf falure!', "error")
            }

            formData.append('functionName', 'SUploadBoardPDF');
            CallAjax1("SMethods.php", "POST", formData, dispList, dispErr);

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

        $('#custom-tabs-one-tab a').on('click', function(e) {
            e.preventDefault();
            alert(this)
        });
    </script>

</body>

</html>