<?php
$_SESSION['registrationFromForm'] = true;
?>
<div id="registrationForm">
    <form action="index.php?action=register" method="POST" >
        <div class="form-group">
            <label for="username">Korisničko ime</label>
            <input type="text" class="form-control" name="username" placeholder="Unesite korisničko ime">
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Lozinka</label>
            <input type="password" class="form-control" name="password" aria-describedby="passwordHelp" placeholder="Unesite lozinku">
        </div>
        
        <button type="submit" class="btn btn-primary">Registrujte se</button>
    </form>
</div>