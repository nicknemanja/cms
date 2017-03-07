<?php

session_start();

checkUserPermission();

$action = (null !== (htmlspecialchars($_GET['action']))) ? htmlspecialchars($_GET['action']) : "";
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
    case 'newUser':
        newUser();
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

function newUser(){
    echo 'Poziv funkcije newUser().';
}

function checkUserPermission(){
    echo 'Poziv funkcije checkUserPermission().';
}