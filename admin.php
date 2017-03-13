<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

//require
require 'config-cms-j.php';
//require_once 'src/classes/User.php';
require_once 'src/dao/UserDAO.php';
require 'globalFunctions.php';
require 'templates/include/header.php';

$action = isset($_GET['action']) ? htmlspecialchars($_GET['action']) : "";


if (!isAccessAllowed($action)) {
    echo "<h3>Zabranjen pristup admin.php</h3>";
    $_SESSION[FORBIDEN_ACCESS] = FORBIDEN_ACCESS . 'admin.php.';
    header('Location: index.php?action=login');
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
    case 'register':
        registerUser();
        break;
    case 'articles':
        articles();
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
    case 'allUsers':
        showUsers();
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

    $user = isset($_SESSION['user']) ? $_SESSION['user'] : null;

    if ($user === null) {
        return false;
    } else {
        return isset($_SESSION['isLoggedIn']) &&
                $_SESSION['isLoggedIn'] == true && $user->fk_id_user_role == 2;
    }
}

function homepage() {
    require 'articles.php';
}

function registerUser() {
    
}

function newArticle() {

    if (!isset($_SESSION['newArticleFromForm'])) {
        require 'admin/article.php?action=new';
    } else {
        
    }
}

function editArticle() {
    echo 'Poziv funkcije editArticle().';
}

function deleteArticle() {
    echo 'Poziv funkcije deleteArticle().';
}

function showUsers() {
    require 'admin/allUsers.php';
}

function newUser() {
    echo 'Poziv funkcije newUser().';
}

function editUser() {
    if (!empty($_POST)) {
        $id = $_POST['id'];
        
    } else {
        $_SESSION['editUserWithID'] = $_GET['id'];
        require 'admin/user.php';
    }
}

function deleteUser() {
    echo 'Poziv funkcije deleteUser().';
}

function newLine() {
    echo "<br>";
}

require TEMPLATE_PATH . '/include/footer.php';
