<?php

//require
require 'config-cms-j.php';
require 'src/dao/UserDAO.php';
require 'src/dao/ArticleDAO.php';

require 'src/db/DB_Connection.php';
require TEMPLATE_PATH . '/include/header.php';

showNotificationMessages();

$action = isset($_GET['action']) ? htmlspecialchars($_GET['action']) : "";

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
    case 'register':
        registerUser();
        break;
    case 'articles':
        showArticles();
        break;
    case 'viewArticle':
        viewArticle();
        break;
    default :
        homepage();
}

require TEMPLATE_PATH . '/include/footer.php';

function homepage() {
    require 'articles.php';
}

function login() {
    echo 'Implementirati login!';}

function logout() {
    
}

function registerUser() {
    if (!(isset($_SESSION['registrationFromForm']))) {
        require 'register.php';
    } else {
        unset($_SESSION['registrationFromForm']);
        var_dump("Parametri za registraciju! Ukloniti die()!", $_POST);
        die();
    }
}

function showArticles() {
    require 'articles.php';
}

function viewArticle() {
    echo '<h1>View Article Page!<h1>';
    //require TEMPLATE_PATH . '/viewArticle='.$_GET['id'];
}

function showNotificationMessages() {
    if (isset($_SESSION[FORBIDEN_ACCESS])) {
        echo '<div class="errorMessageDiv">' . $_SESSION[FORBIDEN_ACCESS] . '</div>';
    }
    unset($_SESSION[FORBIDEN_ACCESS]);
}

function newLine() {
    echo "<br>";
}
