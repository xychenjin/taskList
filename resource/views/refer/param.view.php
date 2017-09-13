<?php
/**
 * Created by PhpStorm.
 * User: jim
 * Date: 2017/9/8
 * Time: 16:49
 */


$title = '本地超全局变量';
$queryUri = route('php.param.detail');

$context = <<<EOT
    <p>PHP：超全局变量</p>
    <p><a href="http://php.net/manual/zh/language.variables.superglobals.php" target="_blank">http://php.net/manual/zh/language.variables.superglobals.php</a> </p>
    
    <h1>本地全局变量列表</h1>
    <ol>
        <li><a href="$queryUri?q=_SERVER">\$_SERVER</a> </li>
        <li><a href="$queryUri?q=_SESSION">\$_SESSION</a> </li>
        <li><a href="$queryUri?q=_GET">\$_GET</a></li>
        <li><a href="$queryUri?q=_POST">\$_POST</a></li>
        <li><a href="$queryUri?q=_REQUEST">\$_REQUEST</a></li>
        <li><a href="$queryUri?q=GLOBALS">\$GLOBALS</a></li>
        <li><a href="$queryUri?q=_FILES">\$_FILES</a></li>
        <li><a href="$queryUri?q=_COOKIE">\$_COOKIE</a></li>
        <li><a href="$queryUri?q=_ENV">\$_ENV</a></li>
</ol>

    <div>
    <p>自定义参数访问：</p>
    <form accept-charset="UTF-8" action="$queryUri" enctype="multipart/form-data" method="post">
        <label>参数：</label>
        <input type="text" name="q" />
        <input type="file" name="image" />
        <input type="submit" value="提交">
</form>

</div>
EOT;

view('layouts.master', compact('title', 'context'));