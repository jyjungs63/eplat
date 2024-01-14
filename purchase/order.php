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
    <script src="https://cdn.jsdelivr.net/npm/alasql@4"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
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
                        <h5 id="idOrdertext">Purchase</h5>
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
                                            <button class="btn btn-outline-secondary btn-sm" type="button">필터
                                                </button>
                                            &nbsp;
                                            <select class="form-select form-control-sm" id="idGrade"
                                                data-placeholder="Choose Items" style="width: 120px">
                                                <option val="va">전체</option>
                                                <option val="v4">4세</option>
                                                <option val="v5">5세</option>
                                                <option val="v6">6세</option>
                                                <option val="v7">7세</option>
                                                <option val="ve">교구</option>
                                            </select>
                                        </div>
                                        <a id="anchorRead" href="javascript:orderToPdf()" class="btn btn-success"
                                            role="button" data-toggle="tooltip" title="Save PDF file"
                                            aria-disabled="true"><i class="fa-solid fa-file-pdf"></i></a>
                                        &nbsp;&nbsp;
                                        <a id="anchorRead" href="javascript:orderPrint()" class="btn btn-warning"
                                            role="button" data-toggle="tooltip" title="Order and PDF file"
                                            aria-disabled="true"><i class="fa-solid fa-print"></i></a>
                                        &nbsp;&nbsp;

                                        <a id="anchorRead" href="javascript:orderBook()" class="btn btn-info"
                                            role="button" data-toggle="tooltip" title="Add to Cart "
                                            aria-disabled="true"><i
                                                class="fa-solid fa-cart-shopping"></i></a>&nbsp;&nbsp;
                                        <!-- <a id="anchorRead" href="javascript:selectAll()" class="btn btn-success"
                                            role="button" data-toggle="tooltip" title="Select All"
                                            aria-disabled="true"><i class="fa-solid fa-save"></i></a> -->
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
                                        <input class="form-control form-control-sm" id="reportrange"
                                            style="width: 85px">
                                        <i class="fa fa-calendar" style="margin-top: 7px; margin-left: 2px"></i>&nbsp;
                                        </input>
                                        &nbsp;
                                        <input class="form-control form-control-sm" id="idID2" type="text"
                                            placeholder="아이디">
                                        &nbsp;
                                        <input class="form-control form-control-sm" id="idName2" type="text"
                                            placeholder="이름">
                                        &nbsp;
                                        <input class="form-control form-control-sm" id="idOwner2" type="text"
                                            placeholder="Owner">&nbsp;
                                        <input class="form-control form-control-sm" id="idPasswd2" type="text"
                                            placeholder="비밀번호">
                                        &nbsp;
                                        <input class="form-control form-control-sm" id="idMobile2" type="text"
                                            placeholder="전화번호" style="width: 70px;">
                                        &nbsp;
                                        <input class="form-control form-control-sm" id="idAddr2" type="text"
                                            placeholder="주소" style="width: 120px;">
                                        &nbsp;
                                        <input class="form-control form-control-sm" id="idFinish2" type="text"
                                            placeholder="구매완료" style="width: 50px;">
                                        &nbsp;
                                        <input class="form-control form-control-sm" id="idRdate2" type="text"
                                            placeholder="구매일" style="width: 5px;">
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
                                    <input class="form-control form-control-sm" id="idID" type="text" placeholder="아이디">
                                    &nbsp;
                                    <input class="form-control form-control-sm" id="idName" type="text"
                                        placeholder="이름">
                                    &nbsp;
                                    <input class="form-control form-control-sm" id="idOwner" type="text"
                                        placeholder="Owner">&nbsp;
                                    <input class="form-control form-control-sm" id="idPasswd" type="text"
                                        placeholder="비밀번호">
                                    &nbsp;
                                    <input class="form-control form-control-sm" id="idMobile" type="text"
                                        placeholder="전화">
                                    &nbsp;
                                    <input class="form-control form-control-sm" id="idAddr" type="text" placeholder="주소"
                                        style="width: 250px;">
                                    &nbsp;
                                    <input class="form-control form-control-sm" id="idZip" type="text"
                                        placeholder="우편번호" style="width: 20px;">
                                    &nbsp;
                                    <button class="btn btn-outline-primary btn-sm" type="button"
                                        onclick="execDaumPostcode( 'idAddr','idZip')">
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <!-- <?php
    include "../includescr.php";
    ?> -->
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.4.0/jspdf.umd.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf-autotable/3.5.20/jspdf.plugin.autotable.min.js"></script> -->
    <script src="https://cdn.jsdelivr.net/npm/luxon/build/global/luxon.min.js"></script>
    <script src="listprice2.js"></script>

    <!-- <script src="https://unpkg.com/pdf-lib@1.4.0"></script> -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdf-lib/1.17.1/pdf-lib.min.js"></script>
    <script src="https://unpkg.com/@pdf-lib/fontkit@0.0.4/dist/fontkit.umd.min.js"></script>
    <script src="https://unpkg.com/downloadjs@1.4.7"></script>
    <script src="//t1.daumcdn.net/mapjsapi/bundle/postcode/prod/postcode.v2.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Faker/3.1.0/faker.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/chance/1.1.11/chance.min.js"></script>

    <script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
    <script src="https://raw.githack.com/eKoopmans/html2pdf/master/dist/html2pdf.bundle.js"></script>

    <script src="kgardenlist_2.js"></script>
    <script src="../common.js"></script>
    <script src="order.js"></script>

    <script>
    const loc = document.querySelector('meta[name="location"]').getAttribute('content');
    const user = document.querySelector('meta[name="user"]').getAttribute('content');
    const role = document.querySelector('meta[name="role"]').getAttribute('content');
    const conf = document.querySelector('meta[name="confirm"]').getAttribute('content');
    const name = document.querySelector('meta[name="name"]').getAttribute('content');

    if (role != '1') {
        CallToast("지사 관리 권한으로 로긴 하세요", "error");
        window.location.href = "../login/login.php";
    }

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
                let option = document.createElement('option');
                option.text = el['por_id']; // Set the text of the new option
                option.value = el['por_id']; // Set the value attribute (if needed)

                // Append the new option to the select element
                select.add(option);
            })
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
                "#idTableConfirm > div.tabulator-footer > div.tabulator-calcs-holder > div > div:nth-child(1)"
            )
            .html("총합");
        //table1.setData(item);
    }

    var orderPrint = () => {

        makePurchasePDFList();

        $("#cardMain").toggle();
        $("#cardDest").hide();
        $("#cardPDF").show();

    }

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

            drawTexts(page, lhs + (xx * i) + mn, textStart - (lineStep * 1), fontSize, rgb(0.0, 0.0,
                0.0), header[
                i]);
        }

        drawTexts(page, width / 2.5, height - 3 * fontSize, fontSize, rgb(0.0, 0.0, 0.0),
            "Purchase Order List")

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
        formData.append('order', chance.string({
            length: 8,
            casing: 'upper',
            alpha: true,
            numeric: true
        }));
        formData.append('zip', "12345");
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
    </script>

</body>

</html>