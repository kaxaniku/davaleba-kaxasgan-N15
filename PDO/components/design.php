<header>
        <span class="logo">LOGO</span>
        <div class="user">
        <button onclick="changeBG(this)" data-mode=<?=$mode?> class="btn"><?= ucfirst($mode) ?> mode</button>
            <div>
                <img src="assets/img/user.png">
            </div>
            <div class="log">
                <span><?=($_SESSION['UserName'])?></span>
                <form method="post">
                <span>Root</span>
                <input type="hidden" name="logout">
                <button class="btn">Logout</button>
                </form>
            </div>
        </div>
</header>
<aside>
    <ul>
        <li class="<?= $SPage == 'dashboard' ? 'active' : ''  ?>">
            <a href="?SPage=dashboard">Dashboard</a>
        </li>
        <li class="<?= $SPage == 'categories' ? 'active' : ''  ?>">
            <a href="?SPage=categories">Categories</a>
        </li>
        <li class="<?= $SPage == 'news' ? 'active' : ''  ?>">
            <a href="?SPage=news">News</a>
        </li>
        <li class="<?= $SPage == 'subscribers' ? 'active' : ''  ?>">
            <a href="?SPage=subscribers">Subscribers</a>
        </li>
    </ul>
</aside>