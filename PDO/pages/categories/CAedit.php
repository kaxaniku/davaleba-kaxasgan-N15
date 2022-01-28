<!DOCTYPE html>
<html>
<head>
    <title>Document</title>
    <link rel="stylesheet" href="assets/style/style.css">
</head>
<body>
<?php 
$id = isset($_GET['id']) && $_GET['id']? $_GET['id'] : null;
$title = isset($_POST['title']) && $_POST['title']? $_POST['title'] : null;
//C
if ($id) {
    $category = gA('SELECT * FROM `categories`');
} else {
    die('invalid id');
}
//UPDATE-change
if ($title) {
    $sql2 = "UPDATE categories SET title = :title WHERE id = :id";
    $stm = $connection->prepare($sql2);
    $stm->bindParam(':title' , $title);
    $stm->bindParam(':id' , $id);
    $stm->execute();
    header("location: ?SPage=categories");
}
?>
<main>
        <div class="container-header">
            <h2>Categories</h2>
        </div>
        <div class="content">
            
            <form method="post" action="">
                <div class="form-group">
                    <label for="">Change</label>
                    <select name="title">
                        <?php foreach ($category as $value): ?>
                            <option value="<?=$value['first_title']?>"><?=$value['first_title']?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="form-group">
                    <button class="btn submit">Update</button>
                    <a href="?SPage=categories" class="btn">Back</a>
                </div>
            </form>

        </div>
</main>
</body>
</html>