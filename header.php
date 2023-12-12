<?php

session_start();
if (isset($_SESSION['user'])) {
    echo "<h5 id='hiddenid' align='center' style='visibility:hidden' >" . $_SESSION["user"] . "</h5>";
} else {
    header('location:login.php');
}

?>