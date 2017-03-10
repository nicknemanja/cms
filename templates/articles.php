<h3>Lista korisnika:</h3>
<table class="table">
    <thead>
        <tr>
            <td>ID</td>
            <td>Username</td>
        </tr>
    </thead>
    <tbody>
        <?php
        $list = UserDAO::getList();
        foreach ($list as $user) {
            echo '<tr>';
            echo '<td>' . $user->id . '</td>';
            echo '<td>' . $user->username . '</td>';
            echo '</tr>';
        }
        ?>
    </tbody>
</table>