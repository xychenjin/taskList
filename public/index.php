<?php 
    $hosts = require_once "../config/host.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>本机常用-功能列表</title>
    <script src="./js/jquery-1.10.2.js" charset="UTF-8" type="text/javascript"></script>
    <script src="./js/site.js" charset="UTF-8" type="text/javascript"></script>
    <link rel="stylesheet" href="./css/style.css" charset="UTF-8" />
    <link rel="stylesheet" href="./css/index.css" charset="UTF-8" />
    <link rel="shortcut icon" href=" ./favicon.ico" />
</head>
<body>
    <header>
        <nav>
            <span><a href="http://dd.com.cn/">返回旧版</a></span>
            <span><a href="">PHP版本</a></span>
            <span><a href="">MYSQL版本</a></span>
            <span><a href="">HTTP版本</a></span>
            <span><a href="">DEBUG</a></span>
            <span><a href="">其他</a></span>
        </nav>
    </header>

    <div class="container">
        <div><p>常用地址：</p></div>

        <div>
            <?php foreach ($hosts as $item) : ?>

            <div class="usual-group">
                <?php foreach (array_slice($item,0,4 ) as $url => $host): ?>
                    <span>
                    <a href="javascript:void(0)" data-url="<?= strpos($url, 'http') === false ? 'http://'. $url : $url ?>" class="link"><?= $host ?></a>
                    <a href="javascript:void(0)" data-url="<?= strpos($url, 'http') === false ? 'http://'. $url : $url ?>" class="link"><?= $url ?></a>
                </span>
                <?php endforeach; ?>
                <span>更多</span>
            </div>

            <?php endforeach; ?>
        </div>

        <div>
            <input type="text" name="index" class="" />
            <input type="button" value="搜索一下" class=""/>
        </div>

        <div>
            <p></p>
        </div>
    </div>

    <footer></footer>

    <script type="text/javascript">
        $(function () {
            $(".link").bind('click', clickCount);
        }) ;
    </script>
</body>
</html>