<?php
$title = '简易框架开发-首页';
$foreachBody = '';

foreach ($hosts as $item) :
    $foreachBody .= <<<EOT
<div class="usual-group">
EOT;
    foreach (array_slice($item, 0, 4) as $originUrl => $host):
        $url = strpos($originUrl, 'http') === false ? 'http://'. $originUrl : $originUrl;
        $foreachBody .= <<<EOT
    <span>
                    <p data-url="$url" class="link">$host</p>
                    <p data-url="$url" class="link">$originUrl</p>
                </span>
EOT;


    endforeach;
    $foreachBody .= <<<EOT
<span>更多</span>
</div>
EOT;
endforeach;


$context = <<<EOT
    <div class="usual-body"><p>本机常用地址：</p></div>

    <div class="usual-body">
        $foreachBody 
    </div>

    <div class="usual-body">
        <input type="text" name="index" class="input" />
        <input type="button" value="搜索一下" class="btn btn-submit"/>
    </div>

    <div>
        <p></p>
    </div>

<footer></footer>

<script type="text/javascript">
    $(function () {
        $(".link").bind('click', clickCount);
    }) ;
</script>
EOT;

view('layouts.master', compact('context', 'title'));
