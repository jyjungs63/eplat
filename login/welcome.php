<?php

session_start();
if (isset($_SESSION['user'])) {
    echo "</br>";
    echo "<h5 align='center'>Welcome eplat study home</h5>";
    echo "<h5 align='center'>" . $_SESSION["user"] . "</h5>";
    echo "<p align='center'><a href='logout.php'>Logout</a></p>";
    echo "</br>";
} else {
    //header('location:login.php');
}

?>

<html>

<head>
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.1/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/js/all.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.1/css/bootstrap.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/brands.min.css" />
    <!-- <link rel="stylysheet" href="welcome.css" /> -->
    <!-- Styles -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2-bootstrap-5-theme@1.3.0/dist/select2-bootstrap-5-theme.min.css" />

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script src="mp4list.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/alasql@4"></script> <!-- json util like sql -->
</head>
<style>
    .giro-table {
        border-collapse: separate;
        border-spacing: 10px 15px;
    }

    th,
    td {
        border-radius: 10px;
    }

    .talign {
        text-align: -moz-center;
        vertical-align: middle;
        text-align: -webkit-center;
    }

    .thh {
        height: 30px;
    }

    img {
        width: 100px;
        height: 70px;
        background-size: 100% 100%;
    }

    .modal-dialog {
        max-width: 800px;
        margin: 30px auto;
    }

    .modal-body {
        position: relative;
        padding: 0px;
    }

    .btn-close {
        position: absolute;
        right: -30px;
        top: 0;
    }
</style>

<body>
    <div class="col-lg-12  shadow mb-2 rounded d-flex align-items-center justify-content-around"
        style="height:100px; background-color: #F6F6F6;">
        <!-- <i id="" class="fa fa-home fa-3x" style="color:black;"></i> -->
        <button class="btn" id="s1" value="#0398F5" onclick="changecolor(this)">
                    <a href="..\index.php"><img src="..\assets\img\online_study_room\internal_images\home_icon.png" width="30" /></a>
        </button>
        <p style="color:#854DEE ;font-family:'Times New Roman', Times, serif; font-size:2rem">Online Study</p>
        <img src='..\assets\img\online_study_room\internal_images\eplat_logo.png' class="img-thumbnail" style="width:48px;height:48px" />
    </div>

    <div class="col-lg-12 col-lg-6 shadow rounded" style="background-color: #9D8AC1;">
        <div class="row d-frex p-5" style=" text-align: center;">
            <div class="d-flex col-md-4 align-items-center justify-content-center btn-group" role="group">
                <button class="btn" id="s1" value="#0398F5" onclick="changecolor(this)">
                    <img src="..\assets\img\online_study_room\internal_images\s1.png" width="30" /> </br> Basic
                </button>
                <button class="btn" id="s2" value="#F79603" onclick="changecolor(this)">
                    <img src="..\assets\img\online_study_room\internal_images\s2.png" width="30" /> </br> S1
                </button>
                <button class="btn" id="s3" value="#01A01D" onclick="changecolor(this)">
                    <img src="..\assets\img\online_study_room\internal_images\s3.png" width="30" /> </br> S2
                </button>
                <button class="btn" id="s4" value="#F50101" onclick="changecolor(this)">
                    <img src="..\assets\img\online_study_room\internal_images\s4.png" width="30" /> </br> S3
                </button>
            </div>
            <div class="d-flex col-md-6 align-items-center justify-content-center">
                <i id="idangle1" onclick="changeMonth(this)" class="fa fa-angle-double-left fa-4x" aria-hidden="true"
                    style="color: #0398F5;"></i>&nbsp; &nbsp;

                <div class="input-group " style="width: 30%;background-color: #0398F5;">
                    <div id="idselect" class="input-group-text" style="background-color: #0398F5;">Month</div>
                    <select id="select-field" class="form-select" data-placeholder="Choose one thing">
                        <option></option>
                        <option val="v1" selected>1월</option>
                        <option val="v2">2월</option>
                        <option val="v3">3월</option>
                        <option val="v4">4월</option>
                        <option val="v5">5월</option>
                        <option val="v6">6월</option>
                        <option val="v7">7월</option>
                        <option val="v8">8월</option>
                        <option val="v9">9월</option>
                        <option val="v10">10월</option>
                        <option val="v11">11월</option>
                        <option val="v12">12월</option>
                    </select>
                </div> &nbsp; &nbsp;


                <i id="idangle2" onclick="changeMonth(this)" class="fa fa-angle-double-right fa-4x icon-bold"
                    aria-hidden="true" style="color: #0398F5;"></i> &nbsp; &nbsp;&nbsp; &nbsp;

                <div class="input-group " style="width: 30%;background-color: #0398F5;">
                    <div id="idselect2" class="input-group-text" style="background-color: #0398F5;">Week</div>
                    <select id="select-field2" class="form-select" data-placeholder="Choose one thing">
                        <option></option>
                        <option val="v1" selected>1주</option>
                        <option val="v2">2주</option>
                        <option val="v3">3주</option>
                        <option val="v4">4주</option>
                    </select>
                </div>

            </div>
            <div class="flex col-md-2">
                <div class="form-group p-4">
                    <div class="form-check">
                    <!-- <button id="bntAll" class="btn btn-success" >
                        <a id ="anchorAll" href="#"></a>Auto Week
                    </button> -->
                    <a id ="anchorAll" href="#" class="btn btn-info" role="button" aria-disabled="true">Auto Week</a>
                    </div>
                    <div class="form-check">
                        <input id="flexCheckChecked"  class="form-check-input" type="checkbox" value="" checked >
                        <label class="form-check-label" for="flexCheckChecked">
                            Auto-Repeat(개별)
                        </label>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- contaner를 full responsive  -->
    <div class="row">
        <div class="row  shadow rounded" style="background-color: #DACBF4;">

            <div class="col-lg-6 "> <!-- Tab content 1  -->

                <div class="" style="margin-top: 10px; text-align: center">
                    <table
                        class="table table-hover table-white table-striped rounded rounded-4 giro-table  boder-success overflow-hidden"
                        style="table-layout:fixed;word-break:break-all;height:auto">
                        <thead>
                            <tr class="">
                                <th height="70" style="background-color:#271841;color:white" class="talign" scope="col"
                                    colspan="2">1st Week</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td height="50" class="talign thh">
                                    1. <a id="w1_1" href="#"><span><img src='..\assets\img\online_study_room\internal_images\online_icon1.png'
                                                class="img-thumbnail" /></span></a>
                                </td>
                                <td height="50" class="talign thh">
                                    5. <a id="w1_5" href="#"><span><img src='..\assets\img\online_study_room\internal_images\online_icon5.png'
                                                class="img-thumbnail" /></span></a>
                                </td>
                            </tr>
                            <tr>
                                <td height="50" class="talign thh">
                                    2.
                                    <a id="w1_2" href="#"><span><img src='..\assets\img\online_study_room\internal_images\online_icon2.png'
                                                class="img-thumbnail" /></span></a>
                                </td>
                                <td height="50" class="talign thh">
                                    6. <a id="w1_6" href="#"><span><img src='..\assets\img\online_study_room\internal_images\online_icon6.png'
                                                class="img-thumbnail" /></span></a>
                                </td>
                            </tr>
                            <tr>
                                <td height="50" class="talign thh">
                                    3. <a id="w1_3" href="#"><span><img src='..\assets\img\online_study_room\internal_images\online_icon3.png'
                                                class="img-thumbnail" /></span></a>
                                </td>
                                <td height="50" class="talign thh">
                                    7. <a id="w1_7" href="#"><span><img src='..\assets\img\online_study_room\internal_images\online_icon7.png'
                                                class="img-thumbnail" /></span></a>
                                </td>
                            </tr>
                            <tr>
                                <td height="50" class="talign thh">
                                    4. <a id="w1_4" href="#"><span><img src='..\assets\img\online_study_room\internal_images\online_icon4.png'
                                                class="img-thumbnail" /></span></a>
                                </td>
                                <td height="50" class="talign thh">
                                    8. <a id="w1_8" href="#"><span><img src='..\assets\img\online_study_room\internal_images\online_icon8.png'
                                                class="img-thumbnail" /></span></a>
                                </td>
                            </tr>
                    </table>
                </div>

            </div>
            <div class="col-lg-6 "> <!-- Tab content 1  -->

                <div class="" style="margin-top: 10px; text-align: center">
                    <table
                        class="table table-hover table-white table-striped rounded rounded-4 giro-table  boder-success overflow-hidden"
                        style="table-layout:fixed;word-break:break-all;height:auto">
                        <thead>
                            <tr class="">
                                <th height="70" style="background-color:#271841;color:white" class="talign" scope="col"
                                    colspan="2">2nd Week</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td height="50" class="talign thh">
                                    1. <a id="w2_1" href="#"><span><img src='..\assets\img\online_study_room\internal_images\online_icon1.png'
                                                class="img-thumbnail" /></span></a>
                                </td>
                                <td height="50" class="talign thh">
                                    5. <a id="w2_5" href="#"><span><img src='..\assets\img\online_study_room\internal_images\online_icon5.png'
                                                class="img-thumbnail" /></span></a>
                                </td>
                            </tr>
                            <tr>
                                <td height="50" class="talign thh">
                                    2.
                                    <a id="w2_2" href="#"><span><img src='..\assets\img\online_study_room\internal_images\online_icon2.png'
                                                class="img-thumbnail" /></span></a>
                                </td>
                                <td height="50" class="talign thh">
                                    6. <a id="w2_6" href="#"><span><img src='..\assets\img\online_study_room\internal_images\online_icon6.png'
                                                class="img-thumbnail" /></span></a>
                                </td>
                            </tr>
                            <tr>
                                <td height="50" class="talign thh">
                                    3. <a id="w2_3" href="#"><span><img src='..\assets\img\online_study_room\internal_images\online_icon3.png'
                                                class="img-thumbnail" /></span></a>
                                </td>
                                <td height="50" class="talign thh">
                                    7. <a id="w2_7" href="#"><span><img src='..\assets\img\online_study_room\internal_images\online_icon7.png'
                                                class="img-thumbnail" /></span></a>
                                </td>
                            </tr>
                            <tr>
                                <td height="50" class="talign thh">
                                    4. <a id="w2_4" href="#"><span><img src='..\assets\img\online_study_room\internal_images\online_icon4.png'
                                                class="img-thumbnail" /></span></a>
                                </td>
                                <td height="50" class="talign thh">
                                    8. <a id="w2_8" href="#"><span><img src='..\assets\img\online_study_room\internal_images\online_icon8.png'
                                                class="img-thumbnail" /></span></a>
                                </td>
                            </tr>
                    </table>
                </div>

            </div>
        </div>
        <div class="row shadow   mt-2 rounded" style="background-color: #DACBF4;">

            <div class="col-lg-6 "> <!-- Tab content 1  -->

                <div class="" style="margin-top: 10px; text-align: center">
                    <table
                        class="table table-hover table-white table-striped rounded rounded-4 giro-table  boder-success overflow-hidden"
                        style="table-layout:fixed;word-break:break-all;height:auto">
                        <thead>
                            <tr class="">
                                <th height="70" style="background-color:#271841;color:white" class="talign" scope="col"
                                    colspan="2">3rd Week</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td height="50" class="talign thh">
                                    1. <a id="w3_1" href="#"><span><img src='..\assets\img\online_study_room\internal_images\online_icon1.png'
                                                class="img-thumbnail" /></span></a>
                                </td>
                                <td height="50" class="talign thh">
                                    5. <a id="w3_5" href="#"><span><img src='..\assets\img\online_study_room\internal_images\online_icon5.png'
                                                class="img-thumbnail" /></span></a>
                                </td>
                            </tr>
                            <tr>
                                <td height="50" class="talign thh">
                                    2.
                                    <a id="w3_2" href="#"><span><img src='..\assets\img\online_study_room\internal_images\online_icon2.png'
                                                class="img-thumbnail" /></span></a>
                                </td>
                                <td height="50" class="talign thh">
                                    6. <a id="w3_6" href="#"><span><img src='..\assets\img\online_study_room\internal_images\online_icon6.png'
                                                class="img-thumbnail" /></span></a>
                                </td>
                            </tr>
                            <tr>
                                <td height="50" class="talign thh">
                                    3. <a id="w3_3" href="#"><span><img src='..\assets\img\online_study_room\internal_images\online_icon3.png'
                                                class="img-thumbnail" /></span></a>
                                </td>
                                <td height="50" class="talign thh">
                                    7. <a id="w3_7" href="#"><span><img src='..\assets\img\online_study_room\internal_images\online_icon7.png'
                                                class="img-thumbnail" /></span></a>
                                </td>
                            </tr>
                            <tr>
                                <td height="50" class="talign thh">
                                    4. <a id="w3_4" href="#"><span><img src='..\assets\img\online_study_room\internal_images\online_icon4.png'
                                                class="img-thumbnail" /></span></a>
                                </td>
                                <td height="50" class="talign thh">
                                    8. <a id="w3_8" href="#"><span><img src='..\assets\img\online_study_room\internal_images\online_icon8.png'
                                                class="img-thumbnail" /></span></a>
                                </td>
                            </tr>
                    </table>
                </div>

            </div>
            <div class="col-lg-6 "> <!-- Tab content 1  -->

                <div class="" style="margin-top: 10px; text-align: center">
                    <table
                        class="table table-hover table-white table-striped rounded rounded-4 giro-table  boder-success overflow-hidden"
                        style="table-layout:fixed;word-break:break-all;height:auto">
                        <thead>
                            <tr class="">
                                <th height="70" style="background-color:#271841;color:white" class="talign" scope="col"
                                    colspan="2">4th Week</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td height="50" class="talign thh">
                                    1. <a id="w4_1" href="#"><span><img src='..\assets\img\online_study_room\internal_images\online_icon1.png'
                                                class="img-thumbnail" /></span></a>
                                </td>
                                <td height="50" class="talign thh">
                                    5. <a id="w4_5" href="#"><span><img src='..\assets\img\online_study_room\internal_images\online_icon5.png'
                                                class="img-thumbnail" /></span></a>
                                </td>
                            </tr>
                            <tr>
                                <td height="50" class="talign thh">
                                    2.
                                    <a id="w4_2" href="#"><span><img src='..\assets\img\online_study_room\internal_images\online_icon2.png'
                                                class="img-thumbnail" /></span></a>
                                </td>
                                <td height="50" class="talign thh">
                                    6. <a id="w4_6" href="#"><span><img src='..\assets\img\online_study_room\internal_images\online_icon6.png'
                                                class="img-thumbnail" /></span></a>
                                </td>
                            </tr>
                            <tr>
                                <td height="50" class="talign thh">
                                    3. <a id="w4_3" href="#"><span><img src='..\assets\img\online_study_room\internal_images\online_icon3.png'
                                                class="img-thumbnail" /></span></a>
                                </td>
                                <td height="50" class="talign thh">
                                    7. <a id="w4_7" href="#"><span><img src='..\assets\img\online_study_room\internal_images\online_icon7.png'
                                                class="img-thumbnail" /></span></a>
                                </td>
                            </tr>
                            <tr>
                                <td height="50" class="talign thh">
                                    4. <a id="w4_4" href="#"><span><img src='..\assets\img\online_study_room\internal_images\online_icon4.png'
                                                class="img-thumbnail" /></span></a>
                                </td>
                                <td height="50" class="talign thh">
                                    8. <a id="w4_8" href="#"><span><img src='..\assets\img\online_study_room\internal_images\online_icon8.png'
                                                class="img-thumbnail" /></span></a>
                                </td>
                            </tr>
                    </table>
                </div>

            </div>
        </div>
    </div>

    <!-- <div class="container" style="visibility: hidden;"> -->
    <div class="container" >
        <h1>Play YouTube or Vimeo Videos in Bootstrap 5 Modal</h1>


        <!-- Button trigger modal -->
        <button type="button" class="btn btn-primary video-btn" data-bs-toggle="modal"
            data-src="https://www.youtube.com/embed/Jfrjeg26Cwk" data-bs-target="#myModal">
            Play Video 1 - autoplay
        </button>

        <!-- Button trigger modal -->
        <button type="button" class="btn btn-primary video-btn" data-bs-toggle="modal"
            data-src="https://www.youtube.com/embed/IP7uGKgJL8U" data-bs-target="#myModal">
            Play Video 2
        </button>


        <!-- Button trigger modal -->
        <!-- <button type="button" class="btn btn-primary video-btn" data-bs-toggle="modal"
            data-src="https://www.youtube.com/embed/A-twOC3W558" data-bs-target="#myModal">
            Play Video 3
        </button> -->
        <button type="button" class="btn btn-primary video-btn" data-bs-toggle="modal"

            data-src="http://127.0.0.1:5502/login/1.mp4" data-bs-target="#myModal">
            Play Video 3
        </button>
                    <!-- data-src="http://127.0.0.1:5502/assets/test.mp4" data-bs-target="#myModal"> -->


        <!-- Button trigger modal -->
        <button type="button" class="btn btn-primary video-btn" data-bs-toggle="modal"
            data-src="https://player.vimeo.com/video/58385453?badge=0" data-bs-target="#myModal">
            Play Vimeo Video
        </button>


        <!-- Modal -->
        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-body">
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></span>
                        </button>
                        <!-- 16:9 aspect ratio -->
                        <div class="ratio ratio-16x9">
                            <iframe class="embed-responsive-item" src="" id="video" allowscriptaccess="always"
                                allow="autoplay"></iframe>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        function assignHref(week) {
            var cont = ["cont1", "cont2", "cont3", "cont4", "cont5", "cont6", "cont7", "cont8"]

            const loc = "https://www.eplat.co.kr/assets/img/online_study_room/" // /v3/60-basic_01_Story_Town%20colors.mp4"
            // asign video target

            const vol = "v3"
            const stp = "step3"
            var mp4list = [];
            var sql = 'select Volumn, step, week, cont1, cont2, cont3, cont4, cont5, cont6, cont7, cont8 from ? where Volumn="' + vol + '" and step= "' + stp + '" order by week '
            var res = alasql(sql, [videoJson])
            var chk;
            if( $('#flexCheckChecked').is(':checked') ){
                chk = 1;
            }
            else{
                chk = 0;
            }

            var k = 1; var i = 0;
            res.forEach(el => {   // 4 week i
                cont.forEach(element => {
                    var result = loc + el['Volumn'] + '/' + res[i][element];
                    var myid = "#w" + (i + 1) + "_" + k++;
                    if (chk)
                        $(myid).attr('href', 'singleLong.html?m1='+result);
                    else
                        $(myid).attr('href', result);
                    if ( week == res[i]['week'])
                        mp4list.push( res[i][element] );
                });
                k = 1;
                i++;
            })
            
            var urlstr = "?"
            var i = 1;
            mp4list.forEach ( et => {
                urlstr += "m"+i+"="+et+"&"
                i++;
            });

            $("#anchorAll").attr('href', 'mutifulvideoplay.html'+urlstr);
        }

        $(document).ready(function () {

            assignHref(1);
            // Gets the video src from the data-src on each button

            var $videoSrc;
            $('.video-btn').click(function () {
                $videoSrc = $(this).data("src");
            });
            console.log($videoSrc);

            // when the modal is opened autoplay it  
            $('#myModal').on('shown.bs.modal', function (e) {

                // set the video src to autoplay and not to show related video. Youtube related video is like a box of chocolates... you never know what you're gonna get
                $("#video").attr('src', $videoSrc + "?autoplay=1&amp;modestbranding=1&amp;showinfo=0&amp;controls=0");
            })

            // stop playing the youtube video when I close the modal
            $('#myModal').on('hide.bs.modal', function (e) {
                // a poor man's stop video
                $("#video").attr('src', $videoSrc);
            })

            // document ready  
            $("#select-field, #select-field2 ").select2({
                theme: "bootstrap-5",
                selectionCssClass: "select2--small",
                dropdownCssClass: "select2--small",
            });

            $(".select2-selection").css("background-color", "#0398F5");

        });

        function changecolor(e) {

            $("[id^='idangle']").css("color", e.value);
            $(".select2-selection").css("background-color", e.value);
            // $(".select2-selection").css("color", "white");
            $("[id^='idselect']").css("background-color", e.value);

        }

        function changeMonth(e) {
            var months = ["1월", "2월", "3월", "4월", "5월", "6월", "7월", "8월", "9월", "10월", "11월", "12월"]
            var month = {}
            var i = 1;
            months.forEach(element => {
                month[element] = i++;
            });

            var sel = $('#select-field').select2('data')

            var selvar = month[sel[0].id];

            if (e.id == "idangle1")
                selvar--;
            else
                selvar++;

            if (selvar > 0 && selvar < 13)
                $('#select-field').val(months[selvar - 1]).trigger("change");
        }

        $('#select-field, #select-field2').on('select2:select', function (e) {
            
            var data = e.params.data.text;

            $('#bntAll').prop('disabled', false);
            //alert(data);
        });
    </script>
</body>

</html>