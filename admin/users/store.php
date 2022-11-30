<?php
    include_once($_SERVER["DOCUMENT_ROOT"])."/php_project/config.php";
    
    use Seip\Users;

    $_user = new Users();
    $_users = $_user->store();
?>