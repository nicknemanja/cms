<?php

//db
define("DB_DSN",'mysql:host=localhost;dbname=cms_j');
define("DB_USERNAME", 'root');
define('DB_PASSWORD', 'Nemanja1!!@');

//path
define("TEMPLATE_PATH", "templates");


define("PAGE_SHOWN","pageShown");

//using in session
define('SESSION_FORBIDEN_ACCESS', "SESSION_FORBIDEN_ACCESS");
define('FORBIDEN_ACCESS', 'Nemate privilegije za pristup ');
define('SESSION_LOGIN_PARAMETERS_EMPTY', 'SESSION_LOGIN_PARAMETERS_EMPTY');
define('LOGIN_PARAMETERS_EMPTY', 'Morate unijeti korisnicke podatke za login!');
define('SESSION_REGISTRATION_PARAMETERS_EMPTY', 'Morate unijeti korisnicke podatke za registraciju!');
define('SESSION_LOGIN_SUCCESS', 'Uspjesno ste se logovali!');
define('NOTIFICATION_MESSAGES', 'NOTIFICATION_MESSAGES');
define('LOGIN_DATA_NOT_CORRECT', 'Username/password nisu tacni. Pokusajte ponovo.');
define('LOGOUT_SUCCESS', 'Uspjesno ste se izlogovali.');
define('CREATE_USER_SUCCESS', 'Uspjesno ste registrovali novog korisnika.');
define('CREATE_USER_FAIL', 'Niste uspjesno registrovali novog korisnika.');
define('CURRENT_PAGE', 'Trenutna stranica');