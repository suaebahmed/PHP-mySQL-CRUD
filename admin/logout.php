
<?php
    session_start();
    session_destroy();
    session_start();
    $_SESSION['logout_success'] = "logout successfully";
    header('location: login.php');

?>