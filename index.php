<?php

$action = isset($_GET['action']) ? htmlspecialchars($_GET['action']) : "";
var_dump('action', $action);

switch ($action) {
    case '':
        index();
        break;
    case 'login':
        login();
        break;
    case 'logout':
        logout();
        break;
    default :
        index();
}

function index() {
    echo 'Poziv funkcije index().';
}

function login() {
    echo 'Poziv funkcije login().';
}

function logout() {
    echo 'Poziv funkcije logout().';
}
