<!DOCTYPE html>
<html lang="utf-8">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.1/css/bootstrap.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/brands.min.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/css/adminlte.min.css">
    <link rel="stylesheet" href="https://unpkg.com/tabulator-tables@5.5.2/dist/css/tabulator.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.css">

    <script src="https://cdn.jsdelivr.net/npm/alasql@4"></script>
    <script src="../../common.js"></script>
    <title>Branch Manage</title>
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
                                    <!-- <button class="btn btn-outline-secondary btn-sm" type="button">Select
                                        Items</button> -->
                                    &nbsp;&nbsp;
                                    <select class="form-select form-control-sm" id="idGrade"
                                        data-placeholder="Choose Items">
                                        <option val="va">전체</option>
                                        <option val="v4">4세</option>
                                        <option val="v5">5세</option>
                                        <option val="v6">6세</option>
                                        <option val="v7">7세</option>
                                        <option val="ve">교구</option>
                                    </select>
                                    &nbsp;&nbsp;
                                    <input class="form-control form-control-sm" id="idID" type="text" placeholder="ID">
                                    &nbsp;&nbsp;
                                    <input class="form-control form-control-sm" id="idName" type="text"
                                        placeholder="Name">
                                    &nbsp;&nbsp;
                                    <input class="form-control form-control-sm" id="idPasswd" type="text"
                                        placeholder="Password">
                                    &nbsp;&nbsp;
                                    <input class="form-control form-control-sm" id="idMobile" type="text"
                                        placeholder="Mobile">
                                    &nbsp;&nbsp;
                                    <input class="form-control form-control-sm" id="idAddr" type="text"
                                        placeholder="Address" style="width: 150px;">
                                    &nbsp;&nbsp;
                                    <input class="form-control form-control-sm" id="idZip" type="text"
                                        placeholder="Zip Code" style="width: 10px;">
                                    &nbsp;&nbsp;
                                    <button class="btn btn-outline-primary btn-sm" type="button"
                                        onclick="execDaumPostcode()">
                                        주소찾기</button>
                                    &nbsp;&nbsp;
                                    <button class="btn btn-outline-success btn-sm" type="button"
                                        onclick="AddBranch()">Add
                                        Branch</button>
                                </div>
                            </h3>
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool btn-sm m-3" data-card-widget="collapse"
                                    data-toggle="tooltip" title="Collapse">
                                    <i class="fas fa-minus"></i></button>
                                <button type="button" class="btn btn-tool btn-sm m-3" data-card-widget="remove"
                                    data-toggle="tooltip" title="Remove">
                                    <i class="fas fa-times"></i></button>
                            </div>
                        </div>
                        <div class="card-body pad">
                            <div class="d-flex align-items-end justify-content-end" style="margin-bottom: 10px;">
                                <a id="anchorRead" href="javascript:UpdateBranch()" class="btn btn-info" role="button"
                                    aria-disabled="true"><i class="fa-solid fa-user"></i></a>
                            </div>

                            <div id="idTable">

                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">
                                <i class="fas fa-chart-pie mr-1"></i>
                                Sales
                            </h3>
                            <div class="card-tools d-flex">
                                <ul class="nav nav-pills">
                                    <li class="nav-item">
                                        <a class="nav-link active" href="#revenue-chart" data-bs-toggle="pill">Area</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link " href="#sales-chart" data-bs-toggle="pill">Donut</a>
                                    </li>
                                </ul> &nbsp; &nbsp;
                                </ul> &nbsp; &nbsp;
                                <button type="button" class="btn btn-tool btn-sm" data-card-widget="collapse"
                                    data-toggle="tooltip" title="Collapse">
                                    <i class="fas fa-minus"></i></button>
                                <button type="button" class="btn btn-tool btn-sm" data-card-widget="remove"
                                    data-toggle="tooltip" title="Remove">
                                    <i class="fas fa-times"></i></button>

                            </div>
                        </div>
                        <div class="card-body">
                            <div class="tab-content p-0">
                                <div class=" tab-pane container active" id="revenue-chart"
                                    style="position: relative; height: 500px;">
                                    <canvas id="revenue-chart-canvas" height="500px" style="height: 500px;"></canvas>
                                </div>
                                <div class=" tab-pane container " id="sales-chart"
                                    style="position: relative; height: 500px;">
                                    <canvas id="sales-chart-canvas" height="500px" style="height: 500px;"></canvas>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
    </div>
    </section>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.1/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/js/all.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/js/adminlte.min.js"></script>
    <script src="https://unpkg.com/tabulator-tables@5.5.2/dist/js/tabulator.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js"></script>
    <script src="//t1.daumcdn.net/mapjsapi/bundle/postcode/prod/postcode.v2.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Faker/3.1.0/faker.min.js"></script>
    <script src="branchmgr_js.js"></script>
    <script>
    AddBranch = () => {
        var id = $("#idID").val();
        var name = $("#idName").val();
        var password = $("#idPasswd").val();
        var mobile = $("#idMobile").val();
        var addr = $("#idAddr").val();
        var zipcode = $("#idZip").val();
        if (id == undefined || id == "")
            id = faker.name.findName();
        if (password == undefined || password == "")
            password = faker.name.findName() + '1234';
        var items = {
            id: id,
            name: name,
            password: password,
            mobile: mobile,
            addr: addr,
            zipcode: zipcode,
            mid: 'manager',
        }
        tab.addRow(items);
        var data = {
            "item": items
        }

        $.ajax({
            url: "../../Server/SRegistermgr.php",
            type: "POST",
            dataType: "json",
            data: JSON.stringify(data),
            success: function(resp) {
                alert("success!")
            },
            error: function(e) {
                alert('falure');
                $("#err").html(e).fadeIn();
            }
        });
    };

    UpdateBranch = () => {
        var item = tab.getSelectedData();
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

        $.ajax({
            url: "../../Server/SShowConfirmUpdate.php",
            type: "POST",
            dataType: "json",
            data: JSON.stringify(data),
            success: function(resp) {

            },
            error: function(e) {
                alert('falure');
                $("#err").html(e).fadeIn();
            }
        });
    }

    BranchList = () => {
        var items = [];
        var data = {
            role: 2,
            id: "manager"
        };

        $.ajax({
            url: "../../Server/SShowMgr.php",
            type: "POST",
            dataType: "json",
            data: data,
            success: function(resp) {
                resp.forEach(el => {
                    var jarr = {
                        "id": el['id'],
                        "name": el['name'],
                        "mobile": el['mobile'],
                        "addr": el['addr'],
                        "zipcode": el['zipcode'],
                        "password": el['password'],
                        "rdate": el['rdate'],
                        // "confirm": el['confirm'] == 1 ? "승인" : "미승인",
                    }
                    items.push(jarr);
                });
                tab.clearData()
                tab.setData(items);
            },
            error: function(e) {
                alert('falure');
                $("#err").html(e).fadeIn();
            }
        });
    }
    BranchDelete = (cell) => {
        var result = confirm("Are you sure to delete ??")
        var id = cell._row.data['id']
        var data = {
            id: id
        };
        if (result) {
            $.ajax({
                url: "../../Server/SDeleteMgr.php",
                type: "POST",
                dataType: "json",
                data: data,
                success: function(resp) {
                    cell.delete();
                },
                error: function(e) {
                    alert('falure');
                    $("#err").html(e).fadeIn();
                }
            });
        } else {
            console.log("delete row cancel branchmgr BranchDelete r.260!!");
        }

    }

    function execDaumPostcode() {
        new daum.Postcode({
            oncomplete: function(data) {
                // 팝업에서 검색결과 항목을 클릭했을때 실행할 코드를 작성하는 부분입니다.

                // 각 주소의 노출 규칙에 따라 주소를 조합한다.
                // 내려오는 변수가 값이 없는 경우엔 공백('')값을 가지므로, 이를 참고하여 분기 한다.
                let addr = ''; // 주소 변수

                //사용자가 선택한 주소 타입에 따라 해당 주소 값을 가져온다.
                if (data.userSelectedType === 'R') { // 사용자가 도로명 주소를 선택했을 경우
                    addr = data.roadAddress;
                } else { // 사용자가 지번 주소를 선택했을 경우(J)
                    addr = data.jibunAddress;
                }

                $("#idZip").val(data.zonecode);
                $("#idAddr").val(addr);
                $("#idAddr").focus();
            }
        }).open();
    }

    BranchList();
    </script>
</body>

</html>