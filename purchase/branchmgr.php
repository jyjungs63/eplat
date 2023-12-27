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
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.1/css/bootstrap.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/brands.min.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/css/adminlte.min.css">
    <link rel="stylesheet" href="https://unpkg.com/tabulator-tables@5.5.2/dist/css/tabulator.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/alasql@4"></script>
    <script src="../../common.js"></script> -->

    <title>Branch Manage</title>
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
                        <h1>Branch Manage</h1>
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
                                        data-placeholder="Choose Items">
                                        <option val="va">전체</option>
                                        <option val="v4">4세</option>
                                        <option val="v5">5세</option>
                                        <option val="v6">6세</option>
                                        <option val="v7">7세</option>
                                        <option val="ve">교구</option>
                                    </select>&nbsp;
                                    &nbsp;
                                    <input class="form-control form-control-sm" id="idID" type="text" placeholder="ID"
                                        style="width: 10px;">&nbsp;

                                    <input class="form-control form-control-sm" id="idName" type="text"
                                        placeholder="Name">&nbsp;

                                    <input class="form-control form-control-sm" id="idOwner" type="text"
                                        placeholder="Owner">&nbsp;

                                    <input class="form-control form-control-sm" id="idPasswd" type="text"
                                        placeholder="Password">&nbsp;

                                    <input class="form-control form-control-sm" id="idMobile" type="text"
                                        placeholder="Mobile">&nbsp;

                                    <input class="form-control form-control-sm" id="idAddr" type="text"
                                        placeholder="Address" style="width: 100px;">&nbsp;

                                    <input class="form-control form-control-sm" id="idZip" type="text"
                                        placeholder="Zip Code" style="width: 2px;">&nbsp;

                                    <button class="btn btn-outline-primary btn-sm" type="button"
                                        onclick="execDaumPostcode('idAddr','idZip')">주소찾기</button>&nbsp;
                                    &nbsp;
                                    <button class="btn btn-outline-success btn-sm" type="button"
                                        onclick="AddBranch()">Add Branch</button>
                                </div>
                            </h3>
                            <div class="card-tools"><button type="button" class="btn btn-tool btn-sm m-3"
                                    data-card-widget="collapse" data-toggle="tooltip" title="Collapse"><i
                                        class="fas fa-minus"></i></button><button type="button"
                                    class="btn btn-tool btn-sm m-3" data-card-widget="remove" data-toggle="tooltip"
                                    title="Remove"><i class="fas fa-times"></i></button></div>
                        </div>
                        <div class="card-body pad">
                            <div class="d-flex align-items-end justify-content-end" style="margin-bottom: 10px;"><a
                                    id="anchorRead" href="javascript:UpdateBranch()" class="btn btn-info" role="button"
                                    aria-disabled="true" data-toggle="tooltip" title="Update Branch Manager"><i
                                        class="fa-solid fa-user"></i></a></div>
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

    <script>
    var table;
    const loc = document.querySelector('meta[name="location"]').getAttribute('content');

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
        var id = $("#idID").val();
        var name = $("#idName").val();
        var owner = $("#idOwner").val();
        var password = $("#idPasswd").val();
        var mobile = $("#idMobile").val();
        var addr = $("#idAddr").val();
        var zipcode = $("#idZip").val();
        var rdate = "";

        if (id == undefined || id == "") id = faker.name.firstName();
        if (name == undefined || id == "") name = faker.name.firstName();
        if (owner == undefined || owner == "") owner = faker.name.lastName();
        if (password == undefined || password == "") password = generatePassword(10);;
        if (mobile == undefined || mobile == "") mobile = faker.phone.phoneNumber();
        if (addr == undefined || addr == "") addr = faker.address.country() + " " + faker.address.county();
        if (zipcode == undefined || zipcode == "") zipcode = faker.address.zipCode();

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
            mid: 'manager',
        }

        table.addRow(items);

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
            CallToast('New Branch Manager added successfully!!', "success")

        }
        dispErr = (xhr) => {
            CallToast('New Branch Manager added falure!', "error")
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
                role: 2,
                id: "manager"
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

        // 결과 출력
        console.log("Selected Value:", selectedValue);
        console.log("Selected Text:", selectedText);

        var items = [];
        var sql;
        if ("전체" == selectedText)
            sql = 'select uid, grade,title,price from ?  order by uid '
        else
            sql = 'select uid, grade,title,price from ? where grade="' + selectedText + '" order by uid asc'
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

    BranchList();
    </script>
</body>

</html>