<?php

session_start();

if (!checkUserPermission()) {
    echo "<h3>Zabranjen pristup " . __FILE__ . ".php</h3>";
} else {
    echo "<h3>Dozvoljen pristup " . __FILE__ . ".php</h3>";
}

$action = isset($_GET['action']) ? htmlspecialchars($_GET['action']) : "";
var_dump('action', $action);

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

function checkUserPermission() {
    echo 'Poziv funkcije checkUserPermission().';
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
    echo 'Poziv funkcije login().';
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
