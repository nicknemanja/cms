<?php

//require
require 'config-cms-j.php';
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
    default :
        homepage();
}

require TEMPLATE_PATH . '/include/footer.php';


function homepage() {
    
}

function login() {
    header("Location: admin.php?action=login");
}

function logout() {
    
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
