<?php
    include_once($_SERVER["DOCUMENT_ROOT"])."/php_project/config.php";
    include_once($_SERVER["DOCUMENT_ROOT"])."/php_project/authenticator.php";
    
    echo "I am from dashboard";
?>

<div>
    <ul>
        <li><a class="dropdown-item" href="<?= $webroot;?>public/login.php">
            <i class="me-1 fas fa-sign-out-alt"></i>Logout</a>
        </li>
    </ul>
</div>