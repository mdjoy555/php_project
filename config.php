<?php
    if(session_status()==PHP_SESSION_NONE)
    {
        session_start();
    }

    $webroot = "http://localhost/php_project/";
    $approot = $_SERVER['DOCUMENT_ROOT']."/php_project/";
    include_once($approot.'vendor/autoload.php');
?>