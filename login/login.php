<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sign Up Form by Colorlib</title>

    <!-- Font Icon -->
    <link rel="stylesheet" href="fonts/material-icon/css/material-design-iconic-font.min.css">

    <!-- Main css -->
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

    <div class="main">
        <!-- Sing in  Form -->
        <section class="sign-in">
            <div class="container">
                <div class="signin-content">
                    <div class="signin-image">
                        <figure><img src="images/signin-image.jpg" alt="sing up image"></figure>
                        <a href="register.php" class="signup-image-link">Create an account</a></br>
						<a href="findpasswd.php" class="signup-image-link">Find Password</a>
                    </div>

                    <div class="signin-form">
                        <h2 class="form-title">Sign up</h2>
                        <?php 
                            session_start();
                            if( isset($_SESSION['user']))
                            {
                                echo "<h5 align='center'>Welcome eplat study home</h5>";
                                echo "<h5 align='center'>".$_SESSION["user"]."</h5>";  
                                echo "<p align='center'><a href='logout.php'>Logout</a></p>";  
                            }
                            else
                            {
                                //header('location:login.php');  
                            }
                        ?>
                        <form method="POST" class="register-form" id="login-form" action="../Server/Slogon.php">
                            <div class="form-group">
                                <label for="Email"><i class="zmdi zmdi-account material-icons-name"></i></label>
                                <?php
                                    if( !isset($_SESSION['id'])) { 
                                        echo '<input type="text" name="Email" id="Email" value = "", placeholder="Your Name"/>';
                                    } else {
                                        echo '<input type="text" name="Email" id="Email" value = "", placeholder='.$_SESSION['id'].'>';
                                    }
                                ?>
                            </div>

                            <div class="form-group">
                            <label for="Password"><i class="zmdi zmdi-lock"></i></label>
                            <?php 

                                if( !isset($_SESSION['password'])) { 
                                    echo '<input type="password" name="Password" id="your_pass" placeholder="Password"/>';

                                } else { 
                                    echo '<input type="text" name="Password" id="your_pass" placeholder='.$_SESSION["password"]. '>';
                                }
                            ?>
                            </div>
                            <div class="form-group">
                                <input type="checkbox" name="remember-me" id="remember-me" class="agree-term" />
                                <label for="remember-me" class="label-agree-term"><span><span></span></span>Remember me</label>
                                </div> 

                            <div class="form-group form-button">
                                <input type="submit" name="signin" id="signin" class="form-submit" value="Log in"/>
                            </div>
                        </form>
                        <div class="social-login">
                            <span class="social-label">Or login with</span>
                            <ul class="socials">
                                <li><a href="#"><i class="display-flex-center zmdi zmdi-facebook"></i></a></li>
                                <li><a href="#"><i class="display-flex-center zmdi zmdi-twitter"></i></a></li>
                                <li><a href="#"><i class="display-flex-center zmdi zmdi-google"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>

    </div>

    <!-- JS -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="js/main.js"></script>
</body><!-- This templates was made by Colorlib (https://colorlib.com) -->
</html>