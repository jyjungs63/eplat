
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>이플렛</title>
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
    <!-- Font Awesome icons (free version)-->
    <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
    <!-- Google fonts-->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css" />
    <link href="https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700" rel="stylesheet" type="text/css" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="css/styles.css" rel="stylesheet" />


    <style>
    .table-image {

        td,
        th {
            dmadkr vertical-align: middle;
        }
    }

    hr {
        height: 2px;
        background-color: #17324d;
        < !-- background-color: #5e48af;
        -->border: none;
    }
    </style>

    <style>
    .firstcharacter {
        float: left;
        font-family: Georgia;
        font-size: 50px;
        line-height: 36px;
        padding-top: 1px;
        padding-right: 1px;
        padding-left: 1px;
    </style>

    <style>
    strong {
        font-weight: bold;
    }

    .btn-close {
        position: absolute;
        right: 0;
        padding: 1em;
    }
    </style>


    <style>
    subtitle1-tt {
        float: left;
        padding: 10px;
        width: 100%;
        background-color: #5f6ca7;
        height: 50px;
        text-align: center;
        color: white;
    }
    </style>



</head>

<!-- 여기에서는 맨 밑의 Body background Color를 정의하는 곳으로써 맨 마지막 footer의 칼라만 아래의 칼라로 적용되며,
	     나머지 color는 Class로 정의되어 있으므로 거기를 수정해야 함 -->

<body id="page-top" style="background:#17324d">

    <!-- 화면 맨위 좌측상단의 유치원 Logo를 표시하기 위한 위치------------------------------------------->
    <!-- styles.css 파일내에서 아래 class로 정의 함-폰트크기.스타일.Line height.margin-bottom등-->
    <!-- 유치원 이름의 바탕색을(#000000-검은색)을 표시-->
    <!-- <div class="navbar" ;>
        <div class="navbar-inner">
            <div class="container">
                <a href="#" class="brand">

                    <img src="assets/img/logo.png" width="80" height="30" alt="Eplat" />

                </a>

                <div class="d-flex">
                    <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded" href="#portfolio">Portfolio</a></li>
                    <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded" href="#about">About</a></li>
            </div>

            </div>
        </div>
    </div> -->

    <div class="navbar" ;>

        <div class="container">
            <a href="#" class="brand">
                <img src="assets/img/logo.png" width="80" height="30" alt="Eplat" />
            </a>
            <div class="d-flex">
                <a class="nav-link py-3 px-0 px-lg-3 rounded" href="board/list.php">게시판</a>
                <a class="nav-link py-3 px-0 px-lg-3 rounded" href="#about">지사마당</a>
            </div>
        </div>
    </div>



    <!-- 초기 Welcome 화면---------------------------------------------------------------------------->
    <!-- styles.css 파일내에서 아래 class로 정의 함-폰트크기.스타일.Line height.margin-bottom등-->
    <!-- Welcome화면의 Image는 styles.css file의 11409 line의 header.mastead class 밑의--
		     11414 라인 background-image: url("../assets/img/welcome.jpg")에 정의 되어있다.-->

    <header class="masthead">
        <div class="container">

            <h1>
                <div>
                    <!-- style="font-family:MD이솝체;"> -->
                    <p> <strong>이플렛</strong></p>
                </div>
            </h1>

            <div class="masthead-subheading">Welcome to English Platform!!</div>

        </div>

    </header>


    <!-- 유치원 소개를 요약하여 홍보하기 위한 유치원 교육 환경을 소개하기 위한 장르 ------------------------------->
    <div class="container" style="margin-top: 20px">

        <div class="row">
            <!-- <img class="img-fluid w-100" src="assets/img/welcome.jpg" alt="..." /> -->

            <div class="portfolio-item mx-auto" data-bs-toggle="modal" data-bs-target="#portfolioModal8">
                <a href="login/login.php"> <img class="img-fluid w-100" src="assets/img/environments.jpg"
                        alt="Login Eplat Study Home" /></a>
            </div>

        </div>

    </div>

    <!-- "회사소개" Modal 8 눌렀을때 나오는 내용-->
    <div class="company-modal modal fade" id="portfolioModal8" tabindex="-1" aria-labelledby="portfolioModal8"
        aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header border-0"><button class="btn-close" type="button" data-bs-dismiss="modal"
                        aria-label="Close"></button></div>
                <div class="modal-body text-center pb-5">
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-8">

                                <!-- 회사소개 Title---------------------------------------------------------->
                                <h2 class="company-modal-title text-secondary text-uppercase mb-0">Company Introduction
                                </h2>
                                <p>
                                <h4>이플렛 : English Platform<h4>
                                        </p>


                                        <!-- <p  align="Center" style="font-size: 26px;color: #FF0000" ><strong>E</strong></p> -->
                                        <!-- <p  align="Center" style="font-size: 26px;color: #000000" ><strong>nglish</strong></p> -->




                                        <!--Star Symbol-->
                                        <div class="divider-custom">
                                            <div class="divider-custom-line"></div>
                                            <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
                                            <div class="divider-custom-line"></div>
                                            <hr style="border: solid 1px gray;">
                                        </div>

                                        <p align="Center" style="font-size: 26px;color: #4169E1"><strong>교재개발</strong>
                                        </p>

                                        <img class="img-fluid d-block mx-auto" src="assets/img/company_intro_1.jpg"
                                            alt="..." />
                                        <p> </p>
                                        <!-- <p  align="Center" style="font-size: 26px;color: #4169E1" ><strong>교재개발</strong></p> -->
                                        <p><span class="firstcharacter">E</span>
                                        <h6>-plat은 오랜 기간 현장에서의 지도경험을 통해 창의적이고 융합적인 놀이식 학습방법을 개발하여 보급하고 있습니다. 또한 국내외 여러
                                            나라와 지역에서 다양한 현장경험이 있는 선생님들의 차별화 된 교육방법을 제품화 하여 함께 비전을 공유할 수 있는 공간을 제공하고
                                            있습니다.</h6>
                                        </p>
                                        <hr style="border: solid 1px gray;">

                                        <p align="Center" style="font-size: 26px;color: #4169E1"><strong>교구개발</strong>
                                        </p>
                                        <img class="img-fluid d-block mx-auto" src="assets/img/company_intro_2.jpg"
                                            alt="..." />
                                        <p> </p>
                                        <!-- <p  align="Center" style="font-size: 26px;color: #4169E1" ><strong>교구개발</strong></p> -->
                                        <p><span class="firstcharacter">E</span>
                                        <h6>-plat은 영어를 처음 시작하는 아이들에게는 결과에 중점을 두는 것이 아니라 아이들이 좋아하는 놀이중심으로 과정에 충실해야한다고
                                            생각합니다. 따라서 E-plat 은 교재와 함께 활용할 수 있는 다양한 교구도 함께 개발하고 있습니다.</h6>
                                        </p>
                                        <hr style="border: solid 1px gray;">


                                        <p align="Center" style="font-size: 26px;color: #4169E1"><strong>온라인개발</strong>
                                        </p>
                                        <img class="img-fluid d-block mx-auto" src="assets/img/company_intro_3.jpg"
                                            alt="..." />
                                        <p> </p>
                                        <!-- <p  align="Center" style="font-size: 26px;color: #4169E1" ><strong>온라인개발</strong></p> -->
                                        <p><span class="firstcharacter">E</span>
                                        <h6>-plat 의 온라인 개발팀은 원어민과 프로그램전공자 그리고 오랜 기간 외국어학원의 운영경험을 기반으로 여러 영어교육회사의 학습시스템을
                                            개발하여 제공하고 있습니다.</h6>
                                        </p>
                                        <hr style="border: solid 1px gray;">

                                        <p align="Center" style="font-size: 26px;color: #4169E1"><strong>교육개발 및
                                                강사교육</strong></p>
                                        <img class="img-fluid d-block mx-auto" src="assets/img/company_intro_4.jpg"
                                            alt="..." />
                                        <p> </p>
                                        <!-- <p  align="Center" style="font-size: 26px;color: #4169E1" ><strong>교육개발 및 강사교육</strong></p> -->
                                        <p><span class="firstcharacter">E</span>
                                        <h6>-plat 의 교육은 유치부 교육과 초등부 교육으로 이원화 되어 있으며 다양한 놀이식 학습시스템과 교구의 활용방법을 보급하고 있습니다.
                                        </h6>
                                        </p>
                                        <br> </br>
                                        <hr style="border: solid 1px gray;">

                                        <!--  교육센타 주소---------------------------------------------------------->
                                        <h2 class="company-modal-title text-secondary text-uppercase mb-0">교육센타</h2>

                                        <!--Star Symbol-->
                                        <div class="divider-custom">
                                            <div class="divider-custom-line"></div>
                                            <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
                                            <div class="divider-custom-line"></div>
                                        </div>

                                        <img class="img-fluid d-block mx-auto" src="assets/img/office-location.jpg"
                                            alt="..." />
                                        <p> </p>
                                        <br> </br>
                                        <hr style="border: solid 1px gray;">


                                        <!--  회사연혁 Title---------------------------------------------------------->
                                        <h2 class="company-modal-title text-secondary text-uppercase mb-0">회사연혁</h2>

                                        <!--Star Symbol-->
                                        <div class="divider-custom">
                                            <div class="divider-custom-line"></div>
                                            <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
                                            <div class="divider-custom-line"></div>
                                        </div>

                                        <img class="img-fluid d-block mx-auto" src="assets/img/company_life.jpg"
                                            alt="..." />
                                        <p> </p>
                                        <!-- <p  align="Center" style="font-size: 26px;color: #4169E1" ><strong>회사연혁</strong></p> -->
                                        <!-- <p><span class="firstcharacter">E</span>  -->


                                        <hr style="border: solid 1px gray;">





                                        <button class="btn btn-primary" data-bs-dismiss="modal">
                                            <i class="fas fa-xmark fa-fw"></i>
                                            Close Window
                                        </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <!-- Portfolio Grid 포트폴리오 화면------------------------------------------------------------------------------------------------------->
    <!-- 여기에서는(section) 유치원에서 요구되는 메뉴를 정의해 준다-프로그램.로그학습관.온라인학습관.수학.과학.신나는유치원 생활 블로그 등-->
    <!-- 여기에 있는 글자는 Css File 내에 styles File내 bs-body-color로 정의되어있다다.: #212529; -->
    <!-- 눌렀을때 Display된 화면의 바탕색은 modal-content class의(5536번 Line) Css File 내에 styles File내 background-color: #ffc536로 정의되어 있다. -->


    <!-- 여기에서 Portpolio를 Section으로 그룹지어 처리하기 위함임 즉, 메뉴(영어,로그학습관,온라인학습관,수학,과학,즐거운유치원 등-------->
    <section class="page-section bg-light" id="portfolio">
        <div class="container">

            <!--6개의 메뉴를 구성하고있는 Section의 제목-->
            <div class="text-center">
                <!-- <h2 class="section-heading text-uppercase">Portfolio</h2> -->
                <!-- <h3 class="section-subheading text-muted">이플렛 유치원 자료방</h3> -->
            </div>

            <!-- 여기에서는 옆으로 늘어서있는 열을 구성하고 있는 각각의 메뉴를 정의 -->
            <!-- 한개의 열은 최대 12개의 Column을 정의할 수 있다.(즉, 메뉴12개 까지 넣을 수 있다.) -->
            <div class="row">

                <!-- 한개의 열은 최대 12개의 Column을 정의할 수 있으나 아래에서 col-lg-4로 정의하였으니
                         lg 992픽셀이상이고 크기를 4열과 같이 만들겠다는 의미이며 12/4=3개의 메뉴를 한 열에 놓겠다는 의미)	
						 *lg=큰 기기의 데스크 탑--,xl=매우작은 기기의 모바일 폰, sm=작은기기 테블릿, md=중간기기의 데스크 탑 -->


                <!-- Portfolio item 1 #portfolioModal1 [영어교재개발] -------------------------------------------------->
                <!-- 영어 메뉴를 누르면 링크된 portfolioModal1으로 가라는 말-->
                <div class="col-lg-4 col-sm-6 mb-4">


                    <div class="portfolio-item">
                        <a class="portfolio-link" data-bs-toggle="modal" href="#portfolioModal1">
                            <div class="portfolio-hover">
                                <div class="portfolio-hover-content"><i class="fas fa-plus fa-3x"></i></div>
                            </div>
                            <!-- <img class="img-fluid" src="assets/img/eng_textbook_dev.jpg" alt="..." /> -->
                            <img class="img-fluid" src="assets/img/eng_textbook_dev-r1.jpg" alt="..." />
                            <!-- <img class="img-fluid" src="assets/img/test_sound.wav" alt="..." /> -->


                        </a>

                        <!-- 메뉴 아래 설명문 글자를 '영어교재개발'으로 하겠다는 말-->
                        <div class="portfolio-caption">
                            <div class="portfolio-caption-heading">영어교재개발</div>
                        </div>
                    </div>
                </div>


                <!-- Portfolio item 2 #portfolioModal2 [영어교구개발] --------------------------------------------->
                <!-- 영어 메뉴를 누르면 링크된 portfolioModal2으로 가라는 말-->
                <div class="col-lg-4 col-sm-6 mb-4">


                    <div class="portfolio-item">
                        <a class="portfolio-link" data-bs-toggle="modal" href="#portfolioModal2">
                            <div class="portfolio-hover">
                                <div class="portfolio-hover-content"><i class="fas fa-plus fa-3x"></i></div>
                            </div>
                            <!-- <img class="img-fluid" src="assets/img/eng_diocese_dev.jpg" alt="..." /> -->
                            <img class="img-fluid" src="assets/img/eng_play_education-r1.jpg" alt="..." />
                        </a>

                        <!-- 메뉴 아래 설명문 글자를 '영어교구개발'으로 하겠다는 말-->
                        <div class="portfolio-caption">
                            <div class="portfolio-caption-heading">영어교구개발</div>
                        </div>

                    </div>
                </div>

                <!-- Portfolio item 3 #portfolioModal3 [놀이영어교육] ------------------------------------------->
                <!-- 온라인학습관 메뉴를 누르면 링크된 portfolioModal3로 가라는 말-->
                <div class="col-lg-4 col-sm-6 mb-4">


                    <div class="portfolio-item">
                        <a class="portfolio-link" data-bs-toggle="modal" href="#portfolioModal3">
                            <div class="portfolio-hover">
                                <div class="portfolio-hover-content"><i class="fas fa-plus fa-3x"></i></div>
                            </div>
                            <!-- <img class="img-fluid" src="assets/img/eng_play_education.jpg" alt="..." /> -->
                            <img class="img-fluid" src="assets/img/eng_play_education-r1.jpg" alt="..." />
                        </a>

                        <!-- 메뉴 아래 설명문 글자를 '놀이영어교육'으로 하겠다는 말-->
                        <div class="portfolio-caption">
                            <div class="portfolio-caption-heading">놀이영어교육</div>
                        </div>

                    </div>
                </div>

                <!-- Portfolio item 4 #portfolioModal4 [EPlat] ------------------------------------------->
                <!-- 온라인학습관 메뉴를 누르면 링크된 portfolioModal4로 가라는 말-->
                <div class="col-lg-4 col-sm-6 mb-4">


                    <div class="portfolio-item">
                        <a class="portfolio-link" data-bs-toggle="modal" href="#portfolioModal4">
                            <div class="portfolio-hover">
                                <div class="portfolio-hover-content"><i class="fas fa-plus fa-3x"></i></div>
                            </div>
                            <!-- <img class="img-fluid" src="assets/img/eng_play_education.jpg" alt="..." /> -->
                            <img class="img-fluid" src="assets/img/eplat.jpg" alt="..." />
                        </a>

                        <!-- 메뉴 아래 설명문 글자를 'EPLAT'으로 하겠다는 말-->
                        <div class="portfolio-caption">
                            <div class="portfolio-caption-heading">EPLAT</div>
                        </div>

                    </div>
                </div>
            </div>

        </div>

    </section>


    <!-- Portfolio Modals [영어교재개발]------------------------------------------------------------------------------------------------------------------------------------->
    <!-- Portfolio item 1 modal popup-->
    <div class="portfolio-modal modal fade" id="portfolioModal1" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="close-modal" data-bs-dismiss="modal"><img src="assets/img/close-icon.svg"
                        alt="Close modal" /></div>
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-8">
                            <!-- <div class="col-lg-4 col-sm-6 mb-4"> -->
                            <div class="modal-body">

                                <!-- Project2 details-->
                                <!-- <h3 class="text-uppercase">영어교재</h3> -->
                                <h2 style="color: #17324d">영어교재</h2>
                                <!-- <p class="item-intro text-muted">놀이중심 영어교육</p> -->
                                <hr style="border: solid 3px gray;">

                                <!-- 스토리북48종-->
                                <!-- <h4 style="background-color:17324d;">스토리북 48종(로그영어 2.0)</h4> -->

                                <p align="Left" style="font-size: 20px;color: #7D7676"><strong>*로그영어2.0</strong></p>
                                <subtitle1-tt>
                                    <h3>스토리북48종</h3>
                                </subtitle1-tt>
                                <!-- <h5>(로그영어2.0)</h5> -->
                                <!-- <p  align="Center" style="font-size: 20px;color: #7D7676" ><strong>(로그영어2.0)</strong></p> -->



                                <!-- <img class="img-fluid d-block mx-auto" src="assets/img/title1.png" alt="..." /> -->

                                <img class="img-fluid d-block mx-auto" src="assets/img/eng_textbook_story48_1.jpg"
                                    alt="..." />
                                <a href="https://youtu.be/wEaPF9q-T6c"><img src="assets/img/vmovie_icon.png"
                                        class="img-responsive mt-xs" style="max-width: 50px;" alt="..."> </a>
                                <a href="https://youtu.be/h5RhXdWx8WE"><img src="assets/img/vmovie_icon.png"
                                        class="img-responsive mt-xs" style="max-width: 50px;" alt="..."> </a>
                                <a href="https://youtu.be/ZkSzlUwLygU"><img src="assets/img/vmovie_icon.png"
                                        class="img-responsive mt-xs" style="max-width: 50px;" alt="..."> </a>
                                <p class="item-intro text-muted">① 로그5 ② 로그6 ③ 로그7 </p>

                                <img class="img-fluid d-block mx-auto" src="assets/img/eng_textbook_story48_2.jpg"
                                    alt="..." />
                                <img class="img-fluid d-block mx-auto" src="assets/img/eng_textbook_story48_3.jpg"
                                    alt="..." />
                                <img class="img-fluid d-block mx-auto" src="assets/img/eng_textbook_story48_4.jpg"
                                    alt="..." />

                                <hr style="border: solid 1px gray;">
                                <br>

                                <!-- 파닉스48종-->

                                <!-- <h4 style="background-color:#FAAC58;">파닉스북 48종(로그영어 2.0)</h4> -->
                                <p align="Left" style="font-size: 20px;color: #7D7676"><strong>*로그영어2.0</strong></p>

                                <subtitle1-tt>
                                    <h3>파닉스북48종</h3>
                                </subtitle1-tt>
                                <!-- <h5>(로그영어2.0)</h5> -->
                                <!-- <p  align="Center" style="font-size: 20px;color: #7D7676" ><strong>(로그영어2.0)</strong></p> -->

                                <img class="img-fluid d-block mx-auto" src="assets/img/eng_textbook_phonics48_1.jpg"
                                    alt="..." />
                                <!-- <p  align="Center" style="font-size: 20px;color: #4169E1" ><strong>파닉스 송</strong></p> -->

                                <img class="img-fluid d-block mx-auto" src="assets/img/eng_textbook_phonics48_2.jpg"
                                    alt="..." />
                                <!-- <p  align="Center" style="font-size: 20px;color: #4169E1" ><strong>놀이활동</strong></p> -->

                                <img class="img-fluid d-block mx-auto" src="assets/img/eng_textbook_phonics48_3.jpg"
                                    alt="..." />
                                <!-- <p  align="Center" style="font-size: 20px;color: #4169E1" ><strong>블록활동</strong></p> -->
                                <hr style="border: solid 1px gray;">
                                <br>


                                <!-- 액티비티48종-->
                                <!-- <h4 style="background-color:#FAAC58;">액티비티48종(로그영어 2.0)</h4> -->

                                <p align="Left" style="font-size: 20px;color: #7D7676"><strong>*로그영어2.0</strong></p>
                                <subtitle1-tt>
                                    <h3>액티비티48종</h3>
                                </subtitle1-tt>
                                <!-- <p  align="Center" style="font-size: 20px;color: #7D7676" ><strong>(로그영어2.0)</strong></p> -->

                                <img class="img-fluid d-block mx-auto" src="assets/img/eng_textbook_activity48_1.jpg"
                                    alt="..." />


                                <img class="img-fluid d-block mx-auto" src="assets/img/eng_textbook_activity48_2.jpg"
                                    alt="..." />
                                <img class="img-fluid d-block mx-auto" src="assets/img/eng_textbook_activity48_3.jpg"
                                    alt="..." />
                                <img class="img-fluid d-block mx-auto" src="assets/img/eng_textbook_activity48_3.jpg"
                                    alt="..." />
                                <hr style="border: solid 1px gray;">
                                <br>


                                <!-- 액티비티30종-->
                                <!-- <h4 style="background-color:#FAAC58;">파닉스북 30종(로그영어 1.0)</h4> -->
                                <p align="Left" style="font-size: 20px;color: #7D7676"><strong>*로그영어1.0</strong></p>
                                <subtitle1-tt>
                                    <h3>파닉스북30종</h3>
                                </subtitle1-tt>
                                <!-- <p  align="Center" style="font-size: 20px;color: #7D7676" ><strong>(로그영어1.0)</strong></p> -->
                                <!-- <img class="img-fluid d-block mx-auto" src="assets/img/eng_textbook_phonics30_1.jpg" alt="..." /> -->
                                <p><a href="https://youtu.be/PZ04CAhCsX4"><img class="img-fluid d-block mx-auto"
                                            src="assets/img/eng_textbook_phonics30_1.jpg" alt="..." /></a></p>
                                <!-- <a href="https://youtu.be/PZ04CAhCsX4" ><img src="assets/img/vmovie_icon.png" class="img-responsive mt-xs" style="max-width: 50px;" alt="..."> </a> -->
                                <!-- <p class="item-intro text-muted">① 파닉스북 </p>		 -->

                                <img class="img-fluid d-block mx-auto" src="assets/img/eng_textbook_phonics30_2.jpg"
                                    alt="..." />
                                <img class="img-fluid d-block mx-auto" src="assets/img/eng_textbook_phonics30_3.jpg"
                                    alt="..." />
                                <hr style="border: solid 1px gray;">
                                <br>

                                <!-- 센텐스북30종-->
                                <!-- <h4 style="background-color:#FAAC58;">센텐스북 30종(로그영어 1.0)</h4> -->

                                <p align="Left" style="font-size: 20px;color: #7D7676"><strong>*로그영어1.0</strong></p>
                                <subtitle1-tt>
                                    <h3>센텐스북30종</h3>
                                </subtitle1-tt>
                                <!-- <p  align="Center" style="font-size: 20px;color: #7D7676" ><strong>(로그영어1.0)</strong></p> -->

                                <img class="img-fluid d-block mx-auto" src="assets/img/eng_textbook_sentence30_1.jpg"
                                    alt="..." />
                                <img class="img-fluid d-block mx-auto" src="assets/img/eng_textbook_sentence30_2.jpg"
                                    alt="..." />
                                <img class="img-fluid d-block mx-auto" src="assets/img/eng_textbook_sentence30_3.jpg"
                                    alt="..." />


                                <hr style="border: solid 1px gray;">
                                <br>

                                <button class="btn btn-primary btn-xl text-uppercase" data-bs-dismiss="modal"
                                    type="button">
                                    <i class="fas fa-xmark me-1"></i>
                                    Close Project
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Portfolio Modals [영어교구개발]------------------------------------------------------------------------------------------------------------------------------------->
    <!-- Portfolio item 2 modal popup-->
    <div class="portfolio-modal modal fade" id="portfolioModal2" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="close-modal" data-bs-dismiss="modal"><img src="assets/img/close-icon.svg"
                        alt="Close modal" /></div>
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-8">
                            <div class="modal-body">

                                <!-- Project details -->

                                <h2 class="text-uppercase">EPLAT</h2>
                                <hr style="border: solid 1px gray;">

                                <!-- 교구 파닉스-->
                                <!-- <h4 style="background-color:#FAAC58;">교구 파닉스</h4> -->
                                <!-- <subtitle1-tt> -->
                                <!-- <h3>교구 파닉스</h3> -->
                                <!-- </subtitle1-tt> -->


                                <img class="img-fluid d-block mx-auto" src="assets/img/eng_diocese_1.jpg" alt="..." />
                                <img class="img-fluid d-block mx-auto" src="assets/img/eng_diocese_2.jpg" alt="..." />
                                <img class="img-fluid d-block mx-auto" src="assets/img/eng_diocese_3.jpg" alt="..." />
                                <img class="img-fluid d-block mx-auto" src="assets/img/eng_diocese_4.jpg" alt="..." />
                                <img class="img-fluid d-block mx-auto" src="assets/img/eng_diocese_5.jpg" alt="..." />
                                <img class="img-fluid d-block mx-auto" src="assets/img/eng_diocese_6.jpg" alt="..." />
                                <img class="img-fluid d-block mx-auto" src="assets/img/eng_diocese_7.jpg" alt="..." />
                                <img class="img-fluid d-block mx-auto" src="assets/img/eng_diocese_8.jpg" alt="..." />
                                <hr style="border: solid 1px gray;">


                                <!-- 교구 카드게임-->
                                <!-- <h4 style="background-color:#FAAC58;">교구 카드게임</h4> -->
                                <subtitle1-tt>
                                    <h3>파닉스카드</h3>
                                </subtitle1-tt>
                                <p align="Center" style="font-size: 20px;color: #7D7676"><strong>(120단어)</strong></p>
                                <img class="img-fluid d-block mx-auto" src="assets/img/eng_diocese_card_1.jpg"
                                    alt="..." />

                                <!-- 로그맵-->
                                <!-- <h4 style="background-color:#FAAC58;">로그맵 30종</h4> -->
                                <subtitle1-tt>
                                    <h3>교구영어코딩</h3>
                                </subtitle1-tt>
                                <p align="Center" style="font-size: 20px;color: #7D7676"><strong>(로그맵 30종)</strong></p>


                                <!--7세-->
                                <!-- <img class="img-fluid d-block mx-auto" src="assets/img/eng_diocese_rogmap_5.jpg" alt="..." /> -->
                                <p><a href="https://youtu.be/aYJ_ZCPS9xY"><img class="img-fluid d-block mx-auto"
                                            src="assets/img/eng_diocese_rogmap_5.jpg" alt="..." /></a>
                                <p>

                                    <img class="img-fluid d-block mx-auto" src="assets/img/eng_diocese_rogmap_6.jpg"
                                        alt="..." />
                                    <!--5세-->
                                    <img class="img-fluid d-block mx-auto" src="assets/img/eng_diocese_rogmap_1.jpg"
                                        alt="..." />
                                    <img class="img-fluid d-block mx-auto" src="assets/img/eng_diocese_rogmap_2.jpg"
                                        alt="..." />
                                    <!--6세-->
                                    <img class="img-fluid d-block mx-auto" src="assets/img/eng_diocese_rogmap_3.jpg"
                                        alt="..." />
                                    <img class="img-fluid d-block mx-auto" src="assets/img/eng_diocese_rogmap_4.jpg"
                                        alt="..." />



                                    <br>

                                    <button class="btn btn-primary btn-xl text-uppercase" data-bs-dismiss="modal"
                                        type="button">
                                        <i class="fas fa-xmark me-1"></i>
                                        Close Project
                                    </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Portfolio Modals [놀이영어교육]------------------------------------------------------------------------------------------------------------------------------------->
    <!-- Portfolio item 3 modal popup-->
    <div class="portfolio-modal modal fade" id="portfolioModal3" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="close-modal" data-bs-dismiss="modal"><img src="assets/img/close-icon.svg"
                        alt="Close modal" /></div>
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-8">
                            <div class="modal-body">

                                <!-- Project details-->

                                <h2 class="text-uppercase">놀이영어</h2>
                                <hr style="border: solid 1px gray;">

                                <!-- <h4 style="background-color:#FAAC58;">이플렛요약</h4> -->
                                <img class="img-fluid d-block mx-auto" src="assets/img/eng_play_1.jpg" alt="..." />
                                <img class="img-fluid d-block mx-auto" src="assets/img/eng_edu_process.jpg" alt="...">
                                <a
                                    href="https://instagram.com/stories/blocks_english/2971698557168297149?utm_source=ig_story_item_share&igshid=MDJmNzVkMjY="><img
                                        src="assets/img/instagram_icon.png" class="img-responsive mt-xs"
                                        style="max-width: 50px;" alt="..."></a>
                                <a href="https://instagram.com/littlebeeenglish?igshid=YmMyMTA2M2Y="><img
                                        src="assets/img/instagram_icon.png" class="img-responsive mt-xs"
                                        style="max-width: 50px;" alt="..."></a>
                                <p class="item-intro text-muted">①부산센타 ②포항센타</p>

                                <br> </br>
                                <button class="btn btn-primary btn-xl text-uppercase" data-bs-dismiss="modal"
                                    type="button">
                                    <i class="fas fa-xmark me-1"></i>
                                    Close Project
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Portfolio Modals [EPLAT]------------------------------------------------------------------------------------------------------------------------------------->
    <!-- Portfolio item 4 modal popup-->
    <div class="portfolio-modal modal fade" id="portfolioModal4" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="close-modal" data-bs-dismiss="modal"><img src="assets/img/close-icon.svg"
                        alt="Close modal" /></div>
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-8">
                            <div class="modal-body">

                                <!-- Project details-->

                                <h2 class="text-uppercase">EPLAT</h2>
                                <hr style="border: solid 1px gray;">

                                <!-- <h4 style="background-color:#FAAC58;">이플렛요약</h4> -->
                                <p><a href="assets/img/Block_activity.mp4"><img src="assets/img/Block_activity.jpg "
                                            width="100%" height="100%" /></a></p>
                                <p><a href="assets/img/ActiviBlock_cleanup.mp4"><img
                                            src="assets/img/ActiviBlock_cleanup.jpg " width="100%" height="100%" /></a>
                                </p>
                                <p><a href="assets/img/block_play.mp4"><img src="assets/img/block_play.jpg "
                                            width="100%" height="100%" /></a></p>
                                <p><a href="assets/img/teacher_sene.mp4"><img src="assets/img/teacher_sene.jpg "
                                            width="100%" height="100%" /></a></p>

                                <hr style="border: solid 1px gray;">
                                <p><a href="assets/img/newhomepage_eplat.pdf"><img
                                            src="assets/img/newhomepage_eplat.jpg " width="100%" height="100%" /></a>
                                </p>


                                <br> </br>
                                <button class="btn btn-primary btn-xl text-uppercase" data-bs-dismiss="modal"
                                    type="button">
                                    <i class="fas fa-xmark me-1"></i>
                                    Close Project
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="ModalForm" tabindex="-1" aria-labelledby="ModalFormLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body">
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                    <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                        <li class="nav-item text-center">
                            <a class="nav-link active btl" id="pills-home-tab" data-bs-toggle="pill" href="#pills-home"
                                role="tab" aria-controls="pills-home" aria-selected="true">Login</a>
                        </li>
                        <li class="nav-item text-center">
                            <a class="nav-link btr" id="pills-profile-tab" data-bs-toggle="pill" href="#pills-profile"
                                role="tab" aria-controls="pills-profile" aria-selected="false">Signup</a>
                        </li>

                    </ul>
                    <div class="tab-content" id="pills-tabContent">

                        <div class="tab-pane fade show active" id="pills-home" role="tabpanel"
                            aria-labelledby="pills-home-tab">

                            <div class="form-area bg-primary">
                                <h1 class="text-center">Login Form</h1>
                                <form>
                                    <div class="mb-3 mt-4">
                                        <label for="exampleInputEmail1" class="form-label">Your Email</label>
                                        <input id="Email" name="Email" type="email" class="form-control"
                                            id="exampleInputEmail1" aria-describedby="emailHelp">
                                    </div>
                                    <div class="mb-3">
                                        <label for="exampleInputPassword1" class="form-label">Your Password</label>
                                        <input id="Password" type="password" class="form-control"
                                            id="exampleInputPassword1">
                                    </div>
                                    <button id="idlogin" type="submit" class="btn btn-light mt-3">LOGIN</button>
                                    <p>New Here?    <a href="#">Signup</a></p>
                                </form>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="pills-profile" role="tabpanel"
                            aria-labelledby="pills-profile-tab">

                            <div class="form-area bg-primary">
                                <h1 class="text-center">Register Form</h1>
                                <form>
                                    <div class="mb-3 mt-4">
                                        <label for="exampleInputEmail1" class="form-label">Your Name</label>
                                        <input id="name" type="email" class="form-control" aria-describedby="emailHelp"
                                            placeholder="Name">
                                    </div>
                                    <div class="mb-3">
                                        <label for="exampleInputPassword1" class="form-label">Your Email</label>
                                        <input id="email" type="email" class="form-control" placeholder="Email">
                                    </div>
                                    <div class="mb-3">
                                        <label for="exampleInputPassword1" class="form-label">Your Phone</label>
                                        <input id="phone" type="phone" class="form-control" placeholder="Phone">
                                    </div>
                                    <div class="mb-3">
                                        <label for="exampleInputPassword1" class="form-label">Your Password</label>
                                        <input id="password" type="password" class="form-control"
                                            placeholder="Password">
                                    </div>
                                    <button id="idregister" type="submit" class="btn btn-light mt-3">Signup</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Core theme JS-->
    <script src="js/scripts.js"></script>
    <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
    <!-- * *                               SB Forms JS                               * *-->
    <!-- * * Activate your form at https://startbootstrap.com/solution/contact-forms * *-->
    <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
    <script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>


    <!-- Footer 맨 마지막 내용-->
    <footer class="footer py-4">
        <div class="container">
            <div class="row align-items-center">
                <div style="color: white;" class="col-lg-4 text-lg-start">Copyright &copy; Your Website 2022</div>
                <div class="col-lg-4 my-3 my-lg-0">
                    <a class="btn btn-dark btn-social mx-2" href="#!" aria-label="Twitter"><i
                            class="fab fa-twitter"></i></a>
                    <a class="btn btn-dark btn-social mx-2" href="#!"><i class="fab fa-facebook-f"></i></a>
                    <a class="btn btn-dark btn-social mx-2" href="#!" aria-label="LinkedIn"><i
                            class="fab fa-linkedin-in"></i></a>
                </div>
                <div class="col-lg-4 text-lg-end">
                    <!-- <a class="link-dark text-decoration-none me-3" href="#!">Privacy Policy</a> -->
                    <!-- <a class="link-dark text-decoration-none" href="#!">Terms of Use</a> -->
                </div>
            </div>
        </div>
    </footer>

    <script>
    $("#idlogin").on('click', function() {
        e.preventDefault();

        var data = {
            Email: $('#Email').val(),
            Password: $('#Password').val()
        }

        e.preventDefault();

        $.ajax({
            url: "Server/Slogon.php",
            type: "POST",
            dataType: "json",
            data: data,
            beforeSend: function() {
                $("#err").fadeOut();
            },
            success: function(resp) {
                if (resp != 'falure') {
                    $('#loger').html(resp);
                    $('#signin').css('display', 'none');
                    $('#signout').css('display', 'block');
                    $('#adminmenu').css('display', 'block');
                } else {
                    alert('login 실패!');
                }
            },
            error: function(e) {
                alert('login 실패!');
            }
        });
    })

    $("#idregister").click(function() {
        mydata = {
            id: $("#email").val(),
            name: $("#name").val(),
            password: $("#password").val(),
            role: '9'
        }
        //alert( $("#inputID").val() + " " + $("#inputName").val() + " " + $("#inputPassword").val() + " " + $("#inputPasswordConfirm").val() )
        // if (  $("#inputPassword").val() === $("#inputPasswordConfirm").val()) {
        $.ajax({
            url: "Server/Sregister.php",
            type: "POST",
            dataType: "json",
            data: mydata,

            success: function(response) {
                alert('success');
            },
            error: function(jqXHR, textStatus, errorThrown) {
                if (textStatus == "error") {
                    alert(loc + ' ' + textStatus);
                }
            }
        });
        // }
        // else
        // 	alert('password mismatched !!');
    });
    </script>







</body>

</html>