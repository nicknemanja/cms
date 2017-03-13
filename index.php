<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

//require
require 'config-cms-j.php';
require 'globalFunctions.php';
require 'src/dao/UserDAO.php';
require 'src/dao/ArticleDAO.php';

require_once 'src/db/DB_Connection.php';
require TEMPLATE_PATH . '/include/header.php';

if (isset($_SESSION[NOTIFICATION_MESSAGES][SESSION_LOGIN_SUCCESS])) {
    echo '<div class="errorMessageDiv">' . SESSION_LOGIN_SUCCESS . '</div>';
    unset($_SESSION[NOTIFICATION_MESSAGES][SESSION_LOGIN_SUCCESS]);
}
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
        register();
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
    if (!empty($_POST)) {
        //submitovani podaci sa forme
        $username = isset($_POST['username']) ? $_POST['username'] : '';
        $password = isset($_POST['password']) ? $_POST['password'] : '';
        if ($username === "" || $password === "") {
            $_SESSION[NOTIFICATION_MESSAGES][LOGIN_PARAMETERS_EMPTY] = LOGIN_PARAMETERS_EMPTY;
            header("Location: index.php?action=login");
        } else {
            $user = User::getByUsername($username);

            $hashedPassword = hash('sha512', $password);

            if ($user->username === $username && (strtolower($user->password) === strtolower($hashedPassword))) {
                $_SESSION['isLoggedIn'] = true;
                $_SESSION['user'] = $user;
                $_SESSION['username'] = $user->username;
                $_SESSION[NOTIFICATION_MESSAGES][SESSION_LOGIN_SUCCESS] = SESSION_LOGIN_SUCCESS;

                setUserTypeInSession($user);

                header("Location: index.php");
            } else {
                $_SESSION['isLoggedIn'] = false;
                $_SESSION[NOTIFICATION_MESSAGES][LOGIN_DATA_NOT_CORRECT] = LOGIN_DATA_NOT_CORRECT;
                header("Location: index.php?action=login");
            }
        }
    } else {
        //ukljuciti formu
        require 'login.php';
    }
}

function logout() {
    $_SESSION['isLoggedIn'] = false;
    unset($_SESSION['user']);
    unset($_SESSION['username']);
    $_SESSION[NOTIFICATION_MESSAGES][LOGOUT_SUCCESS] = LOGOUT_SUCCESS;
    header("Location: index.php?action=login");
}

function showArticles() {
    require 'articles.php';
}

function viewArticle() {
    echo '<h1>View Article Page!<h1>';
    //require TEMPLATE_PATH . '/viewArticle='.$_GET['id'];
}

function showNotification($notification) {
    echo '<div class="errorMessageDiv">' . $notification . '</div>';
}

function newLine() {
    echo "<br>";
}

function setUserTypeInSession($user) {

    if ($user->fk_id_user_role == 1) {
        $_SESSION['userType'] = 'korisnik';
    } else if ($user->fk_id_user_role == 2) {
        $_SESSION['userType'] = 'admin';
    }
}
