<?php
include "../header.php";
?>
<!DOCTYPE html>
<html lang="utf-8">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <?php
    include '../include.php';
    ?>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.css">

    <script src="https://cdn.jsdelivr.net/npm/alasql@4"></script>
    <script src="../../common.js"></script>
    <link href="../common.css" rel="stylesheet">
    <title>지사 및 원관리</title>
    <style>
    .form-control-xsm {
        padding: .25rem .5rem;
        /* 내부 여백(padding) 설정 */
        font-size: .875rem;
        /* 폰트 크기 설정 */
        line-height: 0.5;
        /* 줄 간격 설정 */
        border-radius: .2rem;
        /* 테두리 반경 설정 */
    }
    </style>
</head>

<body>
    <div class="p-3">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h5 id="brachname">지사/원관리 리스트</h5>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active"><a href="#">Prev</a></li>
                        </ol>
                    </div>
                </div>
            </div>
        </section>
        <section class="content">
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-outline card-info">
                        <div class="card-header">
                            <h3 class="card-title">
                                <div class="input-group mb-3">

                                    <select class="form-select form-control-sm" id="idGrade"
                                        data-placeholder="Choose Items" style="width: 120px;">
                                        <option val="va">전체</option>
                                        <option val="v4" selected>지사관리</option>
                                        <option val="v5">원관리</option>
                                    </select>&nbsp;
                                    &nbsp;

                                    <input class="form-control form-control-sm" id="idOwner" type="text"
                                        placeholder="지사/유치원명" style="width: 150px;">&nbsp;

                                    <input class="form-control form-control-sm" id="idName" type="text" placeholder="이름"
                                        style="width: 150px;">&nbsp;

                                    <input class="form-control form-control-sm" id="idMobile" type="text"
                                        placeholder="전화번호" style="width: 120px;">&nbsp;

                                    <input class="form-control form-control-sm" id="idID" type="text" placeholder="아이디"
                                        style="width: 100px;">&nbsp;

                                    <input class="form-control form-control-sm" id="idPasswd" type="text"
                                        placeholder="비밀번호" style="width: 100px;">&nbsp;

                                    <input class="form-control form-control-sm" id="idZip" type="text"
                                        placeholder="우편번호" style="width: 70px;">&nbsp;

                                    <input class="form-control form-control-sm" id="idAddr" type="text" placeholder="주소"
                                        style="width: 250px;">&nbsp;

                                    <button class="btn btn-outline-primary btn-sm" type="button"
                                        onclick="execDaumPostcode('idZip','idAddr')">주소검색</button>&nbsp;
                                    &nbsp;
                                    <button class="btn btn-success btn-sm" type="button"
                                        onclick="AddBranch()">등록</button>
                                </div>
                            </h3>
                            <div class="card-tools"><button type="button" class="btn btn-tool btn-sm m-3"
                                    data-card-widget="collapse" data-toggle="tooltip" title="Collapse"><i
                                        class="fas fa-minus"></i></button><button type="button"
                                    class="btn btn-tool btn-sm m-3" data-card-widget="remove" data-toggle="tooltip"
                                    title="Remove"><i class="fas fa-times"></i></button></div>
                        </div>
                        <div class="card-body pad">
                            <div class="d-flex align-items-end justify-content-end" style="margin-bottom: 10px;">
                                <!-- <a
                                    id="anchorRead" href="javascript:UpdateBranch()" class="btn btn-info" role="button"
                                    aria-disabled="true" data-toggle="tooltip" title="갱신하기"><i
                                        class="fa-solid fa-user"></i>
                                </a> -->
                                <button class="btn btn-primary" type="button" data-toggle="tooltip" title="지사 추가 하기"
                                    onclick="UpdateBranch()"><i class="fa-solid fa-user"></i>수정
                                </button>
                            </div>

                            <div id="idTable"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title"><i class="fas fa-chart-pie mr-1"></i>Sales </h3>
                            <div class="card-tools d-flex">
                                <ul class="nav nav-pills">
                                    <li class="nav-item"><a class="nav-link active" href="#revenue-chart"
                                            data-bs-toggle="pill">Area</a></li>
                                    <li class="nav-item"><a class="nav-link " href="#sales-chart"
                                            data-bs-toggle="pill">Donut</a></li>
                                </ul>&nbsp;
                                &nbsp;
                                </ul>&nbsp;
                                &nbsp;
                                <button type="button" class="btn btn-tool btn-sm" data-card-widget="collapse"
                                    data-toggle="tooltip" title="Collapse"><i class="fas fa-minus"></i></button><button
                                    type="button" class="btn btn-tool btn-sm" data-card-widget="remove"
                                    data-toggle="tooltip" title="Remove"><i class="fas fa-times"></i></button>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="tab-content p-0">
                                <div class=" tab-pane container active" id="revenue-chart"
                                    style="position: relative; height: 500px;"><canvas id="revenue-chart-canvas"
                                        height="500px" style="height: 500px;"></canvas></div>
                                <div class=" tab-pane container " id="sales-chart"
                                    style="position: relative; height: 500px;"><canvas id="sales-chart-canvas"
                                        height="500px" style="height: 500px;"></canvas></div>
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js"></script>
    <script src="branchmgr_js.js"></script>
    <script src="../common.js"></script>
    <script src="../header.js"></script>

    <script>
    var table;

    if (role != '1') {
        CallToast("지사 관리 권한으로 로긴 하세요", "error");
        window.location.href = "../index.php";
    }
    document.getElementById("brachname").innerHTML = "[" + user + "]" + "지사/원관리 리스트";

    function generatePassword(length) {
        const charset = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789!@#$%^&*()_-+=";
        let password = '';

        for (let i = 0; i < length; i++) {
            const randomIndex = Math.floor(Math.random() * charset.length);
            password += charset[randomIndex];
        }

        return password;
    }

    AddBranch = () => {

        var selectElement = document.getElementById("idGrade"); // 지사 또는 원관리
        var selectedValue = selectElement.value;

        var id = $("#idID").val(); // 아이디
        var name = $("#idName").val(); // 이름
        var owner = $("#idOwner").val(); // 지사명
        var password = $("#idPasswd").val();
        var mobile = $("#idMobile").val();
        var addr = $("#idAddr").val();
        var zipcode = $("#idZip").val();
        var role = selectedValue == "v4" ? 1 : 2; // 1 branch manager , 2 // teacher
        var rdate = "";

        // if (id == undefined || id == "") id = faker.name.firstName();
        // if (name == undefined || id == "") name = faker.name.firstName();
        // if (owner == undefined || owner == "") owner = faker.name.lastName();
        // if (password == undefined || password == "") password = generatePassword(10);;
        // if (mobile == undefined || mobile == "") mobile = faker.phone.phoneNumber();
        // if (addr == undefined || addr == "") addr = faker.address.country() + " " + faker.address.county();
        // if (zipcode == undefined || zipcode == "") zipcode = faker.address.zipCode();

        const formattedDate = formatDate();
        if (rdate == undefined || rdate == "") rdate = formattedDate;

        var items = {
            id: id,
            name: name,
            owner: owner,
            password: password,
            mobile: mobile,
            addr: addr,
            zipcode: zipcode,
            mid: user,
            role: role,
            rdate: rdate,
        }

        var data = {
            "item": items
        }
        // $.ajax({
        //     url: "../Server/SRegistermgr.php",
        //     type: "POST",
        //     dataType: "json",
        //     data: JSON.stringify(data),
        //     success: function(resp) {
        //         alert("success!")
        //     },
        //     error: function(xhr, status, error) {
        //         alert('SRegistermgr ' + error);
        //         $("#err").html(e).fadeIn();
        //     }
        // });

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
            functionName: 'SRegistermgr',
            otherData: {
                items
            }
        };
        CallAjax("SMethods.php", "POST", options, dispList, dispErr);
    };

    UpdateBranch = () => {
        var item = table.getSelectedData();
        var items = [];

        item.forEach(el => {
            var jarr = {
                "id": el['id'],
                "name": el['name'],
                "mobile": el['mobile'],
                "addr": el['addr'],
                "zipcode": el['zipcode'],
                "password": el['password'],
                "confirm": 1,
            }
            items.push(jarr);
        })
        var data = {
            "item": items
        }
        // $.ajax({

        //     url: "../Server/SShowConfirmUpdate.php",
        //     type: "POST",
        //     dataType: "json",
        //     data: JSON.stringify(data),
        //     success: function(resp) {},
        //     error: function(e) {
        //         alert('SShowConfirmUpdate!' + e);
        //     }
        // });

        dispList = (resp) => {
            CallToast('New Branch Manager Updated successfully!!', "success")
        }
        dispErr = (xhr) => {
            CallToast('New Branch Manager Update falure!', "error")
        }

        var options = {
            functionName: 'SShowConfirmUpdate',
            otherData: {
                items
            }
        };
        CallAjax("SMethods.php", "POST", options, dispList, dispErr);

    }

    BranchList = () => {
        var items = [];

        dispList = (resp) => {
            resp.forEach(el => {
                var jarr = {
                    "id": el['id'],
                    "name": el['name'],
                    "owner": el['owner'],
                    "mobile": el['mobile'],
                    "addr": el['addr'],
                    "zipcode": el['zipcode'],
                    "password": el['password'],
                    "rdate": el['rdate'],
                }
                items.push(jarr);
            });
            table.clearData();
            table.setData(items);
        }
        dispErr = (e) => {
            alert("SShowMgr Error!" + e);
        }

        var options = {
            functionName: 'SShowMgr',
            otherData: {
                role: "va", //전체
                id: user
            }
        };

        CallAjax("SMethods.php", "POST", options, dispList, dispErr);
    }

    BranchDelete = (cell) => {
        var result = confirm("Are you sure to delete ??");
        var id = cell._row.data['id'];

        dispList = (resp) => {
            cell.delete();
        }
        dispErr = (xhr) => {
            alert("SDeleteMgr Error" + xhr.statusText);
        }

        var options = {
            functionName: 'SDeleteMgr',
            otherData: {
                id: id
            }
        };

        if (result) {
            CallAjax("SMethods.php", "POST", options, dispList, dispErr);
        } else
            console.log("delete row cancel branchmgr BranchDelete r.260!!");
    }

    document.getElementById("idGrade").addEventListener("change", function() {
        // 선택된 옵션 가져오기
        var selectedOption = this.options[this.selectedIndex];

        // 선택된 옵션의 값(value) 가져오기
        var selectedValue = selectedOption.value;

        // 선택된 옵션의 텍스트 가져오기
        var selectedText = selectedOption.text;

        var items = [];

        dispList = (resp) => {
            resp.forEach(el => {
                var jarr = {
                    "id": el['id'],
                    "name": el['name'],
                    "owner": el['owner'],
                    "mobile": el['mobile'],
                    "addr": el['addr'],
                    "zipcode": el['zipcode'],
                    "password": el['password'],
                    "rdate": el['rdate'],
                }
                items.push(jarr);
            });
            table.clearData();
            table.setData(items);
        }
        dispErr = (e) => {
            alert("SShowMgr Error!" + e);
        }

        var options = {
            functionName: 'SShowMgr',
            otherData: {
                role: selectedValue,
                id: user
            }
        };

        CallAjax("SMethods.php", "POST", options, dispList, dispErr);
    });

    BranchList();
    </script>
</body>

</html>