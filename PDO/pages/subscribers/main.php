<!DOCTYPE html>
<html lang="en">
<head>
    <title>Document</title>
</head>
<body>
<main>
<div class="content"  id="SubForm">
    <form method="post">
        <div class="form-group">
            <label for="">Name</label>
            <input type="text" name="name" id="name">
        </div>
        <div class="form-group">
            <label for="">Email</label>
            <input type="email" name="email" id="email">
        </div>
        <div class="form-group">
            <label for="">Phone</label>
            <input type="number" name="phone" id="phone">
        </div>
        <div class="form-group">
            <button type="button" class="btn submit" onclick="ToSubscribe(this)">Subscribe</button>
        </div>
    </form>
    <div id="success">
            <h2>Subscribed successfully</h2>
            <button class="btn" onclick="Return()">Return</button>
    </div>
</div>
</main>
</body>
</html>