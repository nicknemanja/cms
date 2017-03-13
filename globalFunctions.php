<?php

function isUserIsLoggedIn(){
    return isset($_SESSION['isLoggedIn']) && $_SESSION['isLoggedIn'] == true;
}

function getCurrentPage(){
    $currentPage = isset($_SESSION[CURRENT_PAGE])? $_SESSION[CURRENT_PAGE] : '';
    return $currentPage;
}

function getUserType(){
    return isset($_SESSION['userType'])? $_SESSION['userType'] : '';
}