<?php

//session_start();
// if( isset($_SESSION['user']))
// {
//     echo "</br>";
//     echo "<h5 align='center'>Welcome eplat study home</h5>";
//     echo "<h5 align='center'>".$_SESSION["user"]."</h5>";
//     echo "<p align='center'><a href='logout.php'>Logout</a></p>";
//     echo "</br>";
// }
// else
// {
//     header('location:login.php');
// }

?>

<html>

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>이플렛</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.1/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/js/all.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.1/css/bootstrap.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/brands.min.css" />

    <style>
        .talin {
            text-align: -moz-center;
            vertical-align: middle;
            text-align: -webkit-center;
        }

        .tmag {
            border-collapse: separate;
            border-spacing: 10px 15px;
        }
        .img {
            width: 100px;
            height: 70px;
            background-size:100% 100%;
            }
            .modal-dialog {
      max-width: 800px;
      margin: 30px auto;
  }

.modal-body {
  position:relative;
  padding:0px;
}
.btn-close {
  position:absolute;
  right:-30px;
  top:0;
}
    </style>
</head>

<body>
    <script>
        function changecolor() {
            $("#idgoogle").css("color", "green");
            $("[id^='idangle']").css("color", "yellow");
        }
    </script>

    <!-- contaner를 full responsive  -->
    <div class="container-fluid p-5" style="background-color: coral; border-radius: 15px; border: 2px solid #000;">

        <div class="col-lg-12  shadow p-3 mb-n6 bg-white rounded d-flex justify-content-around" style="height:100px">
            <i id="" class="fa fa-home fa-3x" style="color: blue;"></i>
            <p style="color:violet;font-family:'Times New Roman', Times, serif; font-size:2rem">Online Study</p>
            <img src='assets\p1.png' class="img-thumbnail" style="width:48px;height:48px" />
        </div>

        <div class="col-lg-12 shadow p-3 mb-5 bg-white rounded">
            <div class="row d-frex" style="display: inline-block; text-align: center;">
                <div class="row d-flex">
                    <div class="btn-group" role="group" aria-label="Basic example">
                        <button type="button" class="btn btn-primary" onclick="alert('hello')">Left</button>
                        <button type="button" class="btn btn-warning" onclick="window.location='http://localhost:3000/login/register.php'">Middle</button>
                        <button type="button" class="btn btn-success" onclick="changecolor()">Right</button> &nbsp; &nbsp;
                        <i class="fa fa-envelope fa-3x" style="color: red;" aria-hidden="true"></i> &nbsp; &nbsp;
                        <i id="idangle1" class="fa fa-angle-double-left fa-3x" aria-hidden="true" style="color: #A3d3f4;"></i>
                        <i id="idgoogle" class="fa-brands fa-google fa-3x" style="color: blue;"></i>
                        <i id="idangle2" class="fa fa-angle-double-right fa-3x" aria-hidden="true" style="color: pink;"></i>
                    </div>
                </div>
            </div>
        </div>

        <div class="row p-3 mt-n6 bg-success rounded">
            <div class="col-lg-6">
                <div class="table-responsive container-fluid">
                    <table class="table table-hover table-success table-striped rounded rounded-4   boder-success  tmag overflow-hidden"  >
                        <thead>
                        <th class="talin" scope="col" colspan="2">1주</th>

                        </thead>
                        <tbody>
                            <tr height="50">
                                <td class="img" height="50" >
                                            <a id="PreferredNameLnk" href="https://youtu.be/aCoyAzeug4Y"><span><img
                                                        src='../assets/img/portfolio/cabin.png'
                                                        class="img-thumbnail" /></span>youtube</a>
                                </td>
                                <td class="talin">Cell 2</td>
                            </tr>
                            <tr>
                                <td class="talin">Cell 3</td>
                                <td class="talin">Cell 4</td>
                            </tr>
                            <tr>
                                <td class="talin">Cell 1</td>
                                <td class="talin">Cell 2</td>
                            </tr>
                            <tr>
                                <td class="talin">Cell 3</td>
                                <td class="talin">Cell 4</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="table-responsive">
                    <table class="table tmag rounded-4">
                        <thead>
                        <th class="talin" scope="col" colspan="2">2주</th>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Cell 1</td>
                                <td>Cell 2</td>
                            </tr>
                            <tr>
                                <td>Cell 3</td>
                                <td>Cell 4</td>
                            </tr>
                            <tr>
                                <td>Cell 1</td>
                                <td>Cell 2</td>
                            </tr>
                            <tr>
                                <td>Cell 3</td>
                                <td>Cell 4</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>


            <div class="col-lg-6">
                <div class="table-responsive">
                    <table class="table tmag rounded-4">

                        <thead>
                        <th class="talin" scope="col" colspan="2">3주</th>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Cell 1</td>
                                <td>Cell 2</td>
                            </tr>
                            <tr>
                                <td>Cell 3</td>
                                <td>Cell 4</td>
                            </tr>
                            <tr>
                                <td>Cell 1</td>
                                <td>Cell 2</td>
                            </tr>
                            <tr>
                                <td>Cell 3</td>
                                <td>Cell 4</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="table-responsive">
                    <table class="table tmag rounded-4">

                        <thead>
                        <th class="talin" scope="col" colspan="2">4주</th>

                        </thead>
                        <tbody>
                            <tr>
                                <td>Cell 1</td>
                                <td>Cell 2</td>
                            </tr>
                            <tr>
                                <td>Cell 3</td>
                                <td>Cell 4</td>
                            </tr>
                            <tr>
                                <td>Cell 1</td>
                                <td>Cell 2</td>
                            </tr>
                            <tr>
                                <td>Cell 3</td>
                                <td>Cell 4</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

</body>

</html>
