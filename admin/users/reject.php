<?php
    include_once($_SERVER["DOCUMENT_ROOT"])."/php_project/config.php";
    
    use Seip\Users;

    $user = new Users();
    $users = $user->reject();
?>