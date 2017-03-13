<?php
if (isset($_SESSION[NOTIFICATION_MESSAGES][LOGIN_PARAMETERS_EMPTY])) {
    echo '<div class="errorMessageDiv">' . LOGIN_PARAMETERS_EMPTY . '</div>';
    unset($_SESSION[NOTIFICATION_MESSAGES][LOGIN_PARAMETERS_EMPTY]);
}

if (isset($_SESSION[NOTIFICATION_MESSAGES][LOGOUT_SUCCESS])) {
    echo '<div class="errorMessageDiv">' . LOGOUT_SUCCESS . '</div>';
    unset($_SESSION[NOTIFICATION_MESSAGES][LOGOUT_SUCCESS]);
}

if (isset($_SESSION[NOTIFICATION_MESSAGES][LOGIN_DATA_NOT_CORRECT])) {
    echo '<div class="errorMessageDiv">' . LOGIN_DATA_NOT_CORRECT . '</div>';
    unset($_SESSION[NOTIFICATION_MESSAGES][LOGIN_DATA_NOT_CORRECT]);
}
?>
<div id="loginForm">
    <form action="index.php?action=login" method="POST" >
        <div class="form-group">
            <label for="username">Korisničko ime</label>
            <input type="text" class="form-control" name="username" placeholder="Unesite korisničko ime">
        </div>
        <div class="form-group">
            <label for="password">Lozinka</label>
            <input type="password" class="form-control" name="password" aria-describedby="passwordHelp" placeholder="Unesite lozinku">
        </div>

        <button type="submit" class="btn btn-primary">Prijavite se</button>
    </form>
</div>