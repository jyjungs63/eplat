<html>
    <body>
        <h2> Added My Customers Email</h2>

        <?php




        require_once("class.phpmailer.php");                          // 다운 받은 파일 중에서 이 파일을 가져옵니다.


        $mail = new PHPMailer();                                // mailer 객체를 생성합니다.

        $mail->IsSMTP();

        $mail->SMTPAuth = true;

        $mail->SMTPSecure = "tls";                            // 보안 방식입니다. tls를 사용하셔야 합니다.

        $mail->Host = "smtp.gmail.com";                        // 지메일의 smtp서버 주소 입니다.

        $mail->Port = 587;                                    // 포트 번호니다. 587번을 사용해야 합니다.

        $mail->Username = "ghen4268@gmail.com";                // smtp서버에 연결할 계정입니다.

        $mail->Password = "**********";                        // 계정 비밀번호 입니다.

        $mail->SetFrom('ghen4268@gmail.com');                    // 송신자 이메일 

        $mail->FromName = "From";                            // 송신자 이름

        $mail->AddAddress("ghen4268@naver.com");                // 수신자 이메일

        $mail->Subject = "제목입니다.";                        // 메일 제목 

        $mail->Body = "내용입니다.";                            // 메일 내용

        $mail->IsHTML (true);                                    // html임을 알림

        

        if (!$mail->Send())                                    // 메일을 전송하고 결과를 출력합니다.

        {

            echo "Error: $mail->ErrorInfo";

        }

        else

        {

            echo "Message Sent!";

        }

 

        ?>
    </body>
</html>