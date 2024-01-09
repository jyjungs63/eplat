<?php
include "../header.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <?php
    include '../include.php';
    ?>

    <link rel="stylesheet" href="https://unpkg.com/bootstrap-table@1.22.1/dist/bootstrap-table.min.css">
    <link rel="stylesheet" href="../common.css">
    <script src="record.js"></script>

    <title>Eplat 자료실</title>
    <style>
    * {
        box-sizing: border-box;
    }

    input[type=text],
    select,
    textarea {
        width: 100%;
        padding: 12px;
        border: 1px solid #ccc;
        border-radius: 4px;
        resize: vertical;
    }

    label {
        padding: 12px 12px 12px 0;
        display: inline-block;
        padding: 10px;
    }

    button[type=submit] {
        background-color: #4CAF50;
        color: white;
        padding: 12px 20px;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        float: right;
        margin-right: 20px;
        margin-top: 10px;
    }

    input[type=submit]:hover {
        background-color: #45a049;
    }

    .container {
        margin-top: 20px;
        border-radius: 5px;
        background-color: #f2f2f2;
        padding: 20px;
    }

    .col-25 {
        float: left;
        width: 20%;
        margin-top: 6px;
    }

    .col-75 {
        float: left;
        width: 80%;
        padding-right: 20px;
        margin-top: 6px;
    }

    /* Clear floats after the columns */
    .row:after {
        content: "";
        display: table;
        clear: both;
    }

    /* Responsive layout - when the screen is less than 600px wide, make the two columns stack on top of each other instead of next to each other */
    @media screen and (max-width: 600px) {

        .col-25,
        .col-75,
        input[type=submit] {
            width: 50%;
            margin-top: 0;
        }
    }

    .inset-border {
        background: linear-gradient(135deg, rgba(0, 0, 0, 0.15) 0%, rgba(255, 255, 255, 0.15) 100%);
        border: 1px solid rgba(255, 255, 255, 0.2);
    }

    @media (max-width: 767px) {
        .mobile-hide {
            display: none;
        }
    }
    </style>
</head>

<body>
    <!-- <div class="d-flex bd-highlight mb-3">
        <div class="me-auto p-2 bd-highlight"><a href="../index.php" style="text-decoration-line: none;margin-top:10px"> fa fa-home fa-2x" style="color: blue;margin:10px 10px"></i></a></div>
        <div class="p-2 bd-highlight"><a href="./insert.php" style="text-decoration-line: none;margin-top:10px"> fa fa-home fa-2x" style="color: blue;margin:10px 10px"></i></a></div>
    </div> -->


    <div class="p-3" style="background-color: #f4f6f9; margin: 5px;min-height: 1150px;">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>자료실</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="boardmgr.php">Home</a></li>
                            <!-- <li class="breadcrumb-item active"><a href="./insert.php">Upload</a></li> -->
                            <li class="breadcrumb-item active"><a href="javascript:activeUpload()">Upload</a></li>
                        </ol>
                    </div>
                </div>
            </div> <!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-outline card-info" id="cardList">
                        <div class="card-header">

                            <!-- tools box -->
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool btn-sm" data-card-widget="collapse"
                                    data-toggle="tooltip" title="Collapse">
                                    <i class="fas fa-minus"></i></button>
                                <button type="button" class="btn btn-tool btn-sm" data-card-widget="remove"
                                    data-toggle="tooltip" title="Remove">
                                    <i class="fas fa-times"></i></button>
                            </div>
                            <!-- /. tools -->
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body pad">
                            <div id="toolbar">
                                <button id="button" class="btn btn-secondary">삭제</button>
                            </div>
                            <div class="mb-3 table-responsive">

                                <table id="table" data-pagination="true" data-page-size="10" data-search="true"
                                    data-id-field="id" data-row-style="rowStyle">
                                    <thead>
                                        <tr>
                                            <th data-field="num" data-width="50" class="mobile-hide"
                                                class="mobile-hide">순서</th>
                                            <th data-field="title" data-width="300">제목</th>
                                            <th data-field="id" data-width="150" class="mobile-hide">작성자</th>
                                            <th data-field="rdate" data-width="150" class="mobile-hide"
                                                class="mobile-hide">날짜</th>
                                            <th data-field="file" data-width="150">File</th>
                                            <th data-field="state" data-checkbox="true">삭제</th>
                                        </tr>
                                    </thead>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.col-->
            </div>
            <!-- ./row -->
        </section>
        <section class="content">
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-outline card-info" id="cardUpload">
                        <div class="card-header">
                            <h5>자료등록</h5>
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool btn-sm" data-card-widget="collapse"
                                    data-toggle="tooltip" title="Collapse">
                                    <i class="fas fa-minus"></i></button>
                                <button type="button" class="btn btn-tool btn-sm" data-card-widget="remove"
                                    data-toggle="tooltip" title="Remove">
                                    <i class="fas fa-times"></i></button>
                            </div>
                            <!-- /. tools -->
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body pad">
                            <div class="mb-3 table-responsive">
                                <form id="form" method="post" enctype="multipart/form-data">
                                    <div class="container">
                                        <div class="row">
                                            <div class="col-25">
                                                <label for="Record" class="control-label">제목</label>
                                            </div>
                                            <div class="col-75">
                                                <input type="text" class="form-control" id="idContent">
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-25">
                                                <label for="Record" class="control-label">내용</label>
                                            </div>
                                            <div class="col-75">
                                                <textarea type="text" rows="4" cols="50" id="idDesc"></textarea>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="box">
                                                <div class="col-25">
                                                    <label for="files-upload" class="control-label">자료</label>
                                                </div>
                                                <div class="col-75">
                                                    <div style="position:relative;">
                                                        <a class='btn btn-primary' href='javascript:;'>
                                                            Choose File...
                                                            <input type="file" multiple="multiple" id="files-upload"
                                                                style='position:absolute;z-index:2;top:0;left:0;filter: alpha(opacity=0);-ms-filter:"progid:DXImageTransform.Microsoft.Alpha(Opacity=0)";opacity:0;background-color:transparent;color:transparent;'
                                                                name="files-upload" size="40"
                                                                onchange='$("#upload-file-info").html(document.getElementById("files-upload").files.length);$("#dvPreviewLB").css("display","block")'>
                                                        </a>
                                                        <span class='badge badge-info' id="upload-file-info"></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-25">
                                                <label id="dvPreviewLB" for="dvPreview" class="control-label"
                                                    style="display: none">Files</label>
                                            </div>
                                            <div class="col-75">
                                                <div id="dvPreview" style="margin: 5px ; border: none">

                                                </div>
                                            </div>
                                        </div>

                                        <span id="msg" style="color:red"></span><br />

                                        <div class="row">
                                            <button type="submit" value="Submit" class="btn btn-default">등록</button>
                                            <!-- <button type="button" id="btToggle" onclick="closeUpload()" class="btn btn-primary" data-dismiss="modal">OK</button> -->
                                        </div>

                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.col-->
            </div>
            <!-- ./row -->
        </section>
        <section class="content">
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-outline card-info" id="cardFileList">
                        <div class="card-header">
                            <h5>Files Description</h5>
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool btn-sm" data-card-widget="collapse"
                                    data-toggle="tooltip" title="Collapse">
                                    <i class="fas fa-minus"></i></button>
                                <button type="button" class="btn btn-tool btn-sm" data-card-widget="remove"
                                    data-toggle="tooltip" title="Remove">
                                    <i class="fas fa-times"></i></button>
                            </div>
                            <!-- /. tools -->
                        </div>

                        <div class="card-body pad">
                            <div class="mb-3 table-responsive">
                                <form id="form" method="post" enctype="multipart/form-data">
                                    <div class="container">
                                        <div class="row">
                                            <div class="col-25">
                                                <label for="Record" class="control-label">No</label>
                                            </div>
                                            <div class="col-75">
                                                <input type="text" class="form-control" id="idNum">
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-25">
                                                <label for="Record" class="control-label">제목</label>
                                            </div>
                                            <div class="col-75">
                                                <input type="text" class="form-control" id="idTitle">
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-25">
                                                <label for="Record" class="control-label">내용</label>
                                            </div>
                                            <div class="col-75">
                                                <!-- <input type="text" class="form-control" id="idDesc2"> -->
                                                <textarea type="text" rows="4" cols="50" id="idDesc2"></textarea>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-25">
                                                <label for="Record" class="control-label">작성자</label>
                                            </div>
                                            <div class="col-75">
                                                <input type="text" class="form-control" id="idID">
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-25">
                                                <label for="Record" class="control-label">작성일</label>
                                            </div>
                                            <div class="col-75">
                                                <input type="text" class="form-control" id="idDate">
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="box">
                                                <div class="col-25">
                                                    <label for="files-upload" class="control-label">Files</label>
                                                </div>
                                                <div class="col-75 inset-border" id="idFiles"
                                                    style="border: 1px solid gray;padding: 10px;margin-bottom: 10px;">

                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <button type="button" id="btToggle" onclick="closeDownload()"
                                                class="btn btn-primary bt-sm" data-dismiss="modal">자료실가기</button>
                                        </div>

                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.col-->
            </div>
            <!-- ./row -->
        </section>
    </div>

    <p class="text-center" style="margin-top: 20px"><strong> </strong></p>

    <!-- </div> -->

    <div id="myModal" class="modal fade" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title"></h4>
                </div>
                <div class="modal-body">
                    <p></p>
                </div>
                <div class="modal-footer">
                    <button type="button" id="btCancel" class="btn btn-default" data-dismiss="modal">Cancel</button>
                    <button type="button" id="btConfirmOK" class="btn btn-primary" data-dismiss="modal">OK</button>
                </div>
            </div>

        </div>
    </div>

</body>

<?php
include '../includescr.php';
?>
<script src="https://unpkg.com/bootstrap-table@1.22.1/dist/bootstrap-table.min.js"></script>
<script src="../common.js"></script>
<script>
var gid;
const user = document.querySelector('meta[name="user"]').getAttribute('content');
const role = document.querySelector('meta[name="role"]').getAttribute('content');
const conf = document.querySelector('meta[name="confirm"]').getAttribute('content');
const name = document.querySelector('meta[name="name"]').getAttribute('content');

var $table = $('#table')

var metaDescription = "localhost";
let host = "https://www.eplat.co.kr/board/uploads/";
if (metaDescription == "localhost")
    host = "http://localhost:3000/board/uploads/";

$(document).ready(function(e) {
    $("#cardUpload").hide();
    $("#cardFileList").hide();

    var data = {
        num: -1
    }

    var $button = $('#button')

    $(function() {
        $button.click(function() {
            var ids = $.map($table.bootstrapTable('getSelections'), function(row) {
                return row.num
            })
            deleteBoardList(ids);
        })
    })

    function rowStyle(row, index) {
        var classes = [
            'bg-blue',
            'bg-green',
            'bg-orange',
            'bg-yellow',
            'bg-red'
        ]

        if (index % 2 === 0 && index / 2 < classes.length) {
            return {
                classes: classes[index / 2]
            }
        }
        return {
            css: {
                color: 'blue'
            }
        }
    }

    $("#files-upload").change(function() {
        var filenames = "";
        if (typeof(FileReader) != "undefined") {
            var dvPreview = $("#dvPreview");
            dvPreview.html("AAA");

            var regex = /^([a-zA-Z0-9\s_\\.\-:])+(.jpg|.jpeg|.gif|.png|.bmp|.PNG)$/;
            $('#dvPreview').empty();

            $($(this)[0].files).each(function() {
                var file = $(this);
                if (regex.test(file[0].name.toLowerCase())) {
                    var reader = new FileReader();
                    reader.onload = function(e) {
                        var img = $("<img />");
                        img.attr("style", "height:50px;width: 50px;margin-left:5px");
                        img.attr("src", e.target.result);
                        dvPreview.append(img);
                    }
                    reader.readAsDataURL(file[0]);
                } else {
                    filenames += file[0].name + '</br>'
                    //return false;
                    //dvPreview.html(file[0].name);
                }
            });
            dvPreview.html(filenames);
        } else {
            alert("This browser does not support HTML5 FileReader.");
        }
    });

    //$('#table').bootstrapTable({ data: record })
    function multipleLinksFormatter(value, row) {
        let links = '';

        var js = JSON.parse(row['contents']);
        js.forEach(link => {
            var icon = '<i class = "fa-regular fa-file" > </i>';
            var file = link.name.split('.')[1].toLowerCase();
            if (file == "pdf")
                icon = '<i class="fa-solid fa-file-pdf"></i>';
            if (file == "png")
                icon = '<i class="fas fa-file-image"></i>';
            if (file == "xlsx")
                icon = '<i class="fas fa-file-excel"></i>';
            if (file == "pptx")
                icon = '<i class="fas fa-file-powerpoint"></i>';
            if (file == "html")
                icon = '<i class="fa-brands fa-html5"></i>';
            if (file == "exe")
                icon = '<i class="fas fa-running"></i>';
            if (file == "mp4" || file == "avi" || file == "mov" || file == "wmv")
                icon = '< i class = "fas fa-file-video" > < /i>';
            links +=
                `<a href= ${host}${link.fakename} target="_blank">${icon}</a>&nbsp;&nbsp;`;
        });

        return links;
    }

    function operateFormatter(value, row, index) {
        return [
            '<a class="remove" href="javascript:alert(\'a\')" title="Remove">',
            '<i class="fa fa-trash"></i>',
            '</a>'
        ].join('')
    }

    dispList2 = (resp) => {
        $table = $('#table').bootstrapTable({
            data: resp,
            columns: [{
                    align: 'center'
                }, {
                    align: 'center'
                }, {
                    align: 'center'
                }, {
                    align: 'center'
                }, {
                    field: 'linksColumn',
                    title: '첨부파일',
                    align: 'center',
                    formatter: multipleLinksFormatter
                },
                {
                    align: 'center'
                }
                // {
                //     align: 'center',
                //     formatter: operateFormatter
                // }
            ]
        });
    }

    dispErr2 = (error) => {
        CallToast('게시판 보기  !', "error")
    }

    var options = {
        functionName: 'SShowBoardlist',
        otherData: {
            num: -1
        }
    };

    CallAjax("SMethods.php", "POST", options, dispList2, dispErr2);

    activeUpload = () => {
        if (user == "admin") {
            $("#cardList").hide();
            $("#cardUpload").toggle();
        } else
            CallToast("자료실은 admin만 올릴수 있습니다", "error");
    }

    closeUpload = () => {
        $("#cardList").show();
        $("#cardUpload").hide();
        $("#cardFileList").hide();
    }

    closeDownload = () => {
        $("#cardList").show();
        $("#cardUpload").hide();
        $("#cardFileList").hide();
    }

    $('#table').on('click-row.bs.table', function(e, row, $element) {

        var divElement = document.getElementById('idFiles');
        while (divElement.firstChild) {
            divElement.removeChild(divElement.firstChild);
        }

        $("#cardList").hide();
        $("#cardUpload").hide();
        $("#cardFileList").toggle();

        const num = row['num']; // Get the ID from the clicked row
        var item = {
            num: num
        }

        dispList1 = (resp) => {
            var jsn = JSON.parse(resp[0]['contents'])
            var jsarr = [];

            $("#idNum").val(resp[0]['num']);
            $("#idTitle").val(resp[0]['title']);
            $("#idID").val(resp[0]['id']);
            $("#idDesc2").val(resp[0]['desc']);
            $("#idDate").val(resp[0]['rdate']);

            for (var i = 0; i < jsn.length; i++) {
                var object = {
                    text: "   " + i + " : " + jsn[i]['name'] + '   size: (' +
                        parseFloat(Number(jsn[i]['size']) / 1024 / 1024).toFixed(
                            2) + ") MB",
                    href: host + jsn[i][
                        'fakename'
                    ]
                }
                jsarr.push(object);
            }
            $.each(jsarr, function(index, link) {
                var anchor = $('<a>', {
                    text: link.text,
                    href: link.href,
                    target: '_blank' // Optional - Opens links in a new tab
                });
                var icon = 'fa-regular fa-file';
                var file = link.text.split('.')[1].toLowerCase();
                if (file.includes("pdf"))
                    icon = 'fa-solid fa-file-pdf';
                if (file.includes("png"))
                    icon = 'fas fa-file-image';
                if (file.includes("xlsx"))
                    icon = 'fas fa-file-excel';
                if (file.includes("pptx"))
                    icon = 'fas fa-file-powerpoint';
                if (file.includes("html"))
                    icon = 'fa-brands fa-html5';
                if (file.includes("exe"))
                    icon = 'fas fa-running';
                if (file.includes("mp4") || file.includes("avi") || file
                    .includes("mov") || file.includes(
                        "wmv"))
                    icon = 'fa-solid fa-file-video';
                var iconSpan = $('<span>', {
                    class: 'icon-span'
                }).prepend($('<i>', {
                    class: icon
                }));
                anchor.prepend(iconSpan);

                $('#idFiles').append(anchor);

                $('#idFiles').append('<br>');

            });
            CallToast('게시판 상세보기 조회 !', "success")
        }

        dispErr1 = (error) => {
            CallToast('게시판 상세보기  !', "error")
        }

        var options = {
            functionName: 'SShowBoardlist',
            otherData: {
                num: num
            }
        };

        CallAjax("SMethods.php", "POST", options, dispList1, dispErr1);
    });

    deleteBoardList = (ids) => {

        dispList1 = (resp) => {
            $table.bootstrapTable('remove', {
                field: 'num',
                values: ids
            })
            CallToast('게시판 상세보기  !', "success")
        }

        dispErr1 = (error) => {
            CallToast('게시판 상세보기  !', "error")
        }

        var options = {
            functionName: 'SDeleteBoardlist',
            otherData: {
                num: ids
            }
        };

        CallAjax("SMethods.php", "POST", options, dispList1, dispErr1);
    }

    $(document).on('submit', (function(e) {
        var property = document.getElementById('files-upload').files[0];
        if (property != "undefined") {
            var image_name = property.name;

            var form_data = new FormData();

            for (var i = 0, len = document.getElementById('files-upload').files.length; i <
                len; i++) {
                form_data.append("file" + i, document.getElementById('files-upload').files[i]);
            }

            form_data.append("idContent", $('#idContent').val());
            form_data.append("idDesc", $('#idDesc').val());

            dispList = (resp) => {
                CallToast('자료실에 등록이 성공적으로 수행했습니다. !', "success")
                document.getElementById('pdfDiv').src = resp['url'];
            }
            dispErr = (xhr) => {
                CallToast('SUploadBoard Upload Error!', "error")
            }
            form_data.append('functionName', 'SUploadBoard');
            CallAjax1("SMethods.php", "POST", form_data, dispList, dispErr);

        } else {
            CallToast('SUploadBoard Upload Error!', "error")
        }
        closeUpload();
    }));
});
</script>

</html>