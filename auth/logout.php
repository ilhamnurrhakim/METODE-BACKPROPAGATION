<?php
    session_start();
    $_SESSION = [];
    session_unset();
    session_destroy();

    setcookie('id', '', time() - 3600, "/", "localhost", 1);
    setcookie('key', '', time() - 3600, "/", "localhost", 1);

    // header("Location: login.php");
    header("Location: ../index.php");
exit;
