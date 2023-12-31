<?php

session_start();
if (isset($_SESSION['user'])) {

    echo "<h5 id='hiddenid' align='center' style='visibility:hidden' >" . $_SESSION["user"] . "</h5>";
} else {
    header('location:login.php');
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

    <!-- Styles -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2-bootstrap-5-theme@1.3.0/dist/select2-bootstrap-5-theme.min.css" />

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script src="mp4list.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/alasql@4"></script> <!-- json util like sql -->
    <script src="https://unpkg.com/@popperjs/core@2"></script>
    <script src="https://unpkg.com/tippy.js@6"></script>
</head>
<style>
    * {
        font-family: 'Roboto', sans-serif !important;
    }

    body {
        background-color: #F7F3FF;
    }

    .giro-table {
        border-collapse: separate;
        border-spacing: 5px 7px;
    }

    th,
    td {
        border-radius: 15px;
    }

    .talign {
        text-align: -moz-center;
        vertical-align: middle;
        /* text-align: -webkit-center; */
    }

    .thh {
        height: 30px;
    }

    .myimg {
        width: 100px;
        height: 70px;
        background-size: 100% 100%;
    }

    img {
        width: 50px;
        height: 35px;
        background-size: 100% 100%;
    }

    .img-thumbnail {
        border: 0px;
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

    .table>:not(caption)>*>* {
        border-bottom-width: 0px;
        /* box-shadow: inset 0 0 0 9999px var(--bs-table-bg-state,var(--bs-table-bg-type,var(--bs-table-accent-bg))); */
    }

    .row {
        --bs-gutter-x: 0.5rem;
    }

    .disabledbutton {
        pointer-events: none;
        opacity: 0.4;
    }
    .mn10 {margin-top: -20px;}
</style>
<!-- width: calc( 100% - 0px ); -->

<body style="overflow: auto;height:100%">

    <div class="row">
        <div class="col-lg-6 ">
            <div id="divIntro" class="row  shadow" style="height:260px;background-color: #DACBF4;border-radius: 25px;margin:0px 10px 10px ;padding: 10px 10px ">
                <img style="width:100%; height: 100%" src='..\assets\img\online_study_room\internal_images\intro.jpg' class="rounded img-responsive"></img>
            </div>
        </div>
        <div class="col-lg-6 mb-2" style="margin-top:5px"> <!-- Tab content 1  -->
            <div class="row  shadow " style="background-color: #DACBF4;border-radius: 25px;margin:0px 10px;">
                <div class="" style="margin-top: 10px; text-align: center">
                    <table class="table  rounded rounded-4 giro-table  boder-success overflow-hidden" style="table-layout:fixed;word-break:break-all;height:auto">
                        <thead>
                            <tr class="">
                                <th height="70" style="font-size: 1.5rem; background-color:#271841;color:white;text-align: -webkit-center;" class="talign" scope="col" colspan="2">MENU (Step-Volume-Play)</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="talign thh" style="background-color: #38B6FF;height: 80px;">
                                    <div class="d-grid">
                                        <button class="btn btn-block" id="basic" value="#38B6FF" onclick="changecolor(this)" style="background-color: #38B6FF;"><b>BASIC</b>
                                        </button>
                                    </div>
                                </td>
                                <td class="talign thh colr" style="height: 50px;">
                                    <a id="anchorAll" href="#" class="btn" role="button" aria-disabled="true" style="visibility:hidden"></a>
                                    <div id="leftdiv" class="input-group ">
                                        <div id="idselect" class="input-group-text">Vol:</div>
                                        <select id="select-field" class="form-select">
                                            <option></option>
                                            <option val="v1" >v1</option>
                                            <option val="v2" disabled="disabled">v2</option>
                                            <option val="v3">v3</option>
                                            <option val="v4" disabled="disabled">v4</option>
                                            <option val="v5" disabled="disabled">v5</option>
                                            <option val="v6" disabled="disabled">v6</option>
                                            <option val="v7" disabled="disabled">v7</option>
                                            <option val="v8" disabled="disabled">v8</option>
                                            <option val="v9" disabled="disabled">v9</option>
                                            <option val="v10" disabled="disabled">v10</option>
                                            <option val="v11" disabled="disabled">v11</option>
                                            <option val="v12" disabled="disabled">v12</option>
                                        </select>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td class="talign thh" style="background-color: #E60012;height: 80px;">
                                    <div class="d-grid">
                                        <button class="btn btn-block" id="step1" value="#E60012" onclick="changecolor(this)" style="background-color: #E60012;"><b>STEP 1</b>
                                        </button>
                                    </div>
                                </td>
                                <td class="talign thh colr">

                                    <label><input type="checkbox" id="flexCheckChecked" name="cb1" class="chb" onclick="javascript:disableClass(false)" /> 개별영상반복</label></br>
                                    <label><input type="checkbox" id="flexCheckWeekChecked" name="cb2" class="chb" onclick="javascript:disableClass(true)" /> 주간영상반복</label>

                                </td>
                            </tr>
                            <tr>
                                <td class="talign thh" style="background-color: #F6B33E;height: 80px;">
                                    <div class="d-grid">
                                        <button class="btn btn-block" id="step2" value="#F6B33E" onclick="changecolor(this)" style="background-color: #F6B33E;"><b>STEP 2</b>
                                        </button>
                                    </div>
                                </td>
                                <td class="talign thh colr">
                                    <div class="form-check justify-content-center align-items-center">
                                        <!-- <input id="flexCheckWeekChecked" class="form-check-input" type="checkbox" value="">
                                        <label class="form-check-label" for="flexCheckWeekChecked">
                                            주간영상반복
                                        </label> -->
                                    </div>
                                    <div class="input-group ">
                                        <!-- <div id="idselect" class="input-group-text">Week</div> -->
                                        <select id="iselect-field2" class="form-select">
                                            <option></option>
                                            <option val="v1">1</option>
                                            <option val="v2">2</option>
                                            <option val="v3">3</option>
                                            <option val="v4">4</option>
                                        </select>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td class="talign thh" style="background-color: #01A01D ;height: 80px;">
                                    <div class="d-grid">
                                        <button class="btn btn-block" id="step3" value="#01A01D" onclick="changecolor(this)" style="background-color: #01A01D ;"><b>STEP 3</b>
                                        </button>
                                    </div>
                                </td>
                                <td class="talign thh colr">
                                    <span class="d-flex justify-content-center align-items-center input-group-text colr">
                                        <a href="https://www.eplat.co.kr" style="text-decoration-line: none;"> <i class="fa fa-home fa-3x" style="color: green;"> </i></a> &nbsp;&nbsp;&nbsp;
                                        <a href="https://www.eplat.co.kr/login/login.php" style="text-decoration-line: none;"> <i class="fa fa-sign-out fa-3x" style="color: steelbule;"></i></a>
                                        <a href="javascript:studyRecord();" style="text-decoration-line: none;" > Save </a>
                                    </span>

                                </td>
                            </tr>
                    </table>
                </div>
            </div>
        </div>

        <div class="col-lg-6 myctl">
            <div class="row  shadow" style="background-color: #DACBF4;border-radius: 25px;margin:0px 10px;">
                <div class="" style="margin-top: 10px; text-align: center">
                    <table class="table  rounded rounded-4 giro-table  boder-success overflow-hidden" style="table-layout:fixed;word-break:break-all;">
                        <thead>
                            <tr class="">
                                <th height="70" style="font-size: 1.5rem; background-color:#271841;color:white;text-align: -webkit-center;" class="talign " scope="col" colspan="2">1st Week</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td height="30" class="talign thh align-middle">
                                    <div class="d-flex align-items-center">
                                        1. <a id="w1_1" href="#"><span><img src='..\assets\img\online_study_room\internal_images\online_icon1.png' class="img-thumbnail" /></span></a>
                                        <p style="font-size:x-small"><b>Monthly Song</p></br>
                                        <p style="font-size:x-small" id="w1_1_t" class="badge bg-primary rounded-pill mn10" ></p>
                                    </div>
                                </td>
                                <td height="30" class="talign thh">
                                    <div class="d-flex align-items-center">
                                        5. <a id="w1_5" href="#"><span><img src='..\assets\img\online_study_room\internal_images\online_icon5.png' class="img-thumbnail" /></span></a>
                                        <p style="font-size:x-small"><b>Phonics Song</p></br>
                                        <p style="font-size:x-small" id="w1_5_t" class="badge bg-primary rounded-pill mn10"></p>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td height="30" class="talign thh">
                                    <div class="d-flex align-items-center">
                                        2.
                                        <a id="w1_2" href="#"><span><img src='..\assets\img\online_study_room\internal_images\online_icon2.png' class="img-thumbnail" /></span></a>
                                        <p style="font-size:x-small"><b>Stroy Song</p></br>
                                        <p style="font-size:x-small" id="w1_2_t" class="badge bg-primary rounded-pill mn10"></p>
                                    </div>
                                </td>
                                <td height="30" class="talign thh">
                                    <div class="d-flex align-items-center">
                                        6. <a id="w1_6" href="#"><span><img src='..\assets\img\online_study_room\internal_images\online_icon6.png' class="img-thumbnail" /></span></a>
                                        <p style="font-size:x-small"><b>Phonics read</p></br>
                                        <p style="font-size:x-small" id="w1_6_t" class="badge bg-primary rounded-pill mn10"></p>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td height="30" class="talign thh">
                                    <div class="d-flex align-items-center">
                                        3. <a id="w1_3" href="#"><span><img src='..\assets\img\online_study_room\internal_images\online_icon3.png' class="img-thumbnail" /></span></a>
                                        <p style="font-size:x-small"><b>Stroy read</p></br>
                                        <p style="font-size:x-small" id="w1_3_t" class="badge bg-primary rounded-pill mn10"></p>
                                    </div>
                                </td>
                                <td height="30" class="talign thh">
                                    <div class="d-flex align-items-center">
                                        7. <a id="w1_7" href="#"><span><img src='..\assets\img\online_study_room\internal_images\online_icon7.png' class="img-thumbnail" /></span></a>
                                        <p style="font-size:x-small"><b>Phonics sentence</p></br>
                                        <p style="font-size:x-small" id="w1_7_t" class="badge bg-primary rounded-pill mn10"></p>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td height="30" class="talign thh">
                                    <div class="d-flex align-items-center">
                                        4. <a id="w1_4" href="#"><span><img src='..\assets\img\online_study_room\internal_images\online_icon4.png' class="img-thumbnail" /></span></a>
                                        <p style="font-size:x-small"><b>Stroy sentence</p></br>
                                        <p style="font-size:x-small" id="w1_4_t" class="badge bg-primary rounded-pill mn10"></p>
                                    </div>
                                </td>
                                <td height="30" class="talign thh">
                                    <div class="d-flex align-items-center">
                                        8. <a id="w1_8" href="#"><span><img src='..\assets\img\online_study_room\internal_images\online_icon8.png' class="img-thumbnail" /></span></a>
                                        <p style="font-size:x-small"><b>Rhythm</p></br>
                                        <p style="font-size:x-small" id="w1_8_t" class="badge bg-primary rounded-pill mn10"></p>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-lg-6 myctl" style="margin-top:5px"> <!-- Tab content 1  -->
            <div class="row  shadow " style="background-color: #DACBF4;border-radius: 25px;margin:0px 10px;">
                <div class="" style="margin-top: 10px; text-align: center">
                    <table class="table table-hover rounded rounded-4 giro-table  boder-success overflow-hidden" style="table-layout:fixed;word-break:break-all;height:auto">
                        <thead>
                            <tr class="">
                                <th height="70" style="font-size: 1.5rem; background-color:#271841;color:white;text-align: -webkit-center;" class="talign" scope="col" colspan="2">2nd Week</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td height="30" class="talign thh align-middle">
                                    <div class="d-flex align-items-center">
                                        1. <a id="w2_1" href="#"><span><img src='..\assets\img\online_study_room\internal_images\online_icon1.png' class="img-thumbnail" /></span></a>
                                        <p style="font-size:x-small"><b>Monthly Song</p></br>
                                        <p style="font-size:x-small" id="w2_1_t" class="badge bg-primary rounded-pill mn10"></p>
                                    </div>
                                </td>
                                <td height="30" class="talign thh">
                                    <div class="d-flex align-items-center">
                                        5. <a id="w2_5" href="#"><span><img src='..\assets\img\online_study_room\internal_images\online_icon5.png' class="img-thumbnail" /></span></a>
                                        <p style="font-size:x-small"><b>Phonics Song</p></br>
                                        <p style="font-size:x-small" id="w2_5_t" class="badge bg-primary rounded-pill mn10"></p>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td height="30" class="talign thh">
                                    <div class="d-flex align-items-center">
                                        2.
                                        <a id="w2_2" href="#"><span><img src='..\assets\img\online_study_room\internal_images\online_icon2.png' class="img-thumbnail" /></span></a>
                                        <p style="font-size:x-small"><b>Stroy Song</p></br>
                                        <p style="font-size:x-small" id="w2_2_t" class="badge bg-primary rounded-pill mn10"></p>
                                    </div>
                                </td>
                                <td height="30" class="talign thh">
                                    <div class="d-flex align-items-center">
                                        6. <a id="w2_6" href="#"><span><img src='..\assets\img\online_study_room\internal_images\online_icon6.png' class="img-thumbnail" /></span></a>
                                        <p style="font-size:x-small"><b>Phonics read</p></br>
                                        <p style="font-size:x-small" id="w2_6_t" class="badge bg-primary rounded-pill mn10"></p>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td height="30" class="talign thh">
                                    <div class="d-flex align-items-center">
                                        3. <a id="w2_3" href="#"><span><img src='..\assets\img\online_study_room\internal_images\online_icon3.png' class="img-thumbnail" /></span></a>
                                        <p style="font-size:x-small"><b>Stroy read</p></br>
                                        <p style="font-size:x-small" id="w2_3_t" class="badge bg-primary rounded-pill mn10"></p>
                                    </div>
                                </td>
                                <td height="30" class="talign thh">
                                    <div class="d-flex align-items-center">
                                        7. <a id="w2_7" href="#"><span><img src='..\assets\img\online_study_room\internal_images\online_icon7.png' class="img-thumbnail" /></span></a>
                                        <p style="font-size:x-small"><b>Phonics sentence</p></br>
                                        <p style="font-size:x-small" id="w2_7_t" class="badge bg-primary rounded-pill mn10"></p>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td height="30" class="talign thh">
                                    <div class="d-flex align-items-center">
                                        4. <a id="w2_4" href="#"><span><img src='..\assets\img\online_study_room\internal_images\online_icon4.png' class="img-thumbnail" /></span></a>
                                        <p style="font-size:x-small"><b>Stroy sentence</p></br>
                                        <p style="font-size:x-small" id="w2_4_t" class="badge bg-primary rounded-pill mn10"></p>
                                    </div>
                                </td>
                                <td height="30" class="talign thh">
                                    <div class="d-flex align-items-center">
                                        8. <a id="w2_8" href="#"><span><img src='..\assets\img\online_study_room\internal_images\online_icon8.png' class="img-thumbnail" /></span></a>
                                        <p style="font-size:x-small"><b>Rhythm</p></br>
                                        <p style="font-size:x-small" id="w2_8_t" class="badge bg-primary rounded-pill mn10"></p>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!-- <div class="row shadow   mt-2 rounded"> -->

        <div class="col-lg-6 myctl"> <!-- Tab content 1  -->
            <div class="row shadow   mt-2" style="background-color: #DACBF4;border-radius: 25px;margin:0px 10px;">
                <div class="" style="margin-top: 10px; text-align: center">
                    <table class="table table-hover  rounded rounded-4 giro-table  boder-success overflow-hidden" style="table-layout:fixed;word-break:break-all;height:auto">
                        <thead>
                            <tr class="">
                                <th height="70" style="font-size: 1.5rem; background-color:#271841;color:white;text-align: -webkit-center;" class="talign" scope="col" colspan="2">3rd Week</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td height="30" class="talign thh align-middle">
                                    <div class="d-flex align-items-center">
                                        1. <a id="w3_1" href="#"><span><img src='..\assets\img\online_study_room\internal_images\online_icon1.png' class="img-thumbnail" /></span></a>
                                        <p style="font-size:x-small"><b>Monthly Song</p></br>
                                        <p style="font-size:x-small" id="w3_1_t" class="badge bg-primary rounded-pill mn10"></p>
                                    </div>
                                </td>
                                <td height="30" class="talign thh">
                                    <div class="d-flex align-items-center">
                                        5. <a id="w3_5" href="#"><span><img src='..\assets\img\online_study_room\internal_images\online_icon5.png' class="img-thumbnail" /></span></a>
                                        <p style="font-size:x-small"><b>Phonics Song</p></br>
                                        <p style="font-size:x-small" id="w3_5_t" class="badge bg-primary rounded-pill mn10"></p>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td height="30" class="talign thh">
                                    <div class="d-flex align-items-center">
                                        2.
                                        <a id="w3_2" href="#"><span><img src='..\assets\img\online_study_room\internal_images\online_icon2.png' class="img-thumbnail" /></span></a>
                                        <p style="font-size:x-small"><b>Stroy Song</p></br>
                                        <p style="font-size:x-small" id="w3_2_t" class="badge bg-primary rounded-pill mn10"></p>
                                    </div>
                                </td>
                                <td height="30" class="talign thh">
                                    <div class="d-flex align-items-center">
                                        6. <a id="w3_6" href="#"><span><img src='..\assets\img\online_study_room\internal_images\online_icon6.png' class="img-thumbnail" /></span></a>
                                        <p style="font-size:x-small"><b>Phonics read</p></br>
                                        <p style="font-size:x-small" id="w3_6_t" class="badge bg-primary rounded-pill mn10"></p>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td height="30" class="talign thh">
                                    <div class="d-flex align-items-center">
                                        3. <a id="w3_3" href="#"><span><img src='..\assets\img\online_study_room\internal_images\online_icon3.png' class="img-thumbnail" /></span></a>
                                        <p style="font-size:x-small"><b>Stroy read</p></br>
                                        <p style="font-size:x-small" id="w3_3_t" class="badge bg-primary rounded-pill mn10"></p>
                                    </div>
                                </td>
                                <td height="30" class="talign thh">
                                    <div class="d-flex align-items-center">
                                        7. <a id="w3_7" href="#"><span><img src='..\assets\img\online_study_room\internal_images\online_icon7.png' class="img-thumbnail" /></span></a>
                                        <p style="font-size:x-small"><b>Phonics sentence</p></br>
                                        <p style="font-size:x-small" id="w3_7_t" class="badge bg-primary rounded-pill mn10"></p>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td height="30" class="talign thh">
                                    <div class="d-flex align-items-center">
                                        4. <a id="w3_4" href="#"><span><img src='..\assets\img\online_study_room\internal_images\online_icon4.png' class="img-thumbnail" /></span></a>
                                        <p style="font-size:x-small"><b>Stroy sentence</p></br>
                                        <p style="font-size:x-small" id="w3_4_t" class="badge bg-primary rounded-pill mn10"></p>
                                    </div>
                                </td>
                                <td height="30" class="talign thh">
                                    <div class="d-flex align-items-center">
                                        8. <a id="w3_8" href="#"><span><img src='..\assets\img\online_study_room\internal_images\online_icon8.png' class="img-thumbnail" /></span></a>
                                        <p style="font-size:x-small"><b>Rhythm</p></br>
                                        <p style="font-size:x-small" id="w3_8_t" class="badge bg-primary rounded-pill mn10"></p>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-lg-6 myctl" style="margin-top:5px"> <!-- Tab content 1  -->
            <div class="row shadow   mt-2 " style="background-color: #DACBF4;border-radius: 25px;margin:0px 10px;">
                <div class="" style="margin-top: 10px; text-align: center">
                    <table class="table table-hover  rounded rounded-4 giro-table  boder-success overflow-hidden" style="table-layout:fixed;word-break:break-all;height:auto">
                        <thead>
                            <tr class="">
                                <th height="70" style="font-size: 1.5rem; background-color:#271841;color:white;text-align: -webkit-center;" class="talign" scope="col" colspan="2">4th Week</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td height="30" class="talign thh align-middle">
                                    <div class="d-flex align-items-center">
                                        1. <a id="w4_1" href="#"><span><img src='..\assets\img\online_study_room\internal_images\online_icon1.png' class="img-thumbnail" /></span></a>
                                        <p style="font-size:x-small"><b>Monthly Song</p></br>
                                        <p style="font-size:x-small" id="w4_1_t" class="badge bg-primary rounded-pill mn10"></p>
                                    </div>
                                </td>
                                <td height="30" class="talign thh">
                                    <div class="d-flex align-items-center">
                                        5. <a id="w4_5" href="#"><span><img src='..\assets\img\online_study_room\internal_images\online_icon5.png' class="img-thumbnail" /></span></a>
                                        <p style="font-size:x-small"><b>Phonics Song</p></br>
                                        <p style="font-size:x-small" id="w4_5_t" class="badge bg-primary rounded-pill mn10"></p>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td height="30" class="talign thh">
                                    <div class="d-flex align-items-center">
                                        2.
                                        <a id="w4_2" href="#"><span><img src='..\assets\img\online_study_room\internal_images\online_icon2.png' class="img-thumbnail" /></span></a>
                                        <p style="font-size:x-small"><b>Stroy Song</p></br>
                                        <p style="font-size:x-small" id="w4_2_t" class="badge bg-primary rounded-pill mn10"></p>
                                    </div>
                                </td>
                                <td height="30" class="talign thh">
                                    <div class="d-flex align-items-center">
                                        6. <a id="w4_6" href="#"><span><img src='..\assets\img\online_study_room\internal_images\online_icon6.png' class="img-thumbnail" /></span></a>
                                        <p style="font-size:x-small"><b>Phonics read</p></br>
                                        <p style="font-size:x-small" id="w4_6_t" class="badge bg-primary rounded-pill mn10"></p>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td height="30" class="talign thh">
                                    <div class="d-flex align-items-center">
                                        3. <a id="w4_3" href="#"><span><img src='..\assets\img\online_study_room\internal_images\online_icon3.png' class="img-thumbnail" /></span></a>
                                        <p style="font-size:x-small"><b>Stroy read</p></br>
                                        <p style="font-size:x-small" id="w4_3_t" class="badge bg-primary rounded-pill mn10"></p>
                                    </div>
                                </td>
                                <td height="30" class="talign thh">
                                    <div class="d-flex align-items-center">
                                        7. <a id="w4_7" href="#"><span><img src='..\assets\img\online_study_room\internal_images\online_icon7.png' class="img-thumbnail" /></span></a>
                                        <p style="font-size:x-small"><b>Phonics sentence</p></br>
                                        <p style="font-size:x-small" id="w4_7_t" class="badge bg-primary rounded-pill mn10"></p>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td height="30" class="talign thh">
                                    <div class="d-flex align-items-center">
                                        4. <a id="w4_4" href="#"><span><img src='..\assets\img\online_study_room\internal_images\online_icon4.png' class="img-thumbnail" /></span></a>
                                        <p style="font-size:x-small"><b>Stroy sentence</p></br>
                                        <p style="font-size:x-small" id="w4_4_t" class="badge bg-primary rounded-pill mn10"></p>
                                    </div>
                                </td>
                                <td height="30" class="talign thh">
                                    <div class="d-flex align-items-center">
                                        8. <a id="w4_8" href="#"><span><img src='..\assets\img\online_study_room\internal_images\online_icon8.png' class="img-thumbnail" /></span></a>
                                        <p style="font-size:x-small"><b>Rhythm</p></br>
                                        <p style="font-size:x-small" id="w4_8_t" class="badge bg-primary rounded-pill mn10"></p>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!-- </div> -->
    </div>

    <div class="container" style="visibility: hidden;">
        <!-- <div class="container"> -->
        <h1>Play YouTube or Vimeo Videos in Bootstrap 5 Modal</h1>


        <!-- Button trigger modal -->
        <button type="button" class="btn btn-primary video-btn" data-bs-toggle="modal" data-src="https://www.youtube.com/embed/Jfrjeg26Cwk" data-bs-target="#myModal">
            Play Video 1 - autoplay
        </button>

        <!-- Button trigger modal -->
        <button type="button" class="btn btn-primary video-btn" data-bs-toggle="modal" data-src="https://www.youtube.com/embed/IP7uGKgJL8U" data-bs-target="#myModal">
            Play Video 2
        </button>


        <!-- Button trigger modal -->
        <!-- <button type="button" class="btn btn-primary video-btn" data-bs-toggle="modal"
            data-src="https://www.youtube.com/embed/A-twOC3W558" data-bs-target="#myModal">
            Play Video 3
        </button> -->
        <button type="button" class="btn btn-primary video-btn" data-bs-toggle="modal" data-src="http://127.0.0.1:5502/login/1.mp4" data-bs-target="#myModal">
            Play Video 3
        </button>
        <!-- data-src="http://127.0.0.1:5502/assets/test.mp4" data-bs-target="#myModal"> -->


        <!-- Button trigger modal -->
        <button type="button" class="btn btn-primary video-btn" data-bs-toggle="modal" data-src="https://player.vimeo.com/video/58385453?badge=0" data-bs-target="#myModal">
            Play Vimeo Video
        </button>


        <!-- Modal -->
        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-body">
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></span>
                        </button>
                        <!-- 16:9 aspect ratio -->
                        <div class="ratio ratio-16x9">
                            <iframe class="embed-responsive-item" src="" id="video" allowscriptaccess="always" allow="autoplay"></iframe>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        console.log(screen.width);
        console.log(screen.height);

        var vol = "v3"
        var stp = "step3"
        var count;
        var preventDefaultEnabled = true;

        // <?php
        //     $_SESSION["vol"] = "v3";
        //     $_SESSION["stp"] = "step3";
        // ?>

        if (screen.width > 500) {
            $("#divIntro").height('440px');
        }

        $(".chb").change(function() {
            $(".chb").prop('checked', false);
            $(this).prop('checked', true);
        });

        function disableClass(b) {
            //alert(b);
            if (b == true)
                $(".myctl").addClass("disabledbutton");
            else
                $(".myctl").removeClass("disabledbutton");

        }

        function assignHref(week) {
            var cont = ["cont1", "cont2", "cont3", "cont4", "cont5", "cont6", "cont7", "cont8"]

            const loc = "https://www.eplat.co.kr/assets/img/online_study_room/" // /v3/60-basic_01_Story_Town%20colors.mp4"
            // asign video target

            var id = "<?php echo $_SESSION['user']; ?>";
            var mp4list = [];
            var sql = 'select step, Volumn,  week, cont1, cont2, cont3, cont4, cont5, cont6, cont7, cont8 from ? where Volumn="' + vol + '" and step= "' + stp + '" order by week '
            var res = alasql(sql, [videoJson])
            var chk = 1;
            if ($('#flexCheckChecked').is(':checked')) {
                chk = 1;
            } else {
                chk = 0;
            }

            var k = 1;
            var i = 0;

            studyRecordCount(id)  // check for study count
            $("#w4_8_t").html(3);

            res.forEach(el => { // 4 week i
                cont.forEach(element => {
                    var result = loc + el['Volumn'] + '/' + res[i][element];
                    var myid = "#w" + (i + 1) + "_" + k++;
                    var mmyid = "w" + (i + 1) + "_" + k++;
                    if (chk)
                        $(myid).attr('href', 'singleLong.html?m1=' + result + "&id="+ id + "&uid="+ mmyid + "&vol="+ vol + "&stp="+ stp );
                    else
                        $(myid).attr('href', 'singleShort.html?m1=' + result + "&id="+ id + "&uid="+ mmyid + "&vol="+ vol + "&stp="+ stp);
                    if (week == res[i]['week'])
                        mp4list.push(res[i][element]);


                    for ( var s = 0; s < count.length; s++){
                        if ( count[s].uid == myid || count[s].uid == mmyid) {
                            let iid = count[s].uid+"_t";
                            $(iid).html(count[s].cnt)
                        }
                    }

                    // $(myid).on('click', function (e){
                    //     e.preventDefault();
                    //     studyRecord(id,myid)
                    // });
                    tippy(myid, {
                        content: res[i][element],
                    });
                });
                k = 1;
                i++;
            })

            var urlstr = "?"
            var i = 1;
            mp4list.forEach(et => {
                urlstr += "m" + i + "=" + et + "&"
                i++;
            });

            $("#anchorAll").attr('href', 'mutifulvideoplay.html' + urlstr);

        }

        $(document).ready(function() {

            assignHref(1);
            // Gets the video src from the data-src on each button

            var $videoSrc;
            $('.video-btn').click(function() {
                $videoSrc = $(this).data("src");
            });
            console.log($videoSrc);

            // when the modal is opened autoplay it  
            $('#myModal').on('shown.bs.modal', function(e) {

                // set the video src to autoplay and not to show related video. Youtube related video is like a box of chocolates... you never know what you're gonna get
                $("#video").attr('src', $videoSrc + "?autoplay=1&amp;modestbranding=1&amp;showinfo=0&amp;controls=0");
            })

            // stop playing the youtube video when I close the modal
            $('#myModal').on('hide.bs.modal', function(e) {
                // a poor man's stop video
                $("#video").attr('src', $videoSrc);
            })

            // document ready  

            $("#select-field, #iselect-field2").select2({   // volumr select 변경시
                theme: "bootstrap-5",
                selectionCssClass: "select2--x-small",
                dropdownCssClass: "select2--x-small",
                minimumResultsForSearch: -1,
            });
        });

        function changecolor(e) {

            $("[id^='idangle']").css("color", e.value);
            $(".select2-selection").css("background-color", e.value);
            $(".input-group").css("background-color", e.value);
            $("[id^='idselect']").css("background-color", e.value);
            $(".colr").css("background-color", e.value);
            stp = e.id
        }


        // $('#select-field, #iselect-field2').on('select2:select', function(e) {
        $('#iselect-field2').on('select2:select', function(e) { // volume select 변경시

            var data = e.params.data.text;

            assignHref(Number(data))

            if ($('#flexCheckWeekChecked').is(':checked')) {
                $("#anchorAll")[0].click();
            }

        });

        $('#select-field').on('select2:select', function(e) {

            var data = e.params.data.text;
            
            vol = data

        });

        var saveJson = () => {
            var intid = Math.floor((Math.random() * 100));
            var jsn = JSON.stringify(videoJson)
            //var jsn   = videoJson;
            $.ajax({
                url: "saveJsonDBcopy.php",
                type: "POST",
                dataType: "json",
                data: {
                    id: intid,
                    json_file: jsn
                },
                success: function(res) {
                    alert(res)
                },
                error: function(jqXFR, textStatus, errorThrown) {
                    if (textStatus == "error") {
                        alert(loc + ' ' + textStatus);
                    }
                }
            });
        }

        var readJson = () => {
            var intid = 3;
            //var jsn   = videoJson;
            $.ajax({
                url: "readJsonDB.php",
                type: "POST",
                dataType: "json",
                data: {
                    id: intid
                },
                error: function(jqXFR, textStatus, errorThrown) {
                    if (textStatus == "error") {
                        alert(loc + ' ' + textStatus);
                    }
                }
            });
        }
        var studyRecord = (id,uid) => {
            alert('anchr click!');
            // var data = {id: "admin", step: "S1", volume: "1", uid: "w1_1"};
            var data = {id: id, step: stp, volume: vol, uid: uid};
            $.ajax({
                url: "SstudyRecord.php",
                type: "POST",
                dataType: "json",
                data: data,
                async: false,
                success: function(res) {
                    alert(res)
                },
                error: function(jqXFR, textStatus, errorThrown) {
                    if (textStatus == "error") {
                        alert(loc + ' ' + textStatus);
                    }
                }
            });
        }    

        var studyRecordCount = (id) => {


        var data = {id: id, step: stp, volume: vol};
        $.ajax({
            url: "SstudyRecordCount.php",
            type: "POST",
            dataType: "json",
            data: data,
            async: false,
            success: function(res) {
                count =  res;
            },
            error: function(jqXFR, textStatus, errorThrown) {
                if (textStatus == "error") {
                    alert(loc + ' ' + textStatus);
                }
            },
            complete: function (xhr, status) {

            }
        });
        }             
    </script>
</body>

</html>