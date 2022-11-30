<?php
    include_once($_SERVER['DOCUMENT_ROOT'])."/php_project/config.php";
    $is_authenticated = $_SESSION['is_authenticated'];
    
    if(!$is_authenticated)
    {
        header("location:".$webroot."404.php");
    }
?>