<?php
    session_start();
    unset($_SESSION['LoggedInEmail']);
    header("Location: http://{$_SERVER['HTTP_HOST']}/src/index.php");
?>