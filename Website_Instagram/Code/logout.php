<?php

session_start();
session_unset();
session_destroy();

if(!isset($_SESSION["login"])){
    header("Location: signin.php");
    exit;
}
?>