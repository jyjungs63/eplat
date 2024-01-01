<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>사용자 등록</title>
    <link rel="icon" type="image/x-icon" href="favicon.ico" />

    <!-- Font Icon -->
    <link rel="stylesheet" href="fonts/material-icon/css/material-design-iconic-font.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Main css -->
    <link rel="stylesheet" href="css/style.css">
</head>

<body>

    <div class="main">

        <!-- Sign up form -->
        <section class="signup">
            <div class="container">
                <div class="signup-content">
                    <div class="signup-form">
                        <p><span style="color: blue">1)지사아이디     2)유치원아이디  3)유료  일반학생  아이디는 </span> 여기에서  회원  가입을  하며, 관리자  승인후에  사용이  가능합니다</p></br>
                        <h4 class="form-title">회원가입</h4>
                        <form method="POST" class="register-form" id="register-form" action="../Server/Sregister.php">
                            <div class="form-group">
                                <input type="checkbox" name="idrolebm" id="idrolebm" class="agree-term" />
                                <label for="idrolebm" class="label-agree-term"><span><span></span></span>지사회원</label> &nbsp;&nbsp;&nbsp;
                                <input type="checkbox" name="idrolet" id="idrolet" class="agree-term" />
                                <label for="idrolet" class="label-agree-term"><span><span></span></span>원장 및 선생님 </label>&nbsp;&nbsp;
                                <input type="checkbox" name="idrolet" id="idroleother" class="agree-term" checked/>
                                <label for="idrolet" class="label-agree-term"><span><span></span></span>일반학생회원 </label>
                            </div>
                            <div class="form-group">
                                <label for="id"><i class="zmdi zmdi-email"></i></label>
                                <input type="text" name="id" id="id" placeholder="아이디" />
                            </div>
                            <div class="form-group">
                                <label for="name"><i class="zmdi zmdi-account material-icons-name"></i></label>
                                <input type="text" name="name" id="name" placeholder="이름" />
                            </div>
                            <div class="form-group">
                                <label for="mobile"><i class="zmdi zmdi-smartphone-iphone"></i></label>
                                <input type="text" name="mobile" id="mobile" placeholder="전화번호" />
                            </div>
                            <div class="form-group" style="margin-top: -15px">
                                <div class="row d-flex">
                                    <div style="margin-top: -5px">
                                        <button type="button" class="btn btn-sm btn-primary" style="border-radius: 30%;"
                                            onclick="execDaumPostcode()" data-bs-toggle="tooltip" data-bs-placement="top" title="우편번호 찾기">검색</button>
                                    </div>
                                    <div class="d-inline" style="margin-top: -5px;">
                                        <input type="text" name="zipcode" id="zipcode" placeholder="우편번호" />
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="addr"><i class="zmdi zmdi-home" onclick="execDaumPostcode()"></i></label>
                                <input type="text" name="addr" id="addr" placeholder="주소" />
                            </div>
                            <div class="form-group">
                                <label for="password"><i class="zmdi zmdi-lock"></i></label>
                                <input type="password" name="password" id="password" placeholder="비밀번호" />
                            </div>
                            <div class="form-group">
                                <label for="re-pass"><i class="zmdi zmdi-lock-outline"></i></label>
                                <input type="password" name="re_pass" id="re_pass" placeholder="비밀번호확인" />
                            </div>

                            <div class="form-group">
                                <input type="checkbox" name="agree-term" id="agree-term" class="agree-term" checked />
                                <label for="agree-term" class="label-agree-term"><span><span></span></span>나는 회원가입을 위하여 약관 및 개인정보 취급방침에 동의 합니다. 
                                <a href="assets/img/newhomepage_eplat.pdf" class="term-service">Terms of service</a></label>
                            </div>
                            <div class="form-group form-button">
                                <input type="submit" name="signup" id="signup" class="form-submit" value="등록" />
                            </div>
                        </form>
                    </div>
                    <div class="signup-image">
                        <figure><img src="images/signup-image.jpg" alt="sing up image"></figure>
                        <a href="login.php" class="signup-image-link">등록된 사용자 입장하기</a>
                    </div>
                </div>
            </div>
        </section>

    </div>

    <!-- JS -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="js/main.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.1/js/bootstrap.min.js"></script>
    <script src="//t1.daumcdn.net/mapjsapi/bundle/postcode/prod/postcode.v2.js"></script>
    <script src="../common.js"></script>
    <script>
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

                $("#zipcode").val(data.zonecode);
                $("#addr").val(addr);
                $("#address").focus();
            }
        }).open();
    }
    </script>
</body>

</html>