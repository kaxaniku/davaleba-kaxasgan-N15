<!DOCTYPE html>
<html>
<head>
    <title>Document</title>
    <link rel="stylesheet" href="assets/style/style.css">
</head>
<body>
<?php
$id = isset($_GET['id']) && $_GET['id']? $_GET['id'] : null;
$cida = isset($_POST['cida']) && $_POST['cida']? $_POST['cida'] : null;
$title = isset($_POST['title']) && $_POST['title']? $_POST['title'] : null;
$text = isset($_POST['text']) && $_POST['text']? $_POST['text'] : null;
//news
if ($id) {
    $news = gF('SELECT * FROM `news` WHERE id = ' . $id);
} else {
    die('invalid id');
}
//CA
$Cid = gA('SELECT * FROM `categories`');
//UPDATE-change
if ($title && $text && $cida) {
    $sql2 = "UPDATE news SET title = :title,text = :text,category_id = :cida WHERE id = :id";
    $stm = $connection->prepare($sql2);
    $stm->bindParam(':title' , $title);
    $stm->bindParam(':text' , $text);
    $stm->bindParam(':cida' , $cida);
    $stm->bindParam(':id' , $id);
    $stm->execute();
    header("location: ?SPage=news");
}
?>
<main>
        <div class="container-header">
            <h2>News</h2>
        </div>
        <div class="content">
            
        <form method="post" action="">
                <div class="form-group">
                    <label for="">Title</label>
                    <input type="text" name="title" value="<?= $news['title'] ?>">
                </div>
                    <div class="form-group">
                    <label for="">Text</label>
                    <Textarea name="text"><?= $news['text'] ?></Textarea>
                </div>
                <select name="cida">
                        <?php foreach ($Cid as $value): ?>
                            <option value="<?=$value['id']?>"><?=$value['first_title']?></option>
                        <?php endforeach; ?>
                    </select>
                <div class="form-group">
                    <button class="btn submit">Update</button>
                    <a href="?SPage=news" class="btn">Back</a>
                </div>
            </form>

        </div>
</main>
</body>
</html>