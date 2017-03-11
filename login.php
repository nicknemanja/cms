<?php

$_SESSION['loginFromForm'] = true;

showNotificationMessages();


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