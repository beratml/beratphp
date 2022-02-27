<?php

session_start();
session_destroy();

if(!isset($_SESSION['user'])){
    die('Giriş Yetkiniz Yoktur');
}

?>