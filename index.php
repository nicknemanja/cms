<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

//require
require 'config-cms-j.php';
require 'globalFunctions.php';
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

    if (isset($_SESSION['loginFromForm'])) {

        //obraditi login podatke
        unset($_SESSION['loginFromForm']);
        $username = isset($_POST['username']) ? ($_POST['username']) : '';
        $password = isset($_POST['password']) ? ($_POST['password']) : '';

        if ($username == "" || $password == "") {
            addNotificationMessageToSession(LOGIN_PARAMETERS_EMPTY);
            echo 'prazni parametri';
            $_SESSION[CURRENT_PAGE] = 'login';
            header('Location: index.php?action=login');
        }

        $hashedPassword = hash('sha512', $password);
        $user = User::getByUsername($username);

        if ($user->username === $username && strtolower($user->password) === strtolower($hashedPassword)) {
            //login ok
            unset($user->password);
            //seting data to session
            $_SESSION['isLoggedIn'] = true;
            $_SESSION['user'] = $user;
            $_SESSION[NOTIFICATION_MESSAGES][SESSION_LOGIN_SUCCESS] = SESSION_LOGIN_SUCCESS;
            var_dump('Uspjesan login:', $user);
            die();
            if ($user->fk_id_user_role == 2) {
                header('Location: admin.php');
            } else {
                header('Location: index.php');
            }
        } else {
            //login not ok
            $_SESSION['isLoggedIn'] = false;
            $_SESSION[NOTIFICATION_MESSAGES][LOGIN_DATA_NOT_CORRECT] = LOGIN_DATA_NOT_CORRECT;
            $_SESSION[CURRENT_PAGE] = 'login';
            header('Location: index.php?action=login');
        }
    } else {
        //ukljuciti login formu
        require 'login.php';
    }
}

function logout() {
    unset($_SESSION['isLoggedIn']);
    unset($_SESSION['user']);
    addNotificationMessageToSession(LOGOUT_SUCCESS);
    header('Location: index.php');
}

function register() {
    if (!(isset($_SESSION['registrationFromForm']))) {
        require 'register.php';
    } else {
        unset($_SESSION['registrationFromForm']);

        $username = isset($_POST['username']) ? htmlspecialchars($_POST['username']) : '';
        $password = isset($_POST['password']) ? htmlspecialchars($_POST['password']) : '';

        if ($username === "" || $password === "") {
            $_SESSION[NOTIFICATION_MESSAGES][SESSION_REGISTRATION_PARAMETERS_EMPTY] = SESSION_REGISTRATION_PARAMETERS_EMPTY;
            $_SESSION[CURRENT_PAGE] = 'homepage';
            header('Location: index.php?action=register');
        }

        $hashedPassword = hash('sha512', $password);

        $user = new User(array('username' => $username, 'password' => $hashedPassword));

        if (User::createNew($user) === true) {
            $_SESSION[NOTIFICATION_MESSAGES][CREATE_USER_SUCCESS] = CREATE_USER_SUCCESS;
            header('Location: index.php?action=login');
        } else {
            $_SESSION[NOTIFICATION_MESSAGES][CREATE_USER_FAIL] = CREATE_USER_FAIL;
            header('Location: index.php?action=register');
        }
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

    $notificationMessages = $_SESSION[NOTIFICATION_MESSAGES];

    foreach ($notificationMessages as $message) {
        showNotification($message);
    }

    $_SESSION[NOTIFICATION_MESSAGES] = [];
}

function showNotification($notification) {
    echo '<div class="errorMessageDiv">' . $notification . '</div>';
}

function addNotificationMessageToSession($message) {
    if (!isset($_SESSION[NOTIFICATION_MESSAGES])) {
        $_SESSION[NOTIFICATION_MESSAGES] = [];
    }
    array_push($_SESSION[NOTIFICATION_MESSAGES], $message);
}

function newLine() {
    echo "<br>";
}
