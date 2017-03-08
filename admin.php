<?php

//require
require 'config-cms-j.php';
require TEMPLATE_PATH . '/include/header.php';

$action = isset($_GET['action']) ? htmlspecialchars($_GET['action']) : "";


if (!isAccessAllowed($action)) {
    echo "<h3>Zabranjen pristup admin.php</h3>";
    $_SESSION[FORBIDEN_ACCESS] = FORBIDEN_ACCESS . 'admin.php.';
    header('Location: index.php');
}


switch ($action) {
    case '':
        homepage();
        break;
    case 'login':
        login();
        break;
    case 'logout':
        logout();
        break;
    case 'newArticle':
        newArticle();
        break;
    case 'editArticle':
        editArticle();
        break;
    case 'deleteArticle':
        deleteArticle();
        break;
    case 'newUser':
        newUser();
        break;
    case 'editUser':
        editUser();
        break;
    case 'deleteUser':
        deleteUser();
        break;
    default :
        homepage();
}

function isAccessAllowed($action) {
    if ($action === 'login' || $action === 'logout') {
        return true;
    }

    if (isset($_SESSION['username'])) {
        return $_SESSION['username'] === 'admin';
    } else {
        return false;
    }
}

function homepage() {
    echo 'Poziv funkcije homepage().';
}

function login() {
    echo 'Poziv funkcije login() | admin.php.';
}

function logout() {
    echo 'Poziv funkcije logout().';
}

function newArticle() {
    echo 'Poziv funkcije newArticle().';
}

function editArticle() {
    echo 'Poziv funkcije editArticle().';
}

function deleteArticle() {
    echo 'Poziv funkcije deleteArticle().';
}

function newUser() {
    echo 'Poziv funkcije newUser().';
}

function editUser() {
    echo 'Poziv funkcije editUser().';
}

function deleteUser() {
    echo 'Poziv funkcije deleteUser().';
}

function newLine() {
    echo "<br>";
}

require TEMPLATE_PATH . '/include/footer.php';
