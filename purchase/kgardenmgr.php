<!DOCTYPE html>
<html lang="utf-8">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php
    include "../header.php";
    ?>
    <?php
    include "../include.php";
    ?>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.css">

    <link href="../common.css" rel="stylesheet">

    <script src="https://cdn.jsdelivr.net/npm/alasql@4"></script>

    <title>학생등록관리</title>
</head>

<body style="background-color: #f4f6f9">
    <div class="p-3">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h5 id="idHead">학생등록 관리리스트</h5>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="../index.php">Home</a></li>
                            <li class="breadcrumb-item active"><a href="javascript:window.history.back();">이전</a></li>
                        </ol>
                    </div>
                </div>
            </div>
        </section>
        <section class="content">
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-outline card-info">
                        <div class="card-header" style="background-color: #ec8a95">
                            <h3 class="card-title">
                                <div class="input-group input-group-sm mb-3">
                                    <!-- <button class="btn btn-outline-secondary btn-sm" type="button">Step 선택</button> -->
                                    <button class="btn btn-primary" type="button" style="width: 100px" onclick="listChild()">전체조회
                                        &nbsp;&nbsp;
                                    </button>
                                    <span class="d-flex badge bg-light text-dark align-items-center">Step 선택</span>
                                    &nbsp;&nbsp;
                                    <select class="form-select form-control-sm" id="idStudent" data-placeholder="Choose Items" style="width: 70px;">
                                        <option val="v0"></option>
                                        <!-- <option val="va">전체</option> -->
                                        <option val="sb">4세-Basic</option>
                                        <option val="s1">5세-Step1</option>
                                        <option val="s2">6세-Step2</option>
                                        <option val="s3">7세-Step3</option>
                                    </select>&nbsp;
                                    <!-- <button class="btn btn-outline-secondary btn-sm" type="button">반선택</button> -->
                                    <span class="d-flex badge bg-light text-dark align-items-center">반선택</span>
                                    &nbsp;&nbsp;
                                    <select class="form-select form-control-sm" id="idClass" data-placeholder="Choose Items" style="width: 70px;">
                                        <option val="v0"></option>
                                    </select>&nbsp;
                                    &nbsp;&nbsp;
                                    <input class="form-control " id="idClassname" type="text" placeholder="반이름">
                                    &nbsp;&nbsp;
                                    <input class="form-control " id="idNick" type="text" placeholder="시작아이디(영어)" style="width: 120px">
                                    &nbsp;&nbsp;
                                    <input class="form-control " id="idNumstudent" type="text" placeholder="원아수">
                                    &nbsp;&nbsp;
                                    <input class="form-control " id="idStartNum" type="text" placeholder="시작번호" value=1></input>
                                    &nbsp;&nbsp;
                                    <button class="btn btn-outline-primary" type="button" onclick="addChild()">원아아이디생성
                                    </button>
                                </div>
                            </h3>
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool btn-sm m-3" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                                    <i class="fas fa-minus"></i></button>
                                <button type="button" class="btn btn-tool btn-sm m-3" data-card-widget="remove" data-toggle="tooltip" title="Remove">
                                    <i class="fas fa-times"></i></button>
                            </div>
                        </div>
                        <div class="card-body pad" style="background-color: #f8d7da">
                            <div class="d-flex align-items-end justify-content-end" style="margin-bottom: 10px;">
                                <!-- <a id="anchorRead" href="javascript:addClassMember()" class="btn btn-info" role="button"
                                    data-toggle="tooltip" title="Add Student" aria-disabled="true"><i
                                        class="fa-solid fa-user"></i></a> -->
                                &nbsp;&nbsp;
                                <button class="btn btn-outline-primary" type="button" data-toggle="tooltip" title="원아 추가 하기" onclick="addClassMember(1)"><i class="fa-solid fa-user"></i>DB저장
                                </button> &nbsp;&nbsp;&nbsp;&nbsp;
                                <button class="btn btn-outline-success" type="button" data-toggle="tooltip" title="원아 추가 하기" onclick="addClassMember(2)"><i class="fa-solid fa-user"></i>DB수정
                                </button> &nbsp;&nbsp;&nbsp;&nbsp;
                                <button class="btn btn-success" type="button" data-toggle="tooltip" title="원아 프린트 하기" onclick="printClassMember()"><i class="fa-solid fa-print"></i>출력
                                </button>
                            </div>

                            <div id="idTable">

                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </div>
    </section>
    </div>

    <?php
    include '../includescr.php';
    ?>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdf-lib/1.17.1/pdf-lib.min.js"></script>
    <script src="https://unpkg.com/@pdf-lib/fontkit@0.0.4/dist/fontkit.umd.min.js"></script>
    <script src="https://unpkg.com/downloadjs@1.4.7"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.9.2/html2pdf.bundle.min.js"></script>
    <script src="../common.js"></script>
    <script src="../header.js"></script>
    <script src="../libpdf.js"></script>
    <script>
        var tab;

        document.getElementById("idHead").innerHTML = "[ " + user + " ]" + " 학생등록 관리리스트";

        window.addEventListener('resize', function() {
            //drawTable();
        })

        function drawTable() {
            var deleteIcon = function(cell, formatterParams) { //plain text value
                return "<i class='fa fa-trash'></i>";
            };

            tab = new Tabulator("#idTable", {
                height: "700px",
                layout: "fitColumns",
                selectable: true,
                columns: [{
                        title: "스텝",
                        field: "step",
                        width: "10%",
                        editor: "input",
                        headerHozAlign: "center",
                        editorParams: {
                            autocomplete: "true",
                            allowEmpty: true,
                            listOnEmpty: true,
                            valuesLookup: true
                        }
                    },
                    {
                        title: "반이름",
                        field: "classnm",
                        width: "20%",
                        headerHozAlign: "center",
                        editor: "input",
                        editorParams: {
                            autocomplete: "true",
                            allowEmpty: true,
                            listOnEmpty: true,
                            valuesLookup: true
                        }
                    },
                    {
                        title: "원아명",
                        field: "name",
                        width: "20%",
                        headerHozAlign: "center",
                        editor: "input",
                        editorParams: {
                            autocomplete: "true",
                            allowEmpty: true,
                            listOnEmpty: true,
                            valuesLookup: true
                        }
                    },
                    {
                        title: "아이디",
                        field: "id",
                        width: "20%",
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
                        title: "비밀번호",
                        field: "passwd",
                        width: "20%",
                        editor: "input",
                        headerHozAlign: "center",
                        editorParams: {
                            autocomplete: "true",
                            allowEmpty: true,
                            listOnEmpty: true,
                            valuesLookup: true
                        }
                    },
                    {
                        title: "삭제",
                        formatter: deleteIcon,
                        width: "10%",
                        headerHozAlign: "center",
                        hozAlign: "center",
                        cellClick: function(e, cell) {
                            ChildDelete(cell.getRow())
                        }
                    },
                ],
            });
        }


        document.addEventListener("DOMContentLoaded", function() {
            drawTable();
            //showClassMembers("teacher1");
            showClass(user);
        });

        function listChild() {
            listStudent("전체", 1);
        }

        ChildDelete = (cell) => {

            var result = confirm("Are you sure to delete ??");

            var id = cell._row.data['id'];

            dispList = (resp) => {
                CallToast('원아 삭제 successfully!!', "success")
                cell.delete();
            }
            dispErr = (xhr) => {
                CallToast('원아 삭제 Error!!', "error")
            }

            var options = {
                functionName: 'SRemoveChild',
                otherData: {
                    id: id
                }
            };

            if (result) {
                CallAjax("SMethods.php", "POST", options, dispList, dispErr);
            } else
                CallToast("원아 삭제 취소 !!", "error");
        }

        document.getElementById("idStudent").addEventListener("change", function() {
            // 선택된 옵션 가져오기
            var selectedOption = this.options[this.selectedIndex];

            // 선택된 옵션의 값(value) 가져오기
            var selectedValue = selectedOption.value;

            // 선택된 옵션의 텍스트 가져오기
            var selectedText = selectedOption.text;

            listStudent(selectedText, 1);
        });

        document.getElementById("idClass").addEventListener("change", function() {
            // 선택된 옵션 가져오기
            var selectedOption = this.options[this.selectedIndex];

            // 선택된 옵션의 값(value) 가져오기
            var selectedValue = selectedOption.value;

            // 선택된 옵션의 텍스트 가져오기
            var classText = selectedOption.text;

            listStudent(classText, 2);
            //$("#idClass").val("v0");
            $("#idClassname").val(classText);
        });

        listStudent = (step, classText) => {

            dispList = (res) => {
                var js = res['json'];
                tab.setData(js);

                CallToast('Student list successfully!!', "success")
            }
            dispErr = (xhr) => {
                CallToast('Student list Error!!', "error")
            }

            var options = {
                functionName: 'SShowStudentList',
                otherData: {
                    id: user,
                    step: step,
                    sel: classText,
                }
            };
            CallAjax("SMethods.php", "POST", options, dispList, dispErr);

        }

        checkExistID = (id) => {
            var js
            dispList = (res) => {
                js = res['result'];
            }
            dispErr = (xhr) => {
                CallToast('Student list Error!!', "error")
            }
            var options = {
                functionName: 'SCheckStudentID',
                otherData: {
                    id: id,
                }
            };
            CallAjax2("SMethods.php", "POST", options, dispList, dispErr);
            return js;
        }

        addChild = () => {
            tab.clearData();
            var selectElement = document.getElementById("idStudent");
            var selectedValue = selectElement.value;
            var classname = $("#idClassname").val();
            var nickname = $("#idNick").val();
            var num = $("#idNumstudent").val();
            var start = $("#idStartNum").val();

            let isexist = checkExistID(nickname);

            if (isexist < 1) {
                if (selectedValue != "전체" && selectedValue != "" && classname != "" && nickname != "" && num != "") {

                    var no = 0;
                    var arr = [...Array(Number(num)).keys()];
                    arr.forEach(el => {
                        no = Number(start) + el;
                        var data = {
                            classnm: classname,
                            id: nickname + no,
                            passwd: nickname + no,
                            step: selectedValue
                        }
                        tab.addRow(data);
                    })
                } else {
                    if (selectedValue == "")
                        alert(" 생성 할 학생의 정보를 입력하세요/ Step [4세-Basic, 5세-Step1, 6세-Step2, 7세-Step3]  선택해주세요 !!.");
                    if (classname == "")
                        alert(" 생성 할 학생의 정보를 입력하세요/  반을 입력 입력해 주세요 !!.");
                    if (nickname == "")
                        alert(" 생성 할 학생의 정보를 입력하세요/ 생성할 ID를 입력해 주세요 !!.");
                    if (num == "")
                        alert(" 생성 할 학생의 정보를 입력하세요/ 생성할 원아 총 수를 입력해주세요 !!.");
                }
            } else {
                alert('다른 아이디를 입력해서 원아 아이디를 생성해주세요');
            }
        };

        addClassMember = (chos) => { // 학생등록
            var fun = "SinsertStudent";
            if (chos == 2)
                fun = "SupdateStudent"
            var items = [];
            var item = tab.getRows();
            let clsname = "";
            item.forEach(el => {
                clsname = el._row.data['classnm'];
                var jarr = {
                    "id": el._row.data['id'],
                    "name": el._row.data['name'],
                    "passwd": el._row.data['passwd'],
                    "tid": user, //
                    "role": "0", //
                    "classnm": el._row.data['classnm'],
                    "step": el._row.data['step'],
                }
                items.push(jarr);
            })
            var data = {
                "item": items
            };

            dispList = (resp) => {
                let option = document.createElement('option');
                option.text = clsname; // Set the text of the new option
                option.value = clsname; // Set the value attribute (if needed)
                showClass(user);
                if (chos == 1)
                    CallToast('New Student added successfully!!', "success")
                else
                    CallToast('New Student Update successfully!!', "success")
            }
            dispErr = (xhr) => {
                if (chos == 1) {
                    alert(' 아이디가 이미 사용중입니다.')
                    CallToast('아이디가 이미 사용중입니다!!', "error")
                } else
                    CallToast('New Student  Update falure !!', "error")
            }

            var options = {
                functionName: fun,
                otherData: {
                    items
                }
            };
            CallAjax("SMethods.php", "POST", options, dispList, dispErr);

        }

        showClass = (tid) => {

            var data = {
                id: tid
            };

            dispList = (resp) => {
                $("#idClass").empty();
                let select = document.getElementById('idClass');
                let option = document.createElement('option');
                option.text = ""; // Set the text of the new option
                option.value = ""; // Set the value attribute (if needed)
                select.add(option);

                resp['success'].forEach(el => {
                    var jarr = {
                        "classnm": el['classnm'],
                    }

                    let option = document.createElement('option');
                    option.text = el['classnm']; // Set the text of the new option
                    option.value = el['classnm']; // Set the value attribute (if needed)

                    // Append the new option to the select element
                    select.add(option);
                })
                //CallToast('Disply student list successfully!!', "success")
            }

            dispErr = (xhr) => {
                //CallToast('Disply student list falure !!', "error")
            }

            var options = {
                functionName: 'SShowClassList',
                otherData: {
                    id: tid,
                    kgarden: ""
                }
            };
            CallAjax("SMethods.php", "POST", options, dispList, dispErr);
        };

        // showClassMembers = (tid) => {
        //     var data = {
        //         id: tid
        //     };

        //     dispList = (res) => {
        //         CallToast('Student list successfully!!', "success")
        //     }
        //     dispErr = (xhr) => {
        //         CallToast('Student list Error!!', "error")
        //     }

        //     var options = {
        //         functionName: 'SShowStudentList',
        //         otherData: {
        //             id: user,
        //             classnm: classnm
        //         }
        //     };
        //     CallAjax("SMethods.php", "POST", options, dispList, dispErr);
        // }

        var page;

        const {
            PDFDocument,
            rgb,
            StandardFonts
        } = PDFLib;
        const black = rgb(0, 0, 0);
        const white = rgb(1, 1, 1);
        const headcol = rgb(0.85, 0.89, 0.95);
        const footcol = rgb(1.00, 0.91, 0.60);


        async function printClassMember() {
            const pdfDoc = await PDFDocument.create();
            pdfDoc.registerFontkit(fontkit)
            const fontBytes = await fetch('NanumBarunGothic.ttf').then((res) => res
                .arrayBuffer());
            const customFont = await pdfDoc.embedFont(fontBytes);
            font = customFont;

            // const customFont = await pdfDoc.embedFont(StandardFonts.TimesRoman);
            var item = tab.getData();
            var Arr = [];
            item.forEach(el => {

                var jarr = {
                    "step": el['step'],
                    "classnm": el['classnm'],
                    "name": el['name'],
                    "id": el['id'],
                    "passwd": el['passwd']
                }
                Arr.push(jarr)
            })

            let loop = 1;

            if (Arr.length > 24)
                loop = 2;
            let m = 0;
            for (var j = 0; j < loop; j++) {

                page = pdfDoc.addPage()

                const {
                    width,
                    height
                } = page.getSize()

                const fontSize = 14;

                page.setFont(customFont);
                page.setFontSize(fontSize);

                setOrigin(0.5, 27);
                pwidth = width / cm;
                half = pwidth / 2;
                let xm = 3.25;
                let ym = 1.5;
                let hcol = rgb(0.37, 0.66, 0.62); // header color
                let tcol = rgb(1.00, 0.97, 0.82); // row color

                let fs = 10;

                for (let k = 1; k < 9; k++) {
                    for (let i = 0; i < 3; i++) {
                        // if (m >= Arr.length) {
                        //     m = 0;
                        // }
                        if (m < Arr.length) {
                            drawRTextBox(0, 0, xm, ym, hcol, Arr[m]['classnm'], fs, white, "center");
                            drawRTextBox(xm, 0, xm, ym, hcol, Arr[m]['name'], fs, white, "center");

                            moveDown(ym)
                            drawRTextBox(0, 0, xm, ym, tcol, "ID: " + Arr[m]['id'], fs, black, "center");
                            drawRTextBox(xm, 0, xm, ym, tcol, "PW: " + Arr[m]['passwd'], fs, black, "center");
                            moveUp(ym)
                            moveRight(6.8);
                        }
                        m++;
                    }
                    moveLeft(6.8 * 3);
                    moveDown(ym * 2 + 0.5);
                }
            }

            const pdfBytes = await pdfDoc.save()
            const pdfBlob = new Blob([pdfBytes], {
                type: 'application/pdf'
            });

            // 생성된 PDF 다운로드
            const downloadLink = document.createElement('a');
            downloadLink.href = window.URL.createObjectURL(pdfBlob);
            downloadLink.download = 'output.pdf';
            downloadLink.click();
            // const pdfDataUri = await pdfDoc.saveAsBase64({ dataUri: true });
            // document.getElementById('pdf').src = pdfDataUri;


            //tab.print();
        }

        // printClassMember = () => {
        //     var element = document.getElementById('idTable');
        //     var opt = {
        //         margin: [3, 0, 0, 0],
        //         //margin: 0.1,
        //         filename: 'myfile.pdf',
        //         image: {
        //             type: 'jpeg',
        //             quality: 1
        //         },
        //         html2canvas: {
        //             scale: 1
        //         },
        //         jsPDF: {
        //             unit: 'cm',
        //             format: 'a4',
        //             orientation: 'landscape'
        //         }
        //     };

        //     // New Promise-based usage:
        //     html2pdf().set(opt).from(element).save();

        //     // Old monolithic-style usage:
        //     //html2pdf(element, opt);
        // }
    </script>
</body>

</html>