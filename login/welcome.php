<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <!-- HTTP 헤더에 no-cache를 설정하는 메타 태그 추가 -->
    <meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate">
    <meta http-equiv="Pragma" content="no-cache">
    <meta http-equiv="Expires" content="0">

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.1/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/js/all.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.1/css/bootstrap.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/brands.min.css" />

    <!-- Styles -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" />
    <link rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/select2-bootstrap-5-theme@1.3.0/dist/select2-bootstrap-5-theme.min.css" />

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script src="mp4list.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/alasql/4.2.2/alasql.min.js"></script>
    <!-- json util like sql -->
    <script src="https://unpkg.com/@popperjs/core@2"></script>
    <script src="https://unpkg.com/tippy.js@6"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <script src="../common.js"></script>
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

.img-thumbnail1 {
    width: 40px;
    height: 40px;
    padding: 0px;
    border: 2px;
    border-style: solid;
    border-color: yellow;
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

.mn10 {
    margin-top: -20px;
}

.modal-smaller {
    max-width: 450px;
    /* Adjust the maximum width as needed */
}
</style>
<!-- width: calc( 100% - 0px ); -->

<body style="overflow: auto;height:100%">

    <div class="row">
        <div class="col-lg-6 ">
            <div id="divIntro" class="row  shadow"
                style="height:260px;background-color: #DACBF4;border-radius: 25px;margin:0px 10px 10px ;padding: 10px 10px ">
                <img style="width:100%; height: 100%" src='..\assets\img\online_study_room\internal_images\intro.jpg'
                    class="rounded img-responsive"></img>
            </div>
        </div>
        <div class="col-lg-6 mb-2" style="margin-top:5px">
            <!-- Tab content 1  -->
            <div class="row  shadow " style="background-color: #DACBF4;border-radius: 25px;margin:0px 10px;">
                <div class="" style="margin-top: 10px; text-align: center">
                    <table class="table  rounded rounded-4 giro-table  boder-success overflow-hidden"
                        style="table-layout:fixed;word-break:break-all;height:auto">
                        <thead>
                            <tr class="">
                                <th height="70"
                                    style="font-size: 1.5rem; background-color:#271841;color:white;text-align: -webkit-center;"
                                    class="talign" scope="col" colspan="2">MENU (Step-Volume-Play)</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="talign thh" style="background-color: #38B6FF;height: 80px;">
                                    <div class="d-grid">
                                        <button class="btn btn-block" id="basic" value="#38B6FF"
                                            onclick="changecolor(this)" style="background-color: #38B6FF;"><b>BASIC</b>
                                        </button>
                                    </div>
                                </td>
                                <td class="talign thh colr" style="height: 50px;">
                                    <a id="anchorAll" href="#" class="btn" role="button" aria-disabled="true"
                                        style="visibility:hidden"></a>
                                    <div id="leftdiv" class="input-group ">
                                        <div id="idselect" class="input-group-text">Vol:</div>
                                        <select id="select-field" class="form-select">
                                            <option val="v0"></option>
                                            <option val="v1">v1</option>
                                            <option val="v2">v2</option>
                                            <option val="v3">v3</option>
                                            <option val="v4" disabled>v4</option>
                                            <option val="v5" disabled>v5</option>
                                            <option val="v6" disabled>v6</option>
                                            <option val="v7" disabled>v7</option>
                                            <option val="v8" disabled>v8</option>
                                            <option val="v9" disabled>v9</option>
                                            <option val="v10" disabled>v10</option>
                                            <option val="v11" disabled>v11</option>
                                            <option val="v12" disabled>v12</option>
                                        </select>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td class="talign thh" style="background-color: #E60012;height: 80px;">
                                    <div class="d-grid">
                                        <button class="btn btn-block" id="step1" value="#E60012"
                                            onclick="changecolor(this)" style="background-color: #E60012;"><b>STEP 1</b>
                                        </button>
                                    </div>
                                </td>
                                <td class="talign thh colr">

                                    <label><input type="checkbox" id="flexCheckChecked" name="cb1" class="chb"
                                            onclick="javascript:disableClass(this)" /> 개별영상반복</label></br>
                                    <label><input type="checkbox" id="flexCheckWeekChecked" name="cb2" class="chb"
                                            onclick="javascript:disableClass(this)" /> 주간영상반복</label>

                                </td>
                            </tr>
                            <tr>
                                <td class="talign thh" style="background-color: #F6B33E;height: 80px;">
                                    <div class="d-grid">
                                        <button class="btn btn-block" id="step2" value="#F6B33E"
                                            onclick="changecolor(this)" style="background-color: #F6B33E;"><b>STEP 2</b>
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
                                            <option val="v1">1주</option>
                                            <option val="v2">2주</option>
                                            <option val="v3">3주</option>
                                            <option val="v4">4주</option>
                                        </select>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td class="talign thh" style="background-color: #01A01D ;height: 80px;">
                                    <div class="d-grid">
                                        <button class="btn btn-block" id="step3" value="#01A01D"
                                            onclick="changecolor(this)" style="background-color: #01A01D ;"><b>STEP
                                                3</b>
                                        </button>
                                    </div>
                                </td>
                                <td class="talign thh colr">
                                    <span
                                        class="d-flex justify-content-center align-items-center input-group-text colr">
                                        <a href="https://www.eplat.co.kr" style="text-decoration-line: none;"> <i
                                                class="fa fa-home fa-3x" style="color: green;"> </i></a>
                                        &nbsp;&nbsp;&nbsp;
                                        <a href="https://www.eplat.co.kr/login/login.php"
                                            style="text-decoration-line: none;"> <i class="fa fa-sign-out fa-3x"
                                                style="color: steelbule;"></i></a>
                                        <!-- <a href="javascript:studyRecord();" style="text-decoration-line: none;" > Save </a> -->
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
                    <table class="table  rounded rounded-4 giro-table  boder-success overflow-hidden"
                        style="table-layout:fixed;word-break:break-all;">
                        <thead>
                            <tr class="">
                                <th height="70"
                                    style="font-size: 1.5rem; background-color:#271841;color:white;text-align: -webkit-center;"
                                    class="talign " scope="col" colspan="1">1st Week</th>
                                <th height="70"
                                    style="font-size: 1.2rem; background-color:#412c6f;color:white;text-align: -webkit-center;"
                                    class="talign " scope="col" colspan="1">
                                    <span><a id="w1_g" href="#"><span><img src='..\memory-game\game.jpg'
                                                    class="img-thumbnail img-thumbnail1" /></span></a></span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                    <span><a id="w1_e" href="#"><span><img src='..\memory-game\extr.jpg'
                                                    class="img-thumbnail img-thumbnail1" /></span></a></span>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td height="30" class="talign thh align-middle">
                                    <div class="d-flex align-items-center">
                                        1. <a id="w1_1" href="#"><span><img
                                                    src='..\assets\img\online_study_room\internal_images\online_icon1.png'
                                                    class="img-thumbnail" /></span></a>
                                        <p style="font-size:x-small"><b>Monthly Song</p></br>
                                        <p style="font-size:x-small" id="w1_1_t"
                                            class="badge bg-primary rounded-pill mn10"></p>
                                    </div>
                                </td>
                                <td height="30" class="talign thh">
                                    <div class="d-flex align-items-center">
                                        5. <a id="w1_5" href="#"><span><img
                                                    src='..\assets\img\online_study_room\internal_images\online_icon5.png'
                                                    class="img-thumbnail" /></span></a>
                                        <p style="font-size:x-small"><b>Phonics Song</p></br>
                                        <p style="font-size:x-small" id="w1_5_t"
                                            class="badge bg-primary rounded-pill mn10"></p>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td height="30" class="talign thh">
                                    <div class="d-flex align-items-center">
                                        2.
                                        <a id="w1_2" href="#"><span><img
                                                    src='..\assets\img\online_study_room\internal_images\online_icon2.png'
                                                    class="img-thumbnail" /></span></a>
                                        <p style="font-size:x-small"><b>Stroy Song</p></br>
                                        <p style="font-size:x-small" id="w1_2_t"
                                            class="badge bg-primary rounded-pill mn10"></p>
                                    </div>
                                </td>
                                <td height="30" class="talign thh">
                                    <div class="d-flex align-items-center">
                                        6. <a id="w1_6" href="#"><span><img
                                                    src='..\assets\img\online_study_room\internal_images\online_icon6.png'
                                                    class="img-thumbnail" /></span></a>
                                        <p style="font-size:x-small"><b>Phonics read</p></br>
                                        <p style="font-size:x-small" id="w1_6_t"
                                            class="badge bg-primary rounded-pill mn10"></p>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td height="30" class="talign thh">
                                    <div class="d-flex align-items-center">
                                        3. <a id="w1_3" href="#"><span><img
                                                    src='..\assets\img\online_study_room\internal_images\online_icon3.png'
                                                    class="img-thumbnail" /></span></a>
                                        <p style="font-size:x-small"><b>Stroy read</p></br>
                                        <p style="font-size:x-small" id="w1_3_t"
                                            class="badge bg-primary rounded-pill mn10"></p>
                                    </div>
                                </td>
                                <td height="30" class="talign thh">
                                    <div class="d-flex align-items-center">
                                        7. <a id="w1_7" href="#"><span><img
                                                    src='..\assets\img\online_study_room\internal_images\online_icon7.png'
                                                    class="img-thumbnail" /></span></a>
                                        <p style="font-size:x-small"><b>Phonics sentence</p></br>
                                        <p style="font-size:x-small" id="w1_7_t"
                                            class="badge bg-primary rounded-pill mn10"></p>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td height="30" class="talign thh">
                                    <div class="d-flex align-items-center">
                                        4. <a id="w1_4" href="#"><span><img
                                                    src='..\assets\img\online_study_room\internal_images\online_icon4.png'
                                                    class="img-thumbnail" /></span></a>
                                        <p style="font-size:x-small"><b>Stroy sentence</p></br>
                                        <p style="font-size:x-small" id="w1_4_t"
                                            class="badge bg-primary rounded-pill mn10"></p>
                                    </div>
                                </td>
                                <td height="30" class="talign thh">
                                    <div class="d-flex align-items-center">
                                        8. <a id="w1_8" href="#"><span><img
                                                    src='..\assets\img\online_study_room\internal_images\online_icon8.png'
                                                    class="img-thumbnail" /></span></a>
                                        <p style="font-size:x-small"><b>Rhythm</p></br>
                                        <p style="font-size:x-small" id="w1_8_t"
                                            class="badge bg-primary rounded-pill mn10"></p>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-lg-6 myctl" style="margin-top:5px">
            <!-- Tab content 1  -->
            <div class="row  shadow " style="background-color: #DACBF4;border-radius: 25px;margin:0px 10px;">
                <div class="" style="margin-top: 10px; text-align: center">
                    <table class="table table-hover rounded rounded-4 giro-table  boder-success overflow-hidden"
                        style="table-layout:fixed;word-break:break-all;height:auto">
                        <thead>
                            <tr class="">
                                <th height="70"
                                    style="font-size: 1.5rem; background-color:#271841;color:white;text-align: -webkit-center;"
                                    class="talign" scope="col" colspan="1">2nd Week</th>
                                <th height="70"
                                    style="font-size: 1.2rem; background-color:#412c6f;color:white;text-align: -webkit-center;"
                                    class="talign " scope="col" colspan="1">
                                    <span><a id="w2_g" href="#"><span><img src='..\memory-game\game.jpg'
                                                    class="img-thumbnail img-thumbnail1" /></span></a></span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                    <span><a id="w2_e" href="#"><span><img src='..\memory-game\extr.jpg'
                                                    class="img-thumbnail img-thumbnail1" /></span></a></span>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td height="30" class="talign thh align-middle">
                                    <div class="d-flex align-items-center">
                                        1. <a id="w2_1" href="#"><span><img
                                                    src='..\assets\img\online_study_room\internal_images\online_icon1.png'
                                                    class="img-thumbnail" /></span></a>
                                        <p style="font-size:x-small"><b>Monthly Song</p></br>
                                        <p style="font-size:x-small" id="w2_1_t"
                                            class="badge bg-primary rounded-pill mn10"></p>
                                    </div>
                                </td>
                                <td height="30" class="talign thh">
                                    <div class="d-flex align-items-center">
                                        5. <a id="w2_5" href="#"><span><img
                                                    src='..\assets\img\online_study_room\internal_images\online_icon5.png'
                                                    class="img-thumbnail" /></span></a>
                                        <p style="font-size:x-small"><b>Phonics Song</p></br>
                                        <p style="font-size:x-small" id="w2_5_t"
                                            class="badge bg-primary rounded-pill mn10"></p>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td height="30" class="talign thh">
                                    <div class="d-flex align-items-center">
                                        2.
                                        <a id="w2_2" href="#"><span><img
                                                    src='..\assets\img\online_study_room\internal_images\online_icon2.png'
                                                    class="img-thumbnail" /></span></a>
                                        <p style="font-size:x-small"><b>Stroy Song</p></br>
                                        <p style="font-size:x-small" id="w2_2_t"
                                            class="badge bg-primary rounded-pill mn10"></p>
                                    </div>
                                </td>
                                <td height="30" class="talign thh">
                                    <div class="d-flex align-items-center">
                                        6. <a id="w2_6" href="#"><span><img
                                                    src='..\assets\img\online_study_room\internal_images\online_icon6.png'
                                                    class="img-thumbnail" /></span></a>
                                        <p style="font-size:x-small"><b>Phonics read</p></br>
                                        <p style="font-size:x-small" id="w2_6_t"
                                            class="badge bg-primary rounded-pill mn10"></p>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td height="30" class="talign thh">
                                    <div class="d-flex align-items-center">
                                        3. <a id="w2_3" href="#"><span><img
                                                    src='..\assets\img\online_study_room\internal_images\online_icon3.png'
                                                    class="img-thumbnail" /></span></a>
                                        <p style="font-size:x-small"><b>Stroy read</p></br>
                                        <p style="font-size:x-small" id="w2_3_t"
                                            class="badge bg-primary rounded-pill mn10"></p>
                                    </div>
                                </td>
                                <td height="30" class="talign thh">
                                    <div class="d-flex align-items-center">
                                        7. <a id="w2_7" href="#"><span><img
                                                    src='..\assets\img\online_study_room\internal_images\online_icon7.png'
                                                    class="img-thumbnail" /></span></a>
                                        <p style="font-size:x-small"><b>Phonics sentence</p></br>
                                        <p style="font-size:x-small" id="w2_7_t"
                                            class="badge bg-primary rounded-pill mn10"></p>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td height="30" class="talign thh">
                                    <div class="d-flex align-items-center">
                                        4. <a id="w2_4" href="#"><span><img
                                                    src='..\assets\img\online_study_room\internal_images\online_icon4.png'
                                                    class="img-thumbnail" /></span></a>
                                        <p style="font-size:x-small"><b>Stroy sentence</p></br>
                                        <p style="font-size:x-small" id="w2_4_t"
                                            class="badge bg-primary rounded-pill mn10"></p>
                                    </div>
                                </td>
                                <td height="30" class="talign thh">
                                    <div class="d-flex align-items-center">
                                        8. <a id="w2_8" href="#"><span><img
                                                    src='..\assets\img\online_study_room\internal_images\online_icon8.png'
                                                    class="img-thumbnail" /></span></a>
                                        <p style="font-size:x-small"><b>Rhythm</p></br>
                                        <p style="font-size:x-small" id="w2_8_t"
                                            class="badge bg-primary rounded-pill mn10"></p>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!-- <div class="row shadow   mt-2 rounded"> -->

        <div class="col-lg-6 myctl">
            <!-- Tab content 1  -->
            <div class="row shadow   mt-2" style="background-color: #DACBF4;border-radius: 25px;margin:0px 10px;">
                <div class="" style="margin-top: 10px; text-align: center">
                    <table class="table table-hover  rounded rounded-4 giro-table  boder-success overflow-hidden"
                        style="table-layout:fixed;word-break:break-all;height:auto">
                        <thead>
                            <tr class="">
                                <th height="70"
                                    style="font-size: 1.5rem; background-color:#271841;color:white;text-align: -webkit-center;"
                                    class="talign" scope="col" colspan="1">3rd Week</th>
                                <th height="70"
                                    style="font-size: 1.2rem; background-color:#412c6f;color:white;text-align: -webkit-center;"
                                    class="talign " scope="col" colspan="1">
                                    <span><a id="w3_g" href="#"><span><img src='..\memory-game\game.jpg'
                                                    class="img-thumbnail img-thumbnail1" /></span></a></span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                    <span><a id="w3_e" href="#"><span><img src='..\memory-game\extr.jpg'
                                                    class="img-thumbnail img-thumbnail1" /></span></a></span>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td height="30" class="talign thh align-middle">
                                    <div class="d-flex align-items-center">
                                        1. <a id="w3_1" href="#"><span><img
                                                    src='..\assets\img\online_study_room\internal_images\online_icon1.png'
                                                    class="img-thumbnail" /></span></a>
                                        <p style="font-size:x-small"><b>Monthly Song</p></br>
                                        <p style="font-size:x-small" id="w3_1_t"
                                            class="badge bg-primary rounded-pill mn10"></p>
                                    </div>
                                </td>
                                <td height="30" class="talign thh">
                                    <div class="d-flex align-items-center">
                                        5. <a id="w3_5" href="#"><span><img
                                                    src='..\assets\img\online_study_room\internal_images\online_icon5.png'
                                                    class="img-thumbnail" /></span></a>
                                        <p style="font-size:x-small"><b>Phonics Song</p></br>
                                        <p style="font-size:x-small" id="w3_5_t"
                                            class="badge bg-primary rounded-pill mn10"></p>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td height="30" class="talign thh">
                                    <div class="d-flex align-items-center">
                                        2.
                                        <a id="w3_2" href="#"><span><img
                                                    src='..\assets\img\online_study_room\internal_images\online_icon2.png'
                                                    class="img-thumbnail" /></span></a>
                                        <p style="font-size:x-small"><b>Stroy Song</p></br>
                                        <p style="font-size:x-small" id="w3_2_t"
                                            class="badge bg-primary rounded-pill mn10"></p>
                                    </div>
                                </td>
                                <td height="30" class="talign thh">
                                    <div class="d-flex align-items-center">
                                        6. <a id="w3_6" href="#"><span><img
                                                    src='..\assets\img\online_study_room\internal_images\online_icon6.png'
                                                    class="img-thumbnail" /></span></a>
                                        <p style="font-size:x-small"><b>Phonics read</p></br>
                                        <p style="font-size:x-small" id="w3_6_t"
                                            class="badge bg-primary rounded-pill mn10"></p>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td height="30" class="talign thh">
                                    <div class="d-flex align-items-center">
                                        3. <a id="w3_3" href="#"><span><img
                                                    src='..\assets\img\online_study_room\internal_images\online_icon3.png'
                                                    class="img-thumbnail" /></span></a>
                                        <p style="font-size:x-small"><b>Stroy read</p></br>
                                        <p style="font-size:x-small" id="w3_3_t"
                                            class="badge bg-primary rounded-pill mn10"></p>
                                    </div>
                                </td>
                                <td height="30" class="talign thh">
                                    <div class="d-flex align-items-center">
                                        7. <a id="w3_7" href="#"><span><img
                                                    src='..\assets\img\online_study_room\internal_images\online_icon7.png'
                                                    class="img-thumbnail" /></span></a>
                                        <p style="font-size:x-small"><b>Phonics sentence</p></br>
                                        <p style="font-size:x-small" id="w3_7_t"
                                            class="badge bg-primary rounded-pill mn10"></p>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td height="30" class="talign thh">
                                    <div class="d-flex align-items-center">
                                        4. <a id="w3_4" href="#"><span><img
                                                    src='..\assets\img\online_study_room\internal_images\online_icon4.png'
                                                    class="img-thumbnail" /></span></a>
                                        <p style="font-size:x-small"><b>Stroy sentence</p></br>
                                        <p style="font-size:x-small" id="w3_4_t"
                                            class="badge bg-primary rounded-pill mn10"></p>
                                    </div>
                                </td>
                                <td height="30" class="talign thh">
                                    <div class="d-flex align-items-center">
                                        8. <a id="w3_8" href="#"><span><img
                                                    src='..\assets\img\online_study_room\internal_images\online_icon8.png'
                                                    class="img-thumbnail" /></span></a>
                                        <p style="font-size:x-small"><b>Rhythm</p></br>
                                        <p style="font-size:x-small" id="w3_8_t"
                                            class="badge bg-primary rounded-pill mn10"></p>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-lg-6 myctl" style="margin-top:5px">
            <!-- Tab content 1  -->
            <div class="row shadow   mt-2 " style="background-color: #DACBF4;border-radius: 25px;margin:0px 10px;">
                <div class="" style="margin-top: 10px; text-align: center">
                    <table class="table table-hover  rounded rounded-4 giro-table  boder-success overflow-hidden"
                        style="table-layout:fixed;word-break:break-all;height:auto">
                        <thead>
                            <tr class="">
                                <th height="70"
                                    style="font-size: 1.5rem; background-color:#271841;color:white;text-align: -webkit-center;"
                                    class="talign" scope="col" colspan="1">4th Week</th>
                                <th height="70"
                                    style="font-size: 1.2rem; background-color:#412c6f;color:white;text-align: -webkit-center;"
                                    class="talign " scope="col" colspan="1">
                                    <span><a id="w4_g" href="#"><span><img src='..\memory-game\game.jpg'
                                                    class="img-thumbnail img-thumbnail1" /></span></a></span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                    <span><a id="w4_e" href="#"><span><img src='..\memory-game\extr.jpg'
                                                    class="img-thumbnail img-thumbnail1" /></span></a></span>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td height="30" class="talign thh align-middle">
                                    <div class="d-flex align-items-center">
                                        1. <a id="w4_1" href="#"><span><img
                                                    src='..\assets\img\online_study_room\internal_images\online_icon1.png'
                                                    class="img-thumbnail" /></span></a>
                                        <p style="font-size:x-small"><b>Monthly Song</p></br>
                                        <p style="font-size:x-small" id="w4_1_t"
                                            class="badge bg-primary rounded-pill mn10"></p>
                                    </div>
                                </td>
                                <td height="30" class="talign thh">
                                    <div class="d-flex align-items-center">
                                        5. <a id="w4_5" href="#"><span><img
                                                    src='..\assets\img\online_study_room\internal_images\online_icon5.png'
                                                    class="img-thumbnail" /></span></a>
                                        <p style="font-size:x-small"><b>Phonics Song</p></br>
                                        <p style="font-size:x-small" id="w4_5_t"
                                            class="badge bg-primary rounded-pill mn10"></p>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td height="30" class="talign thh">
                                    <div class="d-flex align-items-center">
                                        2.
                                        <a id="w4_2" href="#"><span><img
                                                    src='..\assets\img\online_study_room\internal_images\online_icon2.png'
                                                    class="img-thumbnail" /></span></a>
                                        <p style="font-size:x-small"><b>Stroy Song</p></br>
                                        <p style="font-size:x-small" id="w4_2_t"
                                            class="badge bg-primary rounded-pill mn10"></p>
                                    </div>
                                </td>
                                <td height="30" class="talign thh">
                                    <div class="d-flex align-items-center">
                                        6. <a id="w4_6" href="#"><span><img
                                                    src='..\assets\img\online_study_room\internal_images\online_icon6.png'
                                                    class="img-thumbnail" /></span></a>
                                        <p style="font-size:x-small"><b>Phonics read</p></br>
                                        <p style="font-size:x-small" id="w4_6_t"
                                            class="badge bg-primary rounded-pill mn10"></p>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td height="30" class="talign thh">
                                    <div class="d-flex align-items-center">
                                        3. <a id="w4_3" href="#"><span><img
                                                    src='..\assets\img\online_study_room\internal_images\online_icon3.png'
                                                    class="img-thumbnail" /></span></a>
                                        <p style="font-size:x-small"><b>Stroy read</p></br>
                                        <p style="font-size:x-small" id="w4_3_t"
                                            class="badge bg-primary rounded-pill mn10"></p>
                                    </div>
                                </td>
                                <td height="30" class="talign thh">
                                    <div class="d-flex align-items-center">
                                        7. <a id="w4_7" href="#"><span><img
                                                    src='..\assets\img\online_study_room\internal_images\online_icon7.png'
                                                    class="img-thumbnail" /></span></a>
                                        <p style="font-size:x-small"><b>Phonics sentence</p></br>
                                        <p style="font-size:x-small" id="w4_7_t"
                                            class="badge bg-primary rounded-pill mn10"></p>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td height="30" class="talign thh">
                                    <div class="d-flex align-items-center">
                                        4. <a id="w4_4" href="#"><span><img
                                                    src='..\assets\img\online_study_room\internal_images\online_icon4.png'
                                                    class="img-thumbnail" /></span></a>
                                        <p style="font-size:x-small"><b>Stroy sentence</p></br>
                                        <p style="font-size:x-small" id="w4_4_t"
                                            class="badge bg-primary rounded-pill mn10"></p>
                                    </div>
                                </td>
                                <td height="30" class="talign thh">
                                    <div class="d-flex align-items-center">
                                        8. <a id="w4_8" href="#"><span><img
                                                    src='..\assets\img\online_study_room\internal_images\online_icon8.png'
                                                    class="img-thumbnail" /></span></a>
                                        <p style="font-size:x-small"><b>Rhythm</p></br>
                                        <p style="font-size:x-small" id="w4_8_t"
                                            class="badge bg-primary rounded-pill mn10"></p>
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
    <div class="modal fade" tabindex="-1" role="dialog" id="idInfo">
        <div class="modal-dialog modal-smaller fixed-bottom" role="document" style="width: 700px;">
            <div class="modal-content">
                <div class="modal-body text-center">
                    <div id="checkIcon">
                        <i class="text-success fa-solid fa-circle-check fa-3x"></i>
                    </div>
                    <div class="mt-4 py-2">

                        <h6 class="h6">동영상 연속시청 중 더이상 재생이 안될시 브라우저를 </h6>
                        <h6 class="h6">닫고 브라우저 새로 열어서 시청 하시면 됩니다.</h6>
                    </div>
                    <div class="py-1"><button id="idClose" type="button"
                            class="btn btn-sm btn-outline-success rounded-pill px-5" data-bs-dismiss="modal">OK</button>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <script src="../common.js"></script>
    <script>
    // console.log(screen.width);
    // console.log(screen.height);
    if (getUser() == "" || getUser() == undefined)
        window.location.href = "../index.php";
    var cmap = {
        basic: "#38B6FF",
        step1: "#E60012",
        step2: "#F6B33E",
        step3: "#01A01D"
    };
    var vol, stp, ck1, ck2, week;
    var count;
    var tarr = []

    var stat = {};

    setInit()
    //assignHref(1)

    if (screen.width > 500) {
        $("#divIntro").height('440px');
    }

    var myModal = new bootstrap.Modal(document.getElementById('idInfo'));

    document.addEventListener('DOMContentLoaded', function() {
        // if (handleStorage.getStorage("today")) {
        //     myModal.hide();
        // } else {
        //     myModal.show();
        // }
    });
    var handleStorage = {
        // 스토리지에 데이터 쓰기(이름, 만료일)
        setStorage: function(name, exp) {
            // 만료 시간 구하기(exp를 ms단위로 변경)
            var date = new Date();
            date = date.setTime(date.getTime() + exp * 24 * 60 * 60 * 1000);

            // 로컬 스토리지에 저장하기
            // (값을 따로 저장하지 않고 만료 시간을 저장)
            localStorage.setItem(name, date)
        },
        // 스토리지 읽어오기
        getStorage: function(name) {
            var now = new Date();
            now = now.setTime(now.getTime());
            // 현재 시각과 스토리지에 저장된 시각을 각각 비교하여
            // 시간이 남아 있으면 true, 아니면 false 리턴
            return parseInt(localStorage.getItem(name)) > now
        }
    };

    // 오늘하루 보지 않기 버튼
    $("#idClose").on("click", function() {
        // 로컬 스토리지에 today라는 이름으로 1일(24시간 뒤) 동안 보이지 않게
        handleStorage.setStorage("today", 1);
        myModal.hide();
    });

    $(".chb").change(function() {
        //$(".chb").prop('checked', false);
        //$(this).prop('checked', true);
    });


    function isKeyExists(key) {
        return localStorage.getItem(key) !== null;
    }

    function disableClass(b) {
        //alert(b);
        if (b.name == 'cb2' && b.checked) {
            $(".myctl").addClass("disabledbutton");
            $('#flexCheckChecked').prop('checked', false);
        } else {
            const selectOpt = $("#iselect-field2").find(":selected");
            const selectArr = selectOpt.map(function() {
                return $(this).text();
            }).get();
            var selectT = selectArr.join(', ')
            if (selectT == "")
                selectT = "1주";
            assignHref(Number(selectT.slice(0, 1)));
            $(".myctl").removeClass("disabledbutton");
        }
    }

    function setInit() {

        if (isKeyExists('currentStatus')) {
            stat = JSON.parse(localStorage.getItem('currentStatus'));
            vol = stat['vol']
            stp = stat['stp']
        } else {
            stat = {
                vol: "v1",
                stp: "basic",
                ck1: 0,
                ck2: 0,
                week: 1
            };
        }
        vol = stat['vol']
        stp = stat['stp']
        changecolor2(cmap[stat['stp']]); // local storage 에 저장된 step
        $('#select-field').val(stat['vol']).trigger('change');
        $('#flexCheckChecked').prop('checked', stat['ck1']); // 
        $('#flexCheckWeekChecked').prop('checked', stat['ck2']);
        var status = {
            name: 'cb2',
            checked: stat['ck2']
        }
        disableClass(status);
    }

    function assignHref(week) {
        var cont = ["cont1", "cont2", "cont3", "cont4", "cont5", "cont6", "cont7", "cont8"]

        const loc = "https://www.eplat.co.kr/assets/img/online_study_room/" // /v3/60-basic_01_Story_Town%20colors.mp4"
        // asign video target

        var id = getUser();
        var mp4list = [];
        var sql =
            'select step, Volumn,  week, cont1, cont2, cont3, cont4, cont5, cont6, cont7, cont8 from ? where Volumn="' +
            vol + '" and step= "' + stp + '" order by week '
        var res = alasql(sql, [videoJson])

        if ($('#flexCheckChecked').is(':checked')) { // 개별 영상 무한 반복 Check or Not
            ck1 = 1;
        } else {
            ck1 = 0;
        }
        if ($('#flexCheckWeekChecked').is(':checked')) { // 주간 영상 반복
            ck2 = 1;
        } else {
            ck2 = 0
        }

        var k = 1;
        var i = 0;
        var j = 0;

        studyRecordCount(id) // 사용자의 id에 저장된 조회 check for study count
        $("#w4_8_t").html(3);


        res.forEach(el => { // 4 week i
            cont.forEach(element => {
                var result = loc + el['Volumn'] + '/' + res[i][element];
                var myid = "#w" + (i + 1) + "_" + k;
                var mmyid = "w" + (i + 1) + "_" + k++;
                $(myid + "_t").html('')
                if (ck1) { // 개별 영상 무한 
                    $(myid).prop('href', '#')
                    //$(myid).prop('href', 'singleLong.html?m1=' + result + "&id=" + id + "&uid=" + mmyid + "&vol=" + vol + "&stp=" + stp);
                    $(myid).prop('href', 'singleLong.html?m1=' + result);
                } else { // 개별 영상 한번
                    $(myid).prop('href', '#')
                    $(myid).prop('href', 'singleShort.html?m1=' + result + "&id=" + id + "&uid=" +
                        mmyid + "&vol=" + vol + "&stp=" + stp);
                }
                if (week == res[i]['week'])
                    mp4list.push(res[i][element]);


                for (var s = 0; s < count.length; s++) {
                    if (count[s].uid == myid || count[s].uid == mmyid) {
                        let iid = count[s].uid + "_t";
                        $(iid).html(count[s].cnt)
                    }
                }
                if (tarr.length > 0 && tarr.length == 32) {
                    let tv = tarr[j];
                    tv[0].setContent(res[i][element]);
                } else {
                    let t = tippy(myid, {
                        content: res[i][element]
                    });
                    tarr.push(t);
                }
                j++;
            });
            k = 1;
            i++;
        })

        var urlstr = "?"
        urlstr += "m0=" + vol + "&"
        var i = 1;
        mp4list.forEach(et => {
            urlstr += "m" + i + "=" + et + "&"
            i++;
        });

        $("#anchorAll").attr('href', 'mutifulvideoplay.html' + urlstr);

    }

    $(document).ready(function() {

        assignHref(1);
        assinGame("basic");

        var $videoSrc;
        $('.video-btn').click(function() {
            $videoSrc = $(this).data("src");
        });

        // when the modal is opened autoplay it  
        $('#myModal').on('shown.bs.modal', function(e) {
            $("#video").attr('src', $videoSrc +
                "?autoplay=1&amp;modestbranding=1&amp;showinfo=0&amp;controls=0");
        })

        // stop playing the youtube video when I close the modal
        $('#myModal').on('hide.bs.modal', function(e) {
            $("#video").attr('src', $videoSrc);
        })

        $("#select-field, #iselect-field2").select2({ // volumr select 변경시
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
        $('#select-field').val('v0').trigger('change');
        assinGame(stp);

    }

    function assinGame(stp) {
        var clas = "y4";
        if (stp == "step1") {
            clas = "y5";
        } else if (stp == "step2") {
            clas = "y6";
        } else if (stp == "step3") {
            clas = "y7";
        }
        for (var i = 1; i < 5; i++) {
            let idgame = "#w" + i + "_g";
            let idextr = "#w" + i + "_e";
            $(idgame).prop('href', '../memory-game/index.html?clas=' + clas + '&sor=phonex');
            $(idextr).prop('href', '../memory-game/index.html?clas=' + clas + "&sor=sentens");
        }
    }

    function changecolor2(value) {

        $("[id^='idangle']").css("color", value);
        $(".select2-selection").css("background-color", value);
        $(".input-group").css("background-color", value);
        $("[id^='idselect']").css("background-color", value);
        $(".colr").css("background-color", value);
        // stp = e.id
        // $('#select-field').val('v0').trigger('change');
    }

    // $('#select-field, #iselect-field2').on('select2:select', function(e) {
    $('#iselect-field2').on('select2:select', function(e) { // volume select 변경시

        var data = e.params.data.text;

        assignHref(Number(data.slice(0, 1)))

        if ($('#flexCheckWeekChecked').is(':checked')) {
            $("#anchorAll")[0].click();
        }
    });

    $('#select-field').on('select2:select', function(e) {

        var data = e.params.data.text;
        vol = data
        assignHref(Number(1))
    });

    window.addEventListener('beforeunload', function(e) {

        stat = {
            vol: vol,
            stp: stp,
            ck1: ck1,
            ck2: ck2,
            week: week
        };
        localStorage.setItem('currentStatus', JSON.stringify(stat));
    });

    function studyRecordCount(id) {

        var data = {
            id: id,
            step: stp,
            volume: vol
        };
        $.ajax({
            url: "SstudyRecordCount.php",
            type: "POST",
            dataType: "json",
            data: data,
            async: false,
            success: function(res) {
                count = res;
            },
            error: function(jqXFR, textStatus, errorThrown) {
                if (textStatus == "error") {
                    alert(loc + ' ' + textStatus);
                }
            },
            complete: function(xhr, status) {}
        });
    }
    </script>
</body>

</html>