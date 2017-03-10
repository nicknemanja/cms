<h3>Lista clanaka:</h3>
<table class="table">
    <thead>
        <tr>
            <td>RB</td>
            <td>Naslov</td>
            <td>Sadrzaj</td>
            <td>Otvori</td>
        </tr>
    </thead>
    <tbody>
        <?php
        $list = ArticleDAO::getList();
        $rb = 0;
        foreach ($list as $article) {
            echo '<tr>';
            echo '<td>' . ++$rb. '</td>';
            echo '<td>' . $article->title . '</td>';
            echo '<td>' . $article->content . '</td>';
            echo '<td><a href=index.php?action=viewArticle&id='.  $article->id . '>Otvori</a></td>';
            echo '</tr>';
        }
        ?>
    </tbody>
</table>