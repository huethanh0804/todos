<?php
function xemmang($m)
{
    echo '<pre>', print_r($m), '</pre>';
}
function is_login()
{
    return isset($_SESSION['status_login']) && $_SESSION['status_login'];
}
function redirect($url)
{
    header('location: ' . $url);
    exit();
}
function href($controller = 'system', $action = 'index', $ext = [])
{
    $strext = '';
    foreach ($ext as $key => $value) {
        $value = trim($value);
        $strext .= "&$key=$value";
    }
    return "index.php?controller={$controller}&action={$action}{$strext}";
}
function get($key, $default = null)
{
    if (isset($_GET[$key]) && $_GET[$key]) {
        return is_string($_GET[$key]) ? trim($_GET[$key]) : $_GET[$key];
    } else {
        return $default;
    }
}
function post($key, $default = null)
{
    if (isset($_POST[$key]) && $_POST[$key]) {
        return is_string($_POST[$key]) ? trim($_POST[$key]) : $_POST[$key];
    } else {
        return $default;
    }
}
function ss($key, $default = null)
{
    if (isset($_SESSION[$key]) && $_SESSION[$key]) {
        return is_string($_SESSION[$key]) ? trim($_SESSION[$key]) : $_SESSION[$key];
    } else {
        return $default;
    }
}
function ck($key, $default = null)
{
    if (isset($_COOKIE[$key]) && $_COOKIE[$key]) {
        return is_string($_COOKIE[$key]) ? trim($_COOKIE[$key]) : $_COOKIE[$key];
    } else {
        return $default;
    }
}
