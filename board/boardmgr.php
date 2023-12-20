<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <?php
        include '../include.php';
    ?>

    <link rel="stylesheet" href="https://unpkg.com/bootstrap-table@1.22.1/dist/bootstrap-table.min.css">

    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.1/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/js/all.min.js"></script>
    <script src="https://unpkg.com/bootstrap-table@1.22.1/dist/bootstrap-table.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/js/adminlte.min.js"></script> -->

    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.1/css/bootstrap.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/brands.min.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" />
    <link rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/select2-bootstrap-5-theme@1.3.0/dist/select2-bootstrap-5-theme.min.css" />
    <link rel="stylesheet" href="https://unpkg.com/bootstrap-table@1.22.1/dist/bootstrap-table.min.css">
    <link rel="stylesheet" href="https://s3-us-west-2.amazonaws.com/colors-css/2.2.0/colors.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/css/adminlte.min.css"> -->
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
            width: 100%;
            margin-top: 0;
        }
    }

    .inset-border {
        background: linear-gradient(135deg, rgba(0, 0, 0, 0.15) 0%, rgba(255, 255, 255, 0.15) 100%);
        border: 1px solid rgba(255, 255, 255, 0.2);
    }
    </style>
</head>

<body>
    <!-- <div class="d-flex bd-highlight mb-3">
        <div class="me-auto p-2 bd-highlight"><a href="../index.php" style="text-decoration-line: none;margin-top:10px"> <i class="fa fa-home fa-2x" style="color: blue;margin:10px 10px"></i></a></div>
        <div class="p-2 bd-highlight"><a href="./insert.php" style="text-decoration-line: none;margin-top:10px"> <i class="fa fa-home fa-2x" style="color: blue;margin:10px 10px"></i></a></div>
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
                            <li class="breadcrumb-item"><a href="../index.php">Home</a></li>
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
                            <h3>List</h3>
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
                            <div class="mb-3 table-responsive">
                                <table id="table" data-pagination="true" data-page-size="5" data-search="true"
                                    data-striped="true" data-row-style="rowStyle">
                                    <thead>
                                        <tr style="background-color: cornflowerblue;">
                                            <th data-field="num" data-width="50">순서</th>
                                            <th data-field="title" data-width="400">제목</th>
                                            <th data-field="id" data-width="150">작성자</th>
                                            <th data-field="rdate" data-width="150">date</th>
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
                            <h3>File Upload</h3>
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
                                            <div class="box">
                                                <div class="col-25">
                                                    <label for="files-upload" class="control-label">Photo</label>
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
                                            <button type="submit" value="Submit"
                                                class="btn btn-default">Register</button>
                                            <button type="button" id="btToggle" onclick="closeUpload()"
                                                class="btn btn-primary" data-dismiss="modal">OK</button>
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
                            <h3>Files List</h3>
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
                                                class="btn btn-primary" data-dismiss="modal">자료실가기</button>
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

<script>
var gid;
$(document).ready(function(e) {
    $("#cardUpload").hide();
    $("#cardFileList").hide();

    var data = {
        num: -1
    }

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
        if (typeof(FileReader) != "undefined") {
            var dvPreview = $("#dvPreview");
            dvPreview.html("");

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
                    dvPreview.html(file[0].name);
                    //return false;
                }
            });
        } else {
            alert("This browser does not support HTML5 FileReader.");
        }
    });
    //$('#table').bootstrapTable({ data: record })
    $.ajax({
        url: "../Server/SShowBoardlist.php",
        type: "POST",
        dataType: "json",
        data: data,
        success: function(resp) {
            var $table = $('#table').bootstrapTable({
                data: resp,
                columns: [{}, {}, {}, {}]
            });
        },
        error: function(xhr, status, error) {
            alert('SShowBoardlist ajax error' + error);
        }
    });

    activeUpload = () => {
        //alert ('called');
        $("#cardList").hide();
        $("#cardUpload").toggle();
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

        $.ajax({
            url: "../Server/SShowBoardlist.php",
            type: "POST",
            dataType: "json",
            data: item,
            success: function(resp) {
                var jsn = JSON.parse(resp[0]['contents'])
                var jsarr = [];

                $("#idNum").val(resp[0]['num']);
                $("#idTitle").val(resp[0]['title']);
                $("#idID").val(resp[0]['id']);
                $("#idDate").val(resp[0]['rdate']);

                for (var i = 0; i < jsn.length; i++) {
                    var object = {
                        text: "   " + i + " : " + jsn[i]['name'] + '   size: (' +
                            parseFloat(Number(jsn[i]['size']) / 1024 / 1024).toFixed(
                            2) + ") MB",
                        href: 'http://localhost:3000/eplat/board/uploads/' + jsn[i][
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

                    var iconSpan = $('<span>', {
                        class: 'icon-span'
                    }).prepend($('<i>', {
                        class: 'far fa-file'
                    }));
                    anchor.prepend(iconSpan);

                    // Append each anchor element to the div with id="myDiv"
                    $('#idFiles').append(anchor);

                    // Append a line break for separation (optional)
                    $('#idFiles').append('<br>');
                });

            },
            error: function(e) {
                alert('falure');
                $("#err").html(e).fadeIn();
            }
        });

    });

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

            $.ajax({
                url: "../Server/SUploadBoard.php",
                type: "POST",

                data: form_data,
                contentType: false,
                cache: false,
                processData: false,
                beforeSend: function() {
                    $('#msg').html('Saving ......');
                },
                success: function(data) {
                    alert(data);
                    if (data == 'invalid file') {
                        $("#err").html("Invalid File !").fadeIn();
                    } else {
                        $("#msg").html(data).fadeIn();
                        $("#form")[0].reset();
                        alert(data);
                    }
                },
                error: function(e) {
                    alert('falure');
                    $("#err").html(e).fadeIn();
                }
            });
        } else {
            alert('file must upload !!');
        }
    }));
});
</script>

</html>