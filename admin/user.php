<?php
$user = User::getById($_SESSION['editUserWithID']);
?>
<h3>Izmjena korisnika:</h3>
<form method="POST" action='admin.php?action=editUser'>

    <input type="hidden" name="id" value='<?php echo $user->id ?>'>

    Username:
    <input type="text" name="username" value='<?php echo $user->username ?>'>

    Uloga:
    <input type="text" name="role" value='<?php echo $user->role ?>'> 

    Aktivan:
    <input type="text" name="active" value='<?php echo $user->active ?>'> 

    <input type="submit" value="Izmjeni" >
</form>