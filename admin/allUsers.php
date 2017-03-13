<h3>Lista korisnika:</h3>
<table class="table">
    <thead>
        <tr>
            <td>RB</td>
            <td>Korisnik</td>
            <td>Uloga</td>
            <td>Aktivan</td>
            <td>Izmjeni</td>
            <td>Obrisi</td>
        </tr>
    </thead>
    <tbody>
        <?php
        $list = UserDAO::getList();
        $rb = 0;
        foreach ($list as $user) {
            echo '<tr>';
            echo '<td>' . ++$rb . '</td>';
            echo '<td>' . $user->username . '</td>';
            echo '<td>' . $user->role . '</td>';
            echo '<td>' . $user->active . '</td>';
            echo '<td> <a href="admin.php?action=editUser&id=' . $user->id . '"> Izmjeni</a> </td>';
            echo '<td> <a href="admin.php?action=deleteUser&id=' . $user->id . '">Obrisi</a> </td>';
            echo '</tr>';
        }
        ?>
    </tbody>
</table>