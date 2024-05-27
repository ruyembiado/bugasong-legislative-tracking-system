<?php
require_once 'session.php';
function getValue($fieldName)
{
    if (isset($_SESSION['inputs'][$fieldName])) {
        return htmlspecialchars($_SESSION['inputs'][$fieldName]);
    }
    return isset($_POST[$fieldName]) ? htmlspecialchars($_POST[$fieldName]) : '';
}
function redirect($location, $data = [])
{
    $url = "../views/" . $location . ".php";
    if (!empty($data)) {
        $url .= "?" . http_build_query($data);
    }
    header("Location: " . $url);
    exit;
}
function removeValue()
{
    if (isset($_SESSION['inputs'])) {
        unset($_SESSION['inputs']);
    }
}
function retainValue()
{
    $_SESSION['inputs'] = $_POST;
}
function setFlash($type, $message)
{
    $_SESSION['flash'] = [
        'type' => $type,
        'message' => $message
    ];
}

function getFlash($type)
{
    if (isset($_SESSION['flash']['type']) && $_SESSION['flash']['type'] == $type) {
        $message = $_SESSION['flash']['message'];
        unset($_SESSION['flash']);
        return $message;
    }
    return false;
}

function showError($errorName)
{
    if (isset($_GET[$errorName])) {
        return $_GET[$errorName];
    }
}

function isLogin()
{
    return isset($_SESSION['isLogin']);
}

function redirectNotLogin()
{
    if (!isset($_SESSION['isLogin'])) {
        session_destroy();
        redirect('index', '');
    }
}

function isAdmin()
{
    return isset($_SESSION['user_type']) && $_SESSION['user_type'] === 'admin';
}

function isMember()
{
    return isset($_SESSION['user_type']) && $_SESSION['user_type'] === 'citizen';
}

function logUsername()
{
    $users = find('users', ['user_id' => $_SESSION['user_id']]);
    return !empty($users) ? $users['username'] : null;
}

function logName()
{
    $users = find('users', ['user_id' => $_SESSION['user_id']]);
    return !empty($users) ? $users['name'] : null;
}

function logUsertype()
{
    return $_SESSION['user_type'];
}
