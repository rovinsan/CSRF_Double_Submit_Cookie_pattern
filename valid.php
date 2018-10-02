<?php


session_start();

    function logout() {

        // unset all cookies and sessions belongs to that user
        unset($_COOKIE['CSRF_SESSION_COOKIE']);
        setcookie('CSRF_SESSION_COOKIE', null, -1, '/');
        unset($_COOKIE['CSRF_TOKEN_COOKIE']);
        setcookie('CSRF_TOKEN_COOKIE', null, -1, '/');
        unset($_SESSION);


        // redirect to login page
        header("location:index.php");
    }


    if(isset($_POST['logout'])){

        logout();

    }  
    else if (isset($_POST['verify'])){

        if($_POST['csrf_token'] == $_COOKIE['CSRF_TOKEN_COOKIE']){
            header("location:success.php");
        }else {
            header("location:error.php");
        }
    }

?>