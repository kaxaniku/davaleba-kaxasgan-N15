<!DOCTYPE html>
<html>
<head>
    <title>davaleba</title>
    <link rel="stylesheet" href="assets/style/style.css">
</head>
<body>
    <?php
    //ERASURE
    $id = isset($_POST['id']) && $_POST['id']? $_POST['id'] : null;
    if ($id) {
        $ERASURE = "DELETE FROM news WHERE id = '$id'";
        $stm = $connection->query($ERASURE);
    }
    //ORDER
    $OB = "ORDER BY news.id ASC";
    $ORDER = isset($_GET['Order']) && $_GET['Order']? $_GET['Order'] : null;
    if ($ORDER) {
        $sortby = explode('-',$ORDER);
        if ($sortby[0] == "id") {
            $OB = "ORDER BY news.id";
        }elseif ($sortby[0] == "title") {
            $OB = "ORDER BY news.title";
        }
        $OB .= ' ' . $sortby[1];
    }
    //SEARCH
    $word = isset($_GET['search']) && $_GET['search']? $_GET['search'] : null;
    $searchengine ="WHERE news.title LIKE '%$word%'";
    //PAGING
    $offset = 0;
    $LIMIT = 3;
    $count = gF("SELECT COUNT(*) as co FROM news");
    $maxpage = ceil($count['co'] / $LIMIT);
    
    if (isset($_GET['page']) && $_GET['page'] && 1 < $_GET['page']) {
       $offset = ($_GET['page'] - 1) * $LIMIT;
    }
    $PAGER ="LIMIT $LIMIT OFFSET $offset";
    //JOINER
    $JOIN = "SELECT news.*,categories.title as cat_title FROM news
    LEFT JOIN categories ON 
    news.category_id = categories.id $searchengine $OB $PAGER;";
    $NJoin = gA($JOIN);
    ?>
<main>
        <div class="container-header">
            <h2>News</h2>
            <a href="?SPage=CA_NE_new&Web=1" class="btn">Add New</a>
        </div>
        <form class="SB" method="get">
            <input type="hidden" name="SPage" value="news">
            <select name="Order">
                <option value="id-asc" selected>ID +</option>
                <option value="id-desc" <?= isset($_GET['Order']) && $_GET['Order']=="id-desc"? 'selected':''?>>ID -</option>
                <option value="title-asc"<?= isset($_GET['Order']) && $_GET['Order']=="title-asc"? 'selected':''?>>TITLE +</option>
                <option value="title-desc"<?= isset($_GET['Order']) && $_GET['Order']=="title-desc"? 'selected':''?>>TITLE -</option>
            </select>
            <button class="btn">SORT</button>
            <label for="search">searchbar</label>
            <input type="text" name="search" placeholder="type a word and click enter">
        </form>
        <div class="content">
            <table>
                <tr>
                    <th>Title</th>
                    <th>Text</th>
                    <th>Category</th>
                    <th>Actions</th>
                </tr>
                <?php foreach ($NJoin as $value) :?>
                <tr>
                    <td><?= $value['title']?></td>
                    <td><?= $value['text']?></td>
                    <td><?= $value['cat_title']?></td>
                    <td class="actions">
                        <a class="edit" href="?<?=$_SERVER['QUERY_STRING']?>&action=NEedit&id=<?=$value['id']?>">Edit</a>
                        <form class="Tform" method='post'>
                        <input type="hidden" name='id' value=<?=$value['id']?>>
                        <button class="delete">Delete</button>
                        </form>
                    </td>
                </tr>
                <?php endforeach ?>
              </table>
        </div>
        <div class="pagination">
            <?php for ($i=1; $i < $maxpage+1; $i++): ?>
                <a href="?<?=$_SERVER['QUERY_STRING']?>&page=<?=$i?>&search=<?=$word?>" class="btn"><?=$i?></a>
            <?php endfor; ?>
        </div>
</main>
</body>
</html>