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
        $ERASURE = "DELETE FROM categories WHERE id = '$id'";
        $stm = $connection->query($ERASURE);
    }
    //C
        $category = gA('SELECT * FROM `categories`');
    ?>
<main>
        <div class="container-header">
            <h2>Categories</h2>
            <a href="?SPage=CA_NE_new&Web=0" class="btn">Add New</a>
        </div>
        <div class="content">
            <table>
                <tr>
                    <th>Categories</th>
                    <th>Actions</th>
                </tr>
                <?php foreach ($category as $value) :?>
                <tr>
                    <td><?= $value['title']?></td>
                    <td class="actions">
                        <a class="edit" href="?<?=$_SERVER['QUERY_STRING']?>&action=CAedit&id=<?=$value['id']?>">Edit</a>
                        <form class="Tform" method='post'>
                        <input type="hidden" name='id' value=<?=$value['id']?>>
                        <button class="delete">Delete</button>
                        </form>
                    </td>
                </tr>
                <?php endforeach ?>
              </table>
        </div>
    </main>
</body>
</html>