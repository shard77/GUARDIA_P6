<?php

function show($stuff)
{
    echo "<pre>";
    print_r($stuff);
    echo "</pre>";
}

function checkSession()
{
    if (isset($_SESSION['user'])) {
        return true;
    } else {
        return false;
    }
}

function hashPassword($password)
{
    return password_hash($password, PASSWORD_BCRYPT, $GLOBALS['bcryptOptions']);
}

function showError($error)
{
    $_SESSION['error'] = $error;
    if(!empty($_SESSION['error'])) {
        show($_SESSION['error']);
        unset($_SESSION['error']);
    }
}
