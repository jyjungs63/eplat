<html>

<body>
    <p> hello </p>
<?php
            // $form ="jyjungs63@gmail.com";
            // $subject = $_POST['firstname'];
            // $lastname = $_POST['lastname'];
            // $email = $_POST['email']

            $con =  mysqli_connect('localhost','root','','eplat' )
                or die('error connecting database');
            
            $query = "insert into email_list values ('unknown', 'other', 'jyjungs@name.com')";

            mysqli_query( $con, $query)
            or die('Error query');

            mysqli_close($con);

?>

</body>
</html>
