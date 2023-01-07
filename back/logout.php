<?php

session_start();

if ($_SESSION['superior']) {
    session_destroy();
    session_unset();
    
}

header("location: ../index.php");
