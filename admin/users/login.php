<?php
    include_once($_SERVER["DOCUMENT_ROOT"])."/php_project/config.php";
    
    use Seip\Users;

    $user_email = $_POST['email'];
    $password = $_POST['password'];

    if(empty($user_email) || empty($password))
    {
        session_start();
        $_SESSION['message'] = "Email/Password can't be empty";
        header("location:".$webroot."public/login.php");
    }
    else
    {
        $_user = new Users();
        $_users = $_user->login($user_email,$password);
    }
?>