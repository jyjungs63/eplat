<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sign Up</title>

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
                        <h2 class="form-title">Sign up</h2>
                        <form method="POST" class="register-form" id="register-form" action="../Server/Sregister.php">
                            <div class="form-group">
                                <label for="id"><i class="zmdi zmdi-email"></i></label>
                                <input type="email" name="id" id="id" placeholder="Your ID(Email)"/>
                            </div>
                            <div class="form-group"> 
                                <label for="name"><i class="zmdi zmdi-account material-icons-name"></i></label>
                                <input type="text" name="name" id="name" placeholder="Your Name"/>
                            </div>
							<div class="form-group">
                                <label for="mobile"><i class="zmdi zmdi-smartphone-iphone"></i></label>
                                <input type="text" name="mobile" id="mobile" placeholder="Your mobile"/>
                            </div>	
                            <div class="form-group" style="margin-top: -15px">
                                <div class="row d-flex" >
                                    <div style="margin-top: -5px">
                                        <button type="button" class="btn btn-sm btn-primary" onclick="execDaumPostcode()" >우편번호</button>
                                    </div>
                                    <div class="d-inline" style="margin-top: -5px;">
                                        <input type="text" name="zipcode" id="zipcode" placeholder="zip code"/>                                                             
                                    </div>	
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="addr" ><i class="zmdi zmdi-home" onclick="execDaumPostcode()"></i></label>
                                <input type="text" name="addr" id="addr" placeholder="Your address"/>                                                             
                            </div>							
                            <div class="form-group">
                                <label for="password"><i class="zmdi zmdi-lock"></i></label>
                                <input type="password" name="password" id="password" placeholder="Password"/>
                            </div>
                            <div class="form-group">
                                <label for="re-pass"><i class="zmdi zmdi-lock-outline"></i></label>
                                <input type="password" name="re_pass" id="re_pass" placeholder="Repeat your password"/>
                            </div>
                            <div class="form-group">
                                <input type="checkbox" name="idrolebm" id="idrolebm" class="agree-term" />
                                <label for="idrolebm" class="label-agree-term"><span><span></span></span>Branch Manager </label> &nbsp;&nbsp;&nbsp;
                                <input type="checkbox" name="idrolet" id="idrolet" class="agree-term" />
                                <label for="idrolet" class="label-agree-term"><span><span></span></span>Teacher </label>
                            </div>
                            <div class="form-group">
                                <input type="checkbox" name="agree-term" id="agree-term" class="agree-term" />
                                <label for="agree-term" class="label-agree-term"><span><span></span></span>I agree all statements in  <a href="#" class="term-service">Terms of service</a></label>
                            </div>
                            <div class="form-group form-button">
                                <input type="submit" name="signup" id="signup" class="form-submit" value="Register"/>
                            </div>
                        </form>
                    </div>
                    <div class="signup-image">
                        <figure><img src="images/signup-image.jpg" alt="sing up image"></figure>
                        <a href="login.php" class="signup-image-link">I am already member</a>
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
<script>
    function execDaumPostcode() {
            new daum.Postcode({
                oncomplete: function (data) {
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
</body><!-- This templates was made by Colorlib (https://colorlib.com) -->
</html>